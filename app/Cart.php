<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $guarded = [];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }
}
