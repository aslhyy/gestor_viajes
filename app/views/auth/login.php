<?php require __DIR__ . '/../shared/header.php'; ?>
<h2>Iniciar sesión</h2>
<?php if(!empty($message)): ?><p style="color:green;"><?=htmlspecialchars($message)?></p><?php endif; ?>
<?php if(!empty($error)): ?><p style="color:red;"><?=htmlspecialchars($error)?></p><?php endif; ?>
<form method="post" action="?p=login">
  <label>Email:<br><input type="email" name="email" required></label><br>
  <label>Contraseña:<br><input type="password" name="password" required></label><br>
  <label>Rol:<br><select name="role"><?php foreach($roles as $r): ?><option value="<?=htmlspecialchars($r)?>"><?=htmlspecialchars($r)?></option><?php endforeach; ?></select></label><br>
  <button type="submit">Entrar</button>
</form>
<p><a href='?p=register'>Registrarme</a></p>
<?php require __DIR__ . '/../shared/footer.php'; ?>
