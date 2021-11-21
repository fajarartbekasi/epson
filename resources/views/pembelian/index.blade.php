@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="mb-2">
                        <a href="{{route('petugas.pembelian.berlangsung')}}" class="btn btn-info">Transaksi Berlangsung</a>
                        <a href="{{route('petugas.pembelian.selesai')}}" class="btn btn-primary">Transaksi Selesai</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Total</th>
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