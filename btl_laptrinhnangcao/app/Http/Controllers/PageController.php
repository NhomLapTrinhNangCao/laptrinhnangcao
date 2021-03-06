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
use App\Jobs\SendEmail;
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
        $tuyensinh->so_luot_xem ++;
        $tuyensinh->save();
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
            'name.required' => 'B???n ch??a nh???p t??n ng?????i d??ng',
            'name.min' => 'T??n ng?????i d??ng ph???i c?? ??t nh???t 3 k?? t???',
            'email.required' => 'B???n ch??a nh???p email',
            'email.email' => 'B???n ch??a nh???p ????ng ?????nh d???ng email',
            'email.unique' => 'Email ???? t???n t???i',
            'password.required' => 'B???n ch??a nh???p m???t kh???u',
            'password.min' => 'm???t kh???u ph???i c?? ????? d??i t??? 3 ?????n 255 k?? t???',
            'password.max' => 'm???t kh???u ph???i c?? ????? d??i t??? 3 ?????n 255 k?? t???',
            'passwordAgain.required' => 'B???n ch??a nh???p l???i m???t kh???u',
            'passwordAgain.same' => 'M???t kh???u kh??ng kh???p',
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
                return redirect('themkhach')->with('loi','B???n ch??? ???????c ch???n file c?? ??u??i jpg, png, jpeg');
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
            return redirect('themkhach')->with('loi','???? c?? v??? tr?? ch???c v??? n??y');
        }
        $user->save();
        return redirect('themkhach')->with('thongbao','Th??m Th??nh C??ng');
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
            'noi_dung.required' => 'B???n ch??a nh???p n???i dunh b??nh lu???n',
            'noi_dung.min' => 'N???i dung b??nh lu???n ph???i c?? ??t nh???t 3 k?? t???',
        ]);

        $binhluan= new BinhLuan();
        $binhluan->noi_dung = $request->noi_dung;
        $binhluan->id_tin_tuc = $id;
        $binhluan->id_user = Auth::user()->id;
        $binhluan->save();
        return redirect('chitiettintuc/'.$id)->with('thongbao','Th??m b??nh lu???n th??nh c??ng');
    }
    function getQuenMatKhau()
    {
        return view('pages.quenmatkhau');
    }
    public function postQuenMatKhau(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
        ],[
            'email.required' => 'B???n ch??a nh???p email',
            'email.email' => 'B???n ch??a nh???p ????ng ?????nh d???ng email',
        ]);
        $user=User::where('email','=',$request->email)->first();
        $password = Str::random(6);
        $user->password = bcrypt($password);
        $user->save();
        $message = [
            'email' => $user->email,
            'password' => $password,
        ];
        SendEmail::dispatch($message, $user)->delay(now()->addMinute(1));
        return redirect('quenmatkhau')->with('thongbao','???? g???i m???t kh???u m???i t???i email c???a b???n');
    }
}
