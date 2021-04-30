@extends('admin.layout.Index')
@section('content')
    <div class="col-sm-4">
        <a href="admin/vitri/danhsach">
            <button type="button" class="btn btn-info add-new">Quay lại</button>
        </a>
    </div>
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">SỬA VỊ TRÍ CÔNG VIỆC</h1>
    </div>
    <form class="user" action="admin/vitri/sua/{{ $vitri->id }}" method="post">
        <hr />
        <div class="form-group">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <h6 class="col-sm-4">Sửa vị trí công việc</h6>
            <input type="text" class="form-control form-control-user" name="noi_cong_tac"
                    value="{{$vitri->noi_cong_tac}}">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập mô tả</h6>
            <textarea class="form-control" name="mo_ta" rows="5" placeholder="Nhập mô tả" >
                {{$vitri->mo_ta}}
            </textarea>
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
@endsection

