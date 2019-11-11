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
            $table->unsignedInteger('montant')->nullable();
            $table->foreign('montant')->references('id')->on('montants');
            $table->unsignedInteger('paiment')->nullable();
            $table->foreign('paiment')->references('id')->on('paiment_modes');
            $table->unsignedInteger('type')->nullable();
            $table->foreign('type')->references('id')->on('event_types')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->unsignedInteger('responsable')->nullable();
            $table->foreign('responsable')->references('id')->on('users')
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
