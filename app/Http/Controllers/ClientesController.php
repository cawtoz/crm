<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{

    public function store(Request $request) {

        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'pais' => 'required'
        ]);

        $cliente = new Cliente;
        $cliente->nombre = $request->nombre;
        $cliente->correo = $request->correo;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->ciudad = $request->ciudad;
        $cliente->pais = $request->pais;
        $cliente->save();

        return redirect()->route('clientes')->with('success', "Cliente creado correactamente");

    }

    public function index() {
        $clientes = Cliente::all();
        return view('management.clientes', ['clientes' => $clientes]);
    }

    public function destroy($id) {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('clientes')->with('success', "Cliente eliminado correactamente");
    }


}
