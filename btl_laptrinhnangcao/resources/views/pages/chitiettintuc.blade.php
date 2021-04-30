@extends('layout.index')
@section('content')
    <!-- Inner Page Banner Area Start Here -->
    <div class="inner-page-banner-area" style="background-image: url('giaodien/img/banner/2.jpg');">
        <div class="container">
            <div class="pagination-area">
                <h1>Tin tức</h1>
                <ul>
                    <li>{{$tintuc->loaitin->ten}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Inner Page Banner Area End Here -->
    <!-- News Details Page Area Start Here -->
    <div class="news-details-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <div class="row news-details-page-inner">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="news-img-holder">
                                <img src="upload/tintuc/{{$tintuc->hinh}}" class="img-responsive" alt="research">
                                <ul class="news-date1">
                                    <li>{{$tintuc->updated_at->format('d M')}} </li>
                                    <li>{{$tintuc->updated_at->format('Y')}}</li>
                                </ul>
                            </div>
                            <h2 class="title-default-left-bold-lowhight">{{$tintuc->tieu_de}}</h2>
                            <ul class="title-bar-high news-comments">
                                <li>
                                <span>Người đăng: {{$tintuc->user->name}} <br> Chức vụ:
                                                @if($tintuc->user->quyen==1)
                                        @if(isset($tintuc->user->giangvien->lanhdao))
                                            {{$tintuc->user->giangvien->lanhdao->ten_chuc_vu}}
                                        @else GIẢNG VIÊN
                                        @endif
                                    @endif
                                    @if($tintuc->user->quyen==2)
                                        {{$tintuc->user->giangvien->lanhdao->ten_chuc_vu}}
                                    @endif
                                    @if($tintuc->user->quyen==3)
                                        GIẢNG VIÊN
                                    @endif
                                     _ {{$tintuc->user->giangvien->vitri->noi_cong_tac}}
                                            </span>
                                </li>
                                <li><i class="fa fa-comments-o" aria-hidden="true"></i><span>( {{$tintuc->so_luot_xem}} ) Lượt xem </span></li>
                            </ul>
                           {!! $tintuc -> noi_dung !!}
                            <h3 class="sidebar-title">({{$binhluan->count()}}) Bình luận</h3>
                            @foreach($binhluan as $bl)
                            <div class="course-details-comments">


                                <div class="media">
                                    <a class="pull-left">
                                        <img alt="Comments" src="upload/taikhoan/{{$bl->user->hinh}}" class="media-object" style="width:70px; height: 70px;">
                                    </a>
                                    <div class="media-body">
                                        <h3>{{$bl->user->name}}</a></h3>
                                        <h4>
                                            @if($bl->user->quyen==1)
                                                @if(isset($bl->user->giangvien->lanhdao))
                                                    {{$bl->user->giangvien->lanhdao->ten_chuc_vu}}
                                                @else GIẢNG VIÊN
                                                @endif
                                            @elseif($bl->user->quyen==2)
                                                {{$bl->user->giangvien->lanhdao->ten_chuc_vu}}
                                            @elseif($bl->user->quyen==3)
                                                GIẢNG VIÊN
                                            @elseif($bl->user->quyen==4)
                                                SINH VIÊN_{{$bl->user->sinhvien->mssv}}
                                            @elseif($bl->user->quyen==4)
                                                KHÁCH
                                            @endif
                                        </h4>
                                        <p>{{$bl->noi_dung}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="leave-comments">
                                <h3 class="sidebar-title">Nhập bình luận</h3>
                                <div class="row">
                                    <div class="contact-form">
                                        <form action="thembinhluan/{{$tintuc->id}}" method="post">
                                            <fieldset>
                                                @if(Auth::check())

                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <textarea placeholder="Nhập bình luận ..." class="textarea form-control" name="noi_dung" rows="8" cols="20"></textarea>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group margin-bottom-none">
                                                        <button type="submit" class="view-all-accent-btn">Bình luận</button>
                                                    </div>
                                                </div>
                                                @else<h4 style="color: blue;margin-left: 2%" class="sidebar-title">Bạn cần đăng nhập để sử dụng tính năng này</h4>
                                                @endif
                                                    @if(count($errors)>0)
                                                        <div class="alert alert-danger">
                                                            @foreach($errors->all() as $err)
                                                                {{$err}}<br>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    @if(session('thongbao'))
                                                        <div class="alert alert-success">
                                                            {{session('thongbao')}}
                                                        </div>
                                                    @endif
                                                    @if(session('loi'))
                                                        <div class="alert alert-success">
                                                            {{session('loi')}}
                                                        </div>
                                                    @endif
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="sidebar">
                        <div class="sidebar-box">
                            <div class="sidebar-box-inner">
                                <h3 class="sidebar-title">Tin tức mới nhất</h3>
                                <div class="sidebar-latest-research-area">
                                    <ul>
                                        @foreach($tintucn as $tt)
                                        <li>
                                            <div class="latest-research-img">
                                                <a href="chitiettintuc/{{$tt->id}}"><img src="upload/tintuc/{{$tt->hinh}}" class="img-responsive" alt="skilled"></a>
                                            </div>
                                            <div class="latest-research-content">
                                                <h4>{{$tt->updated_at->format('d M Y')}}</h4>
                                                <p>{{$tt->tieu_de}}</p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- News Page Area End Here -->

@endsection
