<?php require __DIR__ . '/../shared/header.php'; ?>
<h2>Registro</h2>
<?php if(!empty($error)): ?><p style="color:red;"><?=htmlspecialchars($error)?></p><?php endif; ?>
<form method="post" action="?p=register">
  <label>Nombre:<br><input type="text" name="nombre" required></label><br>
  <label>Email:<br><input type="email" name="email" required></label><br>
  <label>Contraseña:<br><input type="password" name="password" required></label><br>
  <label>Rol:<br><select name="role"><?php foreach($roles as $r): ?><option value="<?=htmlspecialchars($r)?>"><?=htmlspecialchars($r)?></option><?php endforeach; ?></select></label><br>
  <button type="submit">Registrar</button>
</form>
<?php require __DIR__ . '/../shared/footer.php'; ?>
