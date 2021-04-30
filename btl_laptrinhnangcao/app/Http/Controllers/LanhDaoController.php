<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use App\Models\LanhDao;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LanhDaoController extends Controller
{
    public function getDanhSach()
    {
        $lanhdao=LanhDao::all();
        return view('admin.lanhdao.DsLanhDao',['lanhdao'=>$lanhdao]);
    }
    public function getThem()
    {
        $giangvien=GiangVien::all();
        return view('admin.lanhdao.ThemLanhDao',['giangvien'=>$giangvien]);
    }
    public function postThem (Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'ten_chuc_vu' => 'required|min:3|max:255',
            ],
            [
                'name.required'=>'Ban chưa nhập lãnh đạo',
                'ten_chuc_vu.required'=>'Ban chưa nhập tên chức vụ lãnh đạo',
                'ten_chuc_vu.min'=>'Tên chức vụ lãnh đạo co do dai tu 3 den 255 ky tu',
                'ten_chuc_vu.max'=>'Tên chức vụ lãnh đạo do dai tu 3 den 255 ky tu',

            ]);
        $lanhdao= new LanhDao() ;
        $lanhdao->ten_chuc_vu=$request->ten_chuc_vu;
        $lanhdao->id_giang_vien=$request->name;
        $user=User::find($lanhdao->giangvien->user->id);
        if($user->quyen == 3)
        {
            $user->quyen = 2;
        }
        $user->save();
        $lanhdao->save();
        return redirect('admin/lanhdao/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id)
    {
        $giangvien=GiangVien::all();
        $lanhdao = LanhDao::find($id);
        return view('admin.lanhdao.SuaLanhDao',['giangvien'=>$giangvien,'lanhdao'=>$lanhdao]);
    }
    public function postSua(Request $request,$id)
    {
        $lanhdao = LanhDao::find($id);
        $this->validate($request,
            [
                'name' => 'required',
                'ten_chuc_vu' => 'required|min:3|max:255',
            ],
            [
                'name.required'=>'Ban chưa nhập lãnh đạo',
                'ten_chuc_vu.required'=>'Ban chưa nhập tên chức vụ lãnh đạo',
                'ten_chuc_vu.min'=>'Tên chức vụ lãnh đạo co do dai tu 3 den 255 ky tu',
                'ten_chuc_vu.max'=>'Tên chức vụ lãnh đạo do dai tu 3 den 255 ky tu',

            ]);

        $lanhdao->ten_chuc_vu=$request->ten_chuc_vu;
        $lanhdao->id_giang_vien=$request->name;
        $user=User::find($lanhdao->giangvien->user->id);
        if($user->quyen == 3)
        {
            $user->quyen = 2;
        }
        $lanhdao->save();
        return redirect('admin/lanhdao/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id){
        $lanhdao = LanhDao::find($id);
        $lanhdao -> delete();
        return redirect('admin/lanhdao/danhsach');
    }
}
