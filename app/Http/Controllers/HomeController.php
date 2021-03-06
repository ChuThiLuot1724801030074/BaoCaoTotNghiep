<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Mail;
use App\CategoryProductModel;
use App\Slider;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function contact()
    {
        $meta_desc='';
        $meta_keywords='';
        $meta_title='';
        $url_canonical='';

        $cate_product = DB::table('tbl_category_product')->where('Category_status', '0')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '0')->orderby('product_id', 'desc')->limit(9)->get();
        return view('pages.mail.contact')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product', $all_product)->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function tintuc()
    {
        $meta_desc='';
        $meta_keywords='';
        $meta_title='';
        $url_canonical='';

        $cate_product = DB::table('tbl_category_product')->where('Category_status', '0')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '0')->orderby('product_id', 'desc')->limit(9)->get();
        return view('pages.tin_tuc')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product', $all_product)->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function postcontact(Request $req)
    {
        $to_email = "luotly1999@gmail.com";
        Mail::send('pages.mail.send_maill', [
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'content' => $req->content,
        ], function ($mail) use ($req, $to_email) {
            $mail->to($to_email);
            $mail->from($to_email, $req->name);
            $mail->subject('Mail ph???n h???i c???a kh??ch h??ng');
        });
        return redirect('/');
    }
    public function index(Request $request)
    {
        $meta_desc = "L?? c???a h??ng s??? 1 v??? kinh doanh gi??y sneaker cho nam v?? n???. ?????m b???o gi?? r??? s???p s??n";
        $meta_keywords = "Hi???n t???i Shop ??ang kinh doanh c??c m???u gi??y hot nh???t c???a c??c th????ng hi???u n???i ti???ng nh?? Adidas, Converse, Balenciaga, Vans, Fila";
        $meta_title = "Shop Shoes B??nh Chu???n";
        $url_canonical = $request->url();
        $cate_product = DB::table('tbl_category_product')->where('Category_status', '0')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderby('product_id', 'desc')->limit(9)->get();

        return view('pages.home')->with('category', $cate_product)->with('brand', $brand_product)
            ->with('all_product', $all_product)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)
            ->with('meta_title', $meta_title)->with('url_canonical', $url_canonical);
    }
    public function search(Request $request)
    {
        $meta_desc = "T??m ki???m s???n ph???m";
        $meta_keywords = "T??m ki???m s???n ph???m";
        $meta_title = "T??m ki???m s???n ph???m";
        $url_canonical = $request->url();
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('Category_status', '0')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name', 'like', '%' . $keywords . '%')->get();

        return view('pages.sanpham.search')->with('category', $cate_product)->with('brand', $brand_product)
            ->with('search_product', $search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
    public function all_customer()
    {
        $all_customer = DB::table('tbl_customers')->get();
        $manager_customer = view('admin.all_customer')->with('all_customer', $all_customer);
        return view('admin_layout')->with('admin.all_customer', $manager_customer);
    }
}
