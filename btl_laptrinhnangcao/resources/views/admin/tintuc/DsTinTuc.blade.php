@extends('admin.layout.Index')
@section('content')
    <div style="margin-bottom:10px" class="col-sm-12">
        <a href="admin/tintuc/them">
            <button type="button" class="col-sm btn btn-info add-new">Thêm mới tin tức</button>
        </a>
    </div>
    <div class="col-sm-12 card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách tin tức</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Tóm tăt</th>
                        <th>Loại tin</th>
                        <th>Nội dung</th>
                        <th>Số lượt xem</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tintuc as $tl)
                        <tr>
                            <td>{{$tl->id}}</td>
                            <td>
                                <p>{{$tl->tieu_de}}</p>
                                <img width="100px" src="upload/tintuc/{{$tl->hinh}}">
                            </td>
                            <td>{{$tl->tom_tat}}</td>
                            <td>{{$tl->loaitin->ten}}</td>
                            <td>{!!$tl->noi_dung!!}</td>
                            <td>{{$tl->so_luot_xem}}</td>
                            <td><a href="admin/tintuc/xoa/{{$tl->id}}"><i class="far fa-trash-alt"></i></a></td>
                            <td><a href="admin/tintuc/sua/{{$tl->id}}"><i class="far fa-edit"></i></a></td>
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

