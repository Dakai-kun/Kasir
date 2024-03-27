<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'address',
        'phone_number',
    ];

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }
}
