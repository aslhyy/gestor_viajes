<?php require __DIR__ . '/../shared/header.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#2685BF] via-[#5FB6D9] to-[#94D7F2] font-[Poppins] px-4 py-10">

  <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-2xl p-8 w-full max-w-lg space-y-6 border border-white/40">

    <!-- Título -->
    <h2 class="text-3xl font-semibold text-center text-[#2685BF] flex items-center justify-center gap-2">
      <i class="fa-solid fa-pen-to-square text-[#2685BF]"></i> Editar reserva (EMPLEADO)
    </h2>

    <!-- Formulario -->
    <form method="post" action="?p=reservations&action=update" class="space-y-5">
      <input type="hidden" name="id" value="<?= htmlspecialchars($reservation['id']) ?>">

      <!-- Viaje -->
      <label for="viaje_id" class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-route text-[#2685BF]"></i> Viaje:
        </span>
        <select name="viaje_id" id="viaje_id"
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] outline-none transition">
          <?php foreach($trips as $t): ?>
            <option value="<?= $t['id'] ?>" <?= $t['id']==$reservation['viaje_id'] ? 'selected' : '' ?>>
              <?= htmlspecialchars($t['titulo']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>

      <!-- Pasajeros -->
      <label for="pasajeros" class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-users text-[#2685BF]"></i> Pasajeros:
        </span>
        <input name="pasajeros" id="pasajeros" value="<?= htmlspecialchars($reservation['pasajeros']) ?>"
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] outline-none transition">
      </label>

      <!-- Total -->
      <label for="total" class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-dollar-sign text-[#2685BF]"></i> Total:
        </span>
        <input name="total" id="total" value="<?= htmlspecialchars($reservation['total']) ?>"
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] outline-none transition">
      </label>

      <!-- Estado -->
      <label for="estado" class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-flag text-[#2685BF]"></i> Estado:
        </span>
        <select name="estado" id="estado"
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] outline-none transition">
          <option <?= $reservation['estado']=='PENDIENTE' ? 'selected':'' ?>>PENDIENTE</option>
          <option <?= $reservation['estado']=='CONFIRMADA' ? 'selected':'' ?>>CONFIRMADA</option>
          <option <?= $reservation['estado']=='CANCELADA' ? 'selected':'' ?>>CANCELADA</option>
        </select>
      </label>

      <!-- Notas -->
      <label for="notas" class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-note-sticky text-[#2685BF]"></i> Notas:
        </span>
        <textarea name="notas" id="notas"
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 h-28 resize-none focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] outline-none transition"><?= htmlspecialchars($reservation['notas']) ?></textarea>
      </label>

      <!-- Botón -->
      <button type="submit"
        class="w-full bg-[#2685BF] hover:bg-[#3D9DD9] text-white font-semibold py-2.5 rounded-lg shadow-md transition-all duration-200 flex items-center justify-center gap-2">
        <i class="fa-solid fa-floppy-disk"></i> Actualizar
      </button>
    </form>

  </div>
</div>

<?php require __DIR__ . '/../shared/footer.php'; ?>
