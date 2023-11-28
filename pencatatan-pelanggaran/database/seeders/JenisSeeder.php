<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Jenis;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jenis::create([
            'id' => Str::orderedUuid(),
            'nama_jenis' => 'kehidupan',
            'keterangan' => 'kehidupan dari siswa',
        ]);
    }
}
