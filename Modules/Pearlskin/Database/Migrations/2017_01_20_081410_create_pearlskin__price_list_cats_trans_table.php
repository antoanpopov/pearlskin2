<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinPriceListCatsTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pearlskin__price_list_cats_trans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title',255);

            $table->integer('price_list_cat_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['price_list_cat_id', 'locale']);
            $table->foreign('price_list_cat_id')->references('id')->on('pearlskin__price_list_cats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pearlskin__price_list_cats_trans');
    }
}
