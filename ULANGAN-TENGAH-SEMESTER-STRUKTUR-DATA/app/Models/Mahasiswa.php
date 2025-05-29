<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';

    protected $fillable = ['nim', 'nama', 'prodi', 'email'];

    public function penerimas()
    {
        return $this->hasMany(Penerima::class);
    }
 }
