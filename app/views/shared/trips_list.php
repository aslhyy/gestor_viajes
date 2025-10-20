<?php require __DIR__ . '/header.php'; ?>
<h2>Listado de viajes</h2>
<?php if(isset($_SESSION['role']) && $_SESSION['role']==='ADMIN'): ?>
  <p><a href='?p=trips&action=create'>Crear viaje</a> | <a href='?p=users'>Gestionar usuarios</a></p>
<?php endif; ?>
<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Título</th><th>Origen</th><th>Destino</th><th>Salida</th><th>Precio</th><th>Acciones</th></tr>
  <?php foreach($trips as $t): ?>
    <tr>
      <td><?=htmlspecialchars($t['id'])?></td>
      <td><?=htmlspecialchars($t['titulo'])?></td>
      <td><?=htmlspecialchars($t['origen'])?></td>
      <td><?=htmlspecialchars($t['destino'])?></td>
      <td><?=htmlspecialchars($t['fecha_salida'])?></td>
      <td><?=htmlspecialchars($t['precio'])?></td>
      <td>
        <?php if(isset($_SESSION['role']) && $_SESSION['role']==='ADMIN'): ?>
          <a href='?p=trips&action=edit&id=<?= $t['id'] ?>'>Editar</a> | <a href='?p=trips&action=delete&id=<?= $t['id'] ?>' onclick="return confirm('Eliminar?')">Borrar</a>
        <?php else: ?>
          <a href='?p=reservations&action=create&viaje_id=<?= $t['id'] ?>'>Reservar</a>
        <?php endif; ?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<p><a href='?p=reservations'>Reservas</a></p>
<?php require __DIR__ . '/footer.php'; ?>
