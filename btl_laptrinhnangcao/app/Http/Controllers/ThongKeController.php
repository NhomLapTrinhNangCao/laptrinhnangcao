<?php

namespace App\Http\Controllers;
use App\Models\TinTuc;
use App\Models\User;
use App\Models\BinhLuan;
use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function getDanhSach(){
        $user=User::count();
        $sotintuc=TinTuc::count();
        $binhluan=BinhLuan::count();
        $tintuc=TinTuc::all();
        $luotxem=0;
        foreach ($tintuc as $tt)
        {
            $luotxem=$luotxem+$tt->so_luot_xem;
        }
        return view('admin.thongke.DsThongKe',['user'=>$user,'tintuc'=>$sotintuc,'luotxem'=>$luotxem,
                                                     'binhluan'=>$binhluan]);
    }
    public function getLDDanhSach(){
        $user=User::count();
        $sotintuc=TinTuc::count();
        $binhluan=BinhLuan::count();
        $tintuc=TinTuc::all();
        $luotxem=0;
        foreach ($tintuc as $tt)
        {
            $luotxem=$luotxem+$tt->so_luot_xem;
        }
        return view('lanhdao.thongke.DsThongKe',['user'=>$user,'tintuc'=>$sotintuc,'luotxem'=>$luotxem,
            'binhluan'=>$binhluan]);
    }
}
