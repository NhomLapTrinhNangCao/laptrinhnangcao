<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use App\Models\LoaiTin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\TuyenSinh;
use App\Models\TinTuc;
use App\Models\User;
use App\Models\GiangVien;
use App\Models\LanhDao;
use App\Models\ViTri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PageController extends Controller
{
    function getTuyenSinh()
    {
        $tuyensinh=TuyenSinh::all();
        return view('pages.tuyensinh',['tuyensinh'=>$tuyensinh]);
    }
    function getCTTuyenSinh($id)
    {
        $tuyensinh=TuyenSinh::find($id);
        return view('pages.chitiettuyensinh',['tuyensinh'=>$tuyensinh]);
    }
    function getTinTuc($id)
    {
        $tintuc=TinTuc::where('id_loai_tin','=',$id)->paginate(3);
        $tintucn=TinTuc::all()->take(4);
        $loaitin=LoaiTin::find($id);
        return view('pages.tintuc',['tintuc'=>$tintuc,'loaitinn'=>$loaitin,'tintucn'=>$tintucn]);
    }
    function getFTinTuc()
    {
        $tintuc=TinTuc::paginate(3);
        $tintucn=TinTuc::all()->take(4);
        return view('pages.tintuc',['tintuc'=>$tintuc,'tintucn'=>$tintucn]);
    }
    function getChiTietTinTuc($id)
    {
        $tintuc=TinTuc::find($id);
        $tintuc->so_luot_xem ++;
        $tintuc->save();
        $tintucn=TinTuc::all()->take(4);
        $binhluan=BinhLuan::where('id_tin_tuc','=',$id)->get();
        return view('pages.chitiettintuc',['tintuc'=>$tintuc,'binhluan'=>$binhluan,'tintucn'=>$tintucn]);
    }
    function getViTri($id)
    {
        $vitrif=ViTri::find($id);
        $giangvien=GiangVien::where('id_vi_tri','=',$id)->get();
        return view('pages.vitri',['vitrif'=>$vitrif,'giangvien'=>$giangvien]);
    }
    public function getThem(){
        return view('pages.taotaikhoan');
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
                return redirect('themkhach')->with('loi','Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
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
            return redirect('themkhach')->with('loi','Đã có vị trí chức vụ này');
        }
        $user->save();
        return redirect('themkhach')->with('thongbao','Thêm Thành Công');
    }
    function getTrangChu()
    {
        $tintuc=TinTuc::all()->take(2);
        return view('pages.trangchu',['tintuc'=>$tintuc]);
    }
    function getLichSu()
    {
        $tintuc=TinTuc::all()->take(4);
        return view('pages.lichsuphattrien',['tintuc'=>$tintuc]);
    }
    public function postThemBinhLuan(Request $request,$id){
        $this->validate($request,[
            'noi_dung' => 'required|min:3',
        ],[
            'noi_dung.required' => 'Bạn chưa nhập nội dunh bình luận',
            'noi_dung.min' => 'Nội dung bình luận phải có ít nhất 3 ký tự',
        ]);

        $binhluan= new BinhLuan();
        $binhluan->noi_dung = $request->noi_dung;
        $binhluan->id_tin_tuc = $id;
        $binhluan->id_user = Auth::user()->id;
        $binhluan->save();
        return redirect('chitiettintuc/'.$id)->with('thongbao','Thêm bình luận thành công');
    }
}
