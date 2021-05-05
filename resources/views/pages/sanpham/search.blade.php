@extends('welcome')
 @section('content')
 <div class="features_items">
     <h2 class="title text-center">{{__('Kết quả tìm kiếm')}}</h2>
     @foreach($search_product as $key => $product)
     <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
     <div class="col-sm-4">
         <div class="product-image-wrapper">
             <div class="single-products">
                 <div class="productinfo text-center">
                    <img src="{{URL::to('uploads/product/'.$product->product_image)}}" height="300px" width="300px" alt=""/>
                     <h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
                     <p>{{$product->product_name}}</p>
                     <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('Thêm vào giỏ
                         hàng')}}</a>
                 </div>
             </div>      
     </div>
     </a>
     @endforeach
 </div>
 @endsection