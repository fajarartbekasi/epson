<?php

namespace App\Http\Controllers\Laporan\Produk;
use PDF;
use App\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function show(Request $request)
    {
        if ($request->has('tgl_awal')) {
            $produks = Produk::whereBetween('created_at', [request('tgl_awal'), request('tgl_akhir')])
                                    ->get();
        }

        $pdf = PDF::loadView('laporan.produk.periode', compact('produks'))->setPaper('a4','landscape');

        return $pdf->stream('laporan_periode.pdf');
    }
    public function all()
    {
        $produks = Produk::all();

        $pdf = PDF::loadView('laporan.produk.all', compact('produks'))->setPaper('a4','landscape');

        return $pdf->stream('laporan_produk.pdf');
    }
}
