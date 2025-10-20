<?php
require_once __DIR__ . '/../../config/db.php';

class Reservation {
public function all() {
    $conn = connect_db();
    $sql = "SELECT r.*, u.nombre AS cliente, t.destino AS viaje 
        FROM reservas r
        JOIN usuarios u ON r.usuario_id = u.id
        JOIN viajes t ON r.viaje_id = t.id";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($conn);
    return $rows;
}

public function find($id) {
        $conn = connect_db();
        $stmt = mysqli_prepare($conn, "SELECT * FROM reservas WHERE id=?");
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $row;
    }

public function create($data) {
        $conn = connect_db();
        $stmt = mysqli_prepare($conn, "INSERT INTO reservas (usuario_id, viaje_id, pasajeros, total, estado, notas) VALUES (?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, 'iiidss',
            $data['usuario_id'],
            $data['viaje_id'],
            $data['pasajeros'],
            $data['total'],
            $data['estado'],
            $data['notas']
        );
        mysqli_stmt_execute($stmt);
        $id = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $id;
    }

public function update($id, $data) {
        $conn = connect_db();
        $stmt = mysqli_prepare($conn, "UPDATE reservas 
            SET viaje_id=?, pasajeros=?, total=?, estado=?, notas=? 
            WHERE id=?");
        mysqli_stmt_bind_param($stmt, 'iidssi',
            $data['viaje_id'],
            $data['pasajeros'],
            $data['total'],
            $data['estado'],
            $data['notas'],
            $id
        );
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

public function delete($id) {
        $conn = connect_db();
        $stmt = mysqli_prepare($conn, "DELETE FROM reservas WHERE id=?");
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

public function byUser($user_id) {
        $conn = connect_db();
        $stmt = mysqli_prepare($conn, "SELECT r.*, t.nombre AS viaje_nombre
                                       FROM reservas r 
                                       JOIN viajes t ON r.viaje_id = t.id
                                       WHERE r.usuario_id = ?");
        mysqli_stmt_bind_param($stmt, 'i', $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $rows;
    }
}

