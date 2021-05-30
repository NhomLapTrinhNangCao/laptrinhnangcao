<?php

namespace App\Http\Controllers;

use App\Models\TinNhanCho;
use Illuminate\Http\Request;

class TinNhanChoController extends Controller
{
    public function getDanhSach(){
        $tinnhancho= TinNhanCho::orderBy('id','DESC')->paginate(10);//desc giam dan
        return view('admin.tinnhancho.DsTinNhanCho', ['tinnhancho'=>$tinnhancho]);
    }
    public function getSua($id){
        $tinnhancho = TinNhanCho::find($id);
        if($tinnhancho->duyet == true) $tinnhancho->duyet=false;
        else $tinnhancho->duyet=true;
        $tinnhancho->save();
        return redirect('admin/tinnhancho/danhsach');
    }
    public function getXoa($id){
        $tinnhancho = TinNhanCho::find($id);
        $tinnhancho-> delete();
        return redirect('admin/tinnhancho/danhsach')->with('thongbao','Đã xóa');
    }

    public function getLDDanhSach(){
        $tinnhancho= TinNhanCho::orderBy('id','DESC')->paginate(5);//desc giam dan
        return view('lanhdao.tinnhancho.DsTinNhanCho', ['tinnhancho'=>$tinnhancho]);
    }
    public function getLDSua($id){
        $tinnhancho = TinNhanCho::find($id);
        if($tinnhancho->duyet == true) $tinnhancho->duyet=false;
        else $tinnhancho->duyet=true;
        $tinnhancho->save();
        return redirect('lanhdao/tinnhancho/danhsach');
    }
    public function getLDXoa($id){
        $tinnhancho = TinNhanCho::find($id);
        $tinnhancho-> delete();
        return redirect('lanhdao/tinnhancho/danhsach')->with('thongbao','Đã xóa');
    }

    public function getGVDanhSach(){
        $tinnhancho= TinNhanCho::orderBy('id','DESC')->paginate(5);//desc giam dan
        return view('giangvien.tinnhancho.DsTinNhanCho', ['tinnhancho'=>$tinnhancho]);
    }
    public function getGVSua($id){
        $tinnhancho = TinNhanCho::find($id);
        if($tinnhancho->duyet == true) $tinnhancho->duyet=false;
        else $tinnhancho->duyet=true;
        $tinnhancho->save();
        return redirect('giangvien/tinnhancho/danhsach');
    }
    public function getGVXoa($id){
        $tinnhancho = TinNhanCho::find($id);
        $tinnhancho-> delete();
        return redirect('giangvien/tinnhancho/danhsach')->with('thongbao','Đã xóa');
    }
    public function getThem()
    {
        return view('pages.lienhe');
    }
    public function postThem(Request $request){
        $this->validate($request,[
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'noi_dung' => 'required|min:3',
        ],[
            'name.required' => 'Bạn chưa nhập tên',
            'name.min' => 'Tên người dùng phải có ít nhất 3 ký tự',
            'name.max' => 'Tên người dùng có nhiều nhất 255 ký tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Bạn chưa nhập đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'noi_dung.required' => 'Bạn chưa nhập tin nhắn',
            'noi_dung.min' => 'Tin nhắn phải có độ dài tối thiểu 3 kí tự'
        ]);
        $tinnhancho = new TinNhanCho;
        $tinnhancho->name = $request->name;
        $tinnhancho->email = $request->email;
        $tinnhancho->noi_dung = $request->noi_dung;
        $tinnhancho->duyet=false;
        $tinnhancho->save();
        return redirect('lienhe')->with('thongbao','Bạn đã gửi tin nhắn thành công');
    }
}
