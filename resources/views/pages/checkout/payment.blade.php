@extends('welcome')
@section('content')
<section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">{{__('Trang chủ')}}</a></li>
                <li class="active">{{__('Thanh toán giỏ hàng')}} </li>
            </ol>
        </div>


        <div class="review-payment">
            <h2>{{__('Xem lại giỏ hàng')}}</h2>
        </div>
        <div class="table-responsive cart_info">
            <?php
                $content= Cart::content();
              
                ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">{{__('Hình ảnh')}}</td>
                        <td class="description">{{__('Mô tả')}}</td>
                        <td class="price">{{__('Giá')}}</td>
                        <td class="quantity">{{__('Số lượng')}}</td>
                        <td class="total">{{__('Tổng tiền')}}</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to('uploads/product/'.$v_content->options->image)}}"
                                    height="50px" width="50px" alt="" />
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{substr($v_content->name,0,20)."..."}}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($v_content->price).' '.'VNĐ'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">

                                <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                    {{ csrf_field()}}
                                    <input class="cart_quantity_input" type="text" name="cart_quantity"
                                        value="{{($v_content->qty)}}" autocomplete="off" size="2">

                                    <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart"
                                        class="form-controll">

                                    <input type="submit" value="Cập nhật" name="update_qty"
                                        class="btn btn-default btn-sm">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php
                                $subtotal= $v_content->price* $v_content->qty;
                                echo number_format($subtotal).' '.'VNĐ';

                                    ?>

                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i
                                    class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <h4 style="margin-top: 40px 0;font-size: 20px; line-height: 2.8; margin-left:5px;" >{{__(' Phương thức thanh toán')}}</h4>
        <form method="POST" action="{{URL::to('/order-place')}}">
        {{csrf_field()}}
        <div class="payment-options">
            <span>
                <label><input style="margin-left: 5px;"  name="payment_option" value=" 1" type="checkbox">{{__(' Ví AirPay')}}</label>
            </span>
            <span>
                <label><input name="payment_option" value=" 2" type="checkbox">{{__(' Thanh toán khi nhận hàng')}}</label>
            </span>
            <span>
                <label><input name="payment_option" value=" 2" type="checkbox"> {{__('Thẻ ghi nợ')}}</label>
            </span>
            <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">

            <!-- <span>
                <label><input type="checkbox"> Paypal</label>
            </span> -->
        </div>
        </form>
    </div>
</section>
<!--/#cart_items-->
@endsection