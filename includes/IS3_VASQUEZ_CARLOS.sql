CREATE TABLE usuario(
    usu_id INT AUTO_INCREMENT PRIMARY KEY,
    usu_nombre VARCHAR(50),
    usu_codigo INTEGER,
    usu_password VARCHAR(150),
    usu_situacion SMALLINT DEFAULT 1
);

CREATE TABLE aplicacion(
    app_id INT AUTO_INCREMENT PRIMARY KEY,
    app_nombre VARCHAR(75),
    app_situacion SMALLINT DEFAULT 1
);

CREATE TABLE rol(
    rol_id INT AUTO_INCREMENT PRIMARY KEY,
    rol_nombre VARCHAR(75),
    rol_nombre_ct VARCHAR(25),
    rol_app INTEGER,
    rol_situacion SMALLINT DEFAULT 1,
    FOREIGN KEY (rol_app) REFERENCES aplicacion(app_id)
);

CREATE TABLE permiso (
    permiso_id INT AUTO_INCREMENT PRIMARY KEY,
    permiso_usuario INTEGER,
    permiso_rol INTEGER,
    permiso_situacion SMALLINT DEFAULT 1,
    FOREIGN KEY (permiso_usuario) REFERENCES usuario (usu_id),
    FOREIGN KEY (permiso_rol) REFERENCES rol (rol_id)
);

-- INSERT USUARIOS
INSERT INTO usuario (usu_nombre,usu_codigo, usu_password) VALUES 
('CARLOS VASQUEZ', 12345678, '$2y$10$Nz6/ESQw7b7xW1Q2j.WEM.g5LQ/NSSmHnhZpfolFAH.ltD0GGRKGS'),
('CRISTIAN PEREZ', 12345679, '$2y$10$Nz6/ESQw7b7xW1Q2j.WEM.g5LQ/NSSmHnhZpfolFAH.ltD0GGRKGS'),
('DANILO ORDONEZ', 12345670, '$2y$10$Nz6/ESQw7b7xW1Q2j.WEM.g5LQ/NSSmHnhZpfolFAH.ltD0GGRKGS');

INSERT INTO usuario (usu_nombre,usu_codigo, usu_password) VALUES 
('ANA PEREZ', 12345671, '$2y$10$Nz6/ESQw7b7xW1Q2j.WEM.g5LQ/NSSmHnhZpfolFAH.ltD0GGRKGS'),
('JORGE SALAZAR', 12345672, '$2y$10$Nz6/ESQw7b7xW1Q2j.WEM.g5LQ/NSSmHnhZpfolFAH.ltD0GGRKGS');

INSERT INTO aplicacion (app_nombre) VALUES ('CARGO_ESPRESSO');

INSERT INTO rol (rol_nombre, rol_nombre_ct, rol_app) VALUES 
('USUARIO NORMAL', 'USER', 1),
('USUARIO ADMINISTRATIVO', 'ADMINISTRATIVO', 1),
('USUARIO ADMINISTRADOR', 'ADMINSTRADOR', 1);

INSERT INTO permiso (permiso_usuario,permiso_rol) VALUES 
(1,1), (2,2), (3,3); 

INSERT INTO permiso (permiso_usuario,permiso_rol) VALUES 
(4,1), (5,1) 

-- ENVIOS
CREATE TABLE envios (
    envio_id INT AUTO_INCREMENT PRIMARY KEY,
    envio_cliente INT,
    envio_empleado VARCHAR(150),
    envio_origen VARCHAR(75),
    envio_destino VARCHAR(75),
    envio_fecha DATETIME,
    envio_situacion VARCHAR(50), -- BODEGA, EN RUTA, ENTREGADO 
    FOREIGN KEY (envio_cliente) REFERENCES usuario (usu_id)
);

INSERT INTO envios (envio_cliente,envio_empleado,envio_origen,envio_destino,envio_fecha,envio_situacion)
VALUES 
(1, 'JUAN PEREZ', '14.6288, -90.4992', '14.9639, -89.9734', '2024-09-01 08:15', 'BODEGA' ),
(1, 'MARIA LOPEZ', '16.9112, -89.1465', '15.4833, -90.3750', '2024-09-02 10:30', 'EN RUTA'),
(1, 'ANDREA GARCIA', '14.8321, -91.5226', '14.6288, -90.4992', '2024-09-03 14:45', 'ENTREGADO');


INSERT INTO envios (envio_cliente,envio_empleado,envio_origen,envio_destino,envio_fecha,envio_situacion)
VALUES 
(4, 'EMPLEADO 1', '15.6340, -90.5560', '15.3298, -91.4680', '2024-09-07 09:00', 'EN RUTA'),
(4, 'EMPLEADO 2', '14.9877, -91.7764', '14.5147, -91.5072', '2024-09-08 11:30', 'EN RUTA'),
(5, 'EMPLEADO 3', '14.5508, -91.7304', '14.6288, -90.4992', '2024-09-09 13:00', 'EN RUTA');