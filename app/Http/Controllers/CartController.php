<?php

namespace App\Http\Controllers;

use DB;
use Cookie;
use Closure;
use App\Cart;
use App\Produk;
use App\Kategori;
use App\Pembelian;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\PembelianMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private function getCarts(){

        $carts = json_decode(request()->cookie('epson'), true);
        $carts = $carts != '' ? $carts:[];
        return $carts;

    }

    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'produk_id' => 'required|exists:produks,id',
            'qty' => 'required|integer'
        ]);

        $carts = $this->getCarts();

        if ($carts && array_key_exists($request->produk_id, $carts)) {
            $carts[$request->produk_id]['qty'] += $request->qty;
        } else {
            $produck = Produk::find($request->produk_id);
            $carts[$request->produk_id] = [
                'qty' => $request->qty,
                'produk_id' => $produck->id,
                'name' => $produck->name,
                'price' => $produck->price,
            ];
        }

        $cookie = cookie('epson', json_encode($carts), 2880);
        flash('Pembelian anda berhasil ditambahkan ke dalam keranjang');
        return redirect()->route('user.cek.cart')->cookie($cookie);
    }

    public function listCart()
    {
        $kategoris = Kategori::all();

        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['price'];
        });

        return view('cart.show', compact('carts', 'subtotal', 'kategoris'));
    }
    public function checkout()
    {
        $kategoris = Kategori::all();
        $carts = $this->getCarts();
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['price'];
        });
        return view('cart.create', compact('carts', 'subtotal', 'kategoris'));
    }
    public function prosesCheckout(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $affiliate = json_encode(request()->cookie('epson'), true);

            $explodeAffiliate = explode('-', $affiliate);

            $carts = $this->getCarts();
            $subtotal = collect($carts)->sum(function($q) {
                return $q['qty'] * $q['price'];
            });

            $pembelian = Pembelian::create([
                'invoice' => Str::random(4) . '-' . time(),
                'user_id' => $request->user_id,
                'status' => 'menunggu pembayaran',
                'subtotal' => $subtotal,
            ]);

            foreach ($carts as $row) {
                $produck = Produk::find($row['produk_id'])->decrement('stok',$row['qty']);

               Cart::create([
                    'pembelian_id' => $pembelian->id,
                    'produk_id' => $row['produk_id'],
                    'price' => $row['price'],
                    'qty' => $row['qty'],
                ]);
            }

            $to = Mail::to(Auth::user()->email)->send(new PembelianMail($pembelian));
            DB::commit();

            $carts = [];
            $cookie = cookie('epson', json_encode($carts), 2880);
            Cookie::queue(Cookie::forget('epson'));
            flash('Terimakasih telah berbelanjan di toko kami, silahkan cek email anda untuk melakukan upload pembayaran');
            return redirect(route('user.checkout.selesai', $pembelian->invoice))->cookie($cookie);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }
    public function checkoutSelesai($invoice)
    {
        $kategoris = Kategori::all();
        $order = Pembelian::where('invoice', $invoice)->first();
        return view('cart.invoice', compact('order','kategoris'));
    }
}
