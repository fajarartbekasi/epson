<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $data = [
            'kategoris' => Kategori::all(),
            'produks' => Produk::latest()->paginate(10),
        ];
        return view('welcome' , $data);
    }
}
