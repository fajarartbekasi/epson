@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    @role('gudang')
                    <div class="ml-3 mb-3">
                        <a href="{{route('produck.create')}}" class="btn btn-info">Tambah Produk</a>
                    </div>
                    @endrole
                    @role('direktur|admin')
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
                                        <a href="{{route('produck.edit',$produck->id)}}"
                                            class="btn btn-info btn-sm">Edit Produk</a>
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus Produk</button>
                                    </form>
                                </td>
                                @endrole
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