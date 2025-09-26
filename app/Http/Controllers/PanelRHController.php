<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
