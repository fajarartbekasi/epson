<?php

namespace App\Http\Controllers\Laporan\Transaksi;

use PDF;
use App\Pembelian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function show($id)
    {
        $order = Pembelian::findOrFail($id);

        $pdf = PDF::loadView('laporan.transaksi.invoice', compact('order'))->setPaper('legal','potrait');

        return $pdf->stream('invoice.pdf');
    }

    public function periode(Request $request)
    {
        if ($request->has('tgl_awal')) {
            $pembelians = Pembelian::whereBetween('created_at', [request('tgl_awal'), request('tgl_akhir')])
                                    ->get();
        }

        $pdf = PDF::loadView('laporan.transaksi.periode', compact('pembelians'))->setPaper('a4', 'landscape');

        return $pdf->stream('rekap_periode_pembelian.pdf');
    }
    public function transaksi()
    {
        $pembelians = Pembelian::with('user')->get();

        $pdf = PDF::loadView('laporan.transaksi.transaksi', compact('pembelians'))->setPaper('a4', 'landscape');

        return $pdf->stream('rekap_transaksi.pdf');
    }
}
