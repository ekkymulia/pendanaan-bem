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
            'file_proposal' => 'https://upload.wikimedia.org/wikipedia/commons/1/15/Bogor_Agricultural_University_%28IPB%29_symbol.svg',
        ]);
    }
}
