<?php
require_once __DIR__ . '/../models/Reservation.php';
require_once __DIR__ . '/../models/Trip.php';
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../helpers.php';

class ReservationController {
    private $model; private $tripModel;
    public function __construct(){ $this->model = new Reservation(); $this->tripModel = new Trip(); requireAuth(); }

    public function index(){
        if ($_SESSION['role'] === 'CLIENTE') $reservas = $this->model->byUser($_SESSION['user_id']);
        else $reservas = $this->model->all();
        if ($_SESSION['role']==='ADMIN') require __DIR__ . '/../views/admin/reservations_list.php';
        elseif ($_SESSION['role']==='EMPLEADO') require __DIR__ . '/../views/empleado/reservations_list.php';
        else require __DIR__ . '/../views/cliente/reservations_list.php';
    }

    public function create(){ if (!in_array($_SESSION['role'], ['CLIENTE','ADMIN'])) { echo 'No autorizado'; exit; } $trips = $this->tripModel->all(); require __DIR__ . '/../views/cliente/reservations_create.php'; }

public function store(){
    if (!in_array($_SESSION['role'], ['CLIENTE','ADMIN'])) { echo 'No autorizado'; exit; }

    $usuario_id = $_SESSION['user_id'];
    if ($_SESSION['role'] === 'ADMIN' && !empty($_POST['usuario_id'])) {
        $usuario_id = intval($_POST['usuario_id']);
    }

    $data = [
        'usuario_id' => $usuario_id,
        'viaje_id' => intval($_POST['viaje_id']),
        'pasajeros' => intval($_POST['pasajeros']),
        'total' => floatval($_POST['total']),
        'estado' => 'PENDIENTE',
        'notas' => $_POST['notas'] ?? null
    ];

    $reserva_id = $this->model->create($data);

    $conn = connect_db();
    $stmt = mysqli_prepare($conn, "INSERT INTO auditoria_reservas (reserva_id, accion, usuario_aplico, datos_previos, datos_nuevos) VALUES (?,?,?,?,?)");
    $accion = 'INSERT';
    $uid = (int)$_SESSION['user_id'];
    $prev = null;
    $new = json_encode($data);
    mysqli_stmt_bind_param($stmt, 'isiss', $reserva_id, $accion, $uid, $prev, $new);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    header('Location: ?p=reservations');
}


    public function edit(){
        $id=intval($_GET['id']); $reservation=$this->model->find($id);
        if (!$reservation) { echo 'No existe'; exit; }
        if ($_SESSION['role'] === 'CLIENTE' && $reservation['usuario_id'] != $_SESSION['user_id']) { echo 'No autorizado'; exit; }
        $trips = $this->tripModel->all();
        if ($_SESSION['role']==='ADMIN') require __DIR__ . '/../views/admin/reservations_edit.php';
        elseif ($_SESSION['role']==='EMPLEADO') require __DIR__ . '/../views/empleado/reservations_edit.php';
        else require __DIR__ . '/../views/cliente/reservations_edit.php';
    }

public function update() {
    session_start();
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['role'])) {
        header('Location: ?p=login');
        exit;
    }

    $id = intval($_POST['id']);
    $old = $this->model->find($id);
    if (!$old) { echo 'No existe'; exit; }

    $conn = connect_db();
    mysqli_query($conn, "SET @app_user_id = " . intval($_SESSION['user_id']));

    $data = [
        'viaje_id'  => intval($_POST['viaje_id'] ?? $old['viaje_id']),
        'pasajeros' => intval($_POST['pasajeros'] ?? $old['pasajeros']),
        'total'     => floatval($_POST['total'] ?? $old['total']),
        'estado'    => $_POST['estado'] ?? $old['estado'],
        'notas'     => $_POST['notas'] ?? $old['notas']
    ];

    if (!in_array($_SESSION['role'], ['ADMIN', 'EMPLEADO'])) {
        if ($old['usuario_id'] != $_SESSION['user_id']) {
            echo 'No autorizado';
            exit;
        }
        $data = [
            'viaje_id' => $old['viaje_id'],
            'pasajeros' => $old['pasajeros'],
            'total' => $old['total'],
            'estado' => $old['estado'],
            'notas' => $_POST['notas'] ?? $old['notas']
        ];
    }

    $this->model->update($id, $data);

    $stmt = mysqli_prepare($conn, "INSERT INTO auditoria_reservas (reserva_id, accion, usuario_aplico, datos_previos, datos_nuevos)
                                   VALUES (?, ?, ?, ?, ?)");
    $accion = 'UPDATE';
    $uid = intval($_SESSION['user_id']);
    $prev = json_encode($old);
    $new = json_encode($data);
    mysqli_stmt_bind_param($stmt, 'isiss', $id, $accion, $uid, $prev, $new);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    if (in_array($_SESSION['role'], ['ADMIN', 'EMPLEADO'])) {
        header('Location: ?p=reservations_list'); 
    } else {
        header('Location: ?p=reservations'); 
    }
    exit;
}


public function delete(){
    if (!in_array($_SESSION['role'], ['ADMIN','EMPLEADO'])) { echo 'No autorizado'; exit; }
    $id = intval($_GET['id']);
    $old = $this->model->find($id);
    if (!$old) { echo 'No existe'; exit; }

    $conn = connect_db();
    mysqli_query($conn, "SET @app_user_id = " . intval($_SESSION['user_id']));

    $stmt = mysqli_prepare($conn, "INSERT INTO auditoria_reservas (reserva_id, accion, usuario_aplico, datos_previos) VALUES (?,?,?,?)");
    $accion = 'DELETE'; 
    $uid = (int)$_SESSION['user_id']; 
    $prev = json_encode($old);
    mysqli_stmt_bind_param($stmt, 'isis', $id, $accion, $uid, $prev);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $this->model->delete($id);

    mysqli_close($conn);
    header('Location: ?p=reservations');
}

}
