<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\str;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas = Kelas::all();

            // Siswa untuk kelas X PPLG 1
            Siswa::create([
                'nis' => '212210001',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 1')->first()->id,
                'nama' => 'Budi',
                'no_telp' => '0895236745',
                'alamat' => 'Jl. Bondowoso',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210002',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 1')->first()->id,
                'nama' => 'Ani',
                'no_telp' => '0895236746',
                'alamat' => 'Jl. Situbondo',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210003',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 1')->first()->id,
                'nama' => 'Siti',
                'no_telp' => '0895236747',
                'alamat' => 'Jl. Jember',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210004',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 1')->first()->id,
                'nama' => 'Andi',
                'no_telp' => '0895236748',
                'alamat' => 'Jl. Lumajang',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210005',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 1')->first()->id,
                'nama' => 'Joko',
                'no_telp' => '0895236749',
                'alamat' => 'Jl. Banyuwangi',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211001',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 1')->first()->id,
                'nama' => 'Fiqri',
                'no_telp' => '0895236749',
                'alamat' => 'Jl. Kopo',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211002',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 1')->first()->id,
                'nama' => 'Firdaus',
                'no_telp' => '0895236749',
                'alamat' => 'Jl. Kopo',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211003',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 1')->first()->id,
                'nama' => 'Ujang',
                'no_telp' => '0895236749',
                'alamat' => 'Jl. Kopo',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211004',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 1')->first()->id,
                'nama' => 'Ikbal',
                'no_telp' => '0895236749',
                'alamat' => 'Jl. Bandung',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211005',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 1')->first()->id,
                'nama' => 'Hendrik',
                'no_telp' => '0895236749',
                'alamat' => 'Jl. Bondowoso',
                'poin' => 0,
                'status' => 'Baik'
            ]);

            // Siswa untuk kelas X PPLG 2
            Siswa::create([
                'nis' => '212210006',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 2')->first()->id,
                'nama' => 'Rina',
                'no_telp' => '0895236750',
                'alamat' => 'Jl. Kediri',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210007',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 2')->first()->id,
                'nama' => 'Sari',
                'no_telp' => '0895236751',
                'alamat' => 'Jl. Malang',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210008',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 2')->first()->id,
                'nama' => 'Rudi',
                'no_telp' => '0895236752',
                'alamat' => 'Jl. Blitar',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210009',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 2')->first()->id,
                'nama' => 'Lia',
                'no_telp' => '0895236753',
                'alamat' => 'Jl. Tulungagung',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210010',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 2')->first()->id,
                'nama' => 'Doni',
                'no_telp' => '0895236754',
                'alamat' => 'Jl. Probolinggo',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211006',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 2')->first()->id,
                'nama' => 'Ratu',
                'no_telp' => '0895236750',
                'alamat' => 'Jl. Kediri',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211007',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 2')->first()->id,
                'nama' => 'Buly',
                'no_telp' => '0895236750',
                'alamat' => 'Jl. Magelang',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211008',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 2')->first()->id,
                'nama' => 'Cepi',
                'no_telp' => '0895236750',
                'alamat' => 'Jl. Kopo',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211009',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 2')->first()->id,
                'nama' => 'Farhan',
                'no_telp' => '0895236750',
                'alamat' => 'Jl. Magelang',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211010',
                'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 2')->first()->id,
                'nama' => 'Afdil',
                'no_telp' => '0895236750',
                'alamat' => 'Jl. Cimahi',
                'poin' => 0,
                'status' => 'Baik'
            ]);

        // Siswa untuk kelas X PPLG 3
        Siswa::create([
            'nis' => '212210011',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 3')->first()->id,
            'nama' => 'Eka',
            'no_telp' => '0895236755',
            'alamat' => 'Jl. Bondowoso',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210012',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 3')->first()->id,
            'nama' => 'Fajar',
            'no_telp' => '0895236756',
            'alamat' => 'Jl. Situbondo',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210013',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 3')->first()->id,
            'nama' => 'Gilang',
            'no_telp' => '0895236757',
            'alamat' => 'Jl. Jember',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210014',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 3')->first()->id,
            'nama' => 'Hana',
            'no_telp' => '0895236758',
            'alamat' => 'Jl. Lumajang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210015',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 3')->first()->id,
            'nama' => 'Ivan',
            'no_telp' => '0895236759',
            'alamat' => 'Jl. Banyuwangi',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211011',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 3')->first()->id,
            'nama' => 'Gibran',
            'no_telp' => '0895236755',
            'alamat' => 'Jl. Bondowoso',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211012',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 3')->first()->id,
            'nama' => 'Prabowo',
            'no_telp' => '0895236755',
            'alamat' => 'Jl. Banyuwangi',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211013',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 3')->first()->id,
            'nama' => 'Widodo',
            'no_telp' => '0895236755',
            'alamat' => 'Jl. London',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211014',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 3')->first()->id,
            'nama' => 'Uya',
            'no_telp' => '0895236755',
            'alamat' => 'Jl. Kediri',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211015',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 3')->first()->id,
            'nama' => 'Agnia',
            'no_telp' => '0895236755',
            'alamat' => 'Jl. Kopo',
            'poin' => 0,
            'status' => 'Baik'
        ]);

        // Siswa untuk kelas X PPLG 4
        Siswa::create([
            'nis' => '212210016',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 4')->first()->id,
            'nama' => 'Joko',
            'no_telp' => '0895236760',
            'alamat' => 'Jl. Kediri',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210017',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 4')->first()->id,
            'nama' => 'Kiki',
            'no_telp' => '0895236761',
            'alamat' => 'Jl. Malang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210018',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 4')->first()->id,
            'nama' => 'Lia',
            'no_telp' => '0895236762',
            'alamat' => 'Jl. Blitar',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210019',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 4')->first()->id,
            'nama' => 'Mila',
            'no_telp' => '0895236763',
            'alamat' => 'Jl. Tulungagung',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210020',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 4')->first()->id,
            'nama' => 'Nina',
            'no_telp' => '0895236764',
            'alamat' => 'Jl. Probolinggo',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211016',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 4')->first()->id,
            'nama' => 'Bruno',
            'no_telp' => '0895236760',
            'alamat' => 'Jl. Ciseah',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211017',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 4')->first()->id,
            'nama' => 'Fernandes',
            'no_telp' => '0895236760',
            'alamat' => 'Jl. London',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211018',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 4')->first()->id,
            'nama' => 'Ilham',
            'no_telp' => '0895236760',
            'alamat' => 'Jl. TKI',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211019',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 4')->first()->id,
            'nama' => 'Zulfikar',
            'no_telp' => '0895236760',
            'alamat' => 'Jl. Cimindi',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211020',
            'id_kelas' => $kelas->where('nama_kelas', 'X PPLG 4')->first()->id,
            'nama' => 'Mutia',
            'no_telp' => '0895236760',
            'alamat' => 'Jl. Sayati',
            'poin' => 0,
            'status' => 'Baik'
        ]);

        // Siswa untuk kelas XII PPLG 1 
        Siswa::create([
            'nis' => '212210041',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 1')->first()->id,
            'nama' => 'Adi',
            'no_telp' => '0895236770',
            'alamat' => 'Jl. Sukabumi',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210042',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 1')->first()->id,
            'nama' => 'Beni',
            'no_telp' => '0895236771',
            'alamat' => 'Jl. Cianjur',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210043',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 1')->first()->id,
            'nama' => 'Cici',
            'no_telp' => '0895236772',
            'alamat' => 'Jl. Garut',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210044',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 1')->first()->id,
            'nama' => 'Dodi',
            'no_telp' => '0895236773',
            'alamat' => 'Jl. Bandung',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210045',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 1')->first()->id,
            'nama' => 'Eka',
            'no_telp' => '0895236774',
            'alamat' => 'Jl. Tasikmalaya',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211041',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 1')->first()->id,
            'nama' => 'Zahra',
            'no_telp' => '0895236774',
            'alamat' => 'Jl. Tasikmalaya',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211042',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 1')->first()->id,
            'nama' => 'Yasel',
            'no_telp' => '0895236774',
            'alamat' => 'Jl. Garut',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211043',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 1')->first()->id,
            'nama' => 'Bintang',
            'no_telp' => '0895236774',
            'alamat' => 'Jl. Brebes',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211044',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 1')->first()->id,
            'nama' => 'Bebul',
            'no_telp' => '0895236774',
            'alamat' => 'Jl. TKI',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211045',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 1')->first()->id,
            'nama' => 'Maulana',
            'no_telp' => '0895236774',
            'alamat' => 'Jl. TKI',
            'poin' => 0,
            'status' => 'Baik'
        ]);

        // Siswa untuk kelas XII PPLG 2
        Siswa::create([
            'nis' => '212210046',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 2')->first()->id,
            'nama' => 'Feri',
            'no_telp' => '0895236775',
            'alamat' => 'Jl. Cirebon',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210047',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 2')->first()->id,
            'nama' => 'Gita',
            'no_telp' => '0895236776',
            'alamat' => 'Jl. Kuningan',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210048',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 2')->first()->id,
            'nama' => 'Hani',
            'no_telp' => '0895236777',
            'alamat' => 'Jl. Majalengka',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210049',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 2')->first()->id,
            'nama' => 'Iwan',
            'no_telp' => '0895236778',
            'alamat' => 'Jl. Indramayu',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210050',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 2')->first()->id,
            'nama' => 'Jaka',
            'no_telp' => '0895236779',
            'alamat' => 'Jl. Subang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211046',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 2')->first()->id,
            'nama' => 'Rafli',
            'no_telp' => '0895236775',
            'alamat' => 'Jl. Pasir Panjang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211047',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 2')->first()->id,
            'nama' => 'Gisela',
            'no_telp' => '0895236775',
            'alamat' => 'Jl. Bojong salak',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211048',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 2')->first()->id,
            'nama' => 'Gisel cantik <3',
            'no_telp' => '0895236775',
            'alamat' => 'Jl. Bojong salak',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211049',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 2')->first()->id,
            'nama' => 'Lop Gisela',
            'no_telp' => '0895236775',
            'alamat' => 'Jl. Bojong salak',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211050',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 2')->first()->id,
            'nama' => 'Gisela cantik banget, shengnya kuh <3',
            'no_telp' => '0895236775',
            'alamat' => 'Jl. Bojong salak',
            'poin' => 0,
            'status' => 'Baik'
        ]);

         // Siswa untuk kelas XII PPLG 3
         Siswa::create([
            'nis' => '212210051',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 3')->first()->id,
            'nama' => 'Kurnia',
            'no_telp' => '0895236780',
            'alamat' => 'Jl. Magelang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210052',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 3')->first()->id,
            'nama' => 'Lukman',
            'no_telp' => '0895236781',
            'alamat' => 'Jl. Jogja',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210053',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 3')->first()->id,
            'nama' => 'Maya',
            'no_telp' => '0895236782',
            'alamat' => 'Jl. Solo',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210054',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 3')->first()->id,
            'nama' => 'Nanda',
            'no_telp' => '0895236783',
            'alamat' => 'Jl. Semarang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210055',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 3')->first()->id,
            'nama' => 'Ovi',
            'no_telp' => '0895236784',
            'alamat' => 'Jl. Salatiga',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211051',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 3')->first()->id,
            'nama' => 'Arya',
            'no_telp' => '0895236780',
            'alamat' => 'Jl. Magelang',
            'poin' => 0,
            'status' => 'Baik'
        ]); 
        Siswa::create([
            'nis' => '212211052',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 3')->first()->id,
            'nama' => 'Naufal',
            'no_telp' => '0895236780',
            'alamat' => 'Jl. Magelang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211053',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 3')->first()->id,
            'nama' => 'Ahmad',
            'no_telp' => '0895236780',
            'alamat' => 'Jl. Magelang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211054',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 3')->first()->id,
            'nama' => 'Buche',
            'no_telp' => '0895236780',
            'alamat' => 'Jl. Kediri',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211055',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 3')->first()->id,
            'nama' => 'Doni',
            'no_telp' => '0895236780',
            'alamat' => 'Jl. Purwakarta',
            'poin' => 0,
            'status' => 'Baik'
        ]);

        // Siswa untuk kelas XII PPLG 4
        Siswa::create([
            'nis' => '212210056',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 4')->first()->id,
            'nama' => 'Pandu',
            'no_telp' => '0895236785',
            'alamat' => 'Jl. Kudus',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210057',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 4')->first()->id,
            'nama' => 'Qori',
            'no_telp' => '0895236786',
            'alamat' => 'Jl. Jepara',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210058',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 4')->first()->id,
            'nama' => 'Rizky',
            'no_telp' => '0895236787',
            'alamat' => 'Jl. Pati',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210059',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 4')->first()->id,
            'nama' => 'Siti',
            'no_telp' => '0895236788',
            'alamat' => 'Jl. Demak',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210060',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 4')->first()->id,
            'nama' => 'Tari',
            'no_telp' => '0895236789',
            'alamat' => 'Jl. Rembang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211056',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 4')->first()->id,
            'nama' => 'Vanza',
            'no_telp' => '0895236785',
            'alamat' => 'Jl. Sayati',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211057',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 4')->first()->id,
            'nama' => 'Shifa',
            'no_telp' => '0895236785',
            'alamat' => 'Jl. Pasawahan',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211058',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 4')->first()->id,
            'nama' => 'Ghifari',
            'no_telp' => '0895236785',
            'alamat' => 'Jl. Sayati',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211059',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 4')->first()->id,
            'nama' => 'Aldy',
            'no_telp' => '0895236785',
            'alamat' => 'Jl. TKI',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212211060',
            'id_kelas' => $kelas->where('nama_kelas', 'XII PPLG 4')->first()->id,
            'nama' => 'Alvin',
            'no_telp' => '0895236785',
            'alamat' => 'Jl. Sayati',
            'poin' => 0,
            'status' => 'Baik'
        ]);

             // Siswa untuk kelas XI PPLG 1
             Siswa::create([
                'nis' => '212210061',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 1')->first()->id,
                'nama' => 'Umar',
                'no_telp' => '0895236790',
                'alamat' => 'Jl. Malang',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210062',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 1')->first()->id,
                'nama' => 'Vina',
                'no_telp' => '0895236791',
                'alamat' => 'Jl. Batu',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210063',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 1')->first()->id,
                'nama' => 'Wulan',
                'no_telp' => '0895236792',
                'alamat' => 'Jl. Kepanjen',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210064',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 1')->first()->id,
                'nama' => 'Xavier',
                'no_telp' => '0895236793',
                'alamat' => 'Jl. Blitar',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210065',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 1')->first()->id,
                'nama' => 'Yani',
                'no_telp' => '0895236794',
                'alamat' => 'Jl. Tulungagung',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211061',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 1')->first()->id,
                'nama' => 'Arka',
                'no_telp' => '0895236790',
                'alamat' => 'Jl. Malang',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211062',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 1')->first()->id,
                'nama' => 'Aldino',
                'no_telp' => '0895236790',
                'alamat' => 'Jl. Malang',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211063',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 1')->first()->id,
                'nama' => 'Arafi',
                'no_telp' => '0895236790',
                'alamat' => 'Jl. Kediri',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211064',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 1')->first()->id,
                'nama' => 'Balqish',
                'no_telp' => '0895236790',
                'alamat' => 'Jl. Sayati',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211065',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 1')->first()->id,
                'nama' => 'Naydin',
                'no_telp' => '0895236790',
                'alamat' => 'Jl. Sayati',
                'poin' => 0,
                'status' => 'Baik'
            ]);
    
            // Siswa untuk kelas XI PPLG 2
            Siswa::create([
                'nis' => '212210066',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 2')->first()->id,
                'nama' => 'Zaki',
                'no_telp' => '0895236795',
                'alamat' => 'Jl. Trenggalek',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210067',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 2')->first()->id,
                'nama' => 'Alya',
                'no_telp' => '0895236796',
                'alamat' => 'Jl. Kediri',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210068',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 2')->first()->id,
                'nama' => 'Bimo',
                'no_telp' => '0895236797',
                'alamat' => 'Jl. Jombang',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210069',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 2')->first()->id,
                'nama' => 'Citra',
                'no_telp' => '0895236798',
                'alamat' => 'Jl. Mojokerto',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210070',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 2')->first()->id,
                'nama' => 'Dimas',
                'no_telp' => '0895236799',
                'alamat' => 'Jl. Nganjuk',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211066',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 2')->first()->id,
                'nama' => 'Bewe',
                'no_telp' => '0895236795',
                'alamat' => 'Jl. Trenggalek',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211067',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 2')->first()->id,
                'nama' => 'Iqy Only',
                'no_telp' => '0895236795',
                'alamat' => 'Jl. Budi',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211068',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 2')->first()->id,
                'nama' => 'CKy',
                'no_telp' => '0895236795',
                'alamat' => 'Jl. Budi',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211069',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 2')->first()->id,
                'nama' => 'Ocep',
                'no_telp' => '0895236795',
                'alamat' => 'Jl. Budi',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211070',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 2')->first()->id,
                'nama' => 'Wawan',
                'no_telp' => '0895236795',
                'alamat' => 'Jl. Budi',
                'poin' => 0,
                'status' => 'Baik'
            ]);
    
            // Siswa untuk kelas XI PPLG 3
            Siswa::create([
                'nis' => '212210071',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 3')->first()->id,
                'nama' => 'Edo',
                'no_telp' => '0895236800',
                'alamat' => 'Jl. Madiun',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210072',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 3')->first()->id,
                'nama' => 'Fahmi',
                'no_telp' => '0895236801',
                'alamat' => 'Jl. Magetan',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210073',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 3')->first()->id,
                'nama' => 'Gilang',
                'no_telp' => '0895236802',
                'alamat' => 'Jl. Ngawi',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210074',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 3')->first()->id,
                'nama' => 'Hana',
                'no_telp' => '0895236803',
                'alamat' => 'Jl. Bojonegoro',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210075',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 3')->first()->id,
                'nama' => 'Ilham',
                'no_telp' => '0895236804',
                'alamat' => 'Jl. Tuban',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211071',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 3')->first()->id,
                'nama' => 'Irman',
                'no_telp' => '0895236800',
                'alamat' => 'Jl. Madiun',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211072',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 3')->first()->id,
                'nama' => 'Ridwan',
                'no_telp' => '0895236800',
                'alamat' => 'Jl. Kopo',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211073',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 3')->first()->id,
                'nama' => 'Agum',
                'no_telp' => '0895236800',
                'alamat' => 'Jl. Cimindi',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211074',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 3')->first()->id,
                'nama' => 'Futry',
                'no_telp' => '0895236800',
                'alamat' => 'Jl. Cimindi',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211075',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 3')->first()->id,
                'nama' => 'Deni',
                'no_telp' => '0895236800',
                'alamat' => 'Jl. Cimindi',
                'poin' => 0,
                'status' => 'Baik'
            ]);

            // Siswa untuk kelas XI PPLG 4
            Siswa::create([
                'nis' => '212210076',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 4')->first()->id,
                'nama' => 'Joko',
                'no_telp' => '0895236805',
                'alamat' => 'Jl. Lamongan',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210077',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 4')->first()->id,
                'nama' => 'Kiki',
                'no_telp' => '0895236806',
                'alamat' => 'Jl. Gresik',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210078',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 4')->first()->id,
                'nama' => 'Lina',
                'no_telp' => '0895236807',
                'alamat' => 'Jl. Sidoarjo',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210079',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 4')->first()->id,
                'nama' => 'Miko',
                'no_telp' => '0895236808',
                'alamat' => 'Jl. Jember',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212210080',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 4')->first()->id,
                'nama' => 'Nina',
                'no_telp' => '0895236809',
                'alamat' => 'Jl. Banyuwangi',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211076',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 4')->first()->id,
                'nama' => 'Awal',
                'no_telp' => '0895236805',
                'alamat' => 'Jl. Kopo',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211077',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 4')->first()->id,
                'nama' => 'Titik',
                'no_telp' => '0895236805',
                'alamat' => 'Jl. Kopo',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211078',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 4')->first()->id,
                'nama' => 'Fathan',
                'no_telp' => '0895236805',
                'alamat' => 'Jl. Kopo',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211079',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 4')->first()->id,
                'nama' => 'Gara',
                'no_telp' => '0895236805',
                'alamat' => 'Jl. Cimindi',
                'poin' => 0,
                'status' => 'Baik'
            ]);
            Siswa::create([
                'nis' => '212211080',
                'id_kelas' => $kelas->where('nama_kelas', 'XI PPLG 4')->first()->id,
                'nama' => 'Nadisa',
                'no_telp' => '0895236805',
                'alamat' => 'Jl. Kopo',
                'poin' => 0,
                'status' => 'Baik'
            ]);

        // Siswa untuk kelas X TMS 1
        Siswa::create([
            'nis' => '212210081',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 1')->first()->id,
            'nama' => 'Adit',
            'no_telp' => '0895236810',
            'alamat' => 'Jl. Probolinggo',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210082',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 1')->first()->id,
            'nama' => 'Bimo',
            'no_telp' => '0895236811',
            'alamat' => 'Jl. Pasuruan',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210083',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 1')->first()->id,
            'nama' => 'Cakra',
            'no_telp' => '0895236812',
            'alamat' => 'Jl. Lumajang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210084',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 1')->first()->id,
            'nama' => 'Dito',
            'no_telp' => '0895236813',
            'alamat' => 'Jl. Malang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210085',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 1')->first()->id,
            'nama' => 'Eko',
            'no_telp' => '0895236814',
            'alamat' => 'Jl. Blitar',
            'poin' => 0,
            'status' => 'Baik'
        ]);

        // Siswa untuk kelas X TMS 2
        Siswa::create([
            'nis' => '212210086',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 2')->first()->id,
            'nama' => 'Fajar',
            'no_telp' => '0895236815',
            'alamat' => 'Jl. Mojokerto',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210087',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 2')->first()->id,
            'nama' => 'Galih',
            'no_telp' => '0895236816',
            'alamat' => 'Jl. Nganjuk',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210088',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 2')->first()->id,
            'nama' => 'Hadi',
            'no_telp' => '0895236817',
            'alamat' => 'Jl. Jombang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210089',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 2')->first()->id,
            'nama' => 'Indra',
            'no_telp' => '0895236818',
            'alamat' => 'Jl. Kediri',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210090',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 2')->first()->id,
            'nama' => 'Joko',
            'no_telp' => '0895236819',
            'alamat' => 'Jl. Tulungagung',
            'poin' => 0,
            'status' => 'Baik'
        ]);

        // Siswa untuk kelas X TMS 3
        Siswa::create([
            'nis' => '212210091',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 3')->first()->id,
            'nama' => 'Kartika',
            'no_telp' => '0895236820',
            'alamat' => 'Jl. Trenggalek',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210092',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 3')->first()->id,
            'nama' => 'Lutfi',
            'no_telp' => '0895236821',
            'alamat' => 'Jl. Ponorogo',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210093',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 3')->first()->id,
            'nama' => 'Mika',
            'no_telp' => '0895236822',
            'alamat' => 'Jl. Pacitan',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210094',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 3')->first()->id,
            'nama' => 'Niko',
            'no_telp' => '0895236823',
            'alamat' => 'Jl. Malang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210095',
            'id_kelas' => $kelas->where('nama_kelas', 'X TMS 3')->first()->id,
            'nama' => 'Oscar',
            'no_telp' => '0895236824',
            'alamat' => 'Jl. Blitar',
            'poin' => 0,
            'status' => 'Baik'
        ]);

        Siswa::create([
            'nis' => '212210096',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 1')->first()->id,
            'nama' => 'Pandu',
            'no_telp' => '0895236825',
            'alamat' => 'Jl. Trenggalek',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210097',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 1')->first()->id,
            'nama' => 'Rizky',
            'no_telp' => '0895236826',
            'alamat' => 'Jl. Ponorogo',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210098',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 1')->first()->id,
            'nama' => 'Satria',
            'no_telp' => '0895236827',
            'alamat' => 'Jl. Pacitan',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210099',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 1')->first()->id,
            'nama' => 'Tegar',
            'no_telp' => '0895236828',
            'alamat' => 'Jl. Malang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210100',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 1')->first()->id,
            'nama' => 'Umar',
            'no_telp' => '0895236829',
            'alamat' => 'Jl. Blitar',
            'poin' => 0,
            'status' => 'Baik'
        ]);

        // Siswa untuk kelas XI TMS 2
        Siswa::create([
            'nis' => '212210101',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 2')->first()->id,
            'nama' => 'Vino',
            'no_telp' => '0895236830',
            'alamat' => 'Jl. Mojokerto',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210102',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 2')->first()->id,
            'nama' => 'Wira',
            'no_telp' => '0895236831',
            'alamat' => 'Jl. Nganjuk',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210103',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 2')->first()->id,
            'nama' => 'Yoga',
            'no_telp' => '0895236832',
            'alamat' => 'Jl. Jombang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210104',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 2')->first()->id,
            'nama' => 'Zain',
            'no_telp' => '0895236833',
            'alamat' => 'Jl. Kediri',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210105',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 2')->first()->id,
            'nama' => 'Arya',
            'no_telp' => '0895236834',
            'alamat' => 'Jl. Tulungagung',
            'poin' => 0,
            'status' => 'Baik'
        ]);

        // Siswa untuk kelas XI TMS 3
        Siswa::create([
            'nis' => '212210106',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 3')->first()->id,
            'nama' => 'Bima',
            'no_telp' => '0895236835',
            'alamat' => 'Jl. Trenggalek',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210107',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 3')->first()->id,
            'nama' => 'Cakra',
            'no_telp' => '0895236836',
            'alamat' => 'Jl. Ponorogo',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210108',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 3')->first()->id,
            'nama' => 'Darma',
            'no_telp' => '0895236837',
            'alamat' => 'Jl. Pacitan',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210109',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 3')->first()->id,
            'nama' => 'Edo',
            'no_telp' => '0895236838',
            'alamat' => 'Jl. Malang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210110',
            'id_kelas' => $kelas->where('nama_kelas', 'XI TMS 3')->first()->id,
            'nama' => 'Firman',
            'no_telp' => '0895236839',
            'alamat' => 'Jl. Blitar',
            'poin' => 0,
            'status' => 'Baik'
        ]);

           // Siswa untuk kelas XII TMS 1
           Siswa::create([
            'nis' => '212210111',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 1')->first()->id,
            'nama' => 'Gilang',
            'no_telp' => '0895236840',
            'alamat' => 'Jl. Mojokerto',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210112',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 1')->first()->id,
            'nama' => 'Hadi',
            'no_telp' => '0895236841',
            'alamat' => 'Jl. Nganjuk',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210113',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 1')->first()->id,
            'nama' => 'Indra',
            'no_telp' => '0895236842',
            'alamat' => 'Jl. Jombang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210114',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 1')->first()->id,
            'nama' => 'Joko',
            'no_telp' => '0895236843',
            'alamat' => 'Jl. Kediri',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210115',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 1')->first()->id,
            'nama' => 'Krisna',
            'no_telp' => '0895236844',
            'alamat' => 'Jl. Tulungagung',
            'poin' => 0,
            'status' => 'Baik'
        ]);

        // Siswa untuk kelas XII TMS 2
        Siswa::create([
            'nis' => '212210116',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 2')->first()->id,
            'nama' => 'Lukman',
            'no_telp' => '0895236845',
            'alamat' => 'Jl. Trenggalek',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210117',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 2')->first()->id,
            'nama' => 'Maulana',
            'no_telp' => '0895236846',
            'alamat' => 'Jl. Ponorogo',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210118',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 2')->first()->id,
            'nama' => 'Nanda',
            'no_telp' => '0895236847',
            'alamat' => 'Jl. Pacitan',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210119',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 2')->first()->id,
            'nama' => 'Oscar',
            'no_telp' => '0895236848',
            'alamat' => 'Jl. Malang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210120',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 2')->first()->id,
            'nama' => 'Putra',
            'no_telp' => '0895236849',
            'alamat' => 'Jl. Blitar',
            'poin' => 0,
            'status' => 'Baik'
        ]);

        // Siswa untuk kelas XII TMS 3
        Siswa::create([
            'nis' => '212210121',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 3')->first()->id,
            'nama' => 'Rama',
            'no_telp' => '0895236850',
            'alamat' => 'Jl. Mojokerto',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210122',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 3')->first()->id,
            'nama' => 'Surya',
            'no_telp' => '0895236851',
            'alamat' => 'Jl. Nganjuk',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210123',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 3')->first()->id,
            'nama' => 'Taufan',
            'no_telp' => '0895236852',
            'alamat' => 'Jl. Jombang',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210124',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 3')->first()->id,
            'nama' => 'Udin',
            'no_telp' => '0895236853',
            'alamat' => 'Jl. Kediri',
            'poin' => 0,
            'status' => 'Baik'
        ]);
        Siswa::create([
            'nis' => '212210125',
            'id_kelas' => $kelas->where('nama_kelas', 'XII TMS 3')->first()->id,
            'nama' => 'Vito',
            'no_telp' => '0895236854',
            'alamat' => 'Jl. Tulungagung',
            'poin' => 0,
            'status' => 'Baik'
        ]);

    }
}
