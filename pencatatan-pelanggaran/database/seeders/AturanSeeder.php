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
        $tampungan = [];
        $tampungan['hukuman'] = [
            'plbadsd' => Hukuman::where('hukuman', 'Peringatan lisan, Baca alquran dan shalat dhuha')->get()->id,
            'plbasddmlsddmpdjk' => Hukuman::where('hukuman', 'Peringatan lisan, Baca alquran shalat dhuha, dan membersihkan lingkungan sekolah dan diijinkan masuk pada jam kedua')->get()->id,
            'sp' => Hukuman::where('hukuman', 'Surat peringatan')->get()->id,
            'sppot' => Hukuman::where('hukuman', 'Surat peringatan, pemanggilan orang tua')->get()->id,
            'pl' => Hukuman::where('hukuman', 'Peringatan lisan')->get()->id,
            'plmam' => Hukuman::where('hukuman', 'Peringatan lisan, Mengisi absen manual')->get()->id,
            'plda' => Hukuman::where('hukuman', 'Peringatan lisan, Denda administrasi')->get()->id,
            'plmls' => Hukuman::where('hukuman', 'Peringatan lisan, Membersihkan lingkungan sekolah')->get()->id,
            'plbd' => Hukuman::where('hukuman', 'Peringatan lisan, baju dimasukan')->get()->id,
            'plsd' => Hukuman::where('hukuman', 'Peringatan lisan, sepatu di cat/di pilox')->get()->id,
            'plpb' => Hukuman::where('hukuman', 'Peringatan lisan, penyitaan barang')->get()->id,
            'pld' => Hukuman::where('hukuman', 'Peringatan lisan, dirobek / digunting')->get()->id,
            'plrd' => Hukuman::where('hukuman', 'Peringatan lisan, rambut dicukur')->get()->id,
            'pluw' => Hukuman::where('hukuman', 'Peringatan lisan, ubah/hapus warna')->get()->id,
            'plmc' => Hukuman::where('hukuman', 'Peringatan lisan, menghapus coretan')->get()->id,
            'sppotpb' => Hukuman::where('hukuman', 'Surat peringatan, Pemanggilan orang tua penyitaan barang')->get()->id,
            'sppots' => Hukuman::where('hukuman', 'Surat peringatan, pemanggilan orang tua skorsing')->get()->id,
            'pldrante' => Hukuman::where('hukuman', 'Peringatan lisan, digembos/dirante')->get()->id,
            'sppotdkot' => Hukuman::where('hukuman', 'Surat peringatan, Pemanggilan orang tua dikembalikan ke orang tua')->get()->id,
        ];

        $tampungan['jenis'] = [
            'keterlambatan' => Jenis::where('nama_jenis', 'Keterlambatan')->get()->id,
            'kepribadian' => Jenis::where('nama_jenis', 'Kepribadian')->get()->id,
            'kerajinan' => Jenis::where('nama_jenis', 'Kerajinan')->get()->id,
            'kerapihan' => Jenis::where('nama_jenis', 'Kerapihan')->get()->id,
            'ketertiban' => Jenis::where('nama_jenis', 'Ketertiban')->get()->id,
            'pelanggaran' => Jenis::where('nama_jenis', 'Pelanggaran terhadap Guru, Kepala Sekolah, Wakasek, Kepala Program dan Karyawan')->get()->id,
        ];

        // Keterlambatan
        Aturan::create(
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Terlambat masuk sekolah terlambat kurang dari 15 menit',
                'poin' => 2,
                'id_hukuman' => $tampungan['hukuman']['plbadsd'],
                'id_jenis' => $tampungan['jenis']['keterlambatan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'terlambat lebih dari 15 menit',
                'poin' => 5,
                'id_hukuman' => $tampungan['hukuman']['plbasddmlsddmpdjk'],
                'id_jenis' => $tampungan['jenis']['keterlambatan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Terlambat masuk karena keluar tanpa izin guru piket',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['sp'],
                'id_jenis' => $tampungan['jenis']['keterlambatan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Terlambat berturut turut selama 3 hari',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['keterlambatan'],
            ],
        );

        // Kerjaninan
        Aturan::create(
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Siswa tidak masuk sekolah karena sakit / izin tanpa keterangan',
                'poin' => 5,
                'id_hukuman' => $tampungan['hukuman']['pl'],
                'id_jenis' => $tampungan['jenis']['kerajinan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Siswa tidak masuk sekolah karena alpa(tanpa keterangan)',
                'poin' => 15,
                'id_hukuman' => $tampungan['hukuman']['sp'],
                'id_jenis' => $tampungan['jenis']['kerajinan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Tidak masuk karena keterangan palsu',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['kerajinan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Tidak membawa kartu absen digital',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['plmam'],
                'id_jenis' => $tampungan['jenis']['kerajinan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Kartu absen digital hilang',
                'poin' => 20,
                'id_hukuman' => $tampungan['hukuman']['plda'],
                'id_jenis' => $tampungan['jenis']['kerajinan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Meninggalkan kelas tanpa keterangan dan tidak kembali',
                'poin' => 5,
                'id_hukuman' => $tampungan['hukuman']['pl'],
                'id_jenis' => $tampungan['jenis']['kerajinan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Tidak mengikuti kegiatan eskul',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['pl'],
                'id_jenis' => $tampungan['jenis']['kerajinan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Tidak mengikuti upacara bendera dan hari besar Nasional',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['plmls'],
                'id_jenis' => $tampungan['jenis']['kerajinan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Tidak mengikuti kegiatan hari besar nasional / kegiatan di sekolah',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['sp'],
                'id_jenis' => $tampungan['jenis']['kerajinan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Tidak melaksanakan shalat dhuha, shalat dzuhur dan shalat jumat di sekolah',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['sp'],
                'id_jenis' => $tampungan['jenis']['kerajinan'],
            ],
        );

        // Kerapihan
        Aturan::create(
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Seragam tidak sesuai dengan ketentuan',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['plmls'],
                'id_jenis' => $tampungan['jenis']['kerapihan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Berpakaian Seragam tidak lengkap',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['plmls'],
                'id_jenis' => $tampungan['jenis']['kerapihan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Tidak memasukan baju seragam',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['plbd'],
                'id_jenis' => $tampungan['jenis']['kerapihan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Tidak bersepatu hitam dan tidak memakai ikat berwarna hitam',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['pbsd'],
                'id_jenis' => $tampungan['jenis']['kerapihan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Baju ketat, rok diatas mata kaki(siswa putri)',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['pl'],
                'id_jenis' => $tampungan['jenis']['kerapihan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Menggunakan topi bebas (selain topi sekolah) jaket / sweater dilingkungan sekolah',
                'poin' => 15,
                'id_hukuman' => $tampungan['hukuman']['plpb'],
                'id_jenis' => $tampungan['jenis']['kerapihan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Mengubah pakaian seragam(Baju, Celana, Rok)',
                'poin' => 15,
                'id_hukuman' => $tampungan['hukuman']['pld'],
                'id_jenis' => $tampungan['jenis']['kerapihan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Memakai sendal, sepatu sandal ke sekolah',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['plpb'],
                'id_jenis' => $tampungan['jenis']['kerapihan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Menggunakan perhiasan/Berhias berlebihan (siswa putri)',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['plpb'],
                'id_jenis' => $tampungan['jenis']['kerapihan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Memakai aksesoris gelang, kalung dan anting (siswa putra)',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['plpb'],
                'id_jenis' => $tampungan['jenis']['kerapihan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Berambut gondrong',
                'poin' => 25,
                'id_hukuman' => $tampungan['hukuman']['plrd'],
                'id_jenis' => $tampungan['jenis']['kerapihan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Mencat (menyemir) rambut, kuku (tangan/kaki)',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['pluw'],
                'id_jenis' => $tampungan['jenis']['kerapihan'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Memiliki tatto, kuping/lidah/hidung ditindik',
                'poin' => 100,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['kerapihan'],
            ],
        );

        // Kepribadian
        Aturan::create(
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Bermesraan di lingkungan sekolah',
                'poin' => 25,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['kepribadian'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Membuang sampah sembarangan',
                'poin' => 5,
                'id_hukuman' => $tampungan['hukuman']['pl'],
                'id_jenis' => $tampungan['jenis']['kepribadian'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Meludah tidak pada tempatnya',
                'poin' => 5,
                'id_hukuman' => $tampungan['hukuman']['pl'],
                'id_jenis' => $tampungan['jenis']['kepribadian'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Merusak tanaman hias dan pohon',
                'poin' => 5,
                'id_hukuman' => $tampungan['hukuman']['pl'],
                'id_jenis' => $tampungan['jenis']['kepribadian'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Mencuri/mengambil barang milik orang lain',
                'poin' => 50,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['kepribadian'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Mencorat-coret dinding, tembok, meja, kursi, pagar',
                'poin' => 25,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['kepribadian'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Menyita dengan paksa (merampas) barang milik teman',
                'poin' => 50,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['kepribadian'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Menulisi, Menggambari buku paket perpustakaan',
                'poin' => 10,
                'id_hukuman' => $tampungan['hukuman']['plmc'],
                'id_jenis' => $tampungan['jenis']['kepribadian'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Merusak / menghilangkan sarana dan prasarana milik sekolah, guru, karyawan dan teman',
                'poin' => 50,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['kepribadian'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Melakukan bullying',
                'poin' => 50,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['kepribadian'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Memalsukan tanda tangan dan raport',
                'poin' => 50,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['kepribadian'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Melanggar norma susila, nikah/hamil',
                'poin' => 100,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['kepribadian'],
            ],
        );

        // Ketertiban
        Aturan::create(
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Membawa rokok sendiri(titipan)',
                'poin' => 25,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Menghisap rokok disekolah ataupun di lingkungan sekitar sekolah',
                'poin' => 50,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Memperjual belikan rokok',
                'poin' => 50,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Membawa buku/majalah/kaset/VCD porno sendiri(titipan)',
                'poin' => 50,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Menjual belikan (menyewa) buku/majalah/kaset/VCD poro',
                'poin' => 70,
                'id_hukuman' => $tampungan['hukuman']['sppotpb'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Menghidupkan dan memainkan HP pada saat jam pelajaran',
                'poin' => 50,
                'id_hukuman' => $tampungan['hukuman']['plpb'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Berkelahi di lingkungan sekolah',
                'poin' => 70,
                'id_hukuman' => $tampungan['hukuman']['sppots'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Menggunakan kendaran berknalpot bising',
                'poin' => 50,
                'id_hukuman' => $tampungan['hukuman']['pldrante'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Memarkir motor sembarangan',
                'poin' => 15,
                'id_hukuman' => $tampungan['hukuman']['pl'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Menerima tamu tanpa melapor ke piket / keamanan',
                'poin' => 15,
                'id_hukuman' => $tampungan['hukuman']['pl'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Menggangu kelas lain yang sedang belajar',
                'poin' => 5,
                'id_hukuman' => $tampungan['hukuman']['pl'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Ditemukan di luar sekolah pada saat jam pelajaran berlangsung',
                'poin' => 20,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Naik kendaraan di lingkungan sekolah ugal-ugalan',
                'poin' => 15,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Terlibat tawuran pelajar',
                'poin' => 50,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Menghasut dan koordinir siswa hingga menimbulkan perkelahian',
                'poin' => 50,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Membawa alat judi, terlibat perjudian / taruhan',
                'poin' => 100,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Melakukan tindak kriminal/berurusan dengan kepolisian',
                'poin' => 100,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Membawa dan menggunakan senjata tajam dan senjata api',
                'poin' => 100,
                'id_hukuman' => $tampungan['hukuman']['sppot'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Membawa/menggunakan/memperjualbelikan narkotika dan zat adiktif lainnya',
                'poin' => 100,
                'id_hukuman' => $tampungan['hukuman']['sppotdko'],
                'id_jenis' => $tampungan['jenis']['ketertiban'],
            ],
        );

        // Melanggar terhadap guru, kepsek
        Aturan::create(
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Melawan kepada kepala sekolah, wakil kepala sekolah, kepala program, guru dan karyawan dengan ucapan / tulisan kata-kata kasar',
                'poin' => 100,
                'id_hukuman' => $tampungan['hukuman']['sppotdko'],
                'id_jenis' => $tampungan['jenis']['pelanggaran'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Melawan kepala sekolah, wakil kepala sekolah, kepala program, guru dan karyawan disertai ancaman',
                'poin' => 100,
                'id_hukuman' => $tampungan['hukuman']['sppotdko'],
                'id_jenis' => $tampungan['jenis']['pelanggaran'],
            ],
            [
                'id' => Str::orderedUuid(),
                'nama_aturan' => 'Melawan kepala sekolah, wakil kepala sekolah, kepala program, guru dan karyawan disertai pukulan',
                'poin' => 100,
                'id_hukuman' => $tampungan['hukuman']['sppotdko'],
                'id_jenis' => $tampungan['jenis']['pelanggaran'],
            ],
        );
    }
}
