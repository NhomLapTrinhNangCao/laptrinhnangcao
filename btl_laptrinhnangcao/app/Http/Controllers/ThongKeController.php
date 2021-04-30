<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    public function getDanhSach(){
        return view('admin.thongke.DsThongKe');
    }
    public function getLDDanhSach(){
        return view('lanhdao.thongke.DsThongKe');
    }
}
