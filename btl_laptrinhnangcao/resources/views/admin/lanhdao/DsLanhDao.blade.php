@extends('admin.layout.Index')
@section('content')
    <div style="margin-bottom:10px" class="col-sm-12">
        <a href="admin/lanhdao/them">
            <button type="button" class="col-sm btn btn-info add-new">Thêm mới lãnh đạo</button>
        </a>
    </div>
    <div class="col-sm-12 card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách lãnh đạo</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Chức vụ</th>
                        <th>Tên lãnh đạo</th>
                        <th>Mã số giảng viên</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lanhdao as $tl)
                        <tr>
                            <td>{{$tl->ten_chuc_vu}}</td>
                            <td>{{$tl->giangvien->user->name}}</td>
                            <td>{{$tl->giangvien->ms_giang_vien}}</td>
                            <td><a href="admin/lanhdao/xoa/{{$tl->id}}"><i class="far fa-trash-alt"></i></a></td>
                            <td><a href="admin/lanhdao/sua/{{$tl->id}}"><i class="far fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

