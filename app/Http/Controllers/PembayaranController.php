<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Pembelian;
use App\Pembayaran;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($id)
    {
        $pembayaran = Pembelian::with('carts')->findOrFail($id);
        $kategoris  = Kategori::all();
        return view('pembayaran.create', compact('pembayaran','kategoris'));
    }
    public function store($id)
    {

        $pembelian  = Pembelian::findOrFail($id);

        $pembayaran = Pembayaran::create($this->validateRequest());

        $this->storeImage($pembayaran);

        if($pembayaran->save()){

            $pembelian->update([
                'status'    => 'berlangsung'
            ]);
        }

        return redirect()->back();
    }
    private function validateRequest(){
        return tap(request()->validate([
            'user_id'   => 'required',
            'pembelian_id' => 'required',
            'image'     => 'required|mimes:jpeg,jpg,png|max:5000',
        ]), function(){
            if(request()->hasFile('image')){
                request()->validate([
                    'image'    => 'required|mimes:jpeg,jpg,png|max:5000',
                ]);
            }
        });
    }
    private function storeImage($pembayaran){
        if(request()->has('image')){
            $pembayaran->update([
                'image'  => request()->image->store('uploads','public'),
            ]);

            $image = Image::make(public_path('storage/'. $pembayaran->image))->fit(300,300, null, 'top-left');
            $image->save();
        }
    }
}
