<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private $userService;
    private $orderService;
    private $productCategoryService;

    public function __construct(UserServiceInterface $userService,
                                OrderServiceInterface $orderService,
                                ProductCategoryServiceInterface $productCategoryService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
        $this->productCategoryService = $productCategoryService;
    }

    public function index()
    {
        $categories = $this->productCategoryService->all();

        return view('front.account.login', compact('categories'));
    }

    public function checkLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => Constant::user_level_client, //Tài khoản cấp độ khách hàng bình thường
        ];

        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            //return redirect(''); //trang chủ
            return redirect()->intended(''); //Mặc định là trang chủ
        } else {
            return back()
                ->with('notification', 'LỖI: Email hoặc Mật khẩu không chính xác!');
        }
    }

    public function logout()
    {
        Auth::logout();

        return back();
    }

    public function register()
    {
        $categories = $this->productCategoryService->all();

        return view('front.account.register', compact('categories'));
    }

    public function postRegister(Request $request)
    {
        if ($request->password != $request->password_confirmation) {
            return back()
                ->with('notification', 'LỖI: Mật khẩu nhập lại không chính xác!');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => Constant::user_level_client, //đăng ký tài khoản cấp khách hàng bình thường.
        ];

        $this->userService->create($data);

        return redirect('account/login')
            ->with('notification', 'Đăng ký thành công! Hãy đăng nhập.');
    }

    public function myOrderIndex()
    {
        $orders = $this->orderService->getOrderUserId(Auth::Id());
        $categories = $this->productCategoryService->all();

        return view('front.account.my-order.index', compact('orders', 'categories'));
    }

    public function myOrderShow($id)
    {
        $order = $this->orderService->find($id);
        $categories = $this->productCategoryService->all();

        return view('front.account.my-order.show', compact('order', 'categories'));
    }
}
