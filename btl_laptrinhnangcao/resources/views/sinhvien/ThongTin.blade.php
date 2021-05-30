@extends('sinhvien.layout.Index')
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
            <span style="color:blue">Sinh viên</span>
        </li>
    </ul>
@endsection


