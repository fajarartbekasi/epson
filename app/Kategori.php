<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $guarded = [];

    public function produks()
    {
       return $this->hasMany(Produk::class);
    }
}
