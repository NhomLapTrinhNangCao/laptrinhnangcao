<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('')}}">
    <title>Trang chủ admin</title>
    <!-- Custom fonts for this template-->
    <link href="../admin_asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin_asset/css/sb-admin-2.css" rel="stylesheet">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckeditor/ckfinder.js') }}"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="khach/thongtin/{{Auth::user()->id}}">
                <div class="sidebar-brand-text ml-0 mr-0">VIỆN ĐIỆN TỬ VIỄN THÔNG</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Thông tin tài khoản  Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="khach/thongtin/{{Auth::user()->id}}"  >
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Tài khoản </span>
                </a>
            </li>
            <!-- Nav Item - Tin tức Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="khach/sua/{{Auth::user()->id}}" >
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Sửa thông tin</span>
                </a>
            </li>
            <!-- Nav Item - Tin nhắn chờ Menu -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Logo -->
                        <img style="height: 80% " class="rounded float-start " src="../admin_asset/img/logo_set.png" >
                        <img style="height: 80% " class="rounded float-start ml-1" src="../admin_asset/img/logo_hust.png" >

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                      <!-- Nav Item - User Information -->
                        @if(Auth::check())
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="../upload/taikhoan/{{Auth::user()->hinh}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="khach/thongtin/{{Auth::user()->id}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Thông tin
                                </a>
                                <a class="dropdown-item" href="khach/sua/{{Auth::user()->id}}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cài đặt
                                </a>
                                <a class="dropdown-item" href="trangchu">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Trang tin tức
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="dangxuat" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>
                        @endif

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->


                        @yield('content')


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>2021 - Website quản lý tin tức viện Điện tử viễn thông: All rights reversed | Designed by nhóm 3  </span>
                        </div>
                    </div>
                </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../admin_asset/vendor/jquery/jquery.min.js"></script>
    <script src="../admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../admin_asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../admin_asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../admin_asset/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../admin_asset/js/demo/chart-area-demo.js"></script>
    <script src="../admin_asset/js/demo/chart-pie-demo.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace( 'editor' );
        </script>
        <script type="text/javascript">
            CKEDITOR.replace( 'editor1' );
        </script>
        <script type="text/javascript">
            CKEDITOR.replace( 'editor3' );
        </script>
        @yield('script')
</body>

</html>
