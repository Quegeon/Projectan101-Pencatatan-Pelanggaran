<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'id' => Str::orderedUuid(),
            'nama' => 'SuperAdmin',
            'username' => 'Admin',
            'password' => bcrypt('123'),
            'level' => 'Admin',
            'foto' => 'default.png',
        ]);
        \App\Models\User::create([
            'id' => Str::orderedUuid(),
            'nama' => 'Osis 1',
            'username' => 'Osis1',
            'password' => bcrypt('123'),
            'level' => 'Petugas',
            'foto' => 'default.png',
        ]);
        \App\Models\User::create([
            'id' => Str::orderedUuid(),
            'nama' => 'Osis 2',
            'username' => 'Osis2',
            'password' => bcrypt('123'),
            'level' => 'Petugas',
            'foto' => 'default.png',
        ]);
        \App\Models\User::create([
            'id' => Str::orderedUuid(),
            'nama' => 'Petugas 1',
            'username' => 'Petugas1',
            'password' => bcrypt('123'),
            'level' => 'Petugas',
            'foto' => 'default.png',
        ]);
        \App\Models\User::create([
            'id' => Str::orderedUuid(),
            'nama' => 'Petugas 2',
            'username' => 'Petugas2',
            'password' => bcrypt('123'),
            'level' => 'Petugas',
            'foto' => 'default.png',
        ]);
    }
}
