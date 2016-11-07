<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePearlskinEmailMessagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pearlskin__email_messages', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('parent_email_message_id')->unsigned()->nullable();
            $table->boolean('is_read')->default(0);
            $table->string('sender_names',255);
            $table->string('sender_email',128);
            $table->string('receiver_email',128);
            $table->string('message_subject');
            $table->text('message_text');
            $table->timestamps();

            $table->foreign('parent_email_message_id')->references('id')->on('pearlskin__email_messages')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pearlskin_email_messages');
    }

}
