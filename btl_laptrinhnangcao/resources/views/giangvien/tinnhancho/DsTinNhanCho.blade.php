@extends('giangvien.layout.Index')
@section('content')
    <div class="col-sm-12 card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách tin nhắn chờ</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Email</th>
                        <th>Nội dung</th>
                        <th>Tình trạng</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tinnhancho as $tl)
                        <tr>
                            <td>{{$tl->name}}</td>
                            <td>{{$tl->email}}</td>
                            <td>{{$tl->noi_dung}}</td>
                            @if($tl->duyet == false)
                                <td><a style="color: steelblue" href="giangvien/tinnhancho/sua/{{$tl->id}}" ><button type="button" class="btn btn-outline-primary btn-sm">Chờ xử lý</button></a></td>
                            @else
                                <td><a style="color: steelblue" href="giangvien/tinnhancho/sua/{{$tl->id}}" ><button type="button" class="btn btn-outline-primary btn-sm">Đã xử lý</button></a></td>
                            @endif
                            <td><a href="giangvien/tinnhancho/xoa/{{$tl->id}}"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center">
                    {!! $tinnhancho->links() !!}
                </div>
            </div>
        </div>
    </div>
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
@endsection

