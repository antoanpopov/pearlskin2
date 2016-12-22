<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCommentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog__comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('blog_post_id')->unsigned()->nullable();
            $table->integer('comment_parent_id')->unsigned()->nullable();
            $table->string('nickname',64);
            $table->string('email',128);
            $table->text('comment_text');
            $table->boolean('is_approved')->default(1);
            $table->timestamps();

            $table->foreign('blog_post_id')->references('id')->on('blog__posts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('comment_parent_id')->references('id')->on('blog__comments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blog__comments');
    }

}
