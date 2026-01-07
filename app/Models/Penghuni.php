<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penghuni extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'nama','no_hp','kamar_id','tgl_masuk','tgl_keluar'
    ];

    public function kamar(){
        return $this->belongsTo(Kamar::class);
    }
}
