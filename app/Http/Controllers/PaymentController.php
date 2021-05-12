<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\support\Facades\Redirect;
use Session;
use Cart;
use App\Order;
use App\OrderDetails;
use App\Shipping;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function payment_onlines(Request $request){
        $thanhtoan = $request ->all();
    	Session::put('thanhtoan',$thanhtoan);


    }
    public function thanh_toan(Request $request){
    	$data = Session::get('thanhtoan');
    	$checkout_code = substr(md5(microtime()),rand(0,26),5);
    	Session::put('code',$checkout_code);
    	return view('pages.vnpay.index')->with(compact('data','checkout_code')) ;
    }

    public function thanhtoan_onlines (Request $request){
        // dd($request->all());
        $vnp_TxnRef = $request->order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = $request->amount * 100;
        $vnp_Locale = config('app.locale');
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('vnpayreturn'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')) {
            $vnpSecureHash = hash('sha256', env('VNP_HASH_SECRET') . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function vnpay_return(Request $request){

        $meta_desc = "";
        $meta_keywords = "";
        $meta_title = "Thank you";
        $url_canonical = $request->url();

        if ($request->vnp_ResponseCode == '00') {

            $data = Session::get('thanhtoan');

            // dd(Session::get('shipping_session'));
            $shipping =  new Shipping();
            $shipping->shipping_name = $data['shipping_name'];
            $shipping->shipping_email = $data['shipping_email'];
            $shipping->shipping_phone = $data['shipping_phone'];
            $shipping->shipping_address = $data['shipping_address'];
            $shipping->shipping_notes = $data['shipping_notes'];
            $shipping->shipping_method = $data['shipping_method'];
            $shipping->save();
            //save order
            $shipping_id = $shipping->shipping_id; //sau khi save thì lấy id mới nhất

            $order = new Order;
            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = $shipping_id;
            $order->order_status = 1;
            $order->order_code = Session::get('code');
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            // $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $order->created_at = now();
            // $order->order_date = $order_date;
            $order->save();


            if(Session::get('cart')==true && Session::get('thanhtoan')) {
                $pay = Session::get('thanhtoan');
                foreach (Session::get('cart') as $key => $cart) {
                    $order_details = new OrderDetails;
                    $order_details->order_code = Session::get('code');
                    $order_details->product_coupon = $pay['order_coupon'];
                    $order_details->product_feeship = $pay['order_fee'];
                    $order_details->product_id = $cart['product_id'];
                    $order_details->product_name = $cart['product_name'];
                    $order_details->product_price = $cart['product_price'];
                    $order_details->product_sales_quantity = $cart['product_qty'];
                    $order_details->save();
                }
            }

            Session::forget('coupon');
            Session::forget('fee');
            Session::forget('cart');
            Session::forget('shipping_session');


            $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id' , 'desc')->get();

            return view('pages.thankyou')->with('category', $cate_product)->with('brand', $brand_product)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)
            ->with('meta_title', $meta_title)->with('url_canonical', $url_canonical);

        }
}


}
