<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdherentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adherents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('dossier')->nullable();

            $table->integer('juridic_form_id')->unsigned()->nullable();
            $table->foreign('juridic_form_id')->references('id')->on('juridic_forms')->onDelete('cascade');

            $table->integer('statu_id')->unsigned()->nullable();
            $table->foreign('statu_id')->references('id')->on('status')->onDelete('cascade');

            $table->boolean('regime_annee_civile');
            $table->date('adhesion_date')->nullable();
            $table->text('description')->nullable();

            //Company Info
            $table->string('tel1')->nullable();
            $table->string('tel2')->nullable();
            $table->string('fax1')->nullable();
            $table->string('fax2')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('site_web')->nullable();
            $table->string('boite_postal')->nullable();
            $table->text('adress')->nullable();

            $table->integer('region_id')->unsigned()->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');

            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

            $table->string('code_postal')->nullable();

            //Activity Info
            $table->integer('sector_id')->unsigned()->nullable();
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');

            $table->integer('activity_id')->unsigned()->nullable();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');

            $table->string('code_nae')->nullable();
            $table->string('rc')->nullable();
            $table->string('effectif')->nullable();
            $table->double('ca', 10, 2)->nullable();
            $table->enum('currency_ca', ['dzd' , 'euro'])->nullable();
            $table->double('cs', 10, 2)->nullable();
            $table->enum('currency_cs', ['dzd', 'euro'])->nullable();
            $table->enum('type', ['actif', 'algerien', 'etranger'])->nullable();


            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
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
        Schema::dropIfExists('adherents');
    }
}
