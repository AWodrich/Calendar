<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportingEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sporting_events', function (Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('_home_id');
            $table->foreign('_home_id')->references('id')->on('clubs')->onDelete('cascade');;
            $table->unsignedBigInteger('_outward_id');
            $table->foreign('_outward_id')->references('id')->on('clubs')->onDelete('cascade');;
            $table->unsignedBigInteger('_discipline_id');
            $table->foreign('_discipline_id')->references('id')->on('disciplines');
            $table->date('date');
            $table->time('time',0);
            $table->string('referee');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sporting_events');
    }
}
