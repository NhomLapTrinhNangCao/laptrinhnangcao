<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GiangVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giang_vien',function (Blueprint $table){
            $table ->increments('id');
            $table ->bigInteger('id_user')->unsigned();
            $table ->integer('id_vi_tri')->unsigned();
            $table ->integer('ms_giang_vien')->unsigned();
        });
        Schema::table('giang_vien', function (Blueprint $table) {
            $table->foreign('id_vi_tri')->references('id')->on('vi_tri');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giang_vien');
    }
}
