<?php require __DIR__ . '/../shared/header.php'; ?>

<!-- Fuentes e íconos -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- Tailwind CDN -->
<script src='https://cdn.tailwindcss.com'></script>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#2685BF] via-[#5FB6D9] to-[#94D7F2] font-[Poppins] px-4">
  <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-2xl p-8 w-full max-w-md space-y-6 border border-white/40">
    
    <h2 class="text-3xl font-semibold text-center text-[#2685BF] flex items-center justify-center gap-2">
      <i class="bi bi-person-plus text-[#2685BF]"></i> Registro
    </h2>

    <?php if(!empty($error)): ?>
      <p class="text-red-600 bg-red-100 rounded-lg py-2 px-3 text-sm flex items-center gap-2">
        <i class="bi bi-exclamation-triangle-fill"></i> <?= htmlspecialchars($error) ?>
      </p>
    <?php endif; ?>

    <form method="post" action="?p=register" class="space-y-5">
      
      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="bi bi-person text-[#2685BF]"></i> Nombre
        </span>
        <input type="text" name="nombre" required
          class="mt-1 w-full border border-[#94D7F2] focus:border-[#2685BF] focus:ring-2 focus:ring-[#94D7F2]/60 rounded-lg px-3 py-2 outline-none transition">
      </label>

      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="bi bi-envelope text-[#2685BF]"></i> Email
        </span>
        <input type="email" name="email" required
          class="mt-1 w-full border border-[#94D7F2] focus:border-[#2685BF] focus:ring-2 focus:ring-[#94D7F2]/60 rounded-lg px-3 py-2 outline-none transition">
      </label>

      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="bi bi-lock text-[#2685BF]"></i> Contraseña
        </span>
        <input type="password" name="password" required
          class="mt-1 w-full border border-[#94D7F2] focus:border-[#2685BF] focus:ring-2 focus:ring-[#94D7F2]/60 rounded-lg px-3 py-2 outline-none transition">
      </label>

      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="bi bi-person-badge text-[#2685BF]"></i> Rol
        </span>
        <select name="role"
          class="mt-1 w-full border border-[#94D7F2] focus:border-[#2685BF] focus:ring-2 focus:ring-[#94D7F2]/60 rounded-lg px-3 py-2 outline-none transition">
          <?php foreach($roles as $r): ?>
            <option value="<?= htmlspecialchars($r) ?>"><?= htmlspecialchars($r) ?></option>
          <?php endforeach; ?>
        </select>
      </label>

      <button type="submit"
        class="w-full bg-[#2685BF] hover:bg-[#3D9DD9] text-white font-semibold py-2.5 rounded-lg transition-all duration-200 flex items-center justify-center gap-2">
        <i class="bi bi-person-plus"></i> Registrar
      </button>

      <p class="text-center text-sm text-gray-600 mt-4">
        ¿Ya tienes una cuenta?
        <a href='?p=login' class="text-[#2685BF] hover:text-[#3D9DD9] font-medium transition">
          <i class="bi bi-box-arrow-in-right"></i> Iniciar sesión
        </a>
      </p>
    </form>
  </div>
</div>

<?php require __DIR__ . '/../shared/footer.php'; ?>
