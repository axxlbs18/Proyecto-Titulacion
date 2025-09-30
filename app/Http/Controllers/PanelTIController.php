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
        $usuarios = User::all(); // Para listar usuarios en el panel
        return view('panelti.index', compact('empleados', 'usuarios'));
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
            'password' => 'required|confirmed|min:6',
            'rol' => 'required|in:ti,rh,empleado'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->rol, // Se guarda el rol
        ]);

        return redirect()->route('panelti.index')->with('success', 'Usuario creado correctamente ✅');
    }

    /**
     * Editar usuario
     */
    public function editarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        return view('panelti.editar-usuario', compact('usuario'));
    }

    /**
     * Actualizar usuario
     */
    public function actualizarUsuario(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users,email,'.$usuario->id],
            'password' => ['nullable','confirmed','min:6'],
            'rol' => ['required','in:ti,rh,empleado'],
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->role = $request->rol;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->route('panelti.index')->with('success','Usuario actualizado correctamente ✨');
    }

    /**
     * Eliminar usuario
     */
    public function eliminarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('panelti.index')->with('success','Usuario eliminado correctamente 🗑️');
    }

    /**
     * Mostrar requerimientos y asignar equipo
     * (temporal: solo devuelve vista vacía)
     */
    public function administrarResponsivas()
    {
        return view('panelti.administrarResponsivas'); // Sin requerimientos por ahora
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

    public function administrarRequerimientos()
    {
        return view('panelti.administrarRequerimientos'); // Sin requerimientos por ahora
    }
}
