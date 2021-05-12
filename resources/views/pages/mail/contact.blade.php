@extends('welcome')
@section('content')
<form action="" method="POST" role="form">
<div style="margin-left: 5%; margin-bottom: 10%;">
    <legend style="color: #ff7d94;" >Liên hệ</legend>
    @csrf
    <div class="form-group">
        <label for="">Họ tên</label>
        <input type="text" class="form-control" name="name" placeholder="Điền họ tên">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email của bạn">
    </div>

    <div class="form-group">
        <label for="">Số điện thoại</label>
        <input class="form-control" name="phone" placeholder="Số điện thoại nè">
    </div>

    <div class="form-group">
        <label for="">Nội dung</label>
        <textarea class="form-control" name="content" rows="3" placeholder="Nội dung bạn muốn gửi"></textarea>
    </div>

    <button style="border-radius: 5px;" type="submit" class="btn btn-primary">Submit</button>

</div>
</form>
@endsection