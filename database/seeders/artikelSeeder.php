<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class artikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jumlah = 5;
        foreach (range(1, $jumlah) as $index) {
            DB::table('artikel')->insert([
                'judul' => 'Ini Judul'.$index,
                'deskripsi' => 'loremipsumloremipsumloremipsumloremipsumloremipsum',
                'created_at' => now()
            ]);
        }        
    }
}
