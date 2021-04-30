<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    public $timestamps = false;
    protected $table= "sinh_vien";
    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user','id');
    }
    public function lophoc()
    {
        return $this->belongsTo('App\Models\LopHoc','id_lop_hoc','id');
    }
}
