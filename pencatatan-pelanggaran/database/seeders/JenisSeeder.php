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
        Jenis::insert(
            [
                [
                    'id' => Str::orderedUuid(),
                    'nama_jenis' => 'Keterlambatan',
                    'keterangan' => 'Keterlambatan siswa pada saat masuk sekolah',
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nama_jenis' => 'Kepribadian',
                    'keterangan' => 'Kepribadian mencakup aspek perilaku dan sikap siswa yang mencerminkan karakter pribadi dan moralitas.'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nama_jenis' => 'Kerajinan',
                    'keterangan' => 'Kerajinan mencakup perilaku siswa yang dapat mempengaruhi keteraturan dan keberlangsungan kegiatan di sekolah.'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nama_jenis' => 'Kerapihan',
                    'keterangan' => 'Kerapihan mencakup aspek-aspek penampilan dan perilaku siswa yang mencerminkan norma-norma kesopanan dan tata krama di lingkungan sekolah.'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nama_jenis' => 'Ketertiban',
                    'keterangan' => 'Ketertiban mencakup perilaku siswa yang dapat mempengaruhi keamanan dan ketentraman di lingkungan sekolah.'
                ],
                [
                    'id' => Str::orderedUuid(),
                    'nama_jenis' => 'Pelanggaran terhadap Guru, Kepala Sekolah, Wakasek, Kepala Program dan Karyawan',
                    'keterangan' => 'Ketertiban mencakup perilaku siswa yang dapat mempengaruhi keamanan dan ketentraman di lingkungan sekolah.'
                ],
            ]
        );
    }
}
