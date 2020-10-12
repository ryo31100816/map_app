<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 2; $i <= 10; $i++){
            App\Member::create([
                'user_id' => $i,
                'name' => App\User::find($i)->name,
                'address' => $faker->address,
            ]);
        }
    }
}
