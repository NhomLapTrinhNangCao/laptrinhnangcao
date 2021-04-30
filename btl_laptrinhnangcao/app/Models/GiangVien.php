<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    public $timestamps = false;
    protected $table= "giang_vien";
    public function vitri()
    {
        return $this->belongsTo('App\Models\ViTri','id_vi_tri','id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user','id');
    }
    public function lanhdao()
    {
        return $this->hasOne('App\Models\LanhDao','id_giang_vien','id');
    }
}
