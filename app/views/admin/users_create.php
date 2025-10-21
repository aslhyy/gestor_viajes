<?php require __DIR__ . '/../shared/header.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#2685BF] via-[#5FB6D9] to-[#94D7F2] font-[Poppins] px-6 py-10">

  <!-- Contenedor -->
  <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/40">

    <!-- Título -->
    <h2 class="text-3xl font-semibold text-center text-[#2685BF] mb-6 flex items-center justify-center gap-2">
      <i class="fa-solid fa-user-plus text-[#2685BF]"></i> Crear usuario (ADMIN)
    </h2>

    <!-- Mensaje de error -->
    <?php if($err=flash_get('error')): ?>
      <p class="text-red-600 bg-red-100 rounded-lg py-2 px-3 text-sm mb-4 flex items-center gap-2">
        <i class="fa-solid fa-circle-exclamation"></i> <?=htmlspecialchars($err)?>
      </p>
    <?php endif; ?>

    <!-- Formulario -->
    <form method="post" action="?p=users&action=store" class="space-y-5">

      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-user text-[#2685BF]"></i> Nombre
        </span>
        <input name="nombre" required
          class="mt-1 w-full border border-[#94D7F2] focus:border-[#2685BF] focus:ring-2 focus:ring-[#94D7F2]/60 rounded-lg px-3 py-2 outline-none transition" />
      </label>

      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-envelope text-[#2685BF]"></i> Email
        </span>
        <input name="email" type="email" required
          class="mt-1 w-full border border-[#94D7F2] focus:border-[#2685BF] focus:ring-2 focus:ring-[#94D7F2]/60 rounded-lg px-3 py-2 outline-none transition" />
      </label>

      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-lock text-[#2685BF]"></i> Contraseña
        </span>
        <input name="password" type="password" required
          class="mt-1 w-full border border-[#94D7F2] focus:border-[#2685BF] focus:ring-2 focus:ring-[#94D7F2]/60 rounded-lg px-3 py-2 outline-none transition" />
      </label>

      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-id-badge text-[#2685BF]"></i> Rol
        </span>
        <select name="role"
          class="mt-1 w-full border border-[#94D7F2] focus:border-[#2685BF] focus:ring-2 focus:ring-[#94D7F2]/60 rounded-lg px-3 py-2 outline-none transition">
          <?php foreach($roles as $r): ?>
            <option value="<?=htmlspecialchars($r['nombre'])?>"><?=htmlspecialchars($r['nombre'])?></option>
          <?php endforeach; ?>
        </select>
      </label>

      <button type="submit"
        class="w-full bg-[#2685BF] hover:bg-[#3D9DD9] text-white font-semibold py-2.5 rounded-lg transition-all duration-200 flex items-center justify-center gap-2">
        <i class="fa-solid fa-user-check"></i> Crear
      </button>

    </form>

  </div>
</div>

<?php require __DIR__ . '/../shared/footer.php'; ?>
