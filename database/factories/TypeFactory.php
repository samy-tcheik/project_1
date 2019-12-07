<?php
use App\Models\Event\EventType;
use App\Models\Auth\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(EventType::class, function (Faker $faker){
    $users = User::get()->pluck("id")->toArray();
    $user = Auth::loginUsingId($faker->randomElement($users));
   // dd($users, $faker->randomElement($users));

    return [
        "type"=>$faker->name,
        "prefix"=>Str::random(5),
        "created_by"=>$user->id
    ];
});