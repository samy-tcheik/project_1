<?php

use Illuminate\Database\Seeder;
use App\Models\Juridic_form;

class juridicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $juridics =["SARL" ,"EARL","SPA"];
        foreach ($juridics as $city){
            Juridic_form::create([
                "designation" =>$city
            ]);
    }
}}
