<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignaciones de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Listado de Asignaciones</h1>
        <p>Datos obtenidos directamente desde la vista de la base de datos.</p>

        <div class="card card-body mb-4">
            <form action="{{ route('asignaciones.index') }}" method="GET" class="row">
                <div class="col-md-4">
                    <label for="id_empleado_busqueda" class="form-label">Buscar por ID de Empleado:</label>
                    <input type="text" name="id_empleado_busqueda" id="id_empleado_busqueda" class="form-control"
                        placeholder="Escribe el ID aquí..." value="{{ $busqueda ?? '' }}">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                </div>
            </form>
        </div>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
            </thead>
            <tbody>
                @forelse ($asignaciones as $asignacion)
                <tr>
                    <td>{{ $asignacion->id_empleado }}</td>
                    <td>{{ $asignacion->nombre_requerimiento }}</td>
                    <td><span class="badge bg-secondary">{{ $asignacion->tipo }}</span></td>
                    <td>{{ $asignacion->fecha_asignacion }}</td>
                    <td>{{ $asignacion->detalle }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">
                        @if ($busqueda)
                        No se encontraron asignaciones para el ID de empleado: <strong>{{ $busqueda }}</strong>.
                        @else
                        No hay asignaciones para mostrar.
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>