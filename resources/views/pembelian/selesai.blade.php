@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="mb-2">
                        <form action="{{route('cetak.periode')}}" method="get">
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
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button class="btn btn-info">Cari Laporan</button>
                                    <a href="{{route('cetak.transaksi')}}" class="btn btn-info">Cetak Semua Page</a>
                                </div>
                                @role('admin')
                                    <div class="mb-2">
                                        <a href="{{route('petugas.pembelian.berlangsung')}}" class="btn btn-info">Transaksi Berlangsung</a>
                                        <a href="{{route('petugas.pembelian.selesai')}}" class="btn btn-primary">Transaksi Selesai</a>
                                    </div>
                                @endrole
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>invoice</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>jumlah</th>
                                <th>Status</th>
                                <th>total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pembelians as $pembelian)
                                <tr>
                                    <td>{{$pembelian->invoice}}</td>
                                    <td>{{$pembelian->user->name}}</td>
                                    <td>Rp. {{number_format($pembelian->carts->first()->price)}}</td>
                                    <td>{{$pembelian->carts->first()->qty}}</td>
                                    <td>
                                        <span class="badge badge-warning">{{$pembelian->status}}</span>
                                    </td>
                                    <td>{{number_format($pembelian->carts->first()->price * $pembelian->carts->first()->qty)}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Maaf Transaksi anda belum tersedia silahkan melakukan transaksi
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection