-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bdconjunto
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `IdAdministrador` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Correo` varchar(20) NOT NULL,
  `NumeroTelefono` varchar(11) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Clave` varchar(20) NOT NULL,
  PRIMARY KEY (`IdAdministrador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (2,'Alison','Diaz','alison@admin.com','3026986447','1994-08-20','060d8b6b4f4375219f9f'),(3,'pepito','florez','pepito@gmail.com','1234567899','2004-02-20','123'),(1030521677,'Daniela','Huertas','daniela@admin.com','3197159542','2024-02-13','53aeb0ed21e248d32aba');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartamento`
--

DROP TABLE IF EXISTS `apartamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apartamento` (
  `IdApartamento` int(11) NOT NULL,
  `Torre` int(11) NOT NULL,
  `Propietario_IdPropietario` int(11) NOT NULL,
  `Coeficiente` float DEFAULT NULL,
  PRIMARY KEY (`IdApartamento`),
  KEY `fk_Apartamento_Propietario1_idx` (`Propietario_IdPropietario`),
  CONSTRAINT `fk_Apartamento_Propietario1` FOREIGN KEY (`Propietario_IdPropietario`) REFERENCES `propietario` (`IdPropietario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamento`
--

LOCK TABLES `apartamento` WRITE;
/*!40000 ALTER TABLE `apartamento` DISABLE KEYS */;
INSERT INTO `apartamento` VALUES (1101,1,123,0.015),(1102,1,456,0.017),(1103,1,789,0.012),(1104,1,987,0.013),(1201,1,654,0.014),(1202,1,321,0.014),(1203,1,741,0.014),(1204,1,852,0.014),(2101,2,963,0.014),(2102,2,147,0.014),(2103,2,258,0.014),(2104,2,369,0.014);
/*!40000 ALTER TABLE `apartamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentacobro`
--

DROP TABLE IF EXISTS `cuentacobro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuentacobro` (
  `IdCuentaCobro` int(11) NOT NULL,
  `Administrador_idAdministrador` int(11) NOT NULL,
  `Apartamento_idApartamento` int(11) NOT NULL,
  `Estado_idEstado` int(11) NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `SaldoAcomulado` float DEFAULT NULL,
  `Interes` float DEFAULT NULL,
  PRIMARY KEY (`IdCuentaCobro`),
  KEY `fk_CuentaCobro_Administrador1_idx` (`Administrador_idAdministrador`),
  KEY `fk_CuentaCobro_Apartamento1_idx` (`Apartamento_idApartamento`),
  KEY `fk_CuentaCobro_Estado1_idx` (`Estado_idEstado`),
  CONSTRAINT `fk_CuentaCobro_Administrador1` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `administrador` (`idAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CuentaCobro_Apartamento1` FOREIGN KEY (`Apartamento_idApartamento`) REFERENCES `apartamento` (`idApartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CuentaCobro_Estado1` FOREIGN KEY (`Estado_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentacobro`
--

LOCK TABLES `cuentacobro` WRITE;
/*!40000 ALTER TABLE `cuentacobro` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuentacobro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `IdEstado` int(11) NOT NULL,
  `Estado` varchar(15) NOT NULL,
  PRIMARY KEY (`IdEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (0,'sin pagar'),(1,'pagado'),(2,'pagado parcialm');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `factura` (
  `IdFactura` int(11) NOT NULL AUTO_INCREMENT,
  `CuentaCobro_idCuentaCobro` int(11) NOT NULL,
  `Propietario_IdPropietario` int(11) NOT NULL,
  `FechaPago` date NOT NULL,
  `ValorPagado` float DEFAULT NULL,
  `ValorFactura` float NOT NULL,
  `HoraPago` time NOT NULL,
  PRIMARY KEY (`IdFactura`),
  KEY `fk_Factura_CuentaCobro1_idx` (`CuentaCobro_idCuentaCobro`),
  KEY `fk_Factura_Propietario1_idx` (`Propietario_IdPropietario`),
  CONSTRAINT `fk_Factura_CuentaCobro1` FOREIGN KEY (`CuentaCobro_idCuentaCobro`) REFERENCES `cuentacobro` (`idCuentaCobro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Factura_Propietario1` FOREIGN KEY (`Propietario_IdPropietario`) REFERENCES `propietario` (`IdPropietario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propietario`
--

DROP TABLE IF EXISTS `propietario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propietario` (
  `IdPropietario` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `NumeroTelefono` varchar(11) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Clave` varchar(20) NOT NULL,
  PRIMARY KEY (`IdPropietario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propietario`
--

LOCK TABLES `propietario` WRITE;
/*!40000 ALTER TABLE `propietario` DISABLE KEYS */;
INSERT INTO `propietario` VALUES (123,'Juan','Pérez','juan.perez@example.com','2147483647','1980-05-12','123'),(147,'Ana','Martínez','ana.martinez@example.com','2147483647','1990-02-14','5ac0852e770506dcd80f'),(258,'Luis','Fernández','luis.fernandez@example.com','2147483647','1985-07-22','5ac0852e770506dcd80f'),(321,'Jorge','García','jorge.garcia@example.com','2147483647','1978-12-01','5ac0852e770506dcd80f'),(369,'Sofía','López','sofia.lopez@example.com','2147483647','1993-03-10','5ac0852e770506dcd80f'),(456,'María','Gómez','maria.gomez@example.com','2147483647','1975-08-20','5ac0852e770506dcd80f'),(654,'Laura','Ramírez','laura.ramirez@example.com','2147483647','1987-09-15','5ac0852e770506dcd80f'),(741,'Elena','Torres','elena.torres@example.com','2147483647','1991-01-20','5ac0852e770506dcd80f'),(789,'Carlos','Rodríguez','carlos.rodriguez@example.com','2147483647','1982-11-05','5ac0852e770506dcd80f'),(852,'Miguel','Castillo','miguel.castillo@example.com','2147483647','1986-06-25','5ac0852e770506dcd80f'),(963,'Isabel','Flores','isabel.flores@example.com','2147483647','1984-10-10','5ac0852e770506dcd80f'),(987,'Pedro','Sánchez','pedro.sanchez@example.com','2147483647','1983-04-30','5ac0852e770506dcd80f'),(11111,'Lucy','Erazo','lucyErazo@gmail.com','2312312321','1968-03-21','123');
/*!40000 ALTER TABLE `propietario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-21  9:49:31
