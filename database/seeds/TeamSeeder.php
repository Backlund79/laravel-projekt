<?php
use App\Team;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


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
                App\Team::create([
                'teamName' => $faker->word,
                'activity_id' => $a
                ]);
            }
        }
    }
}
