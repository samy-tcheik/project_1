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
            $table->foreign('juridic_form_id')->references('id')->on('juridic_forms');
            $table->integer('statu_id')->unsigned()->nullable();
            $table->foreign('statu_id')->references('id')->on('status');
            $table->boolean('regime_annee_civile')->default(0);
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
            $table->foreign('region_id')->references('id')->on('regions');
            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('code_postal')->nullable();

            //Activity Info
            $table->integer('sector_id')->unsigned()->nullable();
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->integer('activity_id')->unsigned()->nullable();
            $table->foreign('activity_id')->references('id')->on('activities');
            $table->string('code_nae')->nullable();
            $table->string('rc')->nullable();
            $table->string('effectif')->nullable();
            $table->double('ca', 10, 2)->nullable();
            $table->integer('currency_ca')->nullable();
            $table->double('cs', 10, 2)->nullable();
            $table->integer('currency_cs')->nullable();
            $table->integer('type')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users');
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
