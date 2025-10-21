<?php require __DIR__ . '/header.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-[#2685BF] via-[#5FB6D9] to-[#94D7F2] flex flex-col items-center justify-center px-6 py-10 font-[Poppins]">

  <!-- Contenedor principal -->
  <div class="bg-white/80 backdrop-blur-md shadow-2xl rounded-2xl p-8 w-full max-w-5xl border border-white/40">
    
    <!-- Título -->
    <h2 class="text-3xl font-semibold text-center text-[#2685BF] mb-6 flex items-center justify-center gap-2">
      <i class="fa-solid fa-bus text-[#3D9DD9]"></i> Listado de viajes
    </h2>

    <!-- Opciones de administrador -->
    <?php if(isset($_SESSION['role']) && $_SESSION['role']==='ADMIN'): ?>
      <p class="text-center mb-6">
        <a href='?p=trips&action=create' 
           class="bg-[#2685BF] hover:bg-[#3D9DD9] text-white font-medium px-4 py-2 rounded-lg shadow-md transition-all duration-200 inline-block mx-2">
           <i class="fa-solid fa-plus-circle"></i> Crear viaje
        </a>
        <a href='?p=users' 
           class="bg-[#5FB6D9] hover:bg-[#3D9DD9] text-white font-medium px-4 py-2 rounded-lg shadow-md transition-all duration-200 inline-block mx-2">
           <i class="fa-solid fa-users-gear"></i> Gestionar usuarios
        </a>
      </p>
    <?php endif; ?>

    <!-- Tabla de viajes -->
    <div class="overflow-x-auto">
      <table class="min-w-full border border-[#94D7F2] rounded-lg overflow-hidden shadow-md bg-white">
        <thead class="bg-[#2685BF] text-white text-sm uppercase tracking-wide">
          <tr>
            <th class="px-4 py-3 text-left">ID</th>
            <th class="px-4 py-3 text-left">Título</th>
            <th class="px-4 py-3 text-left">Origen</th>
            <th class="px-4 py-3 text-left">Destino</th>
            <th class="px-4 py-3 text-left">Salida</th>
            <th class="px-4 py-3 text-left">Precio</th>
            <th class="px-4 py-3 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-[#E0F2F8]">
          <?php foreach($trips as $t): ?>
            <tr class="hover:bg-[#EAF6FB]/60 transition">
              <td class="px-4 py-3 text-gray-700 font-medium"><?= htmlspecialchars($t['id']) ?></td>
              <td class="px-4 py-3 text-gray-700"><?= htmlspecialchars($t['titulo']) ?></td>
              <td class="px-4 py-3 text-gray-700"><?= htmlspecialchars($t['origen']) ?></td>
              <td class="px-4 py-3 text-gray-700"><?= htmlspecialchars($t['destino']) ?></td>
              <td class="px-4 py-3 text-gray-700"><?= htmlspecialchars($t['fecha_salida']) ?></td>
              <td class="px-4 py-3 text-gray-700">$<?= htmlspecialchars($t['precio']) ?></td>
              <td class="px-4 py-3 text-center">
                <?php if(isset($_SESSION['role']) && $_SESSION['role']==='ADMIN'): ?>
                  <a href='?p=trips&action=edit&id=<?= $t['id'] ?>' 
                     class="text-blue-600 hover:text-blue-800 font-medium transition">
                     <i class="fa-solid fa-pen-to-square"></i> Editar
                  </a>
                  <span class="mx-2 text-gray-400">|</span>
                  <a href='?p=trips&action=delete&id=<?= $t['id'] ?>' 
                     onclick="return confirm('Eliminar?')" 
                     class="text-red-500 hover:text-red-700 font-medium transition">
                     <i class="fa-solid fa-trash"></i> Borrar
                  </a>
                <?php else: ?>
                  <a href='?p=reservations&action=create&viaje_id=<?= $t['id'] ?>' 
                     class="text-[#2685BF] hover:text-[#3D9DD9] font-semibold transition">
                     <i class="fa-solid fa-ticket"></i> Reservar
                  </a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Enlace a reservas -->
    <div class="text-center mt-6">
      <a href='?p=reservations' 
         class="inline-flex items-center gap-2 text-[#2685BF] hover:text-[#3D9DD9] font-medium transition">
        <i class="fa-solid fa-calendar-check"></i> Ver Reservas
      </a>
    </div>

  </div>
</div>

<?php require __DIR__ . '/footer.php'; ?>
