<?php

namespace App\Http\Controllers;

use App\Pembelian;
use App\Produk;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::with('user')->where('status', 'selesai')
        ->latest()->paginate(5);

        return view('report.selesai', compact('pembelians'));
    }
    public function show()
    {
        $produks = Produk::with('kategori')->paginate(5);

        return view('report.produck', compact('produks'));
    }
}
