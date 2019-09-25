<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotisations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('debut_date')->nullable();
            $table->date("paiment_date")->nullable();
            $table->date("ventilation_date")->nullable();
            $table->integer('paiment_mode_id')->unsigned()->nullable();
            $table->string("num_cheque")->nullable();
            $table->date("cheque_virement_date")->nullable();
            $table->string("BQ")->nullable();
            $table->text("observation")->nullable();
            $table->integer('adherents_id')->unsigned()->nullable();
            $table->integer('montants_id')->unsigned()->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotisations');
    }
}
