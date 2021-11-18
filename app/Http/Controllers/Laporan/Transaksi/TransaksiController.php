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
}
