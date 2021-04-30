@extends('admin.layout.Index')
@section('content')
    <div class="col-sm-4">
        <a href="admin/tuyensinh/danhsach">
            <button type="button" class="btn btn-info add-new">Quay lại</button>
        </a>
    </div>
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">THÊM MỚI THÔNG TIN TUYỂN SINH</h1>
    </div>
    <form class="user" action="admin/tuyensinh/them" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <hr />
        <div class="form-group">
            <h6 class="col-sm-4">Nhập tiêu đề</h6>
            <input type="text" class="form-control form-control-user"
                   placeholder="Nhập tiêu đề" name="tieu_de">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Tải hình ảnh tiêu đề</h6>
            <input class="form-control" style="height: 2.9rem; border-radius: 10rem" type="file" name="hinh" >
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập tóm tắt</h6>
            <textarea class="form-control" name="tom_tat" rows="3" placeholder="Nhập tóm tắt"></textarea>
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập nội dung</h6>
            <textarea class="form-control" name="noi_dung" id="editor3"  placeholder="Nhập nội dung"></textarea>
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập mã tuyển sinh</h6>
            <input type="text" class="form-control form-control-user"
                   placeholder="Nhập mã tuyển sinh" name="ma_tuyen_sinh">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập số chỉ tiêu</h6>
            <input type="text" class="form-control form-control-user"
                   placeholder="Nhập số chỉ tiêu" name="so_chi_tieu">
        </div>

        <div class="form-group">
            <h6 class="col-sm-4">Nhập thời gian đào tạo</h6>
            <input type="text" class="form-control form-control-user"
                   placeholder="Nhập thời gian đào tạo" name="thoi_gian_dao_tao">
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
        <div class="alert alert-danger">
            {{session('loi')}}
        </div>
    @endif
@endsection
