<?php require __DIR__ . '/../shared/header.php'; ?>

<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-[#2685BF] via-[#5FB6D9] to-[#94D7F2] font-[Poppins] px-6 py-10">

  <!-- Contenedor principal -->
  <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-2xl p-8 w-full max-w-6xl border border-white/40">
    
    <!-- Título -->
    <h2 class="text-3xl font-semibold text-center text-[#2685BF] mb-8 flex items-center justify-center gap-2">
      <i class="fa-solid fa-clipboard-user text-[#2685BF]"></i> Reservas (EMPLEADO)
    </h2>

    <!-- Tabla -->
    <div class="overflow-x-auto">
      <table class="min-w-full text-sm text-gray-700 border border-[#94D7F2] rounded-lg overflow-hidden shadow-md">
        <thead class="bg-[#2685BF] text-white uppercase text-xs">
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
        <tbody class="bg-white divide-y divide-[#E2F2F8]">
          <?php foreach($reservas as $r): ?>
            <tr class="hover:bg-[#F0FAFF] transition">
              <td class="px-4 py-3"><?=htmlspecialchars($r['id'])?></td>
              <td class="px-4 py-3"><?=htmlspecialchars($r['cliente'])?></td>
              <td class="px-4 py-3"><?=htmlspecialchars($r['viaje'])?></td>
              <td class="px-4 py-3"><?=htmlspecialchars($r['pasajeros'])?></td>
              <td class="px-4 py-3 font-semibold text-[#2685BF]">$<?=htmlspecialchars($r['total'])?></td>
              <td class="px-4 py-3">
                <span class="px-2 py-1 rounded-full text-xs font-medium
                  <?= $r['estado'] == 'CONFIRMADO' ? 'bg-green-100 text-green-700' : 
                      ($r['estado'] == 'CANCELADO' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') ?>">
                  <?=htmlspecialchars($r['estado'])?>
                </span>
              </td>
              <td class="px-4 py-3 text-center">
                <a href='?p=reservations&action=edit&id=<?= $r['id'] ?>' 
                  class="text-[#2685BF] hover:text-[#1a6a96] font-medium transition">
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
