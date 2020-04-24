
/**
 * Author:  Rodrigo Robles
 * Created: 05-nov-2019
 */

-- Crear base de datos --
    CREATE DATABASE if NOT EXISTS DAW216DBDepartamentos;
-- Uso de la base de datos. --
    USE DAW216DBDepartamentos;
    

-- Crear tablas. --
    CREATE TABLE IF NOT EXISTS Departamento(
        CodDepartamento varchar(3) PRIMARY KEY,
        DescDepartamento varchar(255) NOT null
    );

-- Crear del usuario --
    CREATE USER IF NOT EXISTS 'usuarioDAW216DBdepartamentos'@'%' identified BY 'P@ssw0rd'; 

-- Dar permisos al usuario --
    GRANT ALL PRIVILEGES ON DAW216DBDepartamentos.* TO 'usuarioDAW216DBdepartamentos'@'%'; 