@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    @role('direktur|admin|finance')
                    <div class="mb-2">
                        <form action="{{route('cetak.produk')}}" method="get">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tanggal awal</label>
                                        <input type="date" name="tgl_awal" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tanggal akhir</label>
                                        <input type="date" name="tgl_akhir" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-info">Cari Laporan</button>
                                <a href="{{route('cetak.semua-produk')}}" class="btn btn-info">Cetak Semua Page</a>
                            </div>
                        </form>
                    </div>
                    @endrole
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stock</th>
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
        </div>
    </div>
</div>
@endsection
