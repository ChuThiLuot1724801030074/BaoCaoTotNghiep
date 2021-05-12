<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Comment;
use function Ramsey\Uuid\v1;

session_start();

class ProductController extends Controller
{
	public function AuthLogin()
	{
		$admin_id = Session::get('admin_id');
		if ($admin_id) {
			Redirect::to('admin.dashboard');
		} else {
			Redirect::to('admin')->send();
		}
	}
	public function load_comment(Request $request)
	{
		$product_id = $request->product_id;
		$comment = Comment::where('comment_product_id', $product_id)->where('comment_parent_comment', '=', 0)->where('comment_status', 0)->get();
		$comment_rep = Comment::with('product')->where('comment_parent_comment', '>', 0)->get();
		$output = '';
		foreach ($comment as $key => $comm) {
			$output .= ' 
            <div class="row style_comment">

                                        <div class="col-md-2">
                                            <img width="100%" src="' . url('/public/frontend/images/batman-icon.png') . '" class="img img-responsive img-thumbnail">
                                        </div>
                                        <div class="col-md-10">
                                            <p style="color:green;">@' . $comm->comment_name . '</p>
                                            <p style="color:#000;">' . $comm->comment_date . '</p>
                                            <p>' . $comm->comment . '</p>
                                        </div>
                                    </div><p></p>
                                    ';

			foreach ($comment_rep as $key => $rep_comment) {
				if ($rep_comment->comment_parent_comment == $comm->comment_id) {
					$output .= ' <div class="row style_comment" style="margin:5px 40px;background: aquamarine;">

                                        <div class="col-md-2">
                                            <img width="80%" src="' . url('/public/frontend/images/businessman.jpg') . '" class="img img-responsive img-thumbnail">
                                        </div>
                                        <div class="col-md-10">
                                            <p style="color:blue;">@Admin</p>
                                            <p style="color:#000;">' . $rep_comment->comment . '</p>
                                            <p></p>
                                        </div>
                                    </div><p></p>';
				}
			}
		}
		echo $output;
	}
	public function add_product()
	{
		// $this->AuthLogin();
		$cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
		$brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();

		return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
	}
	public function all_product()
	{
		// $this->AuthLogin();
		// $product = DB::table('tbl_product')->orderBy('product_id', 'desc')->get();
		$all_product = DB::table('tbl_product')
			->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
			->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
			->orderby('tbl_product.product_id', 'desc')->get();

		$manager_product = view('admin.all_product')->with('all_product', $all_product);
		return view('admin_layout')->with('admin.all_product', $manager_product);
	}
	public function save_product(Request $request)
	{

		// $this->AuthLogin();
		$data = array();
		$data['product_name'] = $request->product_name;
		$data['product_quantity'] = $request->product_quantity;
		$data['product_status'] = $request->product_status;
		$data['product_slug'] = $request->product_slug;
		$data['product_sold'] = $request->product_sold;
		$data['product_price'] = $request->product_price;
		$data['product_promo'] = $request->product_promo;
		$data['product_desc'] = $request->product_desc;
		$data['product_content'] = $request->product_content;
		$data['category_id'] = $request->product_cate;
		$data['brand_id'] = $request->product_brand;

		$get_image = $request->file('product_image');
		if ($get_image) {
			$get_name_image = $get_image->getClientOriginalName();
			$name_image = current(explode('.', $get_name_image));
			$new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
			$get_image->move('uploads/product', $new_image);
			$data['product_image'] = $new_image;
			DB::table('tbl_product')->insert($data);
			Session::put('message', 'Thêm thành công');
			return Redirect::to('all-product');
		}

		DB::table('tbl_product')->insert($data);
		Session::put('TEN', 'Thêm danh mục sản phẩm thành công');
		return Redirect('all-product');
	}
	public function unactive_product($product_id)
	{
		//$this->AuthLogin();
		DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
		Session::put('TEN', 'Không kích hoạt sản phẩm thành công');
		return Redirect::to('all-product');
	}

	public function active_product($product_id)
	{
		// $this->AuthLogin();
		DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
		Session::put('TEN', 'kích hoạt sản phẩm thành công');
		return Redirect::to('all-product');
	}
	public function edit_product($product_id)
	{
		// $this->AuthLogin();
		$cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
		$brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'desc')->get();
		$edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
		$manager_product = view('admin.edit_product')->with('edit_product', $edit_product)
			->with('cate_product', $cate_product)->with('brand_product', $brand_product);
		return view('admin_layout')->with('admin.edit_product', $manager_product);
	}
	public function update_product(Request $request, $product_id)
	{
		// $this->AuthLogin();
		$data = array();
		$data['product_name'] = $request->product_name;
		$data['product_quantity'] = $request->product_quantity;
		$data['product_slug'] = $request->product_slug;
		$data['product_price'] = $request->product_price;
		$data['product_promo'] = $request->product_promo;
		$data['product_desc'] = $request->product_desc;
		$data['product_content'] = $request->product_content;
		$data['category_id'] = $request->product_cate;
		$data['brand_id'] = $request->product_brand;
		$data['product_status'] = $request->product_status;
		$get_image = $request->file('product_image');
		if ($get_image) {
			$get_name_image = $get_image->getClientOriginalName();
			$name_image = current(explode('.', $get_name_image));
			$new_image = rand(0, 200) . '.' . $get_image->getClientOriginalExtension();
			$get_image->move('uploads/product', $new_image);
			$data['product_image'] = $new_image;
			DB::table('tbl_product')->where('product_id', $product_id)->update($data);
			Session::put('TEN', 'Cập nhật sản phẩm thành công !');
			return redirect::to('all-product');
		}
		DB::table('tbl_product')->where('product_id', $product_id)->update($data);
		Session::put('TEN', 'Cập nhật sản phẩm thành công !');
		return redirect('all-product');
	}
	public function delete_product($product_id)
	{
		// $this->AuthLogin();
		DB::table('tbl_product')->where('product_id', $product_id)->delete();
		Session::put('TEN', 'Xóa sản phẩm thành công');
		return Redirect::to('all-product');
	}
	// End admin page
	public function details_product($product_id)
	{
		$cate_product = DB::table('tbl_category_product')->where('Category_status', '0')->orderBy('category_id', 'desc')->get();
		$brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderBy('brand_id', 'desc')->get();

		$details_product = DB::table('tbl_product')
			->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
			->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
			->where('tbl_product.product_id', $product_id)->get();

		foreach ($details_product as $key => $value) {
			$category_id = $value->category_id;
		}
		$related_product = DB::table('tbl_product')
			->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
			->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
			->where('tbl_category_product.category_id', $category_id)->whereNotIn('tbl_product.product_id', [$product_id])->get();
		$meta_desc = '';
		$meta_keywords = '';
		$meta_title = '';
		$url_canonical = '';

		return view('pages.sanpham.show_details')->with('category', $cate_product)->with('brand', $brand_product)
			->with('product_details', $details_product)->with('relate', $related_product)->with('meta_desc', $meta_desc)
			->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical);
	}
}
