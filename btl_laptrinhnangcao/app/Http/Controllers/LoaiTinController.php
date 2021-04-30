<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTin;

class LoaiTinController extends Controller
{
    public function getDanhSach()
    {
        $loaitin=LoaiTin::all();
        return view('admin.loaitin.DsLoaiTin',['loaitin'=>$loaitin]);
    }
    public function getThem()
    {
        return view('admin.loaitin.ThemLoaiTin');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
            ['ten'=>'required|min:3|max:256'],
            [
                'ten.required'=>'Ban chưa nhập tên loại tin mới',
                'ten.min'=>'Tên loại tin phải có tối thiểu 3 kí tự',
                'ten.max'=>'Tên loại tin không quá 256 kí tự',
            ]);
        $loaitin=new LoaiTin();
        $loaitin->ten=$request->ten;
        $loaitin->ten_khong_dau = changeTitle($request->ten);
        $loaitin->save();

        return redirect('admin/loaitin/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $loaitin = LoaiTin::find($id);
        return view('admin.loaitin.SuaLoaiTin',['loaitin'=>$loaitin]);
    }
    public function postSua(Request $request,$id)
    {
        $loaitin = LoaiTin::find($id);
        $loaitin->validate($request,
            [
                'ten' => 'required|min:3|max:256',

            ],
            [
                'ten.required' => 'Ban chưa nhập nơi công tác mới',
                'ten.min' => 'Tên loại tin phải có độ dài từ 3 đến 256 kí tự',
                'ten.max' => 'Tên loại tin tác phải có độ dài từ 3 đến 256 kí tự',
            ]);
        $loaitin->ten=$request->ten;
        $loaitin->ten_khong_dau = changeTitle($request->ten);
        $loaitin->save();
        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id){
        $loaitin = LoaiTin::find($id);
        $loaitin -> delete();
        return redirect('admin/loaitin/danhsach');
    }
}
