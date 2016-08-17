<?php

use Illuminate\Database\Seeder;

class LeagueTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('league_team')->insert([
            'league_id' => 1,
            'team_id' => 1
        ]);

        DB::table('league_team')->insert([
            'league_id' => 1,
            'team_id' => 2
        ]);

        DB::table('league_team')->insert([
            'league_id' => 2,
            'team_id' => 3
        ]);

        DB::table('league_team')->insert([
            'league_id' => 2,
            'team_id' => 4
        ]);

        DB::table('league_team')->insert([
            'league_id' => 3,
            'team_id' => 1
        ]);

        DB::table('league_team')->insert([
            'league_id' => 3,
            'team_id' => 2
        ]);

        DB::table('league_team')->insert([
            'league_id' => 3,
            'team_id' => 3
        ]);

        DB::table('league_team')->insert([
            'league_id' => 3,
            'team_id' => 4
        ]);

        DB::table('league_team')->insert([
            'league_id' => 4,
            'team_id' => 3
        ]);

        DB::table('league_team')->insert([
            'league_id' => 4,
            'team_id' => 4
        ]);

        DB::table('league_team')->insert([
            'league_id' => 4,
            'team_id' => 5
        ]);

        DB::table('league_team')->insert([
            'league_id' => 4,
            'team_id' => 6
        ]);

        DB::table('league_team')->insert([
            'league_id' => 4,
            'team_id' => 1
        ]);

        DB::table('league_team')->insert([
            'league_id' => 4,
            'team_id' => 2
        ]);
    }
}
