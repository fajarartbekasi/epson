<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function ($roles) {
            $roles->whereNotIn('roles.name', ['admin','direktur']);
        })->latest()->paginate(6);

        return view('user.customer.index', compact('users'));
    }
    public function edit($id)
    {
        $data = [
            'user'   => User::findOrFail($id),
            'roles'     => Role::pluck('name', 'id'),
        ];
        return view('user.edit', $data);
    }
}
