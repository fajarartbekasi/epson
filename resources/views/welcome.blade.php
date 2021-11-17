@extends('layouts.index')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h6>Produk</h6>
            <div class="row">
            @forelse($produks as $produk)
                <div class="col-md-3 pt-2">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ url('storage/'. $produk->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{route('produck.show', $produk->id)}}">
                                    {{$produk->name}}
                                </a>
                            </h5>
                            <p class="card-text">Rp.{{$produk->price}}</p>
                            <p class="text-secondary">Stock : {{$produk->stok}}</p>
                        </div>
                    </div>
                </div>
                @empty
                <h2>Maaf Produk belum tersedia nich</h2>
            @endforelse
            </div>
        </div>
    </div>
</div>

@endsection