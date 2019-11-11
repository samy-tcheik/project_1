<?php

use Illuminate\Database\Seeder;
use App\Models\Event\EventType;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(EventType::class, 30)->create();
    }
}
