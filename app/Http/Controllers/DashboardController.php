<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Correo;
use App\Models\Visita;

class DashboardController extends Controller
{
    public function index() {
        $ventas = Venta::all();
        $clientes = Cliente::all();
        $productos = Producto::all();
        $correos = Correo::all();
        $visitas = Visita::all();
        return view('management.dashboard', compact('ventas', 'clientes', 'productos', 'correos', 'visitas'));
    }
}
