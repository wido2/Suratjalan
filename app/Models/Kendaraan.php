<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'nomor_polisi', 'jenis_kendaraan',

    ];

    public function surat_jalan()
    {
        return $this->hasMany(SuratJalan::class);
    }
    
}

