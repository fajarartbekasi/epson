<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Pembelian extends Model
{
    use AutoNumberTrait;
    protected $table = 'pembelians';
    protected $guarded = [];

    public function getAutoNumberOptions()
    {
        return [
            'invoice' => [
                'format' => function () {
                    return 'IN' . date('dmy');
                }
            ]

        ];
    }
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
