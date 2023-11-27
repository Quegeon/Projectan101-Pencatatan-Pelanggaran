<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_kelas','jurusan'];
    protected $table = 'kelas';
    protected $primary = 'id';
    public $incrementing = 'false';
    protected $keyType = 'string';
    public function Kelas() {
        return $this->hasMany(Kelas::class,'id_kelas','id');
    }
}
