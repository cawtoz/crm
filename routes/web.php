<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\CorreosController;

Route::get('/', [VisitasController::class, 'index']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', function () {
        $credenciales = request()->only('email', 'password');
        if (Auth::attempt($credenciales)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->withErrors(['email' => 'Credenciales incorrectas']);
    })->name('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/management/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/management/usuarios', [UsersController::class, 'index'])->name('usuarios');
    Route::post('/management/usuarios', [UsersController::class, 'store'])->name('usuarios');
    Route::delete('/management/usuarios/{id}', [UsersController::class, 'destroy'])->name('usuarios-destroy');

    Route::get('/management/clientes', [ClientesController::class, 'index'])->name('clientes');
    Route::post('/management/clientes', [ClientesController::class, 'store'])->name('clientes');
    Route::delete('/management/clientes/{id}', [ClientesController::class, 'destroy'])->name('clientes-destroy');

    Route::get('/management/productos', [ProductosController::class, 'index'])->name('productos');
    Route::post('/management/productos', [ProductosController::class, 'store'])->name('productos');
    Route::delete('/management/productos/{id}', [ProductosController::class, 'destroy'])->name('productos-destroy');

    Route::get('/management/ventas', [VentasController::class, 'index'])->name('ventas');
    Route::post('/management/ventas', [VentasController::class, 'store'])->name('ventas');
    Route::delete('/management/ventas/{id}', [VentasController::class, 'destroy'])->name('ventas-destroy');

    Route::get('/management/correos', [CorreosController::class, 'index'])->name('correos');
    Route::post('/management/correos', [CorreosController::class, 'store'])->name('correos');
    Route::delete('/management/correos/{id}', [CorreosController::class, 'destroy'])->name('correos-destroy');

});
