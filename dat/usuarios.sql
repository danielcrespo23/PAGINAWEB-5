-- Borramos la tabla si existe para evitar errores al recrearla
DROP TABLE IF EXISTS `USUARIOS`;

CREATE TABLE `USUARIOS` (
    `EMAIL` VARCHAR(50) NOT NULL,
    `NOMBRE` VARCHAR(20) NOT NULL,
    `APELLIDO` VARCHAR(20) NOT NULL,
    `TELEFONO` VARCHAR(15) NOT NULL,
    `GRADOS` VARCHAR(50) NOT NULL,
    `CLAVE` VARCHAR(255) NOT NULL, -- <--- ESTA ES LA COLUMNA QUE TE FALTA
    PRIMARY KEY (`EMAIL`)
);

-- Insertamos los usuarios con la contraseña cifrada (la palabra '1234' cifrada)
-- IMPORTANTE: No pongas '1234' directamente, pon el hash que genera PHP.
INSERT INTO `USUARIOS` (`EMAIL`, `NOMBRE`, `APELLIDO`, `TELEFONO`, `GRADOS`, `CLAVE`) 
VALUES ('ernestorosso11@gmail.com', 'Ernesto', 'Rosso', '631057118', 'DAW', '$2y$10$uz9m9O1.SHT9K3mR2Iu9Y.mI8h6l/8HhN67IuYv/u/V8J9Y9Y9Y9Y');

INSERT INTO `USUARIOS` (`EMAIL`, `NOMBRE`, `APELLIDO`, `TELEFONO`, `GRADOS`, `CLAVE`) 
VALUES ('sebasalbertperez@gmail.com', 'Sebastian', 'Albert', '648502108', 'ASIR', '$2y$10$uz9m9O1.SHT9K3mR2Iu9Y.mI8h6l/8HhN67IuYv/u/V8J9Y9Y9Y9Y');