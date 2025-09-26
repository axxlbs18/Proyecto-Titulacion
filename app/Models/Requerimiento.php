<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    protected $table = 'requerimientos';
    protected $fillable = ['nombre','descripcion'];

    public function solicitudes()
    {
        return $this->belongsToMany(
            EmpleadoSolicitud::class,
            'empleados_solicitud_requerimientos',
            'requerimiento_id',
            'empleado_solicitud_id'
        );
    }
}
