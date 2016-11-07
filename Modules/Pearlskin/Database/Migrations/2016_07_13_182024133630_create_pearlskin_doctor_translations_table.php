<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinDoctorTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pearlskin__doctors_translations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
			$table->string('names',128);
			$table->text('description');

            $table->integer('doctor_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['doctor_id', 'locale']);
            $table->foreign('doctor_id')->references('id')->on('pearlskin__doctors')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pearlskin__doctors_translations');
	}
}
