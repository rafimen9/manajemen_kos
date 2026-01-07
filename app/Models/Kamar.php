<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_kamar',
        'nama_kamar',
        'harga',
        'status'
    ];

    public function penghunis()
    {
        return $this->hasMany(Penghuni::class);
    }
}
