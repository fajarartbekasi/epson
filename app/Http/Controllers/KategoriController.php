<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::paginate(5);
        return view('kategori.index', compact('kategoris'));
    }
    public function create()
    {
        return view('kategori.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'nomor'  => 'required',
        ]);

        $kategori = Kategori::create([
            'name'      => $request->name,
            'nomor'     => $request->nomor,
        ]);

        flash('Kategori berhasil ditambahkan');
        return redirect()->back();
    }
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->update($request->all());

        flash('Kategori berhasil diperbarui');
        return redirect()->back();
    }
    public function destroy(Request $request,$id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete($request->all());

        flash('Kategori berhasil dihapus');

        return redirect()->back();
    }
}
