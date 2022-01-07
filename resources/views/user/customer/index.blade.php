@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="alert alert-info">
                        Data Customer
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $customer)
                                <tr>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>
                                        <form action="{{route('petugas.destroy', $customer->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{route('petugas.customer.edit', $customer->id)}}" class="btn btn-info btn-sm">
                                                Edit Customer
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Hapus Customer
                                            </button>
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
