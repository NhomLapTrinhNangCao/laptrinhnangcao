<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use App\Models\LopHoc;
use App\Models\KhoaHoc;
use Illuminate\Http\Request;

class LopHocController extends Controller
{
    public function getDanhSach()
    {
        $lophoc=LopHoc::all();
        return view('admin.lophoc.DsLopHoc',['lophoc'=>$lophoc]);
    }
    public function getThem()
    {
        $giangvien=GiangVien::all();
        $khoahoc=KhoaHoc::all();
        return view('admin.lophoc.ThemLopHoc',['khoahoc'=>$khoahoc,'giangvien'=>$giangvien]);
    }
    public function postThem (Request $request)
    {
        $this->validate($request,
            [
                'nien_khoa' => 'required',
                'name' => 'required',
                'ten_lop_hoc' => 'required|min:3|max:255',
            ],
            [
                'nien_khoa.required'=>'Ban chưa nhập khóa học',
                'name.required'=>'Ban chưa nhập tên giáo viên chủ nhiệm',
                'ten_lop_hoc.required'=>'Ban chưa nhập tên lớp học',
                'ten_lop_hoc.min'=>'Tên lớp học co do dai tu 3 den 255 ky tu',
                'ten_lop_hoc.max'=>'Tên lớp học co do dai tu 3 den 255 ky tu',

            ]);
        $lophoc= new LopHoc() ;
        $lophoc->ten_lop_hoc=$request->ten_lop_hoc;
        $lophoc->id_khoa_hoc=$request->nien_khoa;
        $lophoc->id_giang_vien=$request->name;
        $lophoc->save();
        return redirect('admin/lophoc/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $giangvien=GiangVien::all();
        $khoahoc=KhoaHoc::all();
        $lophoc = LopHoc::find($id);
        return view('admin.lophoc.SuaLopHoc',['giangvien'=>$giangvien,'khoahoc'=>$khoahoc,'lophoc'=>$lophoc]);
    }
    public function postSua(Request $request,$id)
    {
        $lophoc = LopHoc::find($id);
        $this->validate($request,
            [
                'nien_khoa' => 'required',
                'name' => 'required',
                'ten_lop_hoc' => 'required|min:3|max:255',
            ],
            [
                'nien_khoa.required'=>'Ban chưa nhập khóa học',
                'name.required'=>'Ban chưa nhập tên giáo viên chủ nhiệm',
                'ten_lop_hoc.required'=>'Ban chưa nhập tên lớp học',
                'ten_lop_hoc.min'=>'Tên lớp học co do dai tu 3 den 255 ky tu',
                'ten_lop_hoc.max'=>'Tên lớp học co do dai tu 3 den 255 ky tu',

            ]);

        $lophoc->ten_lop_hoc=$request->ten_lop_hoc;
        $lophoc->id_khoa_hoc=$request->nien_khoa;
        $lophoc->id_giang_vien=$request->name;
        $lophoc->save();
        return redirect('admin/lophoc/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id){
        $lophoc = LopHoc::find($id);
        $lophoc -> delete();
        return redirect('admin/lophoc/danhsach');
    }
}
