<?php

use App\Models\adherent\Adherent;
use App\Models\Activity;
use App\Models\Auth\User;
use App\Models\City;
use App\Models\Country;
use App\Models\Region;
use App\Models\Sector;
use App\Models\Statu;
use App\Models\Juridic_form;
use Faker\Generator as Faker;



$factory->define(Adherent::class, function (Faker $faker) {

    $cities = City::all("id")->pluck("id");
    $activities = Activity::all('id')->pluck('id');
    $countries = Country::all('id')->pluck('id');
    $juridics = Juridic_form::all('id')->pluck('id');
    $regions = Region::all('id')->pluck('id');
    $sectors = Sector::all('id')->pluck('id');
    $statu = Statu::all('id')->pluck('id');
    $users = User::all("id")->pluck("id");



    return [
        "name"=>$faker->name,
        "prospect"=>"1",
        "city_id"=>$faker->randomElement($cities),
        "tel1"=>"12345654324567",
        "description"=>"defrgthgbfd",
        "region_id" =>$faker->randomElement( $regions),
        "activity_id"=>$faker->randomElement($activities),
        "country_id"=>$faker->randomElement($countries),
        "juridic_form_id"=>$faker->randomElement($juridics),
        "sector_id"=>$faker->randomElement($sectors),
        "statu_id"=>$faker->randomElement($statu)

    ];
});
