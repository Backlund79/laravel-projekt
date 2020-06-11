<?php
use App\Team;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run(Faker $faker){

 for ($a = 1; $a <= 3; $a++) {

            for ($t = 1; $t<= 15; $t++){
                Team::create([
                'teamName' => Str::ucfirst($faker->word),
                'activity_id' => $a
                ]);
            }
        }
    }
}
