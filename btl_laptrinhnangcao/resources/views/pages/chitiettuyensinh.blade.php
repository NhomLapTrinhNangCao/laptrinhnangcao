@extends('layout.index')
@section('content')
    <div class="inner-page-banner-area" style="background-image: url('#');">
        <div class="container">
            <div class="pagination-area">
                <h1>Thông tin tuyển sinh</h1>
                <ul>
                    <!-- <li><a href="#">Home</a> -</li> -->
                    <li>{{$tuyensinh->tieu_de}}</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Nội Dung Area Start Here -->
    {!!$tuyensinh->noi_dung!!}
    <!-- Nội Dung Area End Here -->
@endsection
