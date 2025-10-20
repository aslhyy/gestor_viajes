<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../helpers.php';

class UserController {
    private $conn; private $userModel;
    public function __construct(){ $this->conn = connect_db(); $this->userModel = new User(); requireAuth(); }

    public function index(){ requireRole(['ADMIN']); $res=mysqli_query($this->conn,"SELECT u.id,u.nombre,u.email,r.nombre as role FROM usuarios u JOIN roles r ON r.id=u.role_id ORDER BY u.id"); $users=[]; while($r=mysqli_fetch_assoc($res)) $users[]=$r; require __DIR__ . '/../views/admin/users_list.php'; }

    public function edit(){ requireRole(['ADMIN']); $id=intval($_GET['id']); $user=$this->userModel->findById($id); $roles=[]; $res=mysqli_query($this->conn,"SELECT id,nombre FROM roles ORDER BY id"); while($r=mysqli_fetch_assoc($res)) $roles[]=$r; require __DIR__ . '/../views/admin/users_edit.php'; }

    public function update(){ requireRole(['ADMIN']); $id=intval($_POST['id']); $role=$_POST['role'] ?? ''; $stmt=mysqli_prepare($this->conn,"SELECT id FROM roles WHERE nombre=?"); mysqli_stmt_bind_param($stmt,'s',$role); mysqli_stmt_execute($stmt); $res=mysqli_stmt_get_result($stmt); $r=mysqli_fetch_assoc($res); mysqli_stmt_close($stmt); if (!$r){ flash_set('error','Rol inválido'); header("Location: ?p=users"); exit; } $role_id=intval($r['id']); $stmt=mysqli_prepare($this->conn,"UPDATE usuarios SET role_id=? WHERE id=?"); mysqli_stmt_bind_param($stmt,'ii',$role_id,$id); mysqli_stmt_execute($stmt); mysqli_stmt_close($stmt); flash_set('success','Rol actualizado'); header('Location: ?p=users'); exit; }

    public function create(){ requireRole(['ADMIN']); $roles=[]; $res=mysqli_query($this->conn,"SELECT id,nombre FROM roles ORDER BY id"); while($r=mysqli_fetch_assoc($res)) $roles[]=$r; require __DIR__ . '/../views/admin/users_create.php'; }

    public function store(){ requireRole(['ADMIN']); $nombre=trim($_POST['nombre']??''); $email=trim($_POST['email']??''); $password=$_POST['password']??''; $role=$_POST['role']??'CLIENTE'; $ok=(new User())->create($nombre,$email,$password,$role); if($ok) flash_set('success','Usuario creado'); else flash_set('error','No se pudo crear usuario'); header('Location: ?p=users'); exit; }
}
