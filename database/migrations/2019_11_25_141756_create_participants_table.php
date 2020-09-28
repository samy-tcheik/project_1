<?php

use App\Models\adherent\Adherent;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prenom_participant');
            $table->string('nom_participant');
            $table->string('mobile_participant')->nullable();
            $table->string('fonction')->nullable();
            $table->string('email');
            $table->boolean('presence')->default(false);
            $table->unsignedInteger('montant_id')->nullable();
            $table->foreign('montant_id')->references('id')->on('event_montants');
            $table->unsignedInteger('paiment_mode_id')->default(1);
            $table->foreign('paiment_mode_id')->references('id')->on('paiment_modes');
            $table->unsignedInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')
            ->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('adherent_id');
            $table->foreign('adherent_id')->references('id')->on('adherents');
            $table->unsignedInteger('payeur_id')->nullable();
            $table->foreign('payeur_id')->references('id')->on('payeurs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('participants');
    }
}
