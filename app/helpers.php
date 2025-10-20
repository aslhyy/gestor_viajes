<?php
if (session_status() === PHP_SESSION_NONE) session_start();

function requireAuth() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: ?p=login');
        exit;
    }
}

function requireRole(array $roles = []) {
    requireAuth();
    if (!in_array($_SESSION['role'], $roles)) {
        http_response_code(403);
        echo '<h3>No autorizado</h3><p>No tienes permisos para acceder a esta página.</p><p><a href="?p=trips">Volver</a></p>';
        exit;
    }
}

function flash_set($k,$v){ $_SESSION['flash'][$k]=$v; }
function flash_get($k){ $v = $_SESSION['flash'][$k] ?? null; unset($_SESSION['flash'][$k]); return $v; }
