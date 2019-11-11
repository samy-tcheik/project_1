<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'cache',
            'jobs',
            'sessions',
        ]);

        $this->call([
            AuthTableSeeder::class,
            CitySeeder::class,
            CountrySeeder::class,
            juridicSeeder::class,
            MontantSeeder::class,
            RegionSeeder::class,
            SectorSeeder::class,
            StatusSeeder::class,
            ActivitySeeder::class,
            PaimentModeSeeder::class,
            TypeTableSeeder::class

        ]);





        Model::reguard();

    }
}
