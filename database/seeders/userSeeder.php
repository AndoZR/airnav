<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
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
                'name' => 'admin123',
                'username' => 'admin123',
                'password' => hash::make('123123123'),
                'status' => 1,
                'created_at' => $nowDate,
            ],
        ]);

        for($i = 0; $i <= 10; $i++) {
            DB::table('users')->insert([
                [
                    'name' => 'user'.$i,
                    'username' => 'user'.$i,
                    'password' => hash::make('123123123'),
                    'status' => 2,
                    'created_at' => $nowDate,
                ],
            ]);
        }
    }
}
