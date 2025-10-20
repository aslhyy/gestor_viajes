<?php
// db.php - conexión MySQLi procedural igual que en clase
function connect_db() {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'gestor_viajes';

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        return false;
    }
    mysqli_set_charset($conn, 'utf8mb4');
    return $conn;
}
