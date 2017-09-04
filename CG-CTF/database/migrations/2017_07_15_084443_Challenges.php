<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Challenges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');   //题目名
            $table->string('class');   //分类
            $table->text('description')->nullable();; //题目描述
            $table->text('url')->nullable();;       //题目或附件地址
            $table->text('flag');     //flag
            $table->text('info')->nullable();;     //备注
            $table->integer('score');    //分数

            $table->index('class');
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
        Schema::dropIfExists('Challenges');
    }
}
