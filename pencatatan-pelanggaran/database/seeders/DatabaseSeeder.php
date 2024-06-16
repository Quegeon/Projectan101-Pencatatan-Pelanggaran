<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        $this->call([
            HukumanSeeder::class,
            JenisSeeder::class,
            AturanSeeder::class,
            KelasSeeder::class,
            DummySeeder::class,
            SiswaSeeder::class,
            BKSeeder::class,
            UserSeeder::class,
        ]);
    }
}
