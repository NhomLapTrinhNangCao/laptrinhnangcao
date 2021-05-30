@extends('lanhdao.layout.Index')
@section('content')
    <ul class="list-group text-dark">
        <li class="list-group-item">
            <h6>ID Tài Khoản</h6>
            <span style="color:blue">{{Auth::user()->id}}</span>
        </li>
        <li class="list-group-item">
            <h6>Họ và tên</h6>
            <span style="color:blue">{{Auth::user()->name}}</span>
        </li>
        <li class="list-group-item">
            <h6>Hình đại diện</h6>
            <img width="100px" src="upload/taikhoan/{{Auth::user()->hinh}}">
        </li>
        <li class="list-group-item">
            <h6>Email</h6>
            <span style="color:blue">{{Auth::user()->email}}</span>
        </li>
        <li class="list-group-item">
            <h6>Chức vụ</h6>
            <span style="color:blue">Lãnh đạo</span>
        </li>
        <li class="list-group-item">
            <h6>Tên chức vụ</h6>
            <span style="color:blue">{{Auth::user()->giangvien->lanhdao->ten_chuc_vu}}</span>
        </li>
        <li class="list-group-item">
            <h6>Vị trí công tác</h6>
            <span style="color:blue">{{Auth::user()->giangvien->vitri->noi_cong_tac}}</span>
        </li>
    </ul>

@endsection


