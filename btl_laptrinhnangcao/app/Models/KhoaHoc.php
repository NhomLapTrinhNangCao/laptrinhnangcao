<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    public $timestamps = false;
    protected $table= "khoa_hoc";
    public function lophoc()
    {
        return $this->hasMany('App\Models\LopHoc','id_khoa_hoc','id');
    }
}
