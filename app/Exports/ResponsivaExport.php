<?php

namespace App\Exports;

use App\Models\Empleado;
use App\Models\Asignacion;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ResponsivaExport implements WithEvents
{
    protected $empleado;

    public function __construct(Empleado $empleado)
    {
        $this->empleado = $empleado;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Datos del empleado
                $sheet->setCellValue('B3', $this->empleado->nombre);
                $sheet->setCellValue('B4', $this->empleado->puesto);

                // Cargar asignaciones
                $asignaciones = Asignacion::with('equipo')
                    ->where('id_empleado', $this->empleado->id_empleado)
                    ->get();

                $row = 7; // fila donde empiezan los equipos en tu plantilla
                foreach ($asignaciones as $asignacion) {
                    $sheet->setCellValue("A{$row}", $asignacion->equipo->tipo);
                    $sheet->setCellValue("B{$row}", $asignacion->equipo->marca);
                    $sheet->setCellValue("C{$row}", $asignacion->equipo->modelo);
                    $sheet->setCellValue("D{$row}", $asignacion->equipo->num_serie);
                    $row++;
                }
            },
        ];
    }
}
