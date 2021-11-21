@extends('layouts.cetak')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h4 class="text-info">{{ config('app.name', 'Laravel') }}</h4>
        <div>
            <h6>Nomor invoice : {{ $order->invoice }}</h6>
            <h6>Nama Penerima : {{ $order->user->name }}</h6>
            <h6>Telephone : {{ $order->user->phone }}</h6>
            <h6>Diterbitkan oleh</h6>
            <h6>Penjual : {{ config('app.name', 'Laravel') }}</h6>
            <h6>tanggal : {{ $order->created_at->format('Y-m-d') }}</h6>
        </div>
        <div>
            <h6>Alamat pengirim</h6>
        </div>
        <div>
            <h6>Tujuan Pengiriman : {{$order->user->address}}</h6>
        </div>

        <div class="pr-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->carts()->first()->produk->name }}</td>
                        <td>{{ $order->carts()->first()->qty }}</td>
                        <td>{{ $order->carts()->first()->price }}</td>
                        <td>{{ number_format($order->subtotal) }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right">
                <h4>Total Pembayaran Rp : {{ number_format($order->subtotal) }}</h4>
            </div>
        </div>
    </div>
</div>

@endsection