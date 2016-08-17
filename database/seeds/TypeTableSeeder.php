<?php

use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->truncate();
        DB::table('types')->insert([
            'name' => 'MEN',
            'key' => 1
        ]);
        DB::table('types')->insert([
            'name' => 'WOMEN',
            'key' => 2
        ]);
        DB::table('types')->insert([
            'name' => 'YOUTH',
            'key' => 3
        ]);
    }
}
