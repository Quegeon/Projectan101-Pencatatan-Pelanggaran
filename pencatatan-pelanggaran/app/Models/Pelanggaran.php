<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nis',
        'id_aturan',
        'id_user',
        'id_bk',
        'tgl_pelanggaran',
        'keterangan',
        'status',
        'total_poin',
    ];

    public function Aturan(): BelongsTo
    {
        return $this->belongsTo(Aturan::class, 'id_aturan', 'id');
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    
    public function Bk(): BelongsTo
    {
        return $this->belongsTo(Bk::class, 'id_bk', 'id');
    }
    
    public function Siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }
}
