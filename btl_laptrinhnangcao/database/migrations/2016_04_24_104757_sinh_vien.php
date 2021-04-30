<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SinhVien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinh_vien',function (Blueprint $table){
            $table ->increments('id');
            $table-> integer('mssv');
            $table ->bigInteger('id_user')->unsigned();
            $table ->integer('id_lop_hoc')->unsigned();
        });
        Schema::table('sinh_vien', function (Blueprint $table) {
            $table->foreign('id_lop_hoc')->references('id')->on('lop_hoc');
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
        Schema::dropIfExists('sinh_vien');
    }
}
