#
# TABLE STRUCTURE FOR: roles
#

CREATE TABLE `roles` (
  `iderol` int(11) NOT NULL AUTO_INCREMENT,
  `nomrol` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ordrol` tinyint(2) DEFAULT NULL,
  `desrol` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`iderol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: usuarios
#

CREATE TABLE `usuarios` (
  `ideusu` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de usuario',
  `corusu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Correo de usuario',
  `pasusu` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Password de usuario',
  `nomusu` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estusu` tinyint(1) DEFAULT NULL,
  `iderol` int(11) NOT NULL,
  PRIMARY KEY (`ideusu`,`iderol`),
  KEY `fk_usuarios_roles1_idx` (`iderol`),
  CONSTRAINT `fk_usuarios_roles1` FOREIGN KEY (`iderol`) REFERENCES `roles` (`iderol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: iconos
#

CREATE TABLE `iconos` (
  `ideico` int(11) NOT NULL AUTO_INCREMENT,
  `desico` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nomico` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ideico`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: colores
#

CREATE TABLE `colores` (
  `idecol` int(11) NOT NULL AUTO_INCREMENT,
  `descol` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idecol`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: sistemas
#

CREATE TABLE `sistemas` (
  `idesis` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del sistema',
  `nomsis` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Nombre del sistema',
  `dessis` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Descripción del sistema',
  `urlsis` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Url del sistema',
  `ordsis` tinyint(1) unsigned DEFAULT NULL COMMENT 'Orden del sistema',
  `idecol` int(11) NOT NULL,
  `ideico` int(11) NOT NULL,
  PRIMARY KEY (`idesis`,`idecol`,`ideico`),
  KEY `fk_sistemas_colores_idx` (`idecol`),
  KEY `fk_sistemas_iconos_idx` (`ideico`),
  CONSTRAINT `fk_sistemas_colores1` FOREIGN KEY (`idecol`) REFERENCES `colores` (`idecol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sistemas_iconos1` FOREIGN KEY (`ideico`) REFERENCES `iconos` (`ideico`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: permisos_sistemas
#

CREATE TABLE `permisos_sistemas` (
  `iderol` int(11) NOT NULL,
  `estsis` tinyint(1) DEFAULT NULL,
  `idesis` int(11) NOT NULL,
  PRIMARY KEY (`iderol`,`idesis`),
  KEY `fk_roles_has_sistemas_roles1_idx` (`iderol`),
  KEY `fk_permisos_sistemas_sistemas1_idx` (`idesis`),
  CONSTRAINT `fk_permisos_sistemas_sistemas1` FOREIGN KEY (`idesis`) REFERENCES `sistemas` (`idesis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_has_sistemas_roles1` FOREIGN KEY (`iderol`) REFERENCES `roles` (`iderol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: menus
#

CREATE TABLE `menus` (
  `idemen` int(11) NOT NULL AUTO_INCREMENT,
  `nommen` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desmen` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ordmen` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Numero de orden del menu',
  `idesis` int(11) NOT NULL,
  `ideico` int(11) NOT NULL,
  PRIMARY KEY (`idemen`,`idesis`,`ideico`),
  KEY `fk_menus_sistemas1_idx` (`idesis`),
  KEY `fk_menus_iconos1_idx` (`ideico`),
  CONSTRAINT `fk_menus_iconos1` FOREIGN KEY (`ideico`) REFERENCES `iconos` (`ideico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_menus_sistemas1` FOREIGN KEY (`idesis`) REFERENCES `sistemas` (`idesis`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: submenus
#

CREATE TABLE `submenus` (
  `idesubmen` int(11) NOT NULL AUTO_INCREMENT,
  `nomsubmen` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dessubmen` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `urlsubmen` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idemen` int(11) NOT NULL,
  `idesis` int(11) NOT NULL,
  `ordsubmen` tinyint(2) DEFAULT NULL,
  `ideico` int(11) NOT NULL,
  PRIMARY KEY (`idesubmen`,`idemen`,`idesis`,`ideico`),
  KEY `fk_submenus_menus1_idx` (`idemen`,`idesis`),
  KEY `fk_submenus_iconos1_idx` (`ideico`),
  CONSTRAINT `fk_submenus_iconos1` FOREIGN KEY (`ideico`) REFERENCES `iconos` (`ideico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_submenus_menus1` FOREIGN KEY (`idemen`, `idesis`) REFERENCES `menus` (`idemen`, `idesis`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: permisos_menus
#

CREATE TABLE `permisos_menus` (
  `iderol` int(11) NOT NULL,
  `estmen` tinyint(1) DEFAULT NULL,
  `idemen` int(11) NOT NULL,
  `idesis` int(11) NOT NULL,
  PRIMARY KEY (`iderol`,`idemen`,`idesis`),
  KEY `fk_roles_has_menus_roles1_idx` (`iderol`),
  KEY `fk_permisos_menus_menus1_idx` (`idemen`,`idesis`),
  CONSTRAINT `fk_permisos_menus_menus1` FOREIGN KEY (`idemen`, `idesis`) REFERENCES `menus` (`idemen`, `idesis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_has_menus_roles1` FOREIGN KEY (`iderol`) REFERENCES `roles` (`iderol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# TABLE STRUCTURE FOR: permisos_submenus
#

CREATE TABLE `permisos_submenus` (
  `iderol` int(11) NOT NULL,
  `idesubmen` int(11) NOT NULL,
  `idemen` int(11) NOT NULL,
  `idesis` int(11) NOT NULL,
  `estsubmen` tinyint(1) DEFAULT NULL,
  `perimp` tinyint(1) DEFAULT NULL COMMENT 'Permiso Ver',
  `perins` tinyint(1) DEFAULT NULL,
  `perexp` tinyint(1) DEFAULT NULL,
  `peract` tinyint(1) DEFAULT NULL,
  `pereli` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`iderol`,`idesubmen`,`idemen`,`idesis`),
  KEY `fk_permisos_submenus_submenus1_idx` (`idesubmen`,`idemen`,`idesis`),
  CONSTRAINT `fk_permisos_submenus_roles1` FOREIGN KEY (`iderol`) REFERENCES `roles` (`iderol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_permisos_submenus_submenus1` FOREIGN KEY (`idesubmen`, `idemen`, `idesis`) REFERENCES `submenus` (`idesubmen`, `idemen`, `idesis`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

