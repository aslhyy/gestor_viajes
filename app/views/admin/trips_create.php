<?php require __DIR__ . '/../shared/header.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#2685BF] via-[#5FB6D9] to-[#94D7F2] font-[Poppins] px-4 py-10">

  <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-2xl p-8 w-full max-w-2xl border border-white/40 space-y-6">

    <!-- Título -->
    <h2 class="text-3xl font-semibold text-center text-[#2685BF] flex items-center justify-center gap-2">
      <i class="fa-solid fa-bus text-[#2685BF]"></i> Crear viaje (ADMIN)
    </h2>

    <!-- Formulario -->
    <form method="post" action="?p=trips&action=store" class="space-y-5">

      <!-- Título -->
      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-heading text-[#2685BF]"></i> Título:
        </span>
        <input name="titulo" required
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] transition">
      </label>

      <!-- Origen -->
      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-location-arrow text-[#2685BF]"></i> Origen:
        </span>
        <input name="origen"
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] transition">
      </label>

      <!-- Destino -->
      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-map-marker-alt text-[#2685BF]"></i> Destino:
        </span>
        <input name="destino"
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] transition">
      </label>

      <!-- Fecha salida -->
      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-calendar-days text-[#2685BF]"></i> Fecha salida:
        </span>
        <input type="datetime-local" name="fecha_salida"
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] transition">
      </label>

      <!-- Precio -->
      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-dollar-sign text-[#2685BF]"></i> Precio:
        </span>
        <input name="precio" type="number" step="0.01"
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] transition">
      </label>

      <!-- Plazas totales -->
      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-users text-[#2685BF]"></i> Plazas totales:
        </span>
        <input name="plazas_total" type="number"
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] transition">
      </label>

      <!-- Plazas disponibles -->
      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-chair text-[#2685BF]"></i> Plazas disponibles:
        </span>
        <input name="plazas_disponibles" type="number"
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] transition">
      </label>

      <!-- Descripción -->
      <label class="block">
        <span class="text-gray-700 font-medium flex items-center gap-2">
          <i class="fa-solid fa-note-sticky text-[#2685BF]"></i> Descripción:
        </span>
        <textarea name="descripcion"
          class="mt-1 w-full border border-[#94D7F2] rounded-lg px-3 py-2 h-28 resize-none outline-none focus:ring-2 focus:ring-[#94D7F2]/60 focus:border-[#2685BF] transition"></textarea>
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

