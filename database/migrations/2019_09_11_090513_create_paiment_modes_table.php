<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaimentModesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiment_modes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("designation");
        });
        Schema::table("cotisations",function (Blueprint $table){
            $table->foreign('adherents_id')->references("id")->on('adherents');
            $table->foreign('montants_id')->references("id")->on('montants');
            $table->foreign('paiment_mode_id')->references("id")->on('paiment_modes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paiment_modes');
    }
}
