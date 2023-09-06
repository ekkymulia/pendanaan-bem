<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrmawaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ormawas')->insert([
            'user_id' => 2,
            'tahun_periode' => '2023',
            'ketua' => 'Ketua 1',
            'wakil' => 'Wakil 1',
            'bendahara' => 'Bendahara 1',
            'sekretaris' => 'Sekretaris 1',
            'ketua_pengawas' => 'Ketua Pengawas 1',
            'fakultas' => 'Fakultas 1',
            'alamat' => 'Address 1',
            'no_telp' => '1234567890',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
