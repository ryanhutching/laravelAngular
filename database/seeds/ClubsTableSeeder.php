<?php

use Illuminate\Database\Seeder;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clubs')->truncate();
        DB::table('clubs')->insert([
            'name' => 'Barselona F.C',
            'short_name' => 'FCB',
            'description'  => 'Good Team in Spain',
            'address'  => 'Spain Barcelona',
            'validated' => 0,
            'logo' => 'barca.png',
            'home_page'=> "empty",
            'user_id' => 1,
            'stadium_id' => 1
        ]);

        DB::table('clubs')->insert([
            'name' => 'Manchester United F.C',
            'short_name' => 'MUN',
            'description'  => 'The best team in the world',
            'address'  => 'United Kingdom Manchester',
            'validated' => 0,
            'logo' => 'manchester.png',
            'home_page'=> "empty",
            'user_id' => 2,
            'stadium_id' => 2
        ]);
    }
}
