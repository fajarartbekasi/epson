@extends('layouts.cetak')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <P>
                <b>
                    <h3>{{ config('app.name', 'Laravel') }}
                        <br>
                        Kawasan EJIP Industrial Park Lot 4E, Jl. Cisokan Raya, Sukaresmi, Cikarang Sel.,
                        <br>
                        Bekasi, Jawa Barat 17550
                    </h3>
                    <hr>
                </P>
        </div>
        <div class="">
            <h4>Laporan Periode Produk</h4>
            @if (request('tgl_awal'))
            <small>Dari tanggal {{ request('tgl_awal') }} &nbsp; sampai tanggal {{ request('tgl_akhir') }}</small>
            @endif
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>stock</th>
                    @role('gudang')
                        <th>Options</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach($produks as $produck)
                    <tr>
                        <td>{{$produck->kategori->name}}</td>
                        <td>{{$produck->name}}</td>
                        <td>{{$produck->price}}</td>
                        <td>{{$produck->stok}}</td>
                        @role('gudang')
                            <td>
                                <form action="" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('produck.edit',$produck->id)}}" class="btn btn-info btn-sm">Edit Produk</a>
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus Kategori</button>
                                </form>
                            </td>
                        @endrole
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection