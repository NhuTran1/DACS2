<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductComment;
use App\Models\User;
use App\Services\Blog\BlogServiceInterface;
use App\Services\Order\OrderServiceInterface;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $productService;
    private $productCommentService;
    private $orderService;
    private $userService;
    private $blogService;

    public function __construct(ProductServiceInterface $productService,
                                ProductCategoryServiceInterface $productCommentService,
                                OrderServiceInterface $orderService,
                                UserServiceInterface $userService,
                                BlogServiceInterface $blogService)
    {
        $this->orderService = $orderService;
        $this->productService = $productService;
        $this->productCommentService = $productCommentService;
        $this->userService = $userService;
        $this->blogService = $blogService;
    }


    public function index(Request $request)
    {
        $product = $this->productService->all();
        $blog = $this->blogService->all();
        $productComment = $this->productCommentService->all();
        $orders = $this->orderService->searchAndPaginateOrder('first_name', $request->get('search'));

        //Doanh thu ngày
        $moneyDay = OrderDetail::whereDay('updated_at', date('d'))->sum('total');
        //Doanh thu tháng
        $moneyMonth = OrderDetail::whereMonth('updated_at', date('m'))->sum('total');
        //Doanh thu năm
        $moneyYear = OrderDetail::whereYear('updated_at', date('Y'))->sum('total');

        //tong so san pham
        $totalProduct = Product::all()->count();
        //tong so user
        $totalUser = User::all()->count();
        //tong so blog
        $totalBlog = Blog::all()->count();
        //tong so order
        $totalOrder = Order::all()->count();
        //tong so luot review
        $totalReview = ProductComment::all()->count();

        $viewData = [
            'moneyDay' => $moneyDay,
            'moneyMonth' => $moneyMonth,
            'moneyYear' => $moneyYear,
            'orders' => $orders,
            'product' => $product,
            'productComments' => $productComment,
            'blog' => $blog,
            'totalProduct' => $totalProduct,
            'totalUser' => $totalUser,
            'totalBlog' => $totalBlog,
            'totalOrder' => $totalOrder,
            'totalReview' => $totalReview,
        ];

        return view('admin.index', $viewData);
    }

    public function getLogin() {
        return view('admin.login');
    }

    public function postLogin(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => [Constant::user_level_host, Constant::user_level_admin],  //Tài khoản cấp độ host or admin
        ];

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('admin'); //Mặc định là trang chủ
        } else {
            return back()
                ->with('notification', 'LỖI: Email hoặc Mật khẩu không chính xác!');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('admin/login');
    }
}
