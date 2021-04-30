<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $table= "binh_luan";
    public function tintuc()
    {
        return $this->belongsTo('App\Models\TinTuc','id_tin_tuc','id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user','id');
    }
}
