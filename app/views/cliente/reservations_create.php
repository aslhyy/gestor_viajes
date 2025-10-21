<?php require __DIR__ . '/../shared/header.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#2685BF] via-[#5FB6D9] to-[#94D7F2] font-[Poppins] px-6 py-10">

  <!-- Contenedor principal -->
  <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/40">

    <!-- Título -->
    <h2 class="text-3xl font-semibold text-center text-[#2685BF] mb-6 flex items-center justify-center gap-2">
      <i class="fa-solid fa-ticket text-[#2685BF]"></i> Crear reserva
    </h2>

    <!-- Formulario -->
    <form method="post" action="?p=reservations&action=store" class="space-y-5">

      <?php if(isset($_SESSION['role']) && $_SESSION['role']==='ADMIN'): ?>
        <label class="block">
          <span class="text-gray-700 font-medium flex items-center gap-2">
            <i class="fa-solid fa-user text-[#2685BF]"></i> Usuario (ID)
          </span>
          <input name="usuario_id" type="number" placeholder="ID usuario (opcional)"
            class="mt-1 w-full border border-[#94D7F2] focus:border-[#2685BF] focus:ring-2 focus:ring-[#94D7F2]/60 rounded-lg px-3 py-2 outline-none transition" />
        </label>
      <?php endif; ?>

      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-route text-[#2685BF]"></i> Viaje
        </span>
        <select name="viaje_id"
          class="mt-1 w-full border border-[#94D7F2] focus:border-[#2685BF] focus:ring-2 focus:ring-[#94D7F2]/60 rounded-lg px-3 py-2 outline-none transition">
          <?php foreach($trips as $t): ?>
            <option value="<?= $t['id'] ?>">
              <?=htmlspecialchars($t['titulo'])?> (<?=htmlspecialchars($t['origen'])?> → <?=htmlspecialchars($t['destino'])?>)
            </option>
          <?php endforeach; ?>
        </select>
      </label>

      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-user-group text-[#2685BF]"></i> Pasajeros
        </span>
        <input name="pasajeros" type="number" value="1"
          class="mt-1 w-full border border-[#94D7F2] focus:border-[#2685BF] focus:ring-2 focus:ring-[#94D7F2]/60 rounded-lg px-3 py-2 outline-none transition" />
      </label>

      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-dollar-sign text-[#2685BF]"></i> Total
        </span>
        <input name="total" type="number" step="0.01"
          class="mt-1 w-full border border-[#94D7F2] focus:border-[#2685BF] focus:ring-2 focus:ring-[#94D7F2]/60 rounded-lg px-3 py-2 outline-none transition" />
      </label>

      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-clipboard text-[#2685BF]"></i> Notas
        </span>
        <textarea name="notas" rows="3"
          class="mt-1 w-full border border-[#94D7F2] focus:border-[#2685BF] focus:ring-2 focus:ring-[#94D7F2]/60 rounded-lg px-3 py-2 outline-none transition resize-none"></textarea>
      </label>

      <button type="submit"
        class="w-full bg-[#2685BF] hover:bg-[#3D9DD9] text-white font-semibold py-2.5 rounded-lg transition-all duration-200 flex items-center justify-center gap-2">
        <i class="fa-solid fa-check-circle"></i> Reservar
      </button>

    </form>

  </div>
</div>

<?php require __DIR__ . '/../shared/footer.php'; ?>
