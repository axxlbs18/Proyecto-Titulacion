<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PanelTIController extends Controller
{
    /**
     * Panel principal de TI (solo carga empleados, sin relaciones pendientes)
     */
    public function index()
    {
        $empleados = Empleado::all(); // Sin relaciones aún
        return view('panelti.index', compact('empleados'));
    }

    /**
     * Mostrar formulario para crear usuario
     */
    public function crearUsuario()
    {
        $empleados = Empleado::all();
        return view('panelti.crear-usuario', compact('empleados'));
    }

    /**
     * Guardar un nuevo usuario asociado a un empleado
     */
    public function storeUsuario(Request $request, Empleado $empleado)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'rol' => 'required'
        ]);

        User::create([
            'name' => $empleado->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->rol, // Cambié 'rol' a 'role' para coincidir con tu Auth
        ]);

        return redirect()->route('panelti.index')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Mostrar requerimientos y asignar equipo
     * (temporal: solo devuelve vista vacía)
     */
    public function administrarResponsivas()
    {
        return view('panelti.administrar-responsivas'); // Sin requerimientos por ahora
    }

    /**
     * Guardar asignación de equipo a un requerimiento
     * (temporal: solo retorna la vista)
     */
    public function asignarEquipo(Request $request)
    {
        // Solo retorno de prueba
        return redirect()->route('panelti.administrarResponsivas')->with('success', 'Función no implementada en pruebas.');
    }

    /**
     * Generar responsiva
     * (temporal: sin Excel, solo retorna vista)
     */
    public function generarResponsiva($id_empleado)
    {
        return view('panelti.generar-responsiva'); // vista temporal
    }

    /**
     * Pases de salida
     */
    public function pasesSalida()
    {
        return view('panelti.pases-salida'); // vista temporal
    }
}
