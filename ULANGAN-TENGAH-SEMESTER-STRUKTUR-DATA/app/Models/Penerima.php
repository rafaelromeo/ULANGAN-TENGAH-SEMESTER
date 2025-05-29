<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    protected $table = 'penerimas';
     protected $fillable = ['mahasiswa_id', 'beasiswa_id', 'status', 'tanggal_penerimaan'];

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
