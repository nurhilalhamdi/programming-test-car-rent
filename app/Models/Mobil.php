<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'merk',
        'model',
        'plat_nomor',
        'harga_perhari',
        'status_sewa',
        'id_user',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
