<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinProcedureTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pearlskin__procedures_translations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
			$table->string('title',255);
			$table->text('description');

            $table->integer('procedure_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['procedure_id', 'locale']);
            $table->foreign('procedure_id')->references('id')->on('pearlskin__procedures')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pearlskin__procedures_translations');
	}
}
