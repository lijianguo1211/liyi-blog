<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_details', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id')->comment('文章id');
            $table->string('post_title')->comment('标题');
            $table->string('post_key_word')->nullable()->comment('文章关键词');
            $table->tinyInteger('post_status')->default(1)->comment('状态,1发布，2草稿，3关闭，4删除，5预发布');
            $table->tinyInteger('is_top')->default(0)->comment('是否置顶');
            $table->tinyInteger('source')->default(1)->comment('文章类型，1原创，2转载，3翻译');
            $table->string('post_excerpt')->comment('简介');
            $table->text('post_content')->comment('内容');
            $table->integer('post_author')->default(0)->comment('作者');
            $table->integer('read_account')->default(0)->comment('阅读量');
            $table->integer('like_account')->default(0)->comment('点赞量');
            $table->timestamp('post_date')->comment('发布时间');
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
        Schema::dropIfExists('post_details');
    }
}
