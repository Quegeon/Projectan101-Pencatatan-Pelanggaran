<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bk extends Model
{
    protected $fillable = ['id_bk', 'foto', 'nama', 'username', 'password'];
    protected $primarykey = 'id_bk';

    public function Bk()
    {
        return $this->hasMany(Bk::class, 'id_bk','id_bk');
    }
}
