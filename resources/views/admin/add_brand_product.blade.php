@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            THÊM THƯƠNG HIỆU MỤC SẢN PHẨM
                        </header>
                        <div style="background-color: #ddede0;" class="panel-body">
                        <?php
                    $message = Session::get('TEN');
                    if($message)
                    {
                    echo '<span class="text-alert">',$message.'</span>' ;
                    $message = Session::put('TEN', null);
                    }
                    ?>
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" class="form-control" name="brand_product_name" placeholder=" Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea  style ="resize: none" row="5"class="form-control" id="ckeditor2" name="brand_product_desc" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">Hiển thị</label>

                                   <select name="brand_product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                              
                            </select>
                                </div>
                                
                                <button type="submit" name="add_brand_product" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            @endsection