<?php require __DIR__ . '/../shared/header.php'; ?>
<h2>Crear usuario (ADMIN)</h2>
<?php if($err=flash_get('error')): ?><p style='color:red;'><?=htmlspecialchars($err)?></p><?php endif; ?>
<form method="post" action="?p=users&action=store">
  <label>Nombre:<br><input name="nombre" required></label><br>
  <label>Email:<br><input name="email" type="email" required></label><br>
  <label>Contraseña:<br><input name="password" type="password" required></label><br>
  <label>Rol:<br><select name="role"><?php foreach($roles as $r): ?><option value="<?=htmlspecialchars($r['nombre'])?>"><?=htmlspecialchars($r['nombre'])?></option><?php endforeach; ?></select></label><br>
  <button type="submit">Crear</button>
</form>
<?php require __DIR__ . '/../shared/footer.php'; ?>
