<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable=[
        'nama_produk', 'id_kategori', 'id_supplier', 'stok', 'satuan', 'harga_beli', 'harga_jual'
    ]
}
