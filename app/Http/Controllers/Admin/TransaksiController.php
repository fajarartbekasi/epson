<?php

namespace App\Http\Controllers\Admin;

use App\Pembelian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::with('user')->where('status', 'menunggu pembayaran')
                                ->latest()->paginate(5);

        return view('pembelian.index', compact('pembelians'));
    }
    public function berlangsung()
    {
        $pembelians = Pembelian::with('user')->where('status', 'berlangsung')
                                ->latest()->paginate(5);

        return view('pembelian.berlangsung', compact('pembelians'));
    }
    public function selesai()
    {
        $pembelians = Pembelian::with('user')->where('status', 'selesai')
                                ->latest()->paginate(5);

        return view('pembelian.selesai', compact('pembelians'));
    }
    public function update(Request $request, $id)
    {
        $pembelian = Pembelian::findOrFail($id);

        $pembelian->update([
            'status'    => 'selesai'
        ]);

        flash('Terimakasih transaki telah selesai');

        return redirect()->back();
    }
}
