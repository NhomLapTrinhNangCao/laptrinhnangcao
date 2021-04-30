<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    protected $table= "loai_tin";
    public function tintuc()
    {
        return $this->hasMany('App\Models\TinTuc','id_loai_tin','id');
    }
}
