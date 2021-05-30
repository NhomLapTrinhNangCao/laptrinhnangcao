@extends('giangvien.layout.Index')
@section('content')
    <div style="margin-bottom:10px" class="col-sm-12">
        <a href="giangvien/sinhvien/them/{{$id}}">
            <button type="button" class="col-sm btn btn-info add-new">Thêm mới tài khoản sinh viên</button>
        </a>
    </div>
    <div class="col-sm-12 card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản sinh viên</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Mã số</th>
                        <th>Email</th>
                        <th>Hình</th>
                        <th>Lớp học</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sinhvien as $tl)
                        <tr>
                            <td>{{$tl->id}}</td>
                            <td>{{$tl->user->name}}</td>
                            <td>{{$tl->mssv}}</td>
                            <td>{{$tl->user->email}}</td>
                            <td>
                                <img width="100px" src="upload/taikhoan/{{$tl->user->hinh}}">
                            </td>
                            <td>{{$tl->lophoc->ten_lop_hoc}}</td>
                            <td><a href="giangvien/sinhvien/xoa/{{$tl->id}}"><i class="far fa-trash-alt"></i></a></td>
                            <td><a href="giangvien/sinhvien/sua/{{$tl->id}}"><i class="far fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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

