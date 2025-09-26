<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    public $timestamps = false;

    protected $fillable = [
        'num_empleado',
        'Apellido_Paterno',
        'Apellido_Materno',
        'Nombre',
        'Puesto',
        'fecha_ingreso',
        'Area',
        'Departamento',
        'RFC',
        'CURP',
        'NSS'
    ];
}
