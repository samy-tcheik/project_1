<?php

use Illuminate\Database\Seeder;
use App\Models\Montant;

class MontantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $montants =["1000" ,"2500","4000"];
        foreach ($montants as $city){
            Montant::create([
                "designation" =>$city
            ]);
        }
    }
}
