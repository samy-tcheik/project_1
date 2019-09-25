<?php

use Illuminate\Database\Seeder;
use App\Models\Sector;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectors =["sector1" ,"sector2","sector3"];
        foreach ($sectors as $city){
            Sector::create([
                "designation" =>$city
            ]);
    }}
}
