<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Utilities\Constant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;
    private $productCategoryService;

    public function __construct(OrderServiceInterface $orderService,
                                OrderDetailServiceInterface $orderDetailService,
                                ProductCategoryServiceInterface $productCategoryService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
        $this->productCategoryService = $productCategoryService;
    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        $categories = $this->productCategoryService->all();

        return view('front.checkout.index', compact('carts', 'total', 'subtotal', 'categories'));
    }

    public function addOrder(Request $request)
    {
        //01. Thêm đơn hàng
//        $order = $this->orderService->create($request->all());
        $data = $request->all();
        $data['status'] = Constant::order_status_ReceiveOrders;
        $order = $this->orderService->create($data);

        //02. Thêm chi tiết đơn hàng
        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->qty * $cart->price,
            ];

            $this->orderDetailService->create($data);
        }

//        if ($request->payment_type == 'pay-later') {
            //Gửi email:
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendEmail($order, $total, $subtotal); //Gọi hàm gửi mail đã định nghĩa

            //03. Xóa giỏ hàng
            Cart::destroy();

            //04. Trả về kết quả thông báo
            return redirect('checkout/result')
                ->with('notification', 'Đặt hàng thành công! Vui lòng kiểm tra email của bạn.');
//        }
//        if ($request->payment_type == 'online_payment') {
//
//            //Gửi email:
//            $total = Cart::total();
//            $subtotal = Cart::subtotal();
//            $this->sendEmail($order, $total, $subtotal); //Gọi hàm gửi mail đã định nghĩa
//
//            //03. Xóa giỏ hàng
//            Cart::destroy();
//
//            //04. Trả về kết quả thông báo
//            return redirect('checkout/result')
//                ->with('notification', 'Đặt hàng thành công! . Vui lòng kiểm tra email của bạn.');

//            //1 Lấy URL thanh toán VNPay
//            $data_url = VNPay::vnpay_create_payment([
//                'vnp_TxnRef' => $order->id, //ID cua don hang
//                'vnp_OrderInfo' => 'Thanh toan hoa don online', //Mo ta don hang
//                'vnp_Amount' => Cart::total(0, '', '') * 24815, //Tong gia cua don hang nhan voi ti gia de chuyen sang tien Viet nam
//            ]);
//
//            //2 Chuyển hướng tới URL lấy được
//            return redirect()->to($data_url);
//        }
   }

//    public function vnPayCheck(Request $request)
//    {
//        //01. Lấy data từ url (do VNPay gửi về qua $vnp_Returnurl)
//        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); //Mã phản hồi kết quả thanh toán
//        $vnp_TxnRef = $request->get('vnp_TxnRef'); //order_id
//        $vnp_Amount = $request->get('vnp_Amount'); //Số tền thanh toán.
//
//        //02. Kiểm tra data, xem xét kết quả giao dịch trả về từ VNPay hợp lệ không
//        if ($vnp_ResponseCode != null) {
//            //Nếu thành công
//            if ($vnp_ResponseCode == 00) {
//                //Cập nhật trạng thái Order
//                $this->orderService->update(['status' => Constant::order_status_Paid,] $vnp_TxnRef);
//                //Gửi Email:
//                $order = $this->orderService->find($vnp_TxnRef); //Ma don hang
//                $total = Cart::total();
//                $subtotal = Cart::subtotal();
//                $this->sendEmail($order, $total, $subtotal); //Gọi hàm gửi mail đã định nghĩa
//
//                //Xoa giỏ hàng
//                Cart::destroy();
//
//                //Thông báo kết quả
//                return redirect('checkout/result')
//                    ->with('notification', 'Đặt hàng thành công! Bạn đã thanh toán trực tuyến. Vui lòng kiểm tra email của bạn.');
//            } else {
//                //Nếu không thành công
//                //Xóa đơn hàng thêm vào Database
//                $this->orderService->delete($vnp_TxnRef);
//
//                //Thông báo lỗi
//                return redirect('checkout/result')
//                    ->with('notification', 'Lỗi! Thanh toán thất bại hoặc bị hủy bỏ.');
//            }
//        }
//    }


    public function result()
    {
        $notification = session('notification');
        $categories = $this->productCategoryService->all();

        return view('front.checkout.result', compact('notification', 'categories'));
    }

    private function sendEmail($order, $total, $subtotal)
    {
        $email_to = $order->email;

        Mail::send('front.checkout.email',
            compact('order', 'total', 'subtotal'),
            function ($message) use ($email_to) {
                $message->from('tranxuantienvtqs@gmail.com', 'TXT ShoesShop');
                $message->to($email_to, $email_to);
                $message->subject('Order Notification');
            });
    }
}

