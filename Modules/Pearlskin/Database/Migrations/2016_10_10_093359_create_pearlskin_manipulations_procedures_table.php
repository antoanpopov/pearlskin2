<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinManipulationsProceduresTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pearlskin__manipulations_procedures', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('quantity');

            $table->integer('manipulation_id')->unsigned();
            $table->integer('procedure_id')->nullable()->unsigned();
            $table->foreign('manipulation_id','pearlskin__manipulations_procedures_m')->references('id')->on('pearlskin__manipulations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('procedure_id','pearlskin__manipulations_procedures_p')->references('id')->on('pearlskin__procedures')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pearlskin__manipulations_procedures');
    }

}
