<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_jenis',
        'id_hukuman',
        'nama_aturan',
        'poin',
        'keterangan'
    ];

    public function Jenis ()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis', 'id');
    }

    public function Hukuman ()
    {
        return $this->belongsTo(Hukuman::class, 'id_hukuman', 'id');
    }
}
