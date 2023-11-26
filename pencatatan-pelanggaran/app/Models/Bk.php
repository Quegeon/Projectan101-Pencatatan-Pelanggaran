<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Bk extends Authenticatable
{
    protected $fillable = ['id', 'foto', 'nama', 'username', 'password'];
    protected $primarykey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function Bk()
    {
        return $this->hasMany(Bk::class, 'id_bk','id');
    }
}
