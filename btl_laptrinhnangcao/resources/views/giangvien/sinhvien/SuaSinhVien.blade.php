@extends('giangvien.layout.Index')
@section('content')
    <div class="col-sm-4">
        <a href="giangvien/sinhvien/chon/{{Auth::user()->giangvien->id}}">
            <button type="button" class="btn btn-info add-new">Quay lại</button>
        </a>
    </div>
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">SỬA THÔNG TIN SINH VIÊN</h1>
    </div>
    <form class="user" action="giangvien/sinhvien/sua/{{$sinhvien->id}}" method="post" enctype="multipart/form-data">
        <hr />
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <h6 class="col-sm-4">Nhập tên sinh viên mới</h6>
            <input type="text" class="form-control form-control-user"
                   value="{{$sinhvien->user->name}}" name="name">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập mã số sinh viên mới</h6>
            <input type="text" class="form-control form-control-user"
                   value="{{$sinhvien->mssv}}" name="mssv">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập email </h6>
            <input type="email" class="form-control form-control-user"
                   placeholder="Nhập địa chỉ email" name="email" value="{{$sinhvien->user->email}}" readonly="">
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
                <img style="width:150px" src="upload/taikhoan/{{$sinhvien->user->hinh}}" alt="">
            </p>
            <input class="form-control" style="height: 2.9rem; border-radius: 10rem" type="file" name="hinh" >
        </div>

        <div class="form-group">
            <h6 class="col-sm-4">Nhập lớp học</h6>
            <select class="form-control" style="font-size: 0.8rem;border-radius: 10rem;height: 3.1rem;"
                    name="lop_hoc">
                @foreach($lophoc as $tl)
                    <option readonly=""
                        @if($sinhvien->id_lop_hoc==$tl->id)
                        {{"selected"}}
                        @endif
                        value="{{$tl->id}}"->{{$tl->ten_lop_hoc}}</option>
                @endforeach
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

