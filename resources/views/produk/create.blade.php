@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <form action="{{route('produck.store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Pilih Kategori</label>
                            <select name="kategori_id" class="form-control" id="">
                                <option value="">Silahkan Pilih Kategori</option>
                                @foreach($kategori as $get)
                                    <option value="{{$get->id}}">{{$get->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" name="price" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Stock</label>
                            <input type="text" name="stok" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Desk</label>
                            <input type="text" name="desk" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" id="" class="form-control">
                        </div>

                        <div>
                            <button type="submit" class="btn btn-info">Simpan kategori</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection