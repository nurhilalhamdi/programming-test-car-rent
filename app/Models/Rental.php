<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_mulai',
        'tanggal_selesai',
        'id_user',
        'id_mobil',
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }
}
