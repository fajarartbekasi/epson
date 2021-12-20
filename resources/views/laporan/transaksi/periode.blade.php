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
            <h4>Laporan Transaksi selesai</h4>
            @if (request('tgl_awal'))
            <small>Dari tanggal {{ request('tgl_awal') }} &nbsp; sampai tanggal {{ request('tgl_akhir') }}</small>
            @endif
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembelians as $order)
                        <tr>
                            <td>{{ $order->carts()->first()->pembelian->invoice }}</td>
                            <td>{{ $order->carts()->first()->produk->name }}</td>
                            <td>{{ $order->carts()->first()->price }}</td>
                            <td>{{ $order->carts()->first()->qty }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            <td>{{ $order->carts()->first()->pembelian->status }}</td>
                            <td>{{ number_format($order->subtotal) }}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection
