@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <form action="{{route('kategory.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Kategori</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Rak</label>
                            <input type="text" name="nomor" id="" class="form-control">
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