#
# TABLE STRUCTURE FOR: t_areas
#

CREATE TABLE `t_areas` (
  `ideare` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'IDENTIFICADOR DEL AREA',
  `desare` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'NOMBRE DEL AREA',
  PRIMARY KEY (`ideare`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `t_areas` (`ideare`, `desare`) VALUES (1, 'INICIAL');
INSERT INTO `t_areas` (`ideare`, `desare`) VALUES (2, 'PRIMARIA');
INSERT INTO `t_areas` (`ideare`, `desare`) VALUES (3, 'SECUNDARIA');
INSERT INTO `t_areas` (`ideare`, `desare`) VALUES (4, 'LAB COMPUTO 1');
INSERT INTO `t_areas` (`ideare`, `desare`) VALUES (5, 'LAB COMPUTO 2');
INSERT INTO `t_areas` (`ideare`, `desare`) VALUES (6, 'PROFESORES');
INSERT INTO `t_areas` (`ideare`, `desare`) VALUES (7, 'ADMINISTRACIÓN');
INSERT INTO `t_areas` (`ideare`, `desare`) VALUES (8, 'SISTEMAS');


#
# TABLE STRUCTURE FOR: t_ambientes
#

CREATE TABLE `t_ambientes` (
  `ideamb` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomamb` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desamb` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ideare` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ideamb`,`ideare`),
  KEY `fk_t_ambientes_t_areas1_idx` (`ideare`),
  CONSTRAINT `fk_t_ambientes_t_areas1` FOREIGN KEY (`ideare`) REFERENCES `t_areas` (`ideare`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (1, 'INI - AUL - 01', 'NIDO B', 1);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (2, 'INI - AUL - 02', 'KINDER A', 1);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (3, 'INI - AUL - 03', 'KINDER B', 1);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (4, 'INI - AUL - 04', 'PRE NIDO', 1);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (5, 'INI - AUL - 05', 'NIDO A', 1);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (6, 'INI - AUL - 06', 'PRE KINDER A', 1);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (7, 'INI - AUL - 07', 'PRE KINDER B', 1);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (8, 'INI - COO - 01', 'COORDINACIÓN', 1);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (9, 'INI - PSI - 01', 'PSICOLOGÍA', 1);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (10, 'INI - REC - 01', 'RECEPCIÓN', 1);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (11, 'PRI - AUL - 01', '1 A', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (12, 'PRI - AUL - 02', '1 B', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (13, 'PRI - AUL - 03', '1 C', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (14, 'PRI - AUL - 04', '2 A', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (15, 'PRI - AUL - 05', '2 B', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (16, 'PRI - AUL - 06', '2 C', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (17, 'PRI - AUL - 07', '4 A', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (18, 'PRI - AUL - 08', '4 B', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (19, 'PRI - AUL - 09', '3 A', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (20, 'PRI - AUL - 10', '3 B', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (21, 'PRI - AUL - 11', '3 C', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (22, 'PRI - AUL - 12', '4 C', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (23, 'PRI - AUL - 13', '5 B', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (24, 'PRI - AUL - 14', '5 A', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (25, 'PRI - AUL - 15', '5 C', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (26, 'PRI - PSI - 01', 'PSICOLOGÍA 1', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (27, 'PRI - PSI - 02', 'PSICOLOGÍA 2', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (28, 'PRI - COO - 01', 'COORDINACIÓN', 2);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (29, 'SEC - AUL - 01', 'I C', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (30, 'SEC - AUL - 02', 'I B', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (31, 'SEC - AUL - 03', 'IV B', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (32, 'SEC - AUL - 04', 'IV A', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (33, 'SEC - AUL - 05', '6 B', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (34, 'SEC - AUL - 06', 'V C', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (35, 'SEC - AUL - 07', 'V B', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (36, 'SEC - AUL - 08', 'V A', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (37, 'SEC - AUL - 09', 'II B', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (38, 'SEC - AUL - 10', 'III B', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (39, 'SEC - AUL - 11', 'III A', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (40, 'SEC - AUL - 12', 'II A', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (41, 'SEC - AUL - 13', 'III C', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (42, 'SEC - AUL - 14', 'I A', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (43, 'SEC - AUL - 15', '6 A', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (44, 'SEC - AUL - 16', '6 C', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (45, 'SEC - NOR - EFI', 'NORMAS Y EDU FÍSICA', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (46, 'SEC - LAB - FIS', 'LAB DE FÍSICA', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (47, 'SEC - PSI - 01', 'PSICOLOGÍA 1', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (48, 'SEC - PSI - 02', 'PSICOLOGÍA 2', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (49, 'SEC - COO - 01', 'COORDINACIÓN 1', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (50, 'SEC - COO - 02', 'COORDINACIÓN 2', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (51, 'SEC - BIB - 01', 'BIBLIOTECA', 3);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (52, 'LAB - COM - 01', 'COMPUTO 1', 4);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (53, 'LAB - COM - 02', 'COMPUTO 2', 5);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (54, 'SAL - PRO - 01', 'SALA DE PROFESORES ', 6);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (55, 'ADM - CAJ - 01', 'ADM - CAJA', 7);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (56, 'ADM - REC - 01', 'ADM - RECEPCIÓN', 7);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (57, 'ADM - CON - 01', 'ADM - CONTABILIDAD', 7);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (58, 'ADM - JEF - 01', 'ADM - JEFATURA', 7);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (59, 'ADM - APC - 01', 'ADM - APC', 7);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (60, 'ADM - ENF - 01', 'ADM - ENFERMERÍA', 7);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (61, 'ADM - DIR - 01', 'ADM - DIRECCIÓN', 7);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (62, 'ADM - IMP - 01', 'ADM - IMPRENTA', 7);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (63, 'SIS - SOP - 01', 'SIS - OFICINA', 8);
INSERT INTO `t_ambientes` (`ideamb`, `nomamb`, `desamb`, `ideare`) VALUES (64, 'SIS - ALC - MAL', 'SIS - ALMACÉN - MALOGRADOS', 8);


