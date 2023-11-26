<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bk extends Model
{
    protected $fillable = ['id', 'foto', 'nama', 'username', 'password'];
    protected $primarykey = 'id';
    protected $table ='bks';

    public function Bk()
    {
        return $this->hasMany(Bk::class, 'id_bk','id');
    }
}
