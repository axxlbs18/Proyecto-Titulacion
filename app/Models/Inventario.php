<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $primaryKey = 'id_equipo';
    public $timestamps = false;

    protected $fillable = [
        'tipo',
        'marca',
        'capacidad',
        'modelo',
        'num_serie',
        'estado'
    ];

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class, 'id_equipo', 'id_equipo');
    }
}

