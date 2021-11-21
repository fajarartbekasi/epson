<?php

namespace App\Http\Controllers;

use App\Pembelian;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'pending' => Pembelian::where('status', 'pending')->count(),
            'berlangsung' => Pembelian::where('status', 'menunggu pembayaran')->count(),
            'selesai' => Pembelian::where('status', 'selesai')->count(),
            'belanjaan' => Pembelian::with('user')->where('user_id', Auth::user()->id)->count(),
            'produck' => Produk::count(),
        ];
        return view('home', $data);
    }
}
