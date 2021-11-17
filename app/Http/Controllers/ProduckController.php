<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProduckController extends Controller
{
    public function index()
    {
        $produks = Produk::with('kategori')->paginate(5);

        return view('produk.index', compact('produks'));
    }
    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }
    public function store()
    {

        $produck = Produk::create($this->validateRequest());

       $this->storeImage($produck);

        return redirect()->back();
    }
    public function edit($id)
    {
        $produck = Produk::findOrfail($id);
        $categorys = Kategori::all();
        return view('produk.edit', compact('produck','categorys'));
    }
    public function update(Request $request, $id)
    {
        $produck = Produk::findOrFail($id);

        $produck->update($request->all());

        return redirect()->back();
    }
    public function show($id)
    {
        $kategoris = Kategori::all();
       $produk = Produk::findOrFail($id);

       return view('produk.show', compact('produk','kategoris'));
    }
    private function validateRequest(){
        return tap(request()->validate([
            'kategori_id'   => 'required',
            'name'          => 'required',
            'price'         => 'required',
            'stok'          => 'required',
            'desk'          => 'required',
            'image'         => 'required|mimes:jpeg,jpg,png|max:5000',
        ]), function(){
            if(request()->hasFile('image')){
                request()->validate([
                    'image'    => 'required|mimes:jpeg,jpg,png|max:5000',
                ]);
            }
        });
    }
    private function storeImage($produck){
        if(request()->has('image')){
            $produck->update([
                'image'  => request()->image->store('uploads','public'),
            ]);

            $image = Image::make(public_path('storage/'. $produck->image))->fit(300,300, null, 'top-left');
            $image->save();
        }
    }

}
