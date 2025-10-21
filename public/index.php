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
    echo "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Gestor de Reservaciones</title>

        <!-- Fuente Poppins -->
        <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap' rel='stylesheet'>

        <!-- Tailwind CDN -->
        <script src='https://cdn.tailwindcss.com'></script>

        <!-- Lucide Icons -->
        <script src='https://unpkg.com/lucide@latest'></script>

        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(135deg, #2685BF, #3D9DD9, #5FB6D9, #94D7F2);
                background-size: 200% 200%;
                animation: gradientShift 10s ease infinite;
            }
            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            .btn {
                transition: all 0.3s ease;
            }
            .btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            }
        </style>
    </head>

    <body class='min-h-screen flex items-center justify-center'>
        <div class='bg-white/80 backdrop-blur-lg shadow-2xl rounded-3xl p-10 text-center border border-white/40 w-full max-w-lg'>

            <div class='mb-6'>
                <svg xmlns='http://www.w3.org/2000/svg' class='mx-auto text-[#2685BF]' width='60' height='60' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'>
                    <path d='M3 7h18M3 12h18M3 17h18'/>
                </svg>
            </div>

            <h1 class='text-3xl font-extrabold text-gray-800 mb-3'>
                Bienvenido a <span class='text-[#2685BF]'>Gestor de Reservaciones</span>
            </h1>

            <p class='text-gray-600 mb-8 text-lg'>
                Selecciona una opción para continuar:
            </p>

            <div class='flex flex-col sm:flex-row gap-4 justify-center'>
                <a href='?p=login' 
                    class='btn flex items-center justify-center gap-2 px-6 py-3 bg-[#2685BF] text-white font-semibold rounded-xl shadow-md'>
                    <i data-lucide='log-in'></i> Iniciar Sesión
                </a>

                <a href='?p=register' 
                    class='btn flex items-center justify-center gap-2 px-6 py-3 bg-[#3D9DD9] text-white font-semibold rounded-xl shadow-md'>
                    <i data-lucide='user-plus'></i> Registrarse
                </a>
            </div>
        </div>

        <script>
            lucide.createIcons();
        </script>
    </body>
    </html>
    ";
}
?>
