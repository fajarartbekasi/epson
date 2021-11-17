@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="" method="post">
                                @csrf
                                @forelse($carts as $cart)
                                    <tr>
                                        <td>{{$cart['name']}}</td>
                                        <td>Rp.{{number_format($cart['price'])}}</td>
                                        <td>
                                            <div class="product_count">
                                                    <input type="number" name="qty[]" id="sst{{ $cart['produk_id'] }}" maxlength="12" value="{{ $cart['qty'] }}" title="Quantity:" class="input-text qty">
                                                    <input type="hidden" name="produk_id[]" value="{{ $cart['produk_id'] }}" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <h5>Rp {{ number_format($cart['price'] * $cart['qty']) }}</h5>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">Tidak ada belanjaan</td>
                                    </tr>
                                @endforelse
                            </form>
                            <tr>
                                <td colspan="3">
                                    <h5 class="text-right">Subtotal</h5>
                                </td>
                                <td >
                                    <h5 class="">Rp {{ number_format($subtotal) }}</h5>
                                </td>
                            </tr>
                            <div class="d-flex mb-2">
                                <a href="{{route('welcome')}}" class="btn btn-info mr-2">Lanjut belanja</a>
                                <a href="{{route('user.checkout.cart')}}" class="btn btn-secondary">Checkout</a>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection