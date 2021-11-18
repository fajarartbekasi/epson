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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $customer)
                                <tr>
                                    <td>{{$customer->users->first()->name}}</td>
                                    <td>{{$customer->users->first()->address}}</td>
                                    <td>{{$customer->users->first()->phone}}</td>
                                    <td>{{$customer->users->first()->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection