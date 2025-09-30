<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PanelTIController;
use App\Http\Controllers\PanelRHController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EmpleadoSolicitudController;

// 🔹 Raíz: si no está autenticado → login, si ya está logueado → manda al panel según su rol
Route::get('/', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $user = Auth::user();

    return match ($user->role) {
        'ti' => redirect()->route('panelti.index'),
        'rh' => redirect()->route('panelrh.index'),
        'empleado' => redirect()->route('panelempleados.index'),
        default => redirect()->route('login'),
    };
});

// 🔹 Rutas protegidas (solo usuarios autenticados y verificados)
Route::middleware(['auth', 'verified'])->group(function () {

    // Panel TI
    Route::get('/panelti', [PanelTIController::class, 'index'])->name('panelti.index');
    Route::get('/panelti/crear-usuario', [PanelTIController::class, 'crearUsuario'])
    ->name('panelti.crearUsuario');

Route::post('/panelti/crear-usuario', [PanelTIController::class, 'storeUsuario'])
    ->name('panelti.storeUsuario');


Route::get('/panelti/{id}/editar', [PanelTIController::class, 'editarUsuario'])
    ->name('panelti.editarUsuario');

Route::put('/panelti/{id}', [PanelTIController::class, 'actualizarUsuario'])
    ->name('panelti.actualizarUsuario');

Route::delete('/panelti/{id}', [PanelTIController::class, 'eliminarUsuario'])
    ->name('panelti.eliminarUsuario');
    Route::get('/panelti/administrarResponsivas', [PanelTIController::class, 'administrarResponsivas'])->name('panelti.administrarResponsivas');
    Route::get('/panelti/administrarRequerimientos', [PanelTIController::class, 'administrarRequerimientos'])->name('panelti.administrarRequerimientos');
    Route::post('/panelti/asignar-equipo', [PanelTIController::class, 'asignarEquipo'])->name('panelti.asignarEquipo');
    Route::get('/panelti/generar-responsiva/{id_empleado}', [PanelTIController::class, 'generarResponsiva'])->name('panelti.generarResponsiva');
    Route::get('/panelti/pases-salida', [PanelTIController::class, 'pasesSalida'])->name('panelti.pasesSalida');

    // Panel RH
    Route::get('/panelrh', function () {
        return view('panelrh.index');
    })->name('panelrh.index');

    // Requerimientos/solicitudes
    Route::get('/panelrh/requerimiento/create', [EmpleadoSolicitudController::class, 'create'])->name('empleados.solicitud.create');
    Route::post('/panelrh/requerimiento/store', [EmpleadoSolicitudController::class, 'store'])->name('empleados.solicitud.store');

    // Panel Empleados
    Route::get('/panelempleados', function () {
        return view('panelempleados.index');
    })->name('panelempleados.index');
});

// 🔹 AJAX
Route::get('/obtener-inmuebles', [PanelRHController::class, 'obtenerInmuebles']);
Route::get('/obtener-domicilio', [PanelRHController::class, 'obtenerDomicilio']);

// 🔹 Rutas de autenticación por defecto (login, logout, register, etc.)
require __DIR__ . '/auth.php';