<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->integerIncrements('id')->comment('id');
            $table->string('header_name', 50)->comment('名字');
            $table->string('header_url', 50)->comment('链接');
            $table->string('parent_path')->comment('关联关系');
            $table->tinyInteger('header_order')->default(1)->comment('排序');
            $table->tinyInteger('header_status')->default(0)->comment('状态,默认关闭，1打开');
            $table->integer('create_user_id')->default(0)->comment('添加人');
            $table->integer('update_user_id')->default(0)->comment('修改人');
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
        Schema::dropIfExists('headers');
    }
}
