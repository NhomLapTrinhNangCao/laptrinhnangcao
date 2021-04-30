@extends('admin.layout.Index')
@section('content')
    <div style="margin-bottom:10px" class="col-sm-12">
        <a href="admin/vitri/them">
        <button type="button" class="col-sm btn btn-info add-new">Thêm mới vị trí công việc</button>
        </a>
    </div>
    <div class="col-sm-12 card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách vị trí công việc</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên vị trí công việc</th>
                        <th>Mô tả</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($vitri as $tl)
                        <tr>
                            <td>{{$tl->id}}</td>
                            <td>{{$tl->noi_cong_tac}}</td>
                            <td>{{$tl->mo_ta}}</td>
                            <td><a href="admin/vitri/xoa/{{$tl->id}}"><i class="far fa-trash-alt"></i></a></td>
                            <td><a href="admin/vitri/sua/{{$tl->id}}"><i class="far fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

