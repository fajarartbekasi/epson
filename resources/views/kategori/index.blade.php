@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <div class="ml-3 mb-3">
                        <a href="{{route('kategory.create')}}" class="btn btn-info">Tambah Kategori</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Kategori</th>
                                <th>No Rak</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategoris as $kategori)
                                <tr>
                                    <td>{{$kategori->name}}</td>
                                    <td>{{$kategori->nomor}}</td>
                                    <td>
                                        <form action="{{route('kategory.destroy', $kategori->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('kategory.edit', $kategori->id)}}" class="btn btn-info btn-sm">Edit kategori</a>
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