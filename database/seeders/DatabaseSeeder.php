<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Departemen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatusDanaSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            OrmawaSeeder::class,
            DepartemenSeeder::class,
            DanaRabSeeder::class,
            DanaRiilSeeder::class,
        ]);
    }
}
