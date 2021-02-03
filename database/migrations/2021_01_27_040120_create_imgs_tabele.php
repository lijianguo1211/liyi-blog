<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImgsTabele extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgs', function (Blueprint $table) {
            $table->id();
            $table->string('img_path', 150)->comment("图片路径");
            $table->string('img_name', 150)->comment('原文件名');
            $table->string('img_mime_type', 20)->comment('图片类型');
            $table->tinyInteger('img_type')->default(1)
                ->comment('图片类型,1 blog插图，2新闻插图，3问题分享插图，4图片分享');
            $table->tinyInteger('img_position')->default(1)
                ->comment("插入位置,1默认是插入封面，2插入内容");
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
        Schema::dropIfExists('imgs');
    }
}
