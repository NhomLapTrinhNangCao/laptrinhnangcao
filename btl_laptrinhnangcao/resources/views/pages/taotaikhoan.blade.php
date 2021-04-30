<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tạo tài khoản</title>
    <base href="{{asset('')}}">

    <!-- Custom fonts for this template-->
    <link href="../admin_asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin_asset/css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản khách!</h1>
                        </div>
                        <form class="user" action="themkhach" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                           placeholder="Nhập tên người dùng..." name="name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user"
                                       placeholder="Nhập địa chỉ email..." name="email">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user"
                                           id="exampleInputPassword" placeholder="Nhập mật khẩu" name="password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                           id="exampleRepeatPassword" placeholder="Nhập lại mật khẩu" name="passwordAgain">
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" style="height: 2.9rem; border-radius: 10rem" type="file" name="hinh" >
                            </div>
                            <input type="submit" value="Xác nhận" class="btn btn-primary btn-user btn-block" />
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="quenmatkhau">Quên mật khẩu?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="dangnhap">Đã có tài khoản? Đăng nhập!</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="trangchu">Về trang tin tức</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</div>

<!-- Bootstrap core JavaScript-->
<script src="../admin_asset/vendor/jquery/jquery.min.js"></script>
<script src="../admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../admin_asset/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../admin_asset/js/sb-admin-2.min.js"></script>

</body>

</html>
