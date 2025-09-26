<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema de Gestión de Responsivas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
    header.bg-gradient {
        background: #dc2626;
    }

    footer {
        background: #dc2626;
    }
    </style>
</head>

<body class="bg-light d-flex flex-column min-vh-100">

    <!-- HEADER -->
    <header class="bg-gradient text-white shadow-sm py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('icons/MIMPO.png') }}" alt="MIMPO Global Logistics" width="120" height="40"/>
                <div class="d-none d-md-block border-start border-white opacity-25" style="height:32px;"></div>
                <div>
                    <h1 class="h4 fw-bold mb-0">Sistema de Gestión de Responsivas</h1>
                    <small class="text-light opacity-75">y Autorización de Equipos</small>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <i class="bi bi-bell-fill fs-4 text-white opacity-75" role="button" title="Notificaciones"></i>
                <div class="bg-white bg-opacity-25 rounded-circle p-2 d-flex align-items-center justify-content-center"
                    style="width:32px; height:32px;">
                    <i class="bi bi-list text-white fs-5"></i>
                </div>
            </div>
        </div>
    </header>


    <main class="flex-grow-1 d-flex flex-column justify-content-center align-items-center">

        <!-- Píldora de sistema activo -->
        <div class="text-center mb-4">
            <span
                class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill d-inline-flex align-items-center gap-2">
                <span class="spinner-grow spinner-grow-sm text-danger" role="status" aria-hidden="true"></span>
                Sistema Activo
            </span>
        </div>

        <!-- CARD PRINCIPAL -->
        <div class="card shadow" style="width: 550px; border-radius: 12px; overflow: hidden;">

            <div style="background-color: #dc2626; color: white; padding: 30px; text-align: center;">
                <span
                    style="background-color: rgba(255,255,255,0.2); padding: 5px 12px; border-radius: 20px; font-size: 14px;">
                    <i class="bi bi-circle-fill" style="color: #ffbaba; font-size: 10px;"></i> Sistema Activo
                </span>
                <h3 class="mt-3 mb-1">Portal de Gestión Corporativa</h3>
                <p class="mb-0">Accede al sistema con tus credenciales corporativas</p>
            </div>

            <div class="card-body text-center">
                <h5 class="mb-4">Áreas del Sistema</h5>

                <div class="d-flex justify-content-around mb-4">
                    <div class="text-center">
                        <div style="background-color:#f44336; padding:15px; border-radius:8px; color:white;">
                            <i class="bi bi-gear" style="font-size: 24px;"></i>
                        </div>
                        <small>TI</small>
                    </div>
                    <div class="text-center">
                        <div style="background-color:#1976d2; padding:15px; border-radius:8px; color:white;">
                            <i class="bi bi-people" style="font-size: 24px;"></i>
                        </div>
                        <small>RRHH</small>
                    </div>
                    <div class="text-center">
                        <div style="background-color:#455a64; padding:15px; border-radius:8px; color:white;">
                            <i class="bi bi-person-badge" style="font-size: 24px;"></i>
                        </div>
                        <small>Empleados</small>
                    </div>
                </div>

                <a class="btn btn-danger w-75" href="{{ route('login') }}" role="button">
                    <i class="bi bi-box-arrow-in-right"></i> Acceder al Sistema
                </a>

                <p class="text-muted mt-3" style="font-size: 12px;">
                    Serás redirigido automáticamente a tu área según tus credenciales
                </p>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-gradient text-white py-3 mt-auto">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <div class="d-flex align-items-center gap-3">
                <img src="{{ asset('/icons/MIMPO.png') }}" alt="MIMPO" width="80" height="25" />
                <small class="fw-semibold">MIMPO GLOBAL LOGISTICS</small>
            </div>
            <div class="d-flex flex-wrap justify-content-center justify-content-md-end gap-3 small opacity-75">
                <span>Grupo MIMPO 2024</span>
                <span>|</span>
                <a href="#" class="text-white text-decoration-none opacity-75 hover-opacity-100">Política de
                    privacidad</a>
                <span>|</span>
                <a href="#" class="text-white text-decoration-none opacity-75 hover-opacity-100">Política de cookies</a>
                <span>|</span>
                <a href="#" class="text-white text-decoration-none opacity-75 hover-opacity-100">Aviso Legal</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>