<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Panel de Administración - Sistema de Gestión de Responsivas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body { margin:0; font-family: Arial, sans-serif; }
        .sidebar {
            width: 300px; background: #fff; position: fixed; height: 100%; box-shadow: 0 2px 5px rgba(0,0,0,.1);
            display: flex; flex-direction: column; align-items: center;
        }
        .sidebar .header { background:#e0ecfd; width:100%; padding:20px; text-align:center; }
        .sidebar .header h5 { font-size:20px; color:#000; margin-bottom:5px; }
        .sidebar h6 { font-size:14px; color:#6c757d; margin:20px 0; text-transform:uppercase; }
        .sidebar a { display:flex; flex-direction:column; align-items:center; justify-content:center;
            color:black; padding:16px; text-decoration:none; border-radius:12px; width:80%; margin-bottom:10px;
            transition:background-color .3s ease; box-shadow:0 1px 3px rgba(0,0,0,.1);
        }
        .sidebar a:hover { background:#e8f5e9; }
        .content { margin-left:320px; padding:20px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="header">
            <h5><i class="bi bi-people-fill"></i> <b>Panel RRHH</b></h5>
            <p class="badge rounded-pill bg-primary">Recursos Humanos</p>
        </div>
        <h6>Gestión Principal</h6>
        <a class="usuario" href="{{ route('panelrh.requerimiento') }}">
            <i class="bi bi-send-arrow-up"></i> Requerimiento de Personal
        </a>
        <a class="create" href="#"><i class="bi bi-file-earmark-plus"></i> Crear Responsiva</a>
        <a class="admin" href="#"><i class="bi bi-folder"></i> Administrar Responsivas</a>
        <a class="pases" href="#"><i class="bi bi-box-arrow-up"></i> Pases de Salida</a>
    </div>

    <div class="content">
        <h2><b>Requerimiento de Personal</b></h2>
        <p class="text-secondary">Enviar solicitud de equipos y configuración a TI</p>

        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0"><span class="text-primary"><i class="bi bi-send-arrow-up-fill"></i> Datos Básicos del Empleado</span></h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Organización *</label>
                            <select name="organizacion" id="organizacion" class="form-control" required>
                                <option value="">Seleccione una organización</option>
                                @foreach($organizaciones as $org)
                                    <option value="{{ $org->ID_Organizacion }}">{{ $org->Nombre_Organizacion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Inmueble *</label>
                            <select name="inmuebles" id="inmuebles" class="form-control" required>
                                <option value="">Seleccione un inmueble</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label">Domicilio *</label>
                            <select name="domicilio" id="domicilio" class="form-control" required>
                                <option value="">Seleccione un domicilio</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Nombre completo *</label>
                            <input type="text" name="nombre_completo" class="form-control" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script>
document.getElementById("organizacion").addEventListener("change", function() {
    let id = this.value;
    fetch(`/obtener-inmuebles?ID_Organizacion=${id}`)
        .then(res => res.json())
        .then(data => {
            let inmuebles = document.getElementById("inmuebles");
            inmuebles.innerHTML = "<option value=''>Seleccione un inmueble</option>";
            data.forEach(item => {
                inmuebles.innerHTML += `<option value="${item.ID_Inmueble}">${item.Nombre_Inmueble}</option>`;
            });
        });
});

document.getElementById("inmuebles").addEventListener("change", function() {
    let id = this.value;
    fetch(`/obtener-domicilio?ID_Inmueble=${id}`)
        .then(res => res.json())
        .then(data => {
            let domicilio = document.getElementById("domicilio");
            domicilio.innerHTML = "<option value=''>Seleccione un domicilio</option>";
            data.forEach(item => {
                domicilio.innerHTML += `<option value="${item.ID_Domicilio}">${item.Domicilio}</option>`;
            });
        });
});
</script>
</body>
</html>
