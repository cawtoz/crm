<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Correo;
use Illuminate\Support\Facades\Auth;


class CorreosController extends Controller
{

    public function store(Request $request) {

        $request->validate([
            'para' => 'required',
            'asunto' => 'required',
            'contenido' => 'required',
        ]);

        $correo = new Correo;
        $correo->de = Auth::user()->email;
        $correo->para = $request->para;
        $correo->asunto = $request->asunto;
        $correo->contenido = $request->contenido;
        $correo->save();
        return redirect()->route('correos')->with('success', "Correo creado correactamente");
    }

    public function index() {
        $correos = Correo::all();
        return view('management.correos', ['correos' => $correos]);
    }

    public function destroy($id) {
        $correo = Correo::find($id);
        $correo->delete();
        return redirect()->route('correos')->with('success', "Correo eliminado correactamente");
    }


}
