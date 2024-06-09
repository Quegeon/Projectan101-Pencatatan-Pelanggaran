<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hukuman;
use App\Models\Jenis;
use App\Models\Aturan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Str;


class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //! SEEDER INI EMNG DIPAKE KHUSUS UNTUK DEVELOPMENT ONLY, BUAT TESTING DAN DEBUGGING
        Hukuman::create([
            'id' => Str::orderedUuid(),
            'hukuman' => 'berjemur'
        ]);
        Jenis::create([
            'id' => Str::orderedUuid(),
            'nama_jenis' => 'kehidupan',
            'keterangan' => 'kehidupan dari siswa',
        ]);
        Aturan::create([
            'id' => Str::orderedUuid(),
            'id_hukuman' => Hukuman::first()->id,
            'id_jenis' => Jenis::first()->id,
            'nama_aturan' => 'tidak boleh telat',
            'poin' => 21
        ]);

        //* SISWA
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XII PPLG CUK',
            'jurusan' => 'PPLG'
        ]);

        Siswa::create([
            'nis' => '212210232',
            'id_kelas' => Kelas::first()->id,
            'nama' => 'Ansel',
            'no_telp' => '0895236745',
            'alamat' => 'Jl. Bondowoso',
            'poin' => 0,
            'status' => 'Baik'
        ]);

        Siswa::create([
            'nis' => '212210233',
            'id_kelas' => Kelas::first()->id,
            'nama' => 'Budi',
            'no_telp' => '0895236745',
            'alamat' => 'Jl. Bondowoso',
            'poin' => 0,
            'status' => 'Baik'
        ]);

        Siswa::create([
            'nis' => '212210234',
            'id_kelas' => Kelas::first()->id,
            'nama' => 'Cantik',
            'no_telp' => '0895236745',
            'alamat' => 'Jl. Bondowoso',
            'poin' => 0,
            'status' => 'Baik'
        ]);
    }
}
