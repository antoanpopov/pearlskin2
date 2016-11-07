<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinCarouselsTranslationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pearlskin__carousels_translations', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title',128);
            $table->text('description');

            $table->integer('carousel_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['carousel_id', 'locale']);
            $table->foreign('carousel_id')->references('id')->on('pearlskin__carousels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pearlskin__carousels_translations');
    }

}
