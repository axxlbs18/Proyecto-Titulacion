<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PanelRHController extends Controller
{
    public function requerimiento()
    {
        $organizaciones = DB::table('organizacion')
            ->select('ID_Organizacion', 'Nombre_Organizacion')
            ->orderBy('Nombre_Organizacion', 'ASC')
            ->get();

        return view('panelrh.requerimiento', compact('organizaciones'));
    }

    // Endpoints para AJAX
    public function obtenerInmuebles(Request $request)
    {
        $inmuebles = DB::table('inmuebles')
            ->where('ID_Organizacion', $request->ID_Organizacion)
            ->orderBy('Nombre_Inmueble', 'ASC')
            ->get();

        return response()->json($inmuebles);
    }

    public function obtenerDomicilio(Request $request)
    {
        $domicilios = DB::table('detalles_inmuebles')
            ->where('ID_Inmueble', $request->ID_Inmueble)
            ->get();

        return response()->json($domicilios);
    }

     public function store(Request $request)
    {
        $request->validate([
            'num_empleado'      => 'required|string|unique:empleados,num_empleado', // Clave única
            'Nombre'            => 'required|string|max:255',
            'Apellido_Paterno'  => 'required|string|max:255',
            'Apellido_Materno'  => 'required|string|max:255',
            'Correo_Corporativo'=> 'nullable|email|unique:empleados,Correo_Corporativo', // Opcional pero único
            'RFC'               => 'nullable|string|size:13|unique:empleados,RFC',
            'CURP'              => 'nullable|string|size:18|unique:empleados,CURP',
            'NSS'               => 'nullable|string|size:11',
            'fecha_ingreso'     => 'required|date',
            'Fecha_Nacimiento'  => 'nullable|date',
            'Sexo'              => 'nullable|in:M,F,O',
        ]);

        Empleado::create([
            'num_empleado'      => $request->num_empleado,
            'CIA'               => $request->CIA,
            'Localidad'         => $request->Localidad,
            'Nombre'            => $request->Nombre,
            'Apellido_Paterno'  => $request->Apellido_Paterno,
            'Apellido_Materno'  => $request->Apellido_Materno,
            'Nombre_Completo'   => $request->Nombre_Completo,
            'Puesto'            => $request->Puesto,
            'RFC'               => $request->RFC,
            'CURP'              => $request->CURP,
            'NSS'               => $request->NSS,
            'fecha_ingreso'     => $request->fecha_ingreso,
            'Fecha_Nacimiento'  => $request->Fecha_Nacimiento,
            'Sexo'              => $request->Sexo,
            'Correo_Corporativo'=> $request->Correo_Corporativo,
            'Correo_Personal'   => $request->Correo_Personal,
        ]);

        return redirect()->route('panelrh.index')->with('success', 'Usuario creado correctamente ✅');
    }

}
