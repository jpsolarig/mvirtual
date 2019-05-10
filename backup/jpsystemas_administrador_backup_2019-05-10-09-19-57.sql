#
# TABLE STRUCTURE FOR: roles
#

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `iderol` int(11) NOT NULL AUTO_INCREMENT,
  `nomrol` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ordrol` tinyint(2) DEFAULT NULL,
  `desrol` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`iderol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `roles` (`iderol`, `nomrol`, `ordrol`, `desrol`) VALUES (1, 'Administrador', 1, 'Administra todo el sistema');
INSERT INTO `roles` (`iderol`, `nomrol`, `ordrol`, `desrol`) VALUES (2, 'Sistemas', 2, 'Administra el sistema');


#
# TABLE STRUCTURE FOR: usuarios
#

DROP TABLE IF EXISTS `usuarios`;

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

INSERT INTO `usuarios` (`ideusu`, `corusu`, `pasusu`, `nomusu`, `estusu`, `iderol`) VALUES (1, 'soporte@materpurissima.edu.pe', '75e47415722e5ca01ea6b2826a3edffa', 'Jean Pierre Solari Gilabert', 1, 1);
INSERT INTO `usuarios` (`ideusu`, `corusu`, `pasusu`, `nomusu`, `estusu`, `iderol`) VALUES (2, 'jpsolarig@materpurissima.edu.pe', '75e47415722e5ca01ea6b2826a3edffa', 'Jean Pierre Solari Gilabert', 1, 2);


#
# TABLE STRUCTURE FOR: iconos
#

DROP TABLE IF EXISTS `iconos`;

CREATE TABLE `iconos` (
  `ideico` int(11) NOT NULL AUTO_INCREMENT,
  `desico` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nomico` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ideico`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (1, 'fa fa-cogs ', 'Sistemas');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (2, 'fa fa-desktop', 'Escritorio');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (3, 'fa fa-users', 'Usuarios');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (4, 'fa fa-university', 'Universidad');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (5, 'fa fa-address-card', 'Tarjeta de direccion');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (6, 'fa fa-unlock', 'Candado Abierto');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (7, 'fa fa-database', 'Base de datos');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (8, 'fa fa-times', 'Eliminar');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (9, 'fa fa-building', 'Edificios');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (10, 'fa fa-desktop', 'Escritorio');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (11, 'fa fa-microchip', 'Microchip');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (12, 'fa fa-sitemap', 'Mapa de sitio');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (13, 'fa fa-calendar', 'Calendario');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (14, 'fa fa-book', 'Libro');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (15, 'fa fa-television', 'Televiso');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (16, 'fa fa-cubes', 'Cubos');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (17, 'fa fa-list-alt', 'Menus');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (18, 'fa fa-list', 'Sub Menus');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (19, 'fa fa-users', 'Usuarios');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (20, 'fa fa-user-plus', 'Agregar Usuarios');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (21, 'fa fa-server', 'Servidor');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (22, 'fa fa-download', 'Descargar');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (23, 'fa fa-user-times', 'Eliminar Usuario');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (24, 'fa fa-home', 'Casa');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (25, 'fa fa-laptop', 'Laptop');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (26, 'fa fa-picture-o', 'Foto');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (27, 'fa fa-archive', 'Archivo');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (28, 'fa fa-signal', 'Señal');
INSERT INTO `iconos` (`ideico`, `desico`, `nomico`) VALUES (29, 'fa fa-info', 'Informacion');


#
# TABLE STRUCTURE FOR: colores
#

DROP TABLE IF EXISTS `colores`;

CREATE TABLE `colores` (
  `idecol` int(11) NOT NULL AUTO_INCREMENT,
  `descol` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idecol`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `colores` (`idecol`, `descol`) VALUES (1, 'bg-aqua');
INSERT INTO `colores` (`idecol`, `descol`) VALUES (2, 'bg-aqua-active');
INSERT INTO `colores` (`idecol`, `descol`) VALUES (3, 'bg-black');
INSERT INTO `colores` (`idecol`, `descol`) VALUES (4, 'bg-black-active');
INSERT INTO `colores` (`idecol`, `descol`) VALUES (5, 'bg-blue');
INSERT INTO `colores` (`idecol`, `descol`) VALUES (6, 'bg-blue-active');
INSERT INTO `colores` (`idecol`, `descol`) VALUES (7, 'bg-danger');
INSERT INTO `colores` (`idecol`, `descol`) VALUES (8, 'bg-fuchsia');
INSERT INTO `colores` (`idecol`, `descol`) VALUES (9, 'bg-fuchsia-active');
INSERT INTO `colores` (`idecol`, `descol`) VALUES (10, 'bg-gray');


#
# TABLE STRUCTURE FOR: sistemas
#

DROP TABLE IF EXISTS `sistemas`;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `sistemas` (`idesis`, `nomsis`, `dessis`, `urlsis`, `ordsis`, `idecol`, `ideico`) VALUES (1, 'Administrador', 'Sistema de Administracion', 'administrador/sistemas', 1, 1, 1);


#
# TABLE STRUCTURE FOR: permisos_sistemas
#

DROP TABLE IF EXISTS `permisos_sistemas`;

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

INSERT INTO `permisos_sistemas` (`iderol`, `estsis`, `idesis`) VALUES (1, 1, 1);


#
# TABLE STRUCTURE FOR: menus
#

DROP TABLE IF EXISTS `menus`;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `menus` (`idemen`, `nommen`, `desmen`, `ordmen`, `idesis`, `ideico`) VALUES (1, 'Admin', 'Componentes del sistema', '1', 1, 1);
INSERT INTO `menus` (`idemen`, `nommen`, `desmen`, `ordmen`, `idesis`, `ideico`) VALUES (2, 'Personas', 'Usuarios del sistema', '2', 1, 5);
INSERT INTO `menus` (`idemen`, `nommen`, `desmen`, `ordmen`, `idesis`, `ideico`) VALUES (3, 'Permisos', 'Permisos del sistema', '3', 1, 6);
INSERT INTO `menus` (`idemen`, `nommen`, `desmen`, `ordmen`, `idesis`, `ideico`) VALUES (4, 'Diseños', 'Diseños', '4', 1, 26);
INSERT INTO `menus` (`idemen`, `nommen`, `desmen`, `ordmen`, `idesis`, `ideico`) VALUES (5, 'Backup', 'Backup', '5', 1, 7);
INSERT INTO `menus` (`idemen`, `nommen`, `desmen`, `ordmen`, `idesis`, `ideico`) VALUES (6, 'Salir', 'Salir', '6', 1, 8);


#
# TABLE STRUCTURE FOR: submenus
#

DROP TABLE IF EXISTS `submenus`;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `submenus` (`idesubmen`, `nomsubmen`, `dessubmen`, `urlsubmen`, `idemen`, `idesis`, `ordsubmen`, `ideico`) VALUES (1, 'Sistemas', 'Lista de sistemas', 'administrador/sistemas', 1, 1, 1, 16);
INSERT INTO `submenus` (`idesubmen`, `nomsubmen`, `dessubmen`, `urlsubmen`, `idemen`, `idesis`, `ordsubmen`, `ideico`) VALUES (2, 'Menus', 'Lista de menus', 'administrador/menus', 1, 1, 2, 17);
INSERT INTO `submenus` (`idesubmen`, `nomsubmen`, `dessubmen`, `urlsubmen`, `idemen`, `idesis`, `ordsubmen`, `ideico`) VALUES (3, 'SubMenus', 'Lista de sub menus', 'administrador/submenus', 1, 1, 3, 18);
INSERT INTO `submenus` (`idesubmen`, `nomsubmen`, `dessubmen`, `urlsubmen`, `idemen`, `idesis`, `ordsubmen`, `ideico`) VALUES (4, 'Roles', 'Lista de roles', 'administrador/roles', 2, 1, 1, 3);
INSERT INTO `submenus` (`idesubmen`, `nomsubmen`, `dessubmen`, `urlsubmen`, `idemen`, `idesis`, `ordsubmen`, `ideico`) VALUES (5, 'Usuarios', 'Lista de usuarios', 'administrador/usuarios', 2, 1, 2, 20);
INSERT INTO `submenus` (`idesubmen`, `nomsubmen`, `dessubmen`, `urlsubmen`, `idemen`, `idesis`, `ordsubmen`, `ideico`) VALUES (6, 'Sistemas', 'Permisos del sistema', 'administrador/persistemas', 3, 1, 1, 16);
INSERT INTO `submenus` (`idesubmen`, `nomsubmen`, `dessubmen`, `urlsubmen`, `idemen`, `idesis`, `ordsubmen`, `ideico`) VALUES (7, 'Menus', 'Permisos del menu', 'administrador/permenus', 3, 1, 2, 17);
INSERT INTO `submenus` (`idesubmen`, `nomsubmen`, `dessubmen`, `urlsubmen`, `idemen`, `idesis`, `ordsubmen`, `ideico`) VALUES (8, 'Submenus', 'Permisos del sub menu', 'administrador/persubmenus', 3, 1, 3, 18);
INSERT INTO `submenus` (`idesubmen`, `nomsubmen`, `dessubmen`, `urlsubmen`, `idemen`, `idesis`, `ordsubmen`, `ideico`) VALUES (9, 'Colores', 'Colores', 'administrador/colores', 4, 1, 1, 28);
INSERT INTO `submenus` (`idesubmen`, `nomsubmen`, `dessubmen`, `urlsubmen`, `idemen`, `idesis`, `ordsubmen`, `ideico`) VALUES (10, 'Iconos', 'Iconos', 'administrador/iconos', 4, 1, 2, 29);
INSERT INTO `submenus` (`idesubmen`, `nomsubmen`, `dessubmen`, `urlsubmen`, `idemen`, `idesis`, `ordsubmen`, `ideico`) VALUES (11, 'Grabar', 'Grabra Backup', 'administrador/backup/grabar', 5, 1, 1, 28);
INSERT INTO `submenus` (`idesubmen`, `nomsubmen`, `dessubmen`, `urlsubmen`, `idemen`, `idesis`, `ordsubmen`, `ideico`) VALUES (12, 'Descargar', 'Descargar Backup', 'administrador/backup/descargar', 5, 1, 2, 23);
INSERT INTO `submenus` (`idesubmen`, `nomsubmen`, `dessubmen`, `urlsubmen`, `idemen`, `idesis`, `ordsubmen`, `ideico`) VALUES (13, 'Logout', 'Salir', 'login/logout', 6, 1, 1, 8);


#
# TABLE STRUCTURE FOR: permisos_menus
#

DROP TABLE IF EXISTS `permisos_menus`;

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

INSERT INTO `permisos_menus` (`iderol`, `estmen`, `idemen`, `idesis`) VALUES (1, 1, 1, 1);
INSERT INTO `permisos_menus` (`iderol`, `estmen`, `idemen`, `idesis`) VALUES (1, 1, 2, 1);
INSERT INTO `permisos_menus` (`iderol`, `estmen`, `idemen`, `idesis`) VALUES (1, 1, 3, 1);
INSERT INTO `permisos_menus` (`iderol`, `estmen`, `idemen`, `idesis`) VALUES (1, 1, 4, 1);
INSERT INTO `permisos_menus` (`iderol`, `estmen`, `idemen`, `idesis`) VALUES (1, 1, 5, 1);
INSERT INTO `permisos_menus` (`iderol`, `estmen`, `idemen`, `idesis`) VALUES (1, 1, 6, 1);


#
# TABLE STRUCTURE FOR: permisos_submenus
#

DROP TABLE IF EXISTS `permisos_submenus`;

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

INSERT INTO `permisos_submenus` (`iderol`, `idesubmen`, `idemen`, `idesis`, `estsubmen`, `perimp`, `perins`, `perexp`, `peract`, `pereli`) VALUES (1, 1, 1, 1, 1, 0, 1, 1, 1, 1);
INSERT INTO `permisos_submenus` (`iderol`, `idesubmen`, `idemen`, `idesis`, `estsubmen`, `perimp`, `perins`, `perexp`, `peract`, `pereli`) VALUES (1, 2, 1, 1, 1, 0, 1, 1, 1, 1);
INSERT INTO `permisos_submenus` (`iderol`, `idesubmen`, `idemen`, `idesis`, `estsubmen`, `perimp`, `perins`, `perexp`, `peract`, `pereli`) VALUES (1, 3, 1, 1, 1, 0, 1, 1, 1, 1);
INSERT INTO `permisos_submenus` (`iderol`, `idesubmen`, `idemen`, `idesis`, `estsubmen`, `perimp`, `perins`, `perexp`, `peract`, `pereli`) VALUES (1, 4, 2, 1, 1, 0, 1, 1, 1, 1);
INSERT INTO `permisos_submenus` (`iderol`, `idesubmen`, `idemen`, `idesis`, `estsubmen`, `perimp`, `perins`, `perexp`, `peract`, `pereli`) VALUES (1, 5, 2, 1, 1, 0, 1, 1, 1, 1);
INSERT INTO `permisos_submenus` (`iderol`, `idesubmen`, `idemen`, `idesis`, `estsubmen`, `perimp`, `perins`, `perexp`, `peract`, `pereli`) VALUES (1, 6, 3, 1, 1, 0, 1, 1, 1, 1);
INSERT INTO `permisos_submenus` (`iderol`, `idesubmen`, `idemen`, `idesis`, `estsubmen`, `perimp`, `perins`, `perexp`, `peract`, `pereli`) VALUES (1, 7, 3, 1, 1, 0, 1, 1, 1, 1);
INSERT INTO `permisos_submenus` (`iderol`, `idesubmen`, `idemen`, `idesis`, `estsubmen`, `perimp`, `perins`, `perexp`, `peract`, `pereli`) VALUES (1, 8, 3, 1, 1, 0, 1, 1, 1, 1);
INSERT INTO `permisos_submenus` (`iderol`, `idesubmen`, `idemen`, `idesis`, `estsubmen`, `perimp`, `perins`, `perexp`, `peract`, `pereli`) VALUES (1, 9, 4, 1, 1, 0, 1, 1, 1, 1);
INSERT INTO `permisos_submenus` (`iderol`, `idesubmen`, `idemen`, `idesis`, `estsubmen`, `perimp`, `perins`, `perexp`, `peract`, `pereli`) VALUES (1, 10, 4, 1, 1, 0, 1, 1, 1, 1);
INSERT INTO `permisos_submenus` (`iderol`, `idesubmen`, `idemen`, `idesis`, `estsubmen`, `perimp`, `perins`, `perexp`, `peract`, `pereli`) VALUES (1, 11, 5, 1, 1, 0, 1, 1, 1, 1);
INSERT INTO `permisos_submenus` (`iderol`, `idesubmen`, `idemen`, `idesis`, `estsubmen`, `perimp`, `perins`, `perexp`, `peract`, `pereli`) VALUES (1, 12, 5, 1, 1, 0, 1, 1, 1, 1);
INSERT INTO `permisos_submenus` (`iderol`, `idesubmen`, `idemen`, `idesis`, `estsubmen`, `perimp`, `perins`, `perexp`, `peract`, `pereli`) VALUES (1, 13, 6, 1, 1, 0, 1, 1, 1, 1);


