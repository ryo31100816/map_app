<?php

use Illuminate\Database\Seeder;
use App\History;
use App\Member;
use App\Location;

class HistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = mt_rand(10,50);
        $members = Member::inRandomOrder()->take($count)->get();
        foreach($members as $member){
            factory(History::class)->create([
                'member_id' => $member->id,
            ]);
        }
    }
}
