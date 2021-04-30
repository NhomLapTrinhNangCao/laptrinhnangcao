@extends('admin.layout.Index')
@section('content')
    <div class="col-sm-4">
        <a href="admin/giangvien/chon">
            <button type="button" class="btn btn-info add-new">Quay lại</button>
        </a>
    </div>
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">THÊM MỚI GIẢNG VIÊN</h1>
    </div>
    <form class="user" action="admin/giangvien/them/{{$id}}" method="post" enctype="multipart/form-data">
        <hr />
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <h6 class="col-sm-4">Nhập tên giảng viên mới</h6>
            <input type="text" class="form-control form-control-user"
                   placeholder="Nhập tên người dùng" name="name">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập mã số giảng viên mới</h6>
            <input type="text" class="form-control form-control-user"
                   placeholder="Nhập mã số giảng viên" name="ms_giang_vien">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập email mới</h6>
            <input type="email" class="form-control form-control-user"
                   placeholder="Nhập địa chỉ email" name="email">
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
            <input class="form-control" style="height: 2.9rem; border-radius: 10rem" type="file" name="hinh" >
        </div>

        <div class="form-group">
            <h6 class="col-sm-4">Nhập vị trí công tác</h6>
            <select class="form-control" style="font-size: 0.8rem;border-radius: 10rem;height: 3.1rem;"
                    name="vi_tri">
                    <option value="{{$id}}"->{{$vitri->noi_cong_tac}}</option>
            </select>
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập quyền của giảng viên</h6>
            <select class="form-control" style="font-size: 0.8rem;border-radius: 10rem;height: 3.1rem;"
                    name="quyen">
                <option value=3>Giảng viên</option>
                <option value=1>Admin</option>
            </select>
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
