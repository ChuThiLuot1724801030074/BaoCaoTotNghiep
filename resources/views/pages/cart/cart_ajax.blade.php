@extends('welcome1')
@section('content')

<section id="cart_items">
   
        <div class="breadcrumbs" style="border: 1px solid #E6E4DF;">
            <ol class="breadcrumb" style="margin-bottom: 0px;">
                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="active">Giỏ hàng của bạn</li>
            </ol>
        </div>
        <!-- @if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div>
                @elseif(session()->has('error'))
                     <div class="alert alert-danger">
                        {!! session()->get('error') !!}
                    </div>
                @endif -->
        <div class="table-responsive cart_info">
            <form action="{{url('/update-cart')}}" method="POST">
                @csrf
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu" style="background-color: #ff7d94;">
                            <td class="image">Hình ảnh</td>
                            <td class="description">Tên sản phẩm</td>
                            <td class="description">Số lượng tồn</td>
                            <td class="price">Giá sản phẩm</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Thành tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @if(Session::get('cart')==true)
                        @php
                            $total = 0;
                            @endphp
                            @foreach(Session::get('cart') as $key => $cart)
                        @php
                            $subtotal = $cart['product_price']*$cart['product_qty'];
                            $total+=$subtotal;
                        @endphp

                        <tr>
                            <td class="cart_product text-center" >
                                <img src="{{asset('uploads/product/'.$cart['product_image'])}}" height="125pxa " alt="{{$cart['product_name']}}" style="border-radius: 8px;" />
                            </td>
                            <td class="cart_description">
                                <h4><a href=""></a></h4>
                                <p>{{$cart['product_name']}}</p>
                            </td>
                            <td class="cart_description">
								<h4><a href=""></a></h4>
								<p>{{$cart['product_quantity']}}</p>
							</td>
                            <td class="cart_price">
                                <p>{{number_format($cart['product_price'],0,',','.')}}đ</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                    <input class="cart_quantity_" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    {{number_format($subtotal,0,',','.')}}đ

                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                        @endforeach
                        <tr>
                            <td> <input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn-default btn-sm">
                            </td>
                            <td><a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Xóa tất cả</a>
                            </td>
                            <td>
                                @if(Session::get('coupon'))
                                <a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
                                @endif
                            </td>
                            <td>
                            <?php
                                $customer_id = Session::get('customer_id');
                                if ($customer_id != NULL) {
                                ?>
                                    <a class="btn btn-default check_out" href="{{url('/checkout')}}">Thanh toán</a>

                                <?php
                                } else {
                                ?>
                                <a class="btn btn-default check_out" href="{{url('/login-checkout')}}">Thanh toán</a>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <li>Tổng tiền :<span>{{number_format($total,0,',','.')}}đ</span></li>
                                @if(Session::get('coupon'))
                                <li>

                                    @foreach(Session::get('coupon') as $key => $cou)
                                    @if($cou['coupon_condition']==1)
                                    Mã giảm : {{$cou['coupon_number']}} %
                                    <p>
                                        @php
                                        $total_coupon = ($total*$cou['coupon_number'])/100;
                                        echo '
                                    <p>
                                <li>Số tiền giảm:'.number_format($total_coupon,0,',','.').'đ</li>
                                </p>';
                                @endphp
                                </p>
                                <p>
                                    <li>Tổng đã giảm :{{number_format($total-$total_coupon,0,',','.')}}đ</li>
                                </p>
                                @elseif($cou['coupon_condition']==2)
                                Mã giảm : {{number_format($cou['coupon_number'],0,',','.')}} k
                                <p>
                                    @php
                                    $total_coupon = $total - $cou['coupon_number'];

                                    @endphp
                                </p>
                                <p>
                                    <li>Tổng đã giảm :{{number_format($total_coupon,0,',','.')}}đ</li>
                                </p>
                                @endif
                                @endforeach
                                </li>
                                @endif

                                <!-- <li>{{__('Thuế')}} <span></span></li>
                            <li>{{__('Phí vận chuyển')}} <span>Free</span></li> -->
                            </td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="5">
                                <center>
                                    @php
                                    echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
                                    @endphp
                                </center>
                            </td>
                        </tr>

                        @endif
                    </tbody>
            
            </form>
            @if(Session::get('cart'))
            <tr>
                <td>

                    <form method="POST" action="{{url('/check-coupon')}}">
                        @csrf
                        <input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>
                        <input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">

                    </form>
                </td>
            </tr>
            @endif
            </table>
        </div>


       


</section>

@endsection