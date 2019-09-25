<?php

use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectors =["acti1" ,"acti2","acti3"];
        foreach ($sectors as $city){
            Activity::create([
                "designation" =>$city
            ]);
    }
    }
}
