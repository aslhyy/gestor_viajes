<?php require __DIR__ . '/../shared/header.php'; ?>
<h2>Editar usuario (ADMIN)</h2>
<form method="post" action="?p=users&action=update">
  <input type="hidden" name="id" value="<?=htmlspecialchars($user['id'])?>">
  <p>Nombre: <?=htmlspecialchars($user['nombre'])?></p>
  <p>Email: <?=htmlspecialchars($user['email'])?></p>
  <label>Rol:<br><select name="role"><?php foreach($roles as $r): ?><option value="<?=htmlspecialchars($r['nombre'])?>" <?= $r['nombre']==$user['role_name'] ? 'selected':'' ?>><?=htmlspecialchars($r['nombre'])?></option><?php endforeach; ?></select></label><br>
  <button type="submit">Guardar</button>
</form>
<?php require __DIR__ . '/../shared/footer.php'; ?>
