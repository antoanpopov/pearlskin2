<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinArticlesTranslationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pearlskin__articles_translations', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title',255);
            $table->text('content');

            $table->unique(['article_id', 'locale'], 'pearlskin_articles_translations_unique');
            $table->foreign('article_id', 'pearlskin_articles_translations_unique')->references('id')->on('pearlskin__articles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pearlskin__articles_translations');
    }

}
