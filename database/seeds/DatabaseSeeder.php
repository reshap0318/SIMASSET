<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
                barangTableSeeder::class,
                satkerTableSeeder::class,
                dataMasterTableSeeder::class,
                asetBangunanTableSeeder::class,
                asetTanahTableSeeder::class
        ]);
    }
}
