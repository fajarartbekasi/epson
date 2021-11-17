<?php

namespace App\Http\Controllers\User;

use App\Pembelian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::with('user')
                               ->where('user_id', '=', Auth::user()->id)
                               ->latest()
                               ->paginate(5);

        return view('user.transaksi.index', compact('pembelians'));
    }
    public function destroy(Request $request,$id)
    {
       $pembelian = Pembelian::findOrFail($id);

       $pembelian->delete($request->all());

       flash('Transaksi anda berhasil dihapus');

        return redirect()->back();
    }
}
