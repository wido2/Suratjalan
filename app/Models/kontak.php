<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'email', 'telepon', 'jabatan', 'customer_id'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    

}
