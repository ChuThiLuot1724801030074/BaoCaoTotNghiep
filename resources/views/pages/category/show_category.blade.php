@extends('welcome')
@section('content')
<div class="features_items">
    <!--features_items-->
    @foreach($category_name as $key => $name)
    <h2 class="title text-center">{{$name->category_name }}</h2>
    @endforeach
    @foreach($category_by_id as $key => $product )
    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">

    <div class="col-sm-4">
         <div class="product-image-wrapper">
             <div class="single-products">
                 <div class="productinfo text-center">
                     <form>
                         @csrf
                         <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                         <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                         <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                         <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                         <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                         <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                             <img src="{{URL::to('uploads/product/'.$product->product_image)}}" height="300px" width="300px" alt="" />
                            <!-- @if($product->product_promo>0)
                                <h2>{{number_format($product->product_promo).' '.'VNĐ'}}</h2>
                                <h2><strike>{{number_format($product->product_price).' '.'VNĐ'}}</strike></h2>
                            @else
                            <h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
                            @endif -->
                            <h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
                             <p>{{$product->product_name}}</p>
                            
                         </a>
                         <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                            </form>

                 </div>
             </div>
         </div>

     </div>
     </a>
    @endforeach
</div>
@endsection