<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'nis',
        'id_user',
        'id_bk',
        'hukuman_pilihan',
        'no_pelanggaran',
        'tgl_pelanggaran',
        'keterangan',
        'status',
        'total_poin',
        'hukuman_pilihan',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    
    public function Bk()
    {
        return $this->belongsTo(Bk::class, 'id_bk', 'id');
    }

    public function Hukuman_Pilihan()
    {
        return $this->belongsTo(Aturan::class, 'hukuman_pilihan', 'id');
    }
    
    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    public function Hukuman_Pilihan ()
    {
        return $this->belongsTo(Aturan::class, 'hukuman_pilihan', 'id');
    }
}
