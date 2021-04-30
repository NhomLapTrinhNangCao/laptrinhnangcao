@extends('admin.layout.Index')
@section('content')
    <div style="margin-bottom:10px" class="col-sm-12">
        <a href="admin/tuyensinh/them">
            <button type="button" class="col-sm btn btn-info add-new">Thêm mới thông tin tuyển sinh</button>
        </a>
    </div>
    <div class="col-sm-12 card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách thông tin tuyển sinh</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Tóm tăt</th>
                        <th>Nội dung</th>
                        <th>Số lượt xem</th>
                        <th>Mã tuyến sinh</th>
                        <th>Số chỉ tiêu</th>
                        <th>Thời gian đào tạo</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tuyensinh as $tl)
                        <tr>
                            <td>{{$tl->id}}</td>
                            <td>
                                <p>{{$tl->tieu_de}}</p>
                                <img width="100px" src="upload/tuyensinh/{{$tl->hinh}}">
                            </td>
                            <td>{{$tl->tom_tat}}</td>
                            <td>{!!$tl->noi_dung!!}</td>
                            <td>{{$tl->so_luot_xem}}</td>
                            <td>{{$tl->ma_tuyen_sinh}}</td>
                            <td>{{$tl->so_chi_tieu}}</td>
                            <td>{{$tl->thoi_gian_dao_tao}}</td>
                            <td><a href="admin/tuyensinh/xoa/{{$tl->id}}"><i class="far fa-trash-alt"></i></a></td>
                            <td><a href="admin/tuyensinh/sua/{{$tl->id}}"><i class="far fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
@endsection

