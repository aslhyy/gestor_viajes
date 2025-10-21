# Sistema Web MVC para la Gestión de Reservaciones de Viajes con Roles de Usuario

## Descripción del Proyecto
Este proyecto consiste en el desarrollo de una aplicación web que permite **gestionar reservaciones de viajes**.  
El sistema fue implementado siguiendo el **patrón de arquitectura MVC (Modelo-Vista-Controlador)**, con el objetivo de mantener una estructura ordenada, escalable y segura.

El sistema integra diferentes **roles de usuario (Administrador, Empleado y Cliente)**, cada uno con permisos específicos, para garantizar un control adecuado sobre las operaciones realizadas en la base de datos.

## Tecnologías Utilizadas
- **Lenguaje Backend:** PHP 8  
- **Base de Datos:** MySQL  
- **Frontend:** HTML5, TailwindCSS, Bootstrap Icons  
- **Servidor Local:** XAMPP  
- **Control de Versiones:** Git y GitHub  

## Funcionalidades Principales

### Módulo de Usuarios
- Registro de nuevos usuarios.  
- Inicio de sesión con validación de credenciales.  
- Asignación de roles (Administrador, Empleado, Cliente).  
- Gestión de sesiones y cierre de sesión seguro.  

### Módulo de Reservaciones
- Creación, edición y eliminación de reservaciones.  
- Consulta de reservas por parte del cliente.  
- Gestión y control de reservas por empleados o administradores.  
- Auditoría de acciones en base de datos (registro de modificaciones o eliminaciones).  

### Módulo de Seguridad
- Roles definidos a nivel de aplicación y base de datos.  
- Triggers de auditoría que registran las acciones importantes.  
- Control de acceso según el tipo de usuario.  

## Base de Datos

El sistema utiliza una base de datos relacional en **MySQL** con las siguientes tablas principales:

- **usuarios** – almacena la información de los usuarios registrados.  
- **roles** – define los distintos tipos de roles y privilegios.  
- **reservas** – contiene los datos de las reservaciones.  
- **viajes** – lista los viajes disponibles (destinos, fechas, costos, etc.).  
- **auditoria** – registra acciones realizadas en las tablas sensibles.  

Cada usuario está relacionado con un rol específico mediante una **clave foránea (id_rol)**, garantizando el control de acceso a las funciones del sistema.

## Interfaz de Usuario

Las vistas fueron diseñadas con **TailwindCSS** para mantener una apariencia moderna, limpia y responsiva.  
Además, se incorporaron **íconos de Bootstrap** para mejorar la usabilidad visual y la experiencia del usuario.

Entre las vistas principales se incluyen:
- Página de inicio de sesión y registro.  
- Panel del administrador (gestión de usuarios, viajes y reservas).  
- Panel del empleado (consultas y modificaciones).  
- Panel del cliente (creación y consulta de reservas).  

## Instalación y Ejecución

1. Clona el repositorio:
   ```bash
   git clone https://github.com/aslhyy/gestor_viajes.git
2. Copia la carpeta del proyecto en el directorio htdocs de XAMPP:
 ```bash
C:\xampp\htdocs\gestor_viajes
 ```
3. Crea una base de datos en phpMyAdmin llamada gestor_viajes y ejecuta el script SQL incluido.
Verifica que el archivo config/db.php tenga las credenciales correctas:

 ```php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "gestor_viajes";
Inicia Apache y MySQL desde el panel de XAMPP.
 ```

4. Abre el navegador y accede a:
 ```bash
http://localhost/gestor_viajes/public/
 ```

#### Roles de Usuario en la Base de Datos
* Rol	Descripción	Privilegios
* Administrador	Control total del sistema	CRUD completo
* Empleado	Gestiona reservas y viajes	SELECT, INSERT, UPDATE
* Cliente	Realiza y consulta reservas	SELECT, INSERT

#### Equipo de Desarrollo
* Aslhy	Lógica backend y estructura MVC
* Sarah	Base de datos y diagramas
* Mafe	Diseño visual, mockups y UX/UI

## Conclusión
El sistema cumple con los principios del patrón MVC, implementa seguridad basada en roles y ofrece una interfaz moderna y funcional.
Este proyecto sirvió para aplicar de manera práctica los conocimientos adquiridos en programación web, diseño de bases de datos y control de versiones con Git.
