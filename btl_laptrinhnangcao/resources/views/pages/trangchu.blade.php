@extends('layout.index')
@section('content')

<!-- Slider 1 Area Start Here -->
<div class="slider1-area overlay-default">
    <div class="bend niceties preview-1">
        <div id="ensign-nivoslider-3" class="slides">
            <img src="../giaodien/img/slider/1-1.jpg" alt="slider" title="#slider-direction-1" />
            <img src="../giaodien/img/slider/1-2.jpg" alt="slider" title="#slider-direction-2" />
            <img src="../giaodien/img/slider/1-3.jpg" alt="slider" title="#slider-direction-3" />
        </div>
        <div id="slider-direction-1" class="t-cn slider-direction">
            <div class="slider-content s-tb slide-1">
                <div class="title-container s-tb-c">
                    <div class="title1">NƠI ĐÀO TẠO HÀNG ĐẦU VỀ
                        <br>ĐIỆN TỬ VIỄN THÔNG</div>

                </div>
            </div>
        </div>
        <div id="slider-direction-2" class="t-cn slider-direction">
            <div class="slider-content s-tb slide-2">
                <div class="title-container s-tb-c">
                    <div class="title1">CƠ HỘI NGHỀ NGHIỆP RỘNG MỞ</div>
                </div>
            </div>
        </div>
    </div>
    <div id="slider-direction-3" class="t-cn slider-direction">
        <div class="slider-content s-tb slide-3">
            <div class="title-container s-tb-c">
                <div class="title1">MÔI TRƯỜNG HỌC TẬP NĂNG ĐỘNG</div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Slider 1 Area End Here -->
<!-- Counter Area Start Here -->
<div class="counter-area bg-primary-deep" style="background-image: url('img/banner/4.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".20s">
                <h2 class="about-counter title-bar-counter" data-num="106">106</h2>
                <p>CÁN BỘ <br> GIẢNG VIÊN</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".40s">
                <h2 class="about-counter title-bar-counter" data-num="11">11</h2>
                <p>CHƯƠNG TRÌNH CẤP BẰNG</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".60s">
                <h2 class="about-counter title-bar-counter" data-num="60">60</h2>
                <p>NĂM <br> KINH NGHIỆM</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".80s">
                <h2 class="about-counter title-bar-counter" data-num="400">400</h2>
                <p>QS WORLD UNIVERSITY RANKING</p>
            </div>
        </div>
    </div>
</div>
<!-- Counter Area End Here -->
<!-- News and Event Area Start Here -->
<div class="news-event-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 event-inner-area">
                <h2 class="title-default-left">Về chúng tôi</h2>
                <div class="video-area2 overlay-video bg-common-style" style="background-image: url('giaodien/img/logo/logo_set_hust.png');">
                    <div class="video-content">
                        <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=VGbc_J9345o"><i class="fa fa-play" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 news-inner-area">
                <h2 class="title-default-left">Tin tức mới nhất</h2>
                <ul class="news-wrapper news-wrapper-responsive">
                    @foreach($tintuc as $tt)
                    <li>
                        <div class="news-img-holder">
                            <a href="chitiettintuc/{{$tt->id}}"><img src="upload/tintuc/{{$tt->hinh}}" class="img-responsive" alt="news"></a>
                        </div>
                        <div class="news-content-holder">
                            <h3><a href="chitiettintuc/{{$tt->id}}">{{$tt->tieu_de}}</a></h3>
                            <div class="post-date">{{$tt->updated_at->format('d M Y')}}</div>
                        </div>
                    </li>
                    @endforeach

                </ul>
                <div class="news-btn-holder">
                    <a href="tintucdaydu" class="view-all-accent-btn">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- News and Event Area End Here -->
<!-- Students Say Area Start Here -->
<div class="students-say-area">
    <h2 class="title-default-center">Nói Về SET</h2>
    <div class="container">
        <div class="rc-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="true" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="true" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="true" data-r-small="2" data-r-small-nav="false" data-r-small-dots="true" data-r-medium="2" data-r-medium-nav="false" data-r-medium-dots="true" data-r-large="2" data-r-large-nav="false" data-r-large-dots="true">
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="tlp-tm-content-wrapper">
                        <h3 class="item-title"><a href="#">Tào Đức Thắng </a></h3>
                        <span class="item-designation">Phó tổng giám đóc tập đoàn Viễn Thông Quân Đội Viettel </span>
                        <a href="#" class="profile-img "><img class="profile-img-responsive img-circle" src="../giaodien/img/students/1.jpg" alt="Testimonial" style="width: 9%"></a>
                        <ul class="rating-wrapper">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <div class="item-content">Các thầy cô trong Viện đã giúp tôi được một kiến thức nền tảng rất vững chắc, là hành trang sau này trong công việc của chúng tôi.
                        Các thầy cô với phương pháp học tập tạo cho đam mê học hỏi cho sinh viên chúng tôi. Tôi xác định kiến thức là không giới hạn, lúc nào cũng phải học tập và tìm tòi trọn đời.</div>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="tlp-tm-content-wrapper">
                        <h3 class="item-title"><a href="#">Nguyễn Minh Hiển </a></h3>
                        <span class="item-designation">Nguyên Bộ trưởng Bộ giáo dục và Đào tạo </span>
                        <a href="#" class="profile-img "><img class="profile-img-responsive img-circle" src="../giaodien/img/students/2.jpg" alt="Testimonial" style="width: 8%"></a>
                        <ul class="rating-wrapper">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <div class="item-content">
                            Tôi rất tự hào về truyền thống 60 năm của Viện Điện Tử Viễn Thông. Tôi luôn luôn cảm thấy rất may mắm vì đã có điều kiện làm việc với các thầy cô giáo rất vững vàng về mặt chuyên môn,
                            rất tận tụy với các công việc và hết lòng vì sinh viên.
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="tlp-tm-content-wrapper">
                        <h3 class="item-title"><a href="#">Nguyễn Hữu Thanh</a></h3>
                        <span class="item-designation">Viện trưởng viện Điện Tử Viễn Thông</span>
                        <a href="#" class="profile-img "><img class="profile-img-responsive img-circle" src="../giaodien/img/students/3.png" alt="Testimonial" style="width: 8%"></a>
                        <ul class="rating-wrapper">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <div class="item-content">
                            Trải qua 60 năm hình thành và phát triển, ngày nay Viện đã trở thành đơn vị hàng đầu đào tạo về lĩnh vực Điện Tử Viễn Thông.
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="tlp-tm-content-wrapper">
                        <h3 class="item-title"><a href="#">Huh Chang Wan</a></h3>
                        <span class="item-designation">Tổng giám đốc trung tâm nghiên cứu phát triển SamSung(SVMC)</span>
                        <a href="#" class="profile-img "><img class="profile-img-responsive img-circle" src="../giaodien/img/students/4.png" alt="Testimonial" style="width: 10%"></a>
                        <ul class="rating-wrapper">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <div class="item-content">
                            Với phẩm chất cầu thị, ham học hỏi, tim hiểu công nghệ mới, nỗ lực trong công việc. Cựu sinh viên Viện Điện Tử Viễn Thông đã vươn lên nắm lấy nhiều vị trí lãnh đạo SamSung R&D.
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="tlp-tm-content-wrapper">
                        <h3 class="item-title"><a href="#">Đỗ Công Kiền</a></h3>
                        <span class="item-designation">Cựu sinh viên</span>
                        <a href="#" class="profile-img "><img class="profile-img-responsive img-circle" src="../giaodien/img/students/5.jpg" alt="Testimonial" style="width: 8%"></a>
                        <ul class="rating-wrapper">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <div class="item-content">
                            Viện Điện Tử Viễn Thông đã trang bị rất nhiều kiến thức, giúp em có thể tư duy và giải quyết yêu cầu đặt ra trong công việc của hiện tại và cả sau này.
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="single-item-wrapper">
                    <div class="tlp-tm-content-wrapper">
                        <h3 class="item-title">Lê Minh Nghĩa<a href="#"></a></h3>
                        <span class="item-designation">Sinh viên khóa 62</span>
                        <a href="#" class="profile-img "><img class="profile-img-responsive img-circle" src="../giaodien/img/students/6.jpg" alt="Testimonial" style="width: 8%"></a>
                        <ul class="rating-wrapper">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                        <div class="item-content">
                            Học tập tại đây là vinh dự đối với em. Ở viện Điện Tử Viễn Thông em có nhiều cơ hội học tập và phát triển toàn diện. Bên cạnh đó môi trường năng động với nhiều hoạt động phong trào giúp em
                            có được các kĩ năng mềm cần thiết để hoàn thiện bản thân.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Students Say Area End Here -->

<!-- Brand Area Start Here -->
<div class="brand-area">
    <div class="container">
        <h2 class="title-default-center">Nét Đẹp Bách Khoa</h2>
        <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="2" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="3" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="4" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
            <div class="brand-area-box">
                <a href="#"><img src="../giaodien/img/brand/7.jpg" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="../giaodien/img/brand/2.jpg" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="../giaodien/img/brand/3.jpg" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="../giaodien/img/brand/4.jpg" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="../giaodien/img/brand/5.jpg" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="../giaodien/img/brand/6.jpg" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="../giaodien/img/brand/1.jpg" alt="brand"></a>
            </div>
            <div class="brand-area-box">
                <a href="#"><img src="../giaodien/img/brand/8.jpg" alt="brand"></a>
            </div>
        </div>
    </div>
</div>
<!-- Brand Area End Here -->
@endsection
