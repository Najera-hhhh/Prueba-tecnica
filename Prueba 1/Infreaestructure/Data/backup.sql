CREATE DATABASE `api` 


DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seniority` float NOT NULL,
  `worstation_id` bigint(20) unsigned NOT NULL,
  `enterprises_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_FK` (`worstation_id`),
  KEY `employee_FK_1` (`enterprises_id`),
  CONSTRAINT `employee_FK` FOREIGN KEY (`worstation_id`) REFERENCES `workstations` (`id`),
  CONSTRAINT `employee_FK_1` FOREIGN KEY (`enterprises_id`) REFERENCES `enterprises` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


LOCK TABLES `employee` WRITE;

INSERT INTO `employee` VALUES
(1,'Ana Yam',2,1,1),
(2,'Daniel Alonzo',1.5,1,1),
(3,'Juan Chan',4,1,1),
(4,'Felipe Pacheco',1,2,1),
(5,'Antonio Sanchez',1,2,1),
(6,'Cesar Castellanos',3,1,2),
(7,'Antonio Hau',1,1,2),
(8,'Erika Medina',6,3,2),
(9,'Jorge Campos',4.5,3,2),
(10,'Francisco Silvente',1,4,3),
(11,'Jaqueline Pech',0.5,5,3),
(12,'Omar Canto',1.5,4,3),
(13,'José Medina',4,5,3);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `enterprises`;

CREATE TABLE `enterprises` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `enterprises` WRITE;

INSERT INTO `enterprises` VALUES
(1,'Empresa A'),
(2,'Empresa B'),
(3,'Empresa C');

UNLOCK TABLES;



DROP TABLE IF EXISTS `workstations`;

CREATE TABLE `workstations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `workstations` WRITE;

INSERT INTO `workstations` VALUES
(1,'RH'),
(2,'Contabilidad'),
(3,'Operaciones'),
(4,'Ventas'),
(5,'Almacen');

UNLOCK TABLES;

