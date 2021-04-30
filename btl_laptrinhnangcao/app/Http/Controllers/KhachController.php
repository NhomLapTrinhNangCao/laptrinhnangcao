<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use App\Models\TinTuc;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class KhachController extends Controller
{
    public function getDanhSach(){
        $user = User::where('quyen', '>', 4)->get();
        return view('admin.khach.DsKhach',['user'=>$user]);
    }

    public function getThem(){
        return view('admin.khach.ThemKhach');
    }

    public function postThem(Request $request){
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
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen=5;
        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('admin/khach/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
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
            return redirect('admin/khach/them')->with('loi','Đã có vị trí chức vụ này');
        }
        $user->save();
        return redirect('admin/khach/them')->with('thongbao','Thêm Thành Công');
    }


    public function getSua($id){
        $user = User::find($id);
        return view('admin.khach.SuaKhach',['user'=>$user]);
    }

    public function getThongTin($id){
        $user = User::find($id);
        return view('admin.khach.ThongTin',['user'=>$user]);
    }

    public function postSua(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password'
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'mật khẩu phải có độ dài từ 3 đến 32 ký tự',
            'password.max' => 'mật khẩu phải có độ dài từ 3 đến 32 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu không khớp'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);

        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('admin/khach/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
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
        $user->save();
        return redirect('admin/khach/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
    public function getXoa($id){
        $user = User::find($id);
        $binhluan = BinhLuan::where('id_users','=',$id);
        $binhluan->delete();
        $tintuc = TinTuc::where('id_user','=',$id);
        $tintuc->delete();
        $user->delete();
        return redirect('admin/khach/danhsach')->with('thongbao','Xóa thành công');
    }




    public function getKSua($id){
        $user = User::find($id);
        return view('khach.SuaKhach',['user'=>$user]);
    }

    public function getKThongTin($id){
        $user = User::find($id);
        return view('khach.ThongTin',['user'=>$user]);
    }

    public function postKSua(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|min:3',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password'
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'mật khẩu phải có độ dài từ 3 đến 32 ký tự',
            'password.max' => 'mật khẩu phải có độ dài từ 3 đến 32 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu không khớp'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);

        if($request->hasFile('hinh')){

            $file = $request->file('hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' ){
                return redirect('khach/sua/'.$id)->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
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
        $user->save();
        return redirect('khach/sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }
}
