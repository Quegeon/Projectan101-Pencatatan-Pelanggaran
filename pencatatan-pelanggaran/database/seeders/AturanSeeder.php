<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Aturan;
use App\Models\Hukuman;
use App\Models\Jenis;

class AturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aturan::create([
            'id' => Str::orderedUuid(),
            'id_hukuman' => Hukuman::first()->id,
            'id_jenis' => Jenis::first()->id,
            'nama_aturan' => 'tidak boleh telat',
            'poin' => 21
        ]);
    }
}
