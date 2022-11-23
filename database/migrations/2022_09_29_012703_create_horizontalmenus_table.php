<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horizontalmenus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namemenu');
            $table->string('slugmenu');
            $table->integer('animation_id')->unsigned()->nullable();
            $table->integer('delay_id')->unsigned()->nullable();
            $table->string('idelement');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horizontalmenus');
    }
};
