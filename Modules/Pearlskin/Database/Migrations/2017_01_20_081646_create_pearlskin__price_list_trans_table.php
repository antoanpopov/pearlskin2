<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinPriceListTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pearlskin__price_list_trans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title',255);

            $table->integer('price_list_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['price_list_id', 'locale']);
            $table->foreign('price_list_id')->references('id')->on('pearlskin__price_list')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pearlskin__price_list_trans');
    }
}
