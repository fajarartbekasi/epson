@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <div class="ml-3 mb-3">
                        <a href="{{route('produck.create')}}" class="btn btn-info">Tambah Produk</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>stock</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produks as $produck)
                                <tr>
                                    <td>{{$produck->kategori->name}}</td>
                                    <td>{{$produck->name}}</td>
                                    <td>{{$produck->price}}</td>
                                    <td>{{$produck->stok}}</td>
                                    <td>
                                        <form action="" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('produck.edit',$produck->id)}}" class="btn btn-info btn-sm">Edit Produk</a>
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus Kategori</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection