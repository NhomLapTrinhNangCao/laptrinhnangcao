@extends('layout.index')
@section('content')
    <!-- Inner Page Banner Area Start Here -->
    <div class="inner-page-banner-area" style="background-image: url('giaodien/img/banner/3.jpg');">
        <div class="container">
            <div class="pagination-area">
                <h1>Cán bộ</h1>

            </div>
        </div>
    </div>
    <!-- Inner Page Banner Area End Here -->
    <!-- Lecturers Page 2 Area Start Here -->
    <div class="lecturers-page2-area">
        <div class="container" style=" border-top: 1.5em solid #fdc800; border-bottom: 1px solid #51758d; ">
            <h2><b>Giới thiệu chung</b></h2>
            <p style="font-size: 18px;">
                {{$vitrif->mo_ta}}
            </p>
        </div>

        <div class="container" id="inner-isotope">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="course-details-inner">

                    </div>
                    <div class="section-divider"></div>
                </div>
            </div>


            <div class="row featuredContainer">

                @foreach($giangvien as $gv)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  ">
                    <div class="single-item">
                        <div class="lecturers-item-wrapper">
                            <a href="#"><img class="img-responsive" src="upload/taikhoan/{{$gv->user->hinh}}" alt="team"></a>
                            <div class="lecturers-content-wrapper">
                                <h3><a href="#">{{$gv->user->name}}</a></h3>
                                @if($gv->user->quyen==1)
                                    @if(isset($gv->lanhdao))
                                        <span>{{$gv->lanhdao->ten_chuc_vu}}</span>
                                    @else<span>Admin</span>
                                    @endif
                                @endif
                                @if($gv->user->quyen==2)
                                    <span>{{$gv->lanhdao->ten_chuc_vu}}</span>
                                @endif
                                @if($gv->user->quyen==3)
                                    <span>Giảng viên</span>
                                @endif
                                <p>{{$gv->vitri->noi_cong_tac}}
                                <br>Email: {{$gv->user->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Lecturers Page 2 Area End Here -->

@endsection
