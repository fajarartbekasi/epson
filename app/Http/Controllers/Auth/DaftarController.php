<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftarController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required',
            'address'   => 'required',
            'phone'     => 'required',
            'password'  => 'required',
        ]);

        $request->merge(['password' => bcrypt($request->get('password'))]);

        if ($user = User::create($request->except('roles'))) {
            $user->syncRoles($request->get('roles'));
            flash()->success('Selamat akun anda berhasil dibuat');
        } else {
            flash()->error('Tidak dapat menambahkan customer baru');
        }


        return redirect()->route('login');
    }
}
