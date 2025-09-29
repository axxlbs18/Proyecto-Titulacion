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
            font-weight: 600;
            background-color: black;
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
             <div class="p-2 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3 text-center fw-semibold">
                Especialista TI
            </div>
        </div>
        
        <nav class="nav nav-pills flex-column p-3">
            <span class="px-3 pt-4 pb-2 text-muted small text-uppercase fw-bold">Gestión Principal</span>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('panelti.crearUsuario') }}" class="nav-link {{ request()->routeIs('panelti.crearUsuario') ? 'active' : '' }}">
                        <i class="bi bi-person-video3"></i>
                        Crear Usuario
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('panelti.administrarResponsivas') }}" class="nav-link {{ request()->routeIs('panelti.administrarResponsivas') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text"></i>
                        Requerimiento Personal
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('panelti.administrarResponsivas') }}" class="nav-link {{ request()->routeIs('panelti.administrarResponsivas') ? 'active' : '' }}">
                        <i class="bi bi-journal-check"></i>
                        Gestionar Responsivas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('panelti.pasesSalida') }}" class="nav-link {{ request()->routeIs('panelti.pasesSalida') ? 'active' : '' }}">
                        <i class="bi bi-calendar-check"></i>
                        Gestionar Pases de Salida
                    </a>
                </li>
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
                <h1 class="h3 fw-bold">Crear cuentas de Usuario</h1>
                <p class="mb-0 text-muted">Administra la información de las cuentas de usuario.</p>
            </div>
            <button class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>
                Nuevo Empleado
            </button>
        </header>

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
            {{-- Formulario para crear cuentas de usuario (reemplaza las cards de ejemplo) --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-3">Registrar nuevo usuario</h5>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                            </div>

                            <div class="col-md-6">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                            </div>

                            <div class="col-md-6">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                            </div>

                            <div class="col-md-6">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                            </div>

                            <div class="col-12">
                                <x-input-label for="role" :value="__('Rol')" />
                                <select id="role" name="role" class="form-select">
                                    <option value="">-- Selecciona un rol --</option>
                                    <option value="ti" {{ old('role') == 'ti' ? 'selected' : '' }}>TI</option>
                                    <option value="rh" {{ old('role') == 'rh' ? 'selected' : '' }}>RH</option>
                                    <option value="empleado" {{ old('role') == 'empleado' ? 'selected' : '' }}>Empleado</option>
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="mt-2 text-danger" />
                            </div>

                            <div class="col-12 d-flex justify-content-end align-items-center">
                                <a class="me-3 text-decoration-underline text-muted" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                                <x-primary-button class="btn btn-primary">
                                    {{ __('Register') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>