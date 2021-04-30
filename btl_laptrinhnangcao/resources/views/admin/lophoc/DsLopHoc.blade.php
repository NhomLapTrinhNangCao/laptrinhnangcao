@extends('admin.layout.Index')
@section('content')
    <div style="margin-bottom:10px" class="col-sm-12">
        <a href="admin/lophoc/them">
            <button type="button" class="col-sm btn btn-info add-new">Thêm mới lớp hoc</button>
        </a>
    </div>
    <div class="col-sm-12 card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách lớp hoc</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên lớp học</th>
                        <th>Khóa học</th>
                        <th>Giáo viên chủ nhiệm</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lophoc as $tl)
                        <tr>
                            <td>{{$tl->id}}</td>
                            <td>{{$tl->ten_lop_hoc}}</td>
                            <td>{{$tl->khoahoc->nien_khoa}}</td>
                            <td>{{$tl->giangvien->user->name}}</td>
                            <td><a href="admin/lophoc/xoa/{{$tl->id}}"><i class="far fa-trash-alt"></i></a></td>
                            <td><a href="admin/lophoc/sua/{{$tl->id}}"><i class="far fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

