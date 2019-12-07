<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventMontantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_montants', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('designation')->nullable();
            $table->unsignedInteger('event_id')->nullable();
            $table->foreign('event_id')->references('id')->on('events');
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
        Schema::dropIfExists('event_montants');
    }
}
