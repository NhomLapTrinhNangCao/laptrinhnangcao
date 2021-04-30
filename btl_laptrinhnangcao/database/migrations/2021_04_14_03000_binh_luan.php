<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BinhLuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binh_luan',function (Blueprint $table){
           $table->increments('id');
           $table->longText('noi_dung');
           $table->timestamps();
           $table->integer('id_tin_tuc')->unsigned();
           $table->bigInteger('id_user')->unsigned();
        });
        Schema::table('binh_luan', function (Blueprint $table) {
            $table->foreign('id_tin_tuc')->references('id')->on('tin_tuc');
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
        Schema::dropIfExists('binh_luan');
    }
}
