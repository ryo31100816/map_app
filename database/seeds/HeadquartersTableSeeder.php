<?php

use Illuminate\Database\Seeder;

class HeadquartersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Headquarters::create([
            'address' => '山梨県甲府市丸の内1-6-1 ',
            'latitude' => 35.6641261,
            'longitude' => 138.5684246
        ]);
    }
}
