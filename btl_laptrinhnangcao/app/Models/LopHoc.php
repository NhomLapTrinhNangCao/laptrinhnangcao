<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    public $timestamps = false;
    protected $table = "lop_hoc";

    public function khoahoc()
    {
        return $this->belongsTo('App\Models\KhoaHoc','id_khoa_hoc','id');
    }
    public function giangvien()
    {
        return $this->belongsTo('App\Models\GiangVien','id_giang_vien','id');
    }
    public function sinhvien()
    {
        return $this->hasMany('App\Models\SinhVien','id_lop_hoc','id');
    }
}
