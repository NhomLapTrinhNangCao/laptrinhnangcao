<?php

namespace App\Http\Controllers;

use App\Models\LoaiTin;
use App\Models\TinTuc;
use App\Models\TuyenSinh;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TuyenSinhController extends Controller
{
    public function getDanhSach(){
        $tuyensinh= TuyenSinh::all();
        return view('admin.tuyensinh.DsTuyenSinh', ['tuyensinh'=>$tuyensinh]);
    }

    public function getThem(){
        return view('admin.tuyensinh.ThemTuyenSinh');
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'tieu_de'=>'required|min:1|max:256',
            'tom_tat'=>'required',
            'noi_dung'=>'required',
            'ma_tuyen_sinh'=>'required|min:3|max:256',
            'so_chi_tieu'=>'required|min:3|max:256',
            'thoi_gian_dao_tao'=>'required|max:256',
        ],
            [
                'tieu_de.required' =>'Bạn chưa nhập tiêu đề',
                'tieu_de.min'=>'Tiêu đề phải có độ dài từ 1 đến 255 ký tự',
                'tieu_de.max'=>'Tiêu đề phải có độ dài từ 1 đến 255 ký tự',
                'tom_tat.required'=>'Bạn chưa nhập tóm tắt',
                'noi_dung.required'=>'Bạn chưa nhập nội dung',
                'ma_tuyen_sinh.required' =>'Bạn chưa nhập mã tuyển sinh',
                'ma_tuyen_sinh.min'=>'Mã tuyển sinh phải có độ dài từ 1 đến 255 ký tự',
                'ma_tuyen_sinh.max'=>'Mã tuyển sinh phải có độ dài từ 1 đến 255 ký tự',
                'so_chi_tieu.required' =>'Bạn chưa nhập số chỉ tiêu',
                'so_chi_tieu.min'=>'Số chỉ tiêu phải có độ dài từ 1 đến 255 ký tự',
                'so_chi_tieu.max'=>'Số chỉ tiêu phải có độ dài từ 1 đến 255 ký tự',
                'thoi_gian_dao_tao.required' =>'Bạn chưa nhập thời gian đào tạo',
                'thoi_gian_dao_tao.max'=>'Thời gian đào tạo phải có độ dài tối đa 255 ký tự',

            ]);
        $tuyensinh = new TuyenSinh();
        $tuyensinh->tieu_de = $request->tieu_de;
        $tuyensinh->tieu_de_khong_dau = changeTitle($request->tieu_de);
        $tuyensinh->tom_tat= $request->tom_tat;
        $tuyensinh->noi_dung = $request->noi_dung;
        $tuyensinh->ma_tuyen_sinh = $request->ma_tuyen_sinh;
        $tuyensinh->so_chi_tieu = $request->so_chi_tieu;
        $tuyensinh->thoi_gian_dao_tao = $request->thoi_gian_dao_tao;
        $tuyensinh->so_luot_xem = 0;
        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('admin/tuyensinh/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/tuyensinh/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/tuyensinh", $hinh);
            $tuyensinh->hinh = $hinh;
        }
        else{
            $tuyensinh->hinh="";
        }
        $tuyensinh->save();
        return redirect('admin/tuyensinh/them')->with('thongbao','Bạn đã thêm thành công');
    }

    public function getSua($id){
        $tuyensinh = TuyenSinh::find($id);
        return view('admin.tuyensinh.SuaTuyenSinh',['tuyensinh'=>$tuyensinh]);
    }

    public function postSua(Request $request, $id){
        $tuyensinh = TuyenSinh::find($id);
        $this->validate($request,[
            'tieu_de'=>'required|min:1|max:256',
            'tom_tat'=>'required',
            'noi_dung'=>'required',
            'ma_tuyen_sinh'=>'required|min:3|max:256',
            'so_chi_tieu'=>'required|min:3|max:256',
            'thoi_gian_dao_tao'=>'required|max:256',
        ],
            [
                'tieu_de.required' =>'Bạn chưa nhập tiêu đề',
                'tieu_de.min'=>'Tiêu đề phải có độ dài từ 1 đến 255 ký tự',
                'tieu_de.max'=>'Tiêu đề phải có độ dài từ 1 đến 255 ký tự',
                'tom_tat.required'=>'Bạn chưa nhập tóm tắt',
                'noi_dung.required'=>'Bạn chưa nhập nội dung',
                'ma_tuyen_sinh.required' =>'Bạn chưa nhập mã tuyển sinh',
                'ma_tuyen_sinh.min'=>'Mã tuyển sinh phải có độ dài từ 1 đến 255 ký tự',
                'ma_tuyen_sinh.max'=>'Mã tuyển sinh phải có độ dài từ 1 đến 255 ký tự',
                'so_chi_tieu.required' =>'Bạn chưa nhập số chỉ tiêu',
                'so_chi_tieu.min'=>'Số chỉ tiêu phải có độ dài từ 1 đến 255 ký tự',
                'so_chi_tieu.max'=>'Số chỉ tiêu phải có độ dài từ 1 đến 255 ký tự',
                'thoi_gian_dao_tao.required' =>'Bạn chưa nhập thời gian đào tạo',
                'thoi_gian_dao_tao.max'=>'Thời gian đào tạo phải có độ dài tối đa 255 ký tự',

            ]);
        $tuyensinh->tieu_de = $request->tieu_de;
        $tuyensinh->tieu_de = $request->tieu_de;
        $tuyensinh->tieu_de_khong_dau = changeTitle($request->tieu_de);
        $tuyensinh->tom_tat= $request->tom_tat;
        $tuyensinh->noi_dung = $request->noi_dung;
        $tuyensinh->ma_tuyen_sinh = $request->ma_tuyen_sinh;
        $tuyensinh->so_chi_tieu = $request->so_chi_tieu;
        $tuyensinh->thoi_gian_dao_tao = $request->thoi_gian_dao_tao;

        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('admin/tuyensinh/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/tuyensinh/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/tuyensinh", $hinh);
            $tuyensinh->hinh = $hinh;
        }
        else{
            $tuyensinh->hinh="";
        }

        $tuyensinh->save();
        return redirect('admin/tuyensinh/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id){
        $tuyensinh= TuyenSinh::find($id);
        $tuyensinh -> delete();
        return redirect('admin/tuyensinh/danhsach')->with('thongbao','Đã xóa');
    }
}
