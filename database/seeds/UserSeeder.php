<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $years = ['2018', '2019', '2020'];

        // Admin user
        User::create([
            'firstName' => 'Hans',
            'lastName' => 'Administratör',
            'dob' => '1985-05-16',
            'email' => 'hans@iksvalan.se',
            'admin' => true,
            'password' => Hash::make('password')
        ]);
        // Member user
        User::create([
            'firstName' => 'Agneta',
            'lastName' => 'Andersson',
            'dob' => '1979-11-08',
            'email' => 'agneta@outlook.com',
            'password' => Hash::make('password')
        ]);
        $member = User::find(2);
        for ($i = 0; $i < 3; $i++) {
            $dob = new \DateTime($member->dob);
            $today = new \DateTime();
            $price = $dob->diff($today)->y >= 18 ? 500 : 300;
            $member->membershipFees()->create([
                'price' => $price,
                'year' => $years[$i],
                'paid' => $i === 2 ? 0 : 1
            ]);
        }
        // Random members
        factory(User::class, 99)->create()->each(function ($user) use ($years) {
            for ($i = 0; $i < 3; $i++) {
                $dob = new \DateTime($user->dob);
                $today = new \DateTime($years[$i]);
                $price = $dob->diff($today)->y >= 18 ? 500 : 300;
                $user->membershipFees()->create([
                    'price' => $price,
                    'year'=> $years[$i],
                    'paid' => $i === 2 ? rand(0,1) : 1
                ]);
            }
        });
    }
}
