@extends('giangvien.layout.Index')
@section('content')
    <div class="col-sm-4">
        <a href="giangvien/tintuc/danhsach">
            <button type="button" class="btn btn-info add-new">Quay lại</button>
        </a>
    </div>
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">SỬA TIN TỨC</h1>
    </div>
    <form class="user" action="giangvien/tintuc/sua/{{$tintuc->id}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <hr />
        <div class="form-group">
            <h6 class="col-sm-4">Nhập tiêu đề</h6>
            <input type="text" class="form-control form-control-user"
                   placeholder="Nhập tiêu đề" name="tieu_de" value="{{$tintuc->tieu_de}}">
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Tải hình ảnh tiêu đề</h6>
            <p>
            <img style="width:150px" src="upload/tintuc/{{$tintuc->hinh}}" alt="">
            </p>
            <input class="form-control" style="height: 2.9rem; border-radius: 10rem" type="file" name="hinh" >
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập thể loại</h6>
            <select class="form-control" style="font-size: 0.8rem;border-radius: 10rem;height: 3.1rem;"
                    name="ten_the_loai">
                @foreach($loaitin as $tl)
                    <option
                    @if($tintuc->id_loai_tin==$tl->id)
                        {{"selected"}}
                        @endif
                        value="{{$tl->id}}">{{$tl->ten}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập tóm tắt</h6>
            <textarea class="form-control" name="tom_tat" rows="3" placeholder="Nhập tóm tắt" >
                {{$tintuc->tom_tat}}
            </textarea>
        </div>
        <div class="form-group">
            <h6 class="col-sm-4">Nhập nội dung</h6>
            <textarea class="form-control" name="noi_dung" id="editor"  placeholder="Nhập nội dung">
                {{$tintuc->noi_dung}}
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
    @if(session('loi'))
        <div class="alert alert-danger">
            {{session('loi')}}
        </div>
    @endif

    <div class="col-sm-12 card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách bình luận</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Người dung</th>
                        <th>Ngày đăng</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tintuc->binhluan as $tl)
                        <tr>
                            <td>{{$tl->id}}</td>
                            <td>{{$tl->user->name}}</td>
                            <td>{{$tl->created_at}}</td>
                            <td><a href="giangvien/binhluan/xoa/{{$tl->id}}/{{$tintuc->id}}"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

