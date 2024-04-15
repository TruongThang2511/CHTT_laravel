<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use mysql_xdevapi\Result;

class CheckoutController extends Controller
{

    private $orderService;
    private $orderDetailService;

    public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request)
    {
        $order = $this->orderService->create($request->all());


        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data=[
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->qty * $cart->price,
            ];

            $this->orderDetailService->create($data);
        }

        if($request->check_method == 'pay_later'){
            Cart::destroy();

            return redirect('checkout/result')->with('notification','Successful');
        }

        if($request->check_method == 'online_payment'){
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id,
                'vnp_OrderInfo' => 'Mo ta don hang',
                'vnp_Amount' => Cart::total(0,'','') * 23070,
            ]);

            return redirect()->to($data_url);
        }
    }

    public function result()
    {
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }

    public function vnPayCheck(Request $request){
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef');
        $vnp_Amount = $request->get('vnp_Amount');

        if($vnp_ResponseCode != null){
            if($vnp_ResponseCode == 00){
                Cart::destroy();
                return redirect('checkout/result')->with('notification','Successful!. Has paid online');
            }else{
                $this->orderService->delete($vnp_TxnRef);

                return redirect('checkout/result')->with('notification','Error!');
            }
        }
    }
}
