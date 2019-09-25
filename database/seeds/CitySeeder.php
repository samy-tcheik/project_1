<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities =["alger" ,"setif","boumerdes"];
     foreach ($cities as $city){
         City::create([
             "designation" =>$city
         ]);
     }

    }
}
