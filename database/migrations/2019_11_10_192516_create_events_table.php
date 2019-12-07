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
            $table->increments('id');
            $table->string('theme')->unique();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->integer('depenses')->nullable();
            $table->string('depenses_designation')->nullable();
            $table->string('lieu')->nullable();
            $table->integer('cout')->nullable();
            $table->string('lien')->nullable();
            $table->longText('description')->nullable();
            $table->longText('observation')->nullable();
            $table->unsignedInteger('paiment_modes_id')->default(1);
            $table->foreign('paiment_modes_id')->references('id')->on('paiment_modes');
            $table->unsignedInteger('type');
            $table->foreign('type')->references('id')->on('event_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('restrict')
            ->onUpdate('restrict');
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
        Schema::dropIfExists('events');
    }
}
