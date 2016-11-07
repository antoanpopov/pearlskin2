<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinContentBlocksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pearlskin__content_blocks', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('page_id')->unsigned()->nullable();
            $table->integer('position_id')->unsigned()->nullable();
            $table->integer('created_by_user_id')->unsigned()->nullable();
            $table->integer('updated_by_user_id')->unsigned()->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('sort_order')->default(1);
            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('page__pages')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('position_id')->references('id')->on('pearlskin__positions')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('updated_by_user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pearlskin__content_blocks');
    }

}
