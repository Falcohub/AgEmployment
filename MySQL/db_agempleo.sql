# Crear tabla personas (prs_)
CREATE TABLE tbl_personas(
    prs_pkid VARCHAR(20) PRIMARY KEY NOT NULL,
    prs_ddi SET('TI', 'CC', 'NIT') NOT NULL DEFAULT 'CC',
    prs_nombres VARCHAR(100) NOT NULL,
    prs_apellidos VARCHAR(100) NOT NULL,
    prs_fkSexo INT UNSIGNED NOT NULL,
    prs_contacto VARCHAR(10) NOT NULL,
    prs_correo VARCHAR(50) NOT NULL,
    prs_dpto VARCHAR(20) NOT NULL,
    prs_ciudad VARCHAR(20) NOT NULL,
    prs_direccion VARCHAR(50) NOT NULL,
    prs_fechaNac VARCHAR(50) NOT NULL,
    prs_descripcionPerfil VARCHAR(8000) NOT NULL,
    FOREIGN KEY(prs_fkSexo) REFERENCES  tbl_sexo(sex_pkid)
) ENGINE = INNODB;

# Crear tabla sexo (sex_)
CREATE TABLE tbl_sexo(
    sex_pkid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    sex_descripcion VARCHAR(20) NOT NULL
) ENGINE = INNODB;

# Crear tabla usuarios (user_)
CREATE TABLE tbl_usuarios(
    user_pkUsuario VARCHAR(20) PRIMARY KEY NOT NULL,
    user_contraseña VARCHAR(20) NOT NULL,
    user_fkPersona VARCHAR(20) NOT NULL,
    user_fkEstado INT UNSIGNED NOT NULL,
    user_fecha DATETIME NOT NULL,
    FOREIGN KEY(user_fkPersona) REFERENCES  tbl_personas(prs_pkid) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY(user_fkEstado) REFERENCES  tbl_estado(est_pkid)
) ENGINE = INNODB;

# Crear tabla estado (est_)
CREATE TABLE tbl_estado(
    est_pkid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    est_descripcion VARCHAR(20) NOT NULL
) ENGINE = INNODB;

# Crear tabla expLaboral (expl_)
CREATE TABLE tbl_expLaboral(
    expl_pkid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    expl_fkUsuario VARCHAR(20) NOT NULL,
    expl_nombreEmpresa VARCHAR(50) NOT NULL,
    expl_cargo VARCHAR(50) NOT NULL,
    expl_contactoEmpresa VARCHAR(10) NULL,
    expl_fechaIni DATETIME NOT NULL,
    expl_fechaFin DATETIME NOT NULL,
    FOREIGN KEY(expl_fkUsuario) REFERENCES  tbl_usuarios(user_pkUsuario) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE = INNODB;

# Crear tabla estudios (est_)
CREATE TABLE tbl_estudios(
    est_pkid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    est_fkUsuario VARCHAR(20) NOT NULL,
    est_nombreInstituto VARCHAR(50) NOT NULL,
    est_Titulo VARCHAR(50) NOT NULL,
    est_fechaIni DATETIME NOT NULL,
    est_fechaFin DATETIME NOT NULL,
    FOREIGN KEY(est_fkUsuario) REFERENCES  tbl_usuarios(user_pkUsuario) ON UPDATE CASCADE ON DELETE RESTRICT
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
    emp_fkUsuario VARCHAR(20) NOT NULL,
    FOREIGN KEY(emp_fkUsuario) REFERENCES  tbl_usuarios(user_pkUsuario) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE = INNODB;

# Crear tabla postulaciones (pos_)
CREATE TABLE tbl_postulaciones(
    pos_pkid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pos_fkUsuario VARCHAR(20) NOT NULL,
    pos_fkEmpleo INT UNSIGNED NOT NULL,
    pos_fkEstado INT UNSIGNED NOT NULL,
    pos_fecha DATETIME NOT NULL,
    FOREIGN KEY(pos_fkUsuario) REFERENCES  tbl_usuarios(user_pkUsuario) ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY(pos_fkEmpleo) REFERENCES  tbl_empleos(emp_pkid),
    FOREIGN KEY(pos_fkEstado) REFERENCES  tbl_estado(est_pkid)
) ENGINE = INNODB;

# Crear procedimiento almacenado para registrar y crear usuario
DELIMITER //
CREATE PROCEDURE sp_registrar_estudiante(IN varPKID VARCHAR(20), IN varNombres VARCHAR(100), IN varApellidos VARCHAR(100), IN varCorreo VARCHAR(100), varContraseña varchar(100))
BEGIN
	DECLARE intBuscar INT
    SELECT intBuscar = (SELECT COUNT(*) FROM tbl_personas WHERE prs_pkid = varPKID;
    IF (intBuscar = 0)
    	BEGIN
    		INSERT INTO tbl_personas (prs_pkid, prs_ddi, prs_nombres, prs_apellidos, prs_correo, user_contraseña) 
        	VALUES (varPKID, varNombres, varApellidos, varCorreo, varContraseña);
        
       		INSERT INTO tbl_usuarios(user_pkUsuario, user_contraseña, user_fkPersona, user_fkEstado, user_fecha)
       	 	VALUES (varCorreo, varContraseña, varPKID, 1, CURRENT_DATE)
    END IF;
    IF (intBuscar = 1)
       	BEGIN
        	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El estudiante ya se encuentra registrado';
    END IF;              
END

DELIMITER //
CREATE PROCEDURE SP_Registrar(IN varPKID VARCHAR(20), IN varNombres VARCHAR(100), IN varApellidos VARCHAR(100), IN varCorreo VARCHAR(100))	
BEGIN        
    INSERT INTO tbl_personas (prs_pkid, prs_nombres, prs_apellidos, prs_correo) 
    VALUES (varPKID, varNombres, varApellidos, varCorreo);
    
    INSERT INTO tbl_usuarios(user_pkUsuario, user_contraseña, user_fkPersona, user_fkEstado, user_fecha)
    VALUES (varCorreo, varPKID, varPKID, 1, CURRENT_DATE);
END