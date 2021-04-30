<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinTuc;
use App\Models\LoaiTin;
use App\Models\BinhLuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
class TinTucController extends Controller
{
    public function getDanhSach(){
        $tintuc= TinTuc::orderBy('id','DESC')->get();//desc giam dan
        return view('admin.tintuc.DsTinTuc', ['tintuc'=>$tintuc]);
    }
    public function getGVDanhSach($id){
        $tintuc= TinTuc::orderBy('id','DESC')->where('id_user','=',$id)->get();//desc giam dan
        return view('giangvien.tintuc.DsTinTuc', ['tintuc'=>$tintuc]);
    }
    public function getThem(){
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.ThemTinTuc', ['loaitin'=>$loaitin]);
    }

    public function postThem(Request $request){
        $this->validate($request,[

            'ten_the_loai'=>'required',
            'tieu_de'=>'required|min:3|max:256',
            'tom_tat'=>'required',
            'noi_dung'=>'required'
        ],
            [
                'ten_the_loai.required' => 'Bạn chưa chon loại tin',
                'tieu_de.required' =>'Bạn chưa nhập tiêu đề',
                'tieu_de.min'=>'Tiêu đề phải có độ dài từ 1 đến 256 ký tự',
                'tieu_de.max'=>'Tiêu đề phải có độ dài từ 1 đến 256 ký tự',
                'tom_tat.required'=>'Bạn chưa nhập tóm tắt',
                'noi_dung.required'=>'Bạn chưa nhập nội dung'
            ]);
        $tintuc = new TinTuc;
        $tintuc->tieu_de = $request->tieu_de;
        $tintuc->tieu_de_khong_dau = changeTitle($request->tieu_de);
        $tintuc->id_loai_tin = $request->ten_the_loai;
        $tintuc->tom_tat= $request->tom_tat;
        $tintuc->noi_dung = $request->noi_dung;
        $tintuc->so_luot_xem = 0;
        $tintuc->id_user=Auth::user()->id;
        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/tintuc/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/tintuc", $hinh);
            $tintuc->hinh = $hinh;
        }
        else{
            $tintuc->hinh="new mac_dinh.png";
        }
        $tintuc->save();
        return redirect('admin/tintuc/them')->with('thongbao','Bạn đã thêm thành công');
    }

    public function getSua($id){
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view('admin.tintuc.SuaTinTuc',['tintuc'=>$tintuc, 'loaitin'=>$loaitin]);
    }

    public function postSua(Request $request, $id){
        $tintuc = TinTuc::find($id);
        $this->validate($request,[

            'ten_the_loai'=>'required',
            'tieu_de'=>'required|min:3|max:256',
            'tom_tat'=>'required',
            'noi_dung'=>'required'
        ],
            [
                'ten_the_loai.required' => 'Bạn chưa chon loại tin',
                'tieu_de.required' =>'Bạn chưa nhập tiêu đề',
                'tieu_de.min'=>'Tiêu đề phải có độ dài từ 1 đến 256 ký tự',
                'tieu_de.max'=>'Tiêu đề phải có độ dài từ 1 đến 256 ký tự',
                'tom_tat.required'=>'Bạn chưa nhập tóm tắt',
                'noi_dung.required'=>'Bạn chưa nhập nội dung'
            ]);
        $tintuc->tieu_de = $request->tieu_de;
        $tintuc->tieu_de_khong_dau = changeTitle($request->tieu_de);
        $tintuc->id_loai_tin= $request->ten_the_loai;
        $tintuc->tom_tat = $request->tom_tat;
        $tintuc->noi_dung = $request->noi_dung;

        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;

            while(file_exists("upload/tintuc/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            File::delete(public_path("upload/tintuc/".$tintuc->hinh));
            $file->move("upload/tintuc", $hinh);
            $tintuc->hinh =$hinh;
        }

        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id){
        $tintuc = TinTuc::find($id);
        $tintuc -> delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Đã xóa');
    }


    public function getLDDanhSach(){
        $tintuc= TinTuc::orderBy('id','DESC')->get();//desc giam dan
        return view('lanhdao.tintuc.DsTinTuc', ['tintuc'=>$tintuc]);
    }

    public function getLDThem(){
        $loaitin = LoaiTin::all();
        return view('lanhdao.tintuc.ThemTinTuc', ['loaitin'=>$loaitin]);
    }

    public function postLDThem(Request $request){
        $this->validate($request,[

            'ten_the_loai'=>'required',
            'tieu_de'=>'required|min:3|max:256',
            'tom_tat'=>'required',
            'noi_dung'=>'required'
        ],
            [
                'ten_the_loai.required' => 'Bạn chưa chon loại tin',
                'tieu_de.required' =>'Bạn chưa nhập tiêu đề',
                'tieu_de.min'=>'Tiêu đề phải có độ dài từ 1 đến 256 ký tự',
                'tieu_de.max'=>'Tiêu đề phải có độ dài từ 1 đến 256 ký tự',
                'tom_tat.required'=>'Bạn chưa nhập tóm tắt',
                'noi_dung.required'=>'Bạn chưa nhập nội dung'
            ]);
        $tintuc = new TinTuc;
        $tintuc->tieu_de = $request->tieu_de;
        $tintuc->tieu_de_khong_dau = changeTitle($request->tieu_de);
        $tintuc->id_loai_tin = $request->ten_the_loai;
        $tintuc->tom_tat= $request->tom_tat;
        $tintuc->noi_dung = $request->noi_dung;
        $tintuc->so_luot_xem = 0;
        $tintuc->id_user=Auth::user()->id;
        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('lanhdao/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/tintuc/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/tintuc", $hinh);
            $tintuc->hinh = $hinh;
        }
        else{
            $tintuc->hinh="new mac_dinh.png";
        }
        $tintuc->save();
        return redirect('lanhdao/tintuc/them')->with('thongbao','Bạn đã thêm thành công');
    }

    public function getLDSua($id){
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view('lanhdao.tintuc.SuaTinTuc',['tintuc'=>$tintuc, 'loaitin'=>$loaitin]);
    }

    public function postLDSua(Request $request, $id){
        $tintuc = TinTuc::find($id);
        $this->validate($request,[

            'ten_the_loai'=>'required',
            'tieu_de'=>'required|min:3|max:256',
            'tom_tat'=>'required',
            'noi_dung'=>'required'
        ],
            [
                'ten_the_loai.required' => 'Bạn chưa chon loại tin',
                'tieu_de.required' =>'Bạn chưa nhập tiêu đề',
                'tieu_de.min'=>'Tiêu đề phải có độ dài từ 1 đến 256 ký tự',
                'tieu_de.max'=>'Tiêu đề phải có độ dài từ 1 đến 256 ký tự',
                'tom_tat.required'=>'Bạn chưa nhập tóm tắt',
                'noi_dung.required'=>'Bạn chưa nhập nội dung'
            ]);
        $tintuc->tieu_de = $request->tieu_de;
        $tintuc->tieu_de_khong_dau = changeTitle($request->tieu_de);
        $tintuc->id_loai_tin= $request->ten_the_loai;
        $tintuc->tom_tat = $request->tom_tat;
        $tintuc->noi_dung = $request->noi_dung;

        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('lanhdao/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;

            while(file_exists("upload/tintuc/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            File::delete(public_path("upload/tintuc/".$tintuc->hinh));
            $file->move("upload/tintuc", $hinh);
            $tintuc->hinh =$hinh;
        }

        $tintuc->save();
        return redirect('lanhdao/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getLDXoa($id){
        $tintuc = TinTuc::find($id);
        $tintuc -> delete();
        return redirect('lanhdao/tintuc/danhsach')->with('thongbao','Đã xóa');
    }

    public function getGVThem(){
        $loaitin = LoaiTin::all();
        return view('giangvien.tintuc.ThemTinTuc', ['loaitin'=>$loaitin]);
    }

    public function postGVThem(Request $request){
        $this->validate($request,[

            'ten_the_loai'=>'required',
            'tieu_de'=>'required|min:3|max:256',
            'tom_tat'=>'required',
            'noi_dung'=>'required'
        ],
            [
                'ten_the_loai.required' => 'Bạn chưa chon loại tin',
                'tieu_de.required' =>'Bạn chưa nhập tiêu đề',
                'tieu_de.min'=>'Tiêu đề phải có độ dài từ 1 đến 256 ký tự',
                'tieu_de.max'=>'Tiêu đề phải có độ dài từ 1 đến 256 ký tự',
                'tom_tat.required'=>'Bạn chưa nhập tóm tắt',
                'noi_dung.required'=>'Bạn chưa nhập nội dung'
            ]);
        $tintuc = new TinTuc;
        $tintuc->tieu_de = $request->tieu_de;
        $tintuc->tieu_de_khong_dau = changeTitle($request->tieu_de);
        $tintuc->id_loai_tin = $request->ten_the_loai;
        $tintuc->tom_tat= $request->tom_tat;
        $tintuc->noi_dung = $request->noi_dung;
        $tintuc->so_luot_xem = 0;
        $tintuc->id_user=Auth::user()->id;
        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('giangvien/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/tintuc/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/tintuc", $hinh);
            $tintuc->hinh = $hinh;
        }
        else{
            $tintuc->hinh="new mac_dinh.png";
        }
        $tintuc->save();
        return redirect('giangvien/tintuc/them')->with('thongbao','Bạn đã thêm thành công');
    }

    public function getGVSua($id){
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view('giangvien.tintuc.SuaTinTuc',['tintuc'=>$tintuc, 'loaitin'=>$loaitin]);
    }

    public function postGVSua(Request $request, $id){
        $tintuc = TinTuc::find($id);
        $this->validate($request,[

            'ten_the_loai'=>'required',
            'tieu_de'=>'required|min:3|max:256',
            'tom_tat'=>'required',
            'noi_dung'=>'required'
        ],
            [
                'ten_the_loai.required' => 'Bạn chưa chon loại tin',
                'tieu_de.required' =>'Bạn chưa nhập tiêu đề',
                'tieu_de.min'=>'Tiêu đề phải có độ dài từ 1 đến 256 ký tự',
                'tieu_de.max'=>'Tiêu đề phải có độ dài từ 1 đến 256 ký tự',
                'tom_tat.required'=>'Bạn chưa nhập tóm tắt',
                'noi_dung.required'=>'Bạn chưa nhập nội dung'
            ]);
        $tintuc->tieu_de = $request->tieu_de;
        $tintuc->tieu_de_khong_dau = changeTitle($request->tieu_de);
        $tintuc->id_loai_tin= $request->ten_the_loai;
        $tintuc->tom_tat = $request->tom_tat;
        $tintuc->noi_dung = $request->noi_dung;

        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('giangvien/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;

            while(file_exists("upload/tintuc/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            File::delete(public_path("upload/tintuc/".$tintuc->hinh));
            $file->move("upload/tintuc", $hinh);
            $tintuc->hinh =$hinh;
        }

        $tintuc->save();
        return redirect('giangvien/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getGVXoa($id){
        $tintuc = TinTuc::find($id);
        $tintuc -> delete();
        return redirect('giangvien/tintuc/danhsach')->with('thongbao','Đã xóa');
    }
}
