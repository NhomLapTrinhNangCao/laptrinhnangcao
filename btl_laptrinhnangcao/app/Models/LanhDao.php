<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanhDao extends Model
{
    public $timestamps = false;
    protected $table= "lanh_dao";
    public function giangvien()
    {
        return $this->belongsTo('App\Models\GiangVien','id_giang_vien','id');
    }
}
