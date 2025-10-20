<?php require __DIR__ . '/../shared/header.php'; ?>
<h2>Editar reserva (CLIENTE)</h2>
<form method="POST" action="?p=reservations_update">
    <input type="hidden" name="id" value="<?= $reservation['id'] ?>">

    <label>Viaje:</label>
    <select name="viaje_id" disabled>
        <?php foreach ($trips as $trip): ?>
            <option value="<?= $trip['id'] ?>"
                <?= ($trip['id'] == $reservation['viaje_id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($trip['destino']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Notas:</label>
    <textarea name="notas"><?= htmlspecialchars($reservation['notas']) ?></textarea><br><br>

    <button type="submit">Guardar cambios</button>
</form>

<?php require __DIR__ . '/../shared/footer.php'; ?>
