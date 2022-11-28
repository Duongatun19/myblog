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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titleproduct');
            $table->string('slugproduct');
            $table->string('category_id');
            $table->integer('animation_id')->unsigned()->nullable();
            $table->integer('delay_id')->unsigned()->nullable();
            $table->string('status');
            $table->string('imgproduct');
            $table->string('link');
            $table->string('noidung');
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
        Schema::dropIfExists('products');
    }
};
