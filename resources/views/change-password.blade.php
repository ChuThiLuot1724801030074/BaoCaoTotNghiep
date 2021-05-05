<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="./frontend/css/password.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div style="margin-top:50px;" class=" text-center mt-5 ">
        <h1>Đổi mật khẩu</h1>
</div>
    <div class="row ">
        <div style="padding-left:250px; margin-top: 60px;" class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    @include('message')
                    <div class="container text-center">
                        <form id="contact-form" role="form" action="/change-password" method="POST"> 
                            @csrf
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                        <label for="form_name">Nhập mật khẩu cũ</label> 
                                        <input id="form_name" type="password" name="password" class="form-control" required="required" data-error="Valid field is required."> </div>
                                    </div>
                                    
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                        <label for="form_email">Nhập mật khẩu mới</label> 
                                        <input id="form_email" type="password" name="new_password" class="form-control" required="required" data-error="Valid field is required."> </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                        <label for="form_email">Nhập lại mật khẩu mới</label> 
                                        <input id="form_email" type="password" name="confirm_new_password" class="form-control" required="required" data-error="Valid field is required."> </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    
                                    <div  class="col-md-6"> <input style="background: #ff7d94;border-color:#ff7d94"  type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Gửi" > </div>
                                    <link to="{{URL::to('/login_checkout')}}"></Link>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /.8 -->
        </div> <!-- /.row-->
    </div>
</div>
</body>
</html>
