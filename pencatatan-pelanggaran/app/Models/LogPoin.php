<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPoin extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'id_bk', 'id_user', 'poin_asal', 'poin_perubahan', 'is_reset', 'keterangan', 'id_kelas'];

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_user', 'nis');
    }

    public function BK()
    {
        return $this->belongsTo(Bk::class, 'id_bk', 'id');
    }

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
}
