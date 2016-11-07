<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinManipulationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pearlskin__manipulations', function(Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
			$table->integer('created_by_user_id')->unsigned()->nullable();
			$table->integer('updated_by_user_id')->unsigned()->nullable();
            $table->integer('client_id')->unsigned()->nullable();
            $table->integer('doctor_id')->unsigned()->nullable();
            $table->string('title',255);
            $table->text('description');
            $table->string('learnt_from',255);
            $table->boolean('client_has_discount')->default(0);
            $table->decimal('amount_total',10,2);
            $table->decimal('amount_discount',10,2);
            $table->decimal('amount_paid',10,2);
            $table->decimal('amount_dept',10,2);
            $table->date('date_of_manipulation');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('pearlskin__clients')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('doctor_id')->references('id')->on('pearlskin__doctors')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('updated_by_user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pearlskin__manipulations');
	}
}
