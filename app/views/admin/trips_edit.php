<?php require __DIR__ . '/../shared/header.php'; ?>
<h2>Editar viaje (ADMIN)</h2>
<form method="post" action="?p=trips&action=update">
  <input type="hidden" name="id" value="<?=htmlspecialchars($trip['id'])?>">
  <label>Título:<br><input name="titulo" value="<?=htmlspecialchars($trip['titulo'])?>"></label><br>
  <label>Origen:<br><input name="origen" value="<?=htmlspecialchars($trip['origen'])?>"></label><br>
  <label>Destino:<br><input name="destino" value="<?=htmlspecialchars($trip['destino'])?>"></label><br>
  <label>Fecha salida:<br><input type="datetime-local" name="fecha_salida" value="<?= $trip['fecha_salida'] ? date('Y-m-d\TH:i', strtotime($trip['fecha_salida'])) : '' ?>"></label><br>
  <label>Precio:<br><input name="precio" value="<?=htmlspecialchars($trip['precio'])?>"></label><br>
  <label>Plazas totales:<br><input name="plazas_total" value="<?=htmlspecialchars($trip['plazas_total'])?>"></label><br>
  <label>Plazas disponibles:<br><input name="plazas_disponibles" value="<?=htmlspecialchars($trip['plazas_disponibles'])?>"></label><br>
  <label>Descripción:<br><textarea name="descripcion"><?=htmlspecialchars($trip['descripcion'])?></textarea></label><br>
  <button type="submit">Actualizar</button>
</form>
<?php require __DIR__ . '/../shared/footer.php'; ?>
