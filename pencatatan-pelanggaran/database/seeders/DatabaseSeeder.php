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

        \App\Models\User::create([
            'id' => Str::orderedUuid(),
            'nama' => 'Admin Cuk1',
            'username' => 'Admin',
            'password' => bcrypt('123'),
            'level' => 'Admin',
            'foto' => 'kosong',
        ]);
    }
}
