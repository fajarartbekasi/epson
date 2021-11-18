<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $users = Role::with('users')->where('name','customer')->latest()->paginate(5);
        return view('user.customer.index', compact('users'));
    }
}
