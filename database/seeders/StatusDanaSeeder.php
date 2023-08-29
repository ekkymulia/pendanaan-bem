<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusDanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_dana')->insert([
            'nama' => 'reject',
        ]);
        DB::table('status_dana')->insert([
            'nama' => 'approve',
        ]);
    }
}
