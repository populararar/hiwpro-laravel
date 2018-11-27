<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('event_id');
            $table->string('eventName');
            $table->timestamp('startDate');
            $table->timestamp('lastDate');
            $table->string('imgPath');
            $table->string('event_type');
            $table->timestamp('event_exp');
            $table->text('detail');
            $table->integer('income');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
