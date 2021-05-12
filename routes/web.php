<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontend
Route::get('/', 'HomeController@index');
Route::get('/trangchu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');
Route::get('/all-customer', 'HomeController@all_customer');

Route::get('/tintuc','HomeController@tintuc');


//danh muc sp trang chu
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
Route::get('/tag/{product_tag}','ProductController@tag');
Route::get('/comment','ProductController@list_comment');
Route::post('/quickview','ProductController@quickview');
Route::post('/load-comment','ProductController@load_comment');
Route::post('/send-comment','ProductController@send_comment');
Route::post('/allow-comment','ProductController@allow_comment');
Route::post('/reply-comment','ProductController@reply_comment');
Route::post('/insert-rating','ProductController@insert_rating');

// thuong hieu san pham
Route::get('/thuong-hieu-san-pham/{brand_id}','BrandProduct@show_brand_home');

// chi tiet san pham
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');


//backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::post('/filter-by-date','AdminController@filter_by_date');
Route::post('/days-order','AdminController@days_order');


// catetogry product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');

Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');


Route::post('/save-category-product','CategoryProduct@save_category_product');

Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');

// brand product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');

//Bai viet
Route::get('/danh-muc-bai-viet/{post_slug}','PostController@danh_muc_bai_viet');
Route::get('/bai-viet/{post_slug}','PostController@bai_viet');
Route::post('/save-brand-product','BrandProduct@save_brand_product');

Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');

// category post
Route::get('/add-category-post','CategoryPost@add_category_post');
Route::get('/all-category-post','CategoryPost@all_category_post');
Route::get('/edit-category-post/{category_post_id}','CategoryPost@edit_category_post');
Route::post('/save-category-post','CategoryPost@save_category_post');
Route::post('/update-category-post/{cate_id}','CategoryPost@update_category_post');
Route::get('/delete-category-post/{cate_id}','CategoryPost@delete_category_post');



//  productcontroller
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');

Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');


Route::post('/save-product','ProductController@save_product');

Route::post('/update-product/{product_id}','ProductController@update_product');

// cart

Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::post('/update-cart','CartController@update_cart');
Route::post('/save-cart','CartController@save_cart');
Route::get('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/gio-hang','CartController@gio_hang'); 
Route::get('/del-product/{session_id}','CartController@delete_product');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::get('/del-all-product','CartController@delete_all_product');

// checkout
Route::get('/login-checkout','CheckoutController@login_checkout');
// Route::post('/login','CheckoutController@postLogin');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/login',"CheckoutController@login");
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::get('/payment','CheckoutController@payment');
Route::get('/sign_up','CheckoutController@Sign_up');
Route::post('/sign_up','CheckoutController@Sign_up_check');
Route::get('/logout-checkout','CheckoutController@logout');
Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::get('/del-fee','CheckoutController@del_fee');
Route::post('/confirm-order','CheckoutController@confirm_order');
//Coupon
Route::post('/check-coupon','CartController@check_coupon');
Route::get('/unset-coupon','CouponController@unset_coupon');
Route::get('/insert-coupon','CouponController@insert_coupon');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');
Route::get('/list-coupon','CouponController@list_coupon');
Route::post('/insert-coupon-code','CouponController@insert_coupon_code');

//order
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::post('/update-order-qty','OrderController@update_order_qty');
Route::post('/update-qty','OrderController@update_qty');
Route::get('/delete-order/{order_code}','OrderController@order_code');


//Login facebook
Route::get('/login-facebook','AdminController@login_facebook');
Route::get('/admin/callback','AdminController@callback_facebook');

//send mail

Route::get('/send-coupon/{coupon_time}/{coupon_condition}/{coupon_number}/{coupon_code}','MailController@send_coupon');
Route::get('/contact', 'HomeController@contact');
Route::post('/contact', 'HomeController@postcontact');
Route::get('/mail-example','MailController@mail_example');
//delivery
Route::get('/delivery', 'DeliveryController@delivery');
Route::post('/select-delivery','DeliveryController@select_delivery');
Route::post('/insert-delivery','DeliveryController@insert_delivery');
Route::post('/select-feeship','DeliveryController@select_feeship');
Route::post('/update-delivery','DeliveryController@update_delivery');

//forget password
Route::get('/quen-mat-khau', 'MailController@quen_mat_khau');
Route::get('/change-password','PasswordController@changepassword');
Route::post('/change-password','PasswordController@update');


///thanh toán online
Route::post('/payment-onlines','PaymentController@payment_onlines');
Route::get('/thanh-toan','PaymentController@thanh_toan');
Route::post('/thanhtoan-onlines','PaymentController@thanhtoan_onlines');
Route::get('/vnpay-return',['as'=>'vnpayreturn','uses'=>'PaymentController@vnpay_return']);