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

INSERT INTO aplicacion (app_nombre) VALUES ('CARGO_ESPRESSO');

INSERT INTO rol (rol_nombre, rol_nombre_ct, rol_app) VALUES 
('USUARIO NORMAL', 'USER', 1),
('USUARIO ADMINISTRATIVO', 'ADMINISTRATIVO', 1),
('USUARIO ADMINISTRADOR', 'ADMINSTRADOR', 1);

INSERT INTO permiso (permiso_usuario,permiso_rol) VALUES 
(1,1), (2,2), (3,3); 
