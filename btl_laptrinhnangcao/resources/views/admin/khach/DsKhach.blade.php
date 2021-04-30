@extends('admin.layout.Index')
@section('content')
    <div style="margin-bottom:10px" class="col-sm-12">
        <a href="admin/khach/them">
            <button type="button" class="col-sm btn btn-info add-new">Thêm mới tài khoản khách</button>
        </a>
    </div>
    <div class="col-sm-12 card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách tài khoản khách</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Hình</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $tl)
                        <tr>
                            <td>{{$tl->id}}</td>
                            <td>{{$tl->name}}</td>
                            <td>{{$tl->email}}</td>
                            <td>
                                <img width="100px" src="upload/taikhoan/{{$tl->hinh}}">
                            </td>
                            <td><a href="admin/khach/xoa/{{$tl->id}}"><i class="far fa-trash-alt"></i></a></td>
                            <td><a href="admin/khach/sua/{{$tl->id}}"><i class="far fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

