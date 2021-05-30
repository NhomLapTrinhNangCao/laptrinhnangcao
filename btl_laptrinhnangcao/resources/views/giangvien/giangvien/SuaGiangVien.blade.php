@extends('giangvien.layout.Index')
@section('content')
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">SỬA THÔNG TIN GIẢNG VIÊN</h1>
    </div>
    <form class="user" action="giangvien/giangvien/sua/{{$giangvien->id}}" method="post" enctype="multipart/form-data">
        <hr />
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <h6 class="col-sm-4">Nhập tên giảng viên mới</h6>
            <input type="text" class="form-control form-control-user"
                   value="{{$giangvien->user->name}}" name="name">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập mã số giảng viên mới</h6>
            <input type="text" class="form-control form-control-user"
                   value="{{$giangvien->ms_giang_vien}}" name="ms_giang_vien">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập email </h6>
            <input type="email" class="form-control form-control-user"
                   placeholder="Nhập địa chỉ email" name="email" value="{{$giangvien->user->email}}" readonly="">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập mật khẩu mới</h6>
            <input type="password" class="form-control form-control-user"
                   placeholder="Nhập mật khẩu" name="password">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập lại mật khẩu </h6>
            <input type="password" class="form-control form-control-user"
                   placeholder="Nhập lại mật khẩu" name="passwordAgain">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Tải hình ảnh cá nhân</h6>
            <p>
                <img style="width:150px" src="upload/taikhoan/{{$giangvien->user->hinh}}" alt="">
            </p>
            <input class="form-control" style="height: 2.9rem; border-radius: 10rem" type="file" name="hinh" >
        </div>
        <input type="submit" value="Xác nhận" class="btn btn-primary btn-user btn-block" />
    </form>
    <br>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    @if(session('loi'))
        <div class="alert alert-success">
            {{session('loi')}}
        </div>
    @endif
@endsection

