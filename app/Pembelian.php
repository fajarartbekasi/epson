<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelians';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
