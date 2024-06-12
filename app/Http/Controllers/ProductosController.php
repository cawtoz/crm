<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductosController extends Controller
{

    public function store(Request $request) {

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'color' => 'required',
            'talla' => 'required',
            'material' => 'required'
        ]);

        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->color = $request->color;
        $producto->talla = $request->talla;
        $producto->material = $request->material;
        $producto->save();

        return redirect()->route('productos')->with('success', "Producto creado correactamente");

    }

    public function index() {
        $productos = Producto::all();
        return view('management.productos', ['productos' => $productos]);
    }

    public function destroy($id) {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('productos')->with('success', "Producto eliminado correactamente");
    }

}
