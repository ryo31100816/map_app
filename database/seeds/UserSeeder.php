<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //管理者用
        factory(App\User::class)
            ->create([
                'name' => 'admin',
                'email' => 'admin_user@mail.com',
                'password' => bcrypt('admin_user'),
                'member_id' => bigint(1),
                'role' => tinyint(0)
            ]);
        // 一般ユーザー
        factory(App\User::class, 10)->create();
    }
}
