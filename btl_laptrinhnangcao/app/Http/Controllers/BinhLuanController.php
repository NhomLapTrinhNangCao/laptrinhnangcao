<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BinhLuan;

class BinhLuanController extends Controller
{
    public function getXoa($id,$id_tin_tuc){
        $binhluan = BinhLuan::find($id);
        $binhluan -> delete();
        return redirect('admin/tintuc/sua/'.$id_tin_tuc)->with('thongbao','Xóa bình luận thành công');
    }
}
