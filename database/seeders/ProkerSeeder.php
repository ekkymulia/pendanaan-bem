<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prokers')->insert([
            'user_id' => 3,
            'departemen_id' => 1,
            'nama' => 'proker satu',
            'ketua' => 'Budi',
            'bendahara' => 'Yudi',
            'file_proposal' => 'file_proposal/dummy_JIqkyBjA3s.pdf',
        ]);
    }
}
