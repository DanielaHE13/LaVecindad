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
INSERT INTO `administrador` VALUES (2,'Alison','Diaz','alison@admin.com','3026986447','1994-08-20','123'),(3,'pepito','florez','pepito@gmail.com','1234567899','2004-02-20','123'),(1030521677,'Daniela','Huertas','daniela@admin.com','3197159542','2024-02-13','123');
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
  PRIMARY KEY (`IdApartamento`,`Torre`),
  KEY `fk_Apartamento_Propietario1_idx` (`Propietario_IdPropietario`),
  CONSTRAINT `fk_Apartamento_Propietario1` FOREIGN KEY (`Propietario_IdPropietario`) REFERENCES `propietario` (`IdPropietario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartamento`
--

LOCK TABLES `apartamento` WRITE;
/*!40000 ALTER TABLE `apartamento` DISABLE KEYS */;
INSERT INTO `apartamento` VALUES (101,1,1,1.05),(101,2,21,1.04),(101,3,41,1.08),(101,4,61,1.05),(101,5,81,1.08),(102,1,2,0.95),(102,2,22,0.91),(102,3,42,0.92),(102,4,62,0.92),(102,5,82,0.9),(103,1,3,1),(103,2,23,1.06),(103,3,43,1),(103,4,63,1.03),(103,5,83,1.05),(104,1,4,1.1),(104,2,24,0.98),(104,3,44,0.89),(104,4,64,0.95),(104,5,84,0.87),(201,1,5,0.9),(201,2,25,1),(201,3,45,1.04),(201,4,65,1.1),(201,5,85,1.02),(202,1,6,1.08),(202,2,26,0.87),(202,3,46,0.95),(202,4,66,0.9),(202,5,86,0.95),(203,1,7,0.85),(203,2,27,1.09),(203,3,47,1.12),(203,4,67,1.07),(203,5,87,1.03),(204,1,8,1.02),(204,2,28,0.94),(204,3,48,0.87),(204,4,68,0.89),(204,5,88,0.89),(301,1,9,0.97),(301,2,29,1.12),(301,3,49,1.03),(301,4,69,1.01),(301,5,89,1.01),(302,1,10,1.15),(302,2,30,0.86),(302,3,50,0.9),(302,4,70,0.88),(302,5,90,0.88),(303,1,11,1),(303,2,31,1.03),(303,3,51,1.01),(303,4,71,1.06),(303,5,91,1.04),(304,1,12,0.93),(304,2,32,0.96),(304,3,52,0.88),(304,4,72,0.93),(304,5,92,0.92),(401,1,13,1.07),(401,2,33,1.07),(401,3,53,1.06),(401,4,73,1.09),(401,5,93,1.07),(402,1,14,0.88),(402,2,34,0.9),(402,3,54,0.91),(402,4,74,0.85),(402,5,94,0.9),(403,1,15,1.01),(403,2,35,1.02),(403,3,55,1.09),(403,4,75,1.04),(403,5,95,1.06),(404,1,16,0.99),(404,2,36,0.88),(404,3,56,0.94),(404,4,76,0.87),(404,5,96,0.88),(501,1,17,1.03),(501,2,37,1.05),(501,3,57,1.02),(501,4,77,1.03),(501,5,97,1.05),(502,1,18,0.92),(502,2,38,0.93),(502,3,58,0.85),(502,4,78,0.91),(502,5,98,0.93),(503,1,19,1.11),(503,2,39,1.1),(503,3,59,1.07),(503,4,79,1),(503,5,99,1.08),(504,1,20,0.89),(504,2,40,0.85),(504,3,60,0.9),(504,4,80,0.94),(504,5,100,0.91);
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
  CONSTRAINT `fk_CuentaCobro_Administrador1` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `administrador` (`IdAdministrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CuentaCobro_Apartamento1` FOREIGN KEY (`Apartamento_idApartamento`) REFERENCES `apartamento` (`IdApartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  CONSTRAINT `fk_Factura_CuentaCobro1` FOREIGN KEY (`CuentaCobro_idCuentaCobro`) REFERENCES `cuentacobro` (`IdCuentaCobro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
INSERT INTO `propietario` VALUES (1,'Timoteo','Carrasco','felipe32@trejo-brito.org','0013389083','1974-12-18','83920174'),(2,'Carlota','Ochoa','soledad95@laboratorios.com','1316475255','1985-11-05','10293847'),(3,'Eric','Valverde','vanesasanabria@yahoo.com','2423884969','1953-10-22','56473829'),(4,'Tomás','Molina','manuel27@irizarry.com','4893252880','1945-09-20','91827364'),(5,'Luisa','Galarza','leonor57@casarez.com','0983930103','1949-03-20','74629103'),(6,'Elena','Suárez','marian98@vargas-ibarra.net','0385234194','1971-02-07','29384756'),(7,'Jorge','Ortiz','josefina05@torres-morales.com','0229384756','1990-07-11','67584920'),(8,'Ana','Rojas','lucas94@perez-lopez.com','0658391027','1982-04-29','38475619'),(9,'Ricardo','Gómez','veronica08@castillo-lara.org','0783549201','1977-09-18','91827364'),(10,'Marta','Fernández','david47@suarez-martin.com','0983456712','1988-01-05','56473829'),(11,'Pablo','Vargas','karla66@diaz-rincon.net','0653729184','1966-03-24','10293847'),(12,'María','López','javier30@garcia-moreno.com','0372648591','1994-06-12','83920174'),(13,'Andrés','Hernández','ana22@ruiz-mendoza.org','0659183745','1980-11-30','67584920'),(14,'Sofía','Pérez','carlos01@torres-villanueva.com','0437285946','1992-10-15','29384756'),(15,'Juan','Ramírez','marcela04@hernandez-vargas.net','0263847509','1979-08-19','74629103'),(16,'Laura','Martínez','felipe11@ruiz-sanchez.org','0234758619','1984-12-02','91827364'),(17,'Diego','Morales','silvia06@fernandez-cano.com','0893745612','1976-07-29','38475619'),(18,'Natalia','Castillo','jorge09@ramirez-perez.net','0658493721','1991-05-08','10293847'),(19,'Carlos','Sánchez','maria33@vargas-rincon.org','0873625190','1983-03-14','56473829'),(20,'Isabel','García','raul07@suarez-lopez.com','0459382716','1978-09-22','83920174'),(21,'Fernando','Torres','luis12@diaz-castro.net','0346758291','1986-11-06','29384756'),(22,'Verónica','Diaz','ana29@moreno-rivas.com','0674839201','1993-01-19','67584920'),(23,'Luis','Rivas','jose10@garcia-perez.org','0384927506','1975-10-03','74629103'),(24,'Mónica','Herrera','pablo07@ruiz-lopez.com','0793846512','1981-04-28','38475619'),(25,'José','Mendoza','maria18@fernandez-gomez.net','0658749203','1987-06-17','10293847'),(26,'Patricia','Vega','carlos09@ramirez-martin.com','0873425910','1990-09-25','56473829'),(27,'Roberto','Moreno','laura21@torres-sanchez.org','0347856129','1974-12-01','83920174'),(28,'Sandra','Cano','fernando11@diaz-lopez.com','0983746521','1982-02-14','74629103'),(29,'Miguel','Rincon','veronica03@moreno-perez.net','0234657891','1985-07-20','29384756'),(30,'Gloria','Lopez','luis15@garcia-ramos.com','0674981230','1991-11-02','67584920'),(31,'Eduardo','Castro','maria27@ruiz-morales.org','0347291856','1977-08-09','91827364'),(32,'Alejandra','Ramos','jose18@fernandez-torres.com','0893745610','1989-01-28','38475619'),(33,'Santiago','Suarez','pablo20@ramirez-vargas.net','0658743921','1983-05-12','10293847'),(34,'Lorena','Lopez','maria11@diaz-cano.org','0783491620','1990-10-10','56473829'),(35,'Diego','Perez','luis03@moreno-hernandez.com','0347859162','1975-12-22','83920174'),(36,'Carolina','Torres','veronica15@garcia-rincon.net','0983745617','1987-03-18','74629103'),(37,'Javier','Diaz','ana29@ruiz-lopez.com','0234657893','1982-06-21','29384756'),(38,'Mariana','Morales','carlos07@fernandez-martin.org','0674981235','1990-01-29','67584920'),(39,'Andrés','Lopez','jose11@torres-vargas.com','0347291857','1978-09-09','38475619'),(40,'Valeria','Rincon','maria22@diaz-gomez.net','0893745613','1985-11-11','10293847'),(41,'Carlos','Sanchez','fernando10@moreno-lopez.org','0658743922','1983-07-07','56473829'),(42,'Ana','Gomez','jose18@garcia-perez.com','0783491625','1992-04-04','83920174'),(43,'Jorge','Vargas','maria03@ruiz-cano.net','0347859167','1976-12-12','74629103'),(44,'Lucía','Castillo','luis29@fernandez-rincon.org','0983745619','1989-05-05','29384756'),(45,'Ricardo','Ramirez','veronica15@torres-martin.com','0234657897','1981-03-03','67584920'),(46,'Patricia','Lopez','jose11@diaz-vargas.net','0674981239','1988-08-08','38475619'),(47,'Raúl','Moreno','maria22@garcia-moreno.com','0347291859','1977-07-07','10293847'),(48,'Sofía','Torres','fernando10@ruiz-lopez.org','0893745621','1991-06-06','56473829'),(49,'Fernando','Diaz','ana29@fernandez-rincon.net','0658743925','1991-12-15','84736291'),(50,'María','Lara','jose18@torres-lopez.com','0347859172','1982-03-27','19283746'),(51,'José','Morales','maria22@diaz-ramos.net','0983745627','1979-05-30','56473829'),(52,'Lucía','Vargas','fernando10@garcia-perez.org','0234657902','1985-09-13','83746591'),(53,'Jorge','Castillo','veronica15@ruiz-martin.com','0674981240','1988-11-21','92837465'),(54,'Sofía','Ramírez','pablo07@fernandez-cano.com','0347291861','1990-06-02','37465928'),(55,'Andrés','Suárez','maria18@diaz-vargas.net','0893745628','1977-02-18','46591837'),(56,'Carolina','Gómez','jose11@torres-perez.org','0658743926','1983-08-07','82937465'),(57,'Diego','Mendoza','maria22@ruiz-lopez.com','0783491632','1991-04-22','56473829'),(58,'Ana','Herrera','fernando10@moreno-rincon.net','0347859173','1978-12-10','91827364'),(59,'Pablo','Vega','veronica15@garcia-martin.com','0983745629','1985-07-19','38475619'),(60,'Laura','Rivas','jose18@diaz-cano.org','0234657903','1989-09-28','10293847'),(61,'Ricardo','Cano','maria22@torres-vargas.com','0674981241','1992-03-04','74629103'),(62,'Natalia','Lopez','fernando10@ruiz-perez.net','0347291862','1980-11-13','29384756'),(63,'Javier','Martínez','veronica15@fernandez-ramos.com','0893745630','1976-01-29','67584920'),(64,'Isabel','Diaz','pablo07@garcia-lopez.org','0658743927','1984-05-16','91827364'),(65,'Miguel','Rincon','maria18@ruiz-martin.net','0783491633','1987-10-08','38475619'),(66,'Mónica','Torres','jose11@diaz-vargas.com','0347859174','1990-08-25','10293847'),(67,'Eduardo','Gomez','fernando10@moreno-lopez.org','0983745631','1979-06-12','56473829'),(68,'Lorena','Perez','veronica15@garcia-perez.net','0234657904','1983-02-18','83920174'),(69,'Andrés','Sanchez','maria22@ruiz-cano.com','0674981242','1986-09-03','74629103'),(70,'Carolina','Vargas','pablo07@fernandez-rincon.org','0347291863','1991-12-22','29384756'),(71,'Jorge','Lopez','jose18@diaz-martin.net','0893745632','1978-04-29','67584920'),(72,'Valeria','Ramirez','maria22@torres-perez.org','0658743928','1985-01-16','91827364'),(73,'Fernando','Morales','fernando10@ruiz-lopez.net','0783491634','1982-07-21','38475619'),(74,'Sofía','Castillo','veronica15@garcia-ramos.com','0347859175','1990-10-11','10293847'),(75,'Luis','Rincon','jose11@diaz-vargas.org','0983745633','1977-03-06','56473829'),(76,'Ana','Gonzalez','maria22@ruiz-perez.net','0234657905','1989-12-30','83920174'),(77,'Ricardo','Diaz','fernando10@torres-lopez.com','0674981243','1981-05-17','74629103'),(78,'María','Fernandez','pablo07@garcia-martin.net','0347291864','1984-08-14','29384756'),(79,'Javier','Lopez','veronica15@ruiz-vargas.com','0893745634','1992-01-09','67584920'),(80,'Patricia','Sanchez','jose18@diaz-cano.net','0658743929','1979-11-24','91827364'),(81,'Raúl','Moreno','maria22@torres-perez.org','0783491635','1983-06-05','38475619'),(82,'Sofía','Torres','fernando10@ruiz-lopez.net','0347859176','1988-02-26','10293847'),(83,'Fernando','Diaz','veronica15@garcia-perez.org','0983745635','1991-07-19','56473829'),(84,'María','Lara','jose11@moreno-rincon.net','0234657906','1976-09-15','83920174'),(85,'José','Morales','maria22@ruiz-martin.com','0674981244','1987-03-27','74629103'),(86,'Lucía','Vargas','pablo07@diaz-lopez.net','0347291865','1990-12-12','29384756'),(87,'Jorge','Castillo','veronica15@fernandez-cano.org','0893745636','1978-05-09','67584920'),(88,'Sofía','Ramírez','fernando10@garcia-perez.net','0658743930','1985-10-20','91827364'),(89,'Andrés','Suárez','jose18@torres-lopez.com','0783491636','1991-04-15','38475619'),(90,'Carolina','Gómez','maria22@ruiz-vargas.org','0347859177','1977-08-07','10293847'),(91,'Diego','Mendoza','veronica15@diaz-cano.net','0983745637','1984-03-24','56473829'),(92,'Ana','Herrera','fernando10@moreno-rincon.com','0234657907','1989-06-19','83920174'),(93,'Pablo','Vega','jose11@garcia-perez.org','0674981245','1992-11-30','74629103'),(94,'Laura','Rivas','maria22@ruiz-martin.net','0347291866','1976-01-07','29384756'),(95,'Ricardo','Cano','pablo07@torres-vargas.com','0893745638','1983-09-22','67584920'),(96,'Natalia','Lopez','fernando10@diaz-lopez.net','0658743931','1986-12-05','91827364'),(97,'Javier','Martínez','veronica15@ruiz-perez.org','0783491637','1990-07-30','38475619'),(98,'Isabel','Diaz','jose18@fernandez-ramos.net','0347859178','1979-04-11','10293847'),(99,'Miguel','Rincon','maria22@garcia-lopez.com','0983745639','1985-08-24','56473829'),(100,'Mónica','Torres','fernando10@ruiz-lopez.org','0234657908','1991-01-01','83920174');
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

-- Dump completed on 2025-05-23 23:02:38
