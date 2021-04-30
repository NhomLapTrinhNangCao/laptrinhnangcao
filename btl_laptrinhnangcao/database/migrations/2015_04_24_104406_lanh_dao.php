<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LanhDao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lanh_dao',function (Blueprint $table){
            $table ->increments('id');
            $table->string('ten_chuc_vu',255);
            $table ->integer('id_giang_vien')->unsigned();
        });
        Schema::table('lanh_dao', function (Blueprint $table) {
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
        Schema::dropIfExists('lanh_dao');
    }
}
