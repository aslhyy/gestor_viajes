<?php
require_once __DIR__ . '/../../config/db.php';
class User {
    private $conn;
    public function __construct(){ $this->conn = connect_db(); }
    public function findByEmail($email){
        $stmt = mysqli_prepare($this->conn, "SELECT u.id,u.nombre,u.email,u.password,u.role_id,r.nombre as role_name FROM usuarios u JOIN roles r ON r.id=u.role_id WHERE u.email=?");
        mysqli_stmt_bind_param($stmt,'s',$email);
        mysqli_stmt_execute($stmt);
        $res=mysqli_stmt_get_result($stmt);
        $row=mysqli_fetch_assoc($res);
        mysqli_stmt_close($stmt);
        return $row;
    }
    public function create($nombre,$email,$password,$role_name){
        $stmt = mysqli_prepare($this->conn, "SELECT id FROM roles WHERE nombre=?");
        mysqli_stmt_bind_param($stmt,'s',$role_name);
        mysqli_stmt_execute($stmt);
        $res=mysqli_stmt_get_result($stmt);
        $r=mysqli_fetch_assoc($res);
        mysqli_stmt_close($stmt);
        if (!$r) return false;
        $role_id = (int)$r['id'];
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($this->conn, "INSERT INTO usuarios (nombre,email,password,role_id) VALUES (?,?,?,?)");
        mysqli_stmt_bind_param($stmt,'sssi',$nombre,$email,$hash,$role_id);
        $ok = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $ok;
    }
    public function findById($id){
        $stmt = mysqli_prepare($this->conn, "SELECT u.*, r.nombre as role_name FROM usuarios u JOIN roles r ON r.id=u.role_id WHERE u.id=?");
        mysqli_stmt_bind_param($stmt,'i',$id);
        mysqli_stmt_execute($stmt);
        $res=mysqli_stmt_get_result($stmt);
        $row=mysqli_fetch_assoc($res);
        mysqli_stmt_close($stmt);
        return $row;
    }
}
