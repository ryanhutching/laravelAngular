<?php

use Illuminate\Database\Seeder;

class StadiumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stadiums')->truncate();
        DB::table('stadiums')->insert([
            'name' => "Camp Nou",
            'description' => "Barsa stadium",
            'address' => "C. Aristides Maillol, 12, 08028 Barcelona, Barcelona, Spain",
            'validated' => 0,
            'photo' => "camp_nou.jpg",
            'phone' => "12346"
        ]);

        DB::table('stadiums')->insert([
            'name' => "Old Trafford",
            'description' => "Manchester Uniteds stadium",
            'address' => "Old Trafford, Stretford, Manchester M16, UK",
            'validated' => 0,
            'photo' => "old_traffold.jpg",
            'phone' => "654321"
        ]);
    }
}
