<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama', 'deskripsi',
    ];

    public function kontak()
    {
        return $this->hasMany(Kontak::class);
    }
    public function address()
    {
        return $this->hasMany(Address::class);
    }

}
