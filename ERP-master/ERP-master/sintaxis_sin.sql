/*
Navicat MySQL Data Transfer

Source Server         : Sintaxis.cl
Source Server Version : 50173
Source Host           : 64.37.54.237:3306
Source Database       : sintaxis_sin

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2014-08-04 21:55:37
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `bodegas`
-- ----------------------------
DROP TABLE IF EXISTS `bodegas`;
CREATE TABLE `bodegas` (
  `CODIGO_B` decimal(4,0) NOT NULL,
  `CODIGO_SUC` decimal(4,0) DEFAULT NULL,
  `GLOSA_B` text,
  `ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`CODIGO_B`),
  KEY `FK_SUC_BOD` (`CODIGO_SUC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bodegas
-- ----------------------------
INSERT INTO `bodegas` VALUES ('100', '1', 'BODEGA CENTRAL', '1');
INSERT INTO `bodegas` VALUES ('200', '2', 'BODEGA VITACURA', '1');
INSERT INTO `bodegas` VALUES ('201', '2', 'MERMAS', '1');
INSERT INTO `bodegas` VALUES ('101', '1', 'SERVICIO TECNICO', '1');

-- ----------------------------
-- Table structure for `clientes`
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `RUT` decimal(8,0) NOT NULL,
  `DV` text NOT NULL,
  `CODIGO_R` int(4) DEFAULT NULL,
  `CODIGO_C` int(4) DEFAULT NULL,
  `NOMBRE1` text,
  `NOMBRE2` text,
  `APELLIDO1` text,
  `APELLIDO2` text,
  `DIRE_CLI` text,
  `TELEF_CLI` decimal(10,0) DEFAULT NULL,
  `TIPO_CLI` int(1) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  PRIMARY KEY (`RUT`),
  KEY `FK_COMUNA_CLTE` (`CODIGO_C`),
  KEY `FK_REGION_CLTE` (`CODIGO_R`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES ('14196493', '3', '13', '134', 'LUIS', 'ANTONIO', 'PRIETO', 'PRIETO', 'GRAN AVENIDA #5888', '61403225', '1', '1');
INSERT INTO `clientes` VALUES ('78794310', '1', '13', '133', 'LOS ROTOS', 'SOCIEDAD DE INVERSION LOPEZ S.A', 'VENTAS DE INSUMOS DE BAILE y YOGA', 'JOSE LOPEZ', 'LOS 3 ANTONIOS #312', '2324456', '2', '0');
INSERT INTO `clientes` VALUES ('7894311', '4', '1', '12', 'PIZZA LOCA', 'INVERSIONES PEREZ LTDA', 'VENTA DE COMIDA RAPIDA', 'LUIS PEREZ', 'AV DEL SOL #776', '3322118', '2', '1');
INSERT INTO `clientes` VALUES ('12345678', '5', '6', '61', 'LUIS', 'ANTONIO', 'CHAMORRO', 'PRIETO', 'CASILDA #343', '123456789', '1', '1');
INSERT INTO `clientes` VALUES ('79999999', '8', '13', '131', 'Lider', 'Soc comercial d&s', 'distribucion de alimentos', 'andres tapia', 'ahumada 232', '2321156', '2', '1');

-- ----------------------------
-- Table structure for `comuna`
-- ----------------------------
DROP TABLE IF EXISTS `comuna`;
CREATE TABLE `comuna` (
  `CODIGO_C` decimal(4,0) NOT NULL,
  `CODIGO_R` decimal(4,0) DEFAULT NULL,
  `GLOSA_C` text,
  PRIMARY KEY (`CODIGO_C`),
  KEY `FK_REGION_COMUNA` (`CODIGO_R`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comuna
-- ----------------------------
INSERT INTO `comuna` VALUES ('131', '13', 'SANTIAGO CENTRO');
INSERT INTO `comuna` VALUES ('132', '13', 'PUDAHUEL');
INSERT INTO `comuna` VALUES ('11', '1', 'ALTO HOSPICIO');
INSERT INTO `comuna` VALUES ('12', '1', 'IQUIQUE');
INSERT INTO `comuna` VALUES ('61', '6', 'RANCAGUA');
INSERT INTO `comuna` VALUES ('62', '6', 'CODEGUA');
INSERT INTO `comuna` VALUES ('133', '13', 'PROVIDENCIA');
INSERT INTO `comuna` VALUES ('134', '13', 'SAN MIGUEL');
INSERT INTO `comuna` VALUES ('81', '8', 'CONCEPCION');

-- ----------------------------
-- Table structure for `configuracion`
-- ----------------------------
DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE `configuracion` (
  `IDIOMA` text,
  `AÑO` int(4) DEFAULT NULL,
  `SERIE` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of configuracion
-- ----------------------------
INSERT INTO `configuracion` VALUES ('cl', '2013', null);

-- ----------------------------
-- Table structure for `det_boleta`
-- ----------------------------
DROP TABLE IF EXISTS `det_boleta`;
CREATE TABLE `det_boleta` (
  `NRO_BOLETA` decimal(9,0) DEFAULT NULL,
  `COD_PROD_BOL` text,
  `NETO_PROD_BOL` decimal(8,0) DEFAULT NULL,
  `IVA_PROD_BOL` decimal(8,0) DEFAULT NULL,
  `TOTAL_PROD_BOL` decimal(8,0) DEFAULT NULL,
  KEY `FK_ENC_DET_BOL` (`NRO_BOLETA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of det_boleta
-- ----------------------------

-- ----------------------------
-- Table structure for `det_fact`
-- ----------------------------
DROP TABLE IF EXISTS `det_fact`;
CREATE TABLE `det_fact` (
  `NRO_FACT` decimal(9,0) DEFAULT NULL,
  `COD_PROD_FACT` text,
  `NETO_PROD_FACT` decimal(8,0) DEFAULT NULL,
  `IVA_PROD_FACT` decimal(8,0) DEFAULT NULL,
  `TOTAL_PROD_FACT` decimal(8,0) DEFAULT NULL,
  KEY `FK_ENCFACT_DETFAC` (`NRO_FACT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of det_fact
-- ----------------------------

-- ----------------------------
-- Table structure for `det_pedido`
-- ----------------------------
DROP TABLE IF EXISTS `det_pedido`;
CREATE TABLE `det_pedido` (
  `nro_pedido` int(6) NOT NULL,
  `cod_prod` char(50) NOT NULL,
  `cantidad` int(6) NOT NULL,
  KEY `nro_pedido` (`nro_pedido`),
  KEY `cod_prod` (`cod_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of det_pedido
-- ----------------------------

-- ----------------------------
-- Table structure for `documentos`
-- ----------------------------
DROP TABLE IF EXISTS `documentos`;
CREATE TABLE `documentos` (
  `CODIGO_D` int(4) NOT NULL AUTO_INCREMENT,
  `GLOSA_D` text,
  `ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`CODIGO_D`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of documentos
-- ----------------------------
INSERT INTO `documentos` VALUES ('1', 'BOLETA', '1');
INSERT INTO `documentos` VALUES ('2', 'FACTURA', '1');
INSERT INTO `documentos` VALUES ('3', 'NOTA DE CREDITO', '1');

-- ----------------------------
-- Table structure for `enc_boleta`
-- ----------------------------
DROP TABLE IF EXISTS `enc_boleta`;
CREATE TABLE `enc_boleta` (
  `NRO_BOLETA` decimal(9,0) NOT NULL,
  `CODIGO_D` decimal(4,0) DEFAULT NULL,
  `CODIGO_F_PAGO` decimal(4,0) DEFAULT NULL,
  `FECHA_BOL` date DEFAULT NULL,
  `CLIENTE_BOL` decimal(8,0) DEFAULT NULL,
  `NETO_TOT_BOL` decimal(8,0) DEFAULT NULL,
  `IVA_TOT_BOL` decimal(8,0) DEFAULT NULL,
  `TOTAL_BOL` decimal(9,0) DEFAULT NULL,
  PRIMARY KEY (`NRO_BOLETA`),
  KEY `FK_FP_BOL` (`CODIGO_F_PAGO`),
  KEY `FK_TIPDOC_BOLETA` (`CODIGO_D`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of enc_boleta
-- ----------------------------

-- ----------------------------
-- Table structure for `enc_fact`
-- ----------------------------
DROP TABLE IF EXISTS `enc_fact`;
CREATE TABLE `enc_fact` (
  `NRO_FACT` decimal(9,0) NOT NULL,
  `CODIGO_D` decimal(4,0) DEFAULT NULL,
  `CODIGO_F_PAGO` decimal(4,0) DEFAULT NULL,
  `FECHA_FACT` date DEFAULT NULL,
  `CLIENTE_FACT` decimal(8,0) DEFAULT NULL,
  `NETO_TOT_FACT` decimal(8,0) DEFAULT NULL,
  `IVA_TOT_FACT` decimal(8,0) DEFAULT NULL,
  `TOTAL_FACT` decimal(9,0) DEFAULT NULL,
  PRIMARY KEY (`NRO_FACT`),
  KEY `FK_FP_FACT` (`CODIGO_F_PAGO`),
  KEY `FK_TIPDOC_FACT` (`CODIGO_D`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of enc_fact
-- ----------------------------

-- ----------------------------
-- Table structure for `enc_pedido`
-- ----------------------------
DROP TABLE IF EXISTS `enc_pedido`;
CREATE TABLE `enc_pedido` (
  `nro_pedido` int(6) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) NOT NULL,
  `fecha_ped` varchar(8) NOT NULL,
  `sucursal` int(6) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`nro_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of enc_pedido
-- ----------------------------

-- ----------------------------
-- Table structure for `estock`
-- ----------------------------
DROP TABLE IF EXISTS `estock`;
CREATE TABLE `estock` (
  `CODIGO_S` int(6) NOT NULL,
  `CODIGO_B` int(6) NOT NULL,
  `CODIGO_PRO` char(50) NOT NULL,
  `DISPONIBLE` decimal(9,0) NOT NULL,
  `RESERVADO` decimal(9,0) DEFAULT NULL,
  `EN_RUTA` decimal(9,0) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_B`),
  KEY `FK_BODEGA_STOCK` (`CODIGO_B`),
  KEY `FK_PROD_STOCK` (`CODIGO_PRO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of estock
-- ----------------------------
INSERT INTO `estock` VALUES ('1', '100', '1001', '375', '0', '0');
INSERT INTO `estock` VALUES ('2', '200', '1001', '325', '0', '0');

-- ----------------------------
-- Table structure for `familia`
-- ----------------------------
DROP TABLE IF EXISTS `familia`;
CREATE TABLE `familia` (
  `CODIGO_F` decimal(4,0) NOT NULL,
  `GLOSA_F` text,
  `ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`CODIGO_F`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of familia
-- ----------------------------
INSERT INTO `familia` VALUES ('10', 'PLACAS BASE', '1');
INSERT INTO `familia` VALUES ('20', 'PROCESADORES', '1');
INSERT INTO `familia` VALUES ('30', 'DISCOS DUROS', '1');
INSERT INTO `familia` VALUES ('40', 'GABINETES TOWER', '1');
INSERT INTO `familia` VALUES ('50', 'MEMORIAS DDR 3', '1');
INSERT INTO `familia` VALUES ('60', 'MEMORIAS DDR 2', '1');
INSERT INTO `familia` VALUES ('70', 'MONITORES LED', '1');
INSERT INTO `familia` VALUES ('80', 'RATONES', '1');
INSERT INTO `familia` VALUES ('90', 'MOUSE PADS', '1');
INSERT INTO `familia` VALUES ('100', 'VENTILADORES', '0');
INSERT INTO `familia` VALUES ('110', 'DISCO DURO EXTERNO', '1');
INSERT INTO `familia` VALUES ('8349', 'DDR3 1GB', '0');
INSERT INTO `familia` VALUES ('9999', 'OPTICOS', '1');
INSERT INTO `familia` VALUES ('878', 'SERVIDORES', '1');

-- ----------------------------
-- Table structure for `forma_pago`
-- ----------------------------
DROP TABLE IF EXISTS `forma_pago`;
CREATE TABLE `forma_pago` (
  `CODIGO_F_PAGO` int(4) NOT NULL AUTO_INCREMENT,
  `GLOSA_F_PAGO` text,
  `ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`CODIGO_F_PAGO`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of forma_pago
-- ----------------------------
INSERT INTO `forma_pago` VALUES ('1', 'EFECTIVO', '1');
INSERT INTO `forma_pago` VALUES ('2', 'CHEQUE AL DIA', '1');
INSERT INTO `forma_pago` VALUES ('3', 'CHEQUE AL DIA Y 30', '1');
INSERT INTO `forma_pago` VALUES ('4', 'CHEQUE AL DIA, 30 y 60', '1');
INSERT INTO `forma_pago` VALUES ('5', 'tarjeta debito cualquier bco', '1');
INSERT INTO `forma_pago` VALUES ('6', 'TARJETA DE CREDITO VISA', '1');
INSERT INTO `forma_pago` VALUES ('7', 'TARJETA DE CREDITO MASTERCARD', '1');
INSERT INTO `forma_pago` VALUES ('8', 'TARJETA DE CREDITO AMERICAN', '1');

-- ----------------------------
-- Table structure for `impuesto`
-- ----------------------------
DROP TABLE IF EXISTS `impuesto`;
CREATE TABLE `impuesto` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `NOM_IMPUESTO` text NOT NULL,
  `VALOR` float(4,1) NOT NULL,
  `FECHA_CREACION` text NOT NULL,
  `ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of impuesto
-- ----------------------------
INSERT INTO `impuesto` VALUES ('1', 'ITE', '0.8', '18/08/2013', '1');
INSERT INTO `impuesto` VALUES ('2', 'Tabacos', '1.5', '18/08/2013', '1');
INSERT INTO `impuesto` VALUES ('3', 'IVA', '19.0', '18/08/2013', '1');
INSERT INTO `impuesto` VALUES ('4', 'COMEX', '3.0', '18/08/2013', '1');
INSERT INTO `impuesto` VALUES ('5', 'LICORES', '27.0', '18/08/2013', '1');
INSERT INTO `impuesto` VALUES ('6', ' Suntuarios', '50.0', '18/08/2013', '1');
INSERT INTO `impuesto` VALUES ('7', 'Servicios', '10.0', '18/08/2013', '1');
INSERT INTO `impuesto` VALUES ('11', 'importacion', '1.1', '18/08/2013', '1');

-- ----------------------------
-- Table structure for `medidas`
-- ----------------------------
DROP TABLE IF EXISTS `medidas`;
CREATE TABLE `medidas` (
  `COD_MEDIDA` int(4) NOT NULL AUTO_INCREMENT,
  `GLOSA_MEDIDA` text,
  `ESTADO` int(1) DEFAULT NULL,
  PRIMARY KEY (`COD_MEDIDA`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of medidas
-- ----------------------------
INSERT INTO `medidas` VALUES ('1', 'UNIDAD', '1');
INSERT INTO `medidas` VALUES ('2', 'KILOGRAMO', '1');
INSERT INTO `medidas` VALUES ('3', 'METRO', '1');
INSERT INTO `medidas` VALUES ('4', 'BOX', '1');

-- ----------------------------
-- Table structure for `moneda`
-- ----------------------------
DROP TABLE IF EXISTS `moneda`;
CREATE TABLE `moneda` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `CODIGO_MONEDA` text NOT NULL,
  `FECHA_CREACION` text NOT NULL,
  `ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of moneda
-- ----------------------------
INSERT INTO `moneda` VALUES ('1', 'CLP', '09/03/2012', '1');
INSERT INTO `moneda` VALUES ('2', 'USD DOLAR', '19/09/2013', '1');
INSERT INTO `moneda` VALUES ('3', 'EURO', '15/10/2013', '1');

-- ----------------------------
-- Table structure for `movimientos`
-- ----------------------------
DROP TABLE IF EXISTS `movimientos`;
CREATE TABLE `movimientos` (
  `NUN_MOVIN` int(6) NOT NULL AUTO_INCREMENT,
  `FECHA_MOVIM` text NOT NULL,
  `CODIGO_PRO` char(50) NOT NULL,
  `SUC_ORIGEN` decimal(4,0) NOT NULL,
  `BOD_ORIGEN` decimal(4,0) NOT NULL,
  `SUC_DESTINO` decimal(4,0) NOT NULL,
  `BOD_DESTINO` decimal(4,0) NOT NULL,
  `CANTIDAD` decimal(9,0) NOT NULL,
  PRIMARY KEY (`NUN_MOVIN`),
  KEY `FK_PROD_MOVIM` (`CODIGO_PRO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of movimientos
-- ----------------------------

-- ----------------------------
-- Table structure for `perfiles`
-- ----------------------------
DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE `perfiles` (
  `CODIGO_P` decimal(4,0) NOT NULL,
  `GLOSA_P` text,
  `MENU_ASOC` text,
  `ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`CODIGO_P`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perfiles
-- ----------------------------
INSERT INTO `perfiles` VALUES ('1', 'ADMINISTRADOR', 'ADMINISTRACION', '1');
INSERT INTO `perfiles` VALUES ('2', 'BODEGUERO', 'BODEGA', '0');
INSERT INTO `perfiles` VALUES ('3', 'VENDEDOR', 'VENTAS', '1');
INSERT INTO `perfiles` VALUES ('4', 'CAJERO', 'VENTAS', '1');
INSERT INTO `perfiles` VALUES ('5', 'CONTADOR', 'CONTABILIDAD', '1');
INSERT INTO `perfiles` VALUES ('6', 'ANALISTA', 'CONTABILIDAD', '1');
INSERT INTO `perfiles` VALUES ('7', 'SECRETARIA', 'CONTABILIDAD', '1');
INSERT INTO `perfiles` VALUES ('8', 'SICOLOGO', 'RRHH', '1');

-- ----------------------------
-- Table structure for `productos`
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `CODIGO_PRO` char(50) NOT NULL,
  `CODIGO_F` decimal(4,0) DEFAULT NULL,
  `CODIGO_SF` decimal(4,0) DEFAULT NULL,
  `RUT_P` decimal(8,0) DEFAULT NULL,
  `NOM_PRO` text,
  `UNIDAD_MEDIDA` int(4) DEFAULT NULL,
  `FEC_CREA` text,
  `ESTADO_PRO` decimal(1,0) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_PRO`),
  KEY `FK_FAMMILIA_PROD` (`CODIGO_F`),
  KEY `FK_PROV_PROD` (`RUT_P`),
  KEY `FK_SUBFAMILIA_PROD` (`CODIGO_SF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('1001', '20', '201', '78794310', 'PROCESADOR DUAL CORE 2GHZ', '1', '2012-05-22', '0');
INSERT INTO `productos` VALUES ('13375', '110', '1333', '78794310', 'Seagate Expansion Desktop 3TB', '1', '2013-10-14', '1');
INSERT INTO `productos` VALUES ('8583', '110', '1333', '78794310', 'WD Disco Externo 1TB 3.5', '1', '2013-10-14', '1');
INSERT INTO `productos` VALUES ('10600', '50', '8349', '78794310', 'DDR3 1GB 1333MHz PC3-10600 ', '1', '15/10/2013', '1');
INSERT INTO `productos` VALUES ('14124', '9999', '9999', '78794310', 'DVDRW SATA 24x Negro OEM ', '1', '28/10/2013', '1');
INSERT INTO `productos` VALUES ('11987', '9999', '777', '78794310', 'Blu-Ray Grabador 14x WH14NS40 ', '1', '28/10/2013', '1');
INSERT INTO `productos` VALUES ('2121222', '10', '101', '78794310', 'INTEL CHIPSET 887', '1', '21/11/2013', '1');
INSERT INTO `productos` VALUES ('3433333', '80', '105', '78794310', 'MICRO RED LED', '1', '25/11/2013', '1');

-- ----------------------------
-- Table structure for `proveedores`
-- ----------------------------
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `RUT_P` decimal(8,0) NOT NULL,
  `DV_P` text,
  `CODIGO_R` decimal(4,0) DEFAULT NULL,
  `CODIGO_C` decimal(4,0) DEFAULT NULL,
  `RAZON_S` text,
  `NOMBRE_F` text,
  `GIRO` text,
  `DIREC_P` text,
  `TELEF_P` decimal(10,0) DEFAULT NULL,
  `CONTACTO_P` text,
  `ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`RUT_P`),
  KEY `FK_COMUNA_PROVEEDOR` (`CODIGO_C`),
  KEY `FK_REGION_PROVEEDOR` (`CODIGO_R`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of proveedores
-- ----------------------------
INSERT INTO `proveedores` VALUES ('79794310', '1', '6', '61', 'LIMPIADORES S.A', 'LIMPIADICTOS', 'VENTA DE ROPA', 'CAVANCHA 7755', '8383833', 'FELIPE SALAS', '1');
INSERT INTO `proveedores` VALUES ('78794310', '1', '1', '12', 'CAR S.A', 'RIPLEY', 'VENT DE ROPA', 'COSTANERA 988', '2323333', 'JUAN PEREZ', '1');
INSERT INTO `proveedores` VALUES ('49999987', '6', '13', '132', 'CAR S.A', 'RIPLEY', 'VENTA DE INSUMOS', 'CAVANCHA 7755', '2333333', 'MIGUEL SAAVEDRA', '0');
INSERT INTO `proveedores` VALUES ('49999986', '9', '6', '61', 'SOCIEDAD DE AGRICULTORES DE RANCAGUA S.A', 'PALTOS Y TOMATES', 'VENTA DE PARTES Y PIEZAS', 'CODEGUA 888', '222222222', 'ROBERTO FLORES', '0');
INSERT INTO `proveedores` VALUES ('49999998', '3', '13', '133', 'los 3 ingleses s.a', 'London group', 'distribucion', 'eliodoro yaÃ±ez 6000', '2321156', 'andres tapia', '1');

-- ----------------------------
-- Table structure for `region`
-- ----------------------------
DROP TABLE IF EXISTS `region`;
CREATE TABLE `region` (
  `CODIGO_R` decimal(4,0) NOT NULL,
  `GLOSA_R` text,
  PRIMARY KEY (`CODIGO_R`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of region
-- ----------------------------
INSERT INTO `region` VALUES ('1', 'Region de Tarapaca');
INSERT INTO `region` VALUES ('2', 'Region de Antofagasta');
INSERT INTO `region` VALUES ('3', 'Region de Atacama');
INSERT INTO `region` VALUES ('4', 'Region de Coquimbo');
INSERT INTO `region` VALUES ('5', 'Region de Valparaiso');
INSERT INTO `region` VALUES ('6', 'Region del Lib. Gral Bernardo OHiggins');
INSERT INTO `region` VALUES ('7', 'Region del Maule');
INSERT INTO `region` VALUES ('8', 'Region del Biobio');
INSERT INTO `region` VALUES ('9', 'Region de la Araucania');
INSERT INTO `region` VALUES ('10', 'Region de Los Lagos');
INSERT INTO `region` VALUES ('11', 'Region de Aysen');
INSERT INTO `region` VALUES ('12', 'Region de Magallanes');
INSERT INTO `region` VALUES ('13', 'Region Metropolitana');
INSERT INTO `region` VALUES ('14', 'Region de Los Rios');
INSERT INTO `region` VALUES ('15', 'Region de Arica y Parinacota Arica');

-- ----------------------------
-- Table structure for `subfamilia`
-- ----------------------------
DROP TABLE IF EXISTS `subfamilia`;
CREATE TABLE `subfamilia` (
  `CODIGO_SF` decimal(4,0) NOT NULL,
  `CODIGO_F` decimal(4,0) DEFAULT NULL,
  `GLOSA_SF` text,
  `ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`CODIGO_SF`),
  KEY `FK_FAM_SUBFAM` (`CODIGO_F`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subfamilia
-- ----------------------------
INSERT INTO `subfamilia` VALUES ('101', '10', 'PLACA BASE INTEL SOCKET 775', '1');
INSERT INTO `subfamilia` VALUES ('102', '10', 'PLACA BASE AMD SOCKET AM3', '1');
INSERT INTO `subfamilia` VALUES ('201', '20', 'PROCESADOR INTEL 775', '1');
INSERT INTO `subfamilia` VALUES ('202', '20', 'PROCESADOR AMD SOCKET AM3', '1');
INSERT INTO `subfamilia` VALUES ('301', '30', 'DISCO DURO SATA 1TB', '1');
INSERT INTO `subfamilia` VALUES ('103', '10', 'PLACA MADRE INTEL SERVIDOR', '1');
INSERT INTO `subfamilia` VALUES ('302', '30', 'DISCO DURO SATA II 500GB', '1');
INSERT INTO `subfamilia` VALUES ('104', '10', 'PLACA SERVIDORES DOBLE SOCKET INTEL', '1');
INSERT INTO `subfamilia` VALUES ('105', '80', 'RATON LASER INFRAROJO', '1');
INSERT INTO `subfamilia` VALUES ('1333', '110', 'Disco Externo 3TB 3.5\" USB 3', '1');
INSERT INTO `subfamilia` VALUES ('8349', '50', ' DDR3 1GB 1333MHz', '1');
INSERT INTO `subfamilia` VALUES ('9999', '9999', 'GRABADOR DVD', '1');
INSERT INTO `subfamilia` VALUES ('777', '9999', 'GRABADOR BLURAY', '1');

-- ----------------------------
-- Table structure for `sucursales`
-- ----------------------------
DROP TABLE IF EXISTS `sucursales`;
CREATE TABLE `sucursales` (
  `CODIGO_SUC` decimal(4,0) NOT NULL,
  `CODIGO_R` decimal(4,0) DEFAULT NULL,
  `CODIGO_C` decimal(4,0) DEFAULT NULL,
  `GLOSA_S` text,
  `DIREC_S` text,
  `TELEF_S` decimal(10,0) DEFAULT NULL,
  `ADMIN_S` text,
  `ESTADO` int(1) NOT NULL,
  PRIMARY KEY (`CODIGO_SUC`),
  KEY `FK_COMUNA_SUCURSAL` (`CODIGO_C`),
  KEY `FK_REGION_SUCURSAL` (`CODIGO_R`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sucursales
-- ----------------------------
INSERT INTO `sucursales` VALUES ('1', '13', '131', 'CASA MATRIZ', 'LOS CAPITANES 999', '1111111', 'JUAN ROMERO', '1');
INSERT INTO `sucursales` VALUES ('2', '13', '132', 'SUCURSAL VITACURA', 'ALGO 123', '1234567', 'JUAN PEREZ', '1');
INSERT INTO `sucursales` VALUES ('3', '1', '11', 'SUCURSAL PROVIDENCIA', 'ANTONIO BELLET NRO 183', '2321112', 'RAMON LISBOA', '0');
INSERT INTO `sucursales` VALUES ('4', '13', '131', 'SUCURSAL ALAMEDA', 'ALAMEDA 318', '6565589', 'GUILLERMO NUÃ‘EZ', '0');
INSERT INTO `sucursales` VALUES ('222', '13', '133', 'PROVIDENCIA B', 'MANUEL MONTT 812', '541234567', 'CARLOS SANTANA', '1');

-- ----------------------------
-- Table structure for `uf`
-- ----------------------------
DROP TABLE IF EXISTS `uf`;
CREATE TABLE `uf` (
  `FECHA` text NOT NULL,
  `MONTO` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of uf
-- ----------------------------
INSERT INTO `uf` VALUES ('01-10-2013', '23092.57');
INSERT INTO `uf` VALUES ('02-10-2013', '23094.11');
INSERT INTO `uf` VALUES ('03-10-2013', '23095.65');
INSERT INTO `uf` VALUES ('04-10-2013', '23097.18');
INSERT INTO `uf` VALUES ('05-10-2013', '23098.72');
INSERT INTO `uf` VALUES ('06-10-2013', '23100.26');
INSERT INTO `uf` VALUES ('07-10-2013', '23101.8');
INSERT INTO `uf` VALUES ('08-10-2013', '23103.34');
INSERT INTO `uf` VALUES ('09-10-2013', '23104.88');
INSERT INTO `uf` VALUES ('10-10-2013', '23108.6');
INSERT INTO `uf` VALUES ('11-10-2013', '23112.32');
INSERT INTO `uf` VALUES ('12-10-2013', '23116.03');
INSERT INTO `uf` VALUES ('13-10-2013', '23119.75');
INSERT INTO `uf` VALUES ('14-10-2013', '23123.47');
INSERT INTO `uf` VALUES ('15-10-2013', '23127.19');
INSERT INTO `uf` VALUES ('16-10-2013', '23130.92');
INSERT INTO `uf` VALUES ('17-10-2013', '23134.64');
INSERT INTO `uf` VALUES ('18-10-2013', '23138.36');
INSERT INTO `uf` VALUES ('19-10-2013', '23142.08');
INSERT INTO `uf` VALUES ('20-10-2013', '23145.81');
INSERT INTO `uf` VALUES ('21-10-2013', '23149.53');
INSERT INTO `uf` VALUES ('22-10-2013', '23153.26');
INSERT INTO `uf` VALUES ('23-10-2013', '23156.98');
INSERT INTO `uf` VALUES ('24-10-2013', '23160.71');
INSERT INTO `uf` VALUES ('25-10-2013', '23164.43');
INSERT INTO `uf` VALUES ('26-10-2013', '23168.16');
INSERT INTO `uf` VALUES ('27-10-2013', '23171.89');
INSERT INTO `uf` VALUES ('28-10-2013', '23175.62');
INSERT INTO `uf` VALUES ('29-10-2013', '23179.35');
INSERT INTO `uf` VALUES ('30-10-2013', '23183.08');
INSERT INTO `uf` VALUES ('31-10-2013', '23186.81');

-- ----------------------------
-- Table structure for `usr_log`
-- ----------------------------
DROP TABLE IF EXISTS `usr_log`;
CREATE TABLE `usr_log` (
  `FEC_ACT` text,
  `USER_ACT` char(30) DEFAULT NULL,
  `MODULO_ACT` text,
  `ACT_EJE` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usr_log
-- ----------------------------
INSERT INTO `usr_log` VALUES ('27-08-2011', '14196493', 'NUEVO PROVEEDOR', 'GRABA PROVEEDOR');
INSERT INTO `usr_log` VALUES ('29-04-2012', '14196493', 'NUEVO PROVEEDOR', 'GRABA PROVEEDOR');
INSERT INTO `usr_log` VALUES ('30-04-2012', '14196493', 'NUEVO PROVEEDOR', 'GRABA PROVEEDOR');
INSERT INTO `usr_log` VALUES ('16-05-2012', '14196493', 'NUEVA FAMILIA', 'GRABA FAMILIA');
INSERT INTO `usr_log` VALUES ('20-05-2012', '14196493', 'MODIFICA PROVEEDOR', 'ACTUALIZA PROVEEDOR');
INSERT INTO `usr_log` VALUES ('20-05-2012', '14196493', 'NUEVO PROVEEDOR', 'GRABA PROVEEDOR');

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `USUARIO` char(30) NOT NULL,
  `CODIGO_P` decimal(4,0) DEFAULT NULL,
  `PASSWORD` text,
  `FECHA_ALTA` text,
  `ESTADO` decimal(3,0) DEFAULT NULL,
  `FECHA_BAJA` mediumtext,
  `SUCURSAL_ASOC` decimal(3,0) DEFAULT NULL,
  PRIMARY KEY (`USUARIO`),
  KEY `FK_PERFIL_USUARIO` (`CODIGO_P`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('11111111', '3', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '09-09-2011', '999', '27/05/2014', '1');
INSERT INTO `usuario` VALUES ('12345678', '2', '7c4a8d09ca3762af61e59520943dc26494f8941b', '10-10-2011', '1', null, '1');
INSERT INTO `usuario` VALUES ('14196493', '1', '7c4a8d09ca3762af61e59520943dc26494f8941b', '12-12-2011', '1', null, '1');
INSERT INTO `usuario` VALUES ('22222222', '4', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '02-01-2011', '1', null, '1');
INSERT INTO `usuario` VALUES ('33333333', '2', '7c4a8d09ca3762af61e59520943dc26494f8941b', '05/01/2012', '1', null, '1');
INSERT INTO `usuario` VALUES ('44444444', '3', '7c4a8d09ca3762af61e59520943dc26494f8941b', '21/09/2013', '1', null, '1');
INSERT INTO `usuario` VALUES ('77777777', '5', '1411678a0b9e25ee2f7c8b2f7ac92b6a74b3f9c5', '12/10/2013', '1', null, '1');
INSERT INTO `usuario` VALUES ('88888888', '2', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '25/09/2013', '999', '27/05/2014', '1');
