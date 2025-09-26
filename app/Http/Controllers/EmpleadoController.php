<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    public function create()
    {
        return view('panelrh.empleados.create');
    }

    public function store(Request $request)
    {
        DB::statement('EXEC sp_insert_empleado ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?', [
            $request->num_empleado,
            $request->CIA,
            $request->Localidad,
            $request->Estado,
            $request->Pais,
            $request->inmueble,
            $request->Apellido_Paterno,
            $request->Apellido_Materno,
            $request->Nombre,
            $request->Puesto,
            $request->Nombre_Completo,
            $request->Area,
            $request->Departamento,
            $request->RFC,
            $request->CURP,
            $request->NSS,
            $request->fecha_ingreso,
            $request->Sexo,
            $request->Fecha_Nacimiento,
            $request->Correo_Corporativo,
            $request->Extension,
            $request->Correo_Personal
        ]);

        return redirect()->back()->with('success','Empleado creado correctamente');
    }
}
