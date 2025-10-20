<?php require __DIR__ . '/../shared/header.php'; ?>
<h2>Crear viaje (ADMIN)</h2>
<form method="post" action="?p=trips&action=store">
  <label>Título:<br><input name="titulo" required></label><br>
  <label>Origen:<br><input name="origen"></label><br>
  <label>Destino:<br><input name="destino"></label><br>
  <label>Fecha salida:<br><input type="datetime-local" name="fecha_salida"></label><br>
  <label>Precio:<br><input name="precio" type="number" step="0.01"></label><br>
  <label>Plazas totales:<br><input name="plazas_total" type="number"></label><br>
  <label>Plazas disponibles:<br><input name="plazas_disponibles" type="number"></label><br>
  <label>Descripción:<br><textarea name="descripcion"></textarea></label><br>
  <button type="submit">Guardar</button>
</form>
<?php require __DIR__ . '/../shared/footer.php'; ?>
