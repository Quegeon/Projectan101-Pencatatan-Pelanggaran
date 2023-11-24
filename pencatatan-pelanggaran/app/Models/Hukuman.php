<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hukuman extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'hukuman'
    ];

    public function Hukuman ()
    {
        return $this->hasMany(Hukuman::class, 'id_hukuman', 'id');
    }
}
