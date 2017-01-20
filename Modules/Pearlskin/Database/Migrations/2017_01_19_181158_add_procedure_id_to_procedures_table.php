<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProcedureIdToProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pearlskin__procedures', function (Blueprint $table) {
            $table->integer('procedure_cat_id')->unsigned()->nullable()->after('id');
            $table->foreign('procedure_cat_id')->references('id')->on('pearlskin__procedures_cats')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pearlskin__procedures', function (Blueprint $table) {
            $table->dropForeign(['procedure_cat_id']);
            $table->dropColumn('procedure_cat_id');
        });
    }
}
