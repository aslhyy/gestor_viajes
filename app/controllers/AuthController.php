<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../config/db.php';

class AuthController {
    private $conn;
    public function __construct(){ $this->conn = connect_db(); }

    public function login(){
        $roles = [];
        $res = mysqli_query($this->conn, "SELECT nombre FROM roles ORDER BY id");
        while($r=mysqli_fetch_assoc($res)) $roles[] = $r['nombre'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $selected_role = $_POST['role'] ?? '';

            $user = (new User())->findByEmail($email);
            if ($user && password_verify($password, $user['password'])) {
                if ($selected_role !== $user['role_name']) {
                    $error = 'El rol seleccionado no coincide con el rol asignado al usuario.';
                    require __DIR__ . '/../views/auth/login.php';
                    return;
                }
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role_name'];
                $_SESSION['user_name'] = $user['nombre'];
                mysqli_query($this->conn, "SET @app_user_id = " . intval($user['id']));
                // Redirect based on role to separate interfaces
                if ($user['role_name'] === 'ADMIN') header('Location: ?p=admin/dashboard');
                elseif ($user['role_name'] === 'EMPLEADO') header('Location: ?p=empleado/dashboard');
                else header('Location: ?p=cliente/dashboard');
                exit;
            } else {
                $error = 'Credenciales inválidas';
            }
        }
        require __DIR__ . '/../views/auth/login.php';
    }

    public function register(){
        $roles=[];
        $res = mysqli_query($this->conn, "SELECT nombre FROM roles ORDER BY id");
        while($r=mysqli_fetch_assoc($res)) $roles[] = $r['nombre'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? 'CLIENTE';

            if (empty($nombre) || empty($email) || empty($password)) {
                $error = 'Completa todos los campos';
                require __DIR__ . '/../views/auth/register.php';
                return;
            }
            // validate role exists
            if (!in_array($role, $roles)) {
                $error = 'Rol inválido';
                require __DIR__ . '/../views/auth/register.php';
                return;
            }
            $u = new User();
            $ok = $u->create($nombre,$email,$password,$role);
            if ($ok) {
                $message = 'Registro exitoso. Inicia sesión seleccionando el mismo rol.';
                require __DIR__ . '/../views/auth/login.php';
                return;
            } else {
                $error = 'No se pudo registrar (email puede existir)';
            }
        }

        require __DIR__ . '/../views/auth/register.php';
    }

    public function logout(){
        session_unset(); session_destroy();
        header('Location: ?p=login'); exit;
    }
}
