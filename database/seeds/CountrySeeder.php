<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries =["algerie" ,"france","tunisie"];
        foreach ($countries as $city){
            Country::create([
                "designation" =>$city
            ]);
    }
}
}
