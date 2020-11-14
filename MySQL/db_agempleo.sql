# Crear tabla personas (user_)
CREATE TABLE tbl_usuarios(
    user_pkid VARCHAR (20) PRIMARY KEY NOT NULL,
    user_ddi SET('TI', 'CC', 'NIT') NOT NULL DEFAULT 'CC',
    user_nombres VARCHAR(100) NOT NULL,
    user_apellidos VARCHAR(100) NOT NULL,
    user_sexo SET('Masculino', 'Femenino') NOT NULL,
    user_contacto VARCHAR(10) NOT NULL,
    user_correo VARCHAR(100) NOT NULL,
    user_password VARCHAR(100) NOT NULL,
    user_dpto VARCHAR(20) NOT NULL,
    user_ciudad VARCHAR(20) NOT NULL,
    user_direccion VARCHAR(50) NOT NULL,
    user_fechaNac DATETIME NOT NULL,
    user_descripcionPerfil VARCHAR(8000) NOT NULL,
    user_fechaUser DATETIME NOT NULL,
    user_estado SET('Activo', 'Inactivo', 'Bloqueado', 'Suspendido') NOT NULL
) ENGINE = INNODB;

# Crear tabla expLaboral (exp_)
CREATE TABLE tbl_expLaboral(
    exp_pkid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    exp_fk_pkid VARCHAR(20) NOT NULL,
    exp_nombreEmpresa VARCHAR(100) NOT NULL,
    exp_cargo VARCHAR(50) NOT NULL,
    exp_contactoEmpresa VARCHAR(10) NULL,
    exp_fechaIni DATETIME NOT NULL,
    exp_fechaFin DATETIME NOT NULL,
    FOREIGN KEY(exp_fk_pkid) REFERENCES  tbl_usuarios(user_pkid) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE = INNODB;

# Crear tabla expLaboral (exp_)
CREATE TABLE tbl_expLaboral(
    exp_pkid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    exp_fk_pkid VARCHAR(20) NOT NULL,
    exp_nombreEmpresa VARCHAR(100) NOT NULL,
    exp_cargo VARCHAR(50) NOT NULL,
    exp_contactoEmpresa VARCHAR(10) NULL,
    exp_fechaIni DATETIME NOT NULL,
    exp_fechaFin DATETIME NOT NULL,
    FOREIGN KEY(exp_fk_pkid) REFERENCES  tbl_usuarios(user_pkid) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE = INNODB;

# Crear tabla estudios (est_)
CREATE TABLE tbl_estudios(
    est_pkid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    est_fk_pkid VARCHAR(20) NOT NULL,
    est_nombreInstituto VARCHAR(50) NOT NULL,
    est_Titulo VARCHAR(50) NOT NULL,
    est_fechaIni DATETIME NOT NULL,
    est_fechaFin DATETIME NOT NULL,
    FOREIGN KEY(est_fk_pkid) REFERENCES  tbl_usuarios(user_pkid) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE = INNODB;

# Crear tabla empleo (emp_)
CREATE TABLE tbl_empleos(
    emp_pkid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    emp_titulo VARCHAR(50) NOT NULL,
    emp_descripcion VARCHAR(8000) NOT NULL,
    emp_salario VARCHAR (20) NOT NULL,
    emp_tipoEmpleo VARCHAR (50) NOT NULL,
    emp_lugar VARCHAR (50) NOT NULL,
    emp_fechaPubli DATETIME NOT NULL,
    emp_fechaFin DATETIME NOT NULL,
    emp_fk_pkid VARCHAR(20) NOT NULL,
    FOREIGN KEY(emp_fk_pkid) REFERENCES  tbl_usuarios(user_pkid) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE = INNODB;

# Crear tabla postulaciones (pos_)
CREATE TABLE tbl_postulaciones(
    pos_pkid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pos_fk_pkid VARCHAR(20) NOT NULL,
    pos_fkEmpleo INT UNSIGNED NOT NULL,
    pos_fecha DATETIME NOT NULL,
    FOREIGN KEY(pos_fk_pkid) REFERENCES  tbl_usuarios(user_pkid) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY(pos_fkEmpleo) REFERENCES  tbl_empleos(emp_pkid) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE = INNODB;

# Crear procedimiento almacenado para registrar estudiante y crear usuario
DELIMITER //
CREATE PROCEDURE SP_Registrar(IN varPKID VARCHAR(20), IN varNombres VARCHAR(100), IN varApellidos VARCHAR(100), IN varCorreo VARCHAR(100))	
BEGIN        
    INSERT INTO tbl_personas (user_pkid, user_nombres, user_apellidos, user_correo) 
    VALUES (varPKID, varNombres, varApellidos, varCorreo);
    
    INSERT INTO tbl_usuarios(user_pkUsuario, user_contraseña, user_fkPersona, user_fkRol, user_fkEstado, user_fecha)
    VALUES (varCorreo, varPKID, varPKID, 1, 1, CURRENT_DATE);
END

# Crear procedimiento almacenado para registrar empresa y crear usuario
DELIMITER //
CREATE PROCEDURE SP_RegistrarEmpresa (
    				IN varPKID VARCHAR(20), 
    				IN varNombres VARCHAR(100), 
    				IN varCorreo VARCHAR(100))	
BEGIN        
    INSERT INTO tbl_personas (user_pkid, user_ddi, user_nombres, user_correo) 
    VALUES (varPKID, 'NIT', varNombres, varCorreo);
    
    INSERT INTO tbl_usuarios(user_pkUsuario, user_contraseña, user_fkPersona, user_fkRol, user_fkEstado, user_fecha)
    VALUES (varCorreo, varPKID, varPKID, 2, 1, CURRENT_DATE);
END