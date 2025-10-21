<?php require __DIR__ . '/../shared/header.php'; ?>

<div class="min-h-[86vh] flex items-center justify-center bg-gradient-to-br from-[#2685BF] via-[#5FB6D9] to-[#94D7F2] font-[Poppins] px-4 py-10">

  <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/40 space-y-6">

    <!-- Título -->
    <h2 class="text-3xl font-semibold text-center text-[#2685BF] flex items-center justify-center gap-2">
      <i class="fa-solid fa-pen-to-square text-[#2685BF]"></i> Editar reserva (CLIENTE)
    </h2>

    <!-- Formulario -->
    <form method="POST" action="?p=reservations_update" class="space-y-5">
      <input type="hidden" name="id" value="<?= htmlspecialchars($reservation['id']) ?>">

      <!-- Viaje -->
      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-plane-departure text-[#2685BF]"></i> Viaje
        </span>
        <select name="viaje_id" disabled
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 bg-gray-100 text-gray-600 outline-none cursor-not-allowed">
          <?php foreach ($trips as $trip): ?>
            <option value="<?= $trip['id'] ?>"
              <?= ($trip['id'] == $reservation['viaje_id']) ? 'selected' : '' ?>>
              <?= htmlspecialchars($trip['destino']) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>

      <!-- Notas -->
      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-clipboard text-[#2685BF]"></i> Notas
        </span>
        <textarea name="notas" rows="4"
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] outline-none transition"><?= htmlspecialchars($reservation['notas']) ?></textarea>
      </label>

      <!-- Botón -->
      <button type="submit"
        class="w-full bg-[#2685BF] hover:bg-[#3D9DD9] text-white font-semibold py-2.5 rounded-lg shadow-md transition-all duration-200 flex items-center justify-center gap-2">
        <i class="fa-solid fa-floppy-disk"></i> Guardar cambios
      </button>
    </form>

  </div>
</div>

<?php require __DIR__ . '/../shared/footer.php'; ?>
