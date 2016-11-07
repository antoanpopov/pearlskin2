<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinArticlesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pearlskin__articles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('created_by_user_id')->unsigned()->nullable();
            $table->integer('updated_by_user_id')->unsigned()->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('sort_order')->default(1);
            $table->timestamps();

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
        Schema::drop('pearlskin__articles');
    }

}
