<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de TI</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Estilos personalizados para ajustar el layout y colores */
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 280px;
            min-height: 100vh;
            background-color: #ffffff;
        }
        .main-content {
            flex: 1;
            overflow-y: auto;
        }
        .nav-link {
            color: #495057;
            padding: 0.8rem 1.25rem;
            font-size: 0.95rem;
        }
        .nav-link:hover {
            color: red;
            background-color: #e9ecef;
        }
        .nav-link.active {
            color: #fff2e1;
            background-color: #e7f1ff;
            font-weight: 600;
        }
        .nav-link .bi {
            margin-right: 0.75rem;
        }
        .card {
            border: 1px solid #dee2e6;
            box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,.075);
        }
        .status-badge {
            font-size: 0.75em;
            font-weight: 600;
            padding: 0.3em 0.6em;
        }

    </style>
</head>
<body>

<div class="d-flex">
    <aside class="sidebar border-end d-flex flex-column flex-shrink-0">
        <div class="p-3 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="p-2 bg-danger rounded-3 me-2">
                    <i class="bi bi-laptop text-white fs-5"></i>
                </span>
                <span class="fs-4 fw-bold">Panel TI</span>
            </a>
        </div>
        
        <div class="p-3">
             <div class="p-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 text-center fw-semibold">
                Especialista TI
            </div>
        </div>
        
        <nav class="nav nav-pills flex-column p-3">
            <span class="px-3 pt-4 pb-2 text-muted small text-uppercase fw-bold">Gestión Principal</span>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link active"><i class="bi bi-person-video3"></i>Crear Usuario</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-file-earmark-text"></i> Requerimiento Personal</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-journal-check"></i> Gestionar Responsivas</a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-calendar-check"></i> Gestionar Pases de Salida</a></li>
            </ul>
        </nav>
        
        <div class="mt-auto p-3 border-top">
            {{-- Logout: use POST to hit Laravel's logout route and include CSRF token --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-link nav-link text-start w-100 p-0">
                    <i class="bi bi-box-arrow-left"></i>
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </aside>

    <main class="main-content p-4">
        <header class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom">
            <div>
                <h1 class="h3 fw-bold">Gestión de Empleados</h1>
                <p class="mb-0 text-muted">Administra la información de todos los empleados</p>
            </div>
            <button class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                Nuevo Empleado
            </button>
        </header>

        <section class="row g-4 mb-4">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Total Empleados</h6>
                        <p class="card-text fs-2 fw-semibold">10</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Empleados Activos</h6>
                        <p class="card-text fs-2 fw-semibold">9</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Responsivas Activas</h6>
                        <p class="card-text fs-2 fw-semibold">12</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Equipos Asignados</h6>
                        <p class="card-text fs-2 fw-semibold">25</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-3">Filtros y Búsqueda</h5>
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label for="search" class="form-label">Buscar</label>
                        <input type="text" id="search" placeholder="Nombre, ID o puesto" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="department" class="form-label">Departamento</label>
                        <select id="department" class="form-select">
                            <option selected>Todos los departamentos</option>
                            <option>Tecnología</option>
                            <option>Administración</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="status" class="form-label">Estado</label>
                        <select id="status" class="form-select">
                            <option selected>Todos los estados</option>
                            <option>Activo</option>
                            <option>Inactivo</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                         <div class="p-2 fw-semibold text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 text-center">
                            10 empleados
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="vstack gap-3">
            {{-- Aquí es donde harías un bucle con tus datos, por ejemplo: @foreach($employees as $employee) --}}

            <div class="card">
                <div class="card-body p-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                           <div class="p-3 bg-light rounded-circle"><i class="bi bi-person fs-2 text-primary"></i></div>
                        </div>
                        <div class="col-lg">
                            <div class="row">
                                <div class="col-lg-3">
                                    <small class="text-muted"><strong>EMP-001</strong></small>
                                    <span class="badge rounded-pill text-bg-success ms-1 status-badge">Activo</span>
                                    <h6 class="mb-0 fw-bold">Juan Pérez García</h6>
                                    <small class="text-muted">Desarrollador Senior</small>
                                </div>
                                <div class="col-lg-2">
                                    <small class="text-muted">Departamento</small>
                                    <p class="mb-0">Tecnología</p>
                                </div>
                                <div class="col-lg-3">
                                    <small class="text-muted">Contacto</small>
                                    <p class="mb-0 small">229-123-4567 / juan.perez@miempu.com</p>
                                </div>
                                <div class="col-lg-2">
                                    <small class="text-muted">Laboral</small>
                                    <p class="mb-0 small">Ingreso: 2023-01-15</p>
                                </div>
                                <div class="col-lg-2">
                                    <small class="text-muted">Asignaciones</small>
                                    <p class="mb-0 small">2 responsivas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-auto">
                            <div class="d-grid d-lg-flex gap-2">
                                <button class="btn btn-sm btn-outline-secondary">Ver</button>
                                <button class="btn btn-sm btn-primary">Editar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                           <div class="p-3 bg-light rounded-circle"><i class="bi bi-person fs-2 text-primary"></i></div>
                        </div>
                        <div class="col-lg">
                            <div class="row">
                                <div class="col-lg-3">
                                    <small class="text-muted"><strong>EMP-002</strong></small>
                                    <span class="badge rounded-pill text-bg-success ms-1 status-badge">Activo</span>
                                    <h6 class="mb-0 fw-bold">Maria López Hernandez</h6>
                                    <small class="text-muted">Contadora</small>
                                </div>
                                <div class="col-lg-2">
                                    <small class="text-muted">Departamento</small>
                                    <p class="mb-0">Administración</p>
                                </div>
                                <div class="col-lg-3">
                                    <small class="text-muted">Contacto</small>
                                    <p class="mb-0 small">229-654-3210 / maria.lopez@miempu.com</p>
                                </div>
                                <div class="col-lg-2">
                                    <small class="text-muted">Laboral</small>
                                    <p class="mb-0 small">Ingreso: 2022-03-20</p>
                                </div>
                                <div class="col-lg-2">
                                    <small class="text-muted">Asignaciones</small>
                                    <p class="mb-0 small">1 responsiva</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-auto">
                             <div class="d-grid d-lg-flex gap-2">
                                <button class="btn btn-sm btn-outline-secondary">Ver</button>
                                <button class="btn btn-sm btn-primary">Editar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Aquí terminaría el bucle: @endforeach --}}
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>