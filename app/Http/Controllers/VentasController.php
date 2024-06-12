<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venta;

class VentasController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'id_cliente' => 'required',
            'id_producto' => 'required',
            'cantidad' => 'required',
        ]);

        $venta = new Venta;
        $venta->id_cliente = $request->id_cliente;
        $venta->id_producto = $request->id_producto;
        $venta->cantidad = $request->cantidad;
        $venta->save();

        return redirect()->route('ventas')->with('success', "Venta creada correactamente");

    }

    public function index() {
        $ventas = Venta::all();
        return view('management.ventas', ['ventas' => $ventas]);
    }

    public function destroy($id) {
        $venta = Venta::find($id);
        $venta->delete();
        return redirect()->route('ventas')->with('success', "Venta eliminada correactamente");
    }
}
