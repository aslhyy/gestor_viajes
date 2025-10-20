<?php require __DIR__ . '/../shared/header.php'; ?>
<h2>Crear reserva</h2>
<form method="post" action="?p=reservations&action=store">
  <?php if(isset($_SESSION['role']) && $_SESSION['role']==='ADMIN'): ?>
    <label>Usuario (id):<br><input name="usuario_id" type="number" placeholder="ID usuario (opcional)"></label><br>
  <?php endif; ?>
  <label>Viaje:<br><select name="viaje_id"><?php foreach($trips as $t): ?><option value="<?= $t['id'] ?>"><?=htmlspecialchars($t['titulo'])?> (<?=htmlspecialchars($t['origen'])?> → <?=htmlspecialchars($t['destino'])?>)</option><?php endforeach;?></select></label><br>
  <label>Pasajeros:<br><input name="pasajeros" type="number" value="1"></label><br>
  <label>Total:<br><input name="total" type="number" step="0.01"></label><br>
  <label>Notas:<br><textarea name="notas"></textarea></label><br>
  <button type="submit">Reservar</button>
</form>
<?php require __DIR__ . '/../shared/footer.php'; ?>
