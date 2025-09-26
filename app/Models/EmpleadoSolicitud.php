<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpleadoSolicitud extends Model
{
    protected $table = 'empleados_solicitud';
    protected $primaryKey = 'id_solicitud';
    public $timestamps = false;

    protected $fillable = [
        'id_empleado',
        'empresa',
        'nombre_completo',
        'puesto',
        'num_empleado',
        'fecha_ingreso',
        'ubicacion',
        'huella_checadora',
        'celular',
        'cantidad_uniformes',
        'talla_uniforme',
        'correo_corporativo',
        'nombre_firma',
        'direccion_inmueble',
        'poblacion',
        'estado',
        'codigo_postal',
        'pais',
        'rfc',
        'curp'
    ];
}
