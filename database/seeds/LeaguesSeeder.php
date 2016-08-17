<?php

use Illuminate\Database\Seeder;

class LeaguesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leagues')->truncate();
        DB::table('leagues')->insert([
            'name' => "Champoins League",
            'season' => 2016,
            'grafics' => "default.png",
            'league_format_id' => 1,
            'description' => "Description",
            'teams_number' => 2
        ]);
        DB::table('leagues')->insert([
            'name' => "Europe League",
            'season' => 2017,
            'grafics' => "default.png",
            'league_format_id' => 2,
            'description' => "Description",
            'teams_number' => 2
        ]);
        DB::table('leagues')->insert([
            'name' => "Juniors League",
            'season' => 2017,
            'grafics' => "default.png",
            'league_format_id' => 1,
            'description' => "Description",
            'teams_number' => 4
        ]);
        DB::table('leagues')->insert([
            'name' => "All League",
            'season' => 2020,
            'grafics' => "default.png",
            'league_format_id' => 1,
            'description' => "Description",
            'teams_number' => 6
        ]);
    }
}