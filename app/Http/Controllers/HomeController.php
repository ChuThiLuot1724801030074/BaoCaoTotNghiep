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
            $mail->subject('Mail phản hồi của khách hàng');
        });
        return redirect('/');
    }
    public function index(Request $request)
    {
        $meta_desc = "Là cửa hàng số 1 về kinh doanh giày sneaker cho nam và nữ. Đảm bảo giá rẻ sập sàn";
        $meta_keywords = "Hiện tại Shop đang kinh doanh các mẫu giày hot nhất của các thương hiệu nổi tiếng như Adidas, Converse, Balenciaga, Vans, Fila";
        $meta_title = "Shop Shoes Bình Chuẩn";
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
        $meta_desc = "Tìm kiếm sản phẩm";
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
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
