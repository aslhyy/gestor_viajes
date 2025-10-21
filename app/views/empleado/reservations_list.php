<?php require __DIR__ . '/../shared/header.php'; ?>

<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-[#2685BF] via-[#5FB6D9] to-[#94D7F2] font-[Poppins] px-4 py-10">

  <!-- Contenedor principal -->
  <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-2xl p-8 w-full max-w-5xl border border-white/40 space-y-6">

    <!-- Título -->
    <h2 class="text-3xl font-bold text-center text-[#2685BF] flex items-center justify-center gap-2">
      <i class="fa-solid fa-calendar-check text-[#2685BF]"></i> Reservas (EMPLEADO)
    </h2>

    <!-- Tabla de reservas -->
    <div class="overflow-x-auto">
      <table class="min-w-full border border-[#94D7F2] divide-y divide-[#94D7F2] text-sm text-center bg-white rounded-lg shadow-md">
        <thead class="bg-[#2685BF] text-white text-sm uppercase tracking-wide">
          <tr>
            <th class="px-4 py-3 text-left">ID</th>
            <th class="px-4 py-3 text-left">Usuario</th>
            <th class="px-4 py-3 text-left">Viaje</th>
            <th class="px-4 py-3 text-left">Pasajeros</th>
            <th class="px-4 py-3 text-left">Total</th>
            <th class="px-4 py-3 text-left">Estado</th>
            <th class="px-4 py-3 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-[#E0F2F8]">
          <?php foreach($reservas as $r): ?>
            <tr class="hover:bg-[#EAF6FB]/60 transition">
              <td class="px-4 py-2 text-gray-700"><?=htmlspecialchars($r['id'])?></td>
              <td class="px-4 py-2 text-gray-700"><?=htmlspecialchars($r['cliente'])?></td>
              <td class="px-4 py-2 text-gray-700"><?=htmlspecialchars($r['viaje'])?></td>
              <td class="px-4 py-2 text-gray-700"><?=htmlspecialchars($r['pasajeros'])?></td>
              <td class="px-4 py-2 text-gray-700">$<?=htmlspecialchars($r['total'])?></td>
              <td class="px-4 py-2 font-medium text-[#2685BF]"><?=htmlspecialchars($r['estado'])?></td>
              <td class="px-4 py-2 text-center">
                <a href='?p=reservations&action=edit&id=<?= $r['id'] ?>' 
                   class="text-[#2685BF] hover:text-[#3D9DD9] font-semibold underline transition">
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
