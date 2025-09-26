<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VAsignacionEmpleado extends Model
{
    use HasFactory;

    /**
     * El nombre de la tabla (o vista) asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'V_Asignaciones_Empleados';

    /**
     * Indica al modelo que no gestione las columnas `created_at` y `updated_at`.
     *
     * @var bool
     */
    public $timestamps = false;
}