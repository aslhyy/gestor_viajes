<?php require __DIR__ . '/../shared/header.php'; ?>
<h2>Usuarios (ADMIN)</h2>
<?php if($msg=flash_get('success')): ?><p style='color:green;'><?=htmlspecialchars($msg)?></p><?php endif; ?>
<p><a href='?p=users&action=create'>Crear usuario</a></p>
<table border='1' cellpadding='6'><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th><th>Acciones</th></tr>
<?php foreach($users as $u): ?>
  <tr>
    <td><?=htmlspecialchars($u['id'])?></td>
    <td><?=htmlspecialchars($u['nombre'])?></td>
    <td><?=htmlspecialchars($u['email'])?></td>
    <td><?=htmlspecialchars($u['role'])?></td>
    <td><a href='?p=users&action=edit&id=<?= $u['id'] ?>'>Editar</a></td>
  </tr>
<?php endforeach; ?>
</table>
<?php require __DIR__ . '/../shared/footer.php'; ?>
