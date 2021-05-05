@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CẬP NHẬT DANH MỤC SẢN PHẨM
                        </header>
                        <div class="panel-body">
                        <?php
                    $message = Session::get('TEN');
                    if($message)
                    {
                    echo '<span class="text-alert">',$message.'</span>' ;
                    $message = Session::put('TEN', null);
                    }
                    ?>
                    <div class="panel-body">
                        @foreach ( $edit_category_product as $key => $edit_value)
                            <div class="position-center">

                                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$edit_value->category_name}}" class="form-control" name="category_product_name" placeholder=" Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea  style ="resize: none" row="5"class="form-control" name="category_product_desc" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Từ khóa danh mục</label>
                                    <textarea  style ="resize: none" row="5"class="form-control" name="category_product_keywords" placeholder="Từ khóa danh mục">
                                    {{$edit_value->meta_keywords }}</textarea>
                                </div>
                                
                                <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
            @endsection