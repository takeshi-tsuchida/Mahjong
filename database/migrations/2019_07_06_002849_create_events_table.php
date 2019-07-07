<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('event_title',255);
            $table->string('area',255);
            $table->string('place',255);
            $table->date('event_date');
            $table->time('event_time');
            $table->integer('rate');
            $table->integer('number_of_people');
            $table->timestamps('');
            $table->engine = 'InnoDB';
            // $table->charset = 'utf8';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
