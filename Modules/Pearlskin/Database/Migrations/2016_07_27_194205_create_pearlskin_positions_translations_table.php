<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinPositionsTranslationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pearlskin__positions_translations', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title',128);

            $table->integer('position_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['position_id', 'locale']);
            $table->foreign('position_id', 'pearlskin_positions_translations_unique')->references('id')->on('pearlskin__positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pearlskin__positions_translations');
    }

}
