<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinPriceListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pearlskin__price_list', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('created_by_user_id')->unsigned()->nullable();
            $table->integer('updated_by_user_id')->unsigned()->nullable();
            $table->integer('price_list_category_id')->unsigned()->nullable();
            $table->integer('procedure_id')->unsigned()->nullable();
            $table->boolean('is_visible')->default(1);
            $table->boolean('use_procedure_price')->default(1);
            $table->integer('sort_order');
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('updated_by_user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('price_list_category_id')->references('id')->on('pearlskin__price_list_cats')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('procedure_id')->references('id')->on('pearlskin__procedures')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pearlskin__price_list');
    }
}
