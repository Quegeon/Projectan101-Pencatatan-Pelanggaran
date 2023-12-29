<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempAturan extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_pelanggaran',
        'id_aturan'
    ];

    public function Aturan() {
        return $this->belongsTo(Aturan::class, 'id_aturan', 'id');
    }
}
