<?php

use App\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activity::create([
            'activity' => 'Fotboll',
        ]);
        Activity::create([
            'activity' => 'Gymnastik',
        ]);
        Activity::create([
            'activity' => 'Skidåkning',
        ]);
    }
}
