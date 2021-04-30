<?php

namespace App\Http\Controllers;

use App\Models\KhoaHoc;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class KhoaHocController extends Controller
{
    public function getDanhSach()
    {
        $khoahoc=KhoaHoc::all();
        return view('admin.khoahoc.DsKhoaHoc',['khoahoc'=>$khoahoc]);
    }
    public function getThem()
    {
        return view('admin.khoahoc.ThemKhoaHoc');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
            ['nien_khoa'=>'required|min:3|max:255'],
            [
                'nien_khoa.required'=>'Ban chưa nhập khóa học mới',
                'nien_khoa.min'=>'Khóa học phải có tối thiểu 3 kí tự',
                'nien_khoa.max'=>'Khóa học không quá 255 kí tự',
            ]);
        $khoahoc=new KhoaHoc();
        $khoahoc->nien_khoa=$request->nien_khoa;
        $khoahoc->save();

        return redirect('admin/khoahoc/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $khoahoc = KhoaHoc::find($id);
        return view('admin.khoahoc.SuaKhoaHoc',['khoahoc'=>$khoahoc]);
    }
    public function postSua(Request $request,$id)
    {
        $khoahoc = KhoaHoc::find($id);
        $this->validate($request,
            [
                'nien_khoa' => 'required|min:3|max:255',

            ],
            [
                'nien_khoa.required' => 'Ban chưa nhập khóa học mới',
                'nien_khoa.min' => 'Khóa học phải có tối thiểu 3 kí tự',
                'nien_khoa.max' => 'Khóa học không quá 255 kí tự',
            ]);
        $khoahoc->nien_khoa=$request->nien_khoa;
        $khoahoc->save();
        return redirect('admin/khoahoc/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id){
        $khoahoc = KhoaHoc::find($id);
        $khoahoc -> delete();
        return redirect('admin/khoahoc/danhsach');
    }
}
