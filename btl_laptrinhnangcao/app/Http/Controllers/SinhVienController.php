<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Models\User;
use App\Models\LopHoc;
use App\Models\ViTri;
use App\Models\BinhLuan;
use App\Models\TinTuc;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SinhVienController extends Controller
{
    public function getChon(){
        $lophoc = LopHoc::all();
        return view('admin.sinhvien.DsLopHoc', ['lophoc'=>$lophoc]);
    }
    public function getGVChon($id){
        $lophoc = LopHoc::where('id_giang_vien','=',$id)->get();
        return view('giangvien.sinhvien.DsLopHoc', ['lophoc'=>$lophoc]);
    }
    public function postChon(Request $request){
        return redirect('admin/sinhvien/danhsach/'.$request->ten_lop_hoc);
    }

    public function getDanhSach($id){
        $sinhvien = SinhVien::where('id_lop_hoc','=',$id)->get();
        return view('admin.sinhvien.DsSinhVien',['sinhvien'=>$sinhvien,'id'=>$id]);
    }

    public function getSVDanhSach($id){
        $sinhvien = SinhVien::where('id_lop_hoc','=',$id)->get();
        return view('sinhvien.DsSinhVien',['sinhvien'=>$sinhvien,'id'=>$id]);
    }

    public function getThem($id){
        $lophoc=LopHoc::find($id);
        return view('admin.sinhvien.ThemSinhVien',['lophoc'=>$lophoc,'id'=>$id]);
    }

    public function postThem(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'password.max' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu không khớp',

        ]);

        $user = new User;
        $user->name = $request->name;

        $user->quyen = 4;
        $user->password = bcrypt($request->password);
        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('admin/sinhvien/them'.$id)->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/taikhoan/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/taikhoan/", $hinh);
            $user->hinh = $hinh;
        }
        else{
            $user->hinh="avt mac_dinh.png";
        }
        if((User::where('email','=',$request->email))->exists())
        {
            return redirect('admin/sinhvien/them'.$id)->with('loi','Đã có vị trí chức vụ này');
        }
        $user->email = $request->email;
        $user->save();
        $sinhvien=new SinhVien();
        $sinhvien->id_user=$user->id;
        $sinhvien->id_lop_hoc=$id;
        $sinhvien->mssv=$request->mssv;
        $sinhvien->save();
        return redirect('admin/sinhvien/them/'.$id)->with('thongbao','Thêm Thành Công');
    }



    public function getSua($id){
        $sinhvien = SinhVien::find($id);
        $lophoc=LopHoc::all();
        return view('admin.sinhvien.SuaSinhVien',['sinhvien'=>$sinhvien,'lophoc'=>$lophoc]);
    }

    public function getSVSua($id){
        $sinhvien = SinhVien::find($id);
        return view('sinhvien.SuaSinhVien',['sinhvien'=>$sinhvien]);
    }
    public function getSVThongTin($id){
        $sinhvien = SinhVien::find($id);
        return view('sinhvien.ThongTin',['sinhvien'=>$sinhvien]);
    }

    public function postSua(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
            'lop_hoc' => 'required',
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'password.max' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu không khớp',
            'lop_hoc.required' => 'Bạn chưa nhập lớp học',

        ]);
        $sinhvien = SinhVien::find($id);
        $user = User::find($sinhvien->id_user);
        $user->name = $request->name;
        $user->quyen = 4;
        $sinhvien->mssv=$request->mssv;
        $user->password = bcrypt($request->password);
        $sinhvien->id_lop_hoc=$request->lop_hoc;

        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('admin/sinhvien/sua/'.$id)->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/taikhoan/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/taikhoan/", $hinh);
            $user->hinh = $hinh;
        }
        else{
            $user->hinh="avt mac_dinh.png";
        }
        $sinhvien->save();
        $user->save();
        return redirect('admin/sinhvien/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }

    public function postSVSua(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'password.max' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu không khớp',

        ]);
        $sinhvien = SinhVien::find($id);
        $user = User::find($sinhvien->id_user);
        $user->name = $request->name;
        $user->quyen = 4;
        $user->password = bcrypt($request->password);

        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('sinhvien/sua/'.$id)->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/taikhoan/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/taikhoan/", $hinh);
            $user->hinh = $hinh;
        }
        else{
            $user->hinh="avt mac_dinh.png";
        }
        $sinhvien->save();
        $user->save();
        return redirect('sinhvien/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }

    public function getXoa($id){
        $sinhvien = SinhVien::find($id);
        $user = User::find($sinhvien->id_user);
        $binhluan = BinhLuan::where('id_user','=',$id);
        $binhluan->delete();
        $tintuc = TinTuc::where('id_user','=',$id);
        $tintuc->delete();
        $sinhvien->delete() ;
        $user->delete();
        return redirect('admin/sinhvien/chon')->with('thongbao','Xóa thành công');
    }


    public function getLDChon(){
        $lophoc = LopHoc::all();
        return view('lanhdao.sinhvien.DsLopHoc', ['lophoc'=>$lophoc]);
    }
    public function postLDChon(Request $request){
        return redirect('lanhdao/sinhvien/danhsach/'.$request->ten_lop_hoc);
    }

    public function getLDDanhSach($id){
        $sinhvien = SinhVien::where('id_lop_hoc','=',$id)->get();
        return view('lanhdao.sinhvien.DsSinhVien',['sinhvien'=>$sinhvien,'id'=>$id]);
    }

    public function getLDThem($id){
        $lophoc=LopHoc::find($id);
        return view('lanhdao.sinhvien.ThemSinhVien',['lophoc'=>$lophoc,'id'=>$id]);
    }

    public function postLDThem(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'password.max' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu không khớp',

        ]);

        $user = new User;
        $user->name = $request->name;

        $user->quyen = 4;
        $user->password = bcrypt($request->password);
        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('lanhdao/sinhvien/them'.$id)->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/taikhoan/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/taikhoan/", $hinh);
            $user->hinh = $hinh;
        }
        else{
            $user->hinh="avt mac_dinh.png";
        }
        if((User::where('email','=',$request->email))->exists())
        {
            return redirect('lanhdao/sinhvien/them'.$id)->with('loi','Đã có vị trí chức vụ này');
        }
        $user->email = $request->email;
        $user->save();
        $sinhvien=new SinhVien();
        $sinhvien->id_user=$user->id;
        $sinhvien->id_lop_hoc=$id;
        $sinhvien->mssv=$request->mssv;
        $sinhvien->save();
        return redirect('lanhdao/sinhvien/them/'.$id)->with('thongbao','Thêm Thành Công');
    }



    public function getLDSua($id){
        $sinhvien = SinhVien::find($id);
        $lophoc=LopHoc::all();
        return view('lanhdao.sinhvien.SuaSinhVien',['sinhvien'=>$sinhvien,'lophoc'=>$lophoc]);
    }

    public function getLDThongTin($id){
        $sinhvien = SinhVien::find($id);
        return view('lanhdao.sinhvien.ThongTin',['sinhvien'=>$sinhvien]);
    }

    public function postLDSua(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
            'lop_hoc' => 'required',
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'password.max' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu không khớp',
            'lop_hoc.required' => 'Bạn chưa nhập lớp học',

        ]);
        $sinhvien = SinhVien::find($id);
        $user = User::find($sinhvien->id_user);
        $user->name = $request->name;
        $user->quyen = 4;
        $sinhvien->mssv=$request->mssv;
        $user->password = bcrypt($request->password);
        $sinhvien->id_lop_hoc=$request->lop_hoc;

        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('lanhdao/sinhvien/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/taikhoan/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/taikhoan/", $hinh);
            $user->hinh = $hinh;
        }
        else{
            $user->hinh="avt mac_dinh.png";
        }
        $sinhvien->save();
        $user->save();
        return redirect('lanhdao/sinhvien/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getLDXoa($id){
        $sinhvien = SinhVien::find($id);
        $user = User::find($sinhvien->id_user);
        $binhluan = BinhLuan::where('id_user','=',$id);
        $binhluan->delete();
        $tintuc = TinTuc::where('id_user','=',$id);
        $tintuc->delete();
        $sinhvien->delete() ;
        $user->delete();
        return redirect('lanhdao/sinhvien/chon')->with('thongbao','Xóa thành công');
    }

    public function postGVChon(Request $request){
        return redirect('giangvien/sinhvien/danhsach/'.$request->ten_lop_hoc);
    }

    public function getGVDanhSach($id){
        $sinhvien = SinhVien::where('id_lop_hoc','=',$id)->get();
        return view('giangvien.sinhvien.DsSinhVien',['sinhvien'=>$sinhvien,'id'=>$id]);
    }

    public function getGVThem($id){
        $lophoc=LopHoc::find($id);
        return view('giangvien.sinhvien.ThemSinhVien',['lophoc'=>$lophoc,'id'=>$id]);
    }

    public function postGVThem(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'password.max' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu không khớp',

        ]);

        $user = new User;
        $user->name = $request->name;

        $user->quyen = 4;
        $user->password = bcrypt($request->password);
        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('giangvien/sinhvien/them'.$id)->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/taikhoan/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/taikhoan/", $hinh);
            $user->hinh = $hinh;
        }
        else{
            $user->hinh="avt mac_dinh.png";
        }
        if((User::where('email','=',$request->email))->exists())
        {
            return redirect('giangvien/sinhvien/them'.$id)->with('loi','Đã có vị trí chức vụ này');
        }
        $user->email = $request->email;
        $user->save();
        $sinhvien=new SinhVien();
        $sinhvien->id_user=$user->id;
        $sinhvien->id_lop_hoc=$id;
        $sinhvien->mssv=$request->mssv;
        $sinhvien->save();
        return redirect('giangvien/sinhvien/them/')->with('thongbao','Thêm Thành Công');
    }



    public function getGVSua($id){
        $sinhvien = SinhVien::find($id);
        $lophoc=LopHoc::all();
        return view('giangvien.sinhvien.SuaSinhVien',['sinhvien'=>$sinhvien,'lophoc'=>$lophoc]);
    }

    public function getGVThongTin($id){
        $sinhvien = SinhVien::find($id);
        return view('giangvien.sinhvien.ThongTin',['sinhvien'=>$sinhvien]);
    }

    public function postGVSua(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
            'lop_hoc' => 'required',
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'password.max' => 'mật khẩu phải có độ dài từ 3 đến 255 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu không khớp',
            'lop_hoc.required' => 'Bạn chưa nhập lớp học',

        ]);
        $sinhvien = SinhVien::find($id);
        $user = User::find($sinhvien->id_user);
        $user->name = $request->name;
        $user->quyen = 4;
        $sinhvien->mssv=$request->mssv;
        $user->password = bcrypt($request->password);
        $sinhvien->id_lop_hoc=$request->lop_hoc;

        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('giangvien/sinhvien/sua'.$id)->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/taikhoan/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/taikhoan/", $hinh);
            $user->hinh = $hinh;
        }
        else{
            $user->hinh="avt mac_dinh.png";
        }
        $sinhvien->save();
        $user->save();
        return redirect('giangvien/sinhvien/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getGVXoa($id){
        $sinhvien = SinhVien::find($id);
        $user = User::find($sinhvien->id_user);
        $binhluan = BinhLuan::where('id_user','=',$id);
        $binhluan->delete();
        $tintuc = TinTuc::where('id_user','=',$id);
        $tintuc->delete();
        $sinhvien->delete() ;
        $user->delete();
        return redirect('giangvien/sinhvien/chon')->with('thongbao','Xóa thành công');
    }
}
