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
        $this->call(UserSeeder::class);
        $this->call(barangTableSeeder::class);
        $this->call(dataMasterTableSeeder::class);
        $this->call(satkerTableSeeder::class);
        // $this->call(assetTableSeeder::class);
        // $this->call(asetBangunanTableSeeder::class);
        // $this->call(asetTanahTableSeeder::class);
    }
}
