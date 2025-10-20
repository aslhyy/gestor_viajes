<?php require __DIR__ . '/../shared/header.php'; ?>
<h2>Editar reserva (EMPLEADO)</h2>
<form method="post" action="?p=reservations&action=update">
  <input type="hidden" name="id" value="<?=htmlspecialchars($reservation['id'])?>">
  <label>Viaje:<br><select name="viaje_id"><?php foreach($trips as $t): ?><option value="<?= $t['id'] ?>" <?= $t['id']==$reservation['viaje_id'] ? 'selected' : '' ?>><?=htmlspecialchars($t['titulo'])?></option><?php endforeach;?></select></label><br>
  <label>Pasajeros:<br><input name="pasajeros" value="<?=htmlspecialchars($reservation['pasajeros'])?>"></label><br>
  <label>Total:<br><input name="total" value="<?=htmlspecialchars($reservation['total'])?>"></label><br>
  <label>Estado:<br><select name="estado"><option <?= $reservation['estado']=='PENDIENTE' ? 'selected':'' ?>>PENDIENTE</option><option <?= $reservation['estado']=='CONFIRMADA' ? 'selected':'' ?>>CONFIRMADA</option><option <?= $reservation['estado']=='CANCELADA' ? 'selected':'' ?>>CANCELADA</option></select></label><br>
  <label>Notas:<br><textarea name="notas"><?=htmlspecialchars($reservation['notas'])?></textarea></label><br>
  <button type="submit">Actualizar</button>
</form>
<?php require __DIR__ . '/../shared/footer.php'; ?>
