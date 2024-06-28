<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class airportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('airport')->insert([
            'name' => 'Hang Nadim',
            'sop' => null,
            'loca' => null,
            'url' => null
        ]);
        DB::table('airport')->insert([
            'name' => 'Tanjung Pinang',
            'sop' => null,
            'loca' => null,
            'url' => null
        ]);
        DB::table('airport')->insert([
            'name' => 'TMA North',
            'sop' => null,
            'loca' => null,
            'url' => null
        ]);
        DB::table('airport')->insert([
            'name' => 'TMA South',
            'sop' => null,
            'loca' => null,
            'url' => null
        ]);
        DB::table('airport')->insert([
            'name' => 'Rajahaji',
            'sop' => null,
            'loca' => null,
            'url' => null
        ]);
        DB::table('airport')->insert([
            'name' => 'Ranai',
            'sop' => null,
            'loca' => null,
            'url' => null
        ]);
        DB::table('airport')->insert([
            'name' => 'Matak',
            'sop' => null,
            'loca' => null,
            'url' => null
        ]);
        DB::table('airport')->insert([
            'name' => 'Letung',
            'sop' => null,
            'loca' => null,
            'url' => null
        ]);
    }
}
