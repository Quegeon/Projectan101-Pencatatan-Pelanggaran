<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAturan extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    // 10
    protected $fillable = [
        'id',
        'id_aturan',
        'no_pelanggaran'
    ];

    public function Aturan() {
        return $this->belongsTo(Aturan::class, 'id_aturan', 'id');
    }

}
