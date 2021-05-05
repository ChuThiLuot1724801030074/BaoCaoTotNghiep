@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM SẢN PHẨM
                        </header>
                        <div style="background-color: #ddede0;" class="panel-body" >
                        <?php
                    $message = Session::get('TEN');
                    if($message)
                    {
                    echo '<span class="text-alert">',$message.'</span>' ;
                    $message = Session::put('TEN', null);
                    }
                    ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" data-validation="lenght" data-validation-lenght="min10" data-validation-error-msg="Vui lòng nhập ít nhất 10 kí tự" class="form-control" name="product_name" id="exampleInputEmail1" placeholder=" Tên sản phẩm" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">SL sản phẩm</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Làm ơn điền số lượng" name="product_quantity" class="form-control" id="exampleInputEmail1" placeholder="Điền số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="product_slug" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" placeholder=" Giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá khuyến mãi</label>
                                    <input type="text" class="form-control" name="product_promo" id="exampleInputEmail1" placeholder=" Giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Size</label>
                                    <input type="text" class="form-control" name="product_size" id="exampleInputEmail1" placeholder=" Size">
                                </div>
                               <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" name="product_image" id="exampleInputEmail1" placeholder=" Hình ảnh sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea  style ="resize: none" row="5"class="form-control" name="product_desc" id="class" placeholder="Mô tả danh mục"></textarea>
                                </div>
                             
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea  style ="resize: none" row="8"class="form-control" name="product_content" id="ckeditor1" placeholder="Nội dung sản phẩm"></textarea>
                                </div>
                               
                               
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                   <select name="product_cate" class="form-control input-sm m-bot15">
                                   @foreach($cate_product as $key=> $cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                            </select>
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1">Thương hiệu</label>
                                   <select name="product_brand" class="form-control input-sm m-bot15">
                                       @foreach($brand_product as $key=> $brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Hiển thị</label>
                                   <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                                </div>
                                
                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            @endsection