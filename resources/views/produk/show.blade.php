@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <img src="{{url('storage/'. $produk->image)}}" alt="" srcset="">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4>{{$produk->name}}</h4>
                    <h6 class="text-info">Rp. {{$produk->price}}</h6>
                    <h6 class="text-info">Stok {{$produk->stok}}</h6>
                    <div>
                        <p>{{$produk->desk}}</p>
                    </div>
                </div>
                <div class="card-footer border-0">
                    <form action="{{route('user.add-cart')}}" method="post">
                        @csrf
                        <div class="d-flex">
                            <div class="form-group col-9">
                                <input type="number" name="qty" id="sst" maxlength="12" title="Quantity:" class="form-control" placeholder="Jumlah Barang">
                                <input type="hidden" name="produk_id" value="{{$produk->id}}" class="form-control">
                            </div>
                            <div>
                                <button class="btn-pill btn-indigo">
                                    tambah ke keranjang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection