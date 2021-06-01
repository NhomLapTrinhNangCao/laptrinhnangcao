<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViTri;
use App\Models\GiangVien;
class ViTriController extends Controller
{
    public function getDanhSach()
    {
        $vitri=ViTri::all();
        return view('admin.vitri.DsViTri',['vitri'=>$vitri]);
    }
    public function getThem()
    {
        return view('admin.vitri.ThemViTri');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
            ['noi_cong_tac'=>'required|min:3|max:256'],
            ['mo_ta'=>'required|min:3'],
            [
                'noi_cong_tac.required'=>'Ban chưa nhập nơi công tác mới',
                'noi_cong_tac.min'=>'Nơi công tác phải có tối thiểu 3 kí tự',
                'noi_cong_tac.max'=>'Nơi công tác không quá 256 kí tự',
                'mo_ta.required'=>'Ban chưa nhập mô tả mới',
                'mo_ta.min'=>'Mô tả phải có tối thiểu 3 kí tự',
            ]);
        $vitri=new ViTri();
        $vitri->noi_cong_tac=$request->noi_cong_tac;
        $vitri->mo_ta=$request->mo_ta;
        $vitri->save();

        return redirect('admin/vitri/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $vitri = ViTri::find($id);
        return view('admin.vitri.SuaViTri',['vitri'=>$vitri]);
    }
    public function postSua(Request $request,$id)
    {
        $vitri = ViTri::find($id);
        $this->validate($request,
            [
                'noi_cong_tac' => 'required|min:3|max:256',
                ['mo_ta'=>'required|min:3'],
            ],
            [
                'noi_cong_tac.required' => 'Ban chưa nhập nơi công tác mới',
                'noi_cong_tac.min' => 'Tên nơi công tác phải có độ dài từ 3 đến 256 kí tự',
                'noi_cong_tac.max' => 'Tên nơi công tác phải có độ dài từ 3 đến 256 kí tự',
                'mo_ta.required'=>'Ban chưa nhập mô tả mới',
                'mo_ta.min'=>'Mô tả phải có tối thiểu 3 kí tự',
            ]);
        $vitri->noi_cong_tac=$request->noi_cong_tac;
        $vitri->mo_ta=$request->mo_ta;
        $vitri->save();
        return redirect('admin/vitri/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id){
        $vitri = ViTri::find($id);
        if(GiangVien::where('id_vi_tri', '=', $id)->exists())
        {
        return redirect('admin/vitri/danhsach')->with('thongbao','Xóa thất bại do có giang viên ở vị trí này');
        }
        $vitri -> delete();
        return redirect('admin/vitri/danhsach');
    }
}
