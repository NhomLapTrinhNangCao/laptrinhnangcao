<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TinNhanCho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_nhan_cho',function(Blueprint $table){
            $table->increments('id');
            $table->string('name',255);
            $table->string('email',255);
            $table->longText('noi_dung');
            $table->boolean('duyet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("tin_nhan_cho");
    }
}
