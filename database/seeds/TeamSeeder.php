<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'club_id' => 1,
            'type' => "MEN",
            'stadium_id' => 1
        ]);

        DB::table('teams')->insert([
            'club_id' => 2,
            'type' => "MEN",
            'stadium_id' => 2
        ]);

        DB::table('teams')->insert([
            'club_id' => 1,
            'type' => "WOMEN",
            'stadium_id' => 1
        ]);

        DB::table('teams')->insert([
            'club_id' => 2,
            'type' => "WOMEN",
            'stadium_id' => 2
        ]);

        DB::table('teams')->insert([
            'club_id' => 1,
            'type' => "YOUTH",
            'stadium_id' => 1
        ]);

        DB::table('teams')->insert([
            'club_id' => 2,
            'type' => "YOUTH",
            'stadium_id' => 2
        ]);

    }
}
