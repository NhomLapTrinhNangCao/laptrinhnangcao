@extends('layout.index')
@section('content')

<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="background-image: url('giaodien/img/banner/4.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Thông Tin Tuyển Sinh</h1>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Courses Page 1 Area Start Here -->
<div class="courses-page-area1">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-md-push-3">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="courses-page-top-area">
                            <div class="courses-page-top-left">
                                <p><strong>Các chương trình đào tạo</strong></p>
                            </div>
                            <!-- <div class="courses-page-top-right">
                                <ul>
                                    <li><a href="#gried-view" data-toggle="tab" aria-expanded="false"><i class="fa fa-th-large"></i></a></li>
                                    <li class="active"><a href="#list-view" data-toggle="tab" aria-expanded="true"><i class="fa fa-list"></i></a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- <div role="tabpanel" class="tab-pane" id="gried-view">
                        </div> -->
                        <!-- Listed product show -->
                        <div role="tabpanel" class="tab-pane active" id="list-view">
                            @foreach($tuyensinh as $ts)
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="courses-box3">
                                    <div class="single-item-wrapper">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="courses-img-wrapper hvr-bounce-to-right">
                                                    <img class="img-responsive" src="../upload/tuyensinh/{{$ts->hinh}}" alt="courses">
                                                    <a href="chitietts/{{$ts->id}}"><i class="fa fa-link" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="courses-content-wrapper">
                                                    <h3 class="item-title"><a href="chitietts/{{$ts->id}}">{{$ts->tieu_de}}</a></h3>
                                                    <p class="item-content">
                                                        {{$ts->tom_tat}}
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                            <ul class="courses-info">
                                                                <li><span>Mã xét tuyển</span>
                                                                    <br>{{$ts->ma_tuyen_sinh}}</li>
                                                                <li><span>Chỉ tiêu</span>
                                                                    <br>{{$ts->so_chi_tieu}}</li>
                                                                <li><span>Thời gian đào tạo</span>
                                                                    <br>{{$ts->thoi_gian_dao_tao}} năm</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 col-md-pull-9">
                <div class="sidebar">

                    <div class="sidebar-box">
                        <div class="sidebar-box-inner">
                            <h3 class="sidebar-title">Chương trình</h3>
                            <ul class="sidebar-categories">
                                @foreach($tuyensinh as $ts)
                                <li><a href="chitietts/{{$ts->id}}">{{$ts->tieu_de}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Courses Page 1 Area End Here -->
@endsection
