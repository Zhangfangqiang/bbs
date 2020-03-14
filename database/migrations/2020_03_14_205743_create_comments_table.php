<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model_type')->comment('关联的模型名称');
            $table->unsignedBigInteger('model_id')->comment('评论内容的id');
            $table->unsignedBigInteger('parent_id')->nullable()->default(null)->comment('父id');
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('CASCADE');           #关系连接
            $table->unsignedInteger('level');                                                                                     #级别
            $table->string('path');                                                                                               #路径
            $table->unsignedBigInteger('user_id')->comment('那个用户评论的');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');                #关系连接
            $table->unsignedBigInteger('to_user_id')->nullable()->default(0)->comment('我对那个用户的评论发起了评论');
            $table->unsignedBigInteger('like_count')->nullable()->default(0)->comment('喜欢我的评论的数量');
            $table->unsignedBigInteger('dislike_count')->nullable()->default(0)->comment('不喜欢我的评论的数量');
            $table->string('content',1024)->comment('评论内容');
            $table->tinyInteger('status')->nullable()->default(1)->comment('评论状态 1 可以显示');
            $table->json('more')->nullable()->comment('扩展属性');
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
        Schema::dropIfExists('comments');
    }
}
