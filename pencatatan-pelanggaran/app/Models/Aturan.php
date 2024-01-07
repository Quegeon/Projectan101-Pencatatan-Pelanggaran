<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $keyType = 'string';
    
    protected $fillable = [
        'id',
        'id_jenis',
        'id_hukuman',
        'nama_aturan',
        'poin',
        'keterangan'
    ];

    public $incrementing = false;
    
    public function Jenis ()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis', 'id');
    }

    public function Hukuman ()
    {
        return $this->belongsTo(Hukuman::class, 'id_hukuman', 'id');
    }
    public function Aturan()
    {
        return $this->hasMany(Aturan::class, 'id_aturan', 'id');
    }

    // public function Hukuman_Pilihan ()
    // {
    //     return $this->hasMany(Aturan::class, 'hukuman_pilihan', 'id');
    // }
}
