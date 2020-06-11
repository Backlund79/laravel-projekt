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

                $team = Team::orderBy('id', 'desc')->first();

                for ($i = 0; $i < 2; $i++) {
                    do {
                        $rand = rand(1, 100);

                        $ids = [];
                        foreach(App\User::find($rand)->teams as $team) {
                            array_push($ids, $team->activity->id);
                        }
                    } while(in_array($rand, $ids));

                    $team->users()->attach($rand);
                }
            }
        }
    }
}
