@extends('layout.index')
@section('content')
    <!-- Lien he Page Area Start Here -->
    <div class="contact-us-page1-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-us-info1">
                        <ul>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <h3>Số điện thoại</h3>
                                <p>+(84) 24 438 692 242</p>
                            </li>
                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h3>Địa chỉ</h3>
                                <p>Phòng 405-C9, Đại học Bách Khoa Hà Nội, <br> Số 1 Đại Cồ Việt, Hà Nội, Việt Nam</p>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <h3>E-mail</h3>
                                <p>set-office@hust.edu.vn</p>
                            </li>
                            <li>
                                <h3>Theo dõi qua</h3>
                                <ul class="contact-social">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h2 class="title-default-left title-bar-high">Liên hệ chúng tôi</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="contact-form1">
                            <form id="contact-form" action="lienhe" method="post" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <fieldset>
                                    <div class="col-sm-6">
                                        <div class="form-group" >
                                            <input type="text" placeholder="Nhập họ và tên..." class="form-control" name="name" id="form-name" data-error="Name field is required" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="email" placeholder="Địa chỉ email..." class="form-control" name="email" id="form-email" data-error="Email field is required" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea placeholder="Nội dung tin nhắn..." class="textarea form-control" name="noi_dung" id="form-message" rows="8" cols="20" data-error="Message field is required" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-sm-12">
                                        <div class="form-group margin-bottom-none">
                                            <button type="submit" class="default-big-btn">Gửi tin nhắn</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-sm-12">
                                        <div class='form-response'></div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <!-- Lien he Page Area End Here -->
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
@endsection
