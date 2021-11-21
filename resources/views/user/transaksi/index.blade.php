@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="mb-2">
                        <a href="{{route('welcome')}}" class="btn btn-info">Tambah transaksi</a>
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
                                <th>Options</th>
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
                                    <td>
                                        <form action="{{route('user.destroy.transaksi', $pembelian->id)}}" method="post">
                                            @csrf
                                            <a href="{{route('user.ambil-form',$pembelian->id)}}" class="btn btn-info btn-sm">Upload Bukti Pembayaran</a>
                                            <button class="btn btn-danger btn-sm">Hapus belanjaan</button>
                                        </form>
                                    </td>
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