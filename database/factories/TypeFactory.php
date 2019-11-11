<?php
use App\Models\Event\EventType;
use App\Models\Auth\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(EventType::class, function (Faker $faker){
    $users = User::all("id")->pluck("id");

    return [
        "type"=>$faker->name,
        "prefix"=>Str::random(5),
        "created_by"=>$faker->randomElement($users)
    ];
});