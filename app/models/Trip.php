<?php
require_once __DIR__ . '/../../config/db.php';
class Trip {
    private $conn;
    public function __construct(){ $this->conn = connect_db(); }
    public function all(){ $res = mysqli_query($this->conn, "SELECT * FROM viajes ORDER BY fecha_salida DESC"); $rows=[]; while($r=mysqli_fetch_assoc($res)) $rows[]=$r; return $rows; }
    public function find($id){ $stmt=mysqli_prepare($this->conn,"SELECT * FROM viajes WHERE id=?"); mysqli_stmt_bind_param($stmt,'i',$id); mysqli_stmt_execute($stmt); $res=mysqli_stmt_get_result($stmt); $row=mysqli_fetch_assoc($res); mysqli_stmt_close($stmt); return $row; }
    public function create($data){ $stmt=mysqli_prepare($this->conn,"INSERT INTO viajes (titulo,descripcion,origen,destino,fecha_salida,fecha_regreso,precio,plazas_total,plazas_disponibles) VALUES (?,?,?,?,?,?,?,?,?)"); mysqli_stmt_bind_param($stmt,'ssssssiii',$data['titulo'],$data['descripcion'],$data['origen'],$data['destino'],$data['fecha_salida'],$data['fecha_regreso'],$data['precio'],$data['plazas_total'],$data['plazas_disponibles']); $ok=mysqli_stmt_execute($stmt); mysqli_stmt_close($stmt); return $ok; }
    public function update($id,$data){ $stmt=mysqli_prepare($this->conn,"UPDATE viajes SET titulo=?,descripcion=?,origen=?,destino=?,fecha_salida=?,fecha_regreso=?,precio=?,plazas_total=?,plazas_disponibles=? WHERE id=?"); mysqli_stmt_bind_param($stmt,'ssssssiiii',$data['titulo'],$data['descripcion'],$data['origen'],$data['destino'],$data['fecha_salida'],$data['fecha_regreso'],$data['precio'],$data['plazas_total'],$data['plazas_disponibles'],$id); $ok=mysqli_stmt_execute($stmt); mysqli_stmt_close($stmt); return $ok; }
    public function delete($id){ $stmt=mysqli_prepare($this->conn,"DELETE FROM viajes WHERE id=?"); mysqli_stmt_bind_param($stmt,'i',$id); $ok=mysqli_stmt_execute($stmt); mysqli_stmt_close($stmt); return $ok; }
}
