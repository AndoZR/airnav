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
                'name' => 'admin1',
                'username' => 'admin1',
                'password' => hash::make('password'),
                'status' => 1,
                'created_at' => $nowDate,
            ],
        ]);

        DB::table('users')->insert([
            [
                'name' => 'admin2',
                'username' => 'admin2',
                'password' => hash::make('password'),
                'status' => 2,
                'created_at' => $nowDate,
            ],
        ]);

        DB::table('users')->insert([
            [
                'name' => 'admin3',
                'username' => 'admin3',
                'password' => hash::make('password'),
                'status' => 3,
                'created_at' => $nowDate,
            ],
        ]);

        for($i = 0; $i <= 5; $i++) {
            DB::table('users')->insert([
                [
                    'name' => 'user'.$i,
                    'username' => 'user'.$i,
                    'password' => hash::make('123123123'),
                    'status' => 4,
                    'created_at' => $nowDate,
                ],
            ]);
        }
    }
}
