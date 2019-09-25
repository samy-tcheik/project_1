<?php

use Illuminate\Database\Seeder;
use App\Models\Statu;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectors =["stat1" ,"stat2","stat3"];
        foreach ($sectors as $city){
            Statu::create([
                "designation" =>$city
            ]);
    }
    }
}
