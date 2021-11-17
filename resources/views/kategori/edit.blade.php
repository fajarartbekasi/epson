@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <form action="{{route('kategory.update', $kategori->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="">Nama Kategori</label>
                            <input type="text" name="name" id="" class="form-control" value="{{$kategori->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Rak</label>
                            <input type="text" name="nomor" id="" class="form-control" value="{{$kategori->nomor}}">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info">Ubah Kategori</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection