<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_id',
        'nama_wisata',
        'lokasi_maps',
        'fasilitas',
        'biaya',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function alternatives()
    {
        return $this->hasMany(Alternative::class);
    }
}