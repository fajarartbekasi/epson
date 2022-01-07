<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::whereHas('roles', function($roles){
            $roles->whereNotIn('roles.name', ['customer']);
        })->latest()->paginate(6);

        return view('user.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();

        return view('user.create', compact('roles'));
    }
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
            flash()->success('Anggota baru berhasil ditambahkan');
        } else {
            flash()->error('Tidak dapat menambahkan pengguna baru');
        }


        return redirect()->route('petugas');
    }
    public function edit($id)
    {
        $data = [
            'user'   => User::findOrFail($id),
            'roles'     => Role::pluck('name', 'id'),
        ];
        return view('user.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required',
            'address'   => 'required',
            'phone'     => 'required',
            'password'  => 'required',
        ]);

        if (auth()->user()->id == $id) {
            flash('Peringatan ! Pembaruan pengguna yang saat ini masuk tidak diizinkan,
                   silahkan menggunakan fitur pengaturan.')->warning();
            return redirect()->back();
        }

        $user = User::findOrFail($id);
        $user->fill($request->except('roles', 'password'));

        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();
        $user->syncRoles($request->get('roles'));

        flash()->success('Data penguna berhasil di perbaharui');

        return redirect()->back();
    }
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->delete($request->all());

        flash()->success('Anggota berhasil di hapus');

        return redirect()->route('petugas');
    }
    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);

        return $user;
    }
}
