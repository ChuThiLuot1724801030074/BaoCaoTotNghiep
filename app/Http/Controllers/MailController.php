<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Mail;
use Session;
use DB;
use Carbon\Carbon;
use App\Coupon;
use App\Customer;
use App\CatePost;
use App\CategoryProductModel;
use App\Slider;
use App\Product;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{

	public function send_coupon($coupon_time,$coupon_condition,$coupon_number,$coupon_code){
		//get customer
		$customer = Customer::where('customer_vip','=',NULL)->get();

		$coupon = Coupon::where('coupon_code',$coupon_code)->first();
		$start_coupon = $coupon->coupon_date_start;
		$end_coupon = $coupon->coupon_date_end;

		$now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

		$title_mail = "Mã khuyến mãi ngày".' '.$now;
		
		$data = [];
		foreach($customer as $normal){
			$data['email'][] = $normal->customer_email;
		}
		
		$coupon = array(
			
			'start_coupon' =>$start_coupon,
			'end_coupon' =>$end_coupon,
			'coupon_time' => $coupon_time,
			'coupon_condition' => $coupon_condition,
			'coupon_number' => $coupon_number,
			'coupon_code' => $coupon_code
		);
		Mail::send('pages.send_coupon', ['coupon' => $coupon],function($message) use ($title_mail,$data){
	            $message->to($data['email'])->subject($title_mail);//send this mail with subject
	            $message->from($data['email'],$title_mail);//send from this mail
	    });
		
  
		 return redirect()->back()->with('message','Gửi mã khuyến mãi khách thường thành công');
    }
    public function mail_example(){
    	return view('pages.send_coupon_vip');
    }
   
    public function quen_mat_khau(Request $request){
 
       $meta_desc = "Quên mật khẩu"; 
       $meta_keywords = "Quên mật khẩu";
       $meta_title = "Quên mật khẩu";
       $url_canonical = $request->url();
       //--seo
       
       $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_parent','desc')->orderby('category_order','ASC')->get(); 
       
       $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 


       $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(6); 


       return view('pages.checkout.forget_pass')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical); //1
       
   }

}
