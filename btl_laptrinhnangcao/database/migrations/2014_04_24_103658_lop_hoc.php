<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LopHoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop_hoc',function (Blueprint $table){
            $table ->increments('id');
            $table->string('ten_lop_hoc',255);
            $table ->integer('id_khoa_hoc')->unsigned();
            $table ->integer('id_giang_vien')->unsigned();
        });
        Schema::table('lop_hoc', function (Blueprint $table) {
            $table->foreign('id_khoa_hoc')->references('id')->on('khoa_hoc');
            $table->foreign('id_giang_vien')->references('id')->on('giang_vien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lop_hoc');
    }
}
