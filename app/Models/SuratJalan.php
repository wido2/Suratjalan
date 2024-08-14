<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_surat_jalan',
        'customer_id',
        'kontak_id',
        'address',
        'user_id',
        'tanggal_pengiriman',
        'kendaraan_id',
        'scan_surat',
        'lampiran',
    ];

    protected $casts =[
        'scan_surat' => 'array',
        'lampiran' => 'array',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function kontak()
    {
        return $this->belongsTo(Kontak::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }



}
