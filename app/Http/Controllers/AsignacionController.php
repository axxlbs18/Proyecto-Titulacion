<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\VAsignacionEmpleado;

class AsignacionController extends Controller
{
    public function index(Request $request)
    {

        $empleadoId = $request->input('id_empleado_busqueda');

        
        $query = VAsignacionEmpleado::query();

        
        if ($empleadoId) {
            $query->where('id_empleado', $empleadoId);
        }

        
        $asignaciones = $query->get();

       
        return view('asignaciones.index', [
            'asignaciones' => $asignaciones,
            'busqueda'     => $empleadoId
        ]);
    }
}