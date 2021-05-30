<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('trangchu');
});
Route::get('dangnhap','App\Http\Controllers\GiangVienController@getdangnhap');
Route::post('dangnhap','App\Http\Controllers\GiangVienController@postdangnhap');
Route::get('dangxuat','App\Http\Controllers\GiangVienController@getDangXuat');
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::group(['prefix'=>'vitri'],function(){
        Route::get('danhsach','App\Http\Controllers\ViTriController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\ViTriController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\ViTriController@postSua');

        Route::get('them','App\Http\Controllers\ViTriController@getThem');
        Route::post('them','App\Http\Controllers\ViTriController@postThem');

        Route::get('xoa/{id}','App\Http\Controllers\ViTriController@getXoa');
    });
    Route::group(['prefix'=>'khoahoc'],function(){
        Route::get('danhsach','App\Http\Controllers\KhoaHocController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\KhoaHocController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\KhoaHocController@postSua');

        Route::get('them','App\Http\Controllers\KhoaHocController@getThem');
        Route::post('them','App\Http\Controllers\KhoaHocController@postThem');

        Route::get('xoa/{id}','App\Http\Controllers\KhoaHocController@getXoa');
    });
    Route::group(['prefix'=>'loaitin'],function(){
        Route::get('danhsach','App\Http\Controllers\LoaiTinController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\LoaiTinController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\LoaiTinController@postSua');

        Route::get('them','App\Http\Controllers\LoaiTinController@getThem');
        Route::post('them','App\Http\Controllers\LoaiTinController@postThem');

        Route::get('xoa/{id}','App\Http\Controllers\LoaiTinController@getXoa');


    });
    Route::group(['prefix'=>'tintuc'],function(){
        Route::get('danhsach','App\Http\Controllers\TinTucController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\TinTucController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\TinTucController@postSua');


        Route::get('them','App\Http\Controllers\TinTucController@getThem');
        Route::post('them','App\Http\Controllers\TinTucController@postThem');

        Route::get('xoa/{id}','App\Http\Controllers\TinTucController@getXoa');
    });

    Route::group(['prefix'=>'tuyensinh'],function(){
        Route::get('danhsach','App\Http\Controllers\TuyenSinhController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\TuyenSinhController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\TuyenSinhController@postSua');


        Route::get('them','App\Http\Controllers\TuyenSinhController@getThem');
        Route::post('them','App\Http\Controllers\TuyenSinhController@postThem');

        Route::get('xoa/{id}','App\Http\Controllers\TuyenSinhController@getXoa');
    });

    Route::group(['prefix'=>'tinnhancho'],function(){
        Route::get('danhsach','App\Http\Controllers\TinNhanChoController@getDanhSach');
        Route::get('sua/{id}','App\Http\Controllers\TinNhanChoController@getSua');
        Route::get('xoa/{id}','App\Http\Controllers\TinNhanChoController@getXoa');
    });
    Route::group(['prefix'=>'binhluan'],function() {
        Route::get('xoa/{id}/{id_tin_tuc}', 'App\Http\Controllers\BinhLuanController@getXoa');
    });

    Route::group(['prefix' => 'lophoc'], function () {

        Route::get('danhsach','App\Http\Controllers\LopHocController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\LopHocController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\LopHocController@postSua');

        Route::get('xoa/{id}','App\Http\Controllers\LopHocController@getXoa');

        Route::get('them','App\Http\Controllers\LopHocController@getThem');
        Route::post('them','App\Http\Controllers\LopHocController@postThem');
    });
    Route::group(['prefix' => 'lanhdao'], function () {

        Route::get('danhsach','App\Http\Controllers\LanhDaoController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\LanhDaoController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\LanhDaoController@postSua');

        Route::get('xoa/{id}','App\Http\Controllers\LanhDaoController@getXoa');

        Route::get('them','App\Http\Controllers\LanhDaoController@getThem');
        Route::post('them','App\Http\Controllers\LanhDaoController@postThem');
    });
    Route::group(['prefix' => 'thongke'], function () {

        Route::get('danhsach','App\Http\Controllers\ThongKeController@getDanhSach');

    });
    Route::group(['prefix' => 'khach'], function () {

        Route::get('danhsach','App\Http\Controllers\KhachController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\KhachController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\KhachController@postSua');

        Route::get('thongtin/{id}','App\Http\Controllers\KhachController@getThongTin');

        Route::get('xoa/{id}','App\Http\Controllers\KhachController@getXoa');

        Route::get('them','App\Http\Controllers\KhachController@getThem');
        Route::post('them','App\Http\Controllers\KhachController@postThem');
    });
    Route::group(['prefix' => 'giangvien'], function () {

        Route::get('danhsach/{id}','App\Http\Controllers\GiangVienController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\GiangVienController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\GiangVienController@postSua');

        Route::get('thongtin/{id}','App\Http\Controllers\GiangVienController@getThongTin');

        Route::get('xoa/{id}','App\Http\Controllers\GiangVienController@getXoa');

        Route::get('them/{id}','App\Http\Controllers\GiangVienController@getThem');
        Route::post('them/{id}','App\Http\Controllers\GiangVienController@postThem');

        Route::get('chon','App\Http\Controllers\GiangVienController@getChon');
        Route::post('chon','App\Http\Controllers\GiangVienController@postChon');
    });

    Route::group(['prefix' => 'sinhvien'], function () {

        Route::get('danhsach/{id}','App\Http\Controllers\SinhVienController@getDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\SinhVienController@getSua');
        Route::post('sua/{id}','App\Http\Controllers\SinhVienController@postSua');

        Route::get('thongtin/{id}','App\Http\Controllers\SinhVienController@getThongTin');

        Route::get('xoa/{id}','App\Http\Controllers\SinhVienController@getXoa');

        Route::get('them/{id}','App\Http\Controllers\SinhVienController@getThem');
        Route::post('them/{id}','App\Http\Controllers\SinhVienController@postThem');

        Route::get('chon','App\Http\Controllers\SinhVienController@getChon');
        Route::post('chon','App\Http\Controllers\SinhVienController@postChon');
    });
});

Route::group(['prefix'=>'lanhdao','middleware'=>'LanhDaoLogin'],function(){
    Route::group(['prefix'=>'tintuc'],function(){
        Route::get('danhsach/{id}','App\Http\Controllers\TinTucController@getLDDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\TinTucController@getLDSua');
        Route::post('sua/{id}','App\Http\Controllers\TinTucController@postLDSua');


        Route::get('them','App\Http\Controllers\TinTucController@getLDThem');
        Route::post('them','App\Http\Controllers\TinTucController@postLDThem');

        Route::get('xoa/{id}','App\Http\Controllers\TinTucController@getLDXoa');
    });

    Route::group(['prefix'=>'tinnhancho'],function(){
        Route::get('danhsach','App\Http\Controllers\TinNhanChoController@getLDDanhSach');
        Route::get('sua/{id}','App\Http\Controllers\TinNhanChoController@getLDSua');
        Route::get('xoa/{id}','App\Http\Controllers\TinNhanChoController@getLDXoa');
    });
    Route::group(['prefix'=>'binhluan'],function() {
        Route::get('xoa/{id}/{id_tin_tuc}', 'App\Http\Controllers\BinhLuanController@getLDXoa');
    });

    Route::group(['prefix' => 'lophoc'], function () {

        Route::get('danhsach','App\Http\Controllers\LopHocController@getLDDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\LopHocController@getLDSua');
        Route::post('sua/{id}','App\Http\Controllers\LopHocController@postLDSua');

        Route::get('xoa/{id}','App\Http\Controllers\LopHocController@getLDXoa');

        Route::get('them','App\Http\Controllers\LopHocController@getLDThem');
        Route::post('them','App\Http\Controllers\LopHocController@postLDThem');
    });

    Route::group(['prefix' => 'thongke'], function () {

        Route::get('danhsach','App\Http\Controllers\ThongKeController@getLDDanhSach');

    });

    Route::group(['prefix' => 'giangvien'], function () {

        Route::get('sua/{id}','App\Http\Controllers\GiangVienController@getLDSua');
        Route::post('sua/{id}','App\Http\Controllers\GiangVienController@postLDSua');

        Route::get('thongtin/{id}','App\Http\Controllers\GiangVienController@getLDThongTin');

    });

    Route::group(['prefix' => 'sinhvien'], function () {

        Route::get('danhsach/{id}','App\Http\Controllers\SinhVienController@getLDDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\SinhVienController@getLDSua');
        Route::post('sua/{id}','App\Http\Controllers\SinhVienController@postLDSua');

        Route::get('thongtin/{id}','App\Http\Controllers\SinhVienController@getLDThongTin');

        Route::get('xoa/{id}','App\Http\Controllers\SinhVienController@getLDXoa');

        Route::get('them/{id}','App\Http\Controllers\SinhVienController@getLDThem');
        Route::post('them/{id}','App\Http\Controllers\SinhVienController@postLDThem');

        Route::get('chon','App\Http\Controllers\SinhVienController@getLDChon');
        Route::post('chon','App\Http\Controllers\SinhVienController@postLDChon');
    });
});

Route::group(['prefix'=>'giangvien','middleware'=>'GiangVienLogin'],function(){

    Route::group(['prefix' => 'giangvien'], function () {

        Route::get('danhsach/{id}','App\Http\Controllers\GiangVienController@getGVDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\GiangVienController@getGVSua');
        Route::post('sua/{id}','App\Http\Controllers\GiangVienController@postGVSua');

        Route::get('thongtin/{id}','App\Http\Controllers\GiangVienController@getGVThongTin');

        Route::get('xoa/{id}','App\Http\Controllers\GiangVienController@getGVXoa');

        Route::get('them/{id}','App\Http\Controllers\GiangVienController@getGVThem');
        Route::post('them/{id}','App\Http\Controllers\GiangVienController@postGVThem');

        Route::get('chon/{id}','App\Http\Controllers\GiangVienController@getGVChon');
        Route::post('chon/{id}','App\Http\Controllers\GiangVienController@postGVhon');
    });

    Route::group(['prefix'=>'tintuc'],function(){
        Route::get('danhsach/{id}','App\Http\Controllers\TinTucController@getGVDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\TinTucController@getGVSua');
        Route::post('sua/{id}','App\Http\Controllers\TinTucController@postGVSua');


        Route::get('them','App\Http\Controllers\TinTucController@getGVThem');
        Route::post('them','App\Http\Controllers\TinTucController@postGVThem');

        Route::get('xoa/{id}','App\Http\Controllers\TinTucController@getGVXoa');
    });


    Route::group(['prefix'=>'tinnhancho'],function(){
        Route::get('danhsach','App\Http\Controllers\TinNhanChoController@getGVDanhSach');
        Route::get('sua/{id}','App\Http\Controllers\TinNhanChoController@getGVSua');
        Route::get('xoa/{id}','App\Http\Controllers\TinNhanChoController@getGVXoa');
    });
    Route::group(['prefix'=>'binhluan'],function() {
        Route::get('xoa/{id}/{id_tin_tuc}', 'App\Http\Controllers\BinhLuanController@getGVXoa');
    });

    Route::group(['prefix' => 'sinhvien'], function () {

        Route::get('danhsach/{id}','App\Http\Controllers\SinhVienController@getGVDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\SinhVienController@getGVSua');
        Route::post('sua/{id}','App\Http\Controllers\SinhVienController@postGVSua');

        Route::get('thongtin/{id}','App\Http\Controllers\SinhVienController@getGVThongTin');

        Route::get('xoa/{id}','App\Http\Controllers\SinhVienController@getGVXoa');

        Route::get('them/{id}','App\Http\Controllers\SinhVienController@getGVThem');
        Route::post('them/{id}','App\Http\Controllers\SinhVienController@postGVThem');

        Route::get('chon/{id}','App\Http\Controllers\SinhVienController@getGVChon');
        Route::post('chon','App\Http\Controllers\SinhVienController@postGVChon');
    });
});

Route::group(['prefix'=>'khach','middleware'=>'KhachLogin'],function(){


        Route::get('sua/{id}','App\Http\Controllers\KhachController@getKSua');
        Route::post('sua/{id}','App\Http\Controllers\KhachController@postKSua');

        Route::get('thongtin/{id}','App\Http\Controllers\KhachController@getKThongTin');
});
Route::group(['prefix'=>'sinhvien','middleware'=>'SinhVienLogin'],function(){

        Route::get('danhsach/{id}','App\Http\Controllers\SinhVienController@getSVDanhSach');

        Route::get('sua/{id}','App\Http\Controllers\SinhVienController@getSVSua');
        Route::post('sua/{id}','App\Http\Controllers\SinhVienController@postSVSua');

        Route::get('thongtin/{id}','App\Http\Controllers\SinhVienController@getSVThongTin');
});
Route::get('tuyensinh','App\Http\Controllers\PageController@getTuyenSinh');
Route::get('chitietts/{id}','App\Http\Controllers\PageController@getCTTuyenSinh');
Route::post('lienhe','App\Http\Controllers\TinNhanChoController@postThem');
Route::get('lienhe','App\Http\Controllers\TinNhanChoController@getThem');
Route::get('trangchu','App\Http\Controllers\PageController@getTrangChu');
Route::get('tintuc/{id}', 'App\Http\Controllers\PageController@getTinTuc');
Route::get('tintucdaydu', 'App\Http\Controllers\PageController@getFTinTuc');
Route::get('chitiettintuc/{id}', 'App\Http\Controllers\PageController@getChiTietTinTuc');
Route::get('vitri/{id}', 'App\Http\Controllers\PageController@getViTri');
Route::get('themkhach','App\Http\Controllers\PageController@getThem');
Route::post('themkhach','App\Http\Controllers\PageController@postThem');
Route::get('lichsuphattrien','App\Http\Controllers\PageController@getLichSu');
Route::post('thembinhluan/{id}','App\Http\Controllers\PageController@postThemBinhLuan');
Route::get('quenmatkhau','App\Http\Controllers\PageController@getQuenMatKhau');
Route::post('quenmatkhau','App\Http\Controllers\PageController@postQuenMatKhau');

Route::get('cosovatchat',function (){
    return view('pages.cosovatchat');
});
