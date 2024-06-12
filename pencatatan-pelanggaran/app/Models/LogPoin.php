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
    protected $fillable = [
        'id',
        'id_user',
        'id_bk',
        'poin_asal',
        'poin_perubahan',
        'is_reset',
        'keterangan'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function BK()
    {
        return $this->belongsTo(Bk::class, 'id_bk', 'id');
    }
}
