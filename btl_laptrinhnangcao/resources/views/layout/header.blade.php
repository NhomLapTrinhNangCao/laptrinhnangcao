<!-- Header Area Start Here -->
<header>
    <div id="header2" class="header4-area">
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="header-top-left">
                            <div class="logo-area">
                                <a href="trangchu"><img style="width: 70%"class="img-responsive" src="../giaodien/img/logo/logo_set.jpg" alt="logo"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="header-top-right">
                            <ul>
                                <li><i  class="fa fa-phone" aria-hidden="true"></i><a style="color: steelblue" href="Tel:+(84) 24 438 692 242"> +(84) 24 438 692 242 </a></li>
                                <li><i  class="fa fa-envelope" aria-hidden="true"></i><a style="color: steelblue" href="#">set-office@hust.edu.vn</a></li>
                                <li>
                                    @if(Auth::check())
                                        @if(Auth::user()->quyen==1)

                                    <a style="color: steelblue" class="login-btn-area" href="admin/giangvien/thongtin/{{Auth::user()->id}}" >Xin chào, {{Auth::user()->name}}</a>
                                        @endif

                                        @if(Auth::user()->quyen==2)

                                    <a style="color: steelblue" class="login-btn-area" href="lanhdao/giangvien/thongtin/{{Auth::user()->id}}" >Xin chào, {{Auth::user()->name}}</a>

                                            @endif
                                            @if(Auth::user()->quyen==3)
                                    <a style="color: steelblue" class="login-btn-area" href="giangvien/giangvien/thongtin/{{Auth::user()->id}}" >Xin chào, {{Auth::user()->name}}</a>
                                            @endif

                                            @if(Auth::user()->quyen==4)
                                    <a style="color: steelblue" class="login-btn-area" href="sinhvien/thongtin/{{Auth::user()->id}}" >Xin chào, {{Auth::user()->name}}</a>
                                            @endif

                                            @if(Auth::user()->quyen==5)
                                    <a style="color: steelblue" class="login-btn-area" href="khach/thongtin/{{Auth::user()->id}}" >Xin chào, {{Auth::user()->name}}</a>
                                            @endif

                                    @else

                                    <a style="color: steelblue" class="login-btn-area" href="dangnhap" ><i class="fa fa-lock" aria-hidden="true"></i> Đăng nhập</a>
                                    @endif

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu-area bg-primary" id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                        <nav id="desktop-nav">
                            <ul>
                                <li class="active"><a href="trangchu">Trang chủ</a></li>
                                <li><a href="tuyensinh">Tuyển sinh</a></li>
                                <li><a href="lichsuphattrien">Giới thiệu</a>
                                    <ul>
                                        <li><a href="lichsuphattrien">Lịch sử phát triển</a></li>
                                        <li><a href="cosovatchat">Cơ sở vật chất</a></li>
                                    </ul>
                                </li>
                                <li><a href="tintucdaydu">Tin tức</a>
                                    <ul>
                                        @foreach($loaitin as $lt)
                                            <li><a href="tintuc/{{$lt->id}}">{{$lt->ten}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a>Cơ cấu tổ chức</a>
                                    <ul>
                                        @foreach($vitri as $vt)
                                        <li><a href="vitri/{{$vt->id}}">{{$vt->noi_cong_tac}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="lienhe">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="header-search">
                            <form>
                                <input type="text" class="search-form" placeholder="Tìm kiếm...." required="">
                                <a href="#" class="search-button" id="search-button"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area Start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="trangchu">Trang chủ</a></li>
                                <li><a href="tuyensinh">Tuyển sinh</a>
                                </li>
                                <li><a href="lichsuphattrien">Giới thiệu</a>
                                    <ul>
                                        <li><a href="lichsuphattrien">Lịch sử phát triển</a></li>
                                        <li><a href="cosovatchat">Cơ sở vật chất</a></li>
                                    </ul>
                                </li>
                                <li><a href="tintucdaydu">Tin tức</a>
                                    <ul>
                                        @foreach($loaitin as $lt)
                                            <li><a href="tintuc/{{$lt->id}}">{{$lt->ten}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="#">Cơ cấu tổ chức</a>
                                    <ul>
                                        @foreach($vitri as $vt)
                                            <li><a href="vitri/{{$vt->id}}">{{$vt->noi_cong_tac}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="lienhe">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End -->
</header>
<!-- Header Area End Here -->

