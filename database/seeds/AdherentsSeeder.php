<?php

use App\Models\adherent\Adherent;
use Illuminate\Database\Seeder;

class AdherentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Adherent::class,20)->create();
    }
}
