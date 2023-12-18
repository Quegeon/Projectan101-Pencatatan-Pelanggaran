<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;
use Illuminate\Support\str;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'X PPLG 1',
            'jurusan' => 'Pengembangan Perangkat Lunak Dan Gim',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'X PPLG 2',
            'jurusan' => 'Pengembangan Perangkat Lunak Dan Gim',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'X PPLG 3',
            'jurusan' => 'Pengembangan Perangkat Lunak Dan Gim',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'X PPLG 4',
            'jurusan' => 'Pengembangan Perangkat Lunak Dan Gim',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XI PPLG 1',
            'jurusan' => 'Pengembangan Perangkat Lunak Dan Gim',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XI PPLG 2',
            'jurusan' => 'Pengembangan Perangkat Lunak Dan Gim',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XI PPLG 3',
            'jurusan' => 'Pengembangan Perangkat Lunak Dan Gim',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XI PPLG 4',
            'jurusan' => 'Pengembangan Perangkat Lunak Dan Gim',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XII PPLG 1',
            'jurusan' => 'Pengembangan Perangkat Lunak Dan Gim',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XII PPLG 2',
            'jurusan' => 'Pengembangan Perangkat Lunak Dan Gim',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XII PPLG 3',
            'jurusan' => 'Pengembangan Perangkat Lunak Dan Gim',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XII PPLG 4',
            'jurusan' => 'Pengembangan Perangkat Lunak Dan Gim',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'X TMS 1',
            'jurusan' => 'Teknik Mesin',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'X TMS 2',
            'jurusan' => 'Teknik Mesin',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'X TMS 3',
            'jurusan' => 'Teknik Mesin',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XI TMS 1',
            'jurusan' => 'Teknik Mesin',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XI TMS 2',
            'jurusan' => 'Teknik Mesin',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XI TMS 3',
            'jurusan' => 'Teknik Mesin',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XII TMS 1',
            'jurusan' => 'Teknik Mesin',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XII TMS 2',
            'jurusan' => 'Teknik Mesin',
        ]);
        Kelas::create([
            'id' => Str::orderedUuid(),
            'nama_kelas' => 'XII TMS 3',
            'jurusan' => 'Teknik Mesin',
        ]);
    }
}
