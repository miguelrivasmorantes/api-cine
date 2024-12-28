-- MySQL dump 10.13  Distrib 9.0.1, for Linux (x86_64)
--
-- Host: localhost    Database: peliculas
-- ------------------------------------------------------
-- Server version	9.0.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actores`
--

DROP TABLE IF EXISTS `actores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `actores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actores`
--

LOCK TABLES `actores` WRITE;
/*!40000 ALTER TABLE `actores` DISABLE KEYS */;
INSERT INTO `actores` VALUES (1,'Leonardo DiCaprio','1974-11-11','Estadounidense'),(2,'Scarlett Johansson','1984-11-22','Estadounidense'),(3,'Emma Stone','1988-11-06','Estadounidense'),(4,'Ryan Gosling','1980-11-12','Canadiense'),(5,'Jennifer Aniston','1969-02-11','Estadounidense'),(6,'Tom Hanks','1956-07-09','Estadounidense'),(7,'Julia Roberts','1967-10-28','Estadounidense'),(8,'Hugh Grant','1960-09-09','Británico'),(9,'Meg Ryan','1961-11-19','Estadounidense'),(10,'Anne Hathaway','1982-11-12','Estadounidense'),(11,'Meryl Streep','1949-06-22','Estadounidense'),(12,'Sandra Bullock','1964-07-26','Estadounidense'),(13,'Matthew McConaughey','1969-11-04','Estadounidense'),(14,'Keanu Reeves','1964-09-02','Canadiense'),(15,'Reese Witherspoon','1976-03-22','Estadounidense'),(16,'Nicole Kidman','1967-06-20','Australiana'),(17,'Brad Pitt','1963-12-18','Estadounidense'),(18,'Jennifer Lawrence','1990-08-15','Estadounidense'),(19,'Adam Sandler','1966-09-09','Estadounidense'),(20,'Rachel McAdams','1978-11-17','Canadiense');
/*!40000 ALTER TABLE `actores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directores`
--

DROP TABLE IF EXISTS `directores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `directores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directores`
--

LOCK TABLES `directores` WRITE;
/*!40000 ALTER TABLE `directores` DISABLE KEYS */;
INSERT INTO `directores` VALUES (1,'Steven Spielberg','1946-12-18','Estadounidense'),(2,'Christopher Nolan','1970-07-30','Británico'),(3,'Quentin Tarantino','1963-03-27','Estadounidense'),(4,'Martin Scorsese','1942-11-17','Estadounidense'),(5,'James Cameron','1954-08-16','Canadiense'),(6,'Damien Chazelle','1985-01-19','Estadounidense'),(7,'Nora Ephron','1941-05-19','Estadounidense'),(8,'Richard Curtis','1956-11-08','Británico'),(9,'Greta Gerwig','1983-08-04','Estadounidense'),(10,'Nancy Meyers','1949-12-08','Estadounidense'),(11,'Garry Marshall','1934-11-13','Estadounidense'),(12,'Woody Allen','1935-12-01','Estadounidense'),(13,'John Hughes','1950-02-18','Estadounidense'),(14,'Rob Reiner','1947-03-06','Estadounidense'),(15,'Peter Jackson','1961-10-31','Neozelandés'),(16,'Taika Waititi','1975-08-16','Neozelandés'),(17,'Guillermo del Toro','1964-10-09','Mexicano'),(18,'Hayao Miyazaki','1941-01-05','Japonés'),(19,'Sofia Coppola','1971-05-14','Estadounidense'),(20,'Spike Jonze','1969-10-22','Estadounidense');
/*!40000 ALTER TABLE `directores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudios`
--

DROP TABLE IF EXISTS `estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fundacion` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudios`
--

LOCK TABLES `estudios` WRITE;
/*!40000 ALTER TABLE `estudios` DISABLE KEYS */;
INSERT INTO `estudios` VALUES (1,'Warner Bros.','Estados Unidos','1923-04-04'),(2,'Universal Pictures','Estados Unidos','1912-06-08'),(3,'Paramount Pictures','Estados Unidos','1912-05-08'),(4,'Walt Disney Pictures','Estados Unidos','1923-10-16'),(5,'20th Century Studios','Estados Unidos','1935-05-31'),(6,'Sony Pictures','Estados Unidos','1987-12-21'),(7,'Metro-Goldwyn-Mayer','Estados Unidos','1924-04-17'),(8,'DreamWorks Pictures','Estados Unidos','1994-10-12'),(9,'Columbia Pictures','Estados Unidos','1918-01-10'),(10,'Pixar Animation Studios','Estados Unidos','1986-02-03'),(11,'Lionsgate Films','Estados Unidos','1997-07-10'),(12,'New Line Cinema','Estados Unidos','1967-07-11'),(13,'Fox Searchlight Pictures','Estados Unidos','1994-08-01'),(14,'Miramax Films','Estados Unidos','1979-12-19'),(15,'Focus Features','Estados Unidos','2002-01-01'),(16,'Illumination Entertainment','Estados Unidos','2007-03-27'),(17,'Studio Ghibli','Japón','1985-06-15'),(18,'Netflix Studios','Estados Unidos','2013-08-29'),(19,'Amazon Studios','Estados Unidos','2010-11-19'),(20,'Blumhouse Productions','Estados Unidos','2000-12-31');
/*!40000 ALTER TABLE `estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generos`
--

DROP TABLE IF EXISTS `generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generos`
--

LOCK TABLES `generos` WRITE;
/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` VALUES (1,'Acción'),(2,'Aventura'),(3,'Drama'),(4,'Comedia'),(5,'Ciencia ficción'),(6,'Fantasía'),(7,'Terror'),(8,'Thriller'),(9,'Animación'),(10,'Romance'),(11,'Comedia Romántica'),(12,'Musical'),(13,'Biográfico'),(14,'Histórico'),(15,'Western'),(16,'Deportes'),(17,'Policíaco'),(18,'Guerra'),(19,'Suspenso'),(20,'Documental');
/*!40000 ALTER TABLE `generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelicula_actor`
--

DROP TABLE IF EXISTS `pelicula_actor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelicula_actor` (
  `id_pelicula` int NOT NULL,
  `id_actor` int NOT NULL,
  PRIMARY KEY (`id_pelicula`,`id_actor`),
  KEY `id_actor` (`id_actor`),
  CONSTRAINT `pelicula_actor_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`),
  CONSTRAINT `pelicula_actor_ibfk_2` FOREIGN KEY (`id_actor`) REFERENCES `actores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelicula_actor`
--

LOCK TABLES `pelicula_actor` WRITE;
/*!40000 ALTER TABLE `pelicula_actor` DISABLE KEYS */;
INSERT INTO `pelicula_actor` VALUES (3,1),(4,1),(5,1),(1,3),(2,3),(7,3),(16,3),(1,4),(6,4),(8,7),(9,7),(14,7),(20,7),(3,8),(6,8),(15,8),(8,9),(11,9),(12,9),(9,10),(11,10),(12,10),(10,11),(13,11),(17,11),(19,12),(13,14),(17,14),(10,15),(15,15),(18,16),(4,18),(7,18),(16,18),(5,19),(19,19),(20,19),(14,20),(18,20);
/*!40000 ALTER TABLE `pelicula_actor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelicula_genero`
--

DROP TABLE IF EXISTS `pelicula_genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelicula_genero` (
  `id_pelicula` int NOT NULL,
  `id_genero` int NOT NULL,
  PRIMARY KEY (`id_pelicula`,`id_genero`),
  KEY `id_genero` (`id_genero`),
  CONSTRAINT `pelicula_genero_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`),
  CONSTRAINT `pelicula_genero_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelicula_genero`
--

LOCK TABLES `pelicula_genero` WRITE;
/*!40000 ALTER TABLE `pelicula_genero` DISABLE KEYS */;
INSERT INTO `pelicula_genero` VALUES (4,1),(3,3),(5,3),(16,3),(17,3),(19,3),(2,4),(5,4),(7,4),(11,4),(12,4),(14,4),(15,4),(20,4),(4,5),(3,10),(6,10),(8,10),(9,10),(10,10),(13,10),(17,10),(18,10),(19,10),(1,11),(2,11),(6,11),(7,11),(8,11),(9,11),(10,11),(11,11),(12,11),(13,11),(14,11),(15,11),(16,11),(18,11),(20,11),(1,12);
/*!40000 ALTER TABLE `pelicula_genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peliculas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estreno` date DEFAULT NULL,
  `taquilla` decimal(15,2) DEFAULT NULL,
  `pais` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_estudio` int DEFAULT NULL,
  `id_director` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estudio` (`id_estudio`),
  KEY `id_director` (`id_director`),
  CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`id_estudio`) REFERENCES `estudios` (`id`),
  CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`id_director`) REFERENCES `directores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peliculas`
--

LOCK TABLES `peliculas` WRITE;
/*!40000 ALTER TABLE `peliculas` DISABLE KEYS */;
INSERT INTO `peliculas` VALUES (1,'La La Land','2016-12-09',447407706.00,'Estados Unidos',2,6),(2,'Easy A','2010-09-17',74958816.00,'Estados Unidos',9,8),(3,'Titanic','1997-12-19',2201647264.00,'Estados Unidos',3,5),(4,'Inception','2010-07-16',836848102.00,'Estados Unidos',1,2),(5,'Pulp Fiction','1994-10-14',213928762.00,'Estados Unidos',2,3),(6,'The Notebook','2004-06-25',115603229.00,'Estados Unidos',7,19),(7,'Crazy, Stupid, Love','2011-07-29',142851197.00,'Estados Unidos',2,9),(8,'Pretty Woman','1990-03-23',463407268.00,'Estados Unidos',7,10),(9,'Notting Hill','1999-05-28',363889678.00,'Reino Unido',4,8),(10,'When Harry Met Sally','1989-07-21',92823546.00,'Estados Unidos',9,13),(11,'You’ve Got Mail','1998-12-18',250821495.00,'Estados Unidos',1,7),(12,'The Holiday','2006-12-08',205135000.00,'Estados Unidos',5,9),(13,'Bridget Jones\'s Diary','2001-04-13',281980000.00,'Reino Unido',7,9),(14,'Crazy Rich Asians','2018-08-15',238532921.00,'Estados Unidos',12,10),(15,'10 Things I Hate About You','1999-03-31',60381089.00,'Estados Unidos',6,9),(16,'500 Days of Summer','2009-07-17',60722134.00,'Estados Unidos',5,8),(17,'Silver Linings Playbook','2012-11-16',236412453.00,'Estados Unidos',4,15),(18,'To All the Boys I’ve Loved Before','2018-08-17',0.00,'Estados Unidos',18,20),(19,'Me Before You','2016-06-03',208314186.00,'Reino Unido',12,9),(20,'Love Actually','2003-11-14',246942017.00,'Reino Unido',6,8);
/*!40000 ALTER TABLE `peliculas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-24  3:00:46
