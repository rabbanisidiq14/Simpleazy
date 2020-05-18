<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_setting',function(Blueprint $table){
            $table->increments('id_kas');
            $table->integer('jumlah');
            $table->longText('deskripsi');
            $table->timestamp('waktu');
            $table->biginteger('id_user');
            $table->string('id_room',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kas_setting');
    }
}
