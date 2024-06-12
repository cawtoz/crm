<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    public function store(Request $request) {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'correo' => 'required|email',
            'rol' => 'required',
        ]);

        User::factory()->create(['name' => $request->username, 'password' => $request->password, 'email' => $request->correo, 'rol' => $request->rol]);
        return redirect()->route('usuarios')->with('success', "Usuario creado correactamente");

    }

    public function index() {
        $usuarios = User::all();
        return view('management.usuarios', ['usuarios' => $usuarios]);
    }

    public function destroy($id) {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route('usuarios')->with('success', "Usuario eliminado correactamente");
    }


}
