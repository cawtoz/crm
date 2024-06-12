<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller
{

    public function store(Request $request) {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'rol' => 'required',
            'nombre' => 'required',
            'correo' => 'required|email',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $usuario = new Usuario;
        $usuario->username = $request->username;
        $usuario->password = bcrypt($request->password);
        $usuario->rol = $request->rol;
        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('profile_images', 'public');
        } else {
            $imagePath = '/assets/static/images/faces/2.jpg';
        }

        $usuario->save();

        return redirect()->route('usuarios')->with('success', "Usuario creado correactamente");

    }

    public function index() {
        $usuarios = Usuario::all();
        return view('management.usuarios', ['usuarios' => $usuarios]);
    }

    public function destroy($id) {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect()->route('usuarios')->with('success', "Usuario eliminado correactamente");
    }


}
