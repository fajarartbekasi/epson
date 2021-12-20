@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @role('admin')
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Transaksi Pending</h5>
                    <div>
                        <h4 class="text-info">{{$pending}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Transaksi Berlangsung</h5>
                    <div>
                        <h4 class="text-info">{{$berlangsung}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Transaksi selesai</h5>
                    <div>
                        <h4 class="text-info">{{$selesai}}</h4>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    @role('customer')
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Transaksi Selesai</h5>
                    <div>
                        <h4 class="text-info">{{$belanjaan}}</h4>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    @role('gudang')
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Total Produk</h5>
                    <div>
                        <h4 class="text-info">{{$produck}}</h4>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    @role('direktur')
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Total Produk</h5>
                    <div>
                        <h4 class="text-info">{{$produck}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5>Total Pembelian</h5>
                    <div>
                        <h4 class="text-info">{{$selesai}}</h4>
                    </div>
                </div>
            </div>
        </div>
    @endrole
    </div>
</div>
@endsection
