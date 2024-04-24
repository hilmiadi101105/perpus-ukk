<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    $roles = Role::all();
    return view('user.user_index',compact('users','roles'));
  }

  public function create()
  {
    
    $roles=Role::all(); //mengambil semua role untuk form
    return view('buku.user_create',compact('roles'));//tampilkan form create user
  }

  public function store(Request $request)
  {
    $request->validate([
        'name' => 'required|string|max:225',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
        'roles' => 'required|array', //memastikan input roles adalah array
    ]);

    $user = new  User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();

    $user->assignRole($request->roles);//memberikan role yang sipilih kepada user
    return \redirect()->route('users.index')->with('succes','user berhasil ditambahkan');
  }
  public function delete($id)
     {
       User::find($id)->delete();
      return redirect('/user');
     }

  // public function edit($id)
  // {
  //     $user = User::findOrFail($id);
  //     $roles = Role::all();
  //     return view('buku.user_edit', compact('user', 'roles'));
  // }

  public function update(Request $request, $id)
  {
      $request->validate([
          
          'nama' => 'required',
          'email' => 'required',
          'role' => 'required',
          
          
      ]);

}
}