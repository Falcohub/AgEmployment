-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-11-2020 a las 03:22:16
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: db_agempleo1
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla tbl_empleos
--

CREATE TABLE tbl_empleos (
  emp_pkid int(10) UNSIGNED NOT NULL,
  emp_titulo varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  emp_descripcion varchar(8000) COLLATE utf8_spanish_ci NOT NULL,
  emp_salario varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  emp_tipoEmpleo varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  emp_lugar varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  emp_fechaPubli date NOT NULL,
  emp_fechaFin date NOT NULL,
  emp_fkUsuario varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla tbl_empleos
--

INSERT INTO tbl_empleos (emp_pkid, emp_titulo, emp_descripcion, emp_salario, emp_tipoEmpleo, emp_lugar, emp_fechaPubli, emp_fechaFin, emp_fkUsuario) VALUES
(1, 'Desarrollador web', 'Se necesita desarrollador full stack PHP,HTML, CSS', '$980.000', 'Practica', 'Apartado, Antioquia', '2020-11-01', '2020-11-30', '001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla tbl_estudios
--

CREATE TABLE tbl_estudios (
  est_pkid int(10) UNSIGNED NOT NULL,
  est_fkUsuario varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  est_nombreInstituto varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  est_titulo varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  est_fechaIni date DEFAULT NULL,
  est_fechaFin date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla tbl_estudios
--

INSERT INTO tbl_estudios (est_pkid, est_fkUsuario, est_nombreInstituto, est_titulo, est_fechaIni, est_fechaFin) VALUES
(1, '001', 'UCLAM', 'Ingeniería en sistemas', '2017-01-20', '2020-11-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla tbl_explaboral
--

CREATE TABLE tbl_explaboral (
  exp_pkid int(10) UNSIGNED NOT NULL,
  exp_fkUsuario varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  exp_nombreEmpresa varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  exp_cargo varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  exp_contactoEmpresa varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  exp_fechaIni date DEFAULT NULL,
  exp_fechaFin date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla tbl_explaboral
--

INSERT INTO tbl_explaboral (exp_pkid, exp_fkUsuario, exp_nombreEmpresa, exp_cargo, exp_contactoEmpresa, exp_fechaIni, exp_fechaFin) VALUES
(1, '001', 'Google', 'Desarrollador web', '300', '2020-11-08', '2020-11-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla tbl_postulaciones
--

CREATE TABLE tbl_postulaciones (
  pos_pkid int(10) UNSIGNED NOT NULL,
  pos_fkUsuario varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  pos_fkEmpleo int(10) UNSIGNED NOT NULL,
  pos_Estado set('Activo','Inactivo') COLLATE utf8_spanish_ci NOT NULL,
  pos_fecha date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla tbl_postulaciones
--

INSERT INTO tbl_postulaciones (pos_pkid, pos_fkUsuario, pos_fkEmpleo, pos_Estado, pos_fecha) VALUES
(1, '001', 1, 'Activo', '2020-11-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla tbl_usuarios
--

CREATE TABLE tbl_usuarios (
  user_pkid varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  user_ddi set('TI','CC','NIT') COLLATE utf8_spanish_ci NOT NULL,
  user_nombres varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  user_apellidos varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  user_sexo set('Masculino','Femenino') COLLATE utf8_spanish_ci NOT NULL,
  user_contacto varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  user_correo varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  user_password varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  user_dpto varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  user_ciudad varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  user_direccion varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  user_fechaNac date DEFAULT NULL,
  user_perfil varchar(8000) COLLATE utf8_spanish_ci NOT NULL,
  user_fechaUser date NOT NULL,
  user_estado set('Activo','Inactivo','Bloqueado','Suspendido') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla tbl_usuarios
--

INSERT INTO tbl_usuarios (user_pkid, user_ddi, user_nombres, user_apellidos, user_sexo, user_contacto, user_correo, user_password, user_dpto, user_ciudad, user_direccion, user_fechaNac, user_perfil, user_fechaUser, user_estado) VALUES
('001', 'TI', 'Lefa', 'Herrera', 'Masculino', '10', 'lefa@gmail.com', '001', 'Antioquia', 'Carepa', 'Barrio obrero', '1996-11-09', 'Ingeniero de sistemas, especializado en desarrollo web', '2020-11-11', 'Activo'),
('0011', 'NIT', 'Banacol', '', '', '034', 'banacol@gmail.com', '0011', 'Antioquia', 'Apartadó', 'Barrio Fundadore', NULL, 'Empresa dedicada al sector bananero', '2020-11-11', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla tbl_empleos
--
ALTER TABLE tbl_empleos
  ADD PRIMARY KEY (emp_pkid),
  ADD KEY emp_fkUsuario (emp_fkUsuario);

--
-- Indices de la tabla tbl_estudios
--
ALTER TABLE tbl_estudios
  ADD PRIMARY KEY (est_pkid),
  ADD KEY est_fkUsuario (est_fkUsuario);

--
-- Indices de la tabla tbl_explaboral
--
ALTER TABLE tbl_explaboral
  ADD PRIMARY KEY (exp_pkid),
  ADD KEY exp_fkUsuario (exp_fkUsuario);

--
-- Indices de la tabla tbl_postulaciones
--
ALTER TABLE tbl_postulaciones
  ADD PRIMARY KEY (pos_pkid),
  ADD KEY pos_fkUsuario (pos_fkUsuario),
  ADD KEY pos_fkEmpleo (pos_fkEmpleo);

--
-- Indices de la tabla tbl_usuarios
--
ALTER TABLE tbl_usuarios
  ADD PRIMARY KEY (user_pkid);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla tbl_empleos
--
ALTER TABLE tbl_empleos
  MODIFY emp_pkid int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla tbl_estudios
--
ALTER TABLE tbl_estudios
  MODIFY est_pkid int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla tbl_explaboral
--
ALTER TABLE tbl_explaboral
  MODIFY exp_pkid int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla tbl_postulaciones
--
ALTER TABLE tbl_postulaciones
  MODIFY pos_pkid int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla tbl_empleos
--
ALTER TABLE tbl_empleos
  ADD CONSTRAINT tbl_empleos_ibfk_1 FOREIGN KEY (emp_fkUsuario) REFERENCES tbl_usuarios (user_pkid) ON UPDATE CASCADE;

--
-- Filtros para la tabla tbl_estudios
--
ALTER TABLE tbl_estudios
  ADD CONSTRAINT tbl_estudios_ibfk_1 FOREIGN KEY (est_fkUsuario) REFERENCES tbl_usuarios (user_pkid) ON UPDATE CASCADE;

--
-- Filtros para la tabla tbl_explaboral
--
ALTER TABLE tbl_explaboral
  ADD CONSTRAINT tbl_explaboral_ibfk_1 FOREIGN KEY (exp_fkUsuario) REFERENCES tbl_usuarios (user_pkid) ON UPDATE CASCADE;

--
-- Filtros para la tabla tbl_postulaciones
--
ALTER TABLE tbl_postulaciones
  ADD CONSTRAINT tbl_postulaciones_ibfk_1 FOREIGN KEY (pos_fkUsuario) REFERENCES tbl_usuarios (user_pkid) ON UPDATE CASCADE,
  ADD CONSTRAINT tbl_postulaciones_ibfk_2 FOREIGN KEY (pos_fkEmpleo) REFERENCES tbl_empleos (emp_pkid) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
