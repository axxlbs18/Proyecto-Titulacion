<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de TI</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
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
        font-weight: 600;
        background-color: black;
    }

    .nav-link .bi {
        margin-right: 0.75rem;
    }

    .card {
        border: 1px solid #dee2e6;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, .075);
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
                <div
                    class="p-2 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3 text-center fw-semibold">
                    Especialista TI
                </div>
            </div>

            <nav class="nav nav-pills flex-column p-3">
                <span class="px-3 pt-4 pb-2 text-muted small text-uppercase fw-bold">Gestión Principal</span>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('panelti.index') }}"
                            class="nav-link {{ request()->routeIs('panelti.index') ? 'active' : '' }}">
                            <i class="bi bi-person-video3"></i> Usuarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('panelti.administrarRequerimientos') }}"
                            class="nav-link {{ request()->routeIs('panelti.administrarRequerimientos') ? 'active' : '' }}">
                            <i class="bi bi-file-earmark-text"></i> Requerimiento Personal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('panelti.administrarResponsivas') }}"
                            class="nav-link {{ request()->routeIs('panelti.administrarResponsivas') ? 'active' : '' }}">
                            <i class="bi bi-journal-check"></i> Gestionar Responsivas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('panelti.pasesSalida') }}"
                            class="nav-link {{ request()->routeIs('panelti.pasesSalida') ? 'active' : '' }}">
                            <i class="bi bi-calendar-check"></i> Gestionar Pases de Salida
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="mt-auto p-3 border-top">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link text-start w-100 p-0">
                        <i class="bi bi-box-arrow-left"></i> Cerrar Sesión
                    </button>
                </form>
            </div>
        </aside>

        <main class="main-content p-4">
            <header class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom">
                <div class="d-flex align-items-center">
                    <span class="p-2 bg-danger rounded-3 me-2">
                        <i class="bi bi-person text-white fs-5"></i>
                    </span>
                    <h1 class="h3 fw-bold mb-0">Gestión de Requerimientos</h1>
                </div>

            </header>

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card mb-4">
                <div class="card-header d-flex align-items-center" style="background-color: #fee6e6;">
                    <span class="p-2 rounded-3 me-2">
                        <i class="bi bi-people fs-4"></i>
                    </span>
                    <h5 class="mb-0 fw-bold text-dark">Requerimientos de Personal</h5>
                </div>

                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-3">Usuarios registrados</h5>

                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>

    </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>