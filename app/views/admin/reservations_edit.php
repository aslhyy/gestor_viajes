<?php require __DIR__ . '/../shared/header.php'; ?>
<h2>Editar reserva (ADMIN)</h2>
<form method="POST" action="?p=update_reservation">
    <input type="hidden" name="id" value="<?= $reservation['id'] ?>">

    <label for="viaje_id">Viaje:</label>
    <select name="viaje_id" id="viaje_id">
        <?php foreach ($trips as $trip): ?>
            <option value="<?= $trip['id'] ?>" <?= $trip['id']==$reservation['viaje_id']?'selected':'' ?>>
               <?= htmlspecialchars($trip['destino']) ?>

            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="pasajeros">Pasajeros:</label>
    <input type="number" name="pasajeros" id="pasajeros" value="<?= $reservation['pasajeros'] ?>"><br>

    <label for="total">Total:</label>
    <input type="text" name="total" id="total" value="<?= $reservation['total'] ?>"><br>

    <label for="estado">Estado:</label>
    <select name="estado" id="estado">
        <option value="PENDIENTE" <?= $reservation['estado']=='PENDIENTE'?'selected':''; ?>>PENDIENTE</option>
        <option value="CONFIRMADO" <?= $reservation['estado']=='CONFIRMADO'?'selected':''; ?>>CONFIRMADO</option>
        <option value="CANCELADO" <?= $reservation['estado']=='CANCELADO'?'selected':''; ?>>CANCELADO</option>
    </select><br>

    <label for="notas">Notas:</label>
    <textarea name="notas" id="notas"><?= htmlspecialchars($reservation['notas']) ?></textarea><br>

    <button type="submit">Guardar Cambios</button>
</form>

<?php require __DIR__ . '/../shared/footer.php'; ?>
