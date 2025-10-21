<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestor de Viajes</title>

  <!-- Fuente Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome (íconos) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-jQXhL7m8S8F8dC1JX0H0W1F6Q3s4Pq6f1rW5o1+ZZz0Tn5v6hYF+7R9Lw4C5y9V7Bv9O9R5CkUJg7Wm4qZpXxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #94D7F2;
    }
  </style>
</head>
<body class="bg-[#94D7F2]">

<!-- Header -->
<header class="bg-white shadow-md border-b border-[#5FB6D9] py-4 mb-6">
  <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between px-6">
    
    <!-- Logo / Título -->
    <h1 class="text-2xl font-extrabold text-[#2685BF] tracking-wide mb-3 sm:mb-0">
      <i class="fa-solid fa-bus text-[#3D9DD9] mr-2"></i>Gestor de Reservaciones
    </h1>

    <!-- Controles de sesión -->
    <div class="text-center sm:text-right">
      <?php if(isset($_SESSION['user_name'])): ?>
        <p class="text-[#2685BF] font-medium">
          <i class="fa-solid fa-circle-user text-[#2685BF]"></i>
          <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong>
          (<em><?= htmlspecialchars($_SESSION['role']) ?></em>)
          |
          <a href="?p=logout" class="text-red-500 hover:text-red-600 font-semibold transition">
            <i class="fa-solid fa-right-from-bracket"></i> Salir
          </a>
        </p>
      <?php else: ?>
        <div class="flex flex-col sm:flex-row gap-2 justify-center sm:justify-end">
          <a href="?p=login" 
             class="px-4 py-2 bg-[#2685BF] hover:bg-[#3D9DD9] text-white rounded-lg font-semibold shadow-md transition">
            <i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesión
          </a>
          <a href="?p=register" 
             class="px-4 py-2 bg-[#5FB6D9] hover:bg-[#3D9DD9] text-white rounded-lg font-semibold shadow-md transition">
            <i class="fa-solid fa-user-plus"></i> Registrarse
          </a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</header>
