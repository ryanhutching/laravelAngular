<?php

use Illuminate\Database\Seeder;

class LeagueFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('league_format')->insert([
            'name' => 'straight',
        ]);
        DB::table('league_format')->insert([
            'name' => 'inverted',
        ]);
    }
}
