<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use App\Models\User;
use App\Models\ViTri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GiangVienController extends Controller
{

    public function getChon(){
        $vitri = ViTri::all();
        return view('admin.giangvien.DsViTri', ['vitri'=>$vitri]);
    }

    public function postChon(Request $request){
        return redirect('admin/giangvien/danhsach/'.$request->noi_cong_tac);
    }

    public function getDanhSach($id){
        $giangvien = GiangVien::where('id_vi_tri','=',$id)->get();
        return view('admin.giangvien.DsGiangVien',['giangvien'=>$giangvien,'id'=>$id]);
    }

    public function getThem($id){
        $vitri=ViTri::find($id);
        return view('admin.giangvien.ThemGiangVien',['vitri'=>$vitri,'id'=>$id]);
    }

    public function postThem(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
            'quyen' => 'required'
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
            'quyen.required' => 'Bạn chưa nhập quyen quan tri'

        ]);

        $user = new User;
        $user->name = $request->name;

        $user->quyen = $request->quyen;
        $user->password = bcrypt($request->password);
        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('admin/giangvien/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
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
            return redirect('admin/giangvien/them'.$id)->with('loi','Đã có vị trí chức vụ này');
        }
        $user->email = $request->email;
        $user->save();
        $giangvien=new GiangVien;
        $giangvien->id_user=$user->id;
        $giangvien->id_vi_tri=$id;
        $giangvien->ms_giang_vien=$request->ms_giang_vien;
        $giangvien->save();
        return redirect('admin/giangvien/them/'.$id)->with('thongbao','Thêm Thành Công');
    }


    public function getSua($id){
        $giangvien = GiangVien::find($id);
        $vitri=ViTri::all();
        return view('admin.giangvien.SuaGiangVien',['giangvien'=>$giangvien,'vitri'=>$vitri]);
    }

    public function getThongTin($id){
        $giangvien = GiangVien::find($id);
        return view('admin.giangvien.ThongTin',['giangvien'=>$giangvien]);
    }

    public function postSua(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
            'vi_tri' => 'required',
            'quyen' => 'required'
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
            'vi_tri.required' => 'Bạn chưa nhập vị trí công tác',
            'quyen.required' => 'Bạn chưa nhập quyen quan tri'

        ]);
        $giangvien = GiangVien::find($id);
        $user = User::find($giangvien->id_user);
        $user->name = $request->name;
        $user->quyen = $request->quyen;
        $giangvien->ms_giang_vien=$request->ms_giang_vien;
        $user->password = bcrypt($request->password);
        $giangvien->id_vi_tri=$request->vi_tri;

        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('admin/giangvien/sua/'.$id)->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/taikhoan/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/taikhoan/", $hinh);
            $user->hinh = $hinh;
        }
        $giangvien->save();
        $user->save();
        return redirect('admin/giangvien/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getXoa($id){
        $giangvien = GiangVien::find($id);
        $user = User::find($giangvien->id_user);
        $binhluan = BinhLuan::where('id_users','=',$id);
        $binhluan->delete();
        $tintuc = TinTuc::where('id_user','=',$id);
        $tintuc->delete();
        $giangvien->delete() ;
        $user->delete();
        return redirect('admin/giangvien/chon')->with('thongbao','Xóa thành công');
    }


    public function getdangnhap(){

        return view('pages.dangnhap');
    }
    public function postdangnhap(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:3|max:255',
        ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'password.required' => 'Bạn chua nhap password',
                'password.min' => 'Password co do dai tu 3 den 255 ky tu',
                'password.max' => 'Password co do dai tu 3 den 255 ky tu',
            ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = User::where('email', '=', $request->email)->first();
            $quyen = $user->quyen;
            if($quyen==1) return redirect('admin/giangvien/thongtin/'.$user->giangvien->id);
            elseif ($quyen==2) return redirect('lanhdao/giangvien/thongtin/'.$user->giangvien->id);
            elseif ($quyen==3) return redirect('giangvien/giangvien/thongtin/'.$user->giangvien->id);
            elseif ($quyen==4) return redirect('sinhvien/thongtin/'.$user->sinhvien->id);
            else return redirect('khach/thongtin/'.$user->id);
        } else {
            return redirect('dangnhap')->with('thongbao', 'Đăng nhập không thành công');
        }

    }
    public function getDangXuat(){
        Auth::logout();
        return redirect('dangnhap');
    }



    public function getLDChon(){
        $vitri = ViTri::all();
        return view('lanhdao.giangvien.DsViTri', ['vitri'=>$vitri]);
    }

    public function postLDChon(Request $request){
        return redirect('lanhdao/giangvien/danhsach/'.$request->noi_cong_tac);
    }

    public function getLDDanhSach($id){
        $giangvien = GiangVien::where('id_vi_tri','=',$id)->get();
        return view('lanhdao.giangvien.DsGiangVien',['giangvien'=>$giangvien,'id'=>$id]);
    }

    public function getLDThem($id){
        $vitri=ViTri::find($id);
        return view('lanhdao.giangvien.ThemGiangVien',['vitri'=>$vitri,'id'=>$id]);
    }

    public function postLDThem(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
            'quyen' => 'required'
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
            'quyen.required' => 'Bạn chưa nhập quyen quan tri'

        ]);

        $user = new User;
        $user->name = $request->name;

        $user->quyen = $request->quyen;
        $user->password = bcrypt($request->password);
        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('lanhdao/giangvien/them'.$id)->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
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
            return redirect('lanhdao/giangvien/them'.$id)->with('loi','Đã có vị trí chức vụ này');
        }
        $user->email = $request->email;
        $user->save();
        $giangvien=new GiangVien;
        $giangvien->id_user=$user->id;
        $giangvien->id_vi_tri=$id;
        $giangvien->ms_giang_vien=$request->ms_giang_vien;
        $giangvien->save();
        return redirect('lanhdao/giangvien/them/'.$id)->with('thongbao','Thêm Thành Công');
    }


    public function getLDSua($id){
        $giangvien = GiangVien::find($id);
        $vitri=ViTri::all();
        return view('lanhdao.giangvien.SuaGiangVien',['giangvien'=>$giangvien,'vitri'=>$vitri]);
    }

    public function getLDThongTin($id){
        $giangvien = GiangVien::find($id);
        return view('lanhdao.giangvien.ThongTin',['giangvien'=>$giangvien]);
    }

    public function postLDSua(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
            'vi_tri' => 'required',
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
            'vi_tri.required' => 'Bạn chưa nhập vị trí công tác',

        ]);
        $giangvien = GiangVien::find($id);
        $user = User::find($giangvien->id_user);
        $user->name = $request->name;
        $giangvien->ms_giang_vien=$request->ms_giang_vien;
        $user->password = bcrypt($request->password);
        $giangvien->id_vi_tri=$request->vi_tri;

        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('lanhdao/giangvien/sua/'.$id)->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/taikhoan/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/taikhoan/", $hinh);
            $user->hinh = $hinh;
        }
        $giangvien->save();
        $user->save();
        return redirect('lanhdao/giangvien/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getLDXoa($id){
        $giangvien = GiangVien::find($id);
        $user = User::find($giangvien->id_user);
        $binhluan = BinhLuan::where('id_users','=',$id);
        $binhluan->delete();
        $tintuc = TinTuc::where('id_user','=',$id);
        $tintuc->delete();
        $giangvien->delete() ;
        $user->delete();
        return redirect('lanhdao/giangvien/chon')->with('thongbao','Xóa thành công');
    }


    public function getGVSua($id){
        $giangvien = GiangVien::find($id);
        return view('giangvien.giangvien.SuaGiangVien',['giangvien'=>$giangvien]);
    }

    public function getGVThongTin($id){
        $giangvien = GiangVien::find($id);
        return view('giangvien.giangvien.ThongTin',['giangvien'=>$giangvien]);
    }

    public function postGVSua(Request $request, $id){
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
        $giangvien = GiangVien::find($id);
        $user = User::find($giangvien->id_user);
        $user->name = $request->name;
        $giangvien->ms_giang_vien=$request->ms_giang_vien;
        $user->password = bcrypt($request->password);

        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('giangvien/giangvien/sua/'.$id)->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4)."_".$name;
            while(file_exists("upload/taikhoan/".$hinh)){
                $hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/taikhoan/", $hinh);
            $user->hinh = $hinh;
        }
        $giangvien->save();
        $user->save();
        return redirect('giangvien/giangvien/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }

}
