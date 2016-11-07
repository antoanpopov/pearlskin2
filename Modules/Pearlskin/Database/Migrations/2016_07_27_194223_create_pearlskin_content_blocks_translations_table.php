<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinContentBlocksTranslationsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pearlskin__content_blocks_translations', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title',255);
            $table->text('content');

            $table->string('locale')->index();
            $table->integer('content_block_id')->unsigned();
            $table->unique(['content_block_id', 'locale'],'pearlskin_content_blocks_translations_unique');
            $table->foreign('content_block_id', 'pearlskin_content_blocks_translations_unique_fk')->references('id')->on('pearlskin__content_blocks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pearlskin__content_blocks_translations');
    }

}
