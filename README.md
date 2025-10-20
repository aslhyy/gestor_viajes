# Gestor de Reservaciones

Contiene:
- Registro con selección de rol (ADMIN/EMPLEADO/CLIENTE).
- Login que valida el rol seleccionado frente al rol almacenado.
- Interfaces separadas para ADMIN, EMPLEADO y CLIENTE en app/views/{admin,empleado,cliente}.
- CRUD de viajes (ADMIN), reservas (CLIENTE crea, EMPLEADO/ADMIN editan), y gestión de usuarios (ADMIN).
- Triggers de auditoría (UPDATE/DELETE) que usan @app_user_id (se establece desde PHP antes de UPDATE/DELETE).
- Conexión MySQL procedural (config/db.php) como en clase.
- Vistas sencillas listas para estilizar con Tailwind.
