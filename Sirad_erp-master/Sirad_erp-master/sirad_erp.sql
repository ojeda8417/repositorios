CREATE DATABASE  IF NOT EXISTS `dicarsbd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dicarsbd`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 192.168.0.24    Database: dicarsbd
-- ------------------------------------------------------
-- Server version	5.6.14

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
-- Temporary table structure for view `adm_local_all`
--

DROP TABLE IF EXISTS `adm_local_all`;
/*!50001 DROP VIEW IF EXISTS `adm_local_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `adm_local_all` (
  `nLocal_id` tinyint NOT NULL,
  `cLocalDesc` tinyint NOT NULL,
  `cLocalTelf` tinyint NOT NULL,
  `cLocalDirec` tinyint NOT NULL,
  `nUbigeo_id` tinyint NOT NULL,
  `nLocalEst` tinyint NOT NULL,
  `nLocalTipRub` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `adm_usuarios_all`
--

DROP TABLE IF EXISTS `adm_usuarios_all`;
/*!50001 DROP VIEW IF EXISTS `adm_usuarios_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `adm_usuarios_all` (
  `username` tinyint NOT NULL,
  `id` tinyint NOT NULL,
  `nomape` tinyint NOT NULL,
  `estado` tinyint NOT NULL,
  `ultimologin` tinyint NOT NULL,
  `active` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `asigtcreditopersonal`
--

DROP TABLE IF EXISTS `asigtcreditopersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asigtcreditopersonal` (
  `nTarjCredito_id` int(11) NOT NULL,
  `nPersonal_id` int(11) NOT NULL,
  `nAsigTCreditoPersonal_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`nAsigTCreditoPersonal_id`),
  KEY `TarjCreditoPersonalFKPersonal_idx` (`nPersonal_id`),
  KEY `TarjCreditoPersonalFKTarjCredito_idx` (`nTarjCredito_id`),
  CONSTRAINT `TarjCreditoPersonalFKPersonal` FOREIGN KEY (`nPersonal_id`) REFERENCES `ven_personal` (`nPersonal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `TarjCreditoPersonalFKTarjCredito` FOREIGN KEY (`nTarjCredito_id`) REFERENCES `ven_tarjcredito` (`nTarjCredito_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asigtcreditopersonal`
--

LOCK TABLES `asigtcreditopersonal` WRITE;
/*!40000 ALTER TABLE `asigtcreditopersonal` DISABLE KEYS */;
INSERT INTO `asigtcreditopersonal` VALUES (1,1,1),(2,4,2),(3,4,3),(4,4,4),(5,4,5);
/*!40000 ALTER TABLE `asigtcreditopersonal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `constante`
--

DROP TABLE IF EXISTS `constante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `constante` (
  `nConstante_id` int(11) NOT NULL AUTO_INCREMENT,
  `nConstanteClase` int(11) NOT NULL,
  `cConstanteDesc` varchar(100) NOT NULL,
  `cConstanteValor` int(11) NOT NULL,
  PRIMARY KEY (`nConstante_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `constante`
--

LOCK TABLES `constante` WRITE;
/*!40000 ALTER TABLE `constante` DISABLE KEYS */;
INSERT INTO `constante` VALUES (1,4,'Otros',3),(2,5,'Acrilico',1),(3,2,'Tipo de pago',0),(4,2,'Contado',1),(5,2,'Credito',2),(6,5,'Tipo de Producto',0),(7,2,'Separacion',3),(8,3,'Tipo de Rubro',0),(9,3,'Ropa',1),(10,3,'Calzado',2),(11,8,'Tipo Mes',0),(12,8,'Januray',1),(13,8,'Febrero',2),(14,8,'Marzo',3),(15,8,'Abril',4),(16,8,'Mayo',5),(17,8,'Junio',6),(18,8,'Julio',7),(19,8,'Agosto',8),(20,8,'Septiembre',9),(21,8,'Octubre',10),(22,8,'Novimebre',11),(23,8,'Diciembre',12),(24,9,'Tipo de movimiento',0),(25,9,'Retiro',1),(26,9,'Deposito ',2),(27,1,'Tipo Ingreso',0),(28,1,'Compra',1),(29,1,'Devolucion',2),(30,1,'Otros',3),(31,4,'Motivo de Salida',0),(32,4,'Ventas',1),(33,4,'Traslado',2),(34,5,'PU',2),(35,6,'Unidad de Medida',0),(36,6,'Hg',4),(37,6,'Kg',2),(38,6,'g',3),(39,6,'dag',5),(40,6,'L',1),(41,6,'ml',6),(42,6,'M',7),(43,7,'Tipo Documento',0),(44,7,'Boleta',1),(45,7,'Factura',2),(46,7,'Guia de Remision',3);
/*!40000 ALTER TABLE `constante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `tipo` int(11) NOT NULL,
  `function` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator',0,'Administrar todo'),(3,'admin_ven','Administrar Ventas',1,'Puede registrar, editar y cancelar ventas'),(4,'admin_us','Usuarios',3,'Permite crear, editar y desactivar usuarios.'),(5,'log_prod','Productos',2,'Puede registrar, editar y eliminar Productos'),(6,'log_ing_prod','Ingreso-Producto',2,'Permite registrar, editar y ver Igreso Productos'),(7,'admin_categ','Categorias',3,'Permite crear, editar Categoria de Productos'),(8,'ven_crono','Cronograma',1,'Permite administrar los Cronogramas de Pagos'),(9,'admin_const','Constantes',3,'Puede crear, editar y eliminar Constantes'),(10,'admin_trab','Trabajadores',3,'Puede registrar, editar y desactivar Trabajadores'),(11,'admin_local','Locales',3,'Puede registrar, editar y desactivar Locales'),(12,'admin_cargo','Cargos',3,'Puede crear y editar Cargos'),(13,'admin_marca','Marcas',3,'Puede crear y editar Marcas'),(14,'admin_zona','Zonas',3,'Puede registrar y editar Zonas'),(15,'admin_zonpers','Zona-Personal',3,'Puede administrar la asignación de zonas al personal.'),(16,'admin_igv','Tipo-IGV',3,'Puede registrar y editar IGV'),(17,'admin_mon','Tipo-Moneda',3,'Puede registrar y editar tipos de Monedas'),(18,'admin_ofert','Ofertas',3,'Puede registrar y editar Ofertas'),(19,'log_prove','Proveedores',2,NULL),(20,'log_ord_ped','Orden-Pedido',2,NULL),(21,'log_ord_comp','Orden-Compra',2,NULL),(22,'log_sal_prod','Salida-Producto',2,NULL),(23,'log_sal_ini','Saldo-Inicial',2,NULL),(24,'log_gen_kardex','Generar-Kardex',2,NULL),(25,'ven_ven_prod','Venta-Productos',1,NULL),(26,'ven_deud_mor','Clientes-Deudores&Morosos',1,NULL),(27,'ven_tarj_cred','Tarjeta-Credito',1,NULL),(28,'ven_movi','Movimientos',1,NULL),(29,'ven_client','Clientes',1,NULL),(30,'ven_rep_tiendzon','Reporte-Tienda-Zona',1,NULL),(31,'ven_rep_clienzon','Reporte-Cliente-Zona',1,NULL),(32,'ven_caja','Cuadre-Caja',1,NULL),(33,'log_rep_sal_prod','Reporte-Salida-Productos',2,NULL),(34,'log_cierre_mes','Cierre-Mes',2,NULL),(35,'ven_rep_ing_egr','Reporte-Ingreso-Egreso',1,NULL);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `local`
--

DROP TABLE IF EXISTS `local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `local` (
  `nLocal_id` int(11) NOT NULL AUTO_INCREMENT,
  `cLocalDesc` varchar(100) NOT NULL DEFAULT '',
  `nLocalEst` int(11) NOT NULL DEFAULT '1',
  `cLocalTelf` varchar(12) NOT NULL DEFAULT '00000000000',
  `cLocalDirec` varchar(150) NOT NULL DEFAULT '',
  `nUbigeo_id` int(11) NOT NULL,
  `nLocalTipRub` int(11) NOT NULL,
  PRIMARY KEY (`nLocal_id`),
  KEY `LocalFkUbigeo_idx` (`nUbigeo_id`),
  CONSTRAINT `LocalFkUbigeo` FOREIGN KEY (`nUbigeo_id`) REFERENCES `ubigeo` (`nUbigeo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local`
--

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
INSERT INTO `local` VALUES (1,'Local 1',1,'280833','Direccion 1',1,1),(2,'Buguis',0,'234567','Av Lima 1234',1355,1),(3,'Plantanitos',1,'234567','Real Plaza',1354,2),(4,'Nike',1,'123456','Real Plaza',1487,2),(5,'Adidas',0,'123456','Mall Aventura Plaza',1357,1),(6,'Triathlon',1,'123456','Direccion ',1354,1),(7,'Limoni',1,'124567','Real Plaza',1357,2),(8,'Saga Falabella',1,'345678','Mall Aventura Plaza',1509,1),(9,'Converse',1,'125434','Mall Aventura Plaza',1354,2),(10,'Puma',1,'125678','Real Plaza',1354,2),(11,'Reebook',1,'123456','Mall Aventura Plaza',1354,2),(12,'Vans',1,'123456','Direccion de Prueba',1354,1),(13,'Cat',1,'127898','Av. Gran Chimu 1234',1354,2),(14,'Umbro',1,'234567','Av. España 1234',1354,2),(15,'Jockey Plaza',1,'232657','Av. Lima 23',1485,1),(16,'Prueba',1,'2808333','Direccion ',1396,1),(17,'Prueba',1,'2808333','Direccion ',1396,1),(18,'Local uno',1,'2','dir',242,1),(19,'Local dos',1,'12','dir',242,1),(20,'Tienda uno',1,'122','direccion',242,1),(21,'Local cuatro',1,'12333','direccion',242,1),(22,'Tienda cuatro',1,'123455','direcc',242,1),(23,'Local cinco',1,'1234','direc',242,1),(24,'Tienda seis',1,'1245677','dire',242,1),(25,'Tienda sietee',1,'6789','direccion',242,1),(26,'Local ocho',1,'12233','diree ocho',242,1),(27,'Tienda nueve',1,'1222','dire',242,1),(28,'Tienda diez',1,'1222','di',242,1),(29,'Tienda once',1,'12344','dire',242,1),(30,'Tienda doce',1,'123344','di',242,1),(31,'Tienda catorce',1,'12222','dire catorce',242,1),(32,'Tienda trece',1,'123455','direccion trece',242,1),(33,'Tienda quince',1,'123728031','direc',242,1),(34,'Tienda dieciseis',1,'23942','dire',242,1),(35,'Local cinco',1,'1283713','direcion cinco',242,1),(36,'Local seis',1,'124677','direccion',242,1),(37,'Local siete',1,'78903','diejsd',242,1),(38,'Local A',1,'280833','direccion',1718,1),(39,'local B',1,'1212333','direccion',1665,1),(40,'local c',1,'280833','direccion',1903,1),(41,'local d',1,'280833','direccion',1901,1),(42,'local e',1,'280833','direccion ',1901,1),(43,'local e',1,'280833','direccion',1418,1),(44,'local f',1,'280833','direccion',867,1),(45,'local g',1,'280833','direccion',1695,2),(46,'local h',1,'280833','direccion',503,2),(47,'local i',1,'280833','direccion',1703,1),(48,'local j',1,'280833','direccion',1703,1),(49,'local k',0,'280833','direccion',1703,1),(50,'local l',1,'280833','direccion',1644,1);
/*!40000 ALTER TABLE `local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `local_producto`
--

DROP TABLE IF EXISTS `local_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `local_producto` (
  `nLocal_id` int(11) NOT NULL,
  `nProducto_id` int(11) NOT NULL,
  `clocalProducto_Estado` char(1) NOT NULL,
  PRIMARY KEY (`nLocal_id`,`nProducto_id`),
  KEY `localproductoFKproducto_idx` (`nProducto_id`),
  KEY `localproductoFKlocal_idx` (`nLocal_id`),
  CONSTRAINT `localproductoFKlocal` FOREIGN KEY (`nLocal_id`) REFERENCES `local` (`nLocal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `localproductoFKproducto` FOREIGN KEY (`nProducto_id`) REFERENCES `producto` (`nProducto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local_producto`
--

LOCK TABLES `local_producto` WRITE;
/*!40000 ALTER TABLE `local_producto` DISABLE KEYS */;
INSERT INTO `local_producto` VALUES (1,1,'1'),(1,2,'1'),(1,3,'1'),(1,4,'1'),(1,5,'1'),(1,6,'1'),(1,7,'1'),(1,8,'1'),(1,9,'1'),(1,10,'1'),(1,11,'1'),(1,12,'1'),(1,13,'1'),(1,14,'1'),(1,15,'1'),(1,16,'1'),(1,17,'1'),(1,18,'1'),(1,19,'1'),(1,20,'1'),(1,21,'1'),(1,22,'1'),(1,23,'1'),(1,24,'1'),(1,25,'1'),(1,26,'1'),(1,27,'1'),(1,28,'1'),(1,29,'1'),(1,30,'1'),(1,31,'1'),(1,32,'1'),(1,33,'1'),(1,34,'1'),(1,35,'1'),(1,36,'1'),(1,37,'1'),(1,38,'1'),(1,39,'1'),(1,40,'1'),(1,41,'1'),(1,42,'1'),(1,43,'1'),(1,44,'1'),(1,45,'1'),(1,46,'1'),(1,47,'1'),(1,48,'1'),(1,49,'1'),(1,50,'1'),(1,51,'1'),(1,52,'1'),(1,53,'1'),(1,54,'1'),(1,55,'1'),(1,56,'1'),(1,57,'1'),(1,58,'1'),(1,59,'1'),(1,60,'1'),(1,61,'1'),(1,62,'1'),(1,63,'1'),(1,64,'1'),(1,65,'1'),(1,66,'1'),(1,67,'1'),(1,68,'1'),(1,69,'1'),(1,70,'1'),(1,71,'1'),(1,72,'1'),(1,73,'1'),(1,74,'1'),(1,75,'1'),(1,76,'1'),(1,77,'1'),(1,78,'1'),(1,79,'1'),(1,80,'1'),(1,81,'1'),(1,82,'1'),(1,83,'1'),(1,84,'1'),(1,85,'1'),(1,86,'1'),(1,87,'1'),(1,88,'1'),(1,89,'1'),(1,90,'1'),(1,91,'1'),(1,92,'1'),(1,93,'1'),(1,94,'1'),(1,95,'1'),(1,96,'1'),(1,97,'1'),(1,98,'1'),(1,99,'1'),(1,100,'1'),(1,101,'1'),(1,102,'1'),(1,103,'1'),(1,104,'1'),(1,105,'1'),(1,106,'1'),(1,107,'1'),(1,108,'1'),(1,109,'1'),(1,110,'1'),(1,111,'1'),(1,112,'1');
/*!40000 ALTER TABLE `local_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `local_reporte_ingreso_egreso_byfecha`
--

DROP TABLE IF EXISTS `local_reporte_ingreso_egreso_byfecha`;
/*!50001 DROP VIEW IF EXISTS `local_reporte_ingreso_egreso_byfecha`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `local_reporte_ingreso_egreso_byfecha` (
  `Id` tinyint NOT NULL,
  `Fecha` tinyint NOT NULL,
  `CantVendida` tinyint NOT NULL,
  `MontoFacturado` tinyint NOT NULL,
  `MontoCobrado` tinyint NOT NULL,
  `TipoVenta` tinyint NOT NULL,
  `Concepto` tinyint NOT NULL,
  `Vendedor` tinyint NOT NULL,
  `tienda` tinyint NOT NULL,
  `TipoIngreso` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `log_cierremes`
--

DROP TABLE IF EXISTS `log_cierremes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_cierremes` (
  `nCierreMes_id` int(11) NOT NULL AUTO_INCREMENT,
  `dCierreMesFecInicio` datetime NOT NULL,
  `dCierreMesFecFin` datetime NOT NULL,
  `nCierreMesNro` int(11) NOT NULL,
  `nLocal_id` int(11) NOT NULL,
  `nCierreMesAnio` int(11) NOT NULL,
  PRIMARY KEY (`nCierreMes_id`),
  KEY `fk_Log_CierreMes_Local1_idx` (`nLocal_id`),
  CONSTRAINT `fk_Log_CierreMes_Local1` FOREIGN KEY (`nLocal_id`) REFERENCES `local` (`nLocal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_cierremes`
--

LOCK TABLES `log_cierremes` WRITE;
/*!40000 ALTER TABLE `log_cierremes` DISABLE KEYS */;
INSERT INTO `log_cierremes` VALUES (1,'2014-03-01 00:00:00','2014-03-31 00:00:00',3,1,2014),(2,'2014-03-01 00:00:00','2014-03-31 00:00:00',3,1,2014),(3,'2014-03-01 00:00:00','2014-03-31 00:00:00',3,1,2014),(4,'2014-03-01 00:00:00','2014-03-31 00:00:00',3,1,2014),(5,'2014-03-01 00:00:00','2014-03-31 00:00:00',3,1,2014),(6,'2014-03-01 00:00:00','2014-03-31 00:00:00',3,1,2014),(7,'2014-03-01 00:00:00','2014-03-31 00:00:00',3,1,2014),(8,'2014-03-01 00:00:00','2014-03-31 00:00:00',3,1,2014);
/*!40000 ALTER TABLE `log_cierremes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `log_consultar_kardex`
--

DROP TABLE IF EXISTS `log_consultar_kardex`;
/*!50001 DROP VIEW IF EXISTS `log_consultar_kardex`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `log_consultar_kardex` (
  `Anio` tinyint NOT NULL,
  `Mes` tinyint NOT NULL,
  `Documento` tinyint NOT NULL,
  `MesNum` tinyint NOT NULL,
  `Producto` tinyint NOT NULL,
  `cMarcaDesc` tinyint NOT NULL,
  `Tipo_Producto` tinyint NOT NULL,
  `Detalle` tinyint NOT NULL,
  `TipoIngreso` tinyint NOT NULL,
  `Cantidad` tinyint NOT NULL,
  `PrecUnit` tinyint NOT NULL,
  `nKardexTipoIng` tinyint NOT NULL,
  `PrecTot` tinyint NOT NULL,
  `nLocal_id` tinyint NOT NULL,
  `Fecha` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `log_consultar_kardexvalorizado`
--

DROP TABLE IF EXISTS `log_consultar_kardexvalorizado`;
/*!50001 DROP VIEW IF EXISTS `log_consultar_kardexvalorizado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `log_consultar_kardexvalorizado` (
  `Anio` tinyint NOT NULL,
  `NroMes` tinyint NOT NULL,
  `Mes` tinyint NOT NULL,
  `Documento` tinyint NOT NULL,
  `id` tinyint NOT NULL,
  `codigoBarra` tinyint NOT NULL,
  `Producto` tinyint NOT NULL,
  `Detalle` tinyint NOT NULL,
  `TipoIngreso` tinyint NOT NULL,
  `Cantidad` tinyint NOT NULL,
  `PrecUnit` tinyint NOT NULL,
  `nKardexTipoIng` tinyint NOT NULL,
  `PrecTot` tinyint NOT NULL,
  `nLocal_id` tinyint NOT NULL,
  `Fecha` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `log_detcompra`
--

DROP TABLE IF EXISTS `log_detcompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_detcompra` (
  `nDetCompra_id` int(11) NOT NULL AUTO_INCREMENT,
  `nOrdenCompra_id` int(11) NOT NULL,
  `nDetCompraCant` int(11) NOT NULL,
  `nDetCompraPrecUnt` decimal(9,2) NOT NULL,
  `nDetCompraImporte` decimal(9,2) NOT NULL,
  `nProducto_id` int(11) NOT NULL,
  `nDetOrdOrdPed` int(11) NOT NULL,
  `cDetCompraEst` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nDetCompra_id`),
  KEY `DetCompraFKOrdCom_idx` (`nOrdenCompra_id`),
  KEY `fk_Log_DetCompra_Producto1_idx` (`nProducto_id`),
  CONSTRAINT `fk_Log_DetCompra_Log_OrdCom1` FOREIGN KEY (`nOrdenCompra_id`) REFERENCES `log_ordcom` (`nOrdenCom_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Log_DetCompra_Producto1` FOREIGN KEY (`nProducto_id`) REFERENCES `producto` (`nProducto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_detcompra`
--

LOCK TABLES `log_detcompra` WRITE;
/*!40000 ALTER TABLE `log_detcompra` DISABLE KEYS */;
INSERT INTO `log_detcompra` VALUES (1,1,12,0.00,12.00,9,0,'1'),(2,2,12,0.00,12.00,3,0,'1'),(3,2,344,0.00,12.00,5,0,'1'),(4,3,1,0.00,25.00,11,0,'1'),(5,4,2,0.00,12.00,1,0,'1'),(6,5,200,0.00,120.00,25,0,'1'),(7,5,234,0.00,234.00,23,0,'1'),(8,5,2345,0.00,2345.00,21,0,'1'),(9,5,123,0.00,12.00,24,0,'1'),(10,5,123,0.00,1234.00,22,0,'1'),(11,5,212,0.00,123.00,6,0,'1'),(12,6,12,0.00,123.00,2,0,'1'),(13,6,12,0.00,1234.00,4,0,'1'),(14,6,123,0.00,1234.00,13,0,'1'),(15,7,2,0.00,1234.00,3,0,'1'),(16,8,12,0.00,1234.00,1,0,'1'),(17,8,2,0.00,12.00,3,0,'1'),(18,8,1,0.00,2.00,1,0,'1'),(19,9,12,0.00,1234.00,1,0,'1'),(20,10,3,0.00,2.00,1,0,'1'),(21,11,10,0.00,5.00,3,0,'1'),(22,11,6,0.00,1.00,4,0,'1'),(23,12,6,0.00,2.00,2,0,'1'),(24,13,2,0.00,2.00,5,0,'1'),(25,14,6,0.00,2.00,2,0,'1'),(26,15,2,0.00,2.00,19,0,'1'),(27,16,2,0.00,2.00,5,0,'1'),(28,17,3,0.00,2.00,2,0,'1'),(29,18,2,0.00,2.00,3,0,'1'),(30,19,2,0.00,2.00,2,0,'1'),(31,20,2,0.00,2.00,18,0,'1'),(32,21,2,0.00,2.00,5,0,'1'),(33,22,2,0.00,2.00,4,0,'1'),(34,23,2,0.00,2.00,1,0,'1'),(35,25,2,0.00,2.00,4,0,'1'),(36,26,5,0.00,2.00,4,0,'1');
/*!40000 ALTER TABLE `log_detcompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_detingprod`
--

DROP TABLE IF EXISTS `log_detingprod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_detingprod` (
  `nDetIngProd_id` int(11) NOT NULL AUTO_INCREMENT,
  `nIngProd_id` int(11) NOT NULL,
  `nProducto_id` int(11) NOT NULL,
  `nDetIngProdCant` int(11) NOT NULL,
  `nDetIngProdPrecUnt` decimal(9,2) NOT NULL,
  `nDetIngProdTot` decimal(9,2) NOT NULL,
  `nDetOrdCompra` int(11) DEFAULT '0',
  PRIMARY KEY (`nDetIngProd_id`),
  KEY `fk_Log_DetIngProd_Log_IngProd1_idx` (`nIngProd_id`),
  KEY `fk_Log_DetIngProd_Producto1_idx` (`nProducto_id`),
  CONSTRAINT `fk_Log_DetIngProd_Log_IngProd1` FOREIGN KEY (`nIngProd_id`) REFERENCES `log_ingprod` (`nIngProd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Log_DetIngProd_Producto1` FOREIGN KEY (`nProducto_id`) REFERENCES `producto` (`nProducto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_detingprod`
--

LOCK TABLES `log_detingprod` WRITE;
/*!40000 ALTER TABLE `log_detingprod` DISABLE KEYS */;
INSERT INTO `log_detingprod` VALUES (1,1,9,5,5.00,25.00,0),(2,2,2,30,1.50,45.00,0),(9,4,6,100,0.45,45.00,0),(10,4,32,23,0.52,12.00,0),(11,5,3,12,102.83,1234.00,2),(12,5,9,1,12.59,12.59,0),(13,6,3,6,63.17,379.02,0),(14,6,3,2,63.17,126.34,0),(15,7,6,2,22.73,45.46,0),(16,7,5,12,12.85,154.20,0),(17,8,5,1,12.85,12.85,0),(18,9,3,12,102.75,1233.00,2),(19,10,2,23,23.25,534.75,0),(20,11,108,987,0.00,1.00,0);
/*!40000 ALTER TABLE `log_detingprod` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dicars_user`@`%`*/ /*!50003 TRIGGER `inset_kardex_ingprod` AFTER INSERT ON `log_detingprod` FOR EACH ROW
-- Edit trigger body code below this line. Do not edit lines above this one
BEGIN
		IF (SELECT COUNT(*) FROM dicarsbd.log_cierremes) = 0 THEN
			call spI_ingresoproducto_kardex 
				 (New.nIngProd_id,New.nProducto_id,NEW.nDetIngProdCant,NEW.nDetIngProdPrecUnt,NEW.nDetIngProdTot,1,CONCAT('Saldo Inicial del Mes de','',MONTHNAME(CURDATE())));
		ELSE
			call spI_ingresoproducto_kardex
				 (New.nIngProd_id,New.nProducto_id,NEW.nDetIngProdCant,NEW.nDetIngProdPrecUnt,NEW.nDetIngProdTot,2,
				  (select lgp.cIngProdObsv from log_ingprod lgp where lgp.nIngProd_id=New.nIngProd_id));
		END IF;

	   UPDATE Producto set nProductoStock =  (nProductoStock + NEW.nDetIngProdCant),
	   nProductoPCosto = (nProductoPCosto + NEW.nDetIngProdPrecUnt)/2,
	   nProductoPContado = ((nProductoPContado-nProductoPCosto)+(nProductoPCosto + NEW.nDetIngProdPrecUnt))/2,
	   nProductoPCredito = ((nProductoPCredito-nProductoPCosto)+(nProductoPCosto + NEW.nDetIngProdPrecUnt))/2
	   where nProducto_id = New.nProducto_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary table structure for view `log_detingprod_all`
--

DROP TABLE IF EXISTS `log_detingprod_all`;
/*!50001 DROP VIEW IF EXISTS `log_detingprod_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `log_detingprod_all` (
  `nDetIngProd_id` tinyint NOT NULL,
  `nIngProd_id` tinyint NOT NULL,
  `nProducto_id` tinyint NOT NULL,
  `nDetIngProdCant` tinyint NOT NULL,
  `nDetIngProdPrecUnt` tinyint NOT NULL,
  `nDetIngProdTot` tinyint NOT NULL,
  `estadolabel` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `log_detordped`
--

DROP TABLE IF EXISTS `log_detordped`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_detordped` (
  `nDetOrdPed_id` int(11) NOT NULL AUTO_INCREMENT,
  `nOrdPed_id` int(11) NOT NULL,
  `nProducto_id` int(11) NOT NULL,
  `nDetOrdPedCant` int(11) NOT NULL,
  `cDetOrdPedEst` char(1) NOT NULL DEFAULT '1',
  `nDetOrdPedCantAcept` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nDetOrdPed_id`),
  KEY `DetOrdPedFKOrdPed_idx` (`nOrdPed_id`),
  KEY `DetOrdPedFKProducto_idx` (`nProducto_id`),
  CONSTRAINT `DetOrdPedFKOrdPed` FOREIGN KEY (`nOrdPed_id`) REFERENCES `log_ordped` (`nOrdPed_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `DetOrdPedFKProducto` FOREIGN KEY (`nProducto_id`) REFERENCES `producto` (`nProducto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_detordped`
--

LOCK TABLES `log_detordped` WRITE;
/*!40000 ALTER TABLE `log_detordped` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_detordped` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_detsalprod`
--

DROP TABLE IF EXISTS `log_detsalprod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_detsalprod` (
  `nDetSalProd_id` int(11) NOT NULL AUTO_INCREMENT,
  `nSalProd_id` int(11) NOT NULL,
  `nProducto_id` int(11) NOT NULL,
  `DetSalProdCant` int(11) NOT NULL,
  `cDetSalProdEst` char(1) NOT NULL DEFAULT '1' COMMENT '1 - Entregado\\n2- Eliminado',
  PRIMARY KEY (`nDetSalProd_id`),
  KEY `fk_Log_DetSalProd_Log_SalProd1_idx` (`nSalProd_id`),
  KEY `fk_Log_DetSalProd_Producto1_idx` (`nProducto_id`),
  CONSTRAINT `fk_Log_DetSalProd_Log_SalProd1` FOREIGN KEY (`nSalProd_id`) REFERENCES `log_salprod` (`nSalProd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Log_DetSalProd_Producto1` FOREIGN KEY (`nProducto_id`) REFERENCES `producto` (`nProducto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_detsalprod`
--

LOCK TABLES `log_detsalprod` WRITE;
/*!40000 ALTER TABLE `log_detsalprod` DISABLE KEYS */;
INSERT INTO `log_detsalprod` VALUES (1,1,2,23,'1'),(2,7,2,1,'1'),(3,8,9,1,'1'),(4,9,2,1,'1'),(5,10,6,12,'1'),(6,11,7,2,'1'),(7,11,1,1,'1'),(8,12,8,1,'1'),(9,13,5,12,'1'),(10,13,6,2,'1'),(11,14,3,6,'1'),(12,14,3,2,'1'),(13,15,5,1,'1'),(14,16,6,1,'1'),(15,16,6,1,'1'),(16,17,5,5,'1'),(17,18,5,2,'1'),(18,19,5,2,'1'),(19,20,5,2,'1'),(20,20,6,2,'1'),(21,21,5,2,'1'),(22,22,7,2,'1'),(23,23,108,2,'1'),(24,24,108,30,'1');
/*!40000 ALTER TABLE `log_detsalprod` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`dicars_user`@`%`*/ /*!50003 TRIGGER `inset_kardex_salprod` AFTER INSERT ON `log_detsalprod` FOR EACH ROW
-- Edit trigger body code below this line. Do not edit lines above this one
BEGIN
			UPDATE Producto set nProductoStock =  (nProductoStock - New.DetSalProdCant)
			WHERE nProducto_id = New.nProducto_id;
			call spI_salidaproducto_kardex (New.nSalProd_id,New.nProducto_id,NEW.DetSalProdCant*-1,0,0);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary table structure for view `log_detsalprod_all`
--

DROP TABLE IF EXISTS `log_detsalprod_all`;
/*!50001 DROP VIEW IF EXISTS `log_detsalprod_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `log_detsalprod_all` (
  `nDetSalProd_id` tinyint NOT NULL,
  `nSalProd_id` tinyint NOT NULL,
  `DetSalProdCant` tinyint NOT NULL,
  `estadolabel` tinyint NOT NULL,
  `nProducto_id` tinyint NOT NULL,
  `cProductoDesc` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `log_docordcom`
--

DROP TABLE IF EXISTS `log_docordcom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_docordcom` (
  `nDocOrdCom_id` int(11) NOT NULL AUTO_INCREMENT,
  `nOrdenCompra_id` int(11) NOT NULL,
  `nDocOrdComFormPag` int(11) NOT NULL COMMENT 'Froma de Pago : Cheke , Tarjeta de Credito, Tarjeta de Devido',
  `nDocOrdComSerie` char(4) NOT NULL,
  `nDocOrdComNro` char(8) NOT NULL,
  `cDocOrdComEst` char(1) NOT NULL DEFAULT '1',
  `nDocOrdComModPag` int(11) NOT NULL COMMENT 'Modalidad de Pago Contado o Credito',
  `nDocOrdComFecReg` datetime NOT NULL,
  `dDocOrdComFecPag` datetime NOT NULL,
  PRIMARY KEY (`nDocOrdCom_id`),
  KEY `DocOrdComFKOrdCom_idx` (`nOrdenCompra_id`),
  CONSTRAINT `DocOrdComFKOrdCom` FOREIGN KEY (`nOrdenCompra_id`) REFERENCES `log_ordcom` (`nOrdenCom_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_docordcom`
--

LOCK TABLES `log_docordcom` WRITE;
/*!40000 ALTER TABLE `log_docordcom` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_docordcom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_ingprod`
--

DROP TABLE IF EXISTS `log_ingprod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_ingprod` (
  `nIngProd_id` int(11) NOT NULL AUTO_INCREMENT,
  `nPersonal_id` int(11) NOT NULL,
  `nLocal_id` int(11) NOT NULL,
  `cIngProdSerie` char(4) NOT NULL,
  `cIngProdNro` char(8) NOT NULL,
  `nIngProdMotivo` int(11) NOT NULL COMMENT 'Motivo de Ingreso',
  `cIngProdDocSerie` char(4) NOT NULL DEFAULT '0000',
  `dIngProdFecReg` datetime NOT NULL,
  `cIngProdDocNro` char(8) NOT NULL DEFAULT '00000000',
  `cIngProdObsv` varchar(500) NOT NULL DEFAULT '',
  `cIngProdEst` char(1) NOT NULL,
  PRIMARY KEY (`nIngProd_id`),
  KEY `fk_Log_IngProd_Ven_Personal_idx` (`nPersonal_id`),
  KEY `fk_Log_IngProd_Local_idx` (`nLocal_id`),
  CONSTRAINT `fk_Log_IngProd_Local` FOREIGN KEY (`nLocal_id`) REFERENCES `local` (`nLocal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Log_IngProd_Ven_Personal` FOREIGN KEY (`nPersonal_id`) REFERENCES `ven_personal` (`nPersonal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_ingprod`
--

LOCK TABLES `log_ingprod` WRITE;
/*!40000 ALTER TABLE `log_ingprod` DISABLE KEYS */;
INSERT INTO `log_ingprod` VALUES (1,1,1,'0001','00000001',1,'0001','2014-03-12 11:58:39','00001','','1'),(2,1,1,'0001','00000002',1,'0001','2014-03-12 12:02:37','0002','','1'),(3,1,1,'0001','00000003',1,'001','2014-03-25 11:16:27','0001','rrrrrrrr','1'),(4,1,1,'0001','00000004',1,'002','2014-03-25 12:36:14','0022','ok','1'),(5,1,1,'0001','00000005',1,'001','2014-03-26 09:55:04','0001','OK','1'),(6,1,1,'0001','00000006',2,'0000','2014-03-26 11:48:23','00000000','Anulacion de Ventas','1'),(7,1,1,'0001','00000007',2,'0000','2014-03-26 11:49:14','00000000','Anulacion de Ventas','1'),(8,1,1,'0001','00000008',2,'0000','2014-03-26 11:51:58','00000000','Anulacion de Ventas','1'),(9,1,1,'0001','00000009',1,'001','2014-03-26 11:55:30','001','OK','1'),(10,1,1,'0001','00000010',2,'0000','2014-03-27 12:24:53','00000000','Anulacion de Ventas','1'),(11,1,1,'0001','00000011',1,'001','2014-04-01 08:58:20','001','TODO BIEN','1');
/*!40000 ALTER TABLE `log_ingprod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `log_ingprod_all`
--

DROP TABLE IF EXISTS `log_ingprod_all`;
/*!50001 DROP VIEW IF EXISTS `log_ingprod_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `log_ingprod_all` (
  `nIngProd_id` tinyint NOT NULL,
  `dIngProdFecReg` tinyint NOT NULL,
  `cIngProdNro` tinyint NOT NULL,
  `cIngProdSerie` tinyint NOT NULL,
  `nPersonal_id` tinyint NOT NULL,
  `nomape` tinyint NOT NULL,
  `nIngProdMotivo` tinyint NOT NULL,
  `DescMotivo` tinyint NOT NULL,
  `cIngProdDocNro` tinyint NOT NULL,
  `cIngProdDocSerie` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `log_ingprod_edit`
--

DROP TABLE IF EXISTS `log_ingprod_edit`;
/*!50001 DROP VIEW IF EXISTS `log_ingprod_edit`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `log_ingprod_edit` (
  `nIngProd_id` tinyint NOT NULL,
  `nomape` tinyint NOT NULL,
  `cIngProdNro` tinyint NOT NULL,
  `nIngProdMotivo` tinyint NOT NULL,
  `nLocal_id` tinyint NOT NULL,
  `cLocalDesc` tinyint NOT NULL,
  `cIngProdObsv` tinyint NOT NULL,
  `dIngProdFecReg` tinyint NOT NULL,
  `cIngProdDocNro` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `log_kardex`
--

DROP TABLE IF EXISTS `log_kardex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_kardex` (
  `nKardex_id` int(11) NOT NULL AUTO_INCREMENT,
  `cKardexSerie` char(4) DEFAULT '0000',
  `cKardexNro` char(8) DEFAULT '00000000',
  `nKardexTipoIng` int(11) NOT NULL COMMENT 'Tipo ingreso :  si es entrada, devoluciÃ³n , salida o saldo inicial.',
  `nKardexPrecUnt` decimal(9,2) DEFAULT '0.00',
  `nKardexCant` int(11) DEFAULT '0',
  `nKardexTot` decimal(9,2) DEFAULT '0.00',
  `nKardexSaldoCant` int(11) NOT NULL,
  `nKardexSaldoPrecUnt` decimal(9,2) NOT NULL COMMENT 'PrecUnit = Valor Ponderado.\\nPrecUnit = SaldoTot/Cant',
  `nKardexSaldoTot` decimal(9,2) NOT NULL,
  `nKardexAnio` int(11) NOT NULL,
  `nKardexMes` int(11) NOT NULL,
  `cKardexConcepto` varchar(100) NOT NULL DEFAULT '',
  `nLocal_id` int(11) NOT NULL,
  `nProducto_id` int(11) NOT NULL,
  `dKardexFecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nKardex_id`),
  KEY `log_kardexFKlocal_producto_idx` (`nLocal_id`,`nProducto_id`),
  CONSTRAINT `log_kardexFKlocal_producto` FOREIGN KEY (`nLocal_id`, `nProducto_id`) REFERENCES `local_producto` (`nLocal_id`, `nProducto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_kardex`
--

LOCK TABLES `log_kardex` WRITE;
/*!40000 ALTER TABLE `log_kardex` DISABLE KEYS */;
INSERT INTO `log_kardex` VALUES (1,'0001','00000001',1,5.00,5,25.00,0,0.00,0.00,2014,3,'Saldo Inicial del Mes deMarch',1,9,'2014-03-12 05:00:00'),(2,'0001','00000002',1,1.50,30,45.00,0,0.00,0.00,2014,3,'Saldo Inicial del Mes deMarch',1,2,'2014-03-12 05:00:00'),(3,'0001','00000001',3,40.25,-23,-925.75,0,0.00,0.00,2014,3,'Salida por ventas',1,2,'2014-03-12 05:00:00'),(4,'0001','00000002',3,40.25,-1,-40.25,0,0.00,0.00,2014,3,'Salida por ventas',1,2,'2014-03-17 05:00:00'),(5,'0001','00000003',3,22.50,-1,-22.50,0,0.00,0.00,2014,3,'Salida por ventas',1,9,'2014-03-18 05:00:00'),(6,'0001','00000004',3,40.25,-1,-40.25,0,0.00,0.00,2014,3,'Salida por ventas',1,2,'2014-03-20 05:00:00'),(27,'0001','00000005',3,80.00,-12,-960.00,0,0.00,0.00,2014,3,'todo OK!!',1,6,'2014-03-25 05:00:00'),(28,'0001','00000006',3,80.00,-2,-160.00,0,0.00,0.00,2014,3,'bien',1,7,'2014-03-25 05:00:00'),(29,'0001','00000006',3,79.00,-1,-79.00,0,0.00,0.00,2014,3,'bien',1,1,'2014-03-25 05:00:00'),(30,'0001','00000003',2,2.00,12,24.00,0,0.00,0.00,2014,3,'wwww',1,3,'2014-03-25 05:00:00'),(31,'0001','00000003',2,3.59,344,1235.00,0,0.00,0.00,2014,3,'wwww',1,5,'2014-03-25 05:00:00'),(32,'0001','00000003',2,10.17,12,122.00,0,0.00,0.00,2014,3,'wwww',1,9,'2014-03-25 05:00:00'),(33,'0001','00000003',2,6.46,344,2222.00,0,0.00,0.00,2014,3,'wwww',1,5,'2014-03-25 05:00:00'),(34,'0001','00000003',2,12.00,12,144.00,0,0.00,0.00,2014,3,'wwww',1,5,'2014-03-25 05:00:00'),(35,'0001','00000003',2,12.00,12,144.00,0,0.00,0.00,2014,3,'rrrrrrrr',1,5,'2014-03-25 05:00:00'),(36,'0001','00000004',2,0.45,100,45.00,0,0.00,0.00,2014,3,'ok',1,6,'2014-03-25 05:00:00'),(37,'0001','00000004',2,0.52,23,12.00,0,0.00,0.00,2014,3,'ok',1,32,'2014-03-25 05:00:00'),(38,'0001','00000005',2,102.83,12,1234.00,0,0.00,0.00,2014,3,'OK',1,3,'2014-03-26 05:00:00'),(39,'0001','00000005',2,12.59,1,12.59,0,0.00,0.00,2014,3,'OK',1,9,'2014-03-26 05:00:00'),(40,'0001','00000007',3,80.00,-1,-80.00,0,0.00,0.00,2014,3,'ok',1,8,'2014-03-26 05:00:00'),(41,'0001','00000008',3,14.91,-12,-178.92,0,0.00,0.00,2014,3,'Salida por ventas',1,5,'2014-03-26 05:00:00'),(42,'0001','00000008',3,40.23,-2,-80.46,0,0.00,0.00,2014,3,'Salida por ventas',1,6,'2014-03-26 05:00:00'),(43,'0001','00000009',3,71.67,-6,-430.02,0,0.00,0.00,2014,3,'Salida por ventas',1,3,'2014-03-26 05:00:00'),(44,'0001','00000009',3,71.67,-2,-143.34,0,0.00,0.00,2014,3,'Salida por ventas',1,3,'2014-03-26 05:00:00'),(45,'0001','00000010',3,14.91,-1,-14.91,0,0.00,0.00,2014,3,'Salida por ventas',1,5,'2014-03-26 05:00:00'),(46,'0001','00000011',3,40.23,-1,-40.23,0,0.00,0.00,2014,3,'Salida por ventas',1,6,'2014-03-26 05:00:00'),(47,'0001','00000011',3,40.23,-1,-40.23,0,0.00,0.00,2014,3,'Salida por ventas',1,6,'2014-03-26 05:00:00'),(48,'0001','00000012',3,14.91,-5,-74.55,0,0.00,0.00,2014,3,'Salida por ventas',1,5,'2014-03-26 05:00:00'),(49,'0001','00000013',3,14.91,-2,-29.82,0,0.00,0.00,2014,3,'Salida por ventas',1,5,'2014-03-26 05:00:00'),(50,'0001','00000014',3,14.91,-2,-29.82,0,0.00,0.00,2014,3,'Salida por ventas',1,5,'2014-03-26 05:00:00'),(51,'0001','00000006',2,63.17,6,379.02,0,0.00,0.00,2014,3,'Anulacion de Ventas',1,3,'2014-03-26 05:00:00'),(52,'0001','00000006',2,63.17,2,126.34,0,0.00,0.00,2014,3,'Anulacion de Ventas',1,3,'2014-03-26 05:00:00'),(53,'0001','00000015',3,14.91,-2,-29.82,0,0.00,0.00,2014,3,'Salida por ventas',1,5,'2014-03-26 05:00:00'),(54,'0001','00000015',3,40.23,-2,-80.46,0,0.00,0.00,2014,3,'Salida por ventas',1,6,'2014-03-26 05:00:00'),(55,'0001','00000007',2,22.73,2,45.46,0,0.00,0.00,2014,3,'Anulacion de Ventas',1,6,'2014-03-26 05:00:00'),(56,'0001','00000007',2,12.85,12,154.20,0,0.00,0.00,2014,3,'Anulacion de Ventas',1,5,'2014-03-26 05:00:00'),(57,'0001','00000016',3,13.88,-2,-27.76,0,0.00,0.00,2014,3,'Salida por ventas',1,5,'2014-03-26 05:00:00'),(58,'0001','00000008',2,12.85,1,12.85,0,0.00,0.00,2014,3,'Anulacion de Ventas',1,5,'2014-03-26 05:00:00'),(59,'0001','00000009',2,102.75,12,1233.00,0,0.00,0.00,2014,3,'OK',1,3,'2014-03-26 05:00:00'),(60,'0001','00000017',3,80.00,-2,-160.00,0,0.00,0.00,2014,3,'OK',1,7,'2014-03-26 05:00:00'),(61,'0000','00000000',1,79.00,1,-79.00,0,0.00,0.00,2014,4,'Saldo Inicial del Mes de Abril',1,1,NULL),(62,'0000','00000000',1,40.25,55,201.25,0,0.00,0.00,2014,4,'Saldo Inicial del Mes de Abril',1,2,NULL),(63,'0000','00000000',1,102.83,52,3701.88,0,0.00,0.00,2014,4,'Saldo Inicial del Mes de Abril',1,3,NULL),(64,'0000','00000000',1,14.91,751,10422.09,0,0.00,0.00,2014,4,'Saldo Inicial del Mes de Abril',1,5,NULL),(65,'0000','00000000',1,80.00,120,6720.00,0,0.00,0.00,2014,4,'Saldo Inicial del Mes de Abril',1,6,NULL),(66,'0000','00000000',1,80.00,4,-320.00,0,0.00,0.00,2014,4,'Saldo Inicial del Mes de Abril',1,7,NULL),(67,'0000','00000000',1,80.00,1,-80.00,0,0.00,0.00,2014,4,'Saldo Inicial del Mes de Abril',1,8,NULL),(68,'0000','00000000',1,22.50,19,382.50,0,0.00,0.00,2014,4,'Saldo Inicial del Mes de Abril',1,9,NULL),(69,'0000','00000000',1,0.52,23,11.96,0,0.00,0.00,2014,4,'Saldo Inicial del Mes de Abril',1,32,NULL),(70,'0001','00000010',2,23.25,23,534.75,0,0.00,0.00,2014,3,'Anulacion de Ventas',1,2,'2014-03-27 05:00:00'),(71,'0001','00000011',2,0.00,987,1.00,0,0.00,0.00,2014,4,'TODO BIEN',1,108,'2014-04-01 05:00:00'),(72,'0001','00000018',3,0.00,-2,0.00,0,0.00,0.00,2014,4,'Salida por ventas',1,108,'2014-04-01 05:00:00'),(73,'0001','00000019',3,0.00,-30,0.00,0,0.00,0.00,2014,4,'Salida por ventas',1,108,'2014-04-01 05:00:00');
/*!40000 ALTER TABLE `log_kardex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `log_lista_salidacampo`
--

DROP TABLE IF EXISTS `log_lista_salidacampo`;
/*!50001 DROP VIEW IF EXISTS `log_lista_salidacampo`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `log_lista_salidacampo` (
  `FecReg` tinyint NOT NULL,
  `Documento` tinyint NOT NULL,
  `Tienda` tinyint NOT NULL,
  `Motivos` tinyint NOT NULL,
  `Producto` tinyint NOT NULL,
  `Cantidad` tinyint NOT NULL,
  `Observacion` tinyint NOT NULL,
  `Personal` tinyint NOT NULL,
  `Solicitante` tinyint NOT NULL,
  `nLocal_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `log_local_users_all`
--

DROP TABLE IF EXISTS `log_local_users_all`;
/*!50001 DROP VIEW IF EXISTS `log_local_users_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `log_local_users_all` (
  `nLocal_id` tinyint NOT NULL,
  `cLocalDesc` tinyint NOT NULL,
  `id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `log_ordcom`
--

DROP TABLE IF EXISTS `log_ordcom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_ordcom` (
  `nOrdenCom_id` int(11) NOT NULL AUTO_INCREMENT,
  `nPersonal_id` int(11) NOT NULL,
  `nProveedor_id` int(11) NOT NULL,
  `OrdComFecReg` datetime NOT NULL,
  `cOrdComSerie` char(4) NOT NULL,
  `cOrdComNro` char(8) NOT NULL,
  `nOrdComSubTotal` decimal(9,2) NOT NULL DEFAULT '0.00',
  `nOrdComIGV` decimal(9,1) NOT NULL DEFAULT '0.0',
  `nOrdComTotal` decimal(9,2) NOT NULL DEFAULT '0.00',
  `cOrdComObsv` varchar(500) NOT NULL,
  `cOrdComEst` char(1) NOT NULL COMMENT '1 PodrÃ­a ser si fue atendida completamente\\n2 Si fue atendido parcialmente toda la orden de compra\\n3 No fue atendida',
  `nOrdComDesct` decimal(9,2) NOT NULL DEFAULT '0.00',
  `nOrdComRecEqv` decimal(9,1) NOT NULL DEFAULT '0.0' COMMENT '% de Recardo de Equivalencia.',
  `nOrdComRetencion` decimal(9,1) NOT NULL DEFAULT '0.0' COMMENT '% de RetenciÃ³n.',
  `cOrdComDocSerie` char(4) DEFAULT NULL,
  `cOrdComDocNro` char(8) DEFAULT NULL,
  `nOrdTipoDocumento` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nOrdenCom_id`),
  KEY `LogOrdComFKVenPersonal_idx` (`nPersonal_id`),
  KEY `LogOrdComFKLogProveedor_idx` (`nProveedor_id`),
  CONSTRAINT `LogOrdComFKLogProveedor` FOREIGN KEY (`nProveedor_id`) REFERENCES `log_proveedor` (`nProveedor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `LogOrdComFKVenPersonal` FOREIGN KEY (`nPersonal_id`) REFERENCES `ven_personal` (`nPersonal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_ordcom`
--

LOCK TABLES `log_ordcom` WRITE;
/*!40000 ALTER TABLE `log_ordcom` DISABLE KEYS */;
INSERT INTO `log_ordcom` VALUES (1,4,1,'2014-03-21 10:22:46','0001','00000001',10.17,18.0,10.56,'Tdod bienee							','1',12.00,0.0,0.0,'122','122',0),(2,4,1,'2014-03-21 10:28:26','0001','00000002',20.34,18.0,24.00,'TODO OK													','1',0.00,0.0,0.0,'0001','0001',0),(3,4,1,'2014-03-25 08:29:54','0001','00000003',21.01,19.0,22.00,'Nada todo bien													','1',12.00,0.0,0.0,'001','001',0),(4,4,1,'2014-03-25 12:34:36','0001','00000004',10.17,18.0,12.00,'ok													','1',0.00,0.0,0.0,'001','001',0),(5,4,8,'2014-03-26 09:52:33','0001','00000005',3447.46,18.0,4068.00,'OK													','1',0.00,0.0,0.0,'001','001',0),(6,4,1,'2014-03-26 09:53:50','0001','00000006',2195.76,18.0,2591.00,'													OK','1',0.00,0.0,0.0,'001','001',0),(7,4,2,'2014-03-26 10:04:56','0001','00000007',1045.76,18.0,1234.00,'													OK','1',0.00,0.0,0.0,'001','001',0),(8,4,2,'2014-03-26 10:08:31','0001','00000008',1057.63,18.0,1248.00,'						ok							','1',0.00,0.0,0.0,'001','001',0),(9,4,2,'2014-03-26 11:55:02','0001','00000009',1045.76,18.0,1234.00,'													OK','1',0.00,0.0,0.0,'001','001',0),(10,4,1,'2014-03-31 10:51:36','0001','00000010',1.69,18.0,2.00,'OK													','1',0.00,0.0,0.0,'001','001',1),(11,4,3,'2014-03-31 10:52:31','0001','00000011',5.08,18.0,6.00,'ORDEN DE COMPRA													','1',0.00,0.0,0.0,'001','001',1),(12,4,5,'2014-03-31 10:53:26','0001','00000012',1.69,18.0,2.00,'bien													','1',0.00,0.0,0.0,'003','003',1),(13,4,2,'2014-03-31 10:53:54','0001','00000013',1.69,18.0,2.00,'							tggtgt						','1',0.00,0.0,0.0,'123','123',1),(14,4,3,'2014-03-31 10:55:14','0001','00000014',1.69,18.0,2.00,'jejeje													','1',0.00,0.0,0.0,'124','124',1),(15,4,3,'2014-03-31 10:59:34','0001','00000015',1.75,14.0,2.00,'nada													','1',0.00,0.0,0.0,'023','023',1),(16,4,4,'2014-03-31 11:02:42','0001','00000016',1.69,18.0,2.00,'BACAN													','1',0.00,0.0,0.0,'004','004',1),(17,4,2,'2014-03-31 11:04:50','0001','00000017',1.69,18.0,2.00,'OK													','1',0.00,0.0,0.0,'006','006',1),(18,4,5,'2014-03-31 11:06:27','0001','00000018',1.69,18.0,2.00,'anada													','1',0.00,0.0,0.0,'124','125',1),(19,4,4,'2014-03-31 11:07:31','0001','00000019',1.69,18.0,2.00,'jaa													','1',0.00,0.0,0.0,'125','125',1),(20,4,8,'2014-03-31 11:11:00','0001','00000020',1.68,19.0,1.96,'OK													','1',2.00,0.0,0.0,'0016','0016',1),(21,4,4,'2014-03-31 11:22:33','0001','00000021',1.69,18.0,2.00,'GENIAL													','1',0.00,0.0,0.0,'008','008',1),(22,4,2,'2014-03-31 11:24:21','0001','00000022',1.69,18.0,2.00,'													AA','1',0.00,0.0,0.0,'009','009',1),(23,4,5,'2014-03-31 11:29:35','0001','00000023',1.69,18.0,2.00,'BIEN													','1',0.00,0.0,0.0,'009','009',1),(24,4,4,'2014-03-31 11:31:06','0001','00000024',1.20,1.3,1.20,'NADA','1',1.00,0.0,0.0,'001','001',3),(25,4,3,'2014-03-31 11:31:48','0001','00000025',1.69,18.0,2.00,'BIEN													','1',0.00,0.0,0.0,'007','008',3),(26,1,2,'2014-03-31 12:27:50','0001','00000026',1.69,18.0,2.00,'buddy													','1',0.00,0.0,0.0,'002','003',2);
/*!40000 ALTER TABLE `log_ordcom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `log_ordcom_all`
--

DROP TABLE IF EXISTS `log_ordcom_all`;
/*!50001 DROP VIEW IF EXISTS `log_ordcom_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `log_ordcom_all` (
  `nOrdenCom_id` tinyint NOT NULL,
  `OrdComFecReg` tinyint NOT NULL,
  `nPersonal_id` tinyint NOT NULL,
  `cPersonalNom` tinyint NOT NULL,
  `nProveedor_id` tinyint NOT NULL,
  `cProveedorRazSocial` tinyint NOT NULL,
  `nOrdComTotal` tinyint NOT NULL,
  `cOrdComObsv` tinyint NOT NULL,
  `nOrdComSubTotal` tinyint NOT NULL,
  `nOrdComIGV` tinyint NOT NULL,
  `nOrdComDesct` tinyint NOT NULL,
  `cOrdComDocSerie` tinyint NOT NULL,
  `cOrdComDocNro` tinyint NOT NULL,
  `nOrdTipoDocumento` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `log_ordcomdetalle_all`
--

DROP TABLE IF EXISTS `log_ordcomdetalle_all`;
/*!50001 DROP VIEW IF EXISTS `log_ordcomdetalle_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `log_ordcomdetalle_all` (
  `nOrdenCom_id` tinyint NOT NULL,
  `OrdComFecReg` tinyint NOT NULL,
  `nPersonal_id` tinyint NOT NULL,
  `cPersonalNom` tinyint NOT NULL,
  `nProveedor_id` tinyint NOT NULL,
  `cProveedorRazSocial` tinyint NOT NULL,
  `nOrdComTotal` tinyint NOT NULL,
  `cOrdComObsv` tinyint NOT NULL,
  `nOrdComSubTotal` tinyint NOT NULL,
  `nOrdComIGV` tinyint NOT NULL,
  `nOrdComDesct` tinyint NOT NULL,
  `cProductoDesc` tinyint NOT NULL,
  `nDetCompraCant` tinyint NOT NULL,
  `nDetCompraPrecUnt` tinyint NOT NULL,
  `nDetCompraImporte` tinyint NOT NULL,
  `cOrdComDocSerie` tinyint NOT NULL,
  `cOrdComDocNro` tinyint NOT NULL,
  `nDetCompra_id` tinyint NOT NULL,
  `nProducto_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `log_ordped`
--

DROP TABLE IF EXISTS `log_ordped`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_ordped` (
  `nOrdPed_id` int(11) NOT NULL AUTO_INCREMENT,
  `nPersonal_id` int(11) NOT NULL COMMENT 'Solicitante',
  `cOrdPedSerie` char(4) NOT NULL DEFAULT '0000',
  `cOrdPedNro` char(8) NOT NULL DEFAULT '00000000',
  `cOrdPedEnvEmail` char(1) NOT NULL DEFAULT '1',
  `nLocal_id` int(11) NOT NULL,
  `dOrdPedFecReg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dOrdePedFecEnt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cOrdPedObsv` varchar(500) NOT NULL,
  `cOrdPedEst` char(1) NOT NULL DEFAULT '1' COMMENT '1 PodrÃ­a ser si fue atendida completamente\\n2 Si fue atendido parcialmente toda la orden del pedido\\n3 No fue atendida',
  PRIMARY KEY (`nOrdPed_id`),
  KEY `OrdPedFKPersonal_idx` (`nPersonal_id`),
  KEY `OrdPedFKLocal_idx` (`nLocal_id`),
  CONSTRAINT `OrdPedFKLocal` FOREIGN KEY (`nLocal_id`) REFERENCES `local` (`nLocal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `OrdPedFKPersonal` FOREIGN KEY (`nPersonal_id`) REFERENCES `ven_personal` (`nPersonal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_ordped`
--

LOCK TABLES `log_ordped` WRITE;
/*!40000 ALTER TABLE `log_ordped` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_ordped` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `log_ordped_all`
--

DROP TABLE IF EXISTS `log_ordped_all`;
/*!50001 DROP VIEW IF EXISTS `log_ordped_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `log_ordped_all` (
  `nProducto_id` tinyint NOT NULL,
  `cProductoDesc` tinyint NOT NULL,
  `nPersonal_id` tinyint NOT NULL,
  `nomape` tinyint NOT NULL,
  `nDetOrdPedCant` tinyint NOT NULL,
  `nDetOrdPedCantAcept` tinyint NOT NULL,
  `CantFalta` tinyint NOT NULL,
  `dOrdPedFecReg` tinyint NOT NULL,
  `cProductoCodBarra` tinyint NOT NULL,
  `cOrdPedSerie` tinyint NOT NULL,
  `cOrdPedNro` tinyint NOT NULL,
  `nOrdPed_id` tinyint NOT NULL,
  `nProductoPCosto` tinyint NOT NULL,
  `dOrdePedFecEnt` tinyint NOT NULL,
  `cLocalDesc` tinyint NOT NULL,
  `cOrdPedObsv` tinyint NOT NULL,
  `cOrdPedEst` tinyint NOT NULL,
  `estadolabel` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `log_productos_all`
--

DROP TABLE IF EXISTS `log_productos_all`;
/*!50001 DROP VIEW IF EXISTS `log_productos_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `log_productos_all` (
  `nProducto_id` tinyint NOT NULL,
  `cProductoDesc` tinyint NOT NULL,
  `nProductoPVenta` tinyint NOT NULL,
  `nProductoUnidMedida` tinyint NOT NULL,
  `nProductoPCosto` tinyint NOT NULL,
  `cProductoCodBarra` tinyint NOT NULL,
  `cProductoImage` tinyint NOT NULL,
  `nProductoStockMin` tinyint NOT NULL,
  `nProductoStockMax` tinyint NOT NULL,
  `nProductoStock` tinyint NOT NULL,
  `cProductoEst` tinyint NOT NULL,
  `nProductoPorcUti` tinyint NOT NULL,
  `nProductoUtiBruta` tinyint NOT NULL,
  `nMarca_id` tinyint NOT NULL,
  `cMarcaDesc` tinyint NOT NULL,
  `nCategoria_id` tinyint NOT NULL,
  `cCategoriaNom` tinyint NOT NULL,
  `cConstanteDesc` tinyint NOT NULL,
  `nLocal_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `log_proveedor`
--

DROP TABLE IF EXISTS `log_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_proveedor` (
  `nProveedor_id` int(11) NOT NULL AUTO_INCREMENT,
  `cProveedorRuc` char(11) NOT NULL,
  `cProveedorRazSocial` varchar(200) NOT NULL DEFAULT '',
  `cProveedorTel` varchar(25) NOT NULL DEFAULT '000000000',
  `cProveedorEmail` varchar(100) NOT NULL DEFAULT 'default@gmail.com',
  `cProveedorSitioWeb` varchar(150) DEFAULT '',
  `cProveedorDirec` varchar(200) NOT NULL,
  `cProveedorCCorriente` varchar(20) DEFAULT NULL COMMENT 'Cuenta Corriente',
  PRIMARY KEY (`nProveedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_proveedor`
--

LOCK TABLES `log_proveedor` WRITE;
/*!40000 ALTER TABLE `log_proveedor` DISABLE KEYS */;
INSERT INTO `log_proveedor` VALUES (1,'23456789234','Anonimo S A','1234567','anonimo@gmail.com','','Jr. Bolivar 6784','837872763578'),(2,'12345678222','12345566','280833','pruebitah@gmail.com','www.paginaweb.com','av husares','12345678'),(3,'12345678910','proveedor1','123456789','proveedor@gmail.com','proveedor','av husares','1234567891012'),(4,'12345678910','Proveedor1','280833','proveedor@gmail.com','proveedor.com','direccion','123456789'),(5,'12345678910','Proveedor 2','280833','prueba@gmail.com','prueba.com','direccion','12345678'),(6,'12345678910','Proveedor 2','280833','prueba@gmail.com','prueba.com','direccion','12345678'),(7,'23456789101','Proveedor 3','280833','prueba@gmail.com','prubea.com','direccion','12356789'),(8,'23456789101','Proveedor 3','280833','prueba@gmail.com','prubea.com','direccion','12356789'),(9,'12345678912','Razon','280833','prueba@gmail.com','prueba.com','direcciont','12');
/*!40000 ALTER TABLE `log_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_salprod`
--

DROP TABLE IF EXISTS `log_salprod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_salprod` (
  `nSalProd_id` int(11) NOT NULL AUTO_INCREMENT,
  `nPersonal_id` int(11) NOT NULL,
  `nLocal_id` int(11) NOT NULL,
  `cSalProdSerie` char(4) NOT NULL,
  `cSalProdNro` char(8) NOT NULL,
  `dSalProdFecReg` datetime NOT NULL,
  `nSalProdMotivo` int(11) NOT NULL,
  `nSolicitante_id` int(11) NOT NULL,
  `cSalProdObsv` varchar(500) NOT NULL,
  PRIMARY KEY (`nSalProd_id`),
  KEY `fk_Log_SalProd_Ven_Personal1_idx` (`nPersonal_id`),
  KEY `fk_Log_SalProd_Local1_idx` (`nLocal_id`),
  CONSTRAINT `fk_Log_SalProd_Local1` FOREIGN KEY (`nLocal_id`) REFERENCES `local` (`nLocal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Log_SalProd_Ven_Personal1` FOREIGN KEY (`nPersonal_id`) REFERENCES `ven_personal` (`nPersonal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_salprod`
--

LOCK TABLES `log_salprod` WRITE;
/*!40000 ALTER TABLE `log_salprod` DISABLE KEYS */;
INSERT INTO `log_salprod` VALUES (1,1,1,'0001','00000001','2014-03-12 12:05:28',2,1,'Salida por ventas'),(7,1,1,'0001','00000002','2014-03-17 12:48:07',2,1,'Salida por ventas'),(8,1,1,'0001','00000003','2014-03-18 12:35:34',2,1,'Salida por ventas'),(9,1,1,'0001','00000004','2014-03-20 12:33:09',2,1,'Salida por ventas'),(10,1,1,'0001','00000005','2014-03-25 08:45:00',2,1,'todo OK!!'),(11,1,1,'0001','00000006','2014-03-25 08:50:48',1,4,'bien'),(12,1,1,'0001','00000007','2014-03-26 09:56:57',1,8,'ok'),(13,1,1,'0001','00000008','2014-03-26 10:07:09',2,1,'Salida por ventas'),(14,1,1,'0001','00000009','2014-03-26 10:09:31',2,1,'Salida por ventas'),(15,1,1,'0001','00000010','2014-03-26 10:10:55',2,1,'Salida por ventas'),(16,1,1,'0001','00000011','2014-03-26 10:11:41',2,1,'Salida por ventas'),(17,1,1,'0001','00000012','2014-03-26 11:45:12',2,1,'Salida por ventas'),(18,1,1,'0001','00000013','2014-03-26 11:46:19',2,1,'Salida por ventas'),(19,1,1,'0001','00000014','2014-03-26 11:46:47',2,1,'Salida por ventas'),(20,1,1,'0001','00000015','2014-03-26 11:49:06',2,1,'Salida por ventas'),(21,1,1,'0001','00000016','2014-03-26 11:51:50',2,1,'Salida por ventas'),(22,1,1,'0001','00000017','2014-03-26 11:55:58',1,4,'OK'),(23,1,1,'0001','00000018','2014-04-01 09:09:26',2,1,'Salida por ventas'),(24,1,1,'0001','00000019','2014-04-01 09:13:21',2,1,'Salida por ventas');
/*!40000 ALTER TABLE `log_salprod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `log_salprod_all`
--

DROP TABLE IF EXISTS `log_salprod_all`;
/*!50001 DROP VIEW IF EXISTS `log_salprod_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `log_salprod_all` (
  `dSalProdFecReg` tinyint NOT NULL,
  `nPersonal_id_r` tinyint NOT NULL,
  `registrador` tinyint NOT NULL,
  `nPersonal_id_s` tinyint NOT NULL,
  `solicitante` tinyint NOT NULL,
  `nSalProdMotivo` tinyint NOT NULL,
  `DescMotivo` tinyint NOT NULL,
  `cSalProdObsv` tinyint NOT NULL,
  `nLocal_id` tinyint NOT NULL,
  `cLocalDesc` tinyint NOT NULL,
  `nSalProd_id` tinyint NOT NULL,
  `cSalProdSerie` tinyint NOT NULL,
  `cSalProdNro` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `logi_cierredia`
--

DROP TABLE IF EXISTS `logi_cierredia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logi_cierredia` (
  `nCierreDia_id` int(11) NOT NULL,
  `nCierreFecha` date NOT NULL,
  `cCierreDia` varchar(12) NOT NULL,
  `nLocal_id` int(11) NOT NULL,
  PRIMARY KEY (`nCierreDia_id`),
  KEY `fk_Log_CierreDia_Local1_idx` (`nLocal_id`),
  CONSTRAINT `fk_Log_CierreDia_Local1` FOREIGN KEY (`nLocal_id`) REFERENCES `local` (`nLocal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logi_cierredia`
--

LOCK TABLES `logi_cierredia` WRITE;
/*!40000 ALTER TABLE `logi_cierredia` DISABLE KEYS */;
/*!40000 ALTER TABLE `logi_cierredia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `nMenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `nMenuClase` int(11) NOT NULL,
  `cMenuNom` varchar(150) NOT NULL,
  `cMenuDesc` varchar(150) NOT NULL,
  `nMenuValor` int(11) NOT NULL,
  PRIMARY KEY (`nMenu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notacredito`
--

DROP TABLE IF EXISTS `notacredito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notacredito` (
  `nNotaCredito_id` int(11) NOT NULL AUTO_INCREMENT,
  `cNotaCreditoSerie` char(4) NOT NULL,
  `cNotaCreditoNro` char(8) NOT NULL,
  `nDocumento_id` int(11) NOT NULL,
  PRIMARY KEY (`nNotaCredito_id`),
  KEY `NotaCreditoFKDocVenta_idx` (`nDocumento_id`),
  CONSTRAINT `NotaCreditoFKDocVenta` FOREIGN KEY (`nDocumento_id`) REFERENCES `ven_docventa` (`nDocumento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notacredito`
--

LOCK TABLES `notacredito` WRITE;
/*!40000 ALTER TABLE `notacredito` DISABLE KEYS */;
/*!40000 ALTER TABLE `notacredito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oferta`
--

DROP TABLE IF EXISTS `oferta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oferta` (
  `nOferta_id` int(11) NOT NULL AUTO_INCREMENT,
  `cOfertaDesc` varchar(100) NOT NULL,
  `dOfertaFecVigente` datetime NOT NULL,
  `dOfertaFecVencto` datetime NOT NULL,
  `nOfertaPorc` int(11) NOT NULL,
  PRIMARY KEY (`nOferta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oferta`
--

LOCK TABLES `oferta` WRITE;
/*!40000 ALTER TABLE `oferta` DISABLE KEYS */;
INSERT INTO `oferta` VALUES (1,'Por Día del Padre','2014-03-12 00:00:00','2014-04-22 00:00:00',15),(2,'por el dia de la madre','2013-11-26 00:00:00','2014-03-27 00:00:00',122);
/*!40000 ALTER TABLE `oferta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oferta_producto`
--

DROP TABLE IF EXISTS `oferta_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oferta_producto` (
  `nOfertaProducto_id` int(11) NOT NULL AUTO_INCREMENT,
  `nOferta_id` int(11) NOT NULL,
  `nProducto_id` int(11) NOT NULL,
  `nOfertaProductoPorc` decimal(9,1) DEFAULT NULL,
  `cOfertaProductoEst` char(1) DEFAULT '1',
  PRIMARY KEY (`nOfertaProducto_id`),
  KEY `OfertaProductoFKProducto_idx` (`nProducto_id`),
  KEY `OfertaProductoFKOferta_idx` (`nOferta_id`),
  CONSTRAINT `OfertaProductoFKOferta` FOREIGN KEY (`nOferta_id`) REFERENCES `oferta` (`nOferta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `OfertaProductoFKProducto` FOREIGN KEY (`nProducto_id`) REFERENCES `producto` (`nProducto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oferta_producto`
--

LOCK TABLES `oferta_producto` WRITE;
/*!40000 ALTER TABLE `oferta_producto` DISABLE KEYS */;
INSERT INTO `oferta_producto` VALUES (1,1,3,15.0,'0'),(2,1,6,15.0,'1'),(3,1,2,15.0,'0'),(4,1,5,15.0,'0');
/*!40000 ALTER TABLE `oferta_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametro`
--

DROP TABLE IF EXISTS `parametro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parametro` (
  `nParametro_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`nParametro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametro`
--

LOCK TABLES `parametro` WRITE;
/*!40000 ALTER TABLE `parametro` DISABLE KEYS */;
/*!40000 ALTER TABLE `parametro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `nProducto_id` int(11) NOT NULL AUTO_INCREMENT,
  `cProductoSerie` varchar(15) NOT NULL,
  `cProductoTalla` varchar(15) NOT NULL,
  `nProductoMarca` int(11) NOT NULL,
  `nProductoTipo` int(11) NOT NULL,
  `cProductoDesc` varchar(200) NOT NULL COMMENT 'Descripcion',
  `nProductoPContado` decimal(9,2) NOT NULL COMMENT 'Precio Contado',
  `nProductoPCredito` decimal(9,2) NOT NULL COMMENT 'Precio Credito',
  `nProductoPCosto` decimal(9,2) NOT NULL,
  `cProductoCodBarra` char(12) NOT NULL,
  `cProductoImage` text,
  `nCategoria_id` int(11) NOT NULL,
  `nProductoStockMin` int(11) NOT NULL,
  `nProductoStockMax` int(11) NOT NULL,
  `nProductoStock` int(11) NOT NULL,
  `cProductoEst` char(1) NOT NULL,
  `nProductoPorcUti` decimal(9,1) NOT NULL COMMENT 'Utilidad en Porcentaje',
  `nProductoUtiBruta` decimal(9,2) NOT NULL,
  `nProductoPVenta` decimal(9,2) NOT NULL,
  `nProductoUnidMedida` int(11) NOT NULL,
  PRIMARY KEY (`nProducto_id`),
  KEY `ProductoFKMarca_idx` (`nProductoMarca`),
  KEY `ProductoFKCategoria_idx` (`nCategoria_id`),
  CONSTRAINT `ProductoFKCategoria` FOREIGN KEY (`nCategoria_id`) REFERENCES `ven_categoria` (`nCategoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ProductoFKMarca` FOREIGN KEY (`nProductoMarca`) REFERENCES `ven_marca` (`nMarca_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'0001','35',1,1,'Damas',79.00,97.00,50.00,'652417427536','',1,36,45,-1,'1',0.0,0.00,0.00,1),(2,'0002','36',1,1,'Damas',31.75,36.25,23.25,'304169994131','',1,25,40,28,'1',0.0,0.00,0.00,0),(3,'0003','37',1,1,'Damas',84.03,84.59,82.96,'700400520768','',1,36,45,36,'1',0.0,0.00,0.00,3),(4,'0004','38',1,1,'Damas',79.00,97.00,40.00,'411235582466','',1,36,45,0,'1',0.0,0.00,0.00,1),(5,'0005','36',1,2,'Caballeros',13.37,13.87,12.85,'653492725132','',1,36,45,699,'1',0.0,0.00,0.00,2),(6,'001','001',1,1,'Caballero',0.00,0.00,22.73,'515614360120',NULL,1,36,42,0,'1',0.0,0.00,0.00,3),(7,'0007','38',1,2,'Caballero',80.00,110.00,45.00,'811225574288','',1,24,30,-4,'1',0.0,0.00,0.00,4),(8,'001','001',1,1,'Caballero - 001 -001',0.00,0.00,1.00,'207191162936',NULL,1,2,30,0,'1',0.0,0.00,0.00,1),(9,'0009','37',2,1,'Joven ',14.47,15.09,12.59,'237638239039','',1,4,25,17,'1',0.0,0.00,0.00,1),(10,'00003','22',1,1,'TODO BIEN',12.00,12.00,12.00,'500797206071','',1,2,50,0,'1',0.0,0.00,0.00,2),(11,'0001','0002',5,2,'Pantalon Jeans',25.00,30.00,15.00,'733556948354','',2,3,50,0,'1',0.0,0.00,0.00,6),(12,'001','001',1,1,'producto 1',12.00,12.00,12.00,'213412705076','',1,12,12,0,'1',0.0,0.00,0.00,0),(13,'001','001',1,1,'producto 1',12.00,12.00,12.00,'186306452552','',1,12,12,0,'1',0.0,0.00,0.00,5),(14,'001','001',1,1,'producto 2',12.00,12.00,12.00,'589378091124','',1,12,12,0,'1',0.0,0.00,0.00,1),(15,'001','001',1,1,'producto 3',12.00,12.00,12.00,'844883424085','',1,12,12,0,'1',0.0,0.00,0.00,0),(16,'001','001',1,1,'producto 4',12.00,12.00,12.00,'919785076678','',1,12,12,0,'1',0.0,0.00,0.00,0),(17,'001','001',1,1,'producto 5',12.00,12.00,12.00,'617953179048','',1,12,12,0,'1',0.0,0.00,0.00,0),(18,'001','001',1,1,'producto 6',12.00,12.00,12.00,'405807666858','',1,12,12,0,'1',0.0,0.00,0.00,1),(19,'001','001',1,1,'producto 7',12.00,12.00,12.00,'223968972661','',1,12,12,0,'1',0.0,0.00,0.00,0),(20,'001','001',1,1,'producto 8',12.00,12.00,12.00,'108700669472','',1,12,12,0,'1',0.0,0.00,0.00,0),(21,'001','001',1,1,'producto 9',12.00,12.00,12.00,'597724997064','',1,12,12,0,'1',0.0,0.00,0.00,1),(22,'001','001',1,1,'producto 10',12.00,12.00,12.00,'579745141398','',1,12,12,0,'1',0.0,0.00,0.00,0),(23,'001','001',1,1,'producto 11',12.00,12.00,12.00,'788178947557','',1,12,12,0,'1',0.0,0.00,0.00,0),(24,'001','001',1,1,'producto 12',12.00,12.00,12.00,'684785787654','',1,12,12,0,'1',0.0,0.00,0.00,0),(25,'001','001',1,1,'producto 13',12.00,12.00,12.00,'190078115268','',1,12,12,0,'1',0.0,0.00,0.00,4),(26,'001','001',1,1,'producto 14',12.00,12.00,12.00,'618561287987','',1,12,12,0,'1',0.0,0.00,0.00,0),(27,'001','001',1,1,'producto 15',12.00,12.00,12.00,'163380633260','',1,12,12,0,'1',0.0,0.00,0.00,0),(28,'001','001',1,1,'producto 16',12.00,12.00,12.00,'205646649195','',1,12,12,0,'1',0.0,0.00,0.00,4),(29,'001','001',1,1,'producto 17',12.00,12.00,12.00,'991143310434','',1,12,12,0,'1',0.0,0.00,0.00,0),(30,'001','001',1,1,'producto 18',12.00,12.00,12.00,'249310971470','',1,12,12,0,'1',0.0,0.00,0.00,3),(31,'001','001',1,1,'producto 19',12.00,12.00,12.00,'777675944173','',1,12,12,0,'1',0.0,0.00,0.00,3),(32,'001','001',1,1,'producto 20',6.26,6.26,6.26,'449704009527','',1,12,12,23,'1',0.0,0.00,0.00,1),(33,'001','001',1,1,'producto 21',12.00,12.00,12.00,'109936369685','',1,12,12,0,'1',0.0,0.00,0.00,0),(34,'001','001',1,1,'producto 22',12.00,12.00,12.00,'828909642835','',1,12,12,0,'1',0.0,0.00,0.00,1),(35,'001','001',1,1,'producto 23',12.00,12.00,12.00,'842539178992','',1,12,12,0,'1',0.0,0.00,0.00,6),(36,'001','001',1,1,'producto 24',12.00,12.00,12.00,'664620427102','',1,12,12,0,'1',0.0,0.00,0.00,5),(37,'001','001',1,1,'producto 25',12.00,12.00,12.00,'564830180784','',1,12,12,0,'1',0.0,0.00,0.00,0),(38,'001','001',1,1,'producto 26\r\n',12.00,12.00,12.00,'388239810605','',1,12,12,0,'1',0.0,0.00,0.00,1),(39,'001','001',1,1,'producto 27\r\n',12.00,12.00,12.00,'592825670347','',1,12,12,0,'1',0.0,0.00,0.00,5),(40,'001','001',1,1,'producto 28\r\n',12.00,12.00,12.00,'251856392484','',1,12,12,0,'1',0.0,0.00,0.00,0),(41,'001','001',1,1,'producto 29\r\n',12.00,12.00,12.00,'665764968531','',1,12,12,0,'1',0.0,0.00,0.00,6),(42,'001','001',1,1,'producto 30\r\n',12.00,12.00,12.00,'726745616390','',1,12,12,0,'1',0.0,0.00,0.00,0),(43,'001','001',1,1,'producto 31\r\n',12.00,12.00,12.00,'411039630334','',1,12,12,0,'1',0.0,0.00,0.00,6),(44,'001','001',1,1,'producto 32\r\n',12.00,12.00,12.00,'253209112448','',1,12,12,0,'1',0.0,0.00,0.00,0),(45,'001','001',1,1,'producto 33\r\n',12.00,12.00,12.00,'138356987516','',1,12,12,0,'1',0.0,0.00,0.00,5),(46,'001','001',1,1,'producto 34\r\n',12.00,12.00,12.00,'247456885173','',1,12,12,0,'1',0.0,0.00,0.00,1),(47,'001','001',1,1,'producto 35\r\n',12.00,12.00,12.00,'734173278077','',1,12,12,0,'1',0.0,0.00,0.00,0),(48,'001','001',1,1,'producto 36\r\n',12.00,12.00,12.00,'222707598678','',1,12,12,0,'1',0.0,0.00,0.00,0),(49,'001','001',1,1,'producto 37\r\n',12.00,12.00,12.00,'198526852949','',1,12,12,0,'1',0.0,0.00,0.00,0),(50,'001','001',1,1,'producto 38\r\n',12.00,12.00,12.00,'334502039789','',1,12,12,0,'1',0.0,0.00,0.00,5),(51,'001','001',1,1,'producto 39\r\n',12.00,12.00,12.00,'174156292504','',1,12,12,0,'1',0.0,0.00,0.00,0),(52,'001','001',1,1,'producto 40\r\n',12.00,12.00,12.00,'188086070296','',1,12,12,0,'1',0.0,0.00,0.00,5),(53,'001','001',1,1,'producto 41\r\n',12.00,12.00,12.00,'830494438140','',1,12,12,0,'1',0.0,0.00,0.00,0),(54,'001','001',1,1,'producto 42\r\n',12.00,12.00,12.00,'627685399379','',1,12,12,0,'1',0.0,0.00,0.00,0),(55,'001','001',1,1,'producto 43\r\n',12.00,12.00,12.00,'100189820025','',1,12,12,0,'1',0.0,0.00,0.00,0),(56,'001','001',1,1,'producto 44',12.00,12.00,12.00,'408806824506','',1,12,12,0,'1',0.0,0.00,0.00,5),(57,'001','001',1,1,'producto 45',12.00,12.00,12.00,'459905652758','',1,12,12,0,'1',0.0,0.00,0.00,0),(58,'001','001',1,1,'producto 46',12.00,12.00,12.00,'418516336399','',1,12,12,0,'1',0.0,0.00,0.00,0),(59,'001','001',1,1,'producto 47',12.00,12.00,12.00,'698144586476','',1,12,12,0,'1',0.0,0.00,0.00,0),(60,'001','001',1,1,'producto 48',12.00,12.00,12.00,'701947201697','',1,12,12,0,'1',0.0,0.00,0.00,5),(61,'001','001',1,1,'producto 49',12.00,12.00,12.00,'249760881299','',1,12,12,0,'1',0.0,0.00,0.00,0),(62,'001','001',1,1,'producto 50',12.00,12.00,12.00,'833887916835','',1,12,12,0,'1',0.0,0.00,0.00,5),(63,'001','001',1,1,'producto 50',14.00,15.00,14.00,'687029086693','',1,19,34,0,'1',0.0,0.00,0.00,0),(64,'001','001',1,1,'producto 51',14.00,15.00,14.00,'576269638330','',1,19,34,0,'1',0.0,0.00,0.00,0),(65,'001','001',1,1,'producto 52',14.00,15.00,14.00,'793341231340','',1,19,34,0,'1',0.0,0.00,0.00,5),(66,'001','001',1,1,'producto 53',14.00,15.00,14.00,'601451051982','',1,19,34,0,'1',0.0,0.00,0.00,0),(67,'001','001',1,1,'producto 54',14.00,15.00,14.00,'122277206855','',1,19,34,0,'1',0.0,0.00,0.00,0),(68,'001','001',1,1,'producto 55',14.00,15.00,14.00,'846405067338','',1,19,34,0,'1',0.0,0.00,0.00,5),(69,'001','001',1,1,'producto 56',14.00,15.00,14.00,'643397862691','',1,19,34,0,'1',0.0,0.00,0.00,0),(70,'001','001',1,1,'producto 57',14.00,15.00,14.00,'430541200964','',1,19,34,0,'1',0.0,0.00,0.00,0),(71,'001','001',1,1,'producto 58',14.00,15.00,14.00,'760029362291','',1,19,34,0,'1',0.0,0.00,0.00,5),(72,'001','001',1,1,'producto 59',14.00,15.00,14.00,'375929911971','',1,19,34,0,'1',0.0,0.00,0.00,0),(73,'001','001',1,1,'producto 60',14.00,15.00,14.00,'721312218086','',1,19,34,0,'1',0.0,0.00,0.00,0),(74,'001','001',1,1,'producto 61',14.00,15.00,14.00,'107923663322','',1,19,34,0,'1',0.0,0.00,0.00,5),(75,'001','001',1,1,'producto 62',14.00,15.00,14.00,'890495930696','',1,19,34,0,'1',0.0,0.00,0.00,0),(76,'001','001',1,1,'producto 63',14.00,15.00,14.00,'338443669806','',1,19,34,0,'1',0.0,0.00,0.00,0),(77,'001','001',1,1,'producto 64',14.00,15.00,14.00,'169275368721','',1,19,34,0,'1',0.0,0.00,0.00,5),(78,'001','001',1,1,'producto 65',14.00,15.00,14.00,'626465572628','',1,19,34,0,'1',0.0,0.00,0.00,0),(79,'001','001',1,1,'producto 66',14.00,15.00,14.00,'597208704424','',1,19,34,0,'1',0.0,0.00,0.00,0),(80,'001','001',1,1,'producto 67',14.00,15.00,14.00,'619265737589','',1,19,34,0,'1',0.0,0.00,0.00,5),(81,'001','001',1,1,'producto 68',14.00,15.00,14.00,'429655383741','',1,19,34,0,'1',0.0,0.00,0.00,0),(82,'001','001',1,1,'producto 69',14.00,15.00,14.00,'661711832193','',1,19,34,0,'1',0.0,0.00,0.00,0),(83,'001','001',1,1,'producto 70',14.00,15.00,14.00,'551823359497','',1,19,34,0,'1',0.0,0.00,0.00,5),(84,'001','001',1,1,'producto 71',14.00,15.00,14.00,'721100963392','',1,19,34,0,'1',0.0,0.00,0.00,0),(85,'001','001',1,1,'producto 72',14.00,15.00,14.00,'792073806554','',1,19,34,0,'1',0.0,0.00,0.00,0),(86,'001','001',1,1,'producto 73',14.00,15.00,14.00,'170408890741','',1,19,34,0,'1',0.0,0.00,0.00,5),(87,'001','001',1,1,'producto 744',14.00,15.00,14.00,'255650927551','',1,19,34,0,'1',0.0,0.00,0.00,0),(88,'001','001',1,1,'producto 75',14.00,15.00,14.00,'107957907122','',1,19,34,0,'1',0.0,0.00,0.00,0),(89,'001','001',1,1,'producto 76',14.00,15.00,14.00,'156742900756','',1,19,34,0,'1',0.0,0.00,0.00,0),(90,'001','001',1,1,'producto 77',14.00,15.00,14.00,'178241918029','',1,19,34,0,'1',0.0,0.00,0.00,6),(91,'001','001',1,1,'producto 78',14.00,15.00,14.00,'657117840515','',1,19,34,0,'1',0.0,0.00,0.00,0),(92,'001','001',1,1,'producto 79',14.00,15.00,14.00,'847590693131','',1,19,34,0,'1',0.0,0.00,0.00,3),(93,'001','001',1,1,'producto 80',14.00,15.00,14.00,'556237714883','',1,19,34,0,'1',0.0,0.00,0.00,4),(94,'001','001',1,1,'producto 81',14.00,15.00,14.00,'244614192512','',1,19,34,0,'1',0.0,0.00,0.00,0),(95,'001','001',1,1,'producto 82',14.00,15.00,14.00,'679541664831','',1,19,34,0,'1',0.0,0.00,0.00,3),(96,'001','001',1,1,'producto 83',14.00,15.00,14.00,'907457936469','',1,19,34,0,'1',0.0,0.00,0.00,0),(97,'001','001',1,1,'producto 84',14.00,15.00,14.00,'754606829728','',1,19,34,0,'1',0.0,0.00,0.00,0),(98,'001','001',1,1,'producto 85',14.00,15.00,14.00,'281513322407','',1,19,34,0,'1',0.0,0.00,0.00,0),(99,'001','001',1,1,'producto 86',14.00,15.00,14.00,'738568958583','',1,19,34,0,'1',0.0,0.00,0.00,0),(100,'001','001',1,1,'producto 87',14.00,15.00,14.00,'161101487615','',1,19,34,0,'1',0.0,0.00,0.00,0),(101,'001','001',1,1,'producto 88',14.00,15.00,14.00,'202399605142','',1,19,34,0,'1',0.0,0.00,0.00,3),(102,'001','001',1,1,'producto 89',14.00,15.00,14.00,'406574109948','',1,19,34,0,'1',0.0,0.00,0.00,0),(103,'001','001',1,1,'producto 90',14.00,15.00,14.00,'716718152833','',1,19,34,0,'1',0.0,0.00,0.00,4),(104,'001','12',1,1,'Producto 12',12.00,12.00,12.00,'445369901550','',1,2,20,0,'1',0.0,0.00,0.00,0),(105,'001','001',1,1,'Producto Nuevo A - 001 -001',0.00,0.00,1.00,'754904276463',NULL,1,1,23,0,'1',0.0,0.00,0.00,2),(106,'001','001',1,1,'PRODUCTO XY',0.00,0.00,11.00,'407952405892','',1,2,345,0,'1',0.0,0.00,0.00,0),(107,'001','001',1,1,'Ultimo Producto',0.00,0.00,23.00,'509451199797','',1,1,345,0,'1',0.0,0.00,1.00,0),(108,'001','001',1,1,'PRODUCTO ULTIMO X - 001 -001',0.00,0.00,0.50,'969914432587',NULL,1,2,34,955,'1',0.0,0.00,9876.00,3),(109,'001','001',1,1,'Segundo Producto',0.00,0.00,30.00,'721149939784',NULL,1,2,50,0,'1',0.0,0.00,50.00,0),(110,'001','001',1,1,'Segundo Producto',0.00,0.00,30.00,'634760819035',NULL,1,2,50,0,'1',0.0,0.00,0.00,0),(111,'001','001',1,1,'Tercer Producto - 001 -001',0.00,0.00,2.00,'116204013225',NULL,1,2,2,0,'1',0.0,0.00,0.00,5),(112,'001','001',1,1,'Prueba FINAL',0.00,0.00,2.00,'716478896063',NULL,1,4,5,0,'1',0.0,0.00,0.00,3);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubigeo`
--

DROP TABLE IF EXISTS `ubigeo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubigeo` (
  `nUbigeo_id` int(11) NOT NULL AUTO_INCREMENT,
  `cUbigeoDesc` varchar(150) NOT NULL,
  `nUbigeoDpt` int(11) NOT NULL,
  `nUbigeoProv` int(11) NOT NULL,
  `nUbigeoDist` int(11) NOT NULL,
  `nUbigeoDep` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nUbigeo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2001 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubigeo`
--

LOCK TABLES `ubigeo` WRITE;
/*!40000 ALTER TABLE `ubigeo` DISABLE KEYS */;
INSERT INTO `ubigeo` VALUES (1,'AMAZONAS',1,0,0,0),(2,'ANCASH',1,0,0,0),(3,'APURIMAC',1,0,0,0),(4,'AREQUIPA',1,0,0,0),(5,'AYACUCHO',1,0,0,0),(6,'CAJAMARCA',1,0,0,0),(7,' CUSCO',1,0,0,0),(8,'HUANCAVELICA',1,0,0,0),(9,'HUANUCO',1,0,0,0),(10,'ICA',1,0,0,0),(11,'JUNIN',1,0,0,0),(12,'LA LIBERTAD',1,0,0,0),(13,'LAMBAYEQUE',1,0,0,0),(14,'LIMA',1,0,0,0),(15,'LORETO',1,0,0,0),(16,'MADRE DE DIOS',1,0,0,0),(17,'MOQUEGUA',1,0,0,0),(18,'PASCO',1,0,0,0),(19,'PIURA',1,0,0,0),(20,'PUNO',1,0,0,0),(21,'SAN MARTIN',1,0,0,0),(22,'TACNA',1,0,0,0),(23,'TUMBES',1,0,0,0),(24,'UCAYALY',1,0,0,0),(25,'PROV. CONST. DEL CALLAO',1,0,0,0),(26,'BAGUA',0,1,0,1),(27,'BONGARA',0,1,0,1),(28,'CHACHAPOYAS',0,1,0,1),(29,'CONDORCANQUI',0,1,0,1),(30,'LUYA',0,1,0,1),(31,'RODRIGUEZ DE MENDOZA',0,1,0,1),(32,'UTCUBAMBA',0,1,0,1),(33,'AIJA',0,1,0,2),(34,'ANTONIO RAYMONDI',0,1,0,2),(35,'ASUNCION',0,1,0,2),(36,'BOLOGNESI',0,1,0,2),(37,'CARHUAZ',0,1,0,2),(38,'CARLOS FERMIN FITZCARRALD',0,1,0,2),(39,'CASMA',0,1,0,2),(40,'CORONGO',0,1,0,2),(41,'HUARAZ',0,1,0,2),(42,'HUARI',0,1,0,2),(43,'HUARMEY',0,1,0,2),(44,'HUAYLAS',0,1,0,2),(45,'MARISCAL LUZURIAGA',0,1,0,2),(46,'OCROS',0,1,0,2),(47,'PALLASCA',0,1,0,2),(48,'POMABAMBA',0,1,0,2),(49,'RECUAY',0,1,0,2),(50,'SANTA',0,1,0,2),(51,'SIHUAS',0,1,0,2),(52,'YUNGAY',0,1,0,2),(53,'ABANCAY',0,1,0,3),(54,'ANDAHUAYLAS',0,1,0,3),(55,'ANTABAMBA',0,1,0,3),(56,'AYMARAES',0,1,0,3),(57,'CHINCHEROS',0,1,0,3),(58,'COTABAMBAS',0,1,0,3),(59,'GRAU',0,1,0,3),(60,'AREQUIPA',0,1,0,4),(61,'CAMANA',0,1,0,4),(62,'CARAVELI',0,1,0,4),(63,'CASTILLA',0,1,0,4),(64,'CAYLLOMA',0,1,0,4),(65,'CONDESUYOS',0,1,0,4),(66,'ISLAY',0,1,0,4),(67,'LA UNION',0,1,0,4),(68,'HUAMANGA',0,1,0,5),(69,'CANGALLO',0,1,0,5),(70,'HUANCA SANCOS',0,1,0,5),(71,'HUANTA',0,1,0,5),(72,'LA MAR',0,1,0,5),(73,'LUCANAS',0,1,0,5),(74,'PARINACOCHAS',0,1,0,5),(75,'PAUCAR DEL SARA SARA',0,1,0,5),(76,'SUCRE',0,1,0,5),(77,'VICTOR FAJARDO',0,1,0,5),(78,'VILCAS HUAMAN',0,1,0,5),(79,'CAJAMARCA',0,1,0,6),(80,'CAJABAMBA',0,1,0,6),(81,'CELENDIN',0,1,0,6),(82,'CHOTA',0,1,0,6),(83,'CONTUMAZA',0,1,0,6),(84,'CUTERVO',0,1,0,6),(85,'HUALGAYOC',0,1,0,6),(86,'JAEN',0,1,0,6),(87,'SAN IGNACIO',0,1,0,6),(88,'SAN MARCOS',0,1,0,6),(89,'SAN MIGUEL',0,1,0,6),(90,'SAN PABLO	',0,1,0,6),(91,'SANTA CRUZ	',0,1,0,6),(92,'CUSCO',0,1,0,7),(93,'ACOMAYO',0,1,0,7),(94,'ANTA',0,1,0,7),(95,'CALCA',0,1,0,7),(96,'CANAS',0,1,0,7),(97,'CANCHIS',0,1,0,7),(98,'CHUMBIVILCAS',0,1,0,7),(99,'ESPINAR',0,1,0,7),(100,'LA CONVENCION',0,1,0,7),(101,'PARURO	',0,1,0,7),(102,'PAUCARTAMBO',0,1,0,7),(103,'QUISPICANCHI',0,1,0,7),(104,'URUBAMBA',0,1,0,7),(105,'HUANCAVELICA',0,1,0,8),(106,'ACOBAMBA',0,1,0,8),(107,'ANGARAES',0,1,0,8),(108,'CASTROVIRREYNA',0,1,0,8),(109,'CHURCAMPA',0,1,0,8),(110,'HUAYTARA',0,1,0,8),(111,'TAYACAJA',0,1,0,8),(112,'HUANUCO',0,1,0,9),(113,'AMBO',0,1,0,9),(114,'DOS DE MAYO',0,1,0,9),(115,'HUACAYBAMBA',0,1,0,9),(116,'HUAMALIES',0,1,0,9),(117,'LEONCIO PRADO',0,1,0,9),(118,'MARAÃ‘ON',0,1,0,9),(119,'PACHITEA',0,1,0,9),(120,'PUERTO INCA',0,1,0,9),(121,'LAURICOCHA',0,1,0,9),(122,'YAROWILCA',0,1,0,9),(123,'ICA',0,1,0,10),(124,'CHINCHA',0,1,0,10),(125,'NAZCA',0,1,0,10),(126,'PALPA',0,1,0,10),(127,'PISCO',0,1,0,10),(128,'HUANCAYO',0,1,0,11),(129,'CONCEPCION',0,1,0,11),(130,'CHANCHAMAYO',0,1,0,11),(131,'JAUJA',0,1,0,11),(132,'JUNIN',0,1,0,11),(133,'SATIPO',0,1,0,11),(134,'TARMA',0,1,0,11),(135,'YAULI',0,1,0,11),(136,'CHUPACA',0,1,0,11),(137,'TRUJILLO',0,1,0,12),(138,'ASCOPE',0,1,0,12),(139,'BOLIVAR',0,1,0,12),(140,'CHEPEN',0,1,0,12),(141,'JULCAN',0,1,0,12),(142,'OTUZCO',0,1,0,12),(143,'PACASMAYO',0,1,0,12),(144,'PATAZ',0,1,0,12),(145,'SANCHEZ CARRION',0,1,0,12),(146,'SANTIAGO DE CHUCO',0,1,0,12),(147,'GRAN CHIMU',0,1,0,12),(148,'VIRU',0,1,0,12),(149,'CHICLAYO',0,1,0,13),(150,'FERREÃ‘AFE',0,1,0,13),(151,'LAMBAYEQUE',0,1,0,13),(152,'LIMA',0,1,0,14),(153,'BARRANCA',0,1,0,14),(154,'CAJATAMBO',0,1,0,14),(155,'CANTA',0,1,0,14),(156,'CAÃ‘ETE',0,1,0,14),(157,'HUARAL',0,1,0,14),(158,'HUAROCHIRI',0,1,0,14),(159,'HUAURA',0,1,0,14),(160,'OYON',0,1,0,14),(161,'YAUYOS',0,1,0,14),(162,'MAYNAS',0,1,0,15),(163,'ALTO AMAZONAS',0,1,0,15),(164,'LORETO',0,1,0,15),(165,'MARISCAL RAMON CASTILLA',0,1,0,15),(166,'REQUENA',0,1,0,15),(167,'UCAYALI',0,1,0,15),(168,'DATEM DEL MARAÃ‘ON',0,1,0,15),(169,'TAMBOPATA',0,1,0,16),(170,'MANU',0,1,0,16),(171,'TAHUAMANU',0,1,0,16),(172,'MARISCAL NIETO',0,1,0,17),(173,'GENERAL SANCHEZ CERRO',0,1,0,17),(174,'ILO',0,1,0,17),(175,'PASCO',0,1,0,18),(176,'DANIEL ALCIDES CARRION',0,1,0,18),(177,'OXAPAMPA',0,1,0,18),(178,'PIURA',0,1,0,19),(179,'AYABACA',0,1,0,19),(180,'HUANCABAMBA',0,1,0,19),(181,'MORROPON',0,1,0,19),(182,'PAITA',0,1,0,19),(183,'SULLANA',0,1,0,19),(184,'TALARA',0,1,0,19),(185,'SECHURA',0,1,0,19),(186,'PUNO',0,1,0,20),(187,'AZANGARO',0,1,0,20),(188,'CARABAYA',0,1,0,20),(189,'CHUCUITO',0,1,0,20),(190,'EL COLLAO',0,1,0,20),(191,'HUANCANE',0,1,0,20),(192,'LAMPA',0,1,0,20),(193,'MELGAR',0,1,0,20),(194,'MOHO',0,1,0,20),(195,'SAN ANTONIO DE PUTINA',0,1,0,20),(196,'SAN ROMAN',0,1,0,20),(197,'SANDIA',0,1,0,20),(198,'YUNGUYO',0,1,0,20),(199,'MOYOBAMBA',0,1,0,21),(200,'BELLAVISTA',0,1,0,21),(201,'EL DORADO',0,1,0,21),(202,'HUALLAGA',0,1,0,21),(203,'LAMAS',0,1,0,21),(204,'MARISCAL CACERES',0,1,0,21),(205,'PICOTA',0,1,0,21),(206,'RIOJA',0,1,0,21),(207,'SAN MARTIN',0,1,0,21),(208,'TOCACHE',0,1,0,21),(209,'TACNA',0,1,0,22),(210,'ANDARAVE',0,1,0,22),(211,'JORGE BASADRE',0,1,0,22),(212,'TARATA',0,1,0,22),(213,'TUMBES',0,1,0,23),(214,'CONTRALMIRANTE VILLAR',0,1,0,23),(215,'ZARUMILLA',0,1,0,23),(216,'CORONEL PORTILLO',0,1,0,24),(217,'ATALAYA',0,1,0,24),(218,'PADRE ABAD',0,1,0,24),(219,'PURUS',0,1,0,24),(220,'PROV. CONST. DEL CALLAO',0,1,0,25),(221,'CHACHAPOYAS',0,0,1,28),(222,'ASUNCION',0,0,1,28),(223,'BALSAS',0,0,1,28),(224,'CHETO',0,0,1,28),(225,'CHILIQUIN',0,0,1,28),(226,'CHUQUIBAMBA',0,0,1,28),(227,'GRANADA',0,0,1,28),(228,'HUANCAS',0,0,1,28),(229,'LA JALCA',0,0,1,28),(230,'LEIMEBAMBA',0,0,1,28),(231,'LEVANTO',0,0,1,28),(232,'MAGDALENA',0,0,1,28),(233,'MARISCAL CASTILLA',0,0,1,28),(234,'MOLINOPAMPA',0,0,1,28),(235,'MONTEVIDEO',0,0,1,28),(236,'OLLEROS',0,0,1,28),(237,'QUINJALCA',0,0,1,28),(238,'SAN FRANCISCO DE DAGUAS',0,0,1,28),(239,'SAN ISIDRO DE MAINO',0,0,1,28),(240,'SOLOCO',0,0,1,28),(241,'SONCHE',0,0,1,28),(242,'BAGUA',0,0,1,26),(243,'ARAMANGO',0,0,1,26),(244,'COPALLIN',0,0,1,26),(245,'EL PARCO',0,0,1,26),(246,'IMAZA',0,0,1,26),(247,'LA PECA',0,0,1,26),(248,'JUMBILLA',0,0,1,27),(249,'CHISQUILLA',0,0,1,27),(250,'CHURUJA',0,0,1,27),(251,'COROSHA',0,0,1,27),(252,'CUISPES',0,0,1,27),(253,'FLORIDA',0,0,1,27),(254,'JAZAN',0,0,1,27),(255,'RECTA',0,0,1,27),(256,'SAN CARLOS',0,0,1,27),(257,'SHIPASBAMBA',0,0,1,27),(258,'VALERA',0,0,1,27),(259,'YAMBRASBAMBA',0,0,1,27),(260,'NIEVA',0,0,1,29),(261,'EL CENEPA',0,0,1,29),(262,'RIO SANTIAGO',0,0,1,29),(263,'LAMUD',0,0,1,30),(264,'CAMPORREDONDO',0,0,1,30),(265,'COCABAMBA',0,0,1,30),(266,'COLCAMAR',0,0,1,30),(267,'CONILA',0,0,1,30),(268,'INGUILPATA',0,0,1,30),(269,'LONGUITA',0,0,1,30),(270,'LONYA CHICO',0,0,1,30),(271,'LUYA',0,0,1,30),(272,'LUYA VIEJO',0,0,1,30),(273,'MARIA',0,0,1,30),(274,'OCALLI',0,0,1,30),(275,'OCUMAL',0,0,1,30),(276,'PISUQUIA',0,0,1,30),(277,'PROVIDENCIA',0,0,1,30),(278,'SAN CRISTOBAL',0,0,1,30),(279,'SAN FRANCISCO DEL YESO',0,0,1,30),(280,'SAN JERONIMO',0,0,1,30),(281,'SAN JUAN DE LOPECANCHA',0,0,1,30),(282,'SANTA CATALINA',0,0,1,30),(283,'SANTO TOMAS',0,0,1,30),(284,'TINGO',0,0,1,30),(285,'TRITA',0,0,1,30),(286,'SAN NICOLAS',0,0,1,31),(287,'CHIRIMOTO',0,0,1,31),(288,'COCHAMAL',0,0,1,31),(289,'HUAMBO',0,0,1,31),(290,'LIMABAMBA',0,0,1,31),(291,'LONGAR',0,0,1,31),(292,'MARISCAL BENAVIDES',0,0,1,31),(293,'MILPUC',0,0,1,31),(294,'OMIA',0,0,1,31),(295,'SANTA ROSA',0,0,1,31),(296,'TOTORA',0,0,1,31),(297,'VISTA ALEGRE',0,0,1,31),(298,'BAGUA GRANDE',0,0,1,32),(299,'CAJARURO',0,0,1,32),(300,'CUMBA',0,0,1,32),(301,'EL MILAGRO',0,0,1,32),(302,'JAMALCA',0,0,1,32),(303,'LONYA GRANDE',0,0,1,32),(304,'YAMON',0,0,1,32),(305,'AIJA',0,0,1,33),(306,'CORIS',0,0,1,33),(307,'HUACLLAN',0,0,1,33),(308,'LA MERCED',0,0,1,33),(309,'SUCCHA',0,0,1,33),(310,'LLAMELLIN',0,0,1,34),(311,'ACZO',0,0,1,34),(312,'CHACCHO',0,0,1,34),(313,'CHINGAS',0,0,1,34),(314,'MIRGAS',0,0,1,34),(315,'SAN JUAN DE RONTOY',0,0,1,34),(316,'CHACAS',0,0,1,35),(317,'ACOCHACA',0,0,1,35),(318,'CHIQUIAN',0,0,1,36),(319,'ABELARDO PARDO LEZAMETA',0,0,1,36),(320,'ANTONIO RAYMONDI',0,0,1,36),(321,'AQUIA',0,0,1,36),(322,'CAJACAY',0,0,1,36),(323,'CANIS',0,0,1,36),(324,'COLQUIOC',0,0,1,36),(325,'HUALLANCA',0,0,1,36),(326,'HUASTA',0,0,1,36),(327,'HUAYLLACAYAN',0,0,1,36),(328,'LA PRIMAVERA',0,0,1,36),(329,'MANGAS',0,0,1,36),(330,'PACLLON',0,0,1,36),(331,'SAN MIGUEL DE CORPANQUI',0,0,1,36),(332,'TICLLOS',0,0,1,36),(333,'CARHUAZ',0,0,1,37),(334,'ACOPAMPA',0,0,1,37),(335,'AMASHCA',0,0,1,37),(336,'ANTA',0,0,1,37),(337,'ATAQUERO',0,0,1,37),(338,'MARCARA',0,0,1,37),(339,'PARIAHUANCA',0,0,1,37),(340,'SAN MIGUEL DE ACO',0,0,1,37),(341,'SHILLA',0,0,1,37),(342,'TINCO',0,0,1,37),(343,'YUNGAR',0,0,1,37),(344,'SAN LUIS',0,0,1,38),(345,'SAN NICOLAS',0,0,1,38),(346,'YAUYA',0,0,1,38),(347,'CASMA',0,0,1,39),(348,'BUENA VISTA ALTA',0,0,1,39),(349,'COMANDANTE NOEL',0,0,1,39),(350,'YAUTAN',0,0,1,39),(351,'CORONGO',0,0,1,40),(352,'ACO',0,0,1,40),(353,'BAMBAS',0,0,1,40),(354,'CUSCA',0,0,1,40),(355,'LA PAMPA',0,0,1,40),(356,'YANAC',0,0,1,40),(357,'YUPAN',0,0,1,40),(358,'HUARAZ',0,0,1,41),(359,'COCHABAMBA',0,0,1,41),(360,'COLCABAMBA',0,0,1,41),(361,'HUANCHAY',0,0,1,41),(362,'INDEPENDENCIA',0,0,1,41),(363,'JANGAS',0,0,1,41),(364,'LA LIBERTAD',0,0,1,41),(365,'OLLEROS',0,0,1,41),(366,'PAMPAS',0,0,1,41),(367,'PARIACOTO',0,0,1,41),(368,'PIRA',0,0,1,41),(369,'TARICA',0,0,1,41),(370,'HUARMEY',0,0,1,43),(371,'COCHAPETI',0,0,1,43),(372,'CULEBRAS',0,0,1,43),(373,'HUAYAN',0,0,1,43),(374,'MALVAS',0,0,1,43),(375,'CARAZ',0,0,1,44),(376,'HUALLANCA',0,0,1,44),(377,'HUATA',0,0,1,44),(378,'HUAYLAS',0,0,1,44),(379,'MATO',0,0,1,44),(380,'PAMPAROMAS',0,0,1,44),(381,'PUEBLO LIBRE',0,0,1,44),(382,'SANTA CRUZ',0,0,1,44),(383,'SANTO TORIBIO',0,0,1,44),(384,'YURACMARCA',0,0,1,44),(385,'PISCOBAMBA',0,0,1,44),(386,'CASCA',0,0,1,45),(387,'ELEAZAR GUZMAN BARRON',0,0,1,45),(388,'FIDEL OLIVAS ESCUDERO',0,0,1,45),(389,'LLAMA',0,0,1,45),(390,'LLUMPA',0,0,1,45),(391,'LUCMA',0,0,1,45),(392,'MUSGA',0,0,1,45),(393,'OCROS',0,0,1,46),(394,'ACAS',0,0,1,46),(395,'CAJAMARQUILLA',0,0,1,46),(396,'CARHUAPAMPA',0,0,1,46),(397,'COCHAS',0,0,1,46),(398,'CONGAS',0,0,1,46),(399,'LLIPA',0,0,1,46),(400,'SAN CRISTOBAL DE RAJAN',0,0,1,46),(401,'SAN PEDRO',0,0,1,46),(402,'SANTIAGO DE CHILCAS',0,0,1,46),(403,'CABANA',0,0,1,47),(404,'BOLOGNESI',0,0,1,47),(405,'CONCHUCOS',0,0,1,47),(406,'HUACASCHUQUE',0,0,1,47),(407,'HUANDOVAL',0,0,1,47),(408,'LACABAMBA',0,0,1,47),(409,'LLAPO',0,0,1,47),(410,'PALLASCA',0,0,1,47),(411,'PAMPAS',0,0,1,47),(412,'SANTA ROSA',0,0,1,47),(413,'TAUCA',0,0,1,47),(414,'POMABAMBA',0,0,1,48),(415,'HUAYLLAN',0,0,1,48),(416,'PAROBAMBA',0,0,1,48),(417,'QUINUABAMBA',0,0,1,48),(418,'RECUAY',0,0,1,49),(419,'CATAC',0,0,1,49),(420,'COTAPARACO',0,0,1,49),(421,'HUAYLLAPAMPA',0,0,1,49),(422,'LLACLLIN',0,0,1,49),(423,'MARCA',0,0,1,49),(424,'PAMPAS CHICO',0,0,1,49),(425,'PARARIN',0,0,1,49),(426,'TAPACOCHA',0,0,1,49),(427,'TICAPAMPA',0,0,1,49),(428,'CHIMBOTE',0,0,1,50),(429,'CACERES DEL PERU',0,0,1,50),(430,'COISHCO',0,0,1,50),(431,'MACATE',0,0,1,50),(432,'MORO',0,0,1,50),(433,'NEPEÃ‘A',0,0,1,50),(434,'SAMANCO',0,0,1,50),(435,'SANTA',0,0,1,50),(436,'NUEVO CHIMBOTE',0,0,1,50),(437,'SIHUAS',0,0,1,51),(438,'ACOBAMBA',0,0,1,51),(439,'ALFONSO UGARTE',0,0,1,51),(440,'CASHAPAMPA',0,0,1,51),(441,'CHINGALPO',0,0,1,51),(442,'HUAYLLABAMBA',0,0,1,51),(443,'QUICHES',0,0,1,51),(444,'RAGASH',0,0,1,51),(445,'SAN JUAN',0,0,1,51),(446,'SICSIBAMBA',0,0,1,51),(447,'YUNGAY',0,0,1,52),(448,'CASCAPARA',0,0,1,52),(449,'MANCOS',0,0,1,52),(450,'MATACOTO',0,0,1,52),(451,'QUILLO',0,0,1,52),(452,'RANRAHIRCA',0,0,1,52),(453,'SHUPLUY',0,0,1,52),(454,'YANAMA',0,0,1,52),(455,'ANRA',0,0,1,42),(456,'CAJAY',0,0,1,42),(457,'CHAVIN DE HUANTAR',0,0,1,42),(458,'HUACACHI',0,0,1,42),(459,'HUACCHIS',0,0,1,42),(460,'HUACHIS',0,0,1,42),(461,'HUANTAR',0,0,1,42),(462,'HUARI',0,0,1,42),(463,'MASIN',0,0,1,42),(464,'PAUCAS',0,0,1,42),(465,'PONTO',0,0,1,42),(466,'RAHUAPAMPA',0,0,1,42),(467,'RAPAYAN',0,0,1,42),(468,'SAN MARCOS',0,0,1,42),(469,'SAN PEDRO DE CHANA',0,0,1,42),(470,'UCO',0,0,1,42),(471,'PISCOBAMBA',0,0,1,45),(472,'ABANCAY',0,0,1,53),(473,'CHACOCHE',0,0,1,53),(474,'CIRCA',0,0,1,53),(475,'CURAHUASI',0,0,1,53),(476,'HUANIPACA',0,0,1,53),(477,'LAMBRAMA',0,0,1,53),(478,'PICHIRHUA',0,0,1,53),(479,'SAN PEDRO DE CACHORA',0,0,1,53),(480,'TAMBURCO',0,0,1,53),(481,'ANDAHUAYLAS',0,0,1,54),(482,'ANDARAPA',0,0,1,54),(483,'CHIARA',0,0,1,54),(484,'HUANCARAMA',0,0,1,54),(485,'HUANCARAY',0,0,1,54),(486,'HUAYANA',0,0,1,54),(487,'KISHUARA',0,0,1,54),(488,'PACOBAMBA',0,0,1,54),(489,'PACUCHA',0,0,1,54),(490,'PAMPACHIRI',0,0,1,54),(491,'POMACOCHA',0,0,1,54),(492,'SAN ANTONIO DE CACHI',0,0,1,54),(493,'SAN JERONIMO',0,0,1,54),(494,'SAN MIGUEL DE CHACCRAMPA',0,0,1,54),(495,'SANTA MARIA DE CHICMO',0,0,1,54),(496,'TALAVERA',0,0,1,54),(497,'TUMAY HUARACA',0,0,1,54),(498,'TURPO',0,0,1,54),(499,'KAQUIABAMBA',0,0,1,54),(500,'ANTABAMBA',0,0,1,55),(501,'EL ORO',0,0,1,55),(502,'HUAQUIRCA',0,0,1,55),(503,'JUAN ESPINOZA MEDRANO',0,0,1,55),(504,'OROPESA',0,0,1,55),(505,'PACHACONAS',0,0,1,55),(506,'SABAINO',0,0,1,55),(507,'CHALHUANCA',0,0,1,56),(508,'CAPAYA',0,0,1,56),(509,'CARAYBAMBA',0,0,1,56),(510,'CHAPIMARCA',0,0,1,56),(511,'COLCABAMBA',0,0,1,56),(512,'COTARUSE',0,0,1,56),(513,'HUAYLLO',0,0,1,56),(514,'JUSTO APU SAHUARAURA',0,0,1,56),(515,'LUCRE',0,0,1,56),(516,'POCOHUANCA',0,0,1,56),(517,'SAN JUAN DE CHACÃ‘A',0,0,1,56),(518,'SAÃ‘AYCA',0,0,1,56),(519,'SORAYA',0,0,1,56),(520,'TAPAIRIHUA',0,0,1,56),(521,'TINTAY',0,0,1,56),(522,'TORAYA',0,0,1,56),(523,'YANACA',0,0,1,56),(524,'TAMBOBAMBA',0,0,1,57),(525,'COTABAMBAS',0,0,1,57),(526,'COYLLURQUI',0,0,1,57),(527,'HAQUIRA',0,0,1,57),(528,'MARA',0,0,1,57),(529,'CHALLHUAHUACHO',0,0,1,57),(530,'CHINCHEROS',0,0,1,58),(531,'ANCO-HUALLO',0,0,1,58),(532,'COCHARCAS',0,0,1,58),(533,'HUACCANA',0,0,1,58),(534,'OCOBAMBA',0,0,1,58),(535,'ONGOY',0,0,1,58),(536,'URANMARCA',0,0,1,58),(537,'RANRACANCHA',0,0,1,58),(538,'CHUQUIBAMBILLA',0,0,1,59),(539,'CURPAHUASI',0,0,1,59),(540,'GAMARRA',0,0,1,59),(541,'HUAYLLATI',0,0,1,59),(542,'MAMARA',0,0,1,59),(543,'MICAELA BASTIDAS',0,0,1,59),(544,'PATAYPAMPA',0,0,1,59),(545,'PROGRESO',0,0,1,59),(546,'SAN ANTONIO',0,0,1,59),(547,'SANTA ROSA',0,0,1,59),(548,'TURPAY',0,0,1,59),(549,'VILCABAMBA',0,0,1,59),(550,'VIRUNDO',0,0,1,59),(551,'CURASCO',0,0,1,59),(552,'AREQUIPA',0,0,1,60),(553,'ALTO SELVA ALEGRE',0,0,1,60),(554,'CAYMA',0,0,1,60),(555,'CERRO COLORADO',0,0,1,60),(556,'CHARACATO',0,0,1,60),(557,'CHIGUATA',0,0,1,60),(558,'JACOBO HUNTER',0,0,1,60),(559,'LA JOYA',0,0,1,60),(560,'MARIANO MELGAR',0,0,1,60),(561,'MIRAFLORES',0,0,1,60),(562,'MOLLEBAYA',0,0,1,60),(563,'PAUCARPATA',0,0,1,60),(564,'POCSI',0,0,1,60),(565,'POLOBAYA',0,0,1,60),(566,'QUEQUEÃ‘A',0,0,1,60),(567,'SABANDIA',0,0,1,60),(568,'SACHACA',0,0,1,60),(569,'SAN JUAN DE SIGUAS',0,0,1,60),(570,'SAN JUAN DE TARUCANI',0,0,1,60),(571,'SANTA ISABEL DE SIGUAS',0,0,1,60),(572,'SANTA RITA DE SIGUAS',0,0,1,60),(573,'SOCABAYA',0,0,1,60),(574,'TIABAYA',0,0,1,60),(575,'UCHUMAYO',0,0,1,60),(576,'VITOR ',0,0,1,60),(577,'YANAHUARA',0,0,1,60),(578,'YARABAMBA',0,0,1,60),(579,'YURA',0,0,1,60),(580,'JOSE LUIS BUSTAMANTE Y RIVERO',0,0,1,60),(581,'CAMANA	',0,0,1,61),(582,'JOSE MARIA QUIMPER',0,0,1,61),(583,'MARIANO NICOLAS VALCARCEL',0,0,1,61),(584,'MARISCAL CACERES',0,0,1,61),(585,'NICOLAS DE PIEROLA',0,0,1,61),(586,'OCOÃ‘A',0,0,1,61),(587,'QUILCA',0,0,1,61),(588,'SAMUEL PASTOR',0,0,1,61),(589,'CARAVELI',0,0,1,62),(590,'ACARI',0,0,1,62),(591,'ATICO',0,0,1,62),(592,'ATIQUIPA',0,0,1,62),(593,'BELLA UNION',0,0,1,62),(594,'CAHUACHO',0,0,1,62),(595,'CHALA',0,0,1,62),(596,'CHAPARRA',0,0,1,62),(597,'HUANUHUANU',0,0,1,62),(598,'JAQUI',0,0,1,62),(599,'LOMAS',0,0,1,62),(600,'QUICACHA',0,0,1,62),(601,'YAUCA',0,0,1,62),(602,'APLAO',0,0,1,63),(603,'ANDAGUA',0,0,1,63),(604,'AYO',0,0,1,63),(605,'CHACHAS',0,0,1,63),(606,'CHILCAYMARCA',0,0,1,63),(607,'CHOCO',0,0,1,63),(608,'HUANCARQUI',0,0,1,63),(609,'MACHAGUAY',0,0,1,63),(610,'ORCOPAMPA',0,0,1,63),(611,'PAMPACOLCA',0,0,1,63),(612,'TIPAN',0,0,1,63),(613,'UÃ‘ON',0,0,1,63),(614,'URACA',0,0,1,63),(615,'VIRACO',0,0,1,63),(616,'CHIVAY',0,0,1,64),(617,'ACHOMA',0,0,1,64),(618,'CABANACONDE',0,0,1,64),(619,'CALLALLI',0,0,1,64),(620,'CAYLLOMA',0,0,1,64),(621,'COPORAQUE',0,0,1,64),(622,'HUAMBO',0,0,1,64),(623,'HUANCA',0,0,1,64),(624,'ICHUPAMPA',0,0,1,64),(625,'LARI',0,0,1,64),(626,'LLUTA',0,0,1,64),(627,'MACA',0,0,1,64),(628,'MADRIGAL',0,0,1,64),(629,'SAN ANTONIO DE CHUCA',0,0,1,64),(630,'SIBAYO',0,0,1,64),(631,'TAPAY',0,0,1,64),(632,'TISCO',0,0,1,64),(633,'TUTI',0,0,1,64),(634,'YANQUE',0,0,1,64),(635,'MAJES',0,0,1,64),(636,'CHUQUIBAMBA',0,0,1,65),(637,'ANDARAY',0,0,1,65),(638,'CAYARANI',0,0,1,65),(639,'CHICHAS',0,0,1,65),(640,'IRAY',0,0,1,65),(641,'RIO GRANDE',0,0,1,65),(642,'SALAMANCA',0,0,1,65),(643,'YANAQUIHUA',0,0,1,65),(644,'MOLLENDO',0,0,1,66),(645,'COCACHACRA',0,0,1,66),(646,'DEAN VALDIVIA',0,0,1,66),(647,'ISLAY',0,0,1,66),(648,'MEJIA',0,0,1,66),(649,'PUNTA DE BOMBON',0,0,1,66),(650,'COTAHUASI',0,0,1,67),(651,'ALCA',0,0,1,67),(652,'CHARCANA',0,0,1,67),(653,'HUAYNACOTAS',0,0,1,67),(654,'PAMPAMARCA',0,0,1,67),(655,'PUYCA',0,0,1,67),(656,'QUECHUALLA',0,0,1,67),(657,'SAYLA',0,0,1,67),(658,'TAURIA',0,0,1,67),(659,'TOMEPAMPA',0,0,1,67),(660,'TORO',0,0,1,67),(661,'AYACUCHO',0,0,1,68),(662,'ACOCRO',0,0,1,68),(663,'ACOS VINCHOS',0,0,1,68),(664,'CARMEN ALTO',0,0,1,68),(665,'CHIARA',0,0,1,68),(666,'OCROS',0,0,1,68),(667,'PACAYCASA',0,0,1,68),(668,'QUINUA',0,0,1,68),(669,'SAN JOSE DE TICLLAS',0,0,1,68),(670,'SAN JUAN BAUTISTA',0,0,1,68),(671,'SANTIAGO DE PISCHA',0,0,1,68),(672,'SOCOS',0,0,1,68),(673,'TAMBILLO',0,0,1,68),(674,'VINCHOS',0,0,1,68),(675,'JESUS NAZARENO',0,0,1,68),(676,'CANGALLO',0,0,1,69),(677,'CHUSCHI',0,0,1,69),(678,'LOS MOROCHUCOS',0,0,1,69),(679,'MARIA PARADO DE BELLIDO',0,0,1,69),(680,'PARAS',0,0,1,69),(681,'TOTOS',0,0,1,69),(682,'SANCOS',0,0,1,70),(683,'CARAPO',0,0,1,70),(684,'SACSAMARCA',0,0,1,70),(685,'SANTIAGO DE LUCANAMARCA',0,0,1,70),(686,'HUANTA',0,0,1,71),(687,'AYAHUANCO',0,0,1,71),(688,'HUAMANGUILLA',0,0,1,71),(689,'IGUAIN',0,0,1,71),(690,'LURICOCHA',0,0,1,71),(691,'SANTILLANA',0,0,1,71),(692,'SIVIA',0,0,1,71),(693,'LLOCHEGUA',0,0,1,71),(694,'SAN MIGUEL',0,0,1,72),(695,'ANCO',0,0,1,72),(696,'AYNA',0,0,1,72),(697,'CHILCAS',0,0,1,72),(698,'CHUNGUI',0,0,1,72),(699,'LUIS CARRANZA',0,0,1,72),(700,'SANTA ROSA',0,0,1,72),(701,'TAMBO',0,0,1,72),(702,'PUQUIO',0,0,1,73),(703,'AUCARA',0,0,1,73),(704,'CABANA',0,0,1,73),(705,'CARMEN SALCEDO',0,0,1,73),(706,'CHAVIÃ‘A',0,0,1,73),(707,'CHIPAO',0,0,1,73),(708,'HUAC-HUAS',0,0,1,73),(709,'LARAMATE',0,0,1,73),(710,'LEONCIO PRADO',0,0,1,73),(711,'LLAUTA',0,0,1,73),(712,'LUCANAS',0,0,1,73),(713,'OCAÃ‘A',0,0,1,73),(714,'OTOCA',0,0,1,73),(715,'SAISA',0,0,1,73),(716,'SAN CRISTOBAL',0,0,1,73),(717,'SAN JUAN',0,0,1,73),(718,'SAN PEDRO',0,0,1,73),(719,'SAN PEDRO DE PALCO',0,0,1,73),(720,'SANCOS',0,0,1,73),(721,'SANTA ANA DE HUAYCAHUACHO',0,0,1,73),(722,'SANTA LUCIA',0,0,1,73),(723,'CORACORA',0,0,1,74),(724,'CHUMPI',0,0,1,74),(725,'CORONEL CASTAÃ‘EDA',0,0,1,74),(726,'PACAPAUSA',0,0,1,74),(727,'PULLO',0,0,1,74),(728,'PUYUSCA',0,0,1,74),(729,'SAN FRANCISCO DE RAVACAYCO',0,0,1,74),(730,'UPAHUACHO',0,0,1,74),(731,'PAUSA',0,0,1,75),(732,'COLTA',0,0,1,75),(733,'CORCULLA',0,0,1,75),(734,'LAMPA',0,0,1,75),(735,'MARCABAMBA',0,0,1,75),(736,'OYOLO',0,0,1,75),(737,'PARARCA',0,0,1,75),(738,'SAN JAVIER DE ALPABAMBA',0,0,1,75),(739,'SAN JOSE DE USHUA',0,0,1,75),(740,'SARA SARA',0,0,1,75),(741,'QUEROBAMBA',0,0,1,76),(742,'BELEN',0,0,1,76),(743,'CHALCOS',0,0,1,76),(744,'CHILCAYOC',0,0,1,76),(745,'HUACAÃ‘A',0,0,1,76),(746,'MORCOLLA',0,0,1,76),(747,'PAICO',0,0,1,76),(748,'SAN PEDRO DE LARCAY',0,0,1,76),(749,'SAN SALVADOR DE QUIJE',0,0,1,76),(750,'SANTIAGO DE PAUCARAY',0,0,1,76),(751,'SORAS',0,0,1,76),(752,'HUANCAPI',0,0,1,77),(753,'ALCAMENCA',0,0,1,77),(754,'APONGO',0,0,1,77),(755,'ASQUIPATA',0,0,1,77),(756,'CANARIA',0,0,1,77),(757,'CAYARA',0,0,1,77),(758,'COLCA',0,0,1,77),(759,'HUAMANQUIQUIA',0,0,1,77),(760,'HUANCARAYLLA',0,0,1,77),(761,'HUAYA',0,0,1,77),(762,'SARHUA',0,0,1,77),(763,'VILCANCHOS',0,0,1,77),(764,'VILCAS HUAMAN',0,0,1,78),(765,'ACCOMARCA',0,0,1,78),(766,'CARHUANCA',0,0,1,78),(767,'CONCEPCION',0,0,1,78),(768,'HUAMBALPA',0,0,1,78),(769,'INDEPENDENCIA',0,0,1,78),(770,'SAURAMA',0,0,1,78),(771,'VISCHONGO',0,0,1,78),(772,'CAJAMARCA',0,0,1,79),(773,'ASUNCION',0,0,1,79),(774,'CHETILLA',0,0,1,79),(775,'COSPAN',0,0,1,79),(776,'ENCAÃ‘ADA',0,0,1,79),(777,'JESUS',0,0,1,79),(778,'LLACANORA',0,0,1,79),(779,'LOS BAÃ‘OS DEL INCA',0,0,1,79),(780,'MAGDALENA',0,0,1,79),(781,'MATARA',0,0,1,79),(782,'NAMORA',0,0,1,79),(783,'SAN JUAN',0,0,1,79),(784,'CAJABAMBA',0,0,1,80),(785,'CACHACHI',0,0,1,80),(786,'CONDEBAMBA',0,0,1,80),(787,'SITACOCHA',0,0,1,80),(788,'CELENDIN',0,0,1,81),(789,'CHUMUCH',0,0,1,81),(790,'CORTEGANA',0,0,1,81),(791,'HUASMIN',0,0,1,81),(792,'JORGE CHAVEZ',0,0,1,81),(793,'JOSE GALVEZ',0,0,1,81),(794,'MIGUEL IGLESIAS',0,0,1,81),(795,'OXAMARCA',0,0,1,81),(796,'SOROCHUCO',0,0,1,81),(797,'SUCRE',0,0,1,81),(798,'UTCO',0,0,1,81),(799,'LA LIBERTAD DE PALLAN',0,0,1,81),(800,'CHOTA',0,0,1,82),(801,'ANGUIA',0,0,1,82),(802,'CHADIN',0,0,1,82),(803,'CHIGUIRIP',0,0,1,82),(804,'CHIMBAN',0,0,1,82),(805,'CHOROPAMPA',0,0,1,82),(806,'COCHABAMBA',0,0,1,82),(807,'CONCHAN',0,0,1,82),(808,'HUAMBOS',0,0,1,82),(809,'LAJAS',0,0,1,82),(810,'LLAMA',0,0,1,82),(811,'MIRACOSTA',0,0,1,82),(812,'PACCHA',0,0,1,82),(813,'PION',0,0,1,82),(814,'QUEROCOTO',0,0,1,82),(815,'SAN JUAN DE LICUPIS',0,0,1,82),(816,'TACABAMBA',0,0,1,82),(817,'TOCMOCHE',0,0,1,82),(818,'CHALAMARCA',0,0,1,82),(819,'CONTUMAZA',0,0,1,83),(820,'CHILETE',0,0,1,83),(821,'CUPISNIQUE',0,0,1,83),(822,'GUZMANGO',0,0,1,83),(823,'SAN BENITO',0,0,1,83),(824,'SANTA CRUZ DE TOLED',0,0,1,83),(825,'TANTARICA',0,0,1,83),(826,'YONAN',0,0,1,83),(827,'CUTERVO',0,0,1,84),(828,'CALLAYUC',0,0,1,84),(829,'CHOROS',0,0,1,84),(830,'CUJILLO',0,0,1,84),(831,'LA RAMADA',0,0,1,84),(832,'PIMPINGOS',0,0,1,84),(833,'QUEROCOTILLO',0,0,1,84),(834,'SAN ANDRES DE CUTERVO',0,0,1,84),(835,'SAN JUAN DE CUTERVO',0,0,1,84),(836,'SAN LUIS DE LUCMA',0,0,1,84),(837,'SANTA CRUZ',0,0,1,84),(838,'SANTO DOMINGO DE LA CAPILLA',0,0,1,84),(839,'SANTO TOMAS',0,0,1,84),(840,'SOCOTA',0,0,1,84),(841,'TORIBIO CASANOVA',0,0,1,84),(842,'BAMBAMARCA',0,0,1,85),(843,'CHUGUR',0,0,1,85),(844,'HUALGAYOC',0,0,1,85),(845,'JAEN',0,0,1,86),(846,'BELLAVISTA',0,0,1,86),(847,'CHONTALI',0,0,1,86),(848,'COLASAY',0,0,1,86),(849,'HUABAL',0,0,1,86),(850,'LAS PIRIAS',0,0,1,86),(851,'POMAHUACA',0,0,1,86),(852,'PUCARA',0,0,1,86),(853,'SALLIQUE',0,0,1,86),(854,'SAN FELIPE',0,0,1,86),(855,'SAN JOSE DEL ALTO',0,0,1,86),(856,'SANTA ROSA',0,0,1,86),(857,'SAN IGNACIO',0,0,1,87),(858,'CHIRINOS',0,0,1,87),(859,'HUARANGO',0,0,1,87),(860,'LA COIPA',0,0,1,87),(861,'NAMBALLE',0,0,1,87),(862,'SAN JOSE DE LOURDES',0,0,1,87),(863,'TABACONAS',0,0,1,87),(864,'PEDRO GALVEZ',0,0,1,88),(865,'CHANCAY',0,0,1,88),(866,'EDUARDO VILLANUEVA',0,0,1,88),(867,'GREGORIO PITA',0,0,1,88),(868,'ICHOCAN',0,0,1,88),(869,'JOSE MANUEL QUIROZ',0,0,1,88),(870,'JOSE SABOGAL',0,0,1,88),(871,'SAN MIGUEL',0,0,1,89),(872,'BOLIVAR',0,0,1,89),(873,'CALQUIS',0,0,1,89),(874,'CATILLUC',0,0,1,89),(875,'EL PRADO',0,0,1,89),(876,'LA FLORIDA',0,0,1,89),(877,'LLAPA',0,0,1,89),(878,'NANCHOC',0,0,1,89),(879,'NIEPOS',0,0,1,89),(880,'SAN GREGORIO',0,0,1,89),(881,'SAN SILVESTRE DE COCHAN',0,0,1,89),(882,'TONGOD',0,0,1,89),(883,'UNION AGUA BLANCA',0,0,1,89),(884,'SAN PABLO',0,0,1,90),(885,'SAN BERNARDINO',0,0,1,90),(886,'SAN LUIS',0,0,1,90),(887,'TUMBADEN',0,0,1,90),(888,'SANTA CRUZ',0,0,1,91),(889,'ANDABAMBA',0,0,1,91),(890,'CATACHE',0,0,1,91),(891,'CHANCAYBAÃ‘OS',0,0,1,91),(892,'LA ESPERANZA',0,0,1,91),(893,'NINABAMBA',0,0,1,91),(894,'PULAN',0,0,1,91),(895,'SAUCEPAMPA',0,0,1,91),(896,'SEXI',0,0,1,91),(897,'UTICYACU',0,0,1,91),(898,'YAUYUCAN',0,0,1,91),(899,'CUSCO',0,0,1,92),(900,'CCORCA',0,0,1,92),(901,'POROY',0,0,1,92),(902,'SAN JERONIMO',0,0,1,92),(903,'SAN SEBASTIAN',0,0,1,92),(904,'SANTIAGO',0,0,1,92),(905,'SAYLLA',0,0,1,92),(906,'WANCHAQ',0,0,1,92),(907,'ACOMAYO',0,0,1,93),(908,'ACOPIA',0,0,1,93),(909,'ACOS',0,0,1,93),(910,'MOSOC LLACTA',0,0,1,93),(911,'POMACANCHI',0,0,1,93),(912,'RONDOCAN',0,0,1,93),(913,'SANGARARA',0,0,1,93),(914,'ANTA',0,0,1,94),(915,'ANCAHUASI',0,0,1,94),(916,'CACHIMAYO',0,0,1,94),(917,'CHINCHAYPUJIO',0,0,1,94),(918,'HUAROCONDO',0,0,1,94),(919,'LIMATAMBO',0,0,1,94),(920,'MOLLEPATA',0,0,1,94),(921,'PUCYURA',0,0,1,94),(922,'ZURITE',0,0,1,94),(923,'CALCA',0,0,1,95),(924,'COYA',0,0,1,95),(925,'LAMAY',0,0,1,95),(926,'LARES',0,0,1,95),(927,'PISAC',0,0,1,95),(928,'SAN SALVADOR',0,0,1,95),(929,'TARAY',0,0,1,95),(930,'YANATILE',0,0,1,95),(931,'YANAOCA',0,0,1,96),(932,'CHECCA',0,0,1,96),(933,'KUNTURKANKI',0,0,1,96),(934,'LANGUI',0,0,1,96),(935,'LAYO',0,0,1,96),(936,'PAMPAMARCA',0,0,1,96),(937,'QUEHUE',0,0,1,96),(938,'TUPAC AMARU',0,0,1,96),(939,'SICUANI',0,0,1,97),(940,'CHECACUPE',0,0,1,97),(941,'COMBAPATA',0,0,1,97),(942,'MARANGANI',0,0,1,97),(943,'PITUMARCA',0,0,1,97),(944,'SAN PABLO',0,0,1,97),(945,'SAN PEDRO',0,0,1,97),(946,'TINTA',0,0,1,97),(947,'SANTO TOMAS',0,0,1,98),(948,'CAPACMARCA',0,0,1,98),(949,'CHAMACA',0,0,1,98),(950,'COLQUEMARCA',0,0,1,98),(951,'LIVITACA',0,0,1,98),(952,'LLUSCO',0,0,1,98),(953,'QUIÃ‘OTA',0,0,1,98),(954,'VELILLE',0,0,1,98),(955,'ESPINAR',0,0,1,99),(956,'CONDOROMA',0,0,1,99),(957,'COPORAQUE',0,0,1,99),(958,'OCORURO',0,0,1,99),(959,'PALLPATA',0,0,1,99),(960,'PICHIGUA',0,0,1,99),(961,'SUYCKUTAMBO 3/',0,0,1,99),(962,'ALTO PICHIGUA',0,0,1,99),(963,'SANTA ANA',0,0,1,100),(964,'ECHARATE',0,0,1,100),(965,'HUAYOPATA /1',0,0,1,100),(966,'MARANURA',0,0,1,100),(967,'OCOBAMBA  /2',0,0,1,100),(968,'QUELLOUNO',0,0,1,100),(969,'KIMBIRI',0,0,1,100),(970,'SANTA TERESA',0,0,1,100),(971,'VILCABAMBA',0,0,1,100),(972,'PICHARI',0,0,1,100),(973,'PARURO',0,0,1,101),(974,'ACCHA',0,0,1,101),(975,'CCAPI',0,0,1,101),(976,'COLCHA',0,0,1,101),(977,'HUANOQUITE',0,0,1,101),(978,'OMACHA',0,0,1,101),(979,'PACCARITAMBO',0,0,1,101),(980,'PILLPINTO',0,0,1,101),(981,'YAURISQUE',0,0,1,101),(982,'PAUCARTAMBO',0,0,1,102),(983,'CAICAY',0,0,1,102),(984,'CHALLABAMBA',0,0,1,102),(985,'COLQUEPATA',0,0,1,102),(986,'HUANCARANI',0,0,1,102),(987,'KOSÃ‘IPATA',0,0,1,102),(988,'URCOS',0,0,1,103),(989,'ANDAHUAYLILLAS',0,0,1,103),(990,'CAMANTI',0,0,1,103),(991,'CCARHUAYO',0,0,1,103),(992,'CCATCA',0,0,1,103),(993,'CUSIPATA',0,0,1,103),(994,'HUARO',0,0,1,103),(995,'LUCRE',0,0,1,103),(996,'MARCAPATA',0,0,1,103),(997,'OCONGATE',0,0,1,103),(998,'OROPESA',0,0,1,103),(999,'QUIQUIJANA',0,0,1,103),(1000,'URUBAMBA',0,0,1,104),(1001,'CHINCHERO',0,0,1,104),(1002,'HUAYLLABAMBA',0,0,1,104),(1003,'MACHUPICCHU',0,0,1,104),(1004,'MARAS',0,0,1,104),(1005,'OLLANTAYTAMBO',0,0,1,104),(1006,'YUCAY',0,0,1,104),(1007,'HUANCAVELICA',0,0,1,105),(1008,'ACOBAMBILLA',0,0,1,105),(1009,'ACORIA',0,0,1,105),(1010,'CONAYCA',0,0,1,105),(1011,'CUENCA',0,0,1,105),(1012,'HUACHOCOLPA',0,0,1,105),(1013,'HUAYLLAHUARA',0,0,1,105),(1014,'IZCUCHACA',0,0,1,105),(1015,'LARIA',0,0,1,105),(1016,'MANTA',0,0,1,105),(1017,'MARISCAL CACERES',0,0,1,105),(1018,'MOYA',0,0,1,105),(1019,'NUEVO OCCORO',0,0,1,105),(1020,'PALCA',0,0,1,105),(1021,'PILCHACA',0,0,1,105),(1022,'VILCA',0,0,1,105),(1023,'YAULI',0,0,1,105),(1024,'ASCENSION',0,0,1,105),(1025,'HUANDO',0,0,1,105),(1026,'ACOBAMBA',0,0,1,106),(1027,'ANDABAMBA',0,0,1,106),(1028,'ANTA',0,0,1,106),(1029,'CAJA',0,0,1,106),(1030,'MARCAS',0,0,1,106),(1031,'PAUCARA',0,0,1,106),(1032,'POMACOCHA',0,0,1,106),(1033,'ROSARIO',0,0,1,106),(1034,'LIRCAY',0,0,1,107),(1035,'ANCHONGA',0,0,1,107),(1036,'CALLANMARCA',0,0,1,107),(1037,'CCOCHACCASA',0,0,1,107),(1038,'CHINCHO',0,0,1,107),(1039,'CONGALLA',0,0,1,107),(1040,'HUANCA-HUANCA',0,0,1,107),(1041,'HUAYLLAY GRANDE',0,0,1,107),(1042,'JULCAMARCA',0,0,1,107),(1043,'SAN ANTONIO DE ANTAPARCO',0,0,1,107),(1044,'SANTO TOMAS DE PATA',0,0,1,107),(1045,'SECCLLA',0,0,1,107),(1046,'CASTROVIRREYNA',0,0,1,108),(1047,'ARMA',0,0,1,108),(1048,'AURAHUA',0,0,1,108),(1049,'CAPILLAS',0,0,1,108),(1050,'CHUPAMARCA',0,0,1,108),(1051,'COCAS',0,0,1,108),(1052,'HUACHOS',0,0,1,108),(1053,'HUAMATAMBO',0,0,1,108),(1054,'MOLLEPAMPA',0,0,1,108),(1055,'SAN JUAN',0,0,1,108),(1056,'SANTA ANA',0,0,1,108),(1057,'TANTARA',0,0,1,108),(1058,'TICRAPO',0,0,1,108),(1059,'CHURCAMPA',0,0,1,109),(1060,'ANCO',0,0,1,109),(1061,'CHINCHIHUASI',0,0,1,109),(1062,'EL CARMEN',0,0,1,109),(1063,'LA MERCED',0,0,1,109),(1064,'LOCROJA',0,0,1,109),(1065,'PAUCARBAMBA',0,0,1,109),(1066,'SAN MIGUEL DE MAYOCC',0,0,1,109),(1067,'SAN PEDRO DE CORIS',0,0,1,109),(1068,'PACHAMARCA ',0,0,1,109),(1069,'HUAYTARA',0,0,1,110),(1070,'AYAVI',0,0,1,110),(1071,'CORDOVA',0,0,1,110),(1072,'HUAYACUNDO ARMA',0,0,1,110),(1073,'LARAMARCA',0,0,1,110),(1074,'OCOYO',0,0,1,110),(1075,'PILPICHACA',0,0,1,110),(1076,'QUERCO',0,0,1,110),(1077,'QUITO-ARMA',0,0,1,110),(1078,'SAN ANTONIO DE CUSICANCHA',0,0,1,110),(1079,'SAN FRANCISCO DE SANGAYAICO',0,0,1,110),(1080,'SAN ISIDRO',0,0,1,110),(1081,'SANTIAGO DE CHOCORVOS',0,0,1,110),(1082,'SANTIAGO DE QUIRAHUARA',0,0,1,110),(1083,'SANTO DOMINGO DE CAPILLAS',0,0,1,110),(1084,'TAMBO',0,0,1,110),(1085,'PAMPAS',0,0,1,111),(1086,'ACOSTAMBO',0,0,1,111),(1087,'ACRAQUIA',0,0,1,111),(1088,'AHUAYCHA',0,0,1,111),(1089,'COLCABAMBA',0,0,1,111),(1090,'DANIEL HERNANDEZ',0,0,1,111),(1091,'HUACHOCOLPA',0,0,1,111),(1092,'HUARIBAMBA',0,0,1,111),(1093,'Ã‘AHUIMPUQUIO',0,0,1,111),(1094,'PAZOS',0,0,1,111),(1095,'QUISHUAR',0,0,1,111),(1096,'SALCABAMBA',0,0,1,111),(1097,'SALCAHUASI',0,0,1,111),(1098,'SAN MARCOS DE ROCCHAC',0,0,1,111),(1099,'SURCUBAMBA',0,0,1,111),(1100,'TINTAY PUNCU',0,0,1,111),(1101,'HUANUCO',0,0,1,112),(1102,'AMARILIS',0,0,1,112),(1103,'CHINCHAO',0,0,1,112),(1104,'CHURUBAMBA',0,0,1,112),(1105,'MARGOS',0,0,1,112),(1106,'QUISQUI',0,0,1,112),(1107,'SAN FRANCISCO DE CAYRAN',0,0,1,112),(1108,'SAN PEDRO DE CHAULAN',0,0,1,112),(1109,'SANTA MARIA DEL VALLE',0,0,1,112),(1110,'YARUMAYO',0,0,1,112),(1111,'PILLCO MARCA',0,0,1,112),(1112,'AMBO',0,0,1,113),(1113,'CAYNA',0,0,1,113),(1114,'COLPAS',0,0,1,113),(1115,'CONCHAMARCA',0,0,1,113),(1116,'HUACAR',0,0,1,113),(1117,'SAN FRANCISCO',0,0,1,113),(1118,'SAN RAFAEL',0,0,1,113),(1119,'TOMAY KICHWA',0,0,1,113),(1120,'LA UNION',0,0,1,114),(1121,'CHUQUIS',0,0,1,114),(1122,'MARIAS',0,0,1,114),(1123,'PACHAS',0,0,1,114),(1124,'QUIVILLA',0,0,1,114),(1125,'RIPAN',0,0,1,114),(1126,'SHUNQUI',0,0,1,114),(1127,'SILLAPATA',0,0,1,114),(1128,'YANAS',0,0,1,114),(1129,'HUACAYBAMBA',0,0,1,115),(1130,'CANCHABAMBA',0,0,1,115),(1131,'COCHABAMBA',0,0,1,115),(1132,'PINRA',0,0,1,115),(1133,'LLATA',0,0,1,116),(1134,'ARANCAY',0,0,1,116),(1135,'CHAVIN DE PARIARCA',0,0,1,116),(1136,'JACAS GRANDE',0,0,1,116),(1137,'JIRCAN',0,0,1,116),(1138,'MIRAFLORES',0,0,1,116),(1139,'MONZON',0,0,1,116),(1140,'PUNCHAO',0,0,1,116),(1141,'PUÃ‘OS',0,0,1,116),(1142,'SINGA',0,0,1,116),(1143,'TANTAMAYO',0,0,1,116),(1144,'RUPA-RUPA',0,0,1,117),(1145,'DANIEL ALOMIA ROBLES',0,0,1,117),(1146,'HERMILIO VALDIZAN',0,0,1,117),(1147,'JOSE CRESPO Y CASTILLO',0,0,1,117),(1148,'LUYANDO 1/',0,0,1,117),(1149,'MARIANO DAMASO BERAUN',0,0,1,117),(1150,'HUACRACHUCO',0,0,1,118),(1151,'CHOLON',0,0,1,118),(1152,'SAN BUENAVENTURA',0,0,1,118),(1153,'PANAO',0,0,1,119),(1154,'CHAGLLA',0,0,1,119),(1155,'MOLINO',0,0,1,119),(1156,'UMARI  ',0,0,1,119),(1157,'PUERTO INCA',0,0,1,120),(1158,'CODO DEL POZUZO',0,0,1,120),(1159,'HONORIA',0,0,1,120),(1160,'TOURNAVISTA',0,0,1,120),(1161,'YUYAPICHIS',0,0,1,120),(1162,'JESUS',0,0,1,121),(1163,'BAÃ‘OS',0,0,1,121),(1164,'JIVIA',0,0,1,121),(1165,'QUEROPALCA',0,0,1,121),(1166,'RONDOS',0,0,1,121),(1167,'SAN FRANCISCO DE ASIS',0,0,1,121),(1168,'SAN MIGUEL DE CAURI',0,0,1,121),(1169,'CHAVINILLO',0,0,1,121),(1170,'CAHUAC',0,0,1,121),(1171,'CHACABAMBA',0,0,1,121),(1172,'APARICIO POMARES',0,0,1,121),(1173,'JACAS CHICO',0,0,1,121),(1174,'OBAS',0,0,1,121),(1175,'PAMPAMARCA',0,0,1,121),(1176,'CHORAS',0,0,1,121),(1177,'CHINCHA ALTA',0,0,1,122),(1178,'ALTO LARAN',0,0,1,122),(1179,'CHAVIN',0,0,1,122),(1180,'CHINCHA BAJA',0,0,1,122),(1181,'EL CARMEN',0,0,1,122),(1182,'GROCIO PRADO',0,0,1,122),(1183,'PUEBLO NUEVO',0,0,1,122),(1184,'SAN JUAN DE YANAC',0,0,1,122),(1185,'SAN PEDRO DE HUACARPANA',0,0,1,122),(1186,'SUNAMPE',0,0,1,122),(1187,'TAMBO DE MORA',0,0,1,122),(1188,'ICA',0,0,1,123),(1189,'LA TINGUIÃ‘A',0,0,1,123),(1190,'LOS AQUIJES',0,0,1,123),(1191,'OCUCAJE',0,0,1,123),(1192,'PACHACUTEC',0,0,1,123),(1193,'PARCONA',0,0,1,123),(1194,'PUEBLO NUEVO',0,0,1,123),(1195,'SALAS',0,0,1,123),(1196,'SAN JOSE DE LOS MOLINOS',0,0,1,123),(1197,'SAN JUAN BAUTISTA',0,0,1,123),(1198,'SANTIAGO',0,0,1,123),(1199,'SUBTANJALLA',0,0,1,123),(1200,'TATE',0,0,1,123),(1201,'YAUCA DEL ROSARIO ',0,0,1,123),(1202,'CHINCHA ALTA',0,0,1,124),(1203,'ALTO LARAN',0,0,1,124),(1204,'CHAVIN',0,0,1,124),(1205,'CHINCHA BAJA',0,0,1,124),(1206,'EL CARMEN',0,0,1,124),(1207,'GROCIO PRADO',0,0,1,124),(1208,'PUEBLO NUEVO',0,0,1,124),(1209,'SAN JUAN DE YANAC',0,0,1,124),(1210,'SAN PEDRO DE HUACARPANA',0,0,1,124),(1211,'SUNAMPE',0,0,1,124),(1212,'TAMBO DE MORA',0,0,1,124),(1213,'NAZCA',0,0,1,125),(1214,'CHANGUILLO',0,0,1,125),(1215,'EL INGENIO',0,0,1,125),(1216,'MARCONA',0,0,1,125),(1217,'VISTA ALEGRE',0,0,1,125),(1218,'PALPA',0,0,1,126),(1219,'LLIPATA',0,0,1,126),(1220,'RIO GRANDE',0,0,1,126),(1221,'SANTA CRUZ',0,0,1,126),(1222,'TIBILLO',0,0,1,126),(1223,'PISCO',0,0,1,127),(1224,'HUANCANO',0,0,1,127),(1225,'HUMAY',0,0,1,127),(1226,'INDEPENDENCIA',0,0,1,127),(1227,'PARACAS',0,0,1,127),(1228,'SAN ANDRES',0,0,1,127),(1229,'SAN CLEMENTE',0,0,1,127),(1230,'TUPAC AMARU INCA',0,0,1,127),(1231,'HUANCAYO',0,0,1,128),(1232,'CARHUACALLANGA',0,0,1,128),(1233,'CHACAPAMPA',0,0,1,128),(1234,'CHICCHE',0,0,1,128),(1235,'CHILCA',0,0,1,128),(1236,'CHONGOS ALTO',0,0,1,128),(1237,'CHUPURO',0,0,1,128),(1238,'COLCA',0,0,1,128),(1239,'CULLHUAS',0,0,1,128),(1240,'EL TAMBO',0,0,1,128),(1241,'HUACRAPUQUIO',0,0,1,128),(1242,'HUALHUAS',0,0,1,128),(1243,'HUANCAN',0,0,1,128),(1244,'HUASICANCHA',0,0,1,128),(1245,'HUAYUCACHI',0,0,1,128),(1246,'INGENIO',0,0,1,128),(1247,'PARIAHUANCA   1/',0,0,1,128),(1248,'PILCOMAYO',0,0,1,128),(1249,'PUCARA',0,0,1,128),(1250,'QUICHUAY',0,0,1,128),(1251,'QUILCAS',0,0,1,128),(1252,'SAN AGUSTIN',0,0,1,128),(1253,'SAN JERONIMO DE TUNAN',0,0,1,128),(1254,'SAÃ‘O',0,0,1,128),(1255,'SAPALLANGA',0,0,1,128),(1256,'SICAYA',0,0,1,128),(1257,'SANTO DOMINGO DE ACOBAMBA',0,0,1,128),(1258,'VIQUES',0,0,1,128),(1259,'CONCEPCION',0,0,1,129),(1260,'ACO',0,0,1,129),(1261,'ANDAMARCA',0,0,1,129),(1262,'CHAMBARA',0,0,1,129),(1263,'COCHAS',0,0,1,129),(1264,'COMAS',0,0,1,129),(1265,'HEROINAS TOLEDO',0,0,1,129),(1266,'MANZANARES',0,0,1,129),(1267,'MARISCAL CASTILLA',0,0,1,129),(1268,'MATAHUASI',0,0,1,129),(1269,'MITO',0,0,1,129),(1270,'NUEVE DE JULIO',0,0,1,129),(1271,'ORCOTUNA',0,0,1,129),(1272,'SAN JOSE DE QUERO',0,0,1,129),(1273,'SANTA ROSA DE OCOPA',0,0,1,129),(1274,'CHANCHAMAYO',0,0,1,130),(1275,'PERENE',0,0,1,130),(1276,'PICHANAQUI',0,0,1,130),(1277,'SAN LUIS DE SHUARO',0,0,1,130),(1278,'SAN RAMON',0,0,1,130),(1279,'VITOC',0,0,1,130),(1280,'JAUJA',0,0,1,131),(1281,'ACOLLA',0,0,1,131),(1282,'APATA',0,0,1,131),(1283,'ATAURA',0,0,1,131),(1284,'CANCHAYLLO',0,0,1,131),(1285,'CURICACA',0,0,1,131),(1286,'EL MANTARO',0,0,1,131),(1287,'HUAMALI',0,0,1,131),(1288,'HUARIPAMPA',0,0,1,131),(1289,'HUERTAS',0,0,1,131),(1290,'JANJAILLO',0,0,1,131),(1291,'JULCAN',0,0,1,131),(1292,'LEONOR ORDOÃ‘EZ',0,0,1,131),(1293,'LLOCLLAPAMPA',0,0,1,131),(1294,'MARCO',0,0,1,131),(1295,'MASMA',0,0,1,131),(1296,'MASMA CHICCHE',0,0,1,131),(1297,'MOLINOS',0,0,1,131),(1298,'MONOBAMBA',0,0,1,131),(1299,'MUQUI',0,0,1,131),(1300,'MUQUIYAUYO',0,0,1,131),(1301,'PACA',0,0,1,131),(1302,'PACCHA',0,0,1,131),(1303,'PANCAN',0,0,1,131),(1304,'PARCO',0,0,1,131),(1305,'POMACANCHA',0,0,1,131),(1306,'RICRAN',0,0,1,131),(1307,'SAN LORENZO',0,0,1,131),(1308,'SAN PEDRO DE CHUNAN',0,0,1,131),(1309,'SAUSA',0,0,1,131),(1310,'SINCOS',0,0,1,131),(1311,'TUNAN MARCA',0,0,1,131),(1312,'YAULI',0,0,1,131),(1313,'YAUYOS',0,0,1,131),(1314,'JUNIN',0,0,1,132),(1315,'CARHUAMAYO',0,0,1,132),(1316,'ONDORES',0,0,1,132),(1317,'ULCUMAYO',0,0,1,132),(1318,'SATIPO',0,0,1,133),(1319,'COVIRIALI',0,0,1,133),(1320,'LLAYLLA',0,0,1,133),(1321,'MAZAMARI',0,0,1,133),(1322,'PAMPA HERMOSA',0,0,1,133),(1323,'PANGOA',0,0,1,133),(1324,'RIO NEGRO',0,0,1,133),(1325,'RIO TAMBO',0,0,1,133),(1326,'TARMA',0,0,1,134),(1327,'ACOBAMBA',0,0,1,134),(1328,'HUARICOLCA',0,0,1,134),(1329,'HUASAHUASI',0,0,1,134),(1330,'LA UNION',0,0,1,134),(1331,'PALCA',0,0,1,134),(1332,'PALCAMAYO',0,0,1,134),(1333,'SAN PEDRO DE CAJAS',0,0,1,134),(1334,'TAPO',0,0,1,134),(1335,'LA OROYA',0,0,1,135),(1336,'CHACAPALPA',0,0,1,135),(1337,'HUAY-HUAY',0,0,1,135),(1338,'MARCAPOMACOCHA',0,0,1,135),(1339,'MOROCOCHA',0,0,1,135),(1340,'PACCHA',0,0,1,135),(1341,'SANTA BARBARA DE CARHUACAYAN',0,0,1,135),(1342,'SANTA ROSA DE SACCO',0,0,1,135),(1343,'SUITUCANCHA',0,0,1,135),(1344,'YAULI',0,0,1,135),(1345,'CHUPACA',0,0,1,136),(1346,'AHUAC',0,0,1,136),(1347,'CHONGOS BAJO',0,0,1,136),(1348,'HUACHAC',0,0,1,136),(1349,'HUAMANCACA CHICO',0,0,1,136),(1350,'SAN JUAN DE ISCOS',0,0,1,136),(1351,'SAN JUAN DE JARPA',0,0,1,136),(1352,'TRES DE DICIEMBRE',0,0,1,136),(1353,'YANACANCHA',0,0,1,136),(1354,'TRUJILLO',0,0,1,137),(1355,'EL PORVENIR',0,0,1,137),(1356,'FLORENCIA DE MORA',0,0,1,137),(1357,'HUANCHACO',0,0,1,137),(1358,'LA ESPERANZA',0,0,1,137),(1359,'LAREDO',0,0,1,137),(1360,'MOCHE',0,0,1,137),(1361,'POROTO',0,0,1,137),(1362,'SALAVERRY',0,0,1,137),(1363,'SIMBAL',0,0,1,137),(1364,'VICTOR LARCO HERRERA',0,0,1,137),(1365,'ASCOPE',0,0,1,138),(1366,'CHICAMA',0,0,1,138),(1367,'CHOCOPE',0,0,1,138),(1368,'MAGDALENA DE CAO',0,0,1,138),(1369,'PAIJAN',0,0,1,138),(1370,'RAZURI',0,0,1,138),(1371,'SANTIAGO DE CAO',0,0,1,138),(1372,'CASA GRANDE',0,0,1,138),(1373,'BOLIVAR',0,0,1,139),(1374,'BAMBAMARCA',0,0,1,139),(1375,'CONDORMARCA /1',0,0,1,139),(1376,'LONGOTEA',0,0,1,139),(1377,'UCHUMARCA',0,0,1,139),(1378,'UCUNCHA',0,0,1,139),(1379,'CHEPEN',0,0,1,140),(1380,'PACANGA',0,0,1,140),(1381,'PUEBLO NUEVO',0,0,1,140),(1382,'JULCAN',0,0,1,141),(1383,'CALAMARCA',0,0,1,141),(1384,'CARABAMBA',0,0,1,141),(1385,'HUASO',0,0,1,141),(1386,'OTUZCO',0,0,1,142),(1387,'AGALLPAMPA',0,0,1,142),(1388,'CHARAT',0,0,1,142),(1389,'HUARANCHAL',0,0,1,142),(1390,'LA CUESTA',0,0,1,142),(1391,'MACHE',0,0,1,142),(1392,'PARANDAY',0,0,1,142),(1393,'SALPO',0,0,1,142),(1394,'SINSICAP',0,0,1,142),(1395,'USQUIL',0,0,1,142),(1396,'SAN PEDRO DE LLOC',0,0,1,143),(1397,'GUADALUPE',0,0,1,143),(1398,'JEQUETEPEQUE',0,0,1,143),(1399,'PACASMAYO',0,0,1,143),(1400,'SAN JOSE',0,0,1,143),(1401,'TAYABAMBA',0,0,1,144),(1402,'BULDIBUYO',0,0,1,144),(1403,'CHILLIA',0,0,1,144),(1404,'HUANCASPATA',0,0,1,144),(1405,'HUAYLILLAS',0,0,1,144),(1406,'HUAYO',0,0,1,144),(1407,'ONGON',0,0,1,144),(1408,'PARCOY',0,0,1,144),(1409,'PATAZ',0,0,1,144),(1410,'PIAS',0,0,1,144),(1411,'SANTIAGO DE CHALLAS',0,0,1,144),(1412,'TAURIJA',0,0,1,144),(1413,'URPAY',0,0,1,144),(1414,'HUAMACHUCO',0,0,1,145),(1415,'CHUGAY',0,0,1,145),(1416,'COCHORCO',0,0,1,145),(1417,'CURGOS',0,0,1,145),(1418,'MARCABAL',0,0,1,145),(1419,'SANAGORAN',0,0,1,145),(1420,'SARIN',0,0,1,145),(1421,'SARTIMBAMBA',0,0,1,145),(1422,'SANTIAGO DE CHUCO',0,0,1,146),(1423,'ANGASMARCA',0,0,1,146),(1424,'CACHICADAN',0,0,1,146),(1425,'MOLLEBAMBA',0,0,1,146),(1426,'MOLLEPATA',0,0,1,146),(1427,'QUIRUVILCA',0,0,1,146),(1428,'SANTA CRUZ DE CHUCA',0,0,1,146),(1429,'SITABAMBA',0,0,1,146),(1430,'CASCAS',0,0,1,147),(1431,'LUCMA',0,0,1,147),(1432,'COMPIN',0,0,1,147),(1433,'SAYAPULLO',0,0,1,147),(1434,'VIRU',0,0,1,148),(1435,'CHICLAYO',0,0,1,149),(1436,'CHONGOYAPE',0,0,1,149),(1437,'ETEN',0,0,1,149),(1438,'ETEN PUERTO',0,0,1,149),(1439,'JOSE LEONARDO ORTIZ',0,0,1,149),(1440,'LA VICTORIA',0,0,1,149),(1441,'LAGUNAS   ',0,0,1,149),(1442,'MONSEFU',0,0,1,149),(1443,'NUEVA ARICA',0,0,1,149),(1444,'OYOTUN',0,0,1,149),(1445,'PICSI',0,0,1,149),(1446,'PIMENTEL',0,0,1,149),(1447,'REQUE',0,0,1,149),(1448,'SANTA ROSA',0,0,1,149),(1449,'SAÃ‘A',0,0,1,149),(1450,'CAYALTI',0,0,1,149),(1451,'PATAPO',0,0,1,149),(1452,'POMALCA',0,0,1,149),(1453,'PUCALA',0,0,1,149),(1454,'TUMAN',0,0,1,149),(1455,'FERREÃ‘AFE',0,0,1,150),(1456,'CAÃ‘ARIS',0,0,1,150),(1457,'INCAHUASI',0,0,1,150),(1458,'MANUEL ANTONIO MESONES MURO',0,0,1,150),(1459,'PITIPO',0,0,1,150),(1460,'PUEBLO NUEVO',0,0,1,150),(1461,'LAMBAYEQUE',0,0,1,151),(1462,'CHOCHOPE',0,0,1,151),(1463,'ILLIMO',0,0,1,151),(1464,'JAYANCA',0,0,1,151),(1465,'MOCHUMI',0,0,1,151),(1466,'MORROPE',0,0,1,151),(1467,'MOTUPE',0,0,1,151),(1468,'OLMOS',0,0,1,151),(1469,'PACORA',0,0,1,151),(1470,'SALAS',0,0,1,151),(1471,'SAN JOSE',0,0,1,151),(1472,'TUCUME',0,0,1,151),(1473,'LIMA',0,0,1,152),(1474,'ANCON',0,0,1,152),(1475,'ATE',0,0,1,152),(1476,'BARRANCO',0,0,1,152),(1477,'BREÃ‘A',0,0,1,152),(1478,'CARABAYLLO',0,0,1,152),(1479,'CHACLACAYO',0,0,1,152),(1480,'CHORRILLOS',0,0,1,152),(1481,'CIENEGUILLA',0,0,1,152),(1482,'COMAS',0,0,1,152),(1483,'EL AGUSTINO',0,0,1,152),(1484,'INDEPENDENCIA',0,0,1,152),(1485,'JESUS MARIA',0,0,1,152),(1486,'LA MOLINA',0,0,1,152),(1487,'LA VICTORIA',0,0,1,152),(1488,'LINCE',0,0,1,152),(1489,'LOS OLIVOS',0,0,1,152),(1490,'LURIGANCHO',0,0,1,152),(1491,'LURIN',0,0,1,152),(1492,'MAGDALENA DEL MAR',0,0,1,152),(1493,'PUEBLO LIBRE',0,0,1,152),(1494,'MIRAFLORES',0,0,1,152),(1495,'PACHACAMAC',0,0,1,152),(1496,'PUCUSANA',0,0,1,152),(1497,'PUENTE PIEDRA',0,0,1,152),(1498,'PUNTA HERMOSA',0,0,1,152),(1499,'PUNTA NEGRA',0,0,1,152),(1500,'RIMAC',0,0,1,152),(1501,'SAN BARTOLO',0,0,1,152),(1502,'SAN BORJA',0,0,1,152),(1503,'SAN ISIDRO',0,0,1,152),(1504,'SAN JUAN DE LURIGANCHO',0,0,1,152),(1505,'SAN JUAN DE MIRAFLORES',0,0,1,152),(1506,'SAN LUIS',0,0,1,152),(1507,'SAN MARTIN DE PORRES',0,0,1,152),(1508,'SAN MIGUEL',0,0,1,152),(1509,'SANTA ANITA',0,0,1,152),(1510,'SANTA MARIA DEL MAR',0,0,1,152),(1511,'SANTA ROSA',0,0,1,152),(1512,'SANTIAGO DE SURCO',0,0,1,152),(1513,'SURQUILLO',0,0,1,152),(1514,'VILLA EL SALVADOR',0,0,1,152),(1515,'VILLA MARIA DEL TRIUNFO',0,0,1,152),(1516,'BARRANCA',0,0,1,153),(1517,'PARAMONGA',0,0,1,153),(1518,'PATIVILCA',0,0,1,153),(1519,'SUPE',0,0,1,153),(1520,'SUPE PUERTO',0,0,1,153),(1521,'CAJATAMBO',0,0,1,154),(1522,'COPA',0,0,1,154),(1523,'GORGOR',0,0,1,154),(1524,'HUANCAPON',0,0,1,154),(1525,'MANAS',0,0,1,154),(1526,'CANTA',0,0,1,155),(1527,'ARAHUAY',0,0,1,155),(1528,'HUAMANTANGA',0,0,1,155),(1529,'HUAROS',0,0,1,155),(1530,'LACHAQUI',0,0,1,155),(1531,'SAN BUENAVENTURA',0,0,1,155),(1532,'SANTA ROSA DE QUIVES',0,0,1,155),(1533,'SAN VICENTE DE CAÃ‘ETE',0,0,1,156),(1534,'ASIA',0,0,1,156),(1535,'CALANGO',0,0,1,156),(1536,'CERRO AZUL',0,0,1,156),(1537,'CHILCA',0,0,1,156),(1538,'COAYLLO',0,0,1,156),(1539,'IMPERIAL',0,0,1,156),(1540,'LUNAHUANA',0,0,1,156),(1541,'MALA',0,0,1,156),(1542,'NUEVO IMPERIAL',0,0,1,156),(1543,'PACARAN',0,0,1,156),(1544,'QUILMANA',0,0,1,156),(1545,'SAN ANTONIO',0,0,1,156),(1546,'SAN LUIS',0,0,1,156),(1547,'SANTA CRUZ DE FLORES',0,0,1,156),(1548,'ZUÃ‘IGA',0,0,1,156),(1549,'HUARAL',0,0,1,157),(1550,'ATAVILLOS ALTO',0,0,1,157),(1551,'ATAVILLOS BAJO',0,0,1,157),(1552,'AUCALLAMA',0,0,1,157),(1553,'CHANCAY',0,0,1,157),(1554,'IHUARI',0,0,1,157),(1555,'LAMPIAN',0,0,1,157),(1556,'PACARAOS',0,0,1,157),(1557,'SAN MIGUEL DE ACOS',0,0,1,157),(1558,'SANTA CRUZ DE ANDAMARCA',0,0,1,157),(1559,'SUMBILCA',0,0,1,157),(1560,'VEINTISIETE DE NOVIEMBRE',0,0,1,157),(1561,'MATUCANA',0,0,1,158),(1562,'ANTIOQUIA',0,0,1,158),(1563,'CALLAHUANCA',0,0,1,158),(1564,'CARAMPOMA',0,0,1,158),(1565,'CHICLA',0,0,1,158),(1566,'CUENCA',0,0,1,158),(1567,'HUACHUPAMPA',0,0,1,158),(1568,'HUANZA',0,0,1,158),(1569,'HUAROCHIRI',0,0,1,158),(1570,'LAHUAYTAMBO',0,0,1,158),(1571,'LANGA',0,0,1,158),(1572,'LARAOS',0,0,1,158),(1573,'MARIATANA',0,0,1,158),(1574,'RICARDO PALMA',0,0,1,158),(1575,'SAN ANDRES DE TUPICOCHA',0,0,1,158),(1576,'SAN ANTONIO',0,0,1,158),(1577,'SAN BARTOLOME',0,0,1,158),(1578,'SAN DAMIAN',0,0,1,158),(1579,'SAN JUAN DE IRIS',0,0,1,158),(1580,'SAN JUAN DE TANTARANCHE',0,0,1,158),(1581,'SAN LORENZO DE QUINTI',0,0,1,158),(1582,'SAN MATEO',0,0,1,158),(1583,'SAN MATEO DE OTAO',0,0,1,158),(1584,'SAN PEDRO DE CASTA',0,0,1,158),(1585,'SAN PEDRO DE HUANCAYRE',0,0,1,158),(1586,'SANGALLAYA',0,0,1,158),(1587,'SANTA CRUZ DE COCACHACRA',0,0,1,158),(1588,'SANTA EULALIA',0,0,1,158),(1589,'SANTIAGO DE ANCHUCAYA',0,0,1,158),(1590,'SANTIAGO DE TUNA',0,0,1,158),(1591,'SANTO DOMINGO DE LOS OLLEROS',0,0,1,158),(1592,'SURCO',0,0,1,158),(1593,'HUACHO',0,0,1,159),(1594,'AMBAR',0,0,1,159),(1595,'CALETA DE CARQUIN',0,0,1,159),(1596,'CHECRAS',0,0,1,159),(1597,'HUALMAY',0,0,1,159),(1598,'HUAURA',0,0,1,159),(1599,'LEONCIO PRADO',0,0,1,159),(1600,'PACCHO',0,0,1,159),(1601,'SANTA LEONOR',0,0,1,159),(1602,'SANTA MARIA',0,0,1,159),(1603,'SAYAN',0,0,1,159),(1604,'VEGUETA',0,0,1,159),(1605,'OYON',0,0,1,160),(1606,'ANDAJES',0,0,1,160),(1607,'CAUJUL',0,0,1,160),(1608,'COCHAMARCA',0,0,1,160),(1609,'NAVAN',0,0,1,160),(1610,'PACHANGARA',0,0,1,160),(1611,'YAUYOS',0,0,1,161),(1612,'ALIS',0,0,1,161),(1613,'ALLAUCA',0,0,1,161),(1614,'AYAVIRI',0,0,1,161),(1615,'AZANGARO',0,0,1,161),(1616,'CACRA',0,0,1,161),(1617,'CARANIA',0,0,1,161),(1618,'CATAHUASI',0,0,1,161),(1619,'CHOCOS',0,0,1,161),(1620,'COCHAS',0,0,1,161),(1621,'COLONIA',0,0,1,161),(1622,'HONGOS',0,0,1,161),(1623,'HUAMPARA',0,0,1,161),(1624,'HUANCAYA',0,0,1,161),(1625,'HUANGASCAR',0,0,1,161),(1626,'HUANTAN',0,0,1,161),(1627,'HUAÃ‘EC',0,0,1,161),(1628,'LARAOS',0,0,1,161),(1629,'LINCHA',0,0,1,161),(1630,'MADEAN',0,0,1,161),(1631,'MIRAFLORES',0,0,1,161),(1632,'OMAS',0,0,1,161),(1633,'PUTINZA',0,0,1,161),(1634,'QUINCHES',0,0,1,161),(1635,'QUINOCAY',0,0,1,161),(1636,'SAN JOAQUIN',0,0,1,161),(1637,'SAN PEDRO DE PILAS',0,0,1,161),(1638,'TANTA',0,0,1,161),(1639,'TAURIPAMPA',0,0,1,161),(1640,'TOMAS',0,0,1,161),(1641,'TUPE',0,0,1,161),(1642,'VIÃ‘AC',0,0,1,161),(1643,'VITIS',0,0,1,161),(1644,'IQUITOS',0,0,1,162),(1645,'ALTO NANAY',0,0,1,162),(1646,'FERNANDO LORES',0,0,1,162),(1647,'INDIANA',0,0,1,162),(1648,'LAS AMAZONAS',0,0,1,162),(1649,'MAZAN',0,0,1,162),(1650,'NAPO',0,0,1,162),(1651,'PUNCHANA',0,0,1,162),(1652,'PUTUMAYO    ',0,0,1,162),(1653,'TORRES CAUSANA',0,0,1,162),(1654,'BELEN',0,0,1,162),(1655,'SAN JUAN BAUTISTA',0,0,1,162),(1656,'TENIENTE MANUEL CLAVERO',0,0,1,162),(1657,'YURIMAGUAS',0,0,1,163),(1658,'BALSAPUERTO',0,0,1,163),(1659,'JEBEROS',0,0,1,163),(1660,'LAGUNAS',0,0,1,163),(1661,'SANTA CRUZ',0,0,1,163),(1662,'TENIENTE CESAR LOPEZ ROJAS',0,0,1,163),(1663,'NAUTA',0,0,1,164),(1664,'PARINARI ',0,0,1,164),(1665,'TIGRE',0,0,1,164),(1666,'TROMPETEROS',0,0,1,164),(1667,'URARINAS',0,0,1,164),(1668,'RAMON CASTILLA',0,0,1,165),(1669,'PEBAS',0,0,1,165),(1670,'YAVARI  /1',0,0,1,165),(1671,'SAN PABLO',0,0,1,165),(1672,'REQUENA',0,0,1,166),(1673,'ALTO TAPICHE',0,0,1,166),(1674,'CAPELO',0,0,1,166),(1675,'EMILIO SAN MARTIN',0,0,1,166),(1676,'MAQUIA',0,0,1,166),(1677,'PUINAHUA',0,0,1,166),(1678,'SAQUENA',0,0,1,166),(1679,'SOPLIN',0,0,1,166),(1680,'TAPICHE',0,0,1,166),(1681,'JENARO HERRERA',0,0,1,166),(1682,'YAQUERANA    ',0,0,1,166),(1683,'CONTAMANA',0,0,1,167),(1684,'INAHUAYA',0,0,1,167),(1685,'PADRE MARQUEZ',0,0,1,167),(1686,'PAMPA HERMOSA',0,0,1,167),(1687,'SARAYACU',0,0,1,167),(1688,'VARGAS GUERRA',0,0,1,167),(1689,'BARRANCA',0,0,1,168),(1690,'CAHUAPANAS',0,0,1,168),(1691,'MANSERICHE',0,0,1,168),(1692,'MORONA',0,0,1,168),(1693,'PASTAZA',0,0,1,168),(1694,'ANDOAS',0,0,1,168),(1695,'TAMBOPATA',0,0,1,169),(1696,'INAMBARI',0,0,1,169),(1697,'LAS PIEDRAS',0,0,1,169),(1698,'LABERINTO',0,0,1,169),(1699,'MANU',0,0,1,170),(1700,'FITZCARRALD',0,0,1,170),(1701,'MADRE DE DIOS',0,0,1,170),(1702,'HUEPETUHE',0,0,1,170),(1703,'IÃ‘APARI',0,0,1,171),(1704,'IBERIA',0,0,1,171),(1705,'TAHUAMANU',0,0,1,171),(1706,'MOQUEGUA',0,0,1,172),(1707,'CARUMAS',0,0,1,172),(1708,'CUCHUMBAYA',0,0,1,172),(1709,'SAMEGUA',0,0,1,172),(1710,'SAN CRISTOBAL',0,0,1,172),(1711,'TORATA',0,0,1,172),(1712,'OMATE',0,0,1,173),(1713,'CHOJATA',0,0,1,173),(1714,'COALAQUE',0,0,1,173),(1715,'ICHUÃ‘A',0,0,1,173),(1716,'LA CAPILLA',0,0,1,173),(1717,'LLOQUE',0,0,1,173),(1718,'MATALAQUE',0,0,1,173),(1719,'PUQUINA',0,0,1,173),(1720,'QUINISTAQUILLAS',0,0,1,173),(1721,'UBINAS',0,0,1,173),(1722,'YUNGA',0,0,1,173),(1723,'ILO',0,0,1,174),(1724,'EL ALGARROBAL',0,0,1,174),(1725,'PACOCHA',0,0,1,174),(1726,'CHAUPIMARCA',0,0,1,175),(1727,'HUACHON',0,0,1,175),(1728,'HUARIACA',0,0,1,175),(1729,'HUAYLLAY',0,0,1,175),(1730,'NINACACA',0,0,1,175),(1731,'PALLANCHACRA',0,0,1,175),(1732,'PAUCARTAMBO',0,0,1,175),(1733,'SAN FCO DE ASIS DE YARUSYACAN',0,0,1,175),(1734,'SIMON BOLIVAR',0,0,1,175),(1735,'TICLACAYAN',0,0,1,175),(1736,'TINYAHUARCO',0,0,1,175),(1737,'VICCO',0,0,1,175),(1738,'YANACANCHA',0,0,1,175),(1739,'YANAHUANCA',0,0,1,176),(1740,'CHACAYAN',0,0,1,176),(1741,'GOYLLARISQUIZGA',0,0,1,176),(1742,'PAUCAR',0,0,1,176),(1743,'SAN PEDRO DE PILLAO',0,0,1,176),(1744,'SANTA ANA DE TUSI',0,0,1,176),(1745,'TAPUC',0,0,1,176),(1746,'VILCABAMBA',0,0,1,176),(1747,'OXAPAMPA',0,0,1,177),(1748,'CHONTABAMBA',0,0,1,177),(1749,'HUANCABAMBA',0,0,1,177),(1750,'PALCAZU',0,0,1,177),(1751,'POZUZO',0,0,1,177),(1752,'PUERTO BERMUDEZ',0,0,1,177),(1753,'VILLA RICA',0,0,1,177),(1754,'PIURA',0,0,1,178),(1755,'CASTILLA',0,0,1,178),(1756,'CATACAOS',0,0,1,178),(1757,'CURA MORI',0,0,1,178),(1758,'EL TALLAN',0,0,1,178),(1759,'LA ARENA',0,0,1,178),(1760,'LA UNION',0,0,1,178),(1761,'LAS LOMAS',0,0,1,178),(1762,'TAMBO GRANDE',0,0,1,178),(1763,'AYABACA',0,0,1,179),(1764,'FRIAS',0,0,1,179),(1765,'JILILI',0,0,1,179),(1766,'LAGUNAS',0,0,1,179),(1767,'MONTERO',0,0,1,179),(1768,'PACAIPAMPA',0,0,1,179),(1769,'PAIMAS',0,0,1,179),(1770,'SAPILLICA',0,0,1,179),(1771,'SICCHEZ',0,0,1,179),(1772,'SUYO',0,0,1,179),(1773,'HUANCABAMBA',0,0,1,180),(1774,'CANCHAQUE',0,0,1,180),(1775,'EL CARMEN DE LA FRONTERA',0,0,1,180),(1776,'HUARMACA',0,0,1,180),(1777,'LALAQUIZ',0,0,1,180),(1778,'SAN MIGUEL DE EL FAIQUE',0,0,1,180),(1779,'SONDOR',0,0,1,180),(1780,'SONDORILLO',0,0,1,180),(1781,'CHULUCANAS',0,0,1,181),(1782,'BUENOS AIRES',0,0,1,181),(1783,'CHALACO',0,0,1,181),(1784,'LA MATANZA',0,0,1,181),(1785,'MORROPON',0,0,1,181),(1786,'SALITRAL',0,0,1,181),(1787,'SAN JUAN DE BIGOTE',0,0,1,181),(1788,'SANTA CATALINA DE MOSSA',0,0,1,181),(1789,'SANTO DOMINGO',0,0,1,181),(1790,'YAMANGO',0,0,1,181),(1791,'PAITA',0,0,1,182),(1792,'AMOTAPE',0,0,1,182),(1793,'ARENAL',0,0,1,182),(1794,'COLAN',0,0,1,182),(1795,'LA HUACA',0,0,1,182),(1796,'TAMARINDO',0,0,1,182),(1797,'VICHAYAL',0,0,1,182),(1798,'SULLANA',0,0,1,183),(1799,'BELLAVISTA',0,0,1,183),(1800,'IGNACIO ESCUDERO',0,0,1,183),(1801,'LANCONES',0,0,1,183),(1802,'MARCAVELICA',0,0,1,183),(1803,'MIGUEL CHECA',0,0,1,183),(1804,'QUERECOTILLO',0,0,1,183),(1805,'SALITRAL',0,0,1,183),(1806,'PARIÃ‘AS',0,0,1,184),(1807,'EL ALTO',0,0,1,184),(1808,'LA BREA',0,0,1,184),(1809,'LOBITOS',0,0,1,184),(1810,'LOS ORGANOS',0,0,1,184),(1811,'MANCORA',0,0,1,184),(1812,'SECHURA',0,0,1,185),(1813,'BELLAVISTA DE LA UNION',0,0,1,185),(1814,'BERNAL',0,0,1,185),(1815,'CRISTO NOS VALGA',0,0,1,185),(1816,'VICE',0,0,1,185),(1817,'RINCONADA LLICUAR',0,0,1,185),(1818,'PUNO',0,0,1,186),(1819,'ACORA',0,0,1,186),(1820,'AMANTANI',0,0,1,186),(1821,'ATUNCOLLA',0,0,1,186),(1822,'CAPACHICA',0,0,1,186),(1823,'CHUCUITO',0,0,1,186),(1824,'COATA',0,0,1,186),(1825,'HUATA',0,0,1,186),(1826,'MAÃ‘AZO',0,0,1,186),(1827,'PAUCARCOLLA',0,0,1,186),(1828,'PICHACANI',0,0,1,186),(1829,'PLATERIA',0,0,1,186),(1830,'SAN ANTONIO  /1',0,0,1,186),(1831,'TIQUILLACA',0,0,1,186),(1832,'VILQUE',0,0,1,186),(1833,'AZANGARO',0,0,1,187),(1834,'ACHAYA',0,0,1,187),(1835,'ARAPA',0,0,1,187),(1836,'ASILLO',0,0,1,187),(1837,'CAMINACA',0,0,1,187),(1838,'CHUPA',0,0,1,187),(1839,'JOSE DOMINGO CHOQUEHUANCA',0,0,1,187),(1840,'MUÃ‘ANI',0,0,1,187),(1841,'POTONI',0,0,1,187),(1842,'SAMAN',0,0,1,187),(1843,'SAN ANTON',0,0,1,187),(1844,'SAN JOSE',0,0,1,187),(1845,'SAN JUAN DE SALINAS',0,0,1,187),(1846,'SANTIAGO DE PUPUJA',0,0,1,187),(1847,'TIRAPATA',0,0,1,187),(1848,'MACUSANI',0,0,1,188),(1849,'AJOYANI',0,0,1,188),(1850,'AYAPATA',0,0,1,188),(1851,'COASA',0,0,1,188),(1852,'CORANI',0,0,1,188),(1853,'CRUCERO',0,0,1,188),(1854,'ITUATA   2/',0,0,1,188),(1855,'OLLACHEA',0,0,1,188),(1856,'SAN GABAN',0,0,1,188),(1857,'USICAYOS',0,0,1,188),(1858,'JULI',0,0,1,189),(1859,'DESAGUADERO',0,0,1,189),(1860,'HUACULLANI',0,0,1,189),(1861,'KELLUYO',0,0,1,189),(1862,'PISACOMA',0,0,1,189),(1863,'POMATA',0,0,1,189),(1864,'ZEPITA',0,0,1,189),(1865,'ILAVE',0,0,1,190),(1866,'CAPAZO',0,0,1,190),(1867,'PILCUYO',0,0,1,190),(1868,'SANTA ROSA',0,0,1,190),(1869,'CONDURIRI',0,0,1,190),(1870,'HUANCANE',0,0,1,191),(1871,'COJATA',0,0,1,191),(1872,'HUATASANI',0,0,1,191),(1873,'INCHUPALLA',0,0,1,191),(1874,'PUSI',0,0,1,191),(1875,'ROSASPATA',0,0,1,191),(1876,'TARACO',0,0,1,191),(1877,'VILQUE CHICO',0,0,1,191),(1878,'LAMPA',0,0,1,192),(1879,'CABANILLA',0,0,1,192),(1880,'CALAPUJA',0,0,1,192),(1881,'NICASIO',0,0,1,192),(1882,'OCUVIRI',0,0,1,192),(1883,'PALCA',0,0,1,192),(1884,'PARATIA',0,0,1,192),(1885,'PUCARA',0,0,1,192),(1886,'SANTA LUCIA',0,0,1,192),(1887,'VILAVILA',0,0,1,192),(1888,'AYAVIRI',0,0,1,193),(1889,'ANTAUTA',0,0,1,193),(1890,'CUPI',0,0,1,193),(1891,'LLALLI',0,0,1,193),(1892,'MACARI',0,0,1,193),(1893,'NUÃ‘OA',0,0,1,193),(1894,'ORURILLO',0,0,1,193),(1895,'SANTA ROSA',0,0,1,193),(1896,'UMACHIRI',0,0,1,193),(1897,'MOHO',0,0,1,194),(1898,'CONIMA',0,0,1,194),(1899,'HUAYRAPATA',0,0,1,194),(1900,'TILALI',0,0,1,194),(1901,'PUTINA',0,0,1,195),(1902,'ANANEA',0,0,1,195),(1903,'PEDRO VILCA APAZA',0,0,1,195),(1904,'QUILCAPUNCU',0,0,1,195),(1905,'SINA',0,0,1,195),(1906,'JULIACA',0,0,1,196),(1907,'CABANA',0,0,1,196),(1908,'CABANILLAS',0,0,1,196),(1909,'CARACOTO',0,0,1,196),(1910,'SANDIA',0,0,1,197),(1911,'CUYOCUYO',0,0,1,197),(1912,'LIMBANI',0,0,1,197),(1913,'PATAMBUCO',0,0,1,197),(1914,'PHARA',0,0,1,197),(1915,'QUIACA',0,0,1,197),(1916,'SAN JUAN DEL ORO',0,0,1,197),(1917,'YANAHUAYA',0,0,1,197),(1918,'ALTO INAMBARI',0,0,1,197),(1919,'SAN PEDRO DE PUTINA PUNCO',0,0,1,197),(1920,'YUNGUYO',0,0,1,198),(1921,'ANAPIA',0,0,1,198),(1922,'COPANI',0,0,1,198),(1923,'CUTURAPI',0,0,1,198),(1924,'OLLARAYA',0,0,1,198),(1925,'TINICACHI',0,0,1,198),(1926,'UNICACHI',0,0,1,198),(1927,'MOYOBAMBA',0,0,1,199),(1928,'CALZADA',0,0,1,199),(1929,'HABANA',0,0,1,199),(1930,'JEPELACIO',0,0,1,199),(1931,'SORITOR',0,0,1,199),(1932,'YANTALO',0,0,1,199),(1933,'BELLAVISTA',0,0,1,200),(1934,'ALTO BIAVO',0,0,1,200),(1935,'BAJO BIAVO',0,0,1,200),(1936,'HUALLAGA',0,0,1,200),(1937,'SAN PABLO',0,0,1,200),(1938,'SAN RAFAEL',0,0,1,200),(1939,'SAN JOSE DE SISA',0,0,1,201),(1940,'AGUA BLANCA',0,0,1,201),(1941,'SAN MARTIN',0,0,1,201),(1942,'SANTA ROSA',0,0,1,201),(1943,'SHATOJA',0,0,1,201),(1944,'SAPOSOA',0,0,1,202),(1945,'ALTO SAPOSOA',0,0,1,202),(1946,'EL ESLABON',0,0,1,202),(1947,'PISCOYACU',0,0,1,202),(1948,'SACANCHE',0,0,1,202),(1949,'TINGO DE SAPOSOA',0,0,1,202),(1950,'LAMAS',0,0,1,203),(1951,'ALONSO DE ALVARADO',0,0,1,203),(1952,'BARRANQUITA',0,0,1,203),(1953,'CAYNARACHI  ',0,0,1,203),(1954,'CUÃ‘UMBUQUI',0,0,1,203),(1955,'PINTO RECODO',0,0,1,203),(1956,'RUMISAPA',0,0,1,203),(1957,'SAN ROQUE DE CUMBAZA',0,0,1,203),(1958,'SHANAO',0,0,1,203),(1959,'TABALOSOS',0,0,1,203),(1960,'ZAPATERO',0,0,1,203),(1961,'JUANJUI',0,0,1,204),(1962,'CAMPANILLA',0,0,1,204),(1963,'HUICUNGO',0,0,1,204),(1964,'PACHIZA',0,0,1,204),(1965,'PAJARILLO',0,0,1,204),(1966,'PICOTA',0,0,1,205),(1967,'BUENOS AIRES',0,0,1,205),(1968,'CASPISAPA',0,0,1,205),(1969,'PILLUANA',0,0,1,205),(1970,'PUCACACA',0,0,1,205),(1971,'SAN CRISTOBAL',0,0,1,205),(1972,'SAN HILARION',0,0,1,205),(1973,'SHAMBOYACU',0,0,1,205),(1974,'TINGO DE PONASA',0,0,1,205),(1975,'TRES UNIDOS',0,0,1,205),(1976,'RIOJA',0,0,1,206),(1977,'AWAJUN',0,0,1,206),(1978,'ELIAS SOPLIN VARGAS',0,0,1,206),(1979,'NUEVA CAJAMARCA',0,0,1,206),(1980,'PARDO MIGUEL',0,0,1,206),(1981,'POSIC',0,0,1,206),(1982,'SAN FERNANDO',0,0,1,206),(1983,'YORONGOS',0,0,1,206),(1984,'YURACYACU',0,0,1,206),(1985,'TARAPOTO',0,0,1,207),(1986,'ALBERTO LEVEAU',0,0,1,207),(1987,'CACATACHI',0,0,1,207),(1988,'CHAZUTA',0,0,1,207),(1989,'CHIPURANA',0,0,1,207),(1990,'EL PORVENIR',0,0,1,207),(1991,'HUIMBAYOC',0,0,1,207),(1992,'JUAN GUERRA',0,0,1,207),(1993,'LA BANDA DE SHILCAYO',0,0,1,207),(1994,'MORALES',0,0,1,207),(1995,'PAPAPLAYA',0,0,1,207),(1996,'SAN ANTONIO',0,0,1,207),(1997,'SAUCE',0,0,1,207),(1998,'SHAPAJA',0,0,1,207),(1999,'TOCACHE',0,0,1,208),(2000,'NUEVO PROGRESO',0,0,1,208);
/*!40000 ALTER TABLE `ubigeo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `nPersonal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nPersonal_id_UNIQUE` (`nPersonal_id`),
  KEY `userFKven_personal_idx` (`nPersonal_id`),
  CONSTRAINT `userFKven_personal` FOREIGN KEY (`nPersonal_id`) REFERENCES `ven_personal` (`nPersonal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'\0\0','administrator','fa79df3ba4b83c8b92527584784258a2c0d17878','9462e8eee0','ricoru@hotmail.com','',NULL,NULL,NULL,1268889823,1396369920,1,'Admin','istrator','ADMIN','0',1),(2,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','cinthya','a4e8236219d8409b8d7217e3e37f55303a953a97',NULL,'',NULL,NULL,NULL,NULL,1394634300,1394634415,1,NULL,NULL,NULL,NULL,2),(3,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','carlos','ca834763db5db64a21c3542d7454dc367c9772de',NULL,'',NULL,NULL,NULL,NULL,1394634478,1394634478,1,NULL,NULL,NULL,NULL,4),(4,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','pastor','7bbd50810b391abe5e8b71900f61560d9480522f',NULL,'',NULL,NULL,NULL,NULL,1394634529,1394634529,1,NULL,NULL,NULL,NULL,5),(5,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','kelca','bd70f9c62d522c9b6a1f77a1193dd63e6b68c06e',NULL,'','1e068b9da67616988f21fc3be393a8ec65bd8328',NULL,NULL,NULL,1394634569,1394634569,0,NULL,NULL,NULL,NULL,7),(6,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','cvaldi','2ec644216b448d6e73a9be46d301d73a5f69294a',NULL,'',NULL,NULL,NULL,NULL,1395762152,1395762152,1,NULL,NULL,NULL,NULL,8),(7,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','trabajador','db39cb4375fdb615415f975b8435f328947e6e49',NULL,'',NULL,NULL,NULL,NULL,1395844746,1395844746,1,NULL,NULL,NULL,NULL,21);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (163,1,1),(131,1,3),(151,1,4),(141,1,5),(142,1,6),(152,1,7),(132,1,8),(153,1,9),(154,1,10),(155,1,11),(156,1,12),(157,1,13),(158,1,14),(159,1,15),(160,1,16),(161,1,17),(162,1,18),(143,1,19),(144,1,20),(145,1,21),(146,1,22),(147,1,23),(148,1,24),(133,1,25),(134,1,26),(135,1,27),(136,1,28),(137,1,29),(138,1,30),(139,1,31),(140,1,32),(149,1,33),(150,1,34),(164,1,35),(165,2,3),(166,2,8),(167,2,25),(168,2,26),(169,2,27),(170,2,28),(171,2,29),(172,2,30),(173,2,31),(174,2,32),(175,2,35),(176,3,5),(177,3,6),(178,3,19),(179,3,20),(180,3,21),(181,3,22),(182,3,23),(183,3,24),(184,3,33),(185,3,34),(186,4,3),(207,4,4),(197,4,5),(198,4,6),(208,4,7),(187,4,8),(209,4,9),(210,4,10),(211,4,11),(212,4,12),(213,4,13),(214,4,14),(215,4,15),(216,4,16),(217,4,17),(218,4,18),(199,4,19),(200,4,20),(201,4,21),(202,4,22),(203,4,23),(204,4,24),(188,4,25),(189,4,26),(190,4,27),(191,4,28),(192,4,29),(193,4,30),(194,4,31),(195,4,32),(205,4,33),(206,4,34),(196,4,35),(219,5,3),(230,5,5),(231,5,6),(220,5,8),(232,5,19),(233,5,20),(234,5,21),(235,5,22),(236,5,23),(237,5,24),(221,5,25),(222,5,26),(223,5,27),(224,5,28),(225,5,29),(226,5,30),(227,5,31),(228,5,32),(238,5,33),(239,5,34),(229,5,35),(240,6,3),(241,6,8),(242,6,25),(243,6,26),(244,6,27),(245,6,28),(246,6,29),(247,6,30),(248,6,31),(249,6,32),(250,6,35),(251,7,3),(252,7,8),(253,7,25),(254,7,26),(255,7,27),(256,7,28);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_local`
--

DROP TABLE IF EXISTS `users_local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_local` (
  `nUsersLocal_id` int(11) NOT NULL AUTO_INCREMENT,
  `nLocal_id` int(11) NOT NULL,
  `cUsersLocalEstado` char(1) NOT NULL DEFAULT '1',
  `users_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`nUsersLocal_id`),
  KEY `UsersLocalFKLocal_idx` (`nLocal_id`),
  KEY `UsersLocalFKUser_idx` (`users_id`),
  CONSTRAINT `UsersLocalFKLocal` FOREIGN KEY (`nLocal_id`) REFERENCES `local` (`nLocal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `UsersLocalFKUser` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_local`
--

LOCK TABLES `users_local` WRITE;
/*!40000 ALTER TABLE `users_local` DISABLE KEYS */;
INSERT INTO `users_local` VALUES (1,1,'1',1),(2,1,'1',2),(3,1,'1',3),(4,1,'1',4),(5,1,'1',5),(6,1,'1',6),(7,4,'1',6),(8,1,'1',7);
/*!40000 ALTER TABLE `users_local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ven_boleta`
--

DROP TABLE IF EXISTS `ven_boleta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_boleta` (
  `nBoleta_id` int(11) NOT NULL AUTO_INCREMENT,
  `cBoletaSerie` char(4) NOT NULL DEFAULT '0001',
  `cBoletaNro` char(8) NOT NULL DEFAULT '00000000',
  `nDocumento_id` int(11) NOT NULL,
  PRIMARY KEY (`nBoleta_id`),
  KEY `BoletaFKDocVenta_idx` (`nDocumento_id`),
  CONSTRAINT `BoletaFKDocVenta` FOREIGN KEY (`nDocumento_id`) REFERENCES `ven_docventa` (`nDocumento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_boleta`
--

LOCK TABLES `ven_boleta` WRITE;
/*!40000 ALTER TABLE `ven_boleta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ven_boleta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ven_cargo`
--

DROP TABLE IF EXISTS `ven_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_cargo` (
  `nCargo_id` int(11) NOT NULL AUTO_INCREMENT,
  `nCargoDesc` varchar(100) NOT NULL DEFAULT '',
  `cCargoEst` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nCargo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_cargo`
--

LOCK TABLES `ven_cargo` WRITE;
/*!40000 ALTER TABLE `ven_cargo` DISABLE KEYS */;
INSERT INTO `ven_cargo` VALUES (1,'ADMINISTRADOR','1'),(2,'Vendedor','1'),(3,'Director Comercial','1'),(4,'Gerente Genral','1'),(5,'Jefe de Area','1'),(6,'Secretario General','1'),(7,'Recepcionista','1'),(8,'Junta de Directores','1'),(9,'Ejecutivo','1'),(10,'Director de Finanzas','1'),(11,'Jefe de Almacen','1'),(12,'Recursos Humanos','1'),(13,'Asesor de Ventasaaaaaaaaa','0'),(14,'Cargo de Prueba','1'),(15,'Asesor de Ventas','1'),(16,'Cargouno','1'),(17,'Cargodos','1'),(18,'Cargo cinco','1'),(19,'Cargo seis','1'),(20,'Cargo siete','1'),(21,'Cargo ocho','1'),(22,'Cargo nueve','1'),(23,'Cargo diez','1'),(24,'Cargo once','1'),(25,'Cargo doce','1'),(26,'Cargo trece','1'),(27,'Cargo catorce','1'),(28,'Caego quince','1'),(29,'Cargo dieciseis','1'),(30,'Cargo veinte','1'),(31,'Cargo veintiuno','1'),(32,'Cargo veintidos','1'),(33,'Cargo uno','1'),(34,'Cargo veinitres','1'),(35,'Cargo veinticuatro','1'),(36,'Cargo veinticinco','1'),(37,'Cargo treinta','1'),(38,'Cargo treinta y uno','1'),(39,'Cargo treinta y dos','1'),(40,'cARGO TREINTA Y DOS','1'),(41,'Cargo treinta y tres','1'),(42,'Cargo treinta y cuatro','1'),(43,'Cargo treinta y cinco','1'),(44,'cARGO TEINTA Y SIETE','1'),(45,'Cargo uno','1'),(46,'Cargo cuarenta','1'),(47,'Cargo cuarenta y uno','1'),(48,'Cargo cuarenta y ocho','1'),(49,'Cargo cuarenta y nueve','1'),(50,'CARGO CINCUENTA','1'),(51,'Cargo cincuenta y uno','1'),(52,'cargo cincuenta y dos','1');
/*!40000 ALTER TABLE `ven_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ven_cargo_all`
--

DROP TABLE IF EXISTS `ven_cargo_all`;
/*!50001 DROP VIEW IF EXISTS `ven_cargo_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_cargo_all` (
  `nCargo_id` tinyint NOT NULL,
  `nCargoDesc` tinyint NOT NULL,
  `cCargosEst` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ven_categoria`
--

DROP TABLE IF EXISTS `ven_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_categoria` (
  `nCategoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `cCategoriaNom` varchar(100) NOT NULL DEFAULT '',
  `cCategoriaDesc` varchar(150) NOT NULL DEFAULT '',
  `cCategoriaEst` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nCategoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_categoria`
--

LOCK TABLES `ven_categoria` WRITE;
/*!40000 ALTER TABLE `ven_categoria` DISABLE KEYS */;
INSERT INTO `ven_categoria` VALUES (1,'Calzado','Incluye Calzados y Zapatillas y SANALIAS','1'),(2,'Ropa','Para damas y caballeros','1'),(3,'Categoria uno','nada','1'),(4,'Categoria dos','nada','1'),(5,'Categoria tres','nada','1'),(6,'Categoria cuatro','nada','1'),(7,'Categoria cuatro','nada','1'),(8,'Categoria cinco','nada','1'),(9,'Categoria seis','ok','1'),(10,'Categoria siete','ok','1'),(11,'Categoria ocho','ok','1'),(12,'Categoria nueve','ok','1'),(13,'Categoria diez','ok','1'),(14,'Categoria once','ok','1'),(15,'Categoria doce','ok','1'),(16,'Categoria trece','categoria trece','1'),(17,'Categoria catorce','categoria catorce','1'),(18,'categoria quince','categoria quince','1'),(19,'categoria dieciseis','categoria dieciseis','1'),(20,'categoria diecisisete','categoria diecisiete','1'),(21,'categoria veinte','categori veinte','1'),(22,'categoria veintinuno','categoria veintiuno','1'),(23,'categoria veintidos','categoria veintios','1'),(24,'category one','category one','1'),(25,'category two','category two','1'),(26,'category three','category three','1'),(27,'category four','category four','1'),(28,'Categoria 1','categoria 1','1'),(29,'Categoria 2','categoria 2','1'),(30,'categoria 3','categoria 3','1'),(31,'categoria 4','categoria 4','1'),(32,'categoria 4','categoria 4','1'),(33,'categoria 5','categoria 5','1'),(34,'categoria 6','categoria 6','1'),(35,'categoria 7 ','categoria 7','1'),(36,'categoria 8','categoria 8','1'),(37,'categoria 9','categoria 9','1'),(38,'categoria 10','categoria 10','1'),(39,'categoria 11','categoria 11','1'),(40,'categoria 12','xcategoria 12','1'),(41,'categoria 13','categoria 13','1'),(42,'categoria 14','categoria 14','1'),(43,'categoria 15','categoria 15','1'),(44,'categoria 16','categoria 16','1'),(45,'categoria 17','categoria 17','1'),(46,'categoria 18','categoria 18','1'),(47,'categoria 19','categoria 19','1'),(48,'categoria 19','categoria 19','1'),(49,'categoria 20','categoria 20','1'),(50,'categoria 21','categoria 21','1');
/*!40000 ALTER TABLE `ven_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ven_categoria_all`
--

DROP TABLE IF EXISTS `ven_categoria_all`;
/*!50001 DROP VIEW IF EXISTS `ven_categoria_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_categoria_all` (
  `nCategoria_id` tinyint NOT NULL,
  `cCategoriaNom` tinyint NOT NULL,
  `cCategoriaDesc` tinyint NOT NULL,
  `cCategoriaEst` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ven_cliente`
--

DROP TABLE IF EXISTS `ven_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_cliente` (
  `nCliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cClienteNom` varchar(50) NOT NULL DEFAULT '',
  `cClienteApe` varchar(50) NOT NULL DEFAULT '',
  `cClienteDNI` char(8) NOT NULL DEFAULT '',
  `cClienteRef` varchar(200) NOT NULL DEFAULT '',
  `cClientecDir` varchar(200) NOT NULL,
  `nZona_id` int(11) NOT NULL,
  `nClienteLineaOp` decimal(9,2) NOT NULL DEFAULT '0.00' COMMENT 'Linea Opcional, cuando no tienen tarjeta de cliente.',
  `cClienteArcCredito` text,
  `cClienteOcup` varchar(40) NOT NULL,
  `cClienteTel` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`nCliente_id`),
  UNIQUE KEY `cClienteDNI_UNIQUE` (`cClienteDNI`),
  KEY `ClienteFKZona_idx` (`nZona_id`),
  CONSTRAINT `ClienteFKZona` FOREIGN KEY (`nZona_id`) REFERENCES `ven_zona` (`nZona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_cliente`
--

LOCK TABLES `ven_cliente` WRITE;
/*!40000 ALTER TABLE `ven_cliente` DISABLE KEYS */;
INSERT INTO `ven_cliente` VALUES (1,'ANONIMOS','ANONIMOS','00000000','','Jr. Grau # 123',1,1.00,'0','','123456'),(2,'Cliente','apellido','12345678','referencia','direccion',1,1.00,'0','ocupacion','280833'),(15,'Juan','Perez','23456789','nada','av husares',28,123.00,'0','nada','234567'),(16,'Maria','Perez','34567891','referencia','direccion',28,123.00,'0','ocupacion','657890'),(17,'Gerson Rolando','Boullanger Montoya','89765436','por ahi','av tumbes 1234',1,1.00,'0','estudiante','280843'),(18,'Carlos','Zarate Florian','12458790','Por el ovalo larco','Av Larco 1256',1,1.00,'0','Informatico','123567'),(20,'Meche','Quiroz Gutierrez','34654798','Por el ovalo larco','Av Larco 1256',1,1.00,'0','Ing Informatico','123456'),(21,'Nombre','Apellido','65789430','referencia','DIRECCIO',1,1.00,'0','ocupacion','280833');
/*!40000 ALTER TABLE `ven_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ven_cliente_all`
--

DROP TABLE IF EXISTS `ven_cliente_all`;
/*!50001 DROP VIEW IF EXISTS `ven_cliente_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_cliente_all` (
  `nCliente_id` tinyint NOT NULL,
  `cClienteNom` tinyint NOT NULL,
  `cClienteApe` tinyint NOT NULL,
  `cClienteDNI` tinyint NOT NULL,
  `cClienteRef` tinyint NOT NULL,
  `cClientecDir` tinyint NOT NULL,
  `nZona_id` tinyint NOT NULL,
  `nClienteLineaOp` tinyint NOT NULL,
  `cClienteArcCredito` tinyint NOT NULL,
  `cClienteOcup` tinyint NOT NULL,
  `nUbigeo_id` tinyint NOT NULL,
  `cZonaDesc` tinyint NOT NULL,
  `cClienteTel` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_consulta_venta`
--

DROP TABLE IF EXISTS `ven_consulta_venta`;
/*!50001 DROP VIEW IF EXISTS `ven_consulta_venta`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_consulta_venta` (
  `FecReg` tinyint NOT NULL,
  `Tienda` tinyint NOT NULL,
  `Cliente` tinyint NOT NULL,
  `Producto` tinyint NOT NULL,
  `Serie` tinyint NOT NULL,
  `Cant` tinyint NOT NULL,
  `Desct` tinyint NOT NULL,
  `PrecioCosto` tinyint NOT NULL,
  `PrecioVentaContado` tinyint NOT NULL,
  `PrecioVentaCredito` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_consultadetalleventa_byventa`
--

DROP TABLE IF EXISTS `ven_consultadetalleventa_byventa`;
/*!50001 DROP VIEW IF EXISTS `ven_consultadetalleventa_byventa`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_consultadetalleventa_byventa` (
  `nVenta_id` tinyint NOT NULL,
  `cVentaFecReg` tinyint NOT NULL,
  `codBarra` tinyint NOT NULL,
  `nProducto_id` tinyint NOT NULL,
  `Producto` tinyint NOT NULL,
  `cant_prod` tinyint NOT NULL,
  `Total` tinyint NOT NULL,
  `nDetVentaPrecUnt` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_consultarventa_byid`
--

DROP TABLE IF EXISTS `ven_consultarventa_byid`;
/*!50001 DROP VIEW IF EXISTS `ven_consultarventa_byid`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_consultarventa_byid` (
  `nVenta_id` tinyint NOT NULL,
  `cVentaFecReg` tinyint NOT NULL,
  `Cliente` tinyint NOT NULL,
  `Cliente_direccion` tinyint NOT NULL,
  `Vendedor` tinyint NOT NULL,
  `tipo_pago` tinyint NOT NULL,
  `SubTotal` tinyint NOT NULL,
  `Descuento` tinyint NOT NULL,
  `TipoIGV` tinyint NOT NULL,
  `Total` tinyint NOT NULL,
  `nVentaTotAmt` tinyint NOT NULL,
  `nVentaSaldo` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ven_credito`
--

DROP TABLE IF EXISTS `ven_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_credito` (
  `nVenCredito_id` int(11) NOT NULL AUTO_INCREMENT,
  `nCreditoFormaPag` int(11) NOT NULL COMMENT 'Forma de Pago.',
  `nVenCreditoNCuota` int(11) NOT NULL,
  `nVenCreditoMontInicial` decimal(9,2) NOT NULL COMMENT 'Monto Inicial.',
  `nVenCreditoPPag` int(11) NOT NULL COMMENT 'Porcentaje de Pago',
  `nVenta_id` int(11) NOT NULL,
  `cCreditoEst` char(1) NOT NULL,
  PRIMARY KEY (`nVenCredito_id`),
  KEY `CreditoFKVenta_idx` (`nVenta_id`),
  CONSTRAINT `CreditoFKVenta` FOREIGN KEY (`nVenta_id`) REFERENCES `ven_venta` (`nVenta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_credito`
--

LOCK TABLES `ven_credito` WRITE;
/*!40000 ALTER TABLE `ven_credito` DISABLE KEYS */;
INSERT INTO `ven_credito` VALUES (1,2,5,0.00,20,10,'1'),(2,2,6,12.00,17,12,'1'),(3,2,6,12.00,17,14,'1');
/*!40000 ALTER TABLE `ven_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ven_credito_by_idcliente`
--

DROP TABLE IF EXISTS `ven_credito_by_idcliente`;
/*!50001 DROP VIEW IF EXISTS `ven_credito_by_idcliente`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_credito_by_idcliente` (
  `id_venta` tinyint NOT NULL,
  `fechaVenta` tinyint NOT NULL,
  `creditoest` tinyint NOT NULL,
  `id_credito` tinyint NOT NULL,
  `montoTotal` tinyint NOT NULL,
  `montoPagado` tinyint NOT NULL,
  `cuotas` tinyint NOT NULL,
  `id_cliente` tinyint NOT NULL,
  `cliente` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_cronogramapago_all`
--

DROP TABLE IF EXISTS `ven_cronogramapago_all`;
/*!50001 DROP VIEW IF EXISTS `ven_cronogramapago_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_cronogramapago_all` (
  `nCronograma_id` tinyint NOT NULL,
  `nCronPagoNroCuota` tinyint NOT NULL,
  `nCronPagoFecReg` tinyint NOT NULL,
  `nCronPagoFecPago` tinyint NOT NULL,
  `nCronPagoMonCouApg` tinyint NOT NULL,
  `nCronPagoMonCouApl` tinyint NOT NULL,
  `nVenCredito_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ven_cronpago`
--

DROP TABLE IF EXISTS `ven_cronpago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_cronpago` (
  `nCronograma_id` int(11) NOT NULL AUTO_INCREMENT,
  `nCronPagoNroCuota` int(11) NOT NULL,
  `nCronPagoFecReg` datetime NOT NULL,
  `nCronPagoFecPago` datetime NOT NULL,
  `nCronPagoMonCouApg` decimal(9,2) NOT NULL COMMENT 'Monto Cuota Apagar',
  `nCronPagoMonCouApl` decimal(9,2) NOT NULL COMMENT 'Monto Cuota Aplicado',
  `nVenCredito_id` int(11) NOT NULL,
  PRIMARY KEY (`nCronograma_id`),
  KEY `CronPagoFKVenCredito_idx` (`nVenCredito_id`),
  CONSTRAINT `CronPagoFKVenCredito` FOREIGN KEY (`nVenCredito_id`) REFERENCES `ven_credito` (`nVenCredito_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_cronpago`
--

LOCK TABLES `ven_cronpago` WRITE;
/*!40000 ALTER TABLE `ven_cronpago` DISABLE KEYS */;
INSERT INTO `ven_cronpago` VALUES (1,1,'0000-00-00 00:00:00','2014-03-27 00:00:00',8.39,0.00,1),(2,2,'0000-00-00 00:00:00','2014-04-03 00:00:00',8.39,0.00,1),(3,3,'0000-00-00 00:00:00','2014-04-10 00:00:00',8.39,0.00,1),(4,4,'0000-00-00 00:00:00','2014-04-17 00:00:00',8.39,0.00,1),(5,5,'0000-00-00 00:00:00','2014-04-24 00:00:00',8.39,0.00,1),(6,1,'0000-00-00 00:00:00','2014-03-31 00:00:00',84.33,0.00,2),(7,2,'0000-00-00 00:00:00','2014-04-07 00:00:00',84.33,0.00,2),(8,3,'0000-00-00 00:00:00','2014-04-14 00:00:00',84.33,0.00,2),(9,4,'0000-00-00 00:00:00','2014-04-21 00:00:00',84.33,0.00,2),(10,5,'0000-00-00 00:00:00','2014-04-28 00:00:00',84.33,0.00,2),(11,6,'0000-00-00 00:00:00','2014-05-05 00:00:00',84.33,0.00,2),(12,1,'0000-00-00 00:00:00','2014-04-02 00:00:00',13.65,0.00,3),(13,2,'0000-00-00 00:00:00','2014-04-09 00:00:00',13.65,0.00,3),(14,3,'0000-00-00 00:00:00','2014-04-16 00:00:00',13.65,0.00,3),(15,4,'0000-00-00 00:00:00','2014-04-23 00:00:00',13.65,0.00,3),(16,5,'0000-00-00 00:00:00','2014-04-30 00:00:00',13.65,0.00,3),(17,6,'0000-00-00 00:00:00','2014-05-07 00:00:00',13.65,0.00,3);
/*!40000 ALTER TABLE `ven_cronpago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ven_detventa`
--

DROP TABLE IF EXISTS `ven_detventa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_detventa` (
  `nDetVenta_id` int(11) NOT NULL AUTO_INCREMENT,
  `nVenta_id` int(11) NOT NULL,
  `nProducto_id` int(11) NOT NULL,
  `nDetVentaCant` decimal(9,2) NOT NULL DEFAULT '0.00',
  `nDetVentaPrecUnt` decimal(9,2) NOT NULL DEFAULT '0.00',
  `nDetVentaDscto` decimal(9,1) NOT NULL DEFAULT '0.0',
  `nDetVentaTot` decimal(9,2) NOT NULL DEFAULT '0.00',
  `cDetVentaDesc` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`nDetVenta_id`),
  KEY `DetVentaFKProducto_idx` (`nProducto_id`),
  KEY `DetVentaFKVenta_idx` (`nVenta_id`),
  CONSTRAINT `DetVentaFKProducto` FOREIGN KEY (`nProducto_id`) REFERENCES `producto` (`nProducto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `DetVentaFKVenta` FOREIGN KEY (`nVenta_id`) REFERENCES `ven_venta` (`nVenta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_detventa`
--

LOCK TABLES `ven_detventa` WRITE;
/*!40000 ALTER TABLE `ven_detventa` DISABLE KEYS */;
INSERT INTO `ven_detventa` VALUES (1,1,2,23.00,41.86,15.0,962.78,'Por Día del Padre'),(2,7,2,1.00,41.86,15.0,41.86,'Por Día del Padre'),(3,8,9,1.00,25.00,0.0,25.00,''),(4,9,9,1.00,25.00,0.0,25.00,''),(5,10,2,1.00,34.21,15.0,34.21,'Por Día del Padre'),(6,11,5,12.00,14.37,15.0,172.44,'Por Día del Padre'),(7,11,6,2.00,46.95,15.0,93.90,'Por Día del Padre'),(8,12,3,6.00,60.92,15.0,365.52,'Por Día del Padre'),(9,12,3,2.00,60.92,15.0,121.84,'Por Día del Padre'),(10,13,5,1.00,14.37,15.0,14.37,'Por Día del Padre'),(11,14,6,1.00,34.20,15.0,34.20,'Por Día del Padre'),(12,14,6,1.00,34.20,15.0,34.20,'Por Día del Padre'),(13,15,5,5.00,14.37,15.0,71.85,'Por Día del Padre'),(14,16,5,2.00,14.37,15.0,28.74,'Por Día del Padre'),(15,17,5,2.00,14.37,15.0,28.74,'Por Día del Padre'),(16,18,5,2.00,14.37,15.0,28.74,'Por Día del Padre'),(17,18,6,2.00,46.95,15.0,93.90,'Por Día del Padre'),(18,19,5,2.00,12.65,15.0,25.30,'Por Día del Padre'),(19,20,108,2.00,0.00,0.0,0.00,''),(20,21,108,30.00,0.00,0.0,0.00,'');
/*!40000 ALTER TABLE `ven_detventa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ven_docventa`
--

DROP TABLE IF EXISTS `ven_docventa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_docventa` (
  `nDocumento_id` int(11) NOT NULL AUTO_INCREMENT,
  `nVenta_id` int(11) NOT NULL,
  `dDocVentaFecEms` datetime NOT NULL COMMENT 'Fecha Emision o Fecha Registro',
  `nDocVentaTipDoc` int(11) NOT NULL,
  `dDocVentaFecVenc` datetime NOT NULL COMMENT 'Fecha Vencimiento',
  PRIMARY KEY (`nDocumento_id`),
  KEY `DocVentaFKVenta_idx` (`nVenta_id`),
  CONSTRAINT `DocVentaFKVenta` FOREIGN KEY (`nVenta_id`) REFERENCES `ven_venta` (`nVenta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_docventa`
--

LOCK TABLES `ven_docventa` WRITE;
/*!40000 ALTER TABLE `ven_docventa` DISABLE KEYS */;
/*!40000 ALTER TABLE `ven_docventa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ven_factura`
--

DROP TABLE IF EXISTS `ven_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_factura` (
  `nFactura_id` int(11) NOT NULL AUTO_INCREMENT,
  `cFacturaNro` char(8) NOT NULL DEFAULT '00000000',
  `cFacturaSerie` char(4) NOT NULL DEFAULT '0000',
  `nDocumento_id` int(11) NOT NULL,
  PRIMARY KEY (`nFactura_id`),
  KEY `FacturaFKDocVenta_idx` (`nDocumento_id`),
  CONSTRAINT `FacturaFKDocVenta` FOREIGN KEY (`nDocumento_id`) REFERENCES `ven_docventa` (`nDocumento_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_factura`
--

LOCK TABLES `ven_factura` WRITE;
/*!40000 ALTER TABLE `ven_factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `ven_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ven_lista_movimiento`
--

DROP TABLE IF EXISTS `ven_lista_movimiento`;
/*!50001 DROP VIEW IF EXISTS `ven_lista_movimiento`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_lista_movimiento` (
  `nMovimiento_id` tinyint NOT NULL,
  `nMovimientoMonto` tinyint NOT NULL,
  `cMovimientoConcepto` tinyint NOT NULL,
  `dMovimientoFecReg` tinyint NOT NULL,
  `cConstanteValor` tinyint NOT NULL,
  `nMovimientoTip` tinyint NOT NULL,
  `nPersonal_id` tinyint NOT NULL,
  `personal` tinyint NOT NULL,
  `nMovimientoTipPag` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_listacliente_byzona`
--

DROP TABLE IF EXISTS `ven_listacliente_byzona`;
/*!50001 DROP VIEW IF EXISTS `ven_listacliente_byzona`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_listacliente_byzona` (
  `cClienteNom` tinyint NOT NULL,
  `cClienteApe` tinyint NOT NULL,
  `cClienteDNI` tinyint NOT NULL,
  `nClienteLineaOp` tinyint NOT NULL,
  `nZona_id` tinyint NOT NULL,
  `cZonaDesc` tinyint NOT NULL,
  `nUbigeo_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_listaclientedeudores`
--

DROP TABLE IF EXISTS `ven_listaclientedeudores`;
/*!50001 DROP VIEW IF EXISTS `ven_listaclientedeudores`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_listaclientedeudores` (
  `id` tinyint NOT NULL,
  `Cliente` tinyint NOT NULL,
  `DNI` tinyint NOT NULL,
  `Zona` tinyint NOT NULL,
  `Direccion` tinyint NOT NULL,
  `TotalCredito` tinyint NOT NULL,
  `TotalPagoRealizado` tinyint NOT NULL,
  `Saldo` tinyint NOT NULL,
  `Estado` tinyint NOT NULL,
  `Responsable` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_listaclientedeudores_detallado`
--

DROP TABLE IF EXISTS `ven_listaclientedeudores_detallado`;
/*!50001 DROP VIEW IF EXISTS `ven_listaclientedeudores_detallado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_listaclientedeudores_detallado` (
  `id` tinyint NOT NULL,
  `Cliente` tinyint NOT NULL,
  `DNI` tinyint NOT NULL,
  `Zona` tinyint NOT NULL,
  `Direccion` tinyint NOT NULL,
  `FecVenta` tinyint NOT NULL,
  `TotalCredito` tinyint NOT NULL,
  `TotalPagoRealizado` tinyint NOT NULL,
  `Saldo` tinyint NOT NULL,
  `FecFinalizacion` tinyint NOT NULL,
  `Estado` tinyint NOT NULL,
  `Responsable` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_listacronpago_by_venta`
--

DROP TABLE IF EXISTS `ven_listacronpago_by_venta`;
/*!50001 DROP VIEW IF EXISTS `ven_listacronpago_by_venta`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_listacronpago_by_venta` (
  `venta_id` tinyint NOT NULL,
  `NroCuota` tinyint NOT NULL,
  `FecVenc` tinyint NOT NULL,
  `Deuda` tinyint NOT NULL,
  `MontoPagado` tinyint NOT NULL,
  `Saldo` tinyint NOT NULL,
  `Estado` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ven_listareq`
--

DROP TABLE IF EXISTS `ven_listareq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_listareq` (
  `nListaReq_id` int(11) NOT NULL AUTO_INCREMENT,
  `nListaReqTipo` int(11) NOT NULL,
  `cListaReqObs` varchar(500) NOT NULL,
  `nCliente_id` int(11) NOT NULL,
  `cListaReqEst` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nListaReq_id`),
  KEY `ListaReqFKCliente_idx` (`nCliente_id`),
  CONSTRAINT `ListaReqFKCliente` FOREIGN KEY (`nCliente_id`) REFERENCES `ven_cliente` (`nCliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_listareq`
--

LOCK TABLES `ven_listareq` WRITE;
/*!40000 ALTER TABLE `ven_listareq` DISABLE KEYS */;
/*!40000 ALTER TABLE `ven_listareq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ven_marca`
--

DROP TABLE IF EXISTS `ven_marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_marca` (
  `nMarca_id` int(11) NOT NULL AUTO_INCREMENT,
  `cMarcaDesc` varchar(100) NOT NULL DEFAULT '',
  `cMarcaEst` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nMarca_id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_marca`
--

LOCK TABLES `ven_marca` WRITE;
/*!40000 ALTER TABLE `ven_marca` DISABLE KEYS */;
INSERT INTO `ven_marca` VALUES (1,'Bata','1'),(2,'Ecco','1'),(3,'Lorens','1'),(4,'Asaleia','1'),(5,'Chanel','1'),(6,'Belle','1'),(7,'Reef','1'),(8,'Arenas','1'),(9,'Roxy','1'),(10,'BabyBotte','1'),(11,'Marca de Prueba','1'),(12,'marca uno','1'),(13,'marca dos','1'),(14,'marca tres','1'),(15,'marca cuatro','1'),(16,'marca cinco','1'),(17,'marca seis','1'),(18,'marca siete','1'),(19,'marca ocho','1'),(20,'marca nueve','1'),(21,'marca diez','1'),(22,'marca once','1'),(23,'marca doce','1'),(24,'marca trece','1'),(25,'marca catorce','1'),(26,'marca quince','1'),(27,'mara dieciseis','1'),(28,'marca diecisiete','1'),(29,'marca veinte','1'),(30,'marca veintiuno','1'),(31,'marca veintidos','1'),(32,'marca veintidos','1'),(33,'mara veinti tres','1'),(34,'marca treinta','1'),(35,'marca treinta y uno','1'),(36,'marcquitah','1'),(37,'marca','1'),(38,'marca','1'),(39,'marca A','1'),(40,'mara B','1'),(41,'MARCA Q','1'),(42,'MARCA W','1'),(43,'MARCA E','1'),(44,'MARCA E','1'),(45,'MARCA R','1'),(46,'MARCA T','1'),(47,'MARCA Y','1'),(48,'MARA U','1'),(49,'MARCA I','1'),(50,'MARCA O','1'),(51,'MARCA P','1'),(52,'MARCA A','1'),(53,'MARCA S','1'),(54,'MARCA D','1'),(55,'MARCA F','1'),(56,'MARCA G','1'),(57,'MARCA H','1'),(58,'MARCA J','1'),(59,'MARA K','1'),(60,'MARCA L','1'),(61,'MARCA Z','1'),(62,'MARCA X','1'),(63,'MARCA C','1'),(64,'MARCA V','1'),(65,'MARCA B','1'),(66,'MARCA N','1'),(67,'MARCA M','1'),(68,'MARA AQ','1'),(69,'MARCA WE','1'),(70,'MARCA RE','1'),(71,'MARCA RT','1');
/*!40000 ALTER TABLE `ven_marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ven_marca_all`
--

DROP TABLE IF EXISTS `ven_marca_all`;
/*!50001 DROP VIEW IF EXISTS `ven_marca_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_marca_all` (
  `nMarca_id` tinyint NOT NULL,
  `cMarcaDesc` tinyint NOT NULL,
  `cMarcaEst` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ven_movimiento`
--

DROP TABLE IF EXISTS `ven_movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_movimiento` (
  `nMovimiento_id` int(11) NOT NULL AUTO_INCREMENT,
  `nMovimientoMonto` decimal(9,2) NOT NULL DEFAULT '0.00',
  `cMovimientoConcepto` varchar(500) NOT NULL DEFAULT '',
  `nPersonal_id` int(11) NOT NULL,
  `nMovimientoTip` int(11) NOT NULL DEFAULT '0',
  `nMovimientoTipPag` int(11) NOT NULL DEFAULT '0',
  `dMovimientoFecReg` datetime NOT NULL,
  `nLocal_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nMovimiento_id`),
  KEY `MovimientoFKPersonal_idx` (`nPersonal_id`),
  KEY `MovimientoFKLocal_idx` (`nLocal_id`),
  CONSTRAINT `MovimientoFKLocal` FOREIGN KEY (`nLocal_id`) REFERENCES `local` (`nLocal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `MovimientoFKPersonal` FOREIGN KEY (`nPersonal_id`) REFERENCES `ven_personal` (`nPersonal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_movimiento`
--

LOCK TABLES `ven_movimiento` WRITE;
/*!40000 ALTER TABLE `ven_movimiento` DISABLE KEYS */;
INSERT INTO `ven_movimiento` VALUES (1,1234.00,'nada',1,2,1,'2014-03-26 00:00:00',1),(2,1234.00,'nada',1,2,1,'2014-03-26 00:00:00',1),(3,123456.00,'OK',1,1,1,'2014-03-26 00:00:00',1),(4,123.00,'ok',1,1,1,'2014-03-26 00:00:00',1),(5,123.00,'ok',1,2,1,'2014-03-26 00:00:00',1),(31,11.00,'DEVOLUCION DE DINERO',1,2,1,'2014-04-01 00:00:00',1),(32,12.00,'POR CONCEPTO',1,1,1,'2014-04-01 00:00:00',1),(33,12.00,'DEPOSITO',1,2,1,'2014-04-01 00:00:00',1),(34,12.00,'EEEE',1,1,1,'2014-04-01 00:00:00',1),(35,12.00,'S',1,1,1,'2014-04-01 00:00:00',1),(36,12.00,'por pago',1,1,1,'2014-04-01 00:00:00',1),(37,12.00,'por pago',1,1,1,'2014-04-01 00:00:00',1),(38,12.00,'eeee',1,1,1,'2014-04-01 00:00:00',1),(39,12.00,'eee',1,1,1,'2014-04-01 00:00:00',1),(40,12.00,'eeee',1,1,1,'2014-04-01 00:00:00',1),(41,123.00,'por conepc',1,1,1,'2014-04-01 00:00:00',1),(42,130.00,'asdasd',1,1,1,'2014-04-01 00:00:00',1),(43,145.00,'asdasd',1,1,1,'2014-04-01 00:00:00',1),(44,156.00,'segunda prueba',1,1,1,'2014-04-01 00:00:00',1),(45,156.00,'sadsad',1,1,1,'2014-04-01 00:00:00',1),(46,123.00,'por  pagos',1,1,1,'2014-04-01 00:00:00',1),(47,123.00,'wees',1,1,1,'2014-04-01 00:00:00',1),(48,45.00,'efg',1,1,1,'2014-04-01 00:00:00',1),(49,3455.00,'eff',1,1,1,'2014-04-01 00:00:00',1),(50,234.00,'ed',1,1,1,'2014-04-01 00:00:00',1),(51,56.00,'wcc',1,1,1,'2014-04-01 00:00:00',1);
/*!40000 ALTER TABLE `ven_movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ven_oferta_all`
--

DROP TABLE IF EXISTS `ven_oferta_all`;
/*!50001 DROP VIEW IF EXISTS `ven_oferta_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_oferta_all` (
  `nOferta_id` tinyint NOT NULL,
  `cOfertaDesc` tinyint NOT NULL,
  `dOfertaFecVigente` tinyint NOT NULL,
  `dOfertaFecVencto` tinyint NOT NULL,
  `nOfertaPorc` tinyint NOT NULL,
  `estado` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ven_personal`
--

DROP TABLE IF EXISTS `ven_personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_personal` (
  `nPersonal_id` int(11) NOT NULL AUTO_INCREMENT,
  `nCargo_id` int(11) NOT NULL,
  `cPersonalDNI` char(8) NOT NULL DEFAULT '0000000',
  `cPersonalNom` varchar(50) NOT NULL DEFAULT '',
  `cPersonalApe` varchar(50) NOT NULL DEFAULT '',
  `cPersonalTelf` varchar(12) NOT NULL DEFAULT '000000000000',
  `cPersonalEmail` varchar(100) NOT NULL,
  `dPersonalFec` datetime NOT NULL,
  `cPersonalSexo` char(1) NOT NULL,
  `cPersonalEst` char(1) NOT NULL DEFAULT '1',
  `cPersonalEdad` char(3) NOT NULL DEFAULT '000',
  PRIMARY KEY (`nPersonal_id`),
  KEY `PersonalFKCargo_idx` (`nCargo_id`),
  CONSTRAINT `PersonalFKCargo` FOREIGN KEY (`nCargo_id`) REFERENCES `ven_cargo` (`nCargo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_personal`
--

LOCK TABLES `ven_personal` WRITE;
/*!40000 ALTER TABLE `ven_personal` DISABLE KEYS */;
INSERT INTO `ven_personal` VALUES (1,1,'1234567','Richard Buddy','Oruna Rodriguez','280833','richard@gmail.com','1990-02-01 00:00:00','M','1','25'),(2,1,'77228899','Cinthya ','Avila Zauna','280833','cinthya@gmail.com','1991-07-18 00:00:00','F','1','22'),(3,5,'88991012','Carlos Manuel','Zarate Florian','280833','carloszarate@hotmail.com','1989-01-31 00:00:00','M','1','24'),(4,5,'88991012','Carlos Manuel','Zarate Florian','280833','carloszarate@hotmail.com','1989-01-31 00:00:00','M','1','24'),(5,1,'12345678','Jonathan','Boulangger Montoya','280833','jonathan@gmail.com','1986-01-28 00:00:00','M','1','28'),(6,1,'12345678','Jonathan','Boulangger Montoya','280833','jonathan@gmail.com','1986-01-28 00:00:00','M','1','28'),(7,4,'12345567','Kelly ','Calderon Serna','280833','kelca@gmail.com','1990-02-01 00:00:00','F','1','28'),(8,2,'12345678','Claudia','Valdivieso','222222','claudia@gmail.com','1990-01-30 00:00:00','F','1','23'),(9,2,'12345678','Sammy ','Aponte Diaz','222222','sammyaponte@gmail.com','1991-03-12 00:00:00','M','1','21'),(10,2,'73991914','Joseph ','Alcantara Perez','270834','josephalcantaraperez@gmail.com','1994-01-18 00:00:00','M','1','20'),(11,1,'12345678','Alex','Arivasplata','234567','alex@hotmail.com','1970-01-27 00:00:00','M','1','23'),(12,3,'55555566','Maria de los Angeles','Fernandez Mendez','991010289','maria@gmail.com','1979-06-26 00:00:00','F','1','45'),(13,2,'11111122','Dannae ','Ortiz','678956','danna17e@hotmail.com','1990-01-30 00:00:00','F','1','23'),(14,5,'12456789','Bret','Aponte Diaz','456578','brek_aponte@gmail.com','1994-02-01 00:00:00','M','1','20'),(15,2,'34567898','Rosita','Quinones','567890','rosita@gmail.com','1980-01-29 00:00:00','F','1','32'),(16,4,'76543245','Alexandras','Nunes','457656','ale_xandra@gmail.com','1986-04-04 00:00:00','F','1','28'),(17,9,'23345667','Juan','Perez','234567','juan@gmail.com','2012-01-31 00:00:00','M','1','12'),(18,10,'56789807','Juana','Pereira','234567','juana@gmail.com','1990-01-31 00:00:00','F','1','34'),(19,1,'12334456','Nombre','normal','235476','normal@gmail.com','2008-12-29 00:00:00','M','1','12'),(20,9,'73991914','Marlon','Perez Gonzales','280833','marlon@gmail.com','1981-02-26 00:00:00','M','1','26'),(21,40,'12345678','TrabajadorUno','Trabajadoruno','280833','prueba@gmail.com','1980-01-29 00:00:00','M','1','30'),(22,19,'12345678','Pruebauno','pruebauno','280833','prueba@gmail.com','1980-01-30 00:00:00','F','1','12'),(23,18,'12345678','pruebados','pruebados','280833','prueba@gmail.com','1980-01-31 00:00:00','M','1','12'),(24,13,'12345678','pruebatres','pruebados','280833','joseph_94_16@hotmail.com','1980-01-28 00:00:00','M','1','30'),(25,30,'12345678','pruebacuatro','pruebados','280833','prueba@gmail.com','1980-02-02 00:00:00','M','1','30'),(26,7,'12345678','pruebacinco','pruebacinco','280833','prueba@gmail.com','1980-02-08 00:00:00','F','1','30'),(27,5,'12345678','pruebaseis','pruebaseis','280833','prueba@gmail.com','1980-02-14 00:00:00','F','1','32'),(28,5,'12345678','pruebasiete','pruebasiete','280833','prueba@gmail.com','1980-02-16 00:00:00','F','1','30'),(29,40,'12345678','pruebaocho','pruebaocho','280833','joseph_94_16@hotmail.com','1980-02-13 00:00:00','F','1','32'),(30,29,'12345678','pruebanueve','pruebanueve','280833','prueba@gmail.com','1980-02-14 00:00:00','F','1','32'),(31,39,'12345678','pruebradiez','pruebadiez','280833','prueba@gmail.com','1980-02-07 00:00:00','M','1','32');
/*!40000 ALTER TABLE `ven_personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ven_personal_all`
--

DROP TABLE IF EXISTS `ven_personal_all`;
/*!50001 DROP VIEW IF EXISTS `ven_personal_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_personal_all` (
  `nPersonal_id` tinyint NOT NULL,
  `nCargo_id` tinyint NOT NULL,
  `nCargoDesc` tinyint NOT NULL,
  `cPersonalDNI` tinyint NOT NULL,
  `cPersonalNom` tinyint NOT NULL,
  `cPersonalApe` tinyint NOT NULL,
  `cPersonalTelf` tinyint NOT NULL,
  `cPersonalEmail` tinyint NOT NULL,
  `dPersonalFec` tinyint NOT NULL,
  `cPersonalSexo` tinyint NOT NULL,
  `cPersonalEdad` tinyint NOT NULL,
  `cPersonalEst` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_producto_all`
--

DROP TABLE IF EXISTS `ven_producto_all`;
/*!50001 DROP VIEW IF EXISTS `ven_producto_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_producto_all` (
  `nProducto_id` tinyint NOT NULL,
  `cProductoDesc` tinyint NOT NULL,
  `nProductoPVenta` tinyint NOT NULL,
  `nProductoUnidMedida` tinyint NOT NULL,
  `nProductoTipo` tinyint NOT NULL,
  `nProductoPCosto` tinyint NOT NULL,
  `cProductoCodBarra` tinyint NOT NULL,
  `cProductoImage` tinyint NOT NULL,
  `nProductoStockMin` tinyint NOT NULL,
  `nProductoStockMax` tinyint NOT NULL,
  `nProductoStock` tinyint NOT NULL,
  `cProductoEst` tinyint NOT NULL,
  `nProductoPorcUti` tinyint NOT NULL,
  `nProductoUtiBruta` tinyint NOT NULL,
  `nMarca_id` tinyint NOT NULL,
  `cMarcaDesc` tinyint NOT NULL,
  `nCategoria_id` tinyint NOT NULL,
  `cCategoriaNom` tinyint NOT NULL,
  `cConstanteDesc` tinyint NOT NULL,
  `nLocal_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_productosoferta`
--

DROP TABLE IF EXISTS `ven_productosoferta`;
/*!50001 DROP VIEW IF EXISTS `ven_productosoferta`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_productosoferta` (
  `nProducto_id` tinyint NOT NULL,
  `producto` tinyint NOT NULL,
  `precio` tinyint NOT NULL,
  `cProductoCodBarra` tinyint NOT NULL,
  `cMarcaDesc` tinyint NOT NULL,
  `cCategoriaNom` tinyint NOT NULL,
  `cConstanteDesc` tinyint NOT NULL,
  `nOfertaProducto_id` tinyint NOT NULL,
  `nOferta_id` tinyint NOT NULL,
  `cOfertaProductoEst` tinyint NOT NULL,
  `nLocal_id` tinyint NOT NULL,
  `band` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_productosoferta_v2`
--

DROP TABLE IF EXISTS `ven_productosoferta_v2`;
/*!50001 DROP VIEW IF EXISTS `ven_productosoferta_v2`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_productosoferta_v2` (
  `nProducto_id` tinyint NOT NULL,
  `producto` tinyint NOT NULL,
  `precio` tinyint NOT NULL,
  `nProductoUnidMedida` tinyint NOT NULL,
  `cProductoCodBarra` tinyint NOT NULL,
  `cMarcaDesc` tinyint NOT NULL,
  `cCategoriaNom` tinyint NOT NULL,
  `cConstanteDesc` tinyint NOT NULL,
  `nOfertaProducto_id` tinyint NOT NULL,
  `nOferta_id` tinyint NOT NULL,
  `cOfertaProductoEst` tinyint NOT NULL,
  `nLocal_id` tinyint NOT NULL,
  `band` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_productossinoferta`
--

DROP TABLE IF EXISTS `ven_productossinoferta`;
/*!50001 DROP VIEW IF EXISTS `ven_productossinoferta`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_productossinoferta` (
  `nProducto_id` tinyint NOT NULL,
  `producto` tinyint NOT NULL,
  `precio` tinyint NOT NULL,
  `cProductoCodBarra` tinyint NOT NULL,
  `cMarcaDesc` tinyint NOT NULL,
  `cCategoriaNom` tinyint NOT NULL,
  `cConstanteDesc` tinyint NOT NULL,
  `nLocal_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_productossinoferta_v2`
--

DROP TABLE IF EXISTS `ven_productossinoferta_v2`;
/*!50001 DROP VIEW IF EXISTS `ven_productossinoferta_v2`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_productossinoferta_v2` (
  `nProducto_id` tinyint NOT NULL,
  `producto` tinyint NOT NULL,
  `precio` tinyint NOT NULL,
  `nProductoUnidMedida` tinyint NOT NULL,
  `cProductoCodBarra` tinyint NOT NULL,
  `cMarcaDesc` tinyint NOT NULL,
  `cCategoriaNom` tinyint NOT NULL,
  `cConstanteDesc` tinyint NOT NULL,
  `nLocal_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_productosventa`
--

DROP TABLE IF EXISTS `ven_productosventa`;
/*!50001 DROP VIEW IF EXISTS `ven_productosventa`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_productosventa` (
  `nProducto_id` tinyint NOT NULL,
  `cProductoDesc` tinyint NOT NULL,
  `nProductoMarca` tinyint NOT NULL,
  `cMarcaDesc` tinyint NOT NULL,
  `cProductoCodBarra` tinyint NOT NULL,
  `nCategoria_id` tinyint NOT NULL,
  `cCategoriaNom` tinyint NOT NULL,
  `nProductoStock` tinyint NOT NULL,
  `nProductoPCosto` tinyint NOT NULL,
  `nProductoPVenta` tinyint NOT NULL,
  `nProductoUnidMedida` tinyint NOT NULL,
  `nProductoTipo` tinyint NOT NULL,
  `PrecioCredito_Dscto` tinyint NOT NULL,
  `PrecioContado_Dscto` tinyint NOT NULL,
  `nOfertaProductoPorc` tinyint NOT NULL,
  `cDetVentaDesc` tinyint NOT NULL,
  `nLocal_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ven_tarjcredito`
--

DROP TABLE IF EXISTS `ven_tarjcredito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_tarjcredito` (
  `nTarjCredito_id` int(11) NOT NULL AUTO_INCREMENT,
  `nTarjCreditoMontLinea` decimal(9,2) NOT NULL,
  `nTarjCreditoNroInt` varchar(500) NOT NULL,
  `nTarjCreditoConsumo` decimal(9,2) NOT NULL,
  `cTarjCreditoEst` char(1) NOT NULL DEFAULT '1',
  `nCliente_id` int(11) NOT NULL,
  `nTarjCreditoTipo` int(11) NOT NULL,
  `cTarjCreditoDesc` varchar(500) NOT NULL DEFAULT '' COMMENT 'Descripcion de la tarjeta',
  `dTarjCreditoFecReg` datetime NOT NULL,
  `dTarjCreditoFecVenc` datetime NOT NULL,
  `nTarjCreditoNroExt` varchar(500) NOT NULL,
  PRIMARY KEY (`nTarjCredito_id`),
  KEY `TarjCreditoFKCliente_idx` (`nCliente_id`),
  CONSTRAINT `fk_Ven_TarjCredito_Ven_Cliente1` FOREIGN KEY (`nCliente_id`) REFERENCES `ven_cliente` (`nCliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_tarjcredito`
--

LOCK TABLES `ven_tarjcredito` WRITE;
/*!40000 ALTER TABLE `ven_tarjcredito` DISABLE KEYS */;
INSERT INTO `ven_tarjcredito` VALUES (1,1000.00,'0',0.00,'1',1,0,'Asignacion Credito','0000-00-00 00:00:00','0000-00-00 00:00:00','0'),(2,1212222.00,'0',0.00,'1',1,0,'Asignacion Credito','0000-00-00 00:00:00','0000-00-00 00:00:00','0'),(3,123.00,'0',0.00,'1',1,0,'Asignacion Credito','0000-00-00 00:00:00','0000-00-00 00:00:00','0'),(4,123.00,'0',0.00,'1',1,0,'Asignacion Credito','0000-00-00 00:00:00','0000-00-00 00:00:00','0'),(5,123455.00,'0',0.00,'1',2,0,'Asignacion Credito','0000-00-00 00:00:00','0000-00-00 00:00:00','0');
/*!40000 ALTER TABLE `ven_tarjcredito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ven_tipoigv`
--

DROP TABLE IF EXISTS `ven_tipoigv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_tipoigv` (
  `nTipoIGV` int(11) NOT NULL AUTO_INCREMENT,
  `cTipoIGV` varchar(100) NOT NULL,
  `nTipoIGVProc` decimal(9,1) NOT NULL COMMENT 'Procentaje',
  `dTipoIGVFecReg` datetime NOT NULL,
  `cTipoIGVEst` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nTipoIGV`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_tipoigv`
--

LOCK TABLES `ven_tipoigv` WRITE;
/*!40000 ALTER TABLE `ven_tipoigv` DISABLE KEYS */;
INSERT INTO `ven_tipoigv` VALUES (1,'18',1222.0,'2014-03-20 18:14:21','1'),(2,'18',7.0,'2014-03-20 17:35:45','1'),(3,'12',5.0,'2014-03-20 17:36:58','1'),(4,'tipo igv uno',12.0,'2014-03-25 16:57:30','1');
/*!40000 ALTER TABLE `ven_tipoigv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ven_tipoigv_all`
--

DROP TABLE IF EXISTS `ven_tipoigv_all`;
/*!50001 DROP VIEW IF EXISTS `ven_tipoigv_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_tipoigv_all` (
  `nTipoIGV` tinyint NOT NULL,
  `cTipoIGV` tinyint NOT NULL,
  `nTipoIGVProc` tinyint NOT NULL,
  `dTipoIGVFecReg` tinyint NOT NULL,
  `cTipoIGVEst` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_tipomodena_all`
--

DROP TABLE IF EXISTS `ven_tipomodena_all`;
/*!50001 DROP VIEW IF EXISTS `ven_tipomodena_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_tipomodena_all` (
  `nTipoMoneda` tinyint NOT NULL,
  `cTipoMonedaDesc` tinyint NOT NULL,
  `nTipoMonedaMont` tinyint NOT NULL,
  `cTipoMonedaEst` tinyint NOT NULL,
  `estado` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ven_tipomoneda`
--

DROP TABLE IF EXISTS `ven_tipomoneda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_tipomoneda` (
  `nTipoMoneda` int(11) NOT NULL AUTO_INCREMENT,
  `cTipoMonedaDesc` varchar(30) NOT NULL DEFAULT '',
  `nTipoMonedaMont` decimal(9,2) NOT NULL DEFAULT '1.00',
  `cTipoMonedaEst` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`nTipoMoneda`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_tipomoneda`
--

LOCK TABLES `ven_tipomoneda` WRITE;
/*!40000 ALTER TABLE `ven_tipomoneda` DISABLE KEYS */;
INSERT INTO `ven_tipomoneda` VALUES (1,'PEN',1.00,'1'),(2,'Dolar',2.75,'1');
/*!40000 ALTER TABLE `ven_tipomoneda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ven_trabajadores_activos`
--

DROP TABLE IF EXISTS `ven_trabajadores_activos`;
/*!50001 DROP VIEW IF EXISTS `ven_trabajadores_activos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_trabajadores_activos` (
  `nPersonal_id` tinyint NOT NULL,
  `cPersonalNom` tinyint NOT NULL,
  `cPersonalApe` tinyint NOT NULL,
  `cPersonalDNI` tinyint NOT NULL,
  `cPersonalTelf` tinyint NOT NULL,
  `id_local` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_trabajadores_no_user`
--

DROP TABLE IF EXISTS `ven_trabajadores_no_user`;
/*!50001 DROP VIEW IF EXISTS `ven_trabajadores_no_user`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_trabajadores_no_user` (
  `nPersonal_id` tinyint NOT NULL,
  `cPersonalNom` tinyint NOT NULL,
  `cPersonalApe` tinyint NOT NULL,
  `cPersonalDNI` tinyint NOT NULL,
  `cPersonalTelf` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_trabajadores_sinzona`
--

DROP TABLE IF EXISTS `ven_trabajadores_sinzona`;
/*!50001 DROP VIEW IF EXISTS `ven_trabajadores_sinzona`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_trabajadores_sinzona` (
  `nPersonal_id` tinyint NOT NULL,
  `nCargo_id` tinyint NOT NULL,
  `cPersonalDNI` tinyint NOT NULL,
  `cPersonalNom` tinyint NOT NULL,
  `cPersonalApe` tinyint NOT NULL,
  `cPersonalTelf` tinyint NOT NULL,
  `cPersonalEmail` tinyint NOT NULL,
  `dPersonalFec` tinyint NOT NULL,
  `cPersonalSexo` tinyint NOT NULL,
  `cPersonalEst` tinyint NOT NULL,
  `cPersonalEdad` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ven_transaccion`
--

DROP TABLE IF EXISTS `ven_transaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_transaccion` (
  `nPersonal_id` int(11) NOT NULL,
  `nVenta_id` int(11) NOT NULL,
  `cTransaccionDesc` varchar(200) NOT NULL DEFAULT '',
  `nTransaccionMont` decimal(9,2) NOT NULL,
  `dTransaccionFecReg` datetime NOT NULL,
  `nTransaccionTipPag` int(11) NOT NULL,
  `nTransaccion_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`nTransaccion_id`),
  KEY `TransaccionFKPersonal_idx` (`nPersonal_id`),
  KEY `TransaccionFKVenta_idx` (`nVenta_id`),
  CONSTRAINT `TransaccionFKPersonal` FOREIGN KEY (`nPersonal_id`) REFERENCES `ven_personal` (`nPersonal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `TransaccionFKVenta` FOREIGN KEY (`nVenta_id`) REFERENCES `ven_venta` (`nVenta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_transaccion`
--

LOCK TABLES `ven_transaccion` WRITE;
/*!40000 ALTER TABLE `ven_transaccion` DISABLE KEYS */;
INSERT INTO `ven_transaccion` VALUES (1,1,'Venta al Contado',786.84,'2014-03-12 00:00:00',1,1),(1,7,'Venta al Contado',34.21,'2014-03-17 00:00:00',1,2),(1,8,'Venta Separada',10.00,'2014-03-17 00:00:00',3,3),(1,9,'Venta al Contado',22.50,'2014-03-18 00:00:00',1,4),(1,10,'Venta Credito',0.00,'2014-03-20 00:00:00',2,5),(1,11,'Venta al Contado',220.38,'2014-03-26 00:00:00',1,6),(1,12,'Venta Credito',12.00,'2014-03-26 00:00:00',2,7),(1,13,'Venta al Contado',12.69,'2014-03-26 00:00:00',1,8),(1,14,'Venta Credito',12.00,'2014-03-26 00:00:00',2,9),(1,15,'Venta al Contado',63.32,'2014-03-26 00:00:00',1,10),(1,16,'Venta al Contado',25.38,'2014-03-26 00:00:00',1,11),(1,17,'Venta al Contado',25.38,'2014-03-26 00:00:00',1,12),(1,12,'Anulacion de Ventas',-12.00,'2014-03-26 00:00:00',1,13),(1,18,'Venta al Contado',93.73,'2014-03-26 00:00:00',1,14),(1,11,'Anulacion de Ventas',-220.38,'2014-03-26 00:00:00',1,15),(1,19,'Venta al Contado',23.66,'2014-03-26 00:00:00',1,16),(1,13,'Anulacion de Ventas',-12.69,'2014-03-26 00:00:00',1,17),(1,1,'Anulacion de Ventas',-786.84,'2014-03-27 00:00:00',1,18),(1,20,'Venta al Contado',19752.00,'2014-04-01 00:00:00',1,19),(1,21,'Venta al Contado',296280.03,'2014-04-01 00:00:00',1,20);
/*!40000 ALTER TABLE `ven_transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ven_venta`
--

DROP TABLE IF EXISTS `ven_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_venta` (
  `nVenta_id` int(11) NOT NULL AUTO_INCREMENT,
  `nCliente_id` int(11) NOT NULL,
  `cVentaFecReg` datetime NOT NULL,
  `nTipoMoneda` int(11) NOT NULL,
  `nVentaSubTotal` decimal(9,2) NOT NULL DEFAULT '0.00',
  `cVentaEst` char(1) NOT NULL DEFAULT '2',
  `nVentaDscto` decimal(9,1) NOT NULL DEFAULT '0.0',
  `nVentaTipPag` int(11) NOT NULL COMMENT 'Tipo Pago : Contrado - Credito',
  `cVentaObsv` varchar(500) NOT NULL COMMENT 'ObervaciÃ³n respecto a la venta.',
  `nVentaTotApag` decimal(9,2) NOT NULL DEFAULT '0.00',
  `nVentaTotAmt` decimal(9,2) NOT NULL COMMENT 'Total Amortizado',
  `nVentaSaldo` decimal(9,2) NOT NULL,
  `nLocal_id` int(11) NOT NULL,
  `nTipoIGV` int(11) NOT NULL,
  PRIMARY KEY (`nVenta_id`),
  KEY `VentaFKCliente_idx` (`nCliente_id`),
  KEY `VentaFKTipoMoneda_idx` (`nTipoMoneda`),
  KEY `VentaFKLocal_idx` (`nLocal_id`),
  KEY `VentaFKTipoIGV_idx` (`nTipoIGV`),
  CONSTRAINT `VentaFKCliente` FOREIGN KEY (`nCliente_id`) REFERENCES `ven_cliente` (`nCliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `VentaFKLocal` FOREIGN KEY (`nLocal_id`) REFERENCES `local` (`nLocal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `VentaFKTipoIGV` FOREIGN KEY (`nTipoIGV`) REFERENCES `ven_tipoigv` (`nTipoIGV`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `VentaFKTipoMoneda` FOREIGN KEY (`nTipoMoneda`) REFERENCES `ven_tipomoneda` (`nTipoMoneda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_venta`
--

LOCK TABLES `ven_venta` WRITE;
/*!40000 ALTER TABLE `ven_venta` DISABLE KEYS */;
INSERT INTO `ven_venta` VALUES (1,1,'2014-03-12 00:00:00',1,666.81,'0',0.0,1,'',786.84,786.84,0.00,1,1),(7,1,'2014-03-17 00:00:00',1,28.99,'2',0.0,1,'',34.21,34.21,0.00,1,1),(8,1,'2014-03-17 00:00:00',1,19.07,'3',0.0,3,'',22.50,10.00,12.50,1,1),(9,1,'2014-03-18 00:00:00',1,19.07,'2',0.0,1,'',22.50,22.50,0.00,1,1),(10,1,'2014-03-20 00:00:00',1,3.17,'1',0.0,2,'',41.91,0.00,41.91,1,1),(11,1,'2014-03-26 00:00:00',2,16.67,'0',0.0,1,'OK',220.38,220.38,0.00,1,1),(12,1,'2014-03-26 00:00:00',1,39.18,'0',0.0,2,'OK',517.96,12.00,505.96,1,1),(13,1,'2014-03-26 00:00:00',1,0.96,'0',0.0,1,'ok',12.69,12.69,0.00,1,1),(14,1,'2014-03-26 00:00:00',1,7.10,'1',0.0,2,'ok',93.86,12.00,81.86,1,1),(15,2,'2014-03-26 00:00:00',1,4.79,'2',0.0,1,'OK',63.32,63.32,0.00,1,1),(16,2,'2014-03-26 00:00:00',1,1.92,'2',0.0,1,'ok',25.38,25.38,0.00,1,1),(17,1,'2014-03-26 00:00:00',1,1.92,'2',0.0,1,'OK',25.38,25.38,0.00,1,1),(18,2,'2014-03-26 00:00:00',1,7.09,'2',0.0,1,'OK',93.73,93.73,0.00,1,1),(19,1,'2014-03-26 00:00:00',1,1.79,'2',0.0,1,'OK',23.66,23.66,0.00,1,1),(20,1,'2014-04-01 00:00:00',1,1494.10,'2',0.0,1,'todo bien',19752.00,19752.00,0.00,1,1),(21,1,'2014-04-01 00:00:00',1,22411.50,'2',0.0,1,'',296280.03,296280.03,0.00,1,1);
/*!40000 ALTER TABLE `ven_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ven_venta_all`
--

DROP TABLE IF EXISTS `ven_venta_all`;
/*!50001 DROP VIEW IF EXISTS `ven_venta_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_venta_all` (
  `cVentaFecReg` tinyint NOT NULL,
  `cVentaFecReg_temp` tinyint NOT NULL,
  `nCliente_id` tinyint NOT NULL,
  `cClienteNom` tinyint NOT NULL,
  `cPersonalNom` tinyint NOT NULL,
  `nPersonal_id` tinyint NOT NULL,
  `nVentaTipPag` tinyint NOT NULL,
  `VentaTotal` tinyint NOT NULL,
  `cVentaEst` tinyint NOT NULL,
  `nVenta_id` tinyint NOT NULL,
  `tipo_pago` tinyint NOT NULL,
  `cant_prod` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ven_zona`
--

DROP TABLE IF EXISTS `ven_zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_zona` (
  `nZona_id` int(11) NOT NULL AUTO_INCREMENT,
  `cZonaDesc` varchar(100) NOT NULL DEFAULT '',
  `nZonaEst` int(11) NOT NULL DEFAULT '1',
  `nUbigeo_id` int(11) NOT NULL,
  PRIMARY KEY (`nZona_id`),
  KEY `ZonaFKUbigeo_idx` (`nUbigeo_id`),
  CONSTRAINT `ZonaFKUbigeo` FOREIGN KEY (`nUbigeo_id`) REFERENCES `ubigeo` (`nUbigeo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_zona`
--

LOCK TABLES `ven_zona` WRITE;
/*!40000 ALTER TABLE `ven_zona` DISABLE KEYS */;
INSERT INTO `ven_zona` VALUES (1,'Zona E',1,916),(2,'Zona B',1,1354),(3,'Zona C',1,1356),(4,'Zona D',1,305),(5,'Zona q',1,590),(6,'Zona W',1,589),(7,'ZONA E',1,589),(8,'ZONA R',1,589),(9,'ZONA T',1,589),(10,'ZONA Y',1,589),(11,'ZONA U',1,665),(12,'ZONA U',1,1224),(13,'ZONA I',1,1376),(14,'ZONA O',1,908),(15,'ZONA P',1,1670),(16,'ZONA A',1,1517),(17,'ZONA S',1,1029),(18,'ZONA S',1,1222),(19,'ZONA D',1,1457),(20,'ZONA F',1,934),(21,'ZONA G',1,1704),(22,'ZONA G',1,859),(23,'ZONA H',1,1822),(24,'ZONA K',1,1219),(25,'ZONA L',1,1191),(26,'ZONA Z',1,1715),(27,'ZONA X',1,1535),(28,'Zona 1',1,242),(29,'Zona 2',1,589),(30,'Zona 3',1,589),(31,'Zona 4',1,589),(32,'Zona 5',1,589),(33,'Zona 6',1,589),(34,'Zona 7',1,589),(35,'Zona 8',1,589),(36,'Zona 9',1,589),(37,'Zona 10',1,589),(38,'Zona 11',1,589),(39,'Zona 12',1,589),(40,'Zona 12',1,589),(41,'Zona 13',1,589),(42,'Zona 14',1,589),(43,'Zona 15',1,589),(44,'Zona 16',1,589),(45,'ZOna 17',1,589),(46,'Zona 18',1,589),(47,'Zona 19',1,589),(48,'Zona 20',1,589),(49,'Zona 21',1,589),(50,'Zona 22',1,589);
/*!40000 ALTER TABLE `ven_zona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ven_zona_activo_all`
--

DROP TABLE IF EXISTS `ven_zona_activo_all`;
/*!50001 DROP VIEW IF EXISTS `ven_zona_activo_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_zona_activo_all` (
  `nZona_id` tinyint NOT NULL,
  `cZonaDesc` tinyint NOT NULL,
  `nZonaEst` tinyint NOT NULL,
  `des_ubigeo` tinyint NOT NULL,
  `estado` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ven_zona_all`
--

DROP TABLE IF EXISTS `ven_zona_all`;
/*!50001 DROP VIEW IF EXISTS `ven_zona_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_zona_all` (
  `nZona_id` tinyint NOT NULL,
  `cZonaDesc` tinyint NOT NULL,
  `nZonaEst` tinyint NOT NULL,
  `nUbigeo_id` tinyint NOT NULL,
  `des_ubigeo` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `ven_zonapersonal`
--

DROP TABLE IF EXISTS `ven_zonapersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ven_zonapersonal` (
  `nZona_id` int(11) NOT NULL,
  `nPersonal_id` int(11) NOT NULL,
  `nZonaPersonal_id` int(11) NOT NULL AUTO_INCREMENT,
  `nZonapersonalEst` int(11) NOT NULL,
  PRIMARY KEY (`nZonaPersonal_id`),
  KEY `ZonaPersonalFKPersonal_idx` (`nPersonal_id`),
  KEY `ZonaPersonalFKZona_idx` (`nZona_id`),
  CONSTRAINT `ZonaPersonalFKPersonal` FOREIGN KEY (`nPersonal_id`) REFERENCES `ven_personal` (`nPersonal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ZonaPersonalFKZona` FOREIGN KEY (`nZona_id`) REFERENCES `ven_zona` (`nZona_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ven_zonapersonal`
--

LOCK TABLES `ven_zonapersonal` WRITE;
/*!40000 ALTER TABLE `ven_zonapersonal` DISABLE KEYS */;
INSERT INTO `ven_zonapersonal` VALUES (4,2,1,0),(1,1,2,1),(2,3,3,0),(4,11,6,1),(2,4,7,1),(2,16,8,1),(3,14,9,1),(4,3,10,1),(19,2,11,1),(4,18,12,1),(22,20,13,1),(20,18,14,1),(1,9,15,1),(37,21,16,1),(38,31,17,1);
/*!40000 ALTER TABLE `ven_zonapersonal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `ven_zonapersonal_all`
--

DROP TABLE IF EXISTS `ven_zonapersonal_all`;
/*!50001 DROP VIEW IF EXISTS `ven_zonapersonal_all`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `ven_zonapersonal_all` (
  `nZonaPersonal_id` tinyint NOT NULL,
  `cZonaDesc` tinyint NOT NULL,
  `nZona_id` tinyint NOT NULL,
  `persona` tinyint NOT NULL,
  `des_ubigeo` tinyint NOT NULL,
  `nZonapersonalEst` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'dicarsbd'
--

--
-- Dumping routines for database 'dicarsbd'
--
/*!50003 DROP FUNCTION IF EXISTS `fun_generar_codigoBarra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` FUNCTION `fun_generar_codigoBarra`() RETURNS char(12) CHARSET latin1
BEGIN

	Declare result char(12); 
	Declare valor char(12); 

SET @valor = (select CAST((RAND() * 1000000000000) AS UNSIGNED));



	WHILE LENGTH(@valor) < 12 DO
		set @valor = (select CAST((RAND() * 1000000000000) AS UNSIGNED));
	END WHILE;

	WHILE (select COUNT(*) from producto p where p.cProductoCodBarra = @valor) > 0 DO
		set @valor = (select CAST((RAND() * 1000000000000) AS UNSIGNED));
		WHILE LENGTH(@valor) < 12 DO
			set @valor = (select CAST((RAND() * 1000000000000) AS UNSIGNED));
		END WHILE;
	END WHILE;

	SET @result=@valor;
	RETURN @result;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `fun_generar_numero_ingproducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` FUNCTION `fun_generar_numero_ingproducto`() RETURNS char(8) CHARSET latin1
BEGIN
	
	Declare result char(8);
	
	set @result = (select 
						(case max(ifnull(cIngProdNro,0))
							when
								'99999999' then right(concat((ifnull(cIngProdNro,0) + 2)),8)
							else right(concat('00000000',(ifnull(max(cIngProdNro),0) + 1)),8)
						end)
					from
						log_ingprod);

	RETURN @result;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `fun_generar_numero_ordcom` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` FUNCTION `fun_generar_numero_ordcom`() RETURNS char(8) CHARSET latin1
BEGIN

	Declare result char(8);
	
	set @result = (select 
						(case max(ifnull(cOrdComNro,0))
							when
								'99999999' then right(concat((ifnull(cOrdComNro,0) + 2)),8)
							else right(concat('00000000',(ifnull(max(cOrdComNro),0) + 1)),8)
						end)
					from
						log_ordcom);

	RETURN @result;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `fun_generar_numero_salproducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` FUNCTION `fun_generar_numero_salproducto`() RETURNS char(8) CHARSET latin1
BEGIN
	
	Declare result char(8);
	
	set @result = (select 
						(case max(ifnull(cSalProdNro,0))
							when
								'99999999' then right(concat((ifnull(cSalProdNro,0) + 2)),8)
							else right(concat('00000000',(ifnull(max(cSalProdNro),0) + 1)),8)
						end)
					from
						log_salprod);

	RETURN @result;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `fun_generar_serie_ingproducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` FUNCTION `fun_generar_serie_ingproducto`() RETURNS char(4) CHARSET latin1
BEGIN
	
	Declare result char(4); 

	set @result = ( select (case ifnull(max(cIngProdSerie),0)
		when
			'99999999'
		then
			convert( right(concat('0000',
						(ifnull(max(cIngProdSerie),
								0) + 1)),
				4) using latin1)
		when 0 then convert( right(concat('0000', 1), 4) using latin1)
		else cIngProdSerie
	end)
	from
		log_ingprod);

	RETURN @result;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `fun_generar_serie_ordcom` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` FUNCTION `fun_generar_serie_ordcom`() RETURNS char(4) CHARSET latin1
BEGIN
Declare result char(4); 

	set @result = ( select (case ifnull(max(cOrdComSerie),0)
		when
			'99999999'
		then
			convert( right(concat('0000',
						(ifnull(max(cOrdComSerie),
								0) + 1)),
				4) using latin1)
		when 0 then convert( right(concat('0000', 1), 4) using latin1)
		else cOrdComSerie
	end)
	from
		log_ordcom);

	RETURN @result;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `fun_generar_serie_salproducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` FUNCTION `fun_generar_serie_salproducto`() RETURNS char(4) CHARSET latin1
BEGIN
	
	Declare result char(4);

	set @result = ( select (case ifnull(max(cSalProdSerie),0)
		when
			'99999999'
		then
			convert( right(concat('0000',
						(ifnull(max(cSalProdSerie),
								0) + 1)),
				4) using latin1)
		when 0 then convert( right(concat('0000', 1), 4) using latin1)
		else cSalProdSerie
	end)
	from
		log_salprod);

	RETURN @result;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spF_kardex_SaldoInicial` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spF_kardex_SaldoInicial`(
IN anio int,
IN mes int,
IN idlocal int)
BEGIN
select lk.nKardexAnio as Anio,
	   (select c.cConstanteDesc 
		from constante c 
		where c.nConstanteClase=8 and c.cConstanteValor = lk.nKardexMes) as Mes,
	    IFNULL(CONCAT(p.cProductoDesc,' ',vm.cMarcaDesc,' ',p.cProductoTalla,' - ',(select c.cConstanteDesc 
		from constante c 
		where c.nConstanteClase=5 and c.cConstanteValor = p.nProductoTipo)),'') as Producto,
	   SUM(lk.nKardexCant) as Stock,
	   CAST(AVG(lk.nKardexPrecUnt) AS decimal(9,2)) as PrecUnit,
	   SUM(lk.nKardexTot) as PrecTotal
from log_kardex lk 
inner join local_producto lp on  lk.nProducto_id=lp.nProducto_id
join producto p on p.nProducto_id = lp.nProducto_id
join ven_marca vm on p.nProductoMarca = vm.nMarca_id
where lk.nKardexAnio=anio and lk.nKardexMes=mes and lk.nKardexTipoIng=1 and lk.nLocal_id=idlocal
group by p.nProducto_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spF_kardex_StockActual` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spF_kardex_StockActual`(
IN anio int,
IN mes int,
IN idlocal int)
BEGIN
	SELECT  k.nKardexAnio as Anio,
			(select c.cConstanteDesc 
			from constante c 
			where c.nConstanteClase=8 and c.cConstanteValor = k.nKardexMes) as Mes,
			IFNULL(CONCAT(p.cProductoDesc,' ',vm.cMarcaDesc,' ',p.cProductoTalla,' - ',(select c.cConstanteDesc 
			from constante c 
			where c.nConstanteClase=5 and c.cConstanteValor = p.nProductoTipo)),'') as Producto,
			SUM(CASE WHEN k.nKardexTipoIng = 1 THEN k.nKardexCant
				 WHEN k.nKardexTipoIng = 2 THEN k.nKardexCant
				 WHEN k.nKardexTipoIng = 3 THEN -k.nKardexCant
			end) as Stock,
			MAX(nKardexPrecUnt) as PrecUnit,
			(SUM(CASE WHEN k.nKardexTipoIng = 1 THEN k.nKardexCant
				 WHEN k.nKardexTipoIng = 2 THEN k.nKardexCant
				 WHEN k.nKardexTipoIng = 3 THEN k.nKardexCant
			end) * MAX(nKardexPrecUnt)) as PrecTot
			FROM log_kardex k
			inner join local_producto lp on  k.nProducto_id=lp.nProducto_id
			join producto p on p.nProducto_id = lp.nProducto_id
			join ven_marca vm on p.nProductoMarca = vm.nMarca_id
			where k.nKardexAnio=anio and k.nKardexMes=mes and k.nLocal_id=idlocal
			group by k.nProducto_id
			order by k.nProducto_id asc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spI_cierreMes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spI_cierreMes`(

IN Local_id int)
BEGIN

	

	DECLARE fec datetime;

	DECLARE mes int;

	DECLARE anio int;

	DECLARE mes_b int;

	DECLARE anio_b int;

	

	IF (select count(*) from log_cierremes log where DATE(log.dCierreMesFecFin)=DATE(now())) = 0 THEN

		INSERT INTO log_cierremes

		(`dCierreMesFecInicio`,`dCierreMesFecFin`,`nCierreMesNro`,`nLocal_id`,`nCierreMesAnio`)

		VALUES

		(

		 (select CAST(CONCAT( YEAR(now()),'-',MONTH(now()),'-',1) as DATETIME))

		,(Select LAST_DAY(NOW()))

		,(select MONTH(now()))

		,Local_id

		,(select YEAR(now()))

		);

	END IF;

	

	SELECT @fec:=dCierreMesFecFin,@mes:=c.nCierreMesNro,@anio:=c.nCierreMesAnio

	FROM log_cierremes c ORDER BY 1 DESC LIMIT 0,1;

	

	IF YEAR((SELECT DATE_ADD(@fec, INTERVAL 1 DAY))) > @anio THEN

	  set @anio_b= @anio;

	  set @mes_b= @mes;

	  set @anio = @anio+1;

	  set @mes = MONTH((SELECT DATE_ADD(@fec, INTERVAL 1 DAY)));

	END IF;	

	IF YEAR((SELECT DATE_ADD(@fec, INTERVAL 1 DAY))) = @anio AND

	   MONTH((SELECT DATE_ADD(@fec, INTERVAL 1 DAY))) > @mes THEN

	  set @anio_b= @anio;

	  set @mes_b= @mes;

	  set @anio = @anio;

	  set @mes = @mes+1;

	END IF;	

	IF YEAR((SELECT DATE_ADD(@fec, INTERVAL 1 DAY))) = @anio AND

	   MONTH((SELECT DATE_ADD(@fec, INTERVAL 1 DAY))) = @mes THEN

	   set @anio_b= @anio;

	   set @mes_b= @mes-1;

	   set @anio = @anio;

	   set @mes = @mes;

	END IF;	


	-- select Local_id,@anio_b,@mes_b,@anio,@mes;
	call spI_reg_kardex(Local_id,@anio_b,@mes_b,@anio,@mes);



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spI_ingresoproducto_kardex` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spI_ingresoproducto_kardex`(

IN IngProd_id int,

IN Producto_id int,

IN DetIngProdCant int,

IN DetIngProdPrecUnt decimal(18,2),

IN DetIngProdTot decimal(18,2),

IN TipoIngreso int,

IN KardexConcepto varchar(100)

)
BEGIN

		INSERT INTO log_kardex (cKardexSerie,cKardexNro,nKardexTipoIng,nProducto_Id,nKardexCant,

									nKardexPrecUnt,nKardexTot,nKardexSaldoCant,nKardexSaldoPrecUnt,nKardexSaldoTot,

									nLocal_id,nKardexAnio,nKardexMes,cKardexConcepto,dKardexFecha)

		VALUES(	  (SELECT ing.cIngProdSerie 

				   FROM log_ingprod ing WHERE ing.nIngProd_id = IngProd_id),

				   (SELECT

			       ing.cIngProdNro

				   FROM log_ingprod ing WHERE ing.nIngProd_id = IngProd_id),

				   TipoIngreso, -- Saldo Inicial

				   Producto_id,

				   DetIngProdCant,

				   DetIngProdPrecUnt,

				   DetIngProdTot,

				   0.00,

			       0.00,

			       0.00,

				   (SELECT

			        ing.nLocal_id

				    FROM log_ingprod ing WHERE ing.nIngProd_id = IngProd_id),

				   (SELECT

			        YEAR(ing.dIngProdFecReg)

				    FROM log_ingprod ing WHERE ing.nIngProd_id = IngProd_id),

			       (SELECT

					MONTH(ing.dIngProdFecReg)

				    FROM log_ingprod ing WHERE ing.nIngProd_id = IngProd_id),

					KardexConcepto,
					
					(SELECT

					DATE(ing.dIngProdFecReg)

				    FROM log_ingprod ing WHERE ing.nIngProd_id = IngProd_id)

			);



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spI_reg_kardex` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spI_reg_kardex`(

IN localid INT,

IN anio_b INT,

IN mes_b INT,

IN anio INT,

IN mes INT

)
BEGIN

	CREATE TEMPORARY TABLE listakardex(

		SELECT  '0000' as cKardexSerie,

				'00000000' as cKardexNro,

				1 as nKardexTipoIng,

				k.nProducto_id as nProducto_id,

				MAX(nKardexPrecUnt) as nKardexPrecUnt,

				SUM(CASE WHEN k.nKardexTipoIng = 1 THEN k.nKardexCant

					 WHEN k.nKardexTipoIng = 2 THEN k.nKardexCant

					 WHEN k.nKardexTipoIng = 3 THEN -k.nKardexCant

				end) as nKardexCant,

				(SUM(CASE WHEN k.nKardexTipoIng = 1 THEN k.nKardexCant

					 WHEN k.nKardexTipoIng = 2 THEN k.nKardexCant

					 WHEN k.nKardexTipoIng = 3 THEN k.nKardexCant

				end) * MAX(nKardexPrecUnt)) as nKardexTot,

				0.00 as nKardexSaldoCant,

				k.nLocal_id as nLocal_id,

				0.00 as nKardexSaldoPrecUnt,

				0.00 as nKardexSaldoTot,

				anio as nKardexAnio,

				mes as nKardexMes,

				CONCAT('Saldo Inicial del Mes de ', 
					   (select c.cConstanteDesc from constante c 
					   where c.cConstanteValor = mes and c.nConstanteClase=8))
				as cKardexConcepto

				FROM dicarsbd.log_kardex k

				where k.nKardexAnio=anio_b and k.nKardexMes=mes_b and k.nLocal_id=localid

				group by k.nProducto_id

				order by k.nProducto_id asc

	);

	DELETE FROM log_kardex where nKardexAnio=anio and nKardexMes = mes and nKardexTipoIng=1;

	INSERT INTO `log_kardex` (`cKardexSerie`,`cKardexNro`,`nKardexTipoIng`,`nProducto_id`,

			    `nKardexPrecUnt`,`nKardexCant`,`nKardexTot`,`nKardexSaldoCant`,`nLocal_id`,`nKardexSaldoPrecUnt`,`nKardexSaldoTot`,`nKardexAnio`,`nKardexMes`,`cKardexConcepto`)

	(SELECT * FROM listakardex);

	DROP TABLE listakardex;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `spI_salidaproducto_kardex` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `spI_salidaproducto_kardex`(

IN SalProd_id int,

IN Producto_id int,

IN DetSalProdCant int,

IN DetSalProdPrecUnt decimal(18,2),

IN DetSalProdTot decimal(18,2)

)
BEGIN

	

	INSERT INTO log_kardex 

		   (cKardexSerie,

			cKardexNro,

			nKardexTipoIng,

			nProducto_Id,

			nKardexCant,

			nKardexPrecUnt,

			nKardexTot,

			nKardexSaldoCant,

			nKardexSaldoPrecUnt,

			nKardexSaldoTot,

			nLocal_id,

			nKardexAnio,

			nKardexMes,

			cKardexConcepto,
			
			dKardexFecha)

		VALUES(	  (SELECT sal.cSalProdSerie 

				   FROM log_salprod sal WHERE sal.nSalProd_id = SalProd_id),

				   (SELECT

			       sal.cSalProdNro

				   FROM log_salprod sal WHERE sal.nSalProd_id = SalProd_id),

				   3,

				   Producto_id,

				   DetSalProdCant,

				   

				   (SELECT nProductoPContado FROM Producto where nProducto_id=Producto_id),



				   DetSalProdCant*(SELECT nProductoPContado FROM Producto where nProducto_id=Producto_id),

				   0.00,

			       0.00,

			       0.00,


				   (SELECT

			        sal.nLocal_id

				    FROM log_salprod sal WHERE sal.nSalProd_id = SalProd_id)

				   ,(SELECT

			        YEAR(sal.dSalProdFecReg)

				    FROM log_salprod sal WHERE sal.nSalProd_id = SalProd_id)


			       ,(SELECT

					MONTH(sal.dSalProdFecReg)

				    FROM log_salprod sal WHERE sal.nSalProd_id = SalProd_id)

					
					,(select IFNULL(sal.cSalProdObsv,'') from log_salprod sal where sal.nSalProd_id=SalProd_id)
					
					,(SELECT

					DATE(sal.dSalProdFecReg)

				    FROM log_salprod sal WHERE sal.nSalProd_id = SalProd_id)

			);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_btn_actualizar_ofertas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` PROCEDURE `sp_btn_actualizar_ofertas`()
BEGIN
	
	SET @id=0; 

	CREATE TEMPORARY TABLE IF NOT EXISTS lst_actualizar_Oferta AS (

	select @id:=@id+1 as id,dOfertaFecVigente,dOfertaFecVencto,o.nOferta_Id,(case
				when (curdate() between cast(o.`dOfertaFecVigente` as date) 
								and cast(o.`dOfertaFecVencto` as date)) then 1
				when (curdate() < cast(o.`dOfertaFecVigente` as date)) then 2
				when (curdate() > cast(o.`dOfertaFecVencto` as date)) then 3
			end) AS `estado`
	from oferta o
	inner join oferta_producto op on o.nOferta_id = op.nOferta_id
	where op.cOfertaProductoEst <> 0
	order by 1 asc

	);

	ALTER TABLE lst_actualizar_Oferta ADD PRIMARY KEY(id);

	SET @cont=1;
	SET @cantidad= (select count(*) from lst_actualizar_Oferta); 

	WHILE @cantidad > 0 DO

		UPDATE oferta_producto SET cOfertaProductoEst = (select estado from lst_actualizar_Oferta where id=@cont);
		DELETE FROM lst_actualizar_Oferta WHERE id=@cont;
		SET @cantidad= (select count(*) from lst_actualizar_Oferta); 
		SET @cont = @cont + 1;

	END WHILE;

	DROP TABLE lst_actualizar_Oferta;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_consultar_venta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_venta`(
IN tipo INT,
IN fechaInicio date,
IN fechaFin date,
IN idlocal INT)
BEGIN
	IF tipo = 1 THEN
		select 
			cast(`v`.`cVentaFecReg` as date) AS `FecReg`,
			`l`.`cLocalDesc` AS `Tienda`,
			concat(`vc`.`cClienteApe`,
					' ',
					`vc`.`cClienteNom`) AS `Cliente`,
			concat(`p`.`cProductoDesc`,
					' ',
					`p`.`cProductoTalla`,
					' ',
					`vm`.`cMarcaDesc`,
					' ',
					ifnull((select 
									`c`.`cConstanteDesc`
								from
									`constante` `c`
								where
									((`c`.`nConstanteClase` = 5)
										and (`c`.`cConstanteValor` = `p`.`nProductoTipo`))),
							'')) AS `Producto`,
			`p`.`cProductoSerie` AS `Serie`,
			`dv`.`nDetVentaCant` AS `Cant`,
			`dv`.`nDetVentaDscto` AS `Desct`,
			`p`.`nProductoPCosto` AS `PrecioCosto`,
			ifnull((case
						when (`v`.`nVentaTipPag` = 1) then `dv`.`nDetVentaPrecUnt`
					end),
					0.00) AS `PrecioVentaContado`,
			ifnull((case
						when (`v`.`nVentaTipPag` = 2) then `dv`.`nDetVentaPrecUnt`
					end),
					0.00) AS `PrecioVentaCredito`,
			ifnull((case
						when (`v`.`nVentaTipPag` = 3) then `dv`.`nDetVentaPrecUnt`
					end),
					0.00) AS `PrecioSeparacion`
		from
			(((((`ven_venta` `v`
			join `ven_detventa` `dv` ON ((`dv`.`nVenta_id` = `v`.`nVenta_id`)))
			join `producto` `p` ON ((`p`.`nProductoTipo` = `dv`.`nProducto_id`)))
			join `ven_marca` `vm` ON ((`vm`.`nMarca_id` = `p`.`nProductoMarca`)))
			join `ven_cliente` `vc` ON ((`vc`.`nCliente_id` = `v`.`nCliente_id`)))
			join `local` `l` ON ((`v`.`nLocal_id` = `l`.`nLocal_id`)))
		where `v`.`nLocal_id` = idlocal and (`v`.`cVentaFecReg` between fechaInicio and fechaFin) 
			and `v`.`nVentaTipPag` IN (1,2,3)
		order by 1;
	END IF;
	IF tipo = 2 THEN
		select 
			cast(`v`.`cVentaFecReg` as date) AS `FecReg`,
			`l`.`cLocalDesc` AS `Tienda`,
			concat(`vc`.`cClienteApe`,
					' ',
					`vc`.`cClienteNom`) AS `Cliente`,
			concat(`p`.`cProductoDesc`,
					' ',
					`p`.`cProductoTalla`,
					' ',
					`vm`.`cMarcaDesc`,
					' ',
					ifnull((select 
									`c`.`cConstanteDesc`
								from
									`constante` `c`
								where
									((`c`.`nConstanteClase` = 5)
										and (`c`.`cConstanteValor` = `p`.`nProductoTipo`))),
							'')) AS `Producto`,
			`p`.`cProductoSerie` AS `Serie`,
			`dv`.`nDetVentaCant` AS `Cant`,
			`dv`.`nDetVentaDscto` AS `Desct`,
			`p`.`nProductoPCosto` AS `PrecioCosto`,
			ifnull((case
						when (`v`.`nVentaTipPag` = 1) then `dv`.`nDetVentaPrecUnt`
					end),
					0.00) AS `PrecioVentaContado`,
			ifnull((case
						when (`v`.`nVentaTipPag` = 2) then `dv`.`nDetVentaPrecUnt`
					end),
					0.00) AS `PrecioVentaCredito`,
			ifnull((case
						when (`v`.`nVentaTipPag` = 3) then `dv`.`nDetVentaPrecUnt`
					end),
					0.00) AS `PrecioSeparacion`
		from
			(((((`ven_venta` `v`
			join `ven_detventa` `dv` ON ((`dv`.`nVenta_id` = `v`.`nVenta_id`)))
			join `producto` `p` ON ((`p`.`nProductoTipo` = `dv`.`nProducto_id`)))
			join `ven_marca` `vm` ON ((`vm`.`nMarca_id` = `p`.`nProductoMarca`)))
			join `ven_cliente` `vc` ON ((`vc`.`nCliente_id` = `v`.`nCliente_id`)))
			join `local` `l` ON ((`v`.`nLocal_id` = `l`.`nLocal_id`)))
		where `v`.`nLocal_id` = idlocal and (`v`.`cVentaFecReg` between fechaInicio and fechaFin) 
			and `v`.`nVentaTipPag` IN (4,5)
		order by 1;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_generar_CodigoBarra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_generar_CodigoBarra`()
BEGIN

Declare result char(12); 

Declare valor char(12); 



SET @valor = (select CAST((RAND() * 1000000000000) AS UNSIGNED));



WHILE LENGTH(@valor) < 12 DO

set @valor = (select CAST((RAND() * 1000000000000) AS UNSIGNED));

END WHILE;



WHILE (select COUNT(*) from producto p where p.cProductoCodBarra = @valor) > 0 DO

set @valor = (select CAST((RAND() * 1000000000000) AS UNSIGNED));

WHILE LENGTH(@valor) < 12 DO

set @valor = (select CAST((RAND() * 1000000000000) AS UNSIGNED));

END WHILE;

END WHILE;



SET @result=@valor;



select @result as Codigo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ins_logingprod` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` PROCEDURE `sp_ins_logingprod`(
	in idPersonal int,
	in idLocal int,
	in motivo int,
	in docserie char(4),
	in docnum char(8),
	in observacion varchar(500)	
)
BEGIN
	insert into log_ingprod
	(
		nPersonal_id,
		nLocal_id,
		cIngProdSerie,
		cIngProdNro,
		nIngProdMotivo,
		cIngProdDocSerie,
		dIngProdFecReg,
		cIngProdDocNro,
		cIngProdObsv,
		cIngProdEst)
	values
	(
		idPersonal,
		idLocal,
		fun_generar_serie_ingproducto(),
		fun_generar_numero_ingproducto(),
		motivo,
		docserie,
		CURRENT_TIMESTAMP(),
		docnum,
		observacion,
		"1"
		);
	SELECT (MAX(nIngProd_id)) AS id FROM log_ingprod;
	
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ins_logsalprod` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` PROCEDURE `sp_ins_logsalprod`(
	in idPersonal int,
	in idLocal int,
	in motivo int,
	in idSolicitante char(4),
	in observacion varchar(500)	 
)
BEGIN
	insert into log_salprod
	(
		nPersonal_id,
		nLocal_id,
		cSalProdSerie,
		cSalProdNro,
		dSalProdFecReg,
		nSalProdMotivo,
		nSolicitante_id,
		cSalProdObsv)
	values
	(
		idPersonal,
		idLocal,
		fun_generar_serie_salproducto(),
		fun_generar_numero_salproducto(),
		CURRENT_TIMESTAMP(),
		motivo,
		idSolicitante,
		observacion
		);
	SELECT (MAX(nSalProd_id)) AS id FROM log_salprod;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ins_ofertaproducto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` PROCEDURE `sp_ins_ofertaproducto`(
IN Producto_id int
,IN Oferta_id int
,IN OfertaProducto_id int
,IN banda int
,IN OfertaProductoPorc decimal(9,1)
)
BEGIN

	Declare id int;
	Declare estado int;
	Declare result varchar(5);
	
	set @id=0;
	set @estado=0;
	set @result = 'No';

	IF banda = 0 THEN

			update oferta_producto set cOfertaProductoEst = 0
			-- where nOfertaProducto_id=nOfertaProducto_id;
			where nOferta_id=Oferta_id and nProducto_id=Producto_id;
			
			set @result = 'ok';

		/*IF ( Producto_id > 0  and Oferta_id > 0 and OfertaProducto_id > 0 ) THEN
			
			update oferta_producto set cOfertaProductoEst = 0
			-- where nOfertaProducto_id=nOfertaProducto_id;
			where nOferta_id=Oferta_id and nProducto_id=Producto_id;
			
			set @result = 'ok';

		END IF; */

	END IF;
	
	IF banda = 2 THEN

		IF ( Producto_id <> 0  and Oferta_id <> 0 and OfertaProducto_id = 0 ) THEN
		
			set @id = ifnull((select nOfertaProducto_id from oferta_producto
					   where nOferta_id=Oferta_id and nProducto_id=Producto_id),0);
			
		END IF;
		
		IF ( Producto_id <> 0  and Oferta_id <> 0 and OfertaProducto_id <> 0 ) THEN
			
			set @id = nOfertaProducto_id;
		
		END IF;
		
		IF @id = 0 THEN
			
			SET @estado = (select case
					when (curdate() between cast(`o`.`dOfertaFecVigente` as date) 
						  and cast(`o`.`dOfertaFecVencto` as date)) then 1
					when (curdate() < cast(`o`.`dOfertaFecVigente` as date)) then 2
					when (curdate() > cast(`o`.`dOfertaFecVencto` as date)) then 3
				end as estado
			from oferta o 
			where o.nOferta_id=Oferta_id);

			INSERT INTO `dicarsbd`.`oferta_producto`
						(`nOferta_id`,`nProducto_id`,`nOfertaProductoPorc`,`cOfertaProductoEst`)
			VALUES (Oferta_id,Producto_id,OfertaProductoPorc,@estado);

			set @result = 'ok';

		END IF;

		IF @id > 0 THEN

			SET @estado = (select case
					when (curdate() between cast(`o`.`dOfertaFecVigente` as date) 
						  and cast(`o`.`dOfertaFecVencto` as date)) then 1
					when (curdate() < cast(`o`.`dOfertaFecVigente` as date)) then 2
					when (curdate() > cast(`o`.`dOfertaFecVencto` as date)) then 3
				end
			from oferta o 
			where o.nOferta_id=Oferta_id);

			update oferta_producto
			set cOfertaProductoEst = @estado
			where nOfertaProducto_id=@id;

			set @result = 'ok';

		END IF;

	END IF;

	select @result;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ins_ordencompra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` PROCEDURE `sp_ins_ordencompra`(
	in Personal_id int,
	in Proveedor_id int,
	in OrdComSubTotal decimal(9,2),
	in OrdComIGV decimal(9,1),
	in OrdComTotal decimal(9,2),
	in OrdComObsv varchar(500),
	in OrdComDesct decimal(9,2),
	in OrdComDocSerie char(4),
	in OrdComDocNro char(8),
	in OrdTipoDocumento int
)
BEGIN

	INSERT INTO `dicarsbd`.`log_ordcom`
	(`nPersonal_id`,
	`nProveedor_id`,
	`OrdComFecReg`,
	`cOrdComSerie`,
	`cOrdComNro`,
	`nOrdComSubTotal`,
	`nOrdComIGV`,
	`nOrdComTotal`,
	`cOrdComObsv`,
	`cOrdComEst`,
	`nOrdComDesct`,
	`nOrdComRecEqv`,
	`nOrdComRetencion`,
	`cOrdComDocSerie`,
	`cOrdComDocNro`,
	`nOrdTipoDocumento`)
	VALUES
	(
	Personal_id,
	Proveedor_id,
	CURRENT_TIMESTAMP(),
	fun_generar_serie_ordcom(),
	fun_generar_numero_ordcom(),
	OrdComSubTotal,
	OrdComIGV,
	OrdComTotal,
	OrdComObsv,
	"1",
	OrdComDesct,
	0.0,
	0.0,
	OrdComDocSerie,
	OrdComDocNro,
	OrdTipoDocumento);

	SELECT (MAX(nOrdenCom_id)) AS id FROM log_ordcom;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ins_ordenpedido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` PROCEDURE `sp_ins_ordenpedido`(
IN Personal_id int,
IN OrdPedSerie char(4),
IN OrdPedNro char(8),
IN OrdPedEnvEmail int,
IN Local_id int,
IN OrdPedFecReg TIMESTAMP,
IN dOrdePedFecEnt TIMESTAMP,
IN OrdPedObsv varchar(500)
)
BEGIN

INSERT INTO `dicarsbd`.`log_ordped`
(`nPersonal_id`,
`cOrdPedSerie`,
`cOrdPedNro`,
`cOrdPedEnvEmail`,
`nLocal_id`,
`dOrdPedFecReg`,
`dOrdePedFecEnt`,
`cOrdPedObsv`,
`cOrdPedEst`)
VALUES
(
Personal_id,
OrdPedSerie,
OrdPedNro,
OrdPedEnvEmail,
Local_id,
OrdPedFecReg,
dOrdePedFecEnt,
OrdPedObsv,
'1');

select max(nOrdPed_id) as last_id from log_ordped;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_ins_producto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`dicars_user`@`%` PROCEDURE `sp_ins_producto`(
IN cProductoSerie varchar(15)
,IN cProductoTalla varchar(15)
,IN nProductoMarca int
,IN nProductoTipo int
,IN cProductoDesc varchar(200)
,IN nProductoPContado decimal(9,2)
,IN nProductoPCredito decimal(9,2)
,IN nProductoPCosto decimal(9,2)
,IN cProductoImage text
,IN nCategoria_id	int
,IN nProductoStockMin int
,IN nProductoStockMax int
,IN nProductoStock int
,IN cProductoEst char(1)
,IN nProductoPorcUti decimal(9,1)
,IN nProductoUtiBruta decimal(9,2)
,IN nProductoUnidMedida int
)
BEGIN

	INSERT INTO `dicarsbd`.`producto`
		(`cProductoSerie`,
		 `cProductoTalla`,
		 `nProductoMarca`,
		 `nProductoTipo`,
		 `cProductoDesc`,
		 `nProductoPContado`,
		 `nProductoPCredito`,
		 `nProductoPCosto`,
		 `cProductoCodBarra`,
		 `cProductoImage`,
		 `nCategoria_id`,
		 `nProductoStockMin`,
		 `nProductoStockMax`,
		 `nProductoStock`,
		 `cProductoEst`,
		 `nProductoPorcUti`,
		 `nProductoUtiBruta`,
		 nProductoUnidMedida)
	VALUES
		(
		cProductoSerie,
		cProductoTalla,
		nProductoMarca,
		nProductoTipo,
		cProductoDesc,
		nProductoPContado,
		nProductoPCredito,
		nProductoPCosto,
		fun_generar_codigoBarra(),
		cProductoImage,
		nCategoria_id,
		nProductoStockMin,
		nProductoStockMax,
		nProductoStock,
		cProductoEst,
		nProductoPorcUti,
		nProductoUtiBruta,
		nProductoUnidMedida);

SELECT (MAX(nProducto_id)) AS id FROM producto;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_reporte_ordencompra` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_reporte_ordencompra`(

IN ordcom int)
BEGIN

		

	SELECT CONCAT(oc.cOrdComSerie,'',oc.cOrdComNro) as Orden,

			DATE(oc.OrdComFecReg) as FecRegistro,

			CONCAT(p.cPersonalNom,' ',p.cPersonalApe) as Registrador,

			oc.cOrdComObsv as Observacion,

			oc.nOrdComSubTotal as SubTotal,

			oc.nOrdComIGV as IGV,

			oc.nOrdComRetencion as Retencion,

			oc.nOrdComDesct as Desct,

			oc.nOrdComRecEqv as ReqEqv,

			CONCAT(prod.cProductoDesc,' ',prod.cProductoSerie,' ',prod.cProductoTalla,

			IFNULL((select c.cConstanteDesc from constante c where c.nConstante_id = prod.nProductoTipo),'')

			) as Producto,

			doc.nDetCompraPrecUnt as PrecUnit,

			doc.nDetCompraCant as Cant,

			doc.nDetCompraImporte as Importe,

			(CASE 

				 WHEN MIN(cDetCompraEst) = 1 THEN 'Atendida Parcialmente'

				 WHEN MIN(cDetCompraEst) = 2 THEN 'Atendida Completamente'

			END) as Estado

	FROM dicarsbd.log_ordcom oc

	INNER JOIN dicarsbd.log_detcompra doc ON oc.nOrdenCom_id = doc.nOrdenCompra_id

	INNER JOIN ven_personal p ON p.nPersonal_id = oc.nPersonal_id

	INNER JOIN log_proveedor pro ON pro.nProveedor_id = oc.nProveedor_id

	INNER JOIN producto prod ON prod.nProducto_id = doc.nProducto_id

	WHERE oc.nOrdenCom_id =ordcom;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_venta_cuadrecaja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_venta_cuadrecaja`(
IN fecha DATE,
IN idlocal INT)
BEGIN
select 
	   v.nVenta_id as venta,
       v.nLocal_id as Tienda,
	   DATE(v.cVentaFecReg) as FecReg ,
	   (select c.cConstanteDesc from constante c 
	   where c.cConstanteValor =v.nVentaTipPag and c.nConstanteClase = 1) as Tipo,
	   (
	   CASE WHEN DATE(v.cVentaFecReg) <> fecha THEN 0.00
			ELSE v.nVentaTotApag
	   END
	   ) as Referencia,
	   IFNULL((select SUM(vt1.nTransaccionMont) 
	   from ven_transaccion vt1 where vt1.cTransaccionDesc = 'Venta Credito' and v.nVenta_id = vt1.nVenta_id
	   ),0.00) as PagoCredito,
	   IFNULL((select SUM(vt1.nTransaccionMont) 
	   from ven_transaccion vt1 where vt1.cTransaccionDesc = 'Pago de cuotas' and v.nVenta_id = vt1.nVenta_id
	   ),0.00) as PagoCuota,
	   IFNULL((select SUM(vt1.nTransaccionMont) 
	   from ven_transaccion vt1 where vt1.cTransaccionDesc = 'Venta Contado' and v.nVenta_id = vt1.nVenta_id
	   ),0.00) as PagoContado,
	   IFNULL((select SUM(vt1.nTransaccionMont) 
	   from ven_transaccion vt1 where vt1.cTransaccionDesc = 'Venta Separacion' and v.nVenta_id = vt1.nVenta_id
	   ),0.00) as PagoSeparacion
from ven_venta v
join ven_transaccion vt on v.nVenta_id = vt.nVenta_id
where DATE(vt.dTransaccionFecReg) = fecha and v.cVentaEst <> 0 and v.nLocal_id = idlocal
group by venta,Tienda,FecReg,Tipo,Referencia
UNION ALL(
select 
	   0 as venta,
       vm.nLocal_id as Tienda,
	   DATE(vm.dMovimientoFecReg) as FecReg,
	   (CASE WHEN vm.nMovimientoTip = 1 THEN 'Deposito'
			 WHEN vm.nMovimientoTip = 2 THEN 'Retiro'
	   END) as Tipo,
	   (CASE WHEN vm.nMovimientoTip = 1 THEN  SUM(vm.nMovimientoMonto) 
			 WHEN vm.nMovimientoTip = 2 THEN SUM(vm.nMovimientoMonto) 
	   END) as Referencia,
	   (0.00) as PagoCredito,
	   (0.00) as PagoCuota,
	   (0.00) as PagoContado,
	   (0.00) as PagoSeparacion
from ven_movimiento vm where DATE(vm.dMovimientoFecReg) = fecha and vm.nLocal_id=idlocal
);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `adm_local_all`
--

/*!50001 DROP TABLE IF EXISTS `adm_local_all`*/;
/*!50001 DROP VIEW IF EXISTS `adm_local_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `adm_local_all` AS (select `lc`.`nLocal_id` AS `nLocal_id`,`lc`.`cLocalDesc` AS `cLocalDesc`,`lc`.`cLocalTelf` AS `cLocalTelf`,`lc`.`cLocalDirec` AS `cLocalDirec`,`lc`.`nUbigeo_id` AS `nUbigeo_id`,`lc`.`nLocalEst` AS `nLocalEst`,`co`.`cConstanteDesc` AS `nLocalTipRub` from (`local` `lc` join `constante` `co` on(((`co`.`cConstanteValor` = `lc`.`nLocalTipRub`) and (`co`.`nConstanteClase` = 3))))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `adm_usuarios_all`
--

/*!50001 DROP TABLE IF EXISTS `adm_usuarios_all`*/;
/*!50001 DROP VIEW IF EXISTS `adm_usuarios_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `adm_usuarios_all` AS select `u`.`username` AS `username`,`u`.`id` AS `id`,concat(`v`.`cPersonalNom`,'  ',`v`.`cPersonalApe`) AS `nomape`,`u`.`active` AS `estado`,`u`.`last_login` AS `ultimologin`,`u`.`active` AS `active` from (`users` `u` join `ven_personal` `v` on((`u`.`nPersonal_id` = `v`.`nPersonal_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `local_reporte_ingreso_egreso_byfecha`
--

/*!50001 DROP TABLE IF EXISTS `local_reporte_ingreso_egreso_byfecha`*/;
/*!50001 DROP VIEW IF EXISTS `local_reporte_ingreso_egreso_byfecha`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `local_reporte_ingreso_egreso_byfecha` AS select `v`.`nVenta_id` AS `Id`,cast(`v`.`cVentaFecReg` as date) AS `Fecha`,cast(sum(`dtv`.`nDetVentaCant`) as unsigned) AS `CantVendida`,`v`.`nVentaTotApag` AS `MontoFacturado`,`vt`.`nTransaccionMont` AS `MontoCobrado`,concat('Venta a ',(select `c`.`cConstanteDesc` from `constante` `c` where ((`c`.`cConstanteValor` = `v`.`nVentaTipPag`) and (`c`.`nConstanteClase` = 2)))) AS `TipoVenta`,'' AS `Concepto`,concat(`vp`.`cPersonalNom`,' ',`vp`.`cPersonalApe`) AS `Vendedor`,`v`.`nLocal_id` AS `tienda`,'1' AS `TipoIngreso` from (((`ven_venta` `v` join `ven_transaccion` `vt` on(((`vt`.`nVenta_id` = `v`.`nVenta_id`) and (`vt`.`dTransaccionFecReg` = `v`.`cVentaFecReg`)))) join `ven_personal` `vp` on((`vp`.`nPersonal_id` = `vt`.`nPersonal_id`))) join `ven_detventa` `dtv` on((`dtv`.`nVenta_id` = `v`.`nVenta_id`))) group by `v`.`nVenta_id`,`v`.`nVentaTotApag`,`vt`.`nTransaccionMont`,`vp`.`cPersonalNom`,`vp`.`cPersonalApe` union all (select 0 AS `id`,cast(`vm`.`dMovimientoFecReg` as date) AS `Fecha`,0 AS `cantVendida`,0 AS `MontoFacturado`,`vm`.`nMovimientoMonto` AS `MontoCobrado`,(select `c`.`cConstanteDesc` from `constante` `c` where ((`c`.`cConstanteValor` = `vm`.`nMovimientoTip`) and (`c`.`nConstanteClase` = 9))) AS `tipoMovimiento`,`vm`.`cMovimientoConcepto` AS `Concepto`,concat(`vp`.`cPersonalNom`,' ',`vp`.`cPersonalApe`) AS `vendedor`,`vm`.`nLocal_id` AS `tienda`,'1' AS `TipoIngreso` from ((`ven_movimiento` `vm` join `ven_personal` `vp` on((`vp`.`nPersonal_id` = `vm`.`nPersonal_id`))) join `local` `l` on((`l`.`nLocal_id` = `vm`.`nLocal_id`))) where (`vm`.`nMovimientoTip` = 2)) union all (select 0 AS `id`,cast(`vm`.`dMovimientoFecReg` as date) AS `Fecha`,0 AS `cantVendida`,0 AS `MontoFacturado`,`vm`.`nMovimientoMonto` AS `MontoCobrado`,(select `c`.`cConstanteDesc` from `constante` `c` where ((`c`.`cConstanteValor` = `vm`.`nMovimientoTip`) and (`c`.`nConstanteClase` = 9))) AS `tipoMovimiento`,`vm`.`cMovimientoConcepto` AS `Concepto`,concat(`vp`.`cPersonalNom`,' ',`vp`.`cPersonalApe`) AS `vendedor`,`vm`.`nLocal_id` AS `tienda`,'0' AS `TipoIngreso` from ((`ven_movimiento` `vm` join `ven_personal` `vp` on((`vp`.`nPersonal_id` = `vm`.`nPersonal_id`))) join `local` `l` on((`l`.`nLocal_id` = `vm`.`nLocal_id`))) where (`vm`.`nMovimientoTip` = 1)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `log_consultar_kardex`
--

/*!50001 DROP TABLE IF EXISTS `log_consultar_kardex`*/;
/*!50001 DROP VIEW IF EXISTS `log_consultar_kardex`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `log_consultar_kardex` AS (select `k`.`nKardexAnio` AS `Anio`,(select `c`.`cConstanteDesc` from `constante` `c` where ((`c`.`nConstanteClase` = 8) and (`c`.`cConstanteValor` = `k`.`nKardexMes`))) AS `Mes`,concat(`k`.`cKardexSerie`,'-',`k`.`cKardexNro`) AS `Documento`,`k`.`nKardexMes` AS `MesNum`,ifnull(concat(`p`.`cProductoDesc`,' - ',`p`.`cProductoTalla`),'') AS `Producto`,`vm`.`cMarcaDesc` AS `cMarcaDesc`,(select `c`.`cConstanteDesc` from `constante` `c` where ((`c`.`nConstanteClase` = 5) and (`c`.`cConstanteValor` = `p`.`nProductoTipo`))) AS `Tipo_Producto`,(case when (`k`.`nKardexTipoIng` = 1) then concat(`k`.`cKardexConcepto`,'',(select `c`.`cConstanteDesc` from `constante` `c` where ((`c`.`nConstanteClase` = 8) and (`c`.`cConstanteValor` = `k`.`nKardexMes`))),' del ',`k`.`nKardexAnio`) when (`k`.`nKardexTipoIng` = 2) then `k`.`cKardexConcepto` when (`k`.`nKardexTipoIng` = 3) then 'Salida' end) AS `Detalle`,(case when (`k`.`nKardexTipoIng` = 1) then 'Saldo Inicial' when (`k`.`nKardexTipoIng` = 2) then 'Ingreso' when (`k`.`nKardexTipoIng` = 3) then 'Salida' end) AS `TipoIngreso`,sum((case when (`k`.`nKardexTipoIng` = 1) then `k`.`nKardexCant` when (`k`.`nKardexTipoIng` = 2) then `k`.`nKardexCant` when (`k`.`nKardexTipoIng` = 3) then `k`.`nKardexCant` end)) AS `Cantidad`,max(`k`.`nKardexPrecUnt`) AS `PrecUnit`,`k`.`nKardexTipoIng` AS `nKardexTipoIng`,abs((sum((case when (`k`.`nKardexTipoIng` = 1) then `k`.`nKardexCant` when (`k`.`nKardexTipoIng` = 2) then `k`.`nKardexCant` when (`k`.`nKardexTipoIng` = 3) then `k`.`nKardexCant` end)) * max(`k`.`nKardexPrecUnt`))) AS `PrecTot`,`k`.`nLocal_id` AS `nLocal_id`,cast(`k`.`dKardexFecha` as date) AS `Fecha` from ((`log_kardex` `k` join `producto` `p` on((`p`.`nProducto_id` = `k`.`nProducto_id`))) join `ven_marca` `vm` on((`p`.`nProductoMarca` = `vm`.`nMarca_id`))) group by `k`.`nKardexAnio`,`k`.`nKardexMes`,`k`.`nKardexTipoIng`,`k`.`nProducto_id` order by `k`.`nProducto_id` desc,`k`.`nKardexTipoIng`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `log_consultar_kardexvalorizado`
--

/*!50001 DROP TABLE IF EXISTS `log_consultar_kardexvalorizado`*/;
/*!50001 DROP VIEW IF EXISTS `log_consultar_kardexvalorizado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `log_consultar_kardexvalorizado` AS (select `k`.`nKardexAnio` AS `Anio`,`k`.`nKardexMes` AS `NroMes`,(select `c`.`cConstanteDesc` from `constante` `c` where ((`c`.`nConstanteClase` = 8) and (`c`.`cConstanteValor` = `k`.`nKardexMes`))) AS `Mes`,concat(`k`.`cKardexSerie`,' - ',`k`.`cKardexNro`) AS `Documento`,`p`.`nProducto_id` AS `id`,`p`.`cProductoCodBarra` AS `codigoBarra`,ifnull(concat(`p`.`cProductoDesc`,' ',`vm`.`cMarcaDesc`,' - ',`p`.`cProductoTalla`,' - ',(select `c`.`cConstanteDesc` from `constante` `c` where ((`c`.`nConstanteClase` = 5) and (`c`.`cConstanteValor` = `p`.`nProductoTipo`)))),'') AS `Producto`,(case when (`k`.`nKardexTipoIng` = 1) then concat(`k`.`cKardexConcepto`,'',(select `c`.`cConstanteDesc` from `constante` `c` where ((`c`.`nConstanteClase` = 8) and (`c`.`cConstanteValor` = `k`.`nKardexMes`))),' del ',`k`.`nKardexAnio`) when (`k`.`nKardexTipoIng` = 2) then `k`.`cKardexConcepto` when (`k`.`nKardexTipoIng` = 3) then 'Salida' end) AS `Detalle`,(case when (`k`.`nKardexTipoIng` = 1) then 'Saldo Inicial' when (`k`.`nKardexTipoIng` = 2) then 'Ingreso' when (`k`.`nKardexTipoIng` = 3) then 'Salida' end) AS `TipoIngreso`,(case when (`k`.`nKardexTipoIng` = 1) then `k`.`nKardexCant` when (`k`.`nKardexTipoIng` = 2) then `k`.`nKardexCant` when (`k`.`nKardexTipoIng` = 3) then `k`.`nKardexCant` end) AS `Cantidad`,max(`k`.`nKardexPrecUnt`) AS `PrecUnit`,`k`.`nKardexTipoIng` AS `nKardexTipoIng`,abs((max(`k`.`nKardexPrecUnt`) * `k`.`nKardexCant`)) AS `PrecTot`,`k`.`nLocal_id` AS `nLocal_id`,cast(`k`.`dKardexFecha` as date) AS `Fecha` from ((`log_kardex` `k` join `producto` `p` on((`p`.`nProducto_id` = `k`.`nProducto_id`))) join `ven_marca` `vm` on((`p`.`nProductoMarca` = `vm`.`nMarca_id`))) group by `k`.`nKardexAnio`,`k`.`nKardexMes`,`k`.`nKardexTipoIng`,`k`.`nProducto_id` order by `k`.`nProducto_id`,`k`.`nKardexTipoIng`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `log_detingprod_all`
--

/*!50001 DROP TABLE IF EXISTS `log_detingprod_all`*/;
/*!50001 DROP VIEW IF EXISTS `log_detingprod_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `log_detingprod_all` AS select `d`.`nDetIngProd_id` AS `nDetIngProd_id`,`d`.`nIngProd_id` AS `nIngProd_id`,`d`.`nProducto_id` AS `nProducto_id`,`d`.`nDetIngProdCant` AS `nDetIngProdCant`,`d`.`nDetIngProdPrecUnt` AS `nDetIngProdPrecUnt`,`d`.`nDetIngProdTot` AS `nDetIngProdTot`,1 AS `estadolabel` from `log_detingprod` `d` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `log_detsalprod_all`
--

/*!50001 DROP TABLE IF EXISTS `log_detsalprod_all`*/;
/*!50001 DROP VIEW IF EXISTS `log_detsalprod_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `log_detsalprod_all` AS select `d`.`nDetSalProd_id` AS `nDetSalProd_id`,`d`.`nSalProd_id` AS `nSalProd_id`,`d`.`DetSalProdCant` AS `DetSalProdCant`,1 AS `estadolabel`,`p`.`nProducto_id` AS `nProducto_id`,`p`.`cProductoDesc` AS `cProductoDesc` from (`log_detsalprod` `d` join `producto` `p` on((`d`.`nSalProd_id` = `p`.`nProducto_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `log_ingprod_all`
--

/*!50001 DROP TABLE IF EXISTS `log_ingprod_all`*/;
/*!50001 DROP VIEW IF EXISTS `log_ingprod_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `log_ingprod_all` AS select `i`.`nIngProd_id` AS `nIngProd_id`,cast(`i`.`dIngProdFecReg` as date) AS `dIngProdFecReg`,`i`.`cIngProdNro` AS `cIngProdNro`,`i`.`cIngProdSerie` AS `cIngProdSerie`,`p`.`nPersonal_id` AS `nPersonal_id`,concat(`p`.`cPersonalNom`,' ',`p`.`cPersonalApe`) AS `nomape`,`i`.`nIngProdMotivo` AS `nIngProdMotivo`,`ct`.`cConstanteDesc` AS `DescMotivo`,`i`.`cIngProdDocNro` AS `cIngProdDocNro`,`i`.`cIngProdDocSerie` AS `cIngProdDocSerie` from ((`log_ingprod` `i` join `ven_personal` `p` on((`i`.`nPersonal_id` = `p`.`nPersonal_id`))) join `constante` `ct` on(((`ct`.`cConstanteValor` = `i`.`nIngProdMotivo`) and (`ct`.`nConstanteClase` = 1)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `log_ingprod_edit`
--

/*!50001 DROP TABLE IF EXISTS `log_ingprod_edit`*/;
/*!50001 DROP VIEW IF EXISTS `log_ingprod_edit`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `log_ingprod_edit` AS select `i`.`nIngProd_id` AS `nIngProd_id`,concat(`p`.`cPersonalNom`,' ',`p`.`cPersonalApe`) AS `nomape`,`i`.`cIngProdNro` AS `cIngProdNro`,`i`.`nIngProdMotivo` AS `nIngProdMotivo`,`l`.`nLocal_id` AS `nLocal_id`,`l`.`cLocalDesc` AS `cLocalDesc`,`i`.`cIngProdObsv` AS `cIngProdObsv`,cast(`i`.`dIngProdFecReg` as date) AS `dIngProdFecReg`,`i`.`cIngProdDocNro` AS `cIngProdDocNro` from ((`log_ingprod` `i` join `ven_personal` `p` on((`i`.`nPersonal_id` = `p`.`nPersonal_id`))) join `local` `l` on((`i`.`nLocal_id` = `l`.`nLocal_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `log_lista_salidacampo`
--

/*!50001 DROP TABLE IF EXISTS `log_lista_salidacampo`*/;
/*!50001 DROP VIEW IF EXISTS `log_lista_salidacampo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `log_lista_salidacampo` AS (select `ls`.`dSalProdFecReg` AS `FecReg`,concat(`ls`.`cSalProdSerie`,' ',`ls`.`cSalProdNro`) AS `Documento`,`l`.`cLocalDesc` AS `Tienda`,`c`.`cConstanteDesc` AS `Motivos`,concat(`pd`.`cProductoDesc`,' ',`m`.`cMarcaDesc`,'-',`pd`.`cProductoSerie`,'-',`c1`.`cConstanteDesc`,'-',`pd`.`cProductoTalla`) AS `Producto`,`lds`.`DetSalProdCant` AS `Cantidad`,`ls`.`cSalProdObsv` AS `Observacion`,concat(`p`.`cPersonalApe`,' ',`p`.`cPersonalNom`) AS `Personal`,concat(`p1`.`cPersonalApe`,' ',`p1`.`cPersonalNom`) AS `Solicitante`,`ls`.`nLocal_id` AS `nLocal_id` from ((((((((`log_salprod` `ls` join `constante` `c` on(((`c`.`cConstanteValor` = `ls`.`nSalProdMotivo`) and (`c`.`nConstanteClase` = 4)))) join `ven_personal` `p` on((`p`.`nPersonal_id` = `ls`.`nPersonal_id`))) join `ven_personal` `p1` on((`p1`.`nPersonal_id` = `ls`.`nSolicitante_id`))) join `local` `l` on((`l`.`nLocal_id` = `ls`.`nLocal_id`))) join `log_detsalprod` `lds` on((`lds`.`nSalProd_id` = `ls`.`nSalProd_id`))) join `producto` `pd` on((`pd`.`nProducto_id` = `lds`.`nProducto_id`))) join `constante` `c1` on(((`c1`.`cConstanteValor` = `pd`.`nProductoTipo`) and (`c1`.`nConstanteClase` = 5)))) join `ven_marca` `m` on((`m`.`nMarca_id` = `pd`.`nProductoMarca`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `log_local_users_all`
--

/*!50001 DROP TABLE IF EXISTS `log_local_users_all`*/;
/*!50001 DROP VIEW IF EXISTS `log_local_users_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `log_local_users_all` AS (select `ul`.`nLocal_id` AS `nLocal_id`,`l`.`cLocalDesc` AS `cLocalDesc`,`u`.`id` AS `id` from ((`users_local` `ul` join `local` `l` on((`l`.`nLocal_id` = `ul`.`nLocal_id`))) join `users` `u` on((`u`.`id` = `ul`.`users_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `log_ordcom_all`
--

/*!50001 DROP TABLE IF EXISTS `log_ordcom_all`*/;
/*!50001 DROP VIEW IF EXISTS `log_ordcom_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `log_ordcom_all` AS select `c`.`nOrdenCom_id` AS `nOrdenCom_id`,cast(`c`.`OrdComFecReg` as date) AS `OrdComFecReg`,`c`.`nPersonal_id` AS `nPersonal_id`,concat(`p`.`cPersonalNom`,' ',`p`.`cPersonalApe`) AS `cPersonalNom`,`c`.`nProveedor_id` AS `nProveedor_id`,`pr`.`cProveedorRazSocial` AS `cProveedorRazSocial`,`c`.`nOrdComTotal` AS `nOrdComTotal`,`c`.`cOrdComObsv` AS `cOrdComObsv`,`c`.`nOrdComSubTotal` AS `nOrdComSubTotal`,`c`.`nOrdComIGV` AS `nOrdComIGV`,`c`.`nOrdComDesct` AS `nOrdComDesct`,`c`.`cOrdComDocSerie` AS `cOrdComDocSerie`,`c`.`cOrdComDocNro` AS `cOrdComDocNro`,ifnull((select `ct`.`cConstanteDesc` from `constante` `ct` where ((`ct`.`nConstanteClase` = 7) and (`ct`.`cConstanteValor` = `c`.`nOrdTipoDocumento`))),'') AS `nOrdTipoDocumento` from ((`log_ordcom` `c` join `ven_personal` `p` on((`p`.`nPersonal_id` = `c`.`nPersonal_id`))) join `log_proveedor` `pr` on((`pr`.`nProveedor_id` = `c`.`nProveedor_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `log_ordcomdetalle_all`
--

/*!50001 DROP TABLE IF EXISTS `log_ordcomdetalle_all`*/;
/*!50001 DROP VIEW IF EXISTS `log_ordcomdetalle_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `log_ordcomdetalle_all` AS (select `c`.`nOrdenCom_id` AS `nOrdenCom_id`,cast(`c`.`OrdComFecReg` as date) AS `OrdComFecReg`,`c`.`nPersonal_id` AS `nPersonal_id`,concat(`p`.`cPersonalNom`,' ',`p`.`cPersonalApe`) AS `cPersonalNom`,`c`.`nProveedor_id` AS `nProveedor_id`,`pr`.`cProveedorRazSocial` AS `cProveedorRazSocial`,`c`.`nOrdComTotal` AS `nOrdComTotal`,`c`.`cOrdComObsv` AS `cOrdComObsv`,`c`.`nOrdComSubTotal` AS `nOrdComSubTotal`,`c`.`nOrdComIGV` AS `nOrdComIGV`,`c`.`nOrdComDesct` AS `nOrdComDesct`,`pro`.`cProductoDesc` AS `cProductoDesc`,`d`.`nDetCompraCant` AS `nDetCompraCant`,`d`.`nDetCompraPrecUnt` AS `nDetCompraPrecUnt`,`d`.`nDetCompraImporte` AS `nDetCompraImporte`,`c`.`cOrdComDocSerie` AS `cOrdComDocSerie`,`c`.`cOrdComDocNro` AS `cOrdComDocNro`,`d`.`nDetCompra_id` AS `nDetCompra_id`,`pro`.`nProducto_id` AS `nProducto_id` from ((((`log_ordcom` `c` join `ven_personal` `p` on((`p`.`nPersonal_id` = `c`.`nPersonal_id`))) join `log_proveedor` `pr` on((`pr`.`nProveedor_id` = `c`.`nProveedor_id`))) join `log_detcompra` `d` on((`c`.`nOrdenCom_id` = `d`.`nOrdenCompra_id`))) join `producto` `pro` on((`pro`.`nProducto_id` = `d`.`nProducto_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `log_ordped_all`
--

/*!50001 DROP TABLE IF EXISTS `log_ordped_all`*/;
/*!50001 DROP VIEW IF EXISTS `log_ordped_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `log_ordped_all` AS select `d`.`nProducto_id` AS `nProducto_id`,`p`.`cProductoDesc` AS `cProductoDesc`,`pe`.`nPersonal_id` AS `nPersonal_id`,concat(`pe`.`cPersonalNom`,' ',`pe`.`cPersonalApe`) AS `nomape`,`d`.`nDetOrdPedCant` AS `nDetOrdPedCant`,`d`.`nDetOrdPedCantAcept` AS `nDetOrdPedCantAcept`,(`d`.`nDetOrdPedCant` - `d`.`nDetOrdPedCantAcept`) AS `CantFalta`,cast(`o`.`dOrdPedFecReg` as date) AS `dOrdPedFecReg`,`p`.`cProductoCodBarra` AS `cProductoCodBarra`,`o`.`cOrdPedSerie` AS `cOrdPedSerie`,`o`.`cOrdPedNro` AS `cOrdPedNro`,`o`.`nOrdPed_id` AS `nOrdPed_id`,`p`.`nProductoPCosto` AS `nProductoPCosto`,cast(`o`.`dOrdePedFecEnt` as date) AS `dOrdePedFecEnt`,`l`.`cLocalDesc` AS `cLocalDesc`,`o`.`cOrdPedObsv` AS `cOrdPedObsv`,`o`.`cOrdPedEst` AS `cOrdPedEst`,(case when (`o`.`cOrdPedEst` = '1') then 'Activo' else 'Inactivo' end) AS `estadolabel` from ((((`log_detordped` `d` join `log_ordped` `o` on((`o`.`nOrdPed_id` = `d`.`nOrdPed_id`))) join `producto` `p` on((`p`.`nProducto_id` = `d`.`nProducto_id`))) join `ven_personal` `pe` on((`pe`.`nPersonal_id` = `o`.`nPersonal_id`))) join `local` `l` on((`l`.`nLocal_id` = `o`.`nLocal_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `log_productos_all`
--

/*!50001 DROP TABLE IF EXISTS `log_productos_all`*/;
/*!50001 DROP VIEW IF EXISTS `log_productos_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `log_productos_all` AS (select `p`.`nProducto_id` AS `nProducto_id`,concat(`p`.`cProductoDesc`,' - ',`p`.`cProductoSerie`,' -',`p`.`cProductoTalla`) AS `cProductoDesc`,`p`.`nProductoPVenta` AS `nProductoPVenta`,ifnull((select `ct`.`cConstanteDesc` from `constante` `ct` where ((`ct`.`nConstanteClase` = 6) and (`ct`.`cConstanteValor` = `p`.`nProductoUnidMedida`))),'') AS `nProductoUnidMedida`,`p`.`nProductoPCosto` AS `nProductoPCosto`,`p`.`cProductoCodBarra` AS `cProductoCodBarra`,`p`.`cProductoImage` AS `cProductoImage`,`p`.`nProductoStockMin` AS `nProductoStockMin`,`p`.`nProductoStockMax` AS `nProductoStockMax`,`p`.`nProductoStock` AS `nProductoStock`,`p`.`cProductoEst` AS `cProductoEst`,`p`.`nProductoPorcUti` AS `nProductoPorcUti`,`p`.`nProductoUtiBruta` AS `nProductoUtiBruta`,`v`.`nMarca_id` AS `nMarca_id`,`v`.`cMarcaDesc` AS `cMarcaDesc`,`c`.`nCategoria_id` AS `nCategoria_id`,`c`.`cCategoriaNom` AS `cCategoriaNom`,`co`.`cConstanteDesc` AS `cConstanteDesc`,`lop`.`nLocal_id` AS `nLocal_id` from ((((`producto` `p` join `local_producto` `lop` on((`lop`.`nProducto_id` = `p`.`nProducto_id`))) join `ven_marca` `v` on((`p`.`nProductoMarca` = `v`.`nMarca_id`))) join `ven_categoria` `c` on((`p`.`nCategoria_id` = `c`.`nCategoria_id`))) join `constante` `co` on(((`co`.`cConstanteValor` = `p`.`nProductoTipo`) and (`co`.`nConstanteClase` = 5)))) where ((`p`.`cProductoEst` <> 0) and (`lop`.`clocalProducto_Estado` <> 0))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `log_salprod_all`
--

/*!50001 DROP TABLE IF EXISTS `log_salprod_all`*/;
/*!50001 DROP VIEW IF EXISTS `log_salprod_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `log_salprod_all` AS select cast(`s`.`dSalProdFecReg` as date) AS `dSalProdFecReg`,`s`.`nPersonal_id` AS `nPersonal_id_r`,concat(`p`.`cPersonalNom`,' ',`p`.`cPersonalApe`) AS `registrador`,`pe`.`nPersonal_id` AS `nPersonal_id_s`,concat(`pe`.`cPersonalNom`,' ',`pe`.`cPersonalApe`) AS `solicitante`,`s`.`nSalProdMotivo` AS `nSalProdMotivo`,`ct`.`cConstanteDesc` AS `DescMotivo`,`s`.`cSalProdObsv` AS `cSalProdObsv`,`l`.`nLocal_id` AS `nLocal_id`,`l`.`cLocalDesc` AS `cLocalDesc`,`s`.`nSalProd_id` AS `nSalProd_id`,`s`.`cSalProdSerie` AS `cSalProdSerie`,`s`.`cSalProdNro` AS `cSalProdNro` from ((((`log_salprod` `s` join `ven_personal` `p` on((`s`.`nPersonal_id` = `p`.`nPersonal_id`))) join `ven_personal` `pe` on((`s`.`nSolicitante_id` = `pe`.`nPersonal_id`))) join `local` `l` on((`l`.`nLocal_id` = `s`.`nLocal_id`))) join `constante` `ct` on(((`ct`.`cConstanteValor` = `s`.`nSalProdMotivo`) and (`ct`.`nConstanteClase` = 4)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_cargo_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_cargo_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_cargo_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_cargo_all` AS (select `vc`.`nCargo_id` AS `nCargo_id`,`vc`.`nCargoDesc` AS `nCargoDesc`,`vc`.`cCargoEst` AS `cCargosEst` from `ven_cargo` `vc`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_categoria_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_categoria_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_categoria_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_categoria_all` AS (select `c`.`nCategoria_id` AS `nCategoria_id`,`c`.`cCategoriaNom` AS `cCategoriaNom`,`c`.`cCategoriaDesc` AS `cCategoriaDesc`,`c`.`cCategoriaEst` AS `cCategoriaEst` from `ven_categoria` `c`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_cliente_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_cliente_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_cliente_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_cliente_all` AS (select `c`.`nCliente_id` AS `nCliente_id`,`c`.`cClienteNom` AS `cClienteNom`,`c`.`cClienteApe` AS `cClienteApe`,`c`.`cClienteDNI` AS `cClienteDNI`,`c`.`cClienteRef` AS `cClienteRef`,`c`.`cClientecDir` AS `cClientecDir`,`c`.`nZona_id` AS `nZona_id`,`c`.`nClienteLineaOp` AS `nClienteLineaOp`,`c`.`cClienteArcCredito` AS `cClienteArcCredito`,`c`.`cClienteOcup` AS `cClienteOcup`,`zo`.`nUbigeo_id` AS `nUbigeo_id`,`zo`.`cZonaDesc` AS `cZonaDesc`,`c`.`cClienteTel` AS `cClienteTel` from (`ven_cliente` `c` join `ven_zona` `zo` on((`zo`.`nZona_id` = `c`.`nZona_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_consulta_venta`
--

/*!50001 DROP TABLE IF EXISTS `ven_consulta_venta`*/;
/*!50001 DROP VIEW IF EXISTS `ven_consulta_venta`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_consulta_venta` AS (select cast(`v`.`cVentaFecReg` as date) AS `FecReg`,`l`.`cLocalDesc` AS `Tienda`,concat(`vc`.`cClienteApe`,' ',`vc`.`cClienteNom`) AS `Cliente`,concat(`p`.`cProductoDesc`,' ',`p`.`cProductoTalla`,' ',`vm`.`cMarcaDesc`,' ',ifnull((select `c`.`cConstanteDesc` from `constante` `c` where ((`c`.`nConstanteClase` = 5) and (`c`.`cConstanteValor` = `p`.`nProductoTipo`))),'')) AS `Producto`,`p`.`cProductoSerie` AS `Serie`,`dv`.`nDetVentaCant` AS `Cant`,`dv`.`nDetVentaDscto` AS `Desct`,`p`.`nProductoPCosto` AS `PrecioCosto`,ifnull((case when (`v`.`nVentaTipPag` = 1) then `dv`.`nDetVentaPrecUnt` end),0.00) AS `PrecioVentaContado`,ifnull((case when (`v`.`nVentaTipPag` = 2) then `dv`.`nDetVentaPrecUnt` end),0.00) AS `PrecioVentaCredito` from (((((`ven_venta` `v` join `ven_detventa` `dv` on((`dv`.`nVenta_id` = `v`.`nVenta_id`))) join `producto` `p` on((`p`.`nProducto_id` = `dv`.`nProducto_id`))) join `ven_marca` `vm` on((`vm`.`nMarca_id` = `p`.`nProductoMarca`))) join `ven_cliente` `vc` on((`vc`.`nCliente_id` = `v`.`nCliente_id`))) join `local` `l` on((`v`.`nLocal_id` = `l`.`nLocal_id`))) order by 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_consultadetalleventa_byventa`
--

/*!50001 DROP TABLE IF EXISTS `ven_consultadetalleventa_byventa`*/;
/*!50001 DROP VIEW IF EXISTS `ven_consultadetalleventa_byventa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_consultadetalleventa_byventa` AS select `v`.`nVenta_id` AS `nVenta_id`,date_format(`v`.`cVentaFecReg`,'%d/%m/%Y') AS `cVentaFecReg`,`p`.`cProductoCodBarra` AS `codBarra`,`p`.`nProducto_id` AS `nProducto_id`,concat(`p`.`cProductoDesc`,' ',`p`.`cProductoTalla`,' ',`vm`.`cMarcaDesc`,' ',ifnull((select `c`.`cConstanteDesc` from `constante` `c` where ((`c`.`nConstanteClase` = 5) and (`c`.`cConstanteValor` = `p`.`nProductoTipo`))),'')) AS `Producto`,cast(`d`.`nDetVentaCant` as unsigned) AS `cant_prod`,`d`.`nDetVentaTot` AS `Total`,`d`.`nDetVentaPrecUnt` AS `nDetVentaPrecUnt` from (((`ven_venta` `v` join `ven_detventa` `d` on((`d`.`nVenta_id` = `v`.`nVenta_id`))) join `producto` `p` on((`p`.`nProducto_id` = `d`.`nProducto_id`))) join `ven_marca` `vm` on((`vm`.`nMarca_id` = `p`.`nProductoMarca`))) where (`v`.`cVentaEst` <> 0) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_consultarventa_byid`
--

/*!50001 DROP TABLE IF EXISTS `ven_consultarventa_byid`*/;
/*!50001 DROP VIEW IF EXISTS `ven_consultarventa_byid`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_consultarventa_byid` AS select `v`.`nVenta_id` AS `nVenta_id`,date_format(`v`.`cVentaFecReg`,'%d/%m/%Y') AS `cVentaFecReg`,concat(`c`.`cClienteNom`,' ',`c`.`cClienteApe`) AS `Cliente`,`c`.`cClientecDir` AS `Cliente_direccion`,concat(`p`.`cPersonalNom`,' ',`p`.`cPersonalApe`) AS `Vendedor`,`ct`.`cConstanteDesc` AS `tipo_pago`,`v`.`nVentaSubTotal` AS `SubTotal`,`v`.`nVentaDscto` AS `Descuento`,`vtg`.`nTipoIGVProc` AS `TipoIGV`,`v`.`nVentaTotApag` AS `Total`,`v`.`nVentaTotAmt` AS `nVentaTotAmt`,`v`.`nVentaSaldo` AS `nVentaSaldo` from (((((`ven_venta` `v` join `ven_cliente` `c` on((`v`.`nCliente_id` = `c`.`nCliente_id`))) join `ven_transaccion` `t` on((`t`.`nVenta_id` = `v`.`nVenta_id`))) join `ven_tipoigv` `vtg` on((`vtg`.`nTipoIGV` = `v`.`nTipoIGV`))) join `ven_personal` `p` on((`p`.`nPersonal_id` = `t`.`nPersonal_id`))) join `constante` `ct` on(((`ct`.`cConstanteValor` = `v`.`nTipoIGV`) and (`ct`.`nConstanteClase` = 2)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_credito_by_idcliente`
--

/*!50001 DROP TABLE IF EXISTS `ven_credito_by_idcliente`*/;
/*!50001 DROP VIEW IF EXISTS `ven_credito_by_idcliente`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_credito_by_idcliente` AS (select `v`.`nVenta_id` AS `id_venta`,date_format(`v`.`cVentaFecReg`,'%d/%m/%Y') AS `fechaVenta`,`v`.`cVentaEst` AS `creditoest`,`vc`.`nVenCredito_id` AS `id_credito`,`v`.`nVentaTotApag` AS `montoTotal`,`v`.`nVentaTotAmt` AS `montoPagado`,`vc`.`nVenCreditoNCuota` AS `cuotas`,`v`.`nCliente_id` AS `id_cliente`,concat(`vcl`.`cClienteApe`,', ',`vcl`.`cClienteNom`) AS `cliente` from ((`ven_credito` `vc` join `ven_venta` `v` on(((`v`.`nVenta_id` = `vc`.`nVenta_id`) and (`v`.`nVentaTipPag` = 2)))) join `ven_cliente` `vcl` on((`vcl`.`nCliente_id` = `v`.`nCliente_id`))) where (`v`.`cVentaEst` <> 0)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_cronogramapago_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_cronogramapago_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_cronogramapago_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_cronogramapago_all` AS select `vc`.`nCronograma_id` AS `nCronograma_id`,`vc`.`nCronPagoNroCuota` AS `nCronPagoNroCuota`,`vc`.`nCronPagoFecReg` AS `nCronPagoFecReg`,date_format(`vc`.`nCronPagoFecPago`,'%d/%m/%Y') AS `nCronPagoFecPago`,`vc`.`nCronPagoMonCouApg` AS `nCronPagoMonCouApg`,`vc`.`nCronPagoMonCouApl` AS `nCronPagoMonCouApl`,`vc`.`nVenCredito_id` AS `nVenCredito_id` from `ven_cronpago` `vc` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_lista_movimiento`
--

/*!50001 DROP TABLE IF EXISTS `ven_lista_movimiento`*/;
/*!50001 DROP VIEW IF EXISTS `ven_lista_movimiento`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_lista_movimiento` AS (select `vm`.`nMovimiento_id` AS `nMovimiento_id`,`vm`.`nMovimientoMonto` AS `nMovimientoMonto`,`vm`.`cMovimientoConcepto` AS `cMovimientoConcepto`,cast(`vm`.`dMovimientoFecReg` as date) AS `dMovimientoFecReg`,`co`.`cConstanteValor` AS `cConstanteValor`,ucase(`co`.`cConstanteDesc`) AS `nMovimientoTip`,`vp`.`nPersonal_id` AS `nPersonal_id`,concat(`vp`.`cPersonalApe`,' ',`vp`.`cPersonalNom`) AS `personal`,ucase(ifnull((select `c`.`cConstanteDesc` from `constante` `c` where ((`c`.`nConstanteClase` = 2) and (`c`.`cConstanteValor` = `vm`.`nMovimientoTipPag`))),'')) AS `nMovimientoTipPag` from ((`ven_movimiento` `vm` join `ven_personal` `vp` on((`vp`.`nPersonal_id` = `vm`.`nPersonal_id`))) join `constante` `co` on(((`co`.`cConstanteValor` = `vm`.`nMovimientoTip`) and (`co`.`nConstanteClase` = 9))))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_listacliente_byzona`
--

/*!50001 DROP TABLE IF EXISTS `ven_listacliente_byzona`*/;
/*!50001 DROP VIEW IF EXISTS `ven_listacliente_byzona`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_listacliente_byzona` AS select `vc`.`cClienteNom` AS `cClienteNom`,`vc`.`cClienteApe` AS `cClienteApe`,`vc`.`cClienteDNI` AS `cClienteDNI`,`vc`.`nClienteLineaOp` AS `nClienteLineaOp`,`vz`.`nZona_id` AS `nZona_id`,`vz`.`cZonaDesc` AS `cZonaDesc`,`vz`.`nUbigeo_id` AS `nUbigeo_id` from (`ven_cliente` `vc` join `ven_zona` `vz` on((`vc`.`nZona_id` = `vz`.`nZona_id`))) where (`vz`.`nZonaEst` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_listaclientedeudores`
--

/*!50001 DROP TABLE IF EXISTS `ven_listaclientedeudores`*/;
/*!50001 DROP VIEW IF EXISTS `ven_listaclientedeudores`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_listaclientedeudores` AS (select `c`.`nCliente_id` AS `id`,concat(`c`.`cClienteNom`,' ',`c`.`cClienteApe`) AS `Cliente`,`c`.`cClienteDNI` AS `DNI`,`z`.`cZonaDesc` AS `Zona`,`c`.`cClientecDir` AS `Direccion`,sum(`v`.`nVentaTotApag`) AS `TotalCredito`,sum(`v`.`nVentaTotAmt`) AS `TotalPagoRealizado`,(sum(`v`.`nVentaTotApag`) - sum(`v`.`nVentaTotAmt`)) AS `Saldo`,(case when (ifnull((sum(`v`.`nVentaTotApag`) - sum(`v`.`nVentaTotAmt`)),0.00) > 0) then 'Deuda Pendiente' else 'Deudas Cancelados' end) AS `Estado`,concat(`p`.`cPersonalNom`,' ',`p`.`cPersonalApe`) AS `Responsable` from ((((`ven_cliente` `c` join `ven_zona` `z` on((`z`.`nZona_id` = `c`.`nZona_id`))) join `ven_venta` `v` on(((`v`.`nCliente_id` = `c`.`nCliente_id`) and (`v`.`nVentaTipPag` = 2)))) join `ven_transaccion` `vt` on((`vt`.`nVenta_id` = `v`.`nVenta_id`))) join `ven_personal` `p` on((`p`.`nPersonal_id` = `vt`.`nPersonal_id`))) group by `c`.`nCliente_id`,concat(`c`.`cClienteNom`,' ',`c`.`cClienteApe`),`c`.`cClienteDNI`,`z`.`cZonaDesc`,`c`.`cClientecDir`,concat(`p`.`cPersonalNom`,' ',`p`.`cPersonalApe`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_listaclientedeudores_detallado`
--

/*!50001 DROP TABLE IF EXISTS `ven_listaclientedeudores_detallado`*/;
/*!50001 DROP VIEW IF EXISTS `ven_listaclientedeudores_detallado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_listaclientedeudores_detallado` AS (select `c`.`nCliente_id` AS `id`,concat(`c`.`cClienteNom`,' ',`c`.`cClienteApe`) AS `Cliente`,`c`.`cClienteDNI` AS `DNI`,`z`.`cZonaDesc` AS `Zona`,`c`.`cClientecDir` AS `Direccion`,`v`.`cVentaFecReg` AS `FecVenta`,sum(`v`.`nVentaTotApag`) AS `TotalCredito`,sum(`v`.`nVentaTotAmt`) AS `TotalPagoRealizado`,(sum(`v`.`nVentaTotApag`) - sum(`v`.`nVentaTotAmt`)) AS `Saldo`,ifnull((select max(`vc`.`nCronPagoFecPago`) from (`ven_cronpago` `vc` join `ven_credito` `vct` on((`vct`.`nVenCredito_id` = `vc`.`nVenCredito_id`))) where (`vct`.`nVenta_id` = `vt`.`nVenta_id`)),'') AS `FecFinalizacion`,(case when (ifnull((sum(`v`.`nVentaTotApag`) - sum(`v`.`nVentaTotAmt`)),0.00) > 0) then 'Deuda Pendiente' else 'Deudas Cancelados' end) AS `Estado`,concat(`p`.`cPersonalNom`,' ',`p`.`cPersonalApe`) AS `Responsable` from ((((`ven_cliente` `c` join `ven_zona` `z` on((`z`.`nZona_id` = `c`.`nZona_id`))) join `ven_venta` `v` on(((`v`.`nCliente_id` = `c`.`nCliente_id`) and (`v`.`nVentaTipPag` = 2)))) join `ven_transaccion` `vt` on((`vt`.`nVenta_id` = `v`.`nVenta_id`))) join `ven_personal` `p` on((`p`.`nPersonal_id` = `vt`.`nPersonal_id`))) group by `c`.`nCliente_id`,concat(`c`.`cClienteNom`,' ',`c`.`cClienteApe`),`c`.`cClienteDNI`,`z`.`cZonaDesc`,`c`.`cClientecDir`,`v`.`cVentaFecReg`,concat(`p`.`cPersonalNom`,' ',`p`.`cPersonalApe`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_listacronpago_by_venta`
--

/*!50001 DROP TABLE IF EXISTS `ven_listacronpago_by_venta`*/;
/*!50001 DROP VIEW IF EXISTS `ven_listacronpago_by_venta`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_listacronpago_by_venta` AS (select `vc`.`nVenta_id` AS `venta_id`,`vcp`.`nCronPagoNroCuota` AS `NroCuota`,cast(`vcp`.`nCronPagoFecPago` as date) AS `FecVenc`,`vcp`.`nCronPagoMonCouApg` AS `Deuda`,`vcp`.`nCronPagoMonCouApl` AS `MontoPagado`,(`vcp`.`nCronPagoMonCouApg` - `vcp`.`nCronPagoMonCouApl`) AS `Saldo`,(case when ((`vcp`.`nCronPagoMonCouApg` - `vcp`.`nCronPagoMonCouApl`) = 0) then 'Cancelada' when (`vcp`.`nCronPagoMonCouApl` < `vcp`.`nCronPagoMonCouApg`) then 'Deuda Vigente' when ((`vcp`.`nCronPagoMonCouApl` < `vcp`.`nCronPagoMonCouApg`) and (cast(`vcp`.`nCronPagoFecPago` as date) > cast(now() as date))) then 'Moroso' end) AS `Estado` from (`ven_credito` `vc` join `ven_cronpago` `vcp` on((`vcp`.`nVenCredito_id` = `vc`.`nVenCredito_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_marca_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_marca_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_marca_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_marca_all` AS (select `c`.`nMarca_id` AS `nMarca_id`,`c`.`cMarcaDesc` AS `cMarcaDesc`,`c`.`cMarcaEst` AS `cMarcaEst` from `ven_marca` `c`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_oferta_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_oferta_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_oferta_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_oferta_all` AS select `o`.`nOferta_id` AS `nOferta_id`,`o`.`cOfertaDesc` AS `cOfertaDesc`,date_format(`o`.`dOfertaFecVigente`,'%d/%m/%Y') AS `dOfertaFecVigente`,date_format(`o`.`dOfertaFecVencto`,'%d/%m/%Y') AS `dOfertaFecVencto`,`o`.`nOfertaPorc` AS `nOfertaPorc`,(case when (curdate() between cast(`o`.`dOfertaFecVigente` as date) and cast(`o`.`dOfertaFecVencto` as date)) then 1 when (curdate() < cast(`o`.`dOfertaFecVigente` as date)) then 2 when (curdate() > cast(`o`.`dOfertaFecVencto` as date)) then 3 end) AS `estado` from `oferta` `o` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_personal_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_personal_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_personal_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_personal_all` AS select `vp`.`nPersonal_id` AS `nPersonal_id`,`vp`.`nCargo_id` AS `nCargo_id`,`vc`.`nCargoDesc` AS `nCargoDesc`,`vp`.`cPersonalDNI` AS `cPersonalDNI`,`vp`.`cPersonalNom` AS `cPersonalNom`,`vp`.`cPersonalApe` AS `cPersonalApe`,`vp`.`cPersonalTelf` AS `cPersonalTelf`,`vp`.`cPersonalEmail` AS `cPersonalEmail`,date_format(`vp`.`dPersonalFec`,'%d/%m/%Y') AS `dPersonalFec`,`vp`.`cPersonalSexo` AS `cPersonalSexo`,`vp`.`cPersonalEdad` AS `cPersonalEdad`,`vp`.`cPersonalEst` AS `cPersonalEst` from (`ven_personal` `vp` join `ven_cargo` `vc` on((`vc`.`nCargo_id` = `vp`.`nCargo_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_producto_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_producto_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_producto_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_producto_all` AS (select `p`.`nProducto_id` AS `nProducto_id`,concat(`p`.`cProductoDesc`,' - ',`p`.`cProductoSerie`,' -',`p`.`cProductoTalla`) AS `cProductoDesc`,`p`.`nProductoPVenta` AS `nProductoPVenta`,ifnull((select `ct`.`cConstanteDesc` from `constante` `ct` where ((`ct`.`nConstanteClase` = 6) and (`ct`.`cConstanteValor` = `p`.`nProductoUnidMedida`))),'') AS `nProductoUnidMedida`,ifnull((select `ct`.`cConstanteDesc` from `constante` `ct` where ((`ct`.`nConstanteClase` = 5) and (`ct`.`cConstanteValor` = `p`.`nProductoTipo`))),'') AS `nProductoTipo`,`p`.`nProductoPCosto` AS `nProductoPCosto`,`p`.`cProductoCodBarra` AS `cProductoCodBarra`,`p`.`cProductoImage` AS `cProductoImage`,`p`.`nProductoStockMin` AS `nProductoStockMin`,`p`.`nProductoStockMax` AS `nProductoStockMax`,`p`.`nProductoStock` AS `nProductoStock`,`p`.`cProductoEst` AS `cProductoEst`,`p`.`nProductoPorcUti` AS `nProductoPorcUti`,`p`.`nProductoUtiBruta` AS `nProductoUtiBruta`,`v`.`nMarca_id` AS `nMarca_id`,`v`.`cMarcaDesc` AS `cMarcaDesc`,`c`.`nCategoria_id` AS `nCategoria_id`,`c`.`cCategoriaNom` AS `cCategoriaNom`,`co`.`cConstanteDesc` AS `cConstanteDesc`,`lop`.`nLocal_id` AS `nLocal_id` from ((((`producto` `p` join `local_producto` `lop` on((`lop`.`nProducto_id` = `p`.`nProducto_id`))) join `ven_marca` `v` on((`p`.`nProductoMarca` = `v`.`nMarca_id`))) join `ven_categoria` `c` on((`p`.`nCategoria_id` = `c`.`nCategoria_id`))) join `constante` `co` on(((`co`.`cConstanteValor` = `p`.`nProductoTipo`) and (`co`.`nConstanteClase` = 5)))) where ((`p`.`cProductoEst` <> 0) and (`lop`.`clocalProducto_Estado` <> 0))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_productosoferta`
--

/*!50001 DROP TABLE IF EXISTS `ven_productosoferta`*/;
/*!50001 DROP VIEW IF EXISTS `ven_productosoferta`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_productosoferta` AS select `p`.`nProducto_id` AS `nProducto_id`,concat(`p`.`cProductoDesc`,' - ',`p`.`cProductoSerie`,' - ',`p`.`cProductoTalla`) AS `producto`,concat(`p`.`nProductoPContado`,' / ',`p`.`nProductoPCredito`,' / ',`p`.`nProductoPCosto`) AS `precio`,`p`.`cProductoCodBarra` AS `cProductoCodBarra`,`m`.`cMarcaDesc` AS `cMarcaDesc`,`c`.`cCategoriaNom` AS `cCategoriaNom`,`const`.`cConstanteDesc` AS `cConstanteDesc`,`op`.`nOfertaProducto_id` AS `nOfertaProducto_id`,`op`.`nOferta_id` AS `nOferta_id`,`op`.`cOfertaProductoEst` AS `cOfertaProductoEst`,`lop`.`nLocal_id` AS `nLocal_id`,'1' AS `band` from (((((`producto` `p` join `local_producto` `lop` on((`lop`.`nProducto_id` = `p`.`nProducto_id`))) join `oferta_producto` `op` on((`op`.`nProducto_id` = `p`.`nProducto_id`))) join `ven_marca` `m` on((`p`.`nProductoMarca` = `m`.`nMarca_id`))) join `ven_categoria` `c` on((`p`.`nCategoria_id` = `c`.`nCategoria_id`))) join `constante` `const` on(((`const`.`cConstanteValor` = `p`.`nProductoTipo`) and (`const`.`nConstanteClase` = 1)))) where ((`op`.`cOfertaProductoEst` <> 0) and (`p`.`cProductoEst` <> 0)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_productosoferta_v2`
--

/*!50001 DROP TABLE IF EXISTS `ven_productosoferta_v2`*/;
/*!50001 DROP VIEW IF EXISTS `ven_productosoferta_v2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_productosoferta_v2` AS select `p`.`nProducto_id` AS `nProducto_id`,concat(`p`.`cProductoDesc`,' - ',`p`.`cProductoSerie`,' - ',`p`.`cProductoTalla`) AS `producto`,`p`.`nProductoPVenta` AS `precio`,ifnull((select `ct`.`cConstanteDesc` from `constante` `ct` where ((`ct`.`nConstanteClase` = 6) and (`ct`.`cConstanteValor` = `p`.`nProductoUnidMedida`))),'') AS `nProductoUnidMedida`,`p`.`cProductoCodBarra` AS `cProductoCodBarra`,`m`.`cMarcaDesc` AS `cMarcaDesc`,`c`.`cCategoriaNom` AS `cCategoriaNom`,`const`.`cConstanteDesc` AS `cConstanteDesc`,`op`.`nOfertaProducto_id` AS `nOfertaProducto_id`,`op`.`nOferta_id` AS `nOferta_id`,`op`.`cOfertaProductoEst` AS `cOfertaProductoEst`,`lop`.`nLocal_id` AS `nLocal_id`,'1' AS `band` from (((((`producto` `p` join `local_producto` `lop` on((`lop`.`nProducto_id` = `p`.`nProducto_id`))) join `oferta_producto` `op` on((`op`.`nProducto_id` = `p`.`nProducto_id`))) join `ven_marca` `m` on((`p`.`nProductoMarca` = `m`.`nMarca_id`))) join `ven_categoria` `c` on((`p`.`nCategoria_id` = `c`.`nCategoria_id`))) join `constante` `const` on(((`const`.`cConstanteValor` = `p`.`nProductoTipo`) and (`const`.`nConstanteClase` = 1)))) where ((`op`.`cOfertaProductoEst` <> 0) and (`p`.`cProductoEst` <> 0)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_productossinoferta`
--

/*!50001 DROP TABLE IF EXISTS `ven_productossinoferta`*/;
/*!50001 DROP VIEW IF EXISTS `ven_productossinoferta`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_productossinoferta` AS select distinct `pr`.`nProducto_id` AS `nProducto_id`,concat(`pr`.`cProductoDesc`,' - ',`pr`.`cProductoSerie`,' - ',`pr`.`cProductoTalla`) AS `producto`,concat(`pr`.`nProductoPContado`,' / ',`pr`.`nProductoPCredito`,' / ',`pr`.`nProductoPCosto`) AS `precio`,`pr`.`cProductoCodBarra` AS `cProductoCodBarra`,`vm`.`cMarcaDesc` AS `cMarcaDesc`,`vc`.`cCategoriaNom` AS `cCategoriaNom`,`const`.`cConstanteDesc` AS `cConstanteDesc`,`lop`.`nLocal_id` AS `nLocal_id` from ((((`producto` `pr` join `local_producto` `lop` on((`lop`.`nProducto_id` = `pr`.`nProducto_id`))) join `ven_marca` `vm` on((`pr`.`nProductoMarca` = `vm`.`nMarca_id`))) join `ven_categoria` `vc` on((`pr`.`nCategoria_id` = `vc`.`nCategoria_id`))) join `constante` `const` on(((`const`.`cConstanteValor` = `pr`.`nProductoTipo`) and (`const`.`nConstanteClase` = 1)))) where (not(`pr`.`nProducto_id` in (select `p`.`nProducto_id` from (`producto` `p` join `oferta_producto` `op` on((`p`.`nProducto_id` = `op`.`nProducto_id`))) where (`op`.`cOfertaProductoEst` = 1)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_productossinoferta_v2`
--

/*!50001 DROP TABLE IF EXISTS `ven_productossinoferta_v2`*/;
/*!50001 DROP VIEW IF EXISTS `ven_productossinoferta_v2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_productossinoferta_v2` AS select distinct `pr`.`nProducto_id` AS `nProducto_id`,concat(`pr`.`cProductoDesc`,' - ',`pr`.`cProductoSerie`,' - ',`pr`.`cProductoTalla`) AS `producto`,`pr`.`nProductoPVenta` AS `precio`,ifnull((select `ct`.`cConstanteDesc` from `constante` `ct` where ((`ct`.`nConstanteClase` = 6) and (`ct`.`cConstanteValor` = `pr`.`nProductoUnidMedida`))),'') AS `nProductoUnidMedida`,`pr`.`cProductoCodBarra` AS `cProductoCodBarra`,`vm`.`cMarcaDesc` AS `cMarcaDesc`,`vc`.`cCategoriaNom` AS `cCategoriaNom`,`const`.`cConstanteDesc` AS `cConstanteDesc`,`lop`.`nLocal_id` AS `nLocal_id` from ((((`producto` `pr` join `local_producto` `lop` on((`lop`.`nProducto_id` = `pr`.`nProducto_id`))) join `ven_marca` `vm` on((`pr`.`nProductoMarca` = `vm`.`nMarca_id`))) join `ven_categoria` `vc` on((`pr`.`nCategoria_id` = `vc`.`nCategoria_id`))) join `constante` `const` on(((`const`.`cConstanteValor` = `pr`.`nProductoTipo`) and (`const`.`nConstanteClase` = 1)))) where (not(`pr`.`nProducto_id` in (select `p`.`nProducto_id` from (`producto` `p` join `oferta_producto` `op` on((`p`.`nProducto_id` = `op`.`nProducto_id`))) where (`op`.`cOfertaProductoEst` = 1)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_productosventa`
--

/*!50001 DROP TABLE IF EXISTS `ven_productosventa`*/;
/*!50001 DROP VIEW IF EXISTS `ven_productosventa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_productosventa` AS select `p`.`nProducto_id` AS `nProducto_id`,concat(`p`.`cProductoDesc`,' - ',`p`.`cProductoSerie`,' -',`p`.`cProductoTalla`) AS `cProductoDesc`,`p`.`nProductoMarca` AS `nProductoMarca`,`m`.`cMarcaDesc` AS `cMarcaDesc`,`p`.`cProductoCodBarra` AS `cProductoCodBarra`,`p`.`nCategoria_id` AS `nCategoria_id`,`c`.`cCategoriaNom` AS `cCategoriaNom`,`p`.`nProductoStock` AS `nProductoStock`,`p`.`nProductoPCosto` AS `nProductoPCosto`,`p`.`nProductoPVenta` AS `nProductoPVenta`,ifnull((select `ct`.`cConstanteDesc` from `constante` `ct` where ((`ct`.`nConstanteClase` = 6) and (`ct`.`cConstanteValor` = `p`.`nProductoUnidMedida`))),'') AS `nProductoUnidMedida`,ifnull((select `ct`.`cConstanteDesc` from `constante` `ct` where ((`ct`.`nConstanteClase` = 5) and (`ct`.`cConstanteValor` = `p`.`nProductoTipo`))),'') AS `nProductoTipo`,round(((`p`.`nProductoPCredito` * (100 - `op`.`nOfertaProductoPorc`)) / 100),2) AS `PrecioCredito_Dscto`,round(((`p`.`nProductoPContado` * (100 - `op`.`nOfertaProductoPorc`)) / 100),2) AS `PrecioContado_Dscto`,`op`.`nOfertaProductoPorc` AS `nOfertaProductoPorc`,`o`.`cOfertaDesc` AS `cDetVentaDesc`,`lop`.`nLocal_id` AS `nLocal_id` from (((((`producto` `p` join `local_producto` `lop` on((`lop`.`nProducto_id` = `p`.`nProducto_id`))) join `oferta_producto` `op` on((`p`.`nProducto_id` = `op`.`nProducto_id`))) join `oferta` `o` on((`o`.`nOferta_id` = `op`.`nOferta_id`))) join `ven_marca` `m` on((`p`.`nProductoMarca` = `m`.`nMarca_id`))) join `ven_categoria` `c` on((`p`.`nCategoria_id` = `c`.`nCategoria_id`))) where exists(select 1 from `oferta_producto` `op` where (`op`.`nProducto_id` = `p`.`nProducto_id`)) group by `p`.`nProducto_id` union all (select `p`.`nProducto_id` AS `nProducto_id`,concat(`p`.`cProductoDesc`,' - ',`p`.`cProductoSerie`,' -',`p`.`cProductoTalla`) AS `cProductoDesc`,`p`.`nProductoMarca` AS `nProductoMarca`,`m`.`cMarcaDesc` AS `cMarcaDesc`,`p`.`cProductoCodBarra` AS `cProductoCodBarra`,`p`.`nCategoria_id` AS `nCategoria_id`,`c`.`cCategoriaNom` AS `cCategoriaNom`,`p`.`nProductoStock` AS `nProductoStock`,`p`.`nProductoPCosto` AS `nProductoPCosto`,`p`.`nProductoPVenta` AS `nProductoPVenta`,ifnull((select `ct`.`cConstanteDesc` from `constante` `ct` where ((`ct`.`nConstanteClase` = 6) and (`ct`.`cConstanteValor` = `p`.`nProductoUnidMedida`))),'') AS `nProductoUnidMedida`,ifnull((select `ct`.`cConstanteDesc` from `constante` `ct` where ((`ct`.`nConstanteClase` = 5) and (`ct`.`cConstanteValor` = `p`.`nProductoTipo`))),'') AS `nProductoTipo`,`p`.`nProductoPCredito` AS `PrecioCredito_Dscto`,`p`.`nProductoPContado` AS `PrecioContado_Dscto`,(select (case `opx`.`nOfertaProductoPorc` when NULL then 0 else 0 end)) AS `OfertaProductoPorc`,(select (case `o`.`cOfertaDesc` when NULL then '' else '' end)) AS `cDetVentaDesc`,`lop`.`nLocal_id` AS `nLocal_id` from (((((`producto` `p` join `oferta_producto` `opx`) join `local_producto` `lop` on((`lop`.`nProducto_id` = `p`.`nProducto_id`))) join `oferta` `o` on((`o`.`nOferta_id` = `opx`.`nOferta_id`))) join `ven_marca` `m` on((`p`.`nProductoMarca` = `m`.`nMarca_id`))) join `ven_categoria` `c` on((`p`.`nCategoria_id` = `c`.`nCategoria_id`))) where (not(exists(select 1 from `oferta_producto` `op` where (`op`.`nProducto_id` = `p`.`nProducto_id`)))) group by `p`.`nProducto_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_tipoigv_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_tipoigv_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_tipoigv_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_tipoigv_all` AS (select `igv`.`nTipoIGV` AS `nTipoIGV`,`igv`.`cTipoIGV` AS `cTipoIGV`,`igv`.`nTipoIGVProc` AS `nTipoIGVProc`,date_format(`igv`.`dTipoIGVFecReg`,'%d/%m/%Y') AS `dTipoIGVFecReg`,`igv`.`cTipoIGVEst` AS `cTipoIGVEst` from `ven_tipoigv` `igv`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_tipomodena_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_tipomodena_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_tipomodena_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_tipomodena_all` AS (select `tm`.`nTipoMoneda` AS `nTipoMoneda`,`tm`.`cTipoMonedaDesc` AS `cTipoMonedaDesc`,`tm`.`nTipoMonedaMont` AS `nTipoMonedaMont`,`tm`.`cTipoMonedaEst` AS `cTipoMonedaEst`,(case when (`tm`.`cTipoMonedaEst` = '1') then 'Activo' else 'Inactivo' end) AS `estado` from `ven_tipomoneda` `tm`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_trabajadores_activos`
--

/*!50001 DROP TABLE IF EXISTS `ven_trabajadores_activos`*/;
/*!50001 DROP VIEW IF EXISTS `ven_trabajadores_activos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_trabajadores_activos` AS select `v`.`nPersonal_id` AS `nPersonal_id`,`v`.`cPersonalNom` AS `cPersonalNom`,`v`.`cPersonalApe` AS `cPersonalApe`,`v`.`cPersonalDNI` AS `cPersonalDNI`,`v`.`cPersonalTelf` AS `cPersonalTelf`,`ul`.`nLocal_id` AS `id_local` from ((`ven_personal` `v` join `users` `u` on((`u`.`nPersonal_id` = `v`.`nPersonal_id`))) join `users_local` `ul` on((`ul`.`users_id` = `u`.`id`))) where (`ul`.`cUsersLocalEstado` = '1') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_trabajadores_no_user`
--

/*!50001 DROP TABLE IF EXISTS `ven_trabajadores_no_user`*/;
/*!50001 DROP VIEW IF EXISTS `ven_trabajadores_no_user`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_trabajadores_no_user` AS select `v`.`nPersonal_id` AS `nPersonal_id`,`v`.`cPersonalNom` AS `cPersonalNom`,`v`.`cPersonalApe` AS `cPersonalApe`,`v`.`cPersonalDNI` AS `cPersonalDNI`,`v`.`cPersonalTelf` AS `cPersonalTelf` from `ven_personal` `v` where (not(exists(select 1 from `users` `u` where ((`u`.`nPersonal_id` = `v`.`nPersonal_id`) and (`u`.`active` <> 0))))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_trabajadores_sinzona`
--

/*!50001 DROP TABLE IF EXISTS `ven_trabajadores_sinzona`*/;
/*!50001 DROP VIEW IF EXISTS `ven_trabajadores_sinzona`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_trabajadores_sinzona` AS select `per`.`nPersonal_id` AS `nPersonal_id`,`per`.`nCargo_id` AS `nCargo_id`,`per`.`cPersonalDNI` AS `cPersonalDNI`,`per`.`cPersonalNom` AS `cPersonalNom`,`per`.`cPersonalApe` AS `cPersonalApe`,`per`.`cPersonalTelf` AS `cPersonalTelf`,`per`.`cPersonalEmail` AS `cPersonalEmail`,`per`.`dPersonalFec` AS `dPersonalFec`,`per`.`cPersonalSexo` AS `cPersonalSexo`,`per`.`cPersonalEst` AS `cPersonalEst`,`per`.`cPersonalEdad` AS `cPersonalEdad` from (`ven_zonapersonal` `p` join `ven_personal` `per` on((`per`.`nPersonal_id` = `p`.`nPersonal_id`))) where (`p`.`nZonapersonalEst` = 0) union all (select `per`.`nPersonal_id` AS `nPersonal_id`,`per`.`nCargo_id` AS `nCargo_id`,`per`.`cPersonalDNI` AS `cPersonalDNI`,`per`.`cPersonalNom` AS `cPersonalNom`,`per`.`cPersonalApe` AS `cPersonalApe`,`per`.`cPersonalTelf` AS `cPersonalTelf`,`per`.`cPersonalEmail` AS `cPersonalEmail`,`per`.`dPersonalFec` AS `dPersonalFec`,`per`.`cPersonalSexo` AS `cPersonalSexo`,`per`.`cPersonalEst` AS `cPersonalEst`,`per`.`cPersonalEdad` AS `cPersonalEdad` from `ven_personal` `per` where ((not(exists(select 1 from `ven_zonapersonal` `z` where (`z`.`nPersonal_id` = `per`.`nPersonal_id`)))) and (`per`.`cPersonalEst` <> 0))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_venta_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_venta_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_venta_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_venta_all` AS select date_format(`v`.`cVentaFecReg`,'%d/%m/%Y') AS `cVentaFecReg`,`v`.`cVentaFecReg` AS `cVentaFecReg_temp`,`c`.`nCliente_id` AS `nCliente_id`,concat(`c`.`cClienteNom`,' ',`c`.`cClienteApe`) AS `cClienteNom`,concat(`p`.`cPersonalNom`,' ',`p`.`cPersonalApe`) AS `cPersonalNom`,`p`.`nPersonal_id` AS `nPersonal_id`,`v`.`nVentaTipPag` AS `nVentaTipPag`,`v`.`nVentaTotApag` AS `VentaTotal`,`v`.`cVentaEst` AS `cVentaEst`,`v`.`nVenta_id` AS `nVenta_id`,`ct`.`cConstanteDesc` AS `tipo_pago`,cast(sum(`d`.`nDetVentaCant`) as unsigned) AS `cant_prod` from (((((`ven_venta` `v` join `ven_cliente` `c` on((`v`.`nCliente_id` = `c`.`nCliente_id`))) join `ven_transaccion` `t` on((`t`.`nVenta_id` = `v`.`nVenta_id`))) join `ven_personal` `p` on((`p`.`nPersonal_id` = `t`.`nPersonal_id`))) join `constante` `ct` on(((`ct`.`cConstanteValor` = `v`.`nTipoIGV`) and (`ct`.`nConstanteClase` = 2)))) join `ven_detventa` `d` on((`d`.`nVenta_id` = `v`.`nVenta_id`))) group by `v`.`nVenta_id`,`v`.`cVentaFecReg`,`c`.`nCliente_id`,`c`.`cClienteNom`,`c`.`cClienteApe`,`p`.`cPersonalNom`,`p`.`cPersonalApe`,`p`.`nPersonal_id`,`v`.`nVentaTipPag`,`v`.`nVentaTotApag`,`v`.`cVentaEst`,`ct`.`cConstanteDesc` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_zona_activo_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_zona_activo_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_zona_activo_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_zona_activo_all` AS (select `vz`.`nZona_id` AS `nZona_id`,`vz`.`cZonaDesc` AS `cZonaDesc`,`vz`.`nZonaEst` AS `nZonaEst`,concat(`ubdist`.`cUbigeoDesc`,',',`ubprov`.`cUbigeoDesc`,',',`ubidep`.`cUbigeoDesc`) AS `des_ubigeo`,(case when (`vz`.`nZonaEst` = 1) then 'Activo' else 'Inactivo' end) AS `estado` from (((`ven_zona` `vz` join `ubigeo` `ubdist` on((`vz`.`nUbigeo_id` = `ubdist`.`nUbigeo_id`))) join `ubigeo` `ubprov` on((`ubdist`.`nUbigeoDep` = `ubprov`.`nUbigeo_id`))) join `ubigeo` `ubidep` on((`ubprov`.`nUbigeoDep` = `ubidep`.`nUbigeo_id`))) where (`vz`.`nZonaEst` = '1')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_zona_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_zona_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_zona_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_zona_all` AS (select `vz`.`nZona_id` AS `nZona_id`,`vz`.`cZonaDesc` AS `cZonaDesc`,`vz`.`nZonaEst` AS `nZonaEst`,`vz`.`nUbigeo_id` AS `nUbigeo_id`,concat(`ubdist`.`cUbigeoDesc`,',',`ubprov`.`cUbigeoDesc`,',',`ubidep`.`cUbigeoDesc`) AS `des_ubigeo` from (((`ven_zona` `vz` join `ubigeo` `ubdist` on((`vz`.`nUbigeo_id` = `ubdist`.`nUbigeo_id`))) join `ubigeo` `ubprov` on((`ubdist`.`nUbigeoDep` = `ubprov`.`nUbigeo_id`))) join `ubigeo` `ubidep` on((`ubprov`.`nUbigeoDep` = `ubidep`.`nUbigeo_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ven_zonapersonal_all`
--

/*!50001 DROP TABLE IF EXISTS `ven_zonapersonal_all`*/;
/*!50001 DROP VIEW IF EXISTS `ven_zonapersonal_all`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dicars_user`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `ven_zonapersonal_all` AS (select `vzp`.`nZonaPersonal_id` AS `nZonaPersonal_id`,`z`.`cZonaDesc` AS `cZonaDesc`,`z`.`nZona_id` AS `nZona_id`,concat(`p`.`cPersonalNom`,', ',`p`.`cPersonalApe`) AS `persona`,concat(`ubdist`.`cUbigeoDesc`,',',`ubprov`.`cUbigeoDesc`,',',`ubidep`.`cUbigeoDesc`) AS `des_ubigeo`,`vzp`.`nZonapersonalEst` AS `nZonapersonalEst` from (((((`ven_zonapersonal` `vzp` join `ven_zona` `z` on((`z`.`nZona_id` = `vzp`.`nZona_id`))) join `ven_personal` `p` on((`p`.`nPersonal_id` = `vzp`.`nPersonal_id`))) join `ubigeo` `ubdist` on((`z`.`nUbigeo_id` = `ubdist`.`nUbigeo_id`))) join `ubigeo` `ubprov` on((`ubdist`.`nUbigeoDep` = `ubprov`.`nUbigeo_id`))) join `ubigeo` `ubidep` on((`ubprov`.`nUbigeoDep` = `ubidep`.`nUbigeo_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-01 12:05:57
