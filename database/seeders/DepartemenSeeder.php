<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('departemens')->insert([
            'ormawa_id' => 1,
            'user_id' => 3,
            'tahun_periode' => '2023',
            'nama_departemen' => 'Vymalyinz',
            'ketua_departemen' => 'Ketua 1',
            'alamat' => 'Address 1',
            'no_tlp' => '1234567890',
            'password' => bcrypt('password1'), // Hashed password
            'wakil_ketua' => 'Wakil Ketua 1',
            'bendahara' => 'Bendahara 1',
            'sekretaris' => 'Sekretaris 1',
            'deskripsi_departemen' => 'Description 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
