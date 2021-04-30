<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table= "tin_tuc";
    public function loaitin()
    {
        return $this->belongsTo('App\Models\LoaiTin','id_loai_tin','id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user','id');
    }
    public function binhluan()
    {
        return $this->hasMany('App\Models\BinhLuan','id_tin_tuc','id');
    }
}
