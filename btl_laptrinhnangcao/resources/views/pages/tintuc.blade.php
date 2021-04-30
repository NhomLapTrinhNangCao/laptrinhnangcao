@extends('layout.index')
@section('content')
    <!-- Inner Page Banner Area Start Here -->
    <div
        class="inner-page-banner-area"
        style="background-image: url('giaodien/img/banner/2.jpg')"
    >
        <div class="container">
            <div class="pagination-area">
                <h1>Tin tức</h1>
            </div>
        </div>
    </div>
    <!-- Inner Page Banner Area End Here -->
    <!-- News Page Area Start Here -->
    <div class="news-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <div class="row">
                        @foreach($tintuc as $tt)
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="news-box">
                                <div class="news-img-holder">
                                    <img
                                        src="upload/tintuc/{{$tt->hinh}}"
                                        class="img-responsive"
                                        alt="research"
                                    />
                                    <ul class="news-date1">
                                        <li>{{$tt->updated_at->format('d M')}} </li>
                                        <li>{{$tt->updated_at->format('Y')}}</li>
                                    </ul>
                                </div>
                                <h2 class="title-default-left-bold">
                                    <a href="chitiettintuc/{{$tt->id}}">{{$tt->tieu_de}}</a>
                                </h2>
                                <ul class="title-bar-high news-comments">
                                    <li>
                                            <span>Người đăng: {{$tt->user->name}} <br> Chức vụ:
                                                @if($tt->user->quyen==1)
                                                    @if(isset($tt->user->giangvien->lanhdao))
                                                        {{$tt->user->giangvien->lanhdao->ten_chuc_vu}}
                                                    @else GIẢNG VIÊN
                                                    @endif
                                                @endif
                                                @if($tt->user->quyen==2)
                                                    {{$tt->user->giangvien->lanhdao->ten_chuc_vu}}
                                                @endif
                                                @if($tt->user->quyen==3)
                                                    GIẢNG VIÊN
                                                @endif
                                                _ {{$tt->user->giangvien->vitri->noi_cong_tac}}
                                            </span>
                                    </li>
                                    <li>
                                        <i class="fa fa-tags" aria-hidden="true"></i>{{$tt->loaitin->ten}}
                                    </li>
                                    <li>
                                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                                            <span>( {{$tt->binhluan->count()}} ) Bình luận </span>
                                    </li>
                                </ul>
                                <p>
                                    {{$tt->tomtat}}
                                </p>
                                <a href="chitiettintuc/{{$tt->id}}" class="default-big-btn">Xem thêm</a>
                            </div>
                        </div>
                        @endforeach

                            <div class="pagination justify-content-center">
                                {!! $tintuc->links() !!}
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
