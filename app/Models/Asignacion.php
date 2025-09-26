<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $table = 'asignaciones';
    protected $primaryKey = 'id_asignacion';
    public $timestamps = false;

    protected $fillable = [
        'id_empleado',
        'id_equipo',
        'fecha_asignacion'
    ];

    public function equipo()
    {
        return $this->belongsTo(Inventario::class, 'id_equipo', 'id_equipo');
    }
}

