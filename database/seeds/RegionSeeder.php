<?php

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions =["lakhdaria" ,"kadiria","bordj_menaiel"];
        foreach ($regions as $city){
            Region::create([
                "designation" =>$city
            ]);
    }}
}
