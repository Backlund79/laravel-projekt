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
        $this->call(ActivitySeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(UserSeeder::class);
    }
}
