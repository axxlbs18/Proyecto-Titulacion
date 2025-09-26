@extends('layouts.app')

@section('content')
<div class="container">

    {{-- ==================== FORM EMPLEADO ==================== --}}
    <h2 class="mb-4">Registrar Empleado</h2>
    <form method="POST" action="{{ route('empleados.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Número de Empleado</label>
                <input type="text" name="num_empleado" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>CIA</label>
                <input type="text" name="CIA" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Localidad</label>
                <input type="text" name="Localidad" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Estado</label>
                <input type="text" name="Estado" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>País</label>
                <input type="text" name="Pais" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Inmueble</label>
                <input type="text" name="inmueble" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Apellido Paterno</label>
                <input type="text" name="Apellido_Paterno" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Apellido Materno</label>
                <input type="text" name="Apellido_Materno" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Nombre</label>
                <input type="text" name="Nombre" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Puesto</label>
                <input type="text" name="Puesto" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Nombre Completo</label>
                <input type="text" name="Nombre_Completo" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Área</label>
                <input type="text" name="Area" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Departamento</label>
                <input type="text" name="Departamento" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>RFC</label>
                <input type="text" name="RFC" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>CURP</label>
                <input type="text" name="CURP" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>NSS</label>
                <input type="text" name="NSS" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Fecha Ingreso</label>
                <input type="date" name="fecha_ingreso" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Sexo</label>
                <select name="Sexo" class="form-control">
                    <option value="">Seleccione</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Fecha Nacimiento</label>
                <input type="date" name="Fecha_Nacimiento" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Correo Corporativo</label>
                <input type="email" name="Correo_Corporativo" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Extensión</label>
                <input type="text" name="Extension" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label>Correo Personal</label>
            <input type="email" name="Correo_Personal" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Empleado</button>
    </form>

    <hr class="my-5">

    {{-- ==================== FORM SOLICITUD ==================== --}}
    <h2 class="mb-4">Registrar Solicitud</h2>
    <form method="POST" action="{{ route('empleados_solicitud.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>ID Empleado</label>
                <input type="number" name="empleado_id" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Empresa</label>
                <input type="text" name="empresa" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Puesto</label>
                <input type="text" name="puesto" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Nombre Completo</label>
                <input type="text" name="nombre_completo" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Número Empleado</label>
                <input type="text" name="num_empleado" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Fecha Ingreso</label>
                <input type="date" name="fecha_ingreso" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Ubicación</label>
                <input type="text" name="ubicacion" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Huella Checadora</label>
                <select name="huella_checadora" class="form-control">
                    <option value="0">No</option>
                    <option value="1">Sí</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label>Celular</label>
                <select name="celular" class="form-control">
                    <option value="0">No</option>
                    <option value="1">Sí</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Cantidad Uniformes</label>
                <input type="number" name="uniforme_cantidad" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label>Talla Uniforme</label>
                <input type="text" name="uniforme_talla" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Correo Corporativo</label>
                <input type="email" name="correo_corporativo" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label>Nombre en Firma</label>
                <input type="text" name="nombre_firma" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label>Dirección Inmueble</label>
            <input type="text" name="direccion_inmueble" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Población</label>
                <input type="text" name="poblacion" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Estado</label>
                <input type="text" name="estado" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label>Código Postal</label>
                <input type="text" name="codigo_postal" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>País</label>
                <input type="text" name="pais" class="form-control">
            </div>
            <div class="col-md-3 mb-3">
                <label>RFC</label>
                <input type="text" name="rfc" class="form-control">
            </div>
            <div class="col-md-3 mb-3">
                <label>CURP</label>
                <input type="text" name="curp" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Guardar Solicitud</button>
    </form>

    <hr class="my-5">

    {{-- ==================== FORM REQUERIMIENTOS ==================== --}}
    <h2 class="mb-4">Asignar Requerimientos</h2>
    <form method="POST" action="{{ route('requerimientos.asignar') }}">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>ID Solicitud</label>
                <input type="number" name="empleado_solicitud_id" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Seleccionar Requerimientos:</label><br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="requerimientos[]" value="1">
                <label class="form-check-label">Laptop</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="requerimientos[]" value="2">
                <label class="form-check-label">Monitor</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="requerimientos[]" value="3">
                <label class="form-check-label">Mouse</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="requerimientos[]" value="4">
                <label class="form-check-label">Paquetería</label>
            </div>
        </div>

        <button type="submit" class="btn btn-warning">Asignar Requerimientos</button>
    </form>
</div>
@endsection
