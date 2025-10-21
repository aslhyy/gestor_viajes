<?php require __DIR__ . '/../shared/header.php'; ?>

<div class="min-h-[86vh] flex flex-col items-center justify-center bg-gradient-to-br from-[#2685BF] via-[#5FB6D9] to-[#94D7F2] font-[Poppins] px-4 py-10">

  <!-- Contenedor principal -->
  <div class="bg-white/90 backdrop-blur-md border border-white/40 shadow-2xl rounded-2xl p-8 max-w-xl w-full text-center space-y-6">

    <!-- Título -->
    <h2 class="text-3xl font-bold text-[#2685BF] flex items-center justify-center gap-2">
      <i class="fa-solid fa-user-gear text-[#2685BF]"></i> Panel ADMIN
    </h2>

    <!-- Enlaces de navegación -->
    <p class="text-lg text-gray-700 font-medium flex flex-col sm:flex-row items-center justify-center gap-3">
      <a href='?p=trips' 
         class="text-white bg-[#2685BF] hover:bg-[#3D9DD9] px-5 py-2 rounded-lg transition shadow-md flex items-center gap-2">
        <i class="fa-solid fa-route"></i> Gestionar viajes
      </a>
      <a href='?p=users' 
         class="text-white bg-[#5FB6D9] hover:bg-[#3D9DD9] px-5 py-2 rounded-lg transition shadow-md flex items-center gap-2">
        <i class="fa-solid fa-users"></i> Gestionar usuarios
      </a>
      <a href='?p=reservations' 
         class="text-white bg-[#94D7F2] hover:bg-[#5FB6D9] px-5 py-2 rounded-lg transition shadow-md flex items-center gap-2">
        <i class="fa-solid fa-ticket"></i> Ver reservas
      </a>
    </p>
  </div>
</div>

<?php require __DIR__ . '/../shared/footer.php'; ?>

