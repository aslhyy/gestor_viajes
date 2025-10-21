<?php require __DIR__ . '/../shared/header.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-[#2685BF] via-[#5FB6D9] to-[#94D7F2] flex flex-col items-center justify-center px-6 py-10 font-[Poppins]">

  <!-- Contenedor principal -->
  <div class="bg-white/80 backdrop-blur-md shadow-2xl rounded-2xl p-8 w-full max-w-5xl border border-white/40">

    <!-- Título -->
    <h2 class="text-3xl font-semibold text-center text-[#2685BF] mb-6 flex items-center justify-center gap-2">
      <i class="fa-solid fa-users-gear text-[#3D9DD9]"></i> Usuarios (ADMIN)
    </h2>

    <!-- Mensaje flash -->
    <?php if($msg=flash_get('success')): ?>
      <p class="text-green-700 bg-green-100 border border-green-300 rounded-lg py-2 px-3 text-sm flex items-center gap-2 mb-4">
        <i class="fa-solid fa-circle-check"></i> <?=htmlspecialchars($msg)?>
      </p>
    <?php endif; ?>

    <!-- Opciones de administrador -->
    <div class="text-center mb-6">
      <a href='?p=users&action=create' 
         class="bg-[#2685BF] hover:bg-[#3D9DD9] text-white font-medium px-4 py-2 rounded-lg shadow-md transition-all duration-200 inline-block mx-2">
         <i class="fa-solid fa-user-plus"></i> Crear usuario
      </a>
    </div>

    <!-- Tabla de usuarios -->
    <div class="overflow-x-auto">
      <table class="min-w-full border border-[#94D7F2] rounded-lg overflow-hidden shadow-md bg-white text-sm">
        <thead class="bg-[#2685BF] text-white uppercase tracking-wide">
          <tr>
            <th class="px-4 py-3 text-left">ID</th>
            <th class="px-4 py-3 text-left">Nombre</th>
            <th class="px-4 py-3 text-left">Email</th>
            <th class="px-4 py-3 text-left">Rol</th>
            <th class="px-4 py-3 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-[#E0F2F8]">
          <?php foreach($users as $u): ?>
            <tr class="hover:bg-[#EAF6FB]/60 transition">
              <td class="px-4 py-3 text-gray-700 font-medium"><?=htmlspecialchars($u['id'])?></td>
              <td class="px-4 py-3 text-gray-700"><?=htmlspecialchars($u['nombre'])?></td>
              <td class="px-4 py-3 text-gray-700"><?=htmlspecialchars($u['email'])?></td>
              <td class="px-4 py-3 font-medium text-[#2685BF]"><?=htmlspecialchars($u['role'])?></td>
              <td class="px-4 py-3 text-center">
                <a href='?p=users&action=edit&id=<?= $u['id'] ?>' 
                   class="text-blue-600 hover:text-blue-800 font-medium transition">
                   <i class="fa-solid fa-pen-to-square"></i> Editar
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require __DIR__ . '/../shared/footer.php'; ?>
