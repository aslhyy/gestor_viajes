<!DOCTYPE html><html><head><meta charset="utf-8"><title>Gestor de Viajes</title></head><body>
<header>
  <h1>Gestor de Reservaciones</h1>
  <?php if(isset($_SESSION['user_name'])): ?>
    <p>Usuario: <?=htmlspecialchars($_SESSION['user_name'])?> (<?=htmlspecialchars($_SESSION['role'])?>) | <a href="?p=logout">Salir</a></p>
  <?php else: ?>
    <p><a href="?p=login">Login</a> | <a href="?p=register">Registro</a></p>
  <?php endif; ?>
  <hr>
</header>
