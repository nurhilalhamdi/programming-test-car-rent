<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'merk',
        'model',
        'plat_nomor',
        'harga_perhari',
        'tanggal_mulai',
        'tanggal_selesai',
        'jumlah_hari',
        'total_tarif',
        'id_user',
    ];
}
