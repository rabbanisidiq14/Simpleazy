<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_kas', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['belum_dibayar', 'dibayar']);
            $table->biginteger('id_user');
            $table->string('id_room',100);
            $table->integer('id_kas_setting');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_kas');
    }
}
