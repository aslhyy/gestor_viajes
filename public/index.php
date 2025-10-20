<?php
session_start();
require_once __DIR__ . '/../config/db.php';

$p = $_GET['p'] ?? 'home';

if ($p === 'login') {
    require_once __DIR__ . '/../app/controllers/AuthController.php';
    $ctrl = new AuthController();
    $ctrl->login();
} elseif ($p === 'register') {
    require_once __DIR__ . '/../app/controllers/AuthController.php';
    $ctrl = new AuthController();
    $ctrl->register();
} elseif ($p === 'logout') {
    require_once __DIR__ . '/../app/controllers/AuthController.php';
    $ctrl = new AuthController();
    $ctrl->logout();
} elseif ($p === 'trips') {
    require_once __DIR__ . '/../app/controllers/TripController.php';
    $ctrl = new TripController();
    $action = $_GET['action'] ?? 'index';
    if (!method_exists($ctrl, $action)) $action = 'index';
    $ctrl->$action();
} elseif ($p === 'reservations') {
    require_once __DIR__ . '/../app/controllers/ReservationController.php';
    $ctrl = new ReservationController();
    $action = $_GET['action'] ?? 'index';
    if (!method_exists($ctrl, $action)) $action = 'index';
    $ctrl->$action();
} elseif ($p === 'users') {
    require_once __DIR__ . '/../app/controllers/UserController.php';
    $ctrl = new UserController();
    $action = $_GET['action'] ?? 'index';
    if (!method_exists($ctrl, $action)) $action = 'index';
    $ctrl->$action();
} elseif ($p === 'admin/dashboard') {
    require_once __DIR__ . '/../app/views/admin/dashboard.php';
} elseif ($p === 'empleado/dashboard') {
    require_once __DIR__ . '/../app/views/empleado/dashboard.php';
} elseif ($p === 'cliente/dashboard') {
    require_once __DIR__ . '/../app/views/cliente/dashboard.php';
} else {
    echo "<p>Bienvenido. <a href='?p=login'>Login</a> | <a href='?p=register'>Registro</a> | <a href='?p=trips'>Viajes</a></p>";
}
