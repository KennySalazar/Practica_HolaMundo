CREATE DATABASE IF NOT EXISTS clinica_mvc CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE clinica_mvc;

-- PACIENTES
CREATE TABLE pacientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dpi VARCHAR(20) UNIQUE,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  sexo ENUM('Masculino','Femenino') NOT NULL,
  fecha_nacimiento DATE,
  telefono VARCHAR(30),
  email VARCHAR(255),
  activo BOOLEAN NOT NULL DEFAULT TRUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- MEDICOS
CREATE TABLE medicos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  colegiado VARCHAR(30) UNIQUE,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  especialidad VARCHAR(120),
  telefono VARCHAR(30),
  email VARCHAR(255),
  activo BOOLEAN NOT NULL DEFAULT TRUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ORDEN DE EXAMEN (solicitud)
CREATE TABLE ordenes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  paciente_id INT NOT NULL,
  medico_id INT,
  tipo ENUM('orina','heces') NOT NULL,
  fecha DATE NOT NULL DEFAULT (CURRENT_DATE),
  estado ENUM('pendiente','reportado') NOT NULL DEFAULT 'pendiente',
  FOREIGN KEY (paciente_id) REFERENCES pacientes(id),
  FOREIGN KEY (medico_id) REFERENCES medicos(id)
);

-- RESULTADOS ORINA
CREATE TABLE resultados_orina (
  id INT AUTO_INCREMENT PRIMARY KEY,
  orden_id INT UNIQUE NOT NULL,
  color VARCHAR(50),
  aspecto VARCHAR(50),
  ph DECIMAL(3,1),
  densidad VARCHAR(20),
  glucosa VARCHAR(20),
  proteinas VARCHAR(20),
  cetonas VARCHAR(20),
  bilirrubina VARCHAR(20),
  sangre_oculta VARCHAR(20),
  nitritos VARCHAR(20),
  leucocitos VARCHAR(20),
  observaciones TEXT,
  FOREIGN KEY (orden_id) REFERENCES ordenes(id)
);

-- RESULTADOS HECES
CREATE TABLE resultados_heces (
  id INT AUTO_INCREMENT PRIMARY KEY,
  orden_id INT UNIQUE NOT NULL,
  color VARCHAR(50),
  consistencia VARCHAR(50),
  moco VARCHAR(10),
  sangre_visible VARCHAR(10),
  ph DECIMAL(3,1),
  leucocitos VARCHAR(20),
  hematies VARCHAR(20),
  restos_alimenticios VARCHAR(50),
  parasitos VARCHAR(100),
  observaciones TEXT,
  FOREIGN KEY (orden_id) REFERENCES ordenes(id)
);

-- Datos de prueba
INSERT INTO pacientes (dpi,nombre,apellido,sexo,fecha_nacimiento,email)
VALUES ('1234567890101','Ana','Lopez','Femenino','1995-04-12','ana@example.com');

INSERT INTO medicos (colegiado,nombre,apellido,especialidad,email)
VALUES ('COL-555','Luis','Méndez','Medicina General','lm@example.com');
