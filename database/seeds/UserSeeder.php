<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //管理者用
        factory(App\User::class)
            ->create([
                'name' => 'admin',
                'email' => 'admin_user@mail.com',
                'password' => bcrypt('admin_user'),
                'member_id' => 1,
                'role' => 0
            ]);
        // 一般ユーザ
        for($i = 2; $i <= 10; $i++){
            App\User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => bcrypt('common_user'),
                'member_id' => $i,
                'role' => 5,
                'remember_token' => Str::random(10)
            ]);
        };
    }
}
