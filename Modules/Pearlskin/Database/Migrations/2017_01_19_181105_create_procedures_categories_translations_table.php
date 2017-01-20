<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProceduresCategoriesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pearlskin__procedures_cats_trans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title',255);
            $table->text('description');

            $table->integer('procedure_cat_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['procedure_cat_id', 'locale']);
            $table->foreign('procedure_cat_id')->references('id')->on('pearlskin__procedures_cats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pearlskin__procedures_cats_trans');
    }
}
