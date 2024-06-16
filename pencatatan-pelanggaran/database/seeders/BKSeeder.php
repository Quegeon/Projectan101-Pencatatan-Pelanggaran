<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class BKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \App\Models\Bk::create([
            'id' => Str::orderedUuid(),
            'nama' => 'Test BK',
            'username' => 'TestBK',
            'password' => bcrypt('321'),
            'foto' => 'default.png',
        ]);
        \App\Models\Bk::create([
            'id' => Str::orderedUuid(),
            'nama' => 'Bk1',
            'username' => 'Bk1',
            'password' => bcrypt('321'),
            'foto' => 'default.png',
        ]);
        \App\Models\Bk::create([
            'id' => Str::orderedUuid(),
            'nama' => 'Bk2',
            'username' => 'Bk1',
            'password' => bcrypt('321'),
            'foto' => 'default.png',
        ]);

    }
}
