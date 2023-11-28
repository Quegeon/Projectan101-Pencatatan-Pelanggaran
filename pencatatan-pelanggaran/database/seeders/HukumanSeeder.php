<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Hukuman;

class HukumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hukuman::create([
            'id' => Str::orderedUuid(),
            'hukuman' => 'berjemur'
        ]);
    }
}
