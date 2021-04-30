<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViTri extends Model
{
    public $timestamps = false;
    protected $table= "vi_tri";
    public function giangvien()
    {
        return $this->hasMany('App\Models\GiangVien','id_vi_tri','id');
    }

}
