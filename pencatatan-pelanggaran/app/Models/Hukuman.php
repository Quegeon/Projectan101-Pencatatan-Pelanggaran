<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hukuman extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'hukuman'
    ];

    public $incrementing = false;

    public function Hukuman ()
    {
        return $this->hasMany(Hukuman::class, 'id_hukuman', 'id');
    }
}
