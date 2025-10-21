<?php require __DIR__ . '/../shared/header.php'; ?>

<div class="min-h-[86vh]  flex items-center justify-center bg-gradient-to-br from-[#2685BF] via-[#5FB6D9] to-[#94D7F2] font-[Poppins] px-4 py-10">

  <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/40 space-y-6">

    <!-- Título -->
    <h2 class="text-3xl font-semibold text-center text-[#2685BF] flex items-center justify-center gap-2">
      <i class="fa-solid fa-user-pen text-[#2685BF]"></i> Editar usuario (ADMIN)
    </h2>

    <!-- Formulario -->
    <form method="post" action="?p=users&action=update" class="space-y-5">
      <input type="hidden" name="id" value="<?=htmlspecialchars($user['id'])?>">

      <!-- Nombre -->
      <p class="text-gray-700 font-medium flex items-center gap-2">
        <i class="fa-solid fa-id-card text-[#2685BF]"></i> 
        Nombre: <span class="font-semibold text-[#2685BF]"><?=htmlspecialchars($user['nombre'])?></span>
      </p>

      <!-- Email -->
      <p class="text-gray-700 font-medium flex items-center gap-2">
        <i class="fa-solid fa-envelope text-[#2685BF]"></i> 
        Email: <span class="font-semibold text-[#2685BF]"><?=htmlspecialchars($user['email'])?></span>
      </p>

      <!-- Rol -->
      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-user-shield text-[#2685BF]"></i> Rol:
        </span>
        <select name="role" 
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] outline-none transition bg-white">
          <?php foreach($roles as $r): ?>
            <option value="<?=htmlspecialchars($r['nombre'])?>" <?= $r['nombre']==$user['role_name'] ? 'selected':'' ?>>
              <?=htmlspecialchars($r['nombre'])?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>

      <!-- Botón -->
      <button type="submit"
        class="w-full bg-[#2685BF] hover:bg-[#3D9DD9] text-white font-semibold py-2.5 rounded-lg shadow-md transition-all duration-200 flex items-center justify-center gap-2">
        <i class="fa-solid fa-floppy-disk"></i> Guardar
      </button>
    </form>

  </div>
</div>

<?php require __DIR__ . '/../shared/footer.php'; ?>

