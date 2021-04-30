@extends('admin.layout.Index')
@section('content')
    <div class="col-sm-4">
        <a href="admin/lophoc/danhsach">
            <button type="button" class="btn btn-info add-new">Quay lại</button>
        </a>
    </div>
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">SỬA THÔNG TIN LỚP HỌC</h1>
    </div>
    <form class="user" action="admin/lophoc/sua/{{$lophoc->id}}" method="post">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <hr />
        <div class="form-group">
            <h6 class="col-sm-4">Nhập tên lớp học mới</h6>
            <input type="text" class="form-control form-control-user"
                   placeholder="Nhập tên lớp học" name="ten_lop_hoc" value="{{$lophoc->ten_lop_hoc}}">
        </div>
        <div class="form-group">
        <h6 class="col-sm-4">Nhập khóa học</h6>
        <select class="form-control" style="font-size: 0.8rem;border-radius: 10rem;height: 3.1rem;"
                name="nien_khoa" >
            @foreach($khoahoc as $tl)
                <option
                    @if($lophoc->id_khoa_hoc==$tl->id)
                    {{"selected"}}
                    @endif
                    value="{{$tl->id}}">{{$tl->nien_khoa}}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập giáo viên chủ nhiệm</h6>
            <select class="form-control" style="font-size: 0.8rem;border-radius: 10rem;height: 3.1rem;"
                    name="name">
                @foreach($giangvien as $tl)
                    <option
                        @if($lophoc->id_giang_vien==$tl->id)
                        {{"selected"}}
                        @endif
                        value="{{$tl->id}}">{{$tl->ms_giang_vien}}_{{$tl->user->name}}_{{$tl->vitri->noi_cong_tac}}</option>
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

