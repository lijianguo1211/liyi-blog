<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTabele extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag_name', 100)->index()->comment("标签名");
            $table->string('tag_url', 100)->unique()->comment("标签链接");
            $table->string('tag_parent')->default('-')->comment("标签关联关系");
            $table->tinyInteger('tag_type')->comment("标签分类");
            $table->integer('tag_sort')->comment("标签排序");
            $table->tinyInteger('tag_status')->comment("状态");
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
        Schema::dropIfExists('tags');
    }
}
