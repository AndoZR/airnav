<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $nowDate = date('Y-m-d');

        DB::table('users')->insert([
            [
                'name' => 'ando',
                'username' => 'ando',
                'password' => Hash::make('123123123'),
                'status' => 1,
                'created_at' => $nowDate,
            ],
        ]);
    }
}
