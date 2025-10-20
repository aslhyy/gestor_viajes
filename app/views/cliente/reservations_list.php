<?php require __DIR__ . '/../shared/header.php'; ?>
<h2>Mis Reservas (CLIENTE)</h2>
<table border='1' cellpadding='6'><tr><th>ID</th><th>Viaje</th><th>Pasajeros</th><th>Total</th><th>Estado</th><th>Acciones</th></tr>
<?php foreach($reservas as $r): ?>
  <tr>
    <td><?=htmlspecialchars($r['id'])?></td>
    <td><?=htmlspecialchars($r['viaje'])?></td>
    <td><?=htmlspecialchars($r['pasajeros'])?></td>
    <td><?=htmlspecialchars($r['total'])?></td>
    <td><?=htmlspecialchars($r['estado'])?></td>
    <td><a href='?p=reservations&action=edit&id=<?= $r['id'] ?>'>Editar</a></td>
  </tr>
<?php endforeach; ?>
</table>
<?php require __DIR__ . '/../shared/footer.php'; ?>
