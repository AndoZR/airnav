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
            'sop' => 'namafile',
            'loca' => 'namafile',
        ]);
    }
}
