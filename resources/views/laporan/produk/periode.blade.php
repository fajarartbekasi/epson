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
                </tr>
            </thead>
            <tbody>
                @foreach($produks as $produck)
                    <tr>
                        <td>{{$produck->kategori->name}}</td>
                        <td>{{$produck->name}}</td>
                        <td>{{$produck->price}}</td>
                        <td>{{$produck->stok}}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection