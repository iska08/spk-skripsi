<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    protected $fillable = ['user_id', 'nama_saran', 'keterangan', 'validasi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
