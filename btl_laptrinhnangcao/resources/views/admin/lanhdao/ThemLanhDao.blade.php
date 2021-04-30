@extends('admin.layout.Index')
@section('content')
    <div class="col-sm-4">
        <a href="admin/lanhdao/danhsach">
            <button type="button" class="btn btn-info add-new">Quay lại</button>
        </a>
    </div>
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">THÊM MỚI LÃNH ĐẠO</h1>
    </div>
    <form class="user" action="admin/lanhdao/them" method="post">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <hr />
        <div class="form-group">
            <h6 class="col-sm-4">Nhập tên chức vụ lãnh đạo mới</h6>
            <input type="text" class="form-control form-control-user"
                   placeholder="Nhập chức vụ lãnh đạo" name="ten_chuc_vu">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập lãnh đạo chức vụ</h6>
            <select class="form-control" style="font-size: 0.8rem;border-radius: 10rem;height: 3.1rem;"
                    name="name">
                @foreach($giangvien as $tl)
                    <option value="{{$tl->id}}">{{$tl->ms_giang_vien}}_{{$tl->user->name}}_{{$tl->vitri->noi_cong_tac}}</option>
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
