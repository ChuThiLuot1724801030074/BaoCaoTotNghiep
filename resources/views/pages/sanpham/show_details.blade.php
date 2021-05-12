@extends('welcome')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details">
    <!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
        <img src="{{URL::to('/uploads/product/'.$value->product_image)}}" alt="" />
        </div>
       

    </div>
    <div class="col-sm-7">
        <div class="product-information">
            <!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>Tên sản phẩm :{{$value->product_name}}</h2>
            <form action="{{URL::to('/save-cart')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                <input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">

                <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                
                <span>
                    <!-- <span><strike>{{number_format($value->product_price,0,',','.').' VNĐ'}}</strike></span> -->
                    <span>{{number_format($value->product_price,0,',','.').' VNĐ'}}</span>
                    <label>Số lượng:</label>
                    <input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}" value="1" />
                    <input name="productid_hidden" type="hidden" value="{{$value->product_id}}" />
                </span>
                <input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
            </form>
                <p><b>Tình trạng:</b> Còn hàng</p>
                <p><b>Điều kiện:</b> Mới 100% </p>
                <p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
                <p><b>Danh mục:</b> {{$value->category_name}}</p>
                <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
        </div>
        <!--/product-information-->
    </div>
</div>
<!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li ><a href="#details" data-toggle="tab">Mô tả</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
							
								<li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane " id="details" >
								<p>{!!$value->product_desc!!}</p>
								
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<p>{!!$value->product_content!!}</p>
								
						
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>Admin</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>16.09.2020</a></li>
									</ul>
									<style type="text/css">
										.style_comment {
										    border: 1px solid #ddd;
										    border-radius: 10px;
										    background: #F0F0E9;
										}
									</style>
									<form>
										 @csrf
										<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
										 <div id="comment_show"></div>
									
									</form>
									
									<p><b>Viết đánh giá của bạn</b></p>
                                   
                    <textarea name=""></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>

    </div>
</div>
<!--/category-tab-->
@endforeach

@endsection