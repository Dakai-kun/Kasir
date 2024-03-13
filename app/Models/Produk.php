<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'price',
        'stock',
    ];

    public function detailpenjualans()
    {
        return $this->hasOne(DetailPenjualan::class);
    }
}
