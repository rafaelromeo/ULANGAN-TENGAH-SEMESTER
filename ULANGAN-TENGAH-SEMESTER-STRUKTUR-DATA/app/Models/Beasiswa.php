<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    protected $table = 'beasiswas';

    protected $fillable = ['nama_beasiswa', 'deskripsi', 'tahun', 'kuota'];

    public function penerimas()
    {
        return $this->hasMany(Penerima::class);
    }
}
