<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => 'akabekocifest@gmail.com',
            'name' => 'Akabeko Cifest',
            'password' => Hash::make('s3m4nG4t'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'email' => 'hyumilzam@gmail.com',
            'name' => 'Hyumilzam',
            'password' => Hash::make('s3m4nG4t'),
            'role_id' => 2
        ]);

        DB::table('users')->insert([
            'email' => ' vymalyinz@gmail.com',
            'name' => 'Vymalyinz',
            'password' => Hash::make('s3m4nG4t'),
            'role_id' => 3
        ]);
    }
}
