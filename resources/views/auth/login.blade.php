<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inicia Sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      background-color: #feefef;
    }

    .logo-container {
      background-color: white;
      padding: 1rem;
      border-radius: 1rem;
      margin-top: -3rem;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      display: inline-block;
    }

    .icon-circle {
      width: 60px;
      height: 60px;
      background-color: #dc2626;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 1rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      margin: -2.5rem auto 1rem auto;
      position: relative;
      z-index: 1;
    }

    .icon-circle i {
      font-size: 1.5rem;
      color: white;
    }

    .card-custom {
      width: 100%;
      max-width: 480px;
      border-radius: 1rem;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
      background-color: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(4px);
    }
  </style>
</head>

<body class="text-center py-5">

  {{-- Logo --}}
  <div class="logo-container mb-4">
    <img src="{{ asset('icons/MIMPO.png') }}" alt="MIMPO Global Logistics" width="120" />
  </div>

  <h2 class="fw-bold">Bienvenido.</h2>
  <p class="text-secondary">Sistema de Alta de Empleados y Control de Responsivas.</p>

  <div class="container d-flex justify-content-center">
    <div class="card card-custom p-4">

      {{-- Icono de seguridad --}}
      <div class="icon-circle">
        <i class="bi bi-shield-lock-fill"></i>
      </div>

      <h4 class="fw-bold text-dark">Iniciar Sesión</h4>
      <p class="text-muted mb-1">Ingresa tus credenciales.</p>
      <span class="badge text-danger border border-danger">Acceso Restringido</span>

      {{-- Errores de validación --}}
      @if ($errors->any())
        <div class="alert alert-danger mt-4">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
      @endif

      {{-- Formulario Laravel --}}
      <form method="POST" action="{{ route('login') }}" class="mt-4 text-start">
        @csrf

        {{-- Email --}}
        <div class="mb-3">
          <label for="email" class="form-label">Correo Electrónico</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <input type="email" id="email" name="email" class="form-control" placeholder="admin@mimpo.com" value="{{ old('email') }}" required autofocus>
          </div>
        </div>

        {{-- Password --}}
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
              <i class="bi bi-eye" id="eyeIcon"></i>
            </button>
          </div>
        </div>

        <button type="submit" class="btn btn-danger w-100">Iniciar Sesión</button>
      </form>

    </div>
  </div>

  <script>
    const toggleBtn = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");

    toggleBtn.addEventListener("click", () => {
      const isPassword = passwordInput.type === "password";
      passwordInput.type = isPassword ? "text" : "password";
      eyeIcon.classList.toggle("bi-eye");
      eyeIcon.classList.toggle("bi-eye-slash");
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
