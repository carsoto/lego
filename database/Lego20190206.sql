-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 108.167.182.43    Database: andressu_legoapp
-- ------------------------------------------------------
-- Server version	5.6.41-84.1

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
-- Dumping data for table `alquiler`
--

LOCK TABLES `alquiler` WRITE;
/*!40000 ALTER TABLE `alquiler` DISABLE KEYS */;
/*!40000 ALTER TABLE `alquiler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `alquiler_invitados`
--

LOCK TABLES `alquiler_invitados` WRITE;
/*!40000 ALTER TABLE `alquiler_invitados` DISABLE KEYS */;
/*!40000 ALTER TABLE `alquiler_invitados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `atletas`
--

LOCK TABLES `atletas` WRITE;
/*!40000 ALTER TABLE `atletas` DISABLE KEYS */;
INSERT INTO `atletas` VALUES (1,NULL,'Ilanna','Dvorquez','Femenino','2007-05-21',NULL,NULL,'Logos',NULL,32,32,'2019-01-26 02:50:09','2019-01-26 02:50:09'),(2,NULL,'Eitan','Dvorquez','Masculino','2011-01-12',NULL,NULL,'Logos',NULL,0,0,'2019-01-26 02:50:09','2019-01-26 02:50:09'),(3,NULL,'María Cristina','Aguirre Briones','Femenino','2007-10-08',NULL,NULL,'Americano',NULL,34,34,'2019-01-26 22:27:44','2019-01-26 22:27:44'),(4,930022413,'Luciana Sofia','Dager Chang','Femenino','2006-11-24',NULL,NULL,'Liceo Los Andes',NULL,38,38,'2019-01-28 20:20:17','2019-01-28 20:20:17'),(5,932349319,'Camila Sofia','Dager Chang','Femenino','2012-08-07',NULL,NULL,'Liceo Los Andes',NULL,38,38,'2019-01-28 20:20:17','2019-01-28 20:20:17'),(6,NULL,'Martina Ariana','Fernandez Ferreccio','Femenino','2009-04-06',NULL,NULL,'Javier',NULL,32,34,'2019-01-29 01:25:22','2019-01-29 01:25:22'),(8,NULL,'Nicole','Serrano','Femenino','2006-05-11','Instagram',NULL,'La Moderna',NULL,38,38,'2019-01-29 23:27:15','2019-01-29 23:27:15'),(9,NULL,'Domenica','García García','Femenino','2006-05-02',NULL,NULL,'Delta',NULL,0,0,'2019-01-30 00:35:07','2019-01-30 00:35:07'),(10,NULL,'Alessia','García García','Femenino','2011-04-28',NULL,NULL,'Delta',NULL,0,0,'2019-01-30 00:35:07','2019-01-30 00:35:07'),(11,955527619,'Mariela','Béjar','Femenino','2006-06-06',NULL,NULL,'La  Asunción',NULL,34,36,'2019-01-31 22:37:45','2019-01-31 22:37:45'),(12,NULL,'Andrea Priscilla','Montalvan Amoroso','Femenino','2003-10-31',NULL,NULL,'santo domingo de guzman',NULL,36,36,'2019-02-01 21:46:36','2019-02-01 21:46:36'),(13,931051122,'Juan José','Terán López','Masculino','2009-02-16',NULL,NULL,'Colegio Menor',NULL,34,34,'2019-02-05 06:36:19','2019-02-05 06:36:19'),(14,931880082,'Juan Ignacio','Terán López','Masculino','2011-07-30',NULL,NULL,'Colegio Menor',NULL,32,32,'2019-02-05 06:36:19','2019-02-05 06:36:19'),(15,931117717,'Luciana Isabel','Aguilera Ampuero','Femenino','2009-03-11',NULL,NULL,'Javier',NULL,36,0,'2019-02-05 22:22:10','2019-02-05 22:22:10'),(16,NULL,'Victoria','Ronquillo','Femenino','2007-10-26',NULL,NULL,'Americano',NULL,36,38,'2019-02-05 23:31:56','2019-02-05 23:31:56'),(17,931041826,'Arianna','Burgos','Femenino','2006-06-03',NULL,NULL,'Monte tabor',NULL,36,36,'2019-02-05 23:41:06','2019-02-05 23:41:06'),(18,932194830,'Sofia','Burgos','Femenino','2012-10-04',NULL,NULL,'Monte Tabor',NULL,36,36,'2019-02-05 23:41:06','2019-02-05 23:41:06'),(19,931678155,'Matilde','Burgos','Femenino','2007-08-10',NULL,NULL,'Monte Tabor',NULL,38,38,'2019-02-05 23:41:06','2019-02-05 23:41:06'),(20,1727128645,'Paula Michelle','Vargas Coba','Femenino','2007-05-15',NULL,NULL,'Educamundo',NULL,36,36,'2019-02-06 08:01:21','2019-02-06 08:01:21'),(21,1750425181,'Mateo Enrique','Vargas Coba','Masculino','2010-07-07',NULL,NULL,'Educamundo',NULL,0,34,'2019-02-06 08:05:53','2019-02-06 08:05:53'),(22,930113378,'María De los Ángeles','Zambrano Izquierdo','Femenino','2007-02-11',NULL,NULL,'Torremolinos',NULL,34,36,'2019-02-06 08:12:14','2019-02-06 08:12:14'),(23,930967922,'Cristina Jael','Carrasco López','Femenino','2009-01-17',NULL,NULL,'Unidad educativa Alfredo Verá Vera',NULL,36,36,'2019-02-06 21:09:56','2019-02-06 21:09:56');
/*!40000 ALTER TABLE `atletas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `atletas_informacion_adicional`
--

LOCK TABLES `atletas_informacion_adicional` WRITE;
/*!40000 ALTER TABLE `atletas_informacion_adicional` DISABLE KEYS */;
INSERT INTO `atletas_informacion_adicional` VALUES (1,4,1,'No','2019-01-28 20:20:17','2019-01-28 20:20:17'),(2,4,2,'No','2019-01-28 20:20:17','2019-01-28 20:20:17'),(3,4,3,'No','2019-01-28 20:20:17','2019-01-28 20:20:17'),(4,5,1,'No','2019-01-28 20:20:17','2019-01-28 20:20:17'),(5,5,2,'No','2019-01-28 20:20:17','2019-01-28 20:20:17'),(6,5,3,'No','2019-01-28 20:20:17','2019-01-28 20:20:17'),(7,6,1,'Ninguno','2019-01-29 01:25:22','2019-01-29 01:25:22'),(8,6,2,'Ninguna','2019-01-29 01:25:22','2019-01-29 01:25:22'),(9,6,3,'No','2019-01-29 01:25:22','2019-01-29 01:25:22'),(10,8,1,'No','2019-01-29 23:27:15','2019-01-29 23:27:15'),(11,8,2,'No','2019-01-29 23:27:15','2019-01-29 23:27:15'),(12,8,3,'Acaros','2019-01-29 23:27:15','2019-01-29 23:27:15'),(13,8,4,'Si. Urbanización Castilla mz 20 Villa 21','2019-01-29 23:27:15','2019-01-29 23:27:15'),(14,9,3,'No puede estar cerca de fumigaciones insecticidas ni nada que tenga olor fuerte o veneno','2019-01-30 00:35:07','2019-01-30 00:35:07'),(15,13,1,'ninguno','2019-02-05 06:36:19','2019-02-05 06:36:19'),(16,13,2,'ninguno','2019-02-05 06:36:19','2019-02-05 06:36:19'),(17,13,3,'no','2019-02-05 06:36:19','2019-02-05 06:36:19'),(18,13,4,'no','2019-02-05 06:36:19','2019-02-05 06:36:19'),(19,14,1,'ninguno','2019-02-05 06:36:19','2019-02-05 06:36:19'),(20,14,2,'ninguno','2019-02-05 06:36:19','2019-02-05 06:36:19'),(21,14,3,'no','2019-02-05 06:36:19','2019-02-05 06:36:19'),(22,14,4,'no','2019-02-05 06:36:19','2019-02-05 06:36:19'),(23,16,1,'No','2019-02-05 23:31:56','2019-02-05 23:31:56'),(24,16,2,'No','2019-02-05 23:31:56','2019-02-05 23:31:56'),(25,16,3,'No','2019-02-05 23:31:56','2019-02-05 23:31:56'),(26,16,4,'Si.  Urb vía al sol mz 577 v 25','2019-02-05 23:31:56','2019-02-05 23:31:56'),(27,20,1,'No','2019-02-06 08:01:21','2019-02-06 08:01:21'),(28,20,2,'No','2019-02-06 08:01:21','2019-02-06 08:01:21'),(29,20,3,'Alergia al polvo y polen','2019-02-06 08:01:21','2019-02-06 08:01:21'),(30,20,4,'Necesito transporte sólo para la semana de 19 al 24 de febrero Matices Verde Esmeralda MZ 52 villa 21','2019-02-06 08:01:21','2019-02-06 08:01:21'),(31,21,1,'No','2019-02-06 08:05:53','2019-02-06 08:05:53'),(32,21,2,'No','2019-02-06 08:05:53','2019-02-06 08:05:53'),(33,21,3,'Al polvo y polen','2019-02-06 08:05:53','2019-02-06 08:05:53'),(34,21,4,'Necesito sólo para la semana de 19 Al 24 de febrero','2019-02-06 08:05:53','2019-02-06 08:05:53'),(35,22,1,'Temporal por ésta semana por un esguince','2019-02-06 08:12:14','2019-02-06 08:12:14'),(36,22,2,'No','2019-02-06 08:12:14','2019-02-06 08:12:14'),(37,22,3,'No','2019-02-06 08:12:14','2019-02-06 08:12:14'),(38,22,4,'No','2019-02-06 08:12:14','2019-02-06 08:12:14'),(39,23,1,'No','2019-02-06 21:09:56','2019-02-06 21:09:56'),(40,23,2,'No','2019-02-06 21:09:56','2019-02-06 21:09:56'),(41,23,3,'Es alérgica al colorante en los alimentos','2019-02-06 21:09:56','2019-02-06 21:09:56'),(42,23,4,'No','2019-02-06 21:09:56','2019-02-06 21:09:56');
/*!40000 ALTER TABLE `atletas_informacion_adicional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `campamentos`
--

LOCK TABLES `campamentos` WRITE;
/*!40000 ALTER TABLE `campamentos` DISABLE KEYS */;
INSERT INTO `campamentos` VALUES (1,3,'Campamento para adolescentes',16,NULL,10,NULL,'2019-01-26',1,NULL,'2019-01-24 05:00:00',NULL),(2,3,'Campamento para niños',12,15,10,NULL,'2019-02-23',1,NULL,'2019-01-24 05:00:00',NULL);
/*!40000 ALTER TABLE `campamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `campamentos_fechas`
--

LOCK TABLES `campamentos_fechas` WRITE;
/*!40000 ALTER TABLE `campamentos_fechas` DISABLE KEYS */;
INSERT INTO `campamentos_fechas` VALUES (1,1,'2019-02-09','2019-02-10','2019-01-24 05:00:00',NULL),(2,2,'2019-02-09','2019-02-10','2019-01-24 05:00:00',NULL),(3,2,'2019-02-16','2019-02-17','2019-01-24 05:00:00',NULL),(4,3,'2019-02-09','2019-02-10','2019-01-24 05:00:00',NULL),(5,3,'2019-02-09','2019-02-10','2019-01-24 05:00:00',NULL),(6,3,'2019-02-23','2019-02-24','2019-01-24 05:00:00',NULL),(7,4,'2019-03-09','2019-03-10','2019-01-24 05:00:00',NULL),(8,5,'2019-03-09','2019-03-10','2019-01-24 05:00:00',NULL),(9,5,'2019-03-16','2019-03-17','2019-01-24 05:00:00',NULL),(10,6,'2019-03-09','2019-03-10','2019-01-24 05:00:00',NULL),(11,6,'2019-03-09','2019-03-10','2019-01-24 05:00:00',NULL),(12,6,'2019-03-23','2019-03-24','2019-01-24 05:00:00',NULL);
/*!40000 ALTER TABLE `campamentos_fechas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `campamentos_horarios`
--

LOCK TABLES `campamentos_horarios` WRITE;
/*!40000 ALTER TABLE `campamentos_horarios` DISABLE KEYS */;
INSERT INTO `campamentos_horarios` VALUES (1,1,'1 fin de semana',90.00,1,'2019-01-24 05:00:00',NULL),(2,1,'2 fines de semana',120.00,1,'2019-01-24 05:00:00',NULL),(3,1,'3 fines de semana',150.00,1,'2019-01-24 05:00:00',NULL),(4,2,'1 fin de semana',90.00,1,'2019-01-24 05:00:00',NULL),(5,2,'2 fines de semana',120.00,1,'2019-01-24 05:00:00',NULL),(6,2,'3 fines de semana',150.00,1,'2019-01-24 05:00:00',NULL);
/*!40000 ALTER TABLE `campamentos_horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `deportes`
--

LOCK TABLES `deportes` WRITE;
/*!40000 ALTER TABLE `deportes` DISABLE KEYS */;
/*!40000 ALTER TABLE `deportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES (1,1,8,13,'17:00','18:30','2019-01-24 05:00:00',NULL),(2,1,14,100,'18:30','20:00','2019-01-24 05:00:00',NULL),(3,2,8,13,'17:00','18:30','2019-01-24 05:00:00',NULL),(4,2,14,100,'18:30','20:00','2019-01-24 05:00:00',NULL);
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `informacion_adicional`
--

LOCK TABLES `informacion_adicional` WRITE;
/*!40000 ALTER TABLE `informacion_adicional` DISABLE KEYS */;
INSERT INTO `informacion_adicional` VALUES (1,'¿Tiene algún problema físico o enfermedad que le limite hacer ejercicios?','2019-01-24 05:00:00',NULL),(2,'¿Toma algún medicamento?','2019-01-24 05:00:00',NULL),(3,'¿Tiene alguna alergia: animales, insectos, medicamentos u otros?','2019-01-24 05:00:00',NULL),(4,'¿Necesita transporte? Indícanos tu dirección','2019-01-24 05:00:00',NULL);
/*!40000 ALTER TABLE `informacion_adicional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `inscripciones_campamento`
--

LOCK TABLES `inscripciones_campamento` WRITE;
/*!40000 ALTER TABLE `inscripciones_campamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscripciones_campamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `inscripciones_vacacional`
--

LOCK TABLES `inscripciones_vacacional` WRITE;
/*!40000 ALTER TABLE `inscripciones_vacacional` DISABLE KEYS */;
INSERT INTO `inscripciones_vacacional` VALUES (1,1,3,150.00,45,127.50,'2019-01-25',0,'2019-01-26 02:50:09','2019-01-26 02:50:09'),(2,2,3,150.00,45,127.50,'2019-01-25',0,'2019-01-26 02:50:09','2019-01-26 02:50:09'),(3,3,4,90.00,9,81.00,'2019-01-26',1,'2019-01-26 22:27:44','2019-01-26 22:27:44'),(4,4,4,90.00,27,76.50,'2019-01-28',1,'2019-01-28 20:20:17','2019-01-28 20:20:17'),(5,5,4,90.00,27,76.50,'2019-01-28',1,'2019-01-28 20:20:17','2019-01-28 20:20:17'),(6,6,4,90.00,9,81.00,'2019-01-28',1,'2019-01-29 01:25:22','2019-01-29 01:25:22'),(8,8,1,90.00,0,90.00,'2019-01-29',1,'2019-01-29 23:27:15','2019-01-29 23:27:15'),(9,9,1,90.00,27,76.50,'2019-01-29',0,'2019-01-30 00:35:07','2019-01-30 00:35:07'),(10,10,1,90.00,27,76.50,'2019-01-29',0,'2019-01-30 00:35:07','2019-01-30 00:35:07'),(11,11,4,90.00,0,90.00,'2019-01-31',1,'2019-01-31 22:37:45','2019-01-31 22:37:45'),(12,12,2,90.00,0,90.00,'2019-02-01',0,'2019-02-01 21:46:36','2019-02-01 21:46:36'),(13,13,2,90.00,18,81.00,'2019-02-05',1,'2019-02-05 06:36:19','2019-02-05 06:36:19'),(14,14,2,90.00,18,81.00,'2019-02-05',1,'2019-02-05 06:36:19','2019-02-05 06:36:19'),(15,15,4,90.00,0,90.00,'2019-02-05',1,'2019-02-05 22:22:10','2019-02-05 22:22:10'),(16,16,4,90.00,0,90.00,'2019-02-05',1,'2019-02-05 23:31:56','2019-02-05 23:31:56'),(17,17,2,90.00,27,81.00,'2019-02-05',1,'2019-02-05 23:41:06','2019-02-05 23:41:06'),(18,18,2,90.00,27,81.00,'2019-02-05',1,'2019-02-05 23:41:06','2019-02-05 23:41:06'),(19,19,2,90.00,27,81.00,'2019-02-05',1,'2019-02-05 23:41:06','2019-02-05 23:41:06'),(20,20,2,90.00,0,90.00,'2019-02-06',1,'2019-02-06 08:01:21','2019-02-06 08:01:21'),(21,21,2,90.00,0,90.00,'2019-02-06',1,'2019-02-06 08:05:53','2019-02-06 08:05:53'),(22,22,2,90.00,0,90.00,'2019-02-06',1,'2019-02-06 08:12:14','2019-02-06 08:12:14'),(23,23,1,90.00,0,90.00,'2019-02-06',0,'2019-02-06 21:09:56','2019-02-06 21:09:56');
/*!40000 ALTER TABLE `inscripciones_vacacional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `invitados`
--

LOCK TABLES `invitados` WRITE;
/*!40000 ALTER TABLE `invitados` DISABLE KEYS */;
/*!40000 ALTER TABLE `invitados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `locaciones`
--

LOCK TABLES `locaciones` WRITE;
/*!40000 ALTER TABLE `locaciones` DISABLE KEYS */;
INSERT INTO `locaciones` VALUES (1,'Vía a la costa','LACOSTA PADEL',1,'2019-01-24 05:00:00',NULL),(2,'Samborondón','CLUB BIBLOS',1,'2019-01-24 05:00:00',NULL),(3,'Salinas','',1,'2019-01-24 05:00:00',NULL);
/*!40000 ALTER TABLE `locaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (183,'2014_10_12_000000_create_users_table',1),(184,'2014_10_12_100000_create_password_resets_table',1),(185,'2018_10_13_043900_create_roles_table',1),(186,'2018_10_13_044356_create_role_user_table',1),(187,'2019_01_02_165656_create_deportes_table',1),(188,'2019_01_02_165838_create_servicios_table',1),(189,'2019_01_02_165907_create_locaciones_table',1),(190,'2019_01_02_165917_create_periodos_table',1),(191,'2019_01_02_165927_create_tarifas_table',1),(192,'2019_01_02_165936_create_promociones_table',1),(193,'2019_01_02_165944_create_representantes_table',1),(194,'2019_01_02_170017_create_atletas_table',1),(195,'2019_01_02_170026_create_representantes_atletas_table',1),(196,'2019_01_02_170044_create_informacion_adicional_table',1),(197,'2019_01_02_170052_create_atletas_informacion_adicional_table',1),(198,'2019_01_09_205624_create_horarios_table',1),(199,'2019_01_14_151323_create_vacacional_table',1),(200,'2019_01_14_151711_create_vacacional_horarios_table',1),(201,'2019_01_15_191805_create_inscripciones_vacacional_table',1),(202,'2019_01_18_201217_create_campamentos_table',1),(203,'2019_01_23_153513_create_campamentos_horarios_table',1),(204,'2019_01_23_153633_create_campamentos_fechas_table',1),(205,'2019_01_23_212936_create_inscripciones_campamento_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `periodos`
--

LOCK TABLES `periodos` WRITE;
/*!40000 ALTER TABLE `periodos` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `promociones`
--

LOCK TABLES `promociones` WRITE;
/*!40000 ALTER TABLE `promociones` DISABLE KEYS */;
/*!40000 ALTER TABLE `promociones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `representantes`
--

LOCK TABLES `representantes` WRITE;
/*!40000 ALTER TABLE `representantes` DISABLE KEYS */;
INSERT INTO `representantes` VALUES (1,912787785,'Ena Maria','Chang Estrella','0987216053','enamariachang@gmail.com','@ena_chang','2019-01-25 23:23:04','2019-01-25 23:23:04'),(2,9999999999,'Stepanie Silvia','Saman','0993517326','ssaman@galapagosluxurycharters.com','stephi_saman','2019-01-26 02:50:09','2019-01-26 02:50:09'),(3,917425944,'María Fernanda','Briones hidalgo','0997057933','Mbriones78@hotmail.com','María Fernanda Briones hidalgo','2019-01-26 22:27:44','2019-01-26 22:27:44'),(4,916559446,'Alexandra','Ferreccio Damacela','0997210740','Alexafd@hotmail.com','Alexaferreccio','2019-01-29 01:25:22','2019-01-29 01:25:22'),(6,921930608,'Dalia','Salazar','0994029036','damasa84@hotmail.com','Instagram','2019-01-29 23:27:15','2019-01-29 23:27:15'),(7,1304354515,'María Gabriela','García serrano','0991122950','Ggarcia@oceanfreightcargo.com','Gabygarci','2019-01-30 00:35:07','2019-01-30 00:35:07'),(8,908396310,'Mariela','Molina','0990631895','mari_molinaolvera@hotmail.com','Mariela Molina','2019-01-31 22:37:45','2019-01-31 22:37:45'),(9,914103726,'Priscilla Alexandra','Amoroso Ron','0998489257','andreamontalvan_2@hotmail.com','Facebook','2019-02-01 06:00:05','2019-02-01 06:00:05'),(10,908913585,'Fanny del  Rocío','López Medina','0999420200','flopez@silcex.com.ec','@fannylopezmedina','2019-02-05 06:36:19','2019-02-05 06:36:19'),(11,920456944,'Daniela','Ampuero','0984884657','dani_ampu@yahoo.com','@dani_ampu','2019-02-05 22:22:10','2019-02-05 22:22:10'),(12,913159687,'Elsy','Villacis','0997656415','evillacis@evasa.com.ec','NA','2019-02-05 23:31:56','2019-02-05 23:31:56'),(13,908747207,'Matilde','Casal','0995620748','matildecasalo@hotmail.com','Matilde Casalo','2019-02-05 23:41:06','2019-02-05 23:41:06'),(14,1706827597,'Naddya','Coba','0981072515','ncoba@hotmail.com','@naddyacoba','2019-02-06 08:01:21','2019-02-06 08:01:21'),(15,915865091,'Sonia Cecilia','Zambrano Izquierdo','0987130378','sonycecilia1708@gmail.com','Sonia Zambrano','2019-02-06 08:12:14','2019-02-06 08:12:14'),(16,802136515,'Alejandra Maria','López Andrade','0958940675','Isicristijero.al@gmail.com','@isicristijero','2019-02-06 21:09:56','2019-02-06 21:09:56');
/*!40000 ALTER TABLE `representantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `representantes_atletas`
--

LOCK TABLES `representantes_atletas` WRITE;
/*!40000 ALTER TABLE `representantes_atletas` DISABLE KEYS */;
INSERT INTO `representantes_atletas` VALUES (1,2,1,'2019-01-26 02:50:09','2019-01-26 02:50:09'),(2,2,2,'2019-01-26 02:50:09','2019-01-26 02:50:09'),(3,3,3,'2019-01-26 22:27:44','2019-01-26 22:27:44'),(4,1,4,'2019-01-28 20:20:17','2019-01-28 20:20:17'),(5,1,5,'2019-01-28 20:20:17','2019-01-28 20:20:17'),(6,4,6,'2019-01-29 01:25:22','2019-01-29 01:25:22'),(8,6,8,'2019-01-29 23:27:15','2019-01-29 23:27:15'),(9,7,9,'2019-01-30 00:35:07','2019-01-30 00:35:07'),(10,7,10,'2019-01-30 00:35:07','2019-01-30 00:35:07'),(11,8,11,'2019-01-31 22:37:45','2019-01-31 22:37:45'),(12,9,12,'2019-02-01 21:46:36','2019-02-01 21:46:36'),(13,10,13,'2019-02-05 06:36:19','2019-02-05 06:36:19'),(14,10,14,'2019-02-05 06:36:19','2019-02-05 06:36:19'),(15,11,15,'2019-02-05 22:22:10','2019-02-05 22:22:10'),(16,12,16,'2019-02-05 23:31:56','2019-02-05 23:31:56'),(17,13,17,'2019-02-05 23:41:06','2019-02-05 23:41:06'),(18,13,18,'2019-02-05 23:41:06','2019-02-05 23:41:06'),(19,13,19,'2019-02-05 23:41:06','2019-02-05 23:41:06'),(20,14,20,'2019-02-06 08:01:21','2019-02-06 08:01:21'),(21,14,21,'2019-02-06 08:05:53','2019-02-06 08:05:53'),(22,15,22,'2019-02-06 08:12:14','2019-02-06 08:12:14'),(23,16,23,'2019-02-06 21:09:56','2019-02-06 21:09:56');
/*!40000 ALTER TABLE `representantes_atletas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `reserva_configuracion`
--

LOCK TABLES `reserva_configuracion` WRITE;
/*!40000 ALTER TABLE `reserva_configuracion` DISABLE KEYS */;
INSERT INTO `reserva_configuracion` VALUES (1,'Tarifa por hora','5','2019-01-31 11:00:00',NULL),(2,'Cantidad de personas por tarifa','4','2019-01-31 11:00:00',NULL),(3,'Cantidad de canchas','3','2019-01-31 11:00:00',NULL),(4,'Hora inicio','8','2019-01-31 11:00:00',NULL),(5,'Hora fin','21','2019-01-31 11:00:00',NULL),(6,'Locaciones','1,2',NULL,NULL);
/*!40000 ALTER TABLE `reserva_configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,'2019-01-25 01:26:53','2019-01-25 01:26:53'),(2,1,2,'2019-02-02 03:06:08','2019-02-02 03:06:08'),(3,1,3,'2019-02-04 20:44:28','2019-02-04 20:44:28');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2019-01-25 01:26:52','2019-01-25 01:26:52');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,'Academia',1,'2019-01-24 05:00:00',NULL),(2,'Alquiler de canchas',1,'2019-01-24 05:00:00',NULL),(3,'Vacacional',1,'2019-01-24 05:00:00',NULL),(4,'Campamentos',1,'2019-01-24 05:00:00',NULL),(5,'Torneos',1,'2019-01-24 05:00:00',NULL);
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tarifas`
--

LOCK TABLES `tarifas` WRITE;
/*!40000 ALTER TABLE `tarifas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarifas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ssaman','Stephanie','Saman','admin@example.com','Activo',NULL,'$2y$10$G8dslrPwz5HBhdumHB8N7OcRGVa9xnXpGp2pXQF5KPhjNodoehZqq','FdHM0BqLBFAaVeff0WRMSVGqvYBFVt3DdwHuXg0MhC5AvG369iqoZwa9SykS','2019-01-25 01:26:53','2019-01-25 01:26:53'),(2,'bespinoza','Brenda','Espinoza','brenda@example.com','Activo',NULL,'$2y$10$ygi8HOA3.c99dnD0J.68KOY3JwUVpmXOGIldLa00L0znJr7S34zFu','TrLAzElv9nNWb9Ixd7OgpE9LcY1c6e4itM2mQ6AqIeKpPe0tHxDk9esaQoCL','2019-02-02 03:06:08','2019-02-02 03:06:08'),(3,'vvillarroel','Vanessa','Villarroel','vvillarroel@example.com','Activo',NULL,'$2y$10$MhIv3H/U7EyqgY5xXUSWN.zndaxO20AMikwIJmmXqQRKeTda9w0au','Ga1jQ9dDDHWsDuxfY5wwCxawx0kEb18Wm0IulNGMIzsTmzX0SrHbByzTwjLH','2019-02-04 20:44:28','2019-02-04 20:44:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vacacional`
--

LOCK TABLES `vacacional` WRITE;
/*!40000 ALTER TABLE `vacacional` DISABLE KEYS */;
INSERT INTO `vacacional` VALUES (1,2,'2019-02-11','2019-03-13','2019-01-28',6,14,10,10,1,'2019-01-24 05:00:00',NULL),(2,1,'2019-02-11','2019-03-13','2019-01-28',6,14,10,10,1,'2019-01-24 05:00:00',NULL);
/*!40000 ALTER TABLE `vacacional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `vacacional_horarios`
--

LOCK TABLES `vacacional_horarios` WRITE;
/*!40000 ALTER TABLE `vacacional_horarios` DISABLE KEYS */;
INSERT INTO `vacacional_horarios` VALUES (1,1,'08:30','10:30',90.00,1,'2019-01-24 05:00:00',NULL),(2,1,'10:30','12:30',90.00,1,'2019-01-24 05:00:00',NULL),(3,1,'08:30','12:30',150.00,0,'2019-01-24 05:00:00',NULL),(4,2,'08:30','10:30',90.00,1,'2019-01-24 05:00:00',NULL),(5,2,'10:30','12:30',90.00,1,'2019-01-24 05:00:00',NULL),(6,2,'08:30','12:30',150.00,0,'2019-01-24 05:00:00',NULL);
/*!40000 ALTER TABLE `vacacional_horarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-06 11:23:26
