@extends('layout.index')
@section('content')
<div class="inner-page-banner-area" style="background-image: url('giaodien/img/banner/1.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Lịch sử phát triển</h1>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- About Page 3 Area Start Here -->
<!-- Research Page 3 Area Start Here -->
<div class="research-page3-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="research-box3">
                            <img src="../giaodien/img/research/history1.jpg" class="img-responsive" alt="research">
                            <h2 class="title-default-left-bold title-bar-high"><a href="#">Lịch sử hình thành</a></h2>
                            <p>Được thành lập vào năm 1956, Viện Điện tử Viễn thông (ĐTVT) đã vượt qua một chặng đường dài phát triển theo những đòi hỏi thay đổi của thời đại để vươn lên thành đơn vị tiêu biểu nhất trong nước. Cập nhật với mọi dịch chuyển xã hội, Viện đã thu hút được nhiều thế hệ trí thức và sinh viên Việt Nam tài năng. Các nỗ lực cải cách của chúng tôi nhằm tiến tới mục tiêu: nâng cao vị thế là một tổ chức được quốc tế công nhận và đạt được kiểm định quốc tế về chương trình đào tạo.</p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="research-box3">
                            <img src="../giaodien/img/research/history2.jpg" class="img-responsive" alt="research">
                            <h2 class="title-default-left-bold title-bar-high"><a href="#">Đào tạo được công nhận toàn cầu</a></h2>
                            <p>Tác động của toàn cầu hóa đòi hỏi chúng tôi phải chuẩn bị cho sinh viên khả năng làm việc và cạnh tranh trong một thế giới kết nối phẳng. Nhiệm vụ của chương trình giáo dục của chúng tôi là khơi dậy tiềm năng và tài năng của học sinh để đạt được thành công. Năm 2019, ngành kỹ thuật Điện - Điện tử tự hào đứng tên vào top 450, và đến năm 2020 nhảy 50 bậc vào top 400 trong bảng xếp hạng thế giới QS World University Ranking.</p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="research-box3">
                            <iframe width="840" height="472.5" src="https://www.youtube.com/embed/wKDBC8YECC4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <h2 class="title-default-left-bold title-bar-high"><a href="#">Sở hữu đổi mới sáng tạo</a></h2>
                            <p>Với tầm nhìn Viện ĐTVT phải đóng vai trò một nhà đổi mới công nghệ, tạo ra kiến thức trong lĩnh vực Điện tử và Viễn thông, chúng tôi hình thành trung tâm nghiên cứu phát triển vào năm 2014. Chúng tôi cũng tập trung vào nghiên cứu ứng dụng, vì chuyển giao công nghệ là mối quan tâm quan trọng của toàn quốc gia hiện nay. Với tầm nhìn chiến lược rằng việc phát triển các công nghệ sẽ được các cộng đồng quốc tế tạo điều kiện thông qua các chương trình hợp tác song phương.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="sidebar">
                    <div class="sidebar-box">
                        <div class="sidebar-box-inner">
                            <h3 class="sidebar-title">Latest Research</h3>
                            <div class="sidebar-latest-research-area">
                                <ul>
                                    @foreach($tintuc as $tt)
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
<!-- Research Page 3 Area End Here -->
@endsection
