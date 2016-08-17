<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(ClubsTableSeeder::class);
        $this->call(LeagueFormatSeader::class);
        $this->call(LeaguesSeeder::class);
        $this->call(LeagueTeamSeeder::class);
        $this->call(StadiumsSeeder::class);
        $this->call(TeamSeeder::class);
        /*$this->call(TypeTableSeeder::class);*/
        $this->call(UsersTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}