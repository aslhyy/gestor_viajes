-- schema.sql - crea BD, tablas, roles y triggers de auditoría
CREATE DATABASE IF NOT EXISTS gestor_viajes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gestor_viajes;

CREATE TABLE IF NOT EXISTS roles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL UNIQUE,
  descripcion VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role_id INT NOT NULL,
  creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE TABLE IF NOT EXISTS viajes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(150) NOT NULL,
  descripcion TEXT,
  origen VARCHAR(100),
  destino VARCHAR(100),
  fecha_salida DATETIME,
  fecha_regreso DATETIME NULL,
  precio DECIMAL(10,2) NOT NULL DEFAULT 0,
  plazas_total INT NOT NULL DEFAULT 0,
  plazas_disponibles INT NOT NULL DEFAULT 0,
  creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reservas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  viaje_id INT NOT NULL,
  fecha_reserva TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  pasajeros INT NOT NULL DEFAULT 1,
  total DECIMAL(10,2) NOT NULL,
  estado ENUM('CONFIRMADA','CANCELADA','PENDIENTE') DEFAULT 'PENDIENTE',
  notas TEXT,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
  FOREIGN KEY (viaje_id) REFERENCES viajes(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS auditoria_reservas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  reserva_id INT,
  accion ENUM('UPDATE','DELETE','INSERT') NOT NULL,
  usuario_aplico INT,
  datos_previos JSON NULL,
  datos_nuevos JSON NULL,
  fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (reserva_id) REFERENCES reservas(id) ON DELETE SET NULL
);

INSERT INTO roles (nombre, descripcion) VALUES
  ('ADMIN','Administrador: gestiona usuarios, viajes y reservas'),
  ('EMPLEADO','Empleado: gestiona reservas y consulta disponibilidad'),
  ('CLIENTE','Cliente: realiza reservaciones')
ON DUPLICATE KEY UPDATE nombre=nombre;

DELIMITER $$
CREATE TRIGGER trg_reservas_after_update
AFTER UPDATE ON reservas
FOR EACH ROW
BEGIN
  INSERT INTO auditoria_reservas (reserva_id, accion, usuario_aplico, datos_previos, datos_nuevos)
  VALUES (
    OLD.id,
    'UPDATE',
    @app_user_id,
    JSON_OBJECT('pasajeros', OLD.pasajeros, 'total', OLD.total, 'estado', OLD.estado, 'notas', OLD.notas),
    JSON_OBJECT('pasajeros', NEW.pasajeros, 'total', NEW.total, 'estado', NEW.estado, 'notas', NEW.notas)
  );
END$$

CREATE TRIGGER trg_reservas_after_delete
AFTER DELETE ON reservas
FOR EACH ROW
BEGIN
  INSERT INTO auditoria_reservas (reserva_id, accion, usuario_aplico, datos_previos)
  VALUES (
    OLD.id,
    'DELETE',
    @app_user_id,
    JSON_OBJECT('pasajeros', OLD.pasajeros, 'total', OLD.total, 'estado', OLD.estado, 'notas', OLD.notas)
  );
END$$
DELIMITER ;
