<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoSolicitudController extends Controller
{
    public function create()
    {
        return view('empleados.solicitud.create');
    }

    public function store(Request $request)
    {
        $result = DB::select('EXEC sp_insert_empleado_solicitud ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?', [
            $request->empleado_id,
            $request->empresa,
            $request->nombre_completo,
            $request->puesto,
            $request->num_empleado,
            $request->fecha_ingreso,
            $request->ubicacion,
            $request->huella_checadora,
            $request->celular,
            $request->uniforme_cantidad,
            $request->uniforme_talla,
            $request->correo_corporativo,
            $request->nombre_firma,
            $request->direccion_inmueble,
            $request->poblacion,
            $request->estado,
            $request->codigo_postal,
            $request->pais,
            $request->rfc,
            $request->curp,
        ]);

        $solicitudId = $result[0]->solicitud_id ?? null;

        return redirect()->back()->with('success',"Solicitud creada con ID: {$solicitudId}");
    }
}

