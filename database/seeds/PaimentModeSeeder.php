<?php

use Illuminate\Database\Seeder;
use App\Models\Paiment_mode;

class PaimentModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $montants =["Gratuit" ,"Payant"];
        foreach ($montants as $city){
            Paiment_mode::create([
                "designation" =>$city
            ]);
        }
    }
}
