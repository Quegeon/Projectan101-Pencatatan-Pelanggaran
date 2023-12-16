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
        Hukuman::create(
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan, Baca alquran dan shalat dhuha'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan, Baca alquran shalat dhuha, dan membersihkan lingkungan sekolah dan diijinkan masuk pada jam kedua'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Surat peringatan'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Surat peringatan, pemanggilan orang tua'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan, Mengisi absen manual'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan, Denda administrasi'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan, Membersihkan lingkungan sekolah'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan, baju dimasukan'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan, sepatu di cat/di pilox'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan, penyitaan barang'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan, dirobek / digunting'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan, rambut dicukur'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan, ubah/hapus warna'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan, menghapus coretan'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Surat peringatan, Pemanggilan orang tua penyitaan barang'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Surat peringatan, pemanggilan orang tua skorsing'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Peringatan lisan, digembos/dirante'
            ],
            [
                'id' => Str::orderedUuid(),
                'hukuman' => 'Surat peringatan, Pemanggilan orang tua dikembalikan ke orang tua'
            ],
        );
    }
}
