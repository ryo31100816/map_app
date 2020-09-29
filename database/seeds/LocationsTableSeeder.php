<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Location::class)
            ->create([
                'name' => '東京駅',
                'address' => '東京都千代田区丸の内1丁目',
                'latitude' => 35.681236,
                'longitude' => 139.7671248
            ]);
        factory(App\Location::class)
            ->create([
                'name' => '大阪駅',
                'address' => '大阪府大阪市北区梅田3丁目1-1',
                'latitude' => 34.7024854,
                'longitude' => 135.4959506
            ]);
        factory(App\Location::class)
            ->create([
                'name' => '名古屋駅',
                'address' => '愛知県名古屋市中村区名駅1丁目1-4',
                'latitude' => 35.170915,
                'longitude' => 136.8815369
            ]);
        factory(App\Location::class)
            ->create([
                'name' => '甲府駅',
                'address' => '	山梨県甲府市丸の内一丁目1-8',
                'latitude' => 35.666674,
                'longitude' => 138.5687848
            ]);
    }
}
