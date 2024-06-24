<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'Viet',
                'fullname' => 'Bùi Quốc Việt',
                'email' => 'bldq000@gmail.com',
                'password' => Hash::make('Viet1111@'),
                'phonenumber' => '0364539999',
                'address' => 'Bình Thuận',
                'role' => 1,
                'image' => null,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ],
            [
                'username' => 'Viet2',
                'fullname' => 'Bùi Quốc Việt',
                'email' => 'cnphong000@gmail.com',
                'password' => Hash::make('Viet1111@'),
                'phonenumber' => '0364539999',
                'address' => 'Bình Thuận',
                'role' => 0,
                'image' => null,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]
        ]);

    }
}
