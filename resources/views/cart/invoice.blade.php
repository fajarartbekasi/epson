@extends('layouts.index')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h4 class="text-info">{{ config('app.name', 'Laravel') }}</h4>
                            <div>
                                <h6>Nomor invoice : {{ $pembelian->pembelian->invoice }}</h6>
                                <h6>Diterbitkan oleh</h6>
                                <h6>Penjual : {{ config('app.name', 'Laravel') }}</h6>
                                <h6>tanggal : {{ $pembelian->pembelian->created_at }}</h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-secondary">Tujuan Pengiriman</h4>
                            <div>
                                <h6>Penerima : {{$pembelian->pembelian->user->name}}</h6>
                                <h6>Alamat : {{$pembelian->pembelian->user->address}}</h6>
                                <h6>Telp : {{$pembelian->pembelian->user->phone}}</h6>
                                <h6>Email : {{$pembelian->pembelian->user->email}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="pr-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $get )
                                    <tr>
                                        <td>{{$get->produk->name}}</td>
                                        <td>{{$get->qty}}</td>
                                        <td>{{$get->price}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div>
                            <h4>Total Pembayaran Rp : {{number_format($pembelian->pembelian->subtotal)}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
