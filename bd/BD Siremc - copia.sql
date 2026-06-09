DROP DATABASE IF EXISTS bdsiremc;
CREATE DATABASE IF NOT EXISTS bdsiremc;
USE bdsiremc;

CREATE TABLE modulo (
    idmod BIGINT(6) NOT NULL AUTO_INCREMENT,
    nommod VARCHAR(200) NOT NULL,
    icomod VARCHAR(200) DEFAULT NULL,
    actmod INT(1) DEFAULT 1,
    ordmod INT(3) DEFAULT NULL,
    idpef BIGINT(11),
    PRIMARY KEY (idmod)
) ENGINE=InnoDB;

INSERT INTO modulo (idmod, nommod, icomod, actmod, ordmod, idpef) VALUES 
(1,'Datos personales','fa fa-user','1','1','1'),
(11,'M. Matriculas','fa fa-user','1','2','1'),
(12,'M. Cursos','fa fa-user','1','3','1'),
(13,'M. Cuentas','fa fa-user','1','4','1'),
(21,'M. Usuarios','fa fa-user','1','5','1'),
(99,'M. Configuración','fa fa-user','1','99','1');

CREATE TABLE perfil (
    idpef BIGINT(11) NOT NULL AUTO_INCREMENT,
    nompef VARCHAR(50) NOT NULL,
    pgprin BIGINT(11) DEFAULT NULL,
    idmod BIGINT(11) NOT NULL,
    PRIMARY KEY (idpef),
    CONSTRAINT fk_perfil_modulo FOREIGN KEY (idmod) REFERENCES modulo(idmod)
) ENGINE=InnoDB;

INSERT INTO perfil (idpef, nompef, pgprin, idmod) VALUES 
(1,'Administrador','1','99');

CREATE TABLE pagina (
    idpag BIGINT(11) NOT NULL AUTO_INCREMENT,
    nompag VARCHAR(40) NOT NULL,
    arcpag VARCHAR(100) NOT NULL,
    mospag INT(3) DEFAULT NULL,
    ordpag INT(3) DEFAULT NULL,
    icopag VARCHAR(255) DEFAULT NULL,
    despag TEXT DEFAULT NULL,
    PRIMARY KEY (idpag)
) ENGINE=InnoDB;

INSERT INTO pagina (idpag, nompag, arcpag, mospag, ordpag, icopag) 
VALUES 
(1,'M. Matriculas','views/vusudp.php',1,1,'fa-solid fa-user'),
(2,'Estudiante','views/vmatest.php',1,2,'fa-solid fa-user'),
(3,'Matricula','views/vmatmat.php',1,3,'fa-solid fa-user'),
(4,'Estudiante por Acudiente','views/vmatexa.php',1,4,'fa-solid fa-user'),
(5,'Reporte Matricula','views/vmatrmat.php',1,5,'fa-solid fa-user'),
(6,'Curso','views/vmatcur.php',1,6,'fa-solid fa-user'),
(7,'Listado por curso','views/vmatlxc.php',1,7,'fa-solid fa-user'),
(8,'Reporte Listados por curso','views/vmatrlc.php',1,8,'fa-solid fa-user'),
(9,'Reporte asistencia por curso','views/vmatrac.php',1,9,'fa-solid fa-user'),
(10,'Item','views/vcueite.php',1,10,'fa-solid fa-user'),
(11,'Item Valor','views/vcueivl.php',1,11,'fa-solid fa-user'),
(12,'Factura','views/vcuefac.php',1,12,'fa-solid fa-user'),
(13,'Detalle de factura','views/vcuedfa.php',1,13,'fa-solid fa-user'),
(14,'Listado de Pagos','views/vcuelpg.php',1,14,'fa-solid fa-user'),
(15,'Fijo','views/vcuegsf.php',1,15,'fa-solid fa-user'),
(16,'Gasto','views/vcuedgf.php',1,16,'fa-solid fa-user'),
(17,'R. Factura','views/vcuerfac.php',1,17,'fa-solid fa-user'),
(18,'R. Ingresos vs Gastos','views/vcuerixg.php',1,18,'fa-solid fa-user'),
(19,'Carga masiva de items','views/vcuemite.php',1,19,'fa-solid fa-user'),
(20,'Carga masiva de gastos','views/vcuemgsf.php',1,20,'fa-solid fa-user'),
(21,'Carga masiva de pagos','views/vcuempgs.php',1,21,'fa-solid fa-user'),
(22,'Carga de pago','views/vcuecpgs.php',1,22,'fa-solid fa-user'),
(23,'Acudiente','views/vusuacu.php',1,23,'fa-solid fa-user'),
(24,'Persona','views/vusuper.php',1,24,'fa-solid fa-user'),
(25,'Perfil','views/vusupef.php',1,25,'fa-solid fa-user'),
(26,'Profesión','views/vusuprf.php',1,26,'fa-solid fa-user'),
(27,'Carga masiva de usuarios','views/vusucusu.php',1,27,'fa-solid fa-user'),
(28,'Pagina','views/vcofpag.php',1,28,'fa-solid fa-user'),
(29,'Modulo','views/vcofmod.php',1,29,'fa-solid fa-user'),
(30,'Dominio','views/vcofdom.php',1,30,'fa-solid fa-user'),
(31,'Valor','views/vcofval.php',1,31,'fa-solid fa-user'),
(32,'Vigencia','views/vcofvig.php',1,32,'fa-solid fa-user'),
(33,'Ubicación','views/vcofubi.php',1,33,'fa-solid fa-user'),
(34,'Configuración software','views/vcofcof.php',1,34,'fa-solid fa-user'),
(35,'Sesión','views/vini.php',1,35,'fa-solid fa-user'),
(36,'Contraseña','views/volv.php',1,36,'fa-solid fa-user'),
(37,'Contraseña','views/vrcn.php',1,37,'fa-solid fa-user');

CREATE TABLE pagper (
    idpag BIGINT(11) NOT NULL,
    idpef BIGINT(11) NOT NULL,
    CONSTRAINT fk_pgxpe FOREIGN KEY (idpag) REFERENCES pagina(idpag),
    CONSTRAINT fk_pexpg FOREIGN KEY (idpef) REFERENCES perfil(idpef)
) ENGINE=InnoDB;

CREATE TABLE ubicacion (
    codubi BIGINT(11) NOT NULL,
    nomubi VARCHAR(30) NOT NULL,
    depubi INT(11) NOT NULL,
    PRIMARY KEY (codubi)
) ENGINE=InnoDB;

INSERT INTO ubicacion (codubi, nomubi, depubi) VALUES
(25175, 'Chía', 0);

CREATE TABLE profesion (
    idpro INT(7) NOT NULL AUTO_INCREMENT,
    nompro VARCHAR(50) NOT NULL,
    PRIMARY KEY (idpro)
) ENGINE=InnoDB;

CREATE TABLE vigencia (
    novig BIGINT(6) NOT NULL AUTO_INCREMENT,
    finiv DATE NOT NULL,
    ffinv DATE NOT NULL,
    actv INT(1) DEFAULT 1,
    PRIMARY KEY (novig)
) ENGINE=InnoDB;

CREATE TABLE persona (
    idper BIGINT(15) NOT NULL AUTO_INCREMENT,
    tipdper BIGINT(11) DEFAULT 21,
    nuiper BIGINT(15) NOT NULL, -- Centraliza NUIP, NoID y NoDocEmp
    nomper VARCHAR(30) NOT NULL,
    papeper VARCHAR(30) NOT NULL,
    sapeper VARCHAR(30) DEFAULT NULL,
    fnacper DATE DEFAULT NULL,       -- Específico Estudiante
    ubinac BIGINT(11) DEFAULT NULL,
    rhper INT(5) DEFAULT NULL,             -- Específico Estudiante
    aleper VARCHAR(200) DEFAULT NULL,      -- Específico Estudiante
    fotoper VARCHAR(100) DEFAULT NULL,      -- Específico Estudiante
    dircper VARCHAR(100) DEFAULT NULL,
    ubidirc BIGINT(11) DEFAULT NULL,  -- Relación fija
    telcper VARCHAR(20) DEFAULT NULL,
    celcper VARCHAR(10) DEFAULT NULL,
    dirtper VARCHAR(100) DEFAULT NULL,
    ubidirt BIGINT(11) DEFAULT NULL,
    celtper VARCHAR(10) DEFAULT NULL,
    emaper VARCHAR(100) DEFAULT NULL,
    pasper VARCHAR(150) DEFAULT NULL,      -- Para Empleados/Acudientes con acceso
    actper TINYINT(1) DEFAULT 1,     -- actemp / actacu
    fsolper DATETIME DEFAULT NULL, -- fecsolacu / fecsolemp
    clvper VARCHAR(250) DEFAULT NULL,
    ecmper TINYINT(1) DEFAULT 0, 
    segper int(6) DEFAULT NULL,
    
    -- Llaves Foráneas integradas
    idpro INT(7) DEFAULT NULL,          -- Profesión (Acudiente)
    
    PRIMARY KEY (idper),
    UNIQUE KEY (nuiper),
    CONSTRAINT fk_persona_profesion FOREIGN KEY (idpro) REFERENCES profesion(idpro),
    CONSTRAINT fk_persona_ubicacion FOREIGN KEY (ubidirc) REFERENCES ubicacion(codubi)
) ENGINE=InnoDB;

INSERT INTO persona (idper, nuiper, nomper, papeper, sapeper, fnacper, ubinac, rhper, aleper, fotoper, dircper, ubidirc, telcper, celcper, dirtper, ubidirt, celtper, emaper, pasper, actper, fsolper, clvper, ecmper, segper, idpro) VALUES
(1, 457899877, 'Robinson Enrique', 'Rincon', 'Ramirez', '1982-01-19', 25175, 11, NULL, NULL, 'Calle Siempre Viva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL);


CREATE TABLE pefxper (
    idper BIGINT(11) NOT NULL,
    idpef BIGINT(11) NOT NULL,
    favpxp TINYINT(1) DEFAULT 0, -- Favorito
    CONSTRAINT fk_pfxpr FOREIGN KEY (idper) REFERENCES persona(idper),
    CONSTRAINT fk_prxpf FOREIGN KEY (idpef) REFERENCES perfil(idpef)
) ENGINE=InnoDB;

CREATE TABLE dominio (
    iddom BIGINT(11) NOT NULL AUTO_INCREMENT,
    nomdom VARCHAR(70) NOT NULL,
    PRIMARY KEY (iddom)
) ENGINE=InnoDB;

INSERT INTO dominio (iddom, nomdom) VALUES
(1, 'Estados'),
(2, 'RH'),
(3, 'Tipos de Documentos');

CREATE TABLE valor (
    idval BIGINT(11) NOT NULL AUTO_INCREMENT,
    iddom BIGINT(11) NOT NULL,
    nomval VARCHAR(255) NOT NULL,
    parval VARCHAR(255) DEFAULT NULL,
    actval TINYINT(1) DEFAULT 1,
    PRIMARY KEY (idval),
    CONSTRAINT fk_domval FOREIGN KEY (iddom) REFERENCES dominio(iddom)
) ENGINE=InnoDB;

INSERT INTO valor (idval, iddom, nomval, parval, actval) VALUES
(1, 1, 'Activo', NULL, 1),
(2, 1, 'Desactivado', NULL, 1),
(11, 2, 'O+', NULL, 1),
(12, 2, 'O-', NULL, 1),
(13, 2, 'A+', NULL, 1),
(14, 2, 'A-', NULL, 1),
(15, 2, 'AB+', NULL, 1),
(16, 2, 'AB-', NULL, 1),
(17, 2, 'B+', NULL, 1),
(18, 2, 'B-', NULL, 1),
(21, 3, 'Registro Civil', NULL, 1),
(22, 3, 'C.C', NULL, 1),
(23, 3, 'T.I', NULL, 1),
(24, 3, 'C.E', NULL, 1),
(25, 3, 'Pasaporte', NULL, 1),
(26, 3, 'Carnét de Vacunas', NULL, 1);

-- Tabla: estxacu (Relación muchos a muchos entre Estudiantes y Acudientes)
CREATE TABLE estxacu (
    idest BIGINT(15) NOT NULL,
    idacu BIGINT(15) NOT NULL,
    parexa INT(5) NOT NULL, -- parentesco
    CONSTRAINT fk_exa_estudiante FOREIGN KEY (idest) REFERENCES persona(idper),
    CONSTRAINT fk_exa_acudiente FOREIGN KEY (idacu) REFERENCES persona(idper)
) ENGINE=InnoDB;

-- Tabla: curso (Relación muchos a muchos entre Estudiantes y Acudientes)
CREATE TABLE curso (
    idcur BIGINT(15) NOT NULL,
    nomcur VARCHAR(255) NOT NULL,
    depcur BIGINT(15) NOT NULL,
    idper BIGINT(15) NOT NULL,
    PRIMARY KEY (idcur),
    CONSTRAINT fk_cxp_persona FOREIGN KEY (idper) REFERENCES persona(idper)
) ENGINE=InnoDB;

INSERT INTO curso (idcur, nomcur, depcur, idper) VALUES
(1000, 'Primero', 0,1),
(1001, 'Primero A', 1000,1),
(1002, 'Primero B', 1000,1),
(2000, 'Segundo', 0,1),
(2001, 'Segundo A', 2000,1),
(2002, 'Segundo B', 2000,1),
(3000, 'Tercero', 0,1),
(3001, 'Tercero', 3000,1),
(4000, 'Cuarto', 0,1),
(4001, 'Cuarto', 4000,1),
(5000, 'Quinto', 0,1),
(5001, 'Quinto', 5000,1),
(6000, 'Sexto', 0,1),
(6001, 'Sexto', 6000,1),
(7000, 'Séptimo', 0,1),
(7001, 'Séptimo', 7000,1),
(8000, 'Octavo', 0,1),
(8001, 'Octavo', 8000,1),
(9000, 'Noveno', 0,1),
(9001, 'Noveno', 9000,1),
(10000, 'Decimo', 0,1),
(10001, 'Decimo', 10000,1),
(11000, 'Undecimo', 0,1),
(11001, 'Undecimo', 11000,1);

-- Tabla: matricula (Relaciona Estudiante y Vigencia)
CREATE TABLE matricula (
    nomat BIGINT(7) NOT NULL AUTO_INCREMENT,
    novig BIGINT(6) NOT NULL,
    fecmat DATETIME NOT NULL,
    folnmat BIGINT(6) NOT NULL,
    idcur BIGINT(15)  NOT NULL,
    idest BIGINT(15) NOT NULL, -- El estudiante matriculado
    pesmat DECIMAL(10,1),
    estmat DECIMAL(10,1),
    insedu VARCHAR(60),
    nivel VARCHAR(10),
    grado INT(5),
    ano BIGINT(6),
    ubimat BIGINT(11),
    actmat TINYINT(1),
    PRIMARY KEY (nomat),
    CONSTRAINT fk_mat_vigencia FOREIGN KEY (novig) REFERENCES vigencia(novig),
    CONSTRAINT fk_mat_curso FOREIGN KEY (idcur) REFERENCES curso(idcur),
    CONSTRAINT fk_mat_estudiante FOREIGN KEY (idest) REFERENCES persona(idper)
) ENGINE=InnoDB;

-- Tabla: factura
CREATE TABLE factura (
    nofact BIGINT(6) NOT NULL AUTO_INCREMENT,
    idest BIGINT(15) NOT NULL, -- El estudiante responsable de la cuenta
    idemp BIGINT(11) NOT NULL, -- El empleado que genera la factura
    fecha DATETIME NOT NULL,
    PRIMARY KEY (nofact),
    CONSTRAINT fk_fac_estudiante FOREIGN KEY (idest) REFERENCES persona(idper),
    CONSTRAINT fk_fac_empleado FOREIGN KEY (idemp) REFERENCES persona(idper)
) ENGINE=InnoDB;

CREATE TABLE gastofijo (
    nogas INT(6) NOT NULL AUTO_INCREMENT,
    nomgas VARCHAR(70) NOT NULL,
    valgas BIGINT(15) NOT NULL,
    PRIMARY KEY (nogas)
) ENGINE=InnoDB;

CREATE TABLE registrogas (
    nregas INT(5) NOT NULL AUTO_INCREMENT,
    fecgas DATETIME NOT NULL,
    nomgas VARCHAR(70) NOT NULL,
    valor BIGINT(15) NOT NULL,
    PRIMARY KEY (nregas)
) ENGINE=InnoDB;

CREATE TABLE item (
    noitem BIGINT(6) NOT NULL AUTO_INCREMENT,
    nomitem VARCHAR(70) NOT NULL,
    PRIMARY KEY (noitem)
) ENGINE=InnoDB;

CREATE TABLE itemval (
    noitval BIGINT(12) NOT NULL AUTO_INCREMENT,
    noitem BIGINT(6) NOT NULL,
    novig BIGINT(6) NOT NULL,
    valor BIGINT(15) NOT NULL,
    PRIMARY KEY (noitval),
    CONSTRAINT fk_iv_item FOREIGN KEY (noitem) REFERENCES item(noitem),
    CONSTRAINT fk_iv_vigencia FOREIGN KEY (novig) REFERENCES vigencia(novig)
) ENGINE=InnoDB;

CREATE TABLE detite (
    nodite BIGINT(6) NOT NULL AUTO_INCREMENT,
    nofact BIGINT(6) NOT NULL,
    noitval BIGINT(12) NOT NULL,
    cant BIGINT(10) NOT NULL,
    PRIMARY KEY (nodite),
    CONSTRAINT fk_det_factura FOREIGN KEY (nofact) REFERENCES factura(nofact),
    CONSTRAINT fk_det_itemval FOREIGN KEY (noitval) REFERENCES itemval(noitval)
) ENGINE=InnoDB;

CREATE TABLE docum (
    coddoc BIGINT(6) NOT NULL AUTO_INCREMENT,
    nomat BIGINT(7) NOT NULL,
    rutdoc VARCHAR(160) NOT NULL,
    titdoc VARCHAR(50) NOT NULL,
    PRIMARY KEY (coddoc),
    CONSTRAINT fk_doc_matricula FOREIGN KEY (nomat) REFERENCES matricula(nomat)
) ENGINE=InnoDB;

CREATE TABLE configuracion (
    nocnf BIGINT(20) NOT NULL AUTO_INCREMENT,
    nomcnf VARCHAR(255) NOT NULL,
    dircnf VARCHAR(255) NOT NULL,
    telcnf VARCHAR(255) NOT NULL,
    logocnf VARCHAR(255) NOT NULL,
    nomescnf BIGINT(20), -- Numero de mesas
    tiecnf BIGINT(20), -- Tiempo de actualización comandas
    PRIMARY KEY (nocnf)
) ENGINE=InnoDB;