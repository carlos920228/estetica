-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd_pan
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.6-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `estructuras`
--

DROP TABLE IF EXISTS `estructuras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estructuras` (
  `idestructuras` int(11) NOT NULL AUTO_INCREMENT,
  `estructura` varchar(45) DEFAULT NULL,
  `titular` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  `presupuesto` varchar(45) DEFAULT NULL,
  `mensual` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idestructuras`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estructuras`
--

LOCK TABLES `estructuras` WRITE;
/*!40000 ALTER TABLE `estructuras` DISABLE KEYS */;
INSERT INTO `estructuras` VALUES (1,'ACAJETE',' ZOREN JOAQUIN HERNANDEZ RODRIGUEZ ',1,'78854.12','6571.18'),(2,'ACATLAN',' FRANCISCO RENDON GRAJALES',1,'61069.46','5089.12');
/*!40000 ALTER TABLE `estructuras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partidas`
--

DROP TABLE IF EXISTS `partidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partidas` (
  `idpartidas` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `solicitudes_folio` int(11) NOT NULL,
  PRIMARY KEY (`idpartidas`),
  KEY `fk_partidas_solicitudes_idx` (`solicitudes_folio`),
  CONSTRAINT `fk_partidas_solicitudes` FOREIGN KEY (`solicitudes_folio`) REFERENCES `solicitudes` (`folio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partidas`
--

LOCK TABLES `partidas` WRITE;
/*!40000 ALTER TABLE `partidas` DISABLE KEYS */;
INSERT INTO `partidas` VALUES (7,'Comida','2000.70',26),(9,'Gasolina','10000.80',25),(12,'Comida','500.00',29),(14,'casetas','70.50',26),(15,'ropa','10000',32),(16,'Otro','3000',35),(17,'Gasolina','1500',35);
/*!40000 ALTER TABLE `partidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(100) DEFAULT NULL,
  `nombre_contacto` varchar(45) DEFAULT NULL,
  `RFC` varchar(20) DEFAULT NULL,
  `banco` varchar(45) DEFAULT NULL,
  `clabe` varchar(18) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `id_ine` varchar(45) DEFAULT NULL,
  `activo` int(11) DEFAULT 1,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'CARLOS HUMBERTO ROMERO CALLEJAS','Carlos Humberto Romero Callejas','ROCC920228','Santander','009988776635255','REFORMA S/N, No. 12','(228) 838-7334','(228) 838-7334','Carlos920228@gmail.com','EL LIMON','Veracruz','12345',1),(2,'Pepe Pecas SA','PEPE ','ROCA890312','Banamex','1234578977655','REFORMA S/N, No. 12','(228) 838-7334','(228) 838-7334','Carlos920228@gmail.com','EL LIMON','Veracruz','',1);
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitudes` (
  `folio` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  `denominacion_comision` varchar(450) DEFAULT NULL,
  `estado_origen` varchar(45) DEFAULT NULL,
  `ciudad_origen` varchar(45) DEFAULT NULL,
  `estado_destino` varchar(45) DEFAULT NULL,
  `ciudad_destino` varchar(45) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `motivo` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT 'pendiente',
  `total` varchar(45) DEFAULT '0',
  `pago_prov` int(11) DEFAULT NULL,
  `estatus` int(1) DEFAULT NULL,
  `secretaria` varchar(45) DEFAULT NULL,
  `tipo_sol` int(11) DEFAULT 0,
  PRIMARY KEY (`folio`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes`
--

LOCK TABLES `solicitudes` WRITE;
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
INSERT INTO `solicitudes` VALUES (24,'2019-11-07','Carlos Humberto Romero Callejas','Sistemas','Xalapa','Veracruz','Xalapa','Veracruz','Veracruz',NULL,NULL,'Viaje relaciones públicas','cancelada','6000.00',NULL,2,NULL,0),(25,'2019-11-12','Carlos Humberto Romero Callejas','Sistemas','Test XML cancelado','Veracruz','Xalapa','Veracruz','Xalapa',NULL,NULL,NULL,'cancelada','5000.4',NULL,1,NULL,0),(26,'2019-11-12','Carlos Humberto Romero Callejas','Sistemas','Xalapa','Veracruz','Xalapa','Veracruz','Xalapa',NULL,NULL,'none','pagada','2071.2',NULL,NULL,NULL,0),(27,'2019-11-14','Juan Perez','Contabilidad','Xalapa','Veracruz','Xalapa','Xalapa','Xalapa',NULL,NULL,'Capacitación nuevo sistema','0','0',NULL,NULL,NULL,0),(28,'2019-11-14','Juan Perez','Sistemas','Xalapa','Veracruz','Xalapa','Veracruz','Xalapa',NULL,NULL,'Capacitación nuevo sistema','0','0',NULL,NULL,NULL,0),(29,'2019-11-14','Juan Perez','Contabilidad','Xalapa','Veracruz','Xalapa','Veracruz','Xalapa',NULL,NULL,'Capacitación nuevo sistema','aceptada','500',NULL,NULL,NULL,0),(30,'2019-11-14','Juan Perez','Sistemas','Xalapa','Veracruz','Xalapa','Veracruz','Xalapa',NULL,NULL,'Capacitación nuevo sistema','0','0',NULL,NULL,NULL,0),(31,'2019-11-14','Juan Perez','esdf','jgjg','jhgj','jgjg','gjj','gjhgj',NULL,NULL,'jhgjjhg','0','0',NULL,NULL,NULL,0),(32,'2019-11-14','Juan Perez','Sistemas','Xalap','kjhk','khk','hkjhkj','hkj',NULL,NULL,'pendiete','cancelada','10000',NULL,NULL,NULL,0),(33,'2019-12-02','Carlos Humberto Romero Callejas','Xalapa',NULL,'Veracruz','Xalapa','Veracruz','Xalapa',NULL,NULL,'Test insert metadata sol','0','0',NULL,NULL,NULL,0),(34,'2019-12-02','Carlos Humberto Romero Callejas','Xalapa','Actividad ordinaria','Veracruz','Xalapa','Veracruz','Xalapa',NULL,NULL,'none','0','0',NULL,NULL,NULL,0),(35,'2019-12-03','Carlos Humberto Romero Callejas','Sistemas','Requiere vehículo','Veracruz','Xalapa','Veracruz','Xalapa',NULL,NULL,'Capacitación nuevo sistema','pagada','4500',NULL,NULL,'Emiliano Zapata',0);
/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `departamento` varchar(45) DEFAULT NULL,
  `comite_municipal` varchar(45) DEFAULT NULL,
  `delegacion` varchar(45) DEFAULT NULL,
  `comision` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Carlos Humberto','Romero Callejas','2288387334','carlos920228@gmail.com','sistemas','xalapa','xalapa','1','2288387334','0',1,1),(4,'Juan','Perez','8141516','perez@gmail.com','Sistemas','Xalapa','Xalapa','Xalapa','2288387334','perez',0,1),(5,'Test ','User','(228) 838-7334','Carlos92@gmail.com','Veracruz',NULL,NULL,NULL,'(228) 838-7334','5',0,1),(6,'Mario Alberto','Ventura Martinez','228 276 1844','mavem80@gmail.com','Contabilidad','Xalapa','Xalapa','Xalapa','228 276 1844','mavem80',1,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-09 18:48:26
