<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payeurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prenom_payeur');
            $table->string('nom_payeur');
            $table->string('mobile_payeur');
            $table->integer('telephone');
            $table->longText('observation');
            $table->text('adresse');
            $table->unsignedInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->unsignedInteger('adherent_id');
            $table->foreign('adherent_id')->references('id')->on('adherents');
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
        Schema::dropIfExists('payeurs');
    }
}
