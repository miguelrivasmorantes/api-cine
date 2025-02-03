-- MySQL dump 10.13  Distrib 9.0.1, for Linux (x86_64)
--
-- Host: localhost    Database: cine
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
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actores`
--

LOCK TABLES `actores` WRITE;
/*!40000 ALTER TABLE `actores` DISABLE KEYS */;
INSERT INTO `actores` VALUES (1,'Leonardo DiCaprio','1974-11-11','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Leonardo_Dicaprio_Cannes_2019.jpg/220px-Leonardo_Dicaprio_Cannes_2019.jpg'),(2,'Scarlett Johansson','1984-11-22','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Johansson_Transformers_One_Premiere.jpg/220px-Johansson_Transformers_One_Premiere.jpg'),(3,'Emma Stone','1988-11-06','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/Emma_Stone_at_the_2024_New_York_Film_Festival_2.jpg/220px-Emma_Stone_at_the_2024_New_York_Film_Festival_2.jpg'),(4,'Ryan Gosling','1980-11-12','Canadiense','https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/GoslingBFI081223_%2822_of_30%29_%2853388157347%29_%28cropped%29.jpg/220px-GoslingBFI081223_%2822_of_30%29_%2853388157347%29_%28cropped%29.jpg'),(5,'Jennifer Aniston','1969-02-11','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/JenniferAnistonHWoFFeb2012.jpg/220px-JenniferAnistonHWoFFeb2012.jpg'),(6,'Tom Hanks','1956-07-09','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Tom_Hanks_at_the_Elvis_Premiere_2022.jpg/220px-Tom_Hanks_at_the_Elvis_Premiere_2022.jpg'),(7,'Julia Roberts','1967-10-28','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Julia_Roberts_2010.jpg/412px-Julia_Roberts_2010.jpg'),(8,'Hugh Grant','1960-09-09','Británico','https://upload.wikimedia.org/wikipedia/commons/thumb/d/da/Hugh_Grant_Brussels_%2708.jpg/170px-Hugh_Grant_Brussels_%2708.jpg'),(9,'Meg Ryan','1961-11-19','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/e/e2/Meg_Ryan_at_the_2009_Tribeca_Film_Festival.jpg/250px-Meg_Ryan_at_the_2009_Tribeca_Film_Festival.jpg'),(10,'Anne Hathaway','1982-11-12','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Anne_Hathaway-68408_%28cropped%29.jpg/220px-Anne_Hathaway-68408_%28cropped%29.jpg'),(11,'Meryl Streep','1949-06-22','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/a/a3/Meryl_Streep_interview_at_Festival_de_Cannes_2024_%28cropped%29.jpg/220px-Meryl_Streep_interview_at_Festival_de_Cannes_2024_%28cropped%29.jpg'),(12,'Sandra Bullock','1964-07-26','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Sandra_Bullock_Cannes.jpg/220px-Sandra_Bullock_Cannes.jpg'),(13,'Matthew McConaughey','1969-11-04','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Matthew_McConaughey_2019_%2848648344772%29.jpg/250px-Matthew_McConaughey_2019_%2848648344772%29.jpg'),(14,'Keanu Reeves','1964-09-02','Canadiense','hhttps://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/Keanu_Reves_in_Mexico_2.jpg/220px-Keanu_Reves_in_Mexico_2.jpg'),(15,'Reese Witherspoon','1976-03-22','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Reese_Witherspoon_at_TIFF_2014.jpg/220px-Reese_Witherspoon_at_TIFF_2014.jpg'),(16,'Nicole Kidman','1967-06-20','Australiana','https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Nicole_kidman3cropped.jpg/170px-Nicole_kidman3cropped.jpg'),(17,'Brad Pitt','1963-12-18','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Brad_Pitt-69858.jpg/220px-Brad_Pitt-69858.jpg'),(18,'Jennifer Lawrence','1990-08-15','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Jennifer_Lawrence_at_the_2024_Golden_Globes_%281%29.png/220px-Jennifer_Lawrence_at_the_2024_Golden_Globes_%281%29.png'),(19,'Adam Sandler','1966-09-09','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/3/39/Adam_Sandler_at_Berlinale_2024.jpg/220px-Adam_Sandler_at_Berlinale_2024.jpg'),(20,'Rachel McAdams','1978-11-17','Canadiense','https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Rachel_McAdams_by_Gage_Skidmore.jpg/180px-Rachel_McAdams_by_Gage_Skidmore.jpg');
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
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nacionalidad` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_imagen` varchar(510) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directores`
--

LOCK TABLES `directores` WRITE;
/*!40000 ALTER TABLE `directores` DISABLE KEYS */;
INSERT INTO `directores` VALUES (1,'Steven Spielberg','1946-12-18','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/MKr25425_Steven_Spielberg_%28Berlinale_2023%29.jpg/270px-MKr25425_Steven_Spielberg_%28Berlinale_2023%29.jpg'),(2,'Christopher Nolan','1970-07-30','Británico','https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Christopher_Nolan_Cannes_2018.jpg/220px-Christopher_Nolan_Cannes_2018.jpg'),(3,'Quentin Tarantino','1963-03-27','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Quentin_Tarantino_by_Gage_Skidmore.jpg/280px-Quentin_Tarantino_by_Gage_Skidmore.jpg'),(4,'Martin Scorsese','1942-11-17','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/Martin_Scorsese-68754.jpg/220px-Martin_Scorsese-68754.jpg'),(5,'James Cameron','1954-08-16','Canadiense','https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/James_Cameron_by_Gage_Skidmore.jpg/220px-James_Cameron_by_Gage_Skidmore.jpg'),(6,'Damien Chazelle','1985-01-19','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/Damien_Chazelle_in_NYC%2C_2018_%28cropped%29.jpg/220px-Damien_Chazelle_in_NYC%2C_2018_%28cropped%29.jpg'),(7,'Nora Ephron','1941-05-19','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Nora_Ephron.jpg/250px-Nora_Ephron.jpg'),(8,'Richard Curtis','1956-11-08','Británico','https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/Richard_Curtis_MFF_2016.jpg/220px-Richard_Curtis_MFF_2016.jpg'),(9,'Greta Gerwig','1983-08-04','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Greta_Gerwig_at_Barbie_Movie_Reception_%28headshot%29.jpg/220px-Greta_Gerwig_at_Barbie_Movie_Reception_%28headshot%29.jpg'),(10,'Nancy Meyers','1949-12-08','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Nancy_Meyers_headshot.jpg/260px-Nancy_Meyers_headshot.jpg'),(11,'Garry Marshall','1934-11-13','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Garry_Marshall_2013_cropped.jpg/220px-Garry_Marshall_2013_cropped.jpg'),(12,'Woody Allen','1935-12-01','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Woody_Allen_Cannes_2016.jpg/220px-Woody_Allen_Cannes_2016.jpg'),(13,'John Hughes','1950-02-18','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/John_Hughes%2C_1967_HS_Yearbook.jpg/220px-John_Hughes%2C_1967_HS_Yearbook.jpg'),(14,'Rob Reiner','1947-03-06','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/1/11/Rob_Reiner_MFF_2016.jpg/220px-Rob_Reiner_MFF_2016.jpg'),(15,'Peter Jackson','1961-10-31','Neozelandés','https://upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Peter_Jackson_SDCC_2014.jpg/250px-Peter_Jackson_SDCC_2014.jpg'),(16,'Taika Waititi','1975-08-16','Neozelandés','https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Taika_Waititi_photo_by_pouria_afkhami.jpg/220px-Taika_Waititi_photo_by_pouria_afkhami.jpg'),(17,'Guillermo del Toro','1964-10-09','Mexicano','https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Guillermo_del_Toro_2023_%28cropped%29.jpg/220px-Guillermo_del_Toro_2023_%28cropped%29.jpg'),(18,'Hayao Miyazaki','1941-01-05','Japonés','https://upload.wikimedia.org/wikipedia/commons/thumb/e/e2/Hayao_Miyazaki_cropped_1_Hayao_Miyazaki_201211.jpg/220px-Hayao_Miyazaki_cropped_1_Hayao_Miyazaki_201211.jpg'),(19,'Sofia Coppola','1971-05-14','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/SofiaCoppPicCen081223_%289_of_22%29_%2853387864406%29_%28cropped%29.jpg/220px-SofiaCoppPicCen081223_%289_of_22%29_%2853387864406%29_%28cropped%29.jpg'),(20,'Spike Jonze','1969-10-22','Estadounidense','https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Spike_Jonze_Her_Premiere_NYFF_2013_%28cropped%29.jpg/250px-Spike_Jonze_Her_Premiere_NYFF_2013_%28cropped%29.jpg');
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
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fundacion` date DEFAULT NULL,
  `url_logo` varchar(510) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudios`
--

LOCK TABLES `estudios` WRITE;
/*!40000 ALTER TABLE `estudios` DISABLE KEYS */;
INSERT INTO `estudios` VALUES (1,'Warner Bros.','Estados Unidos','1923-04-04','https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Warner_Bros._logo_2023.svg/150px-Warner_Bros._logo_2023.svg.png'),(2,'Universal Pictures','Estados Unidos','1912-06-08','https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Universal-Pictures-Logo.svg/295px-Universal-Pictures-Logo.svg.png'),(3,'Paramount Pictures','Estados Unidos','1912-05-08','https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Paramount_Pictures_2022_%28Blue%29.svg/250px-Paramount_Pictures_2022_%28Blue%29.svg.png'),(4,'Walt Disney Pictures','Estados Unidos','1923-10-16','https://upload.wikimedia.org/wikipedia/en/thumb/5/57/Walt_Disney_Pictures_2011_logo.svg/125px-Walt_Disney_Pictures_2011_logo.svg.png'),(5,'20th Century Studios','Estados Unidos','1935-05-31','https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/20th_Century_Studios_%282020%29.svg/220px-20th_Century_Studios_%282020%29.svg.png'),(6,'Sony Pictures','Estados Unidos','1987-12-21','https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Sony_Pictures_logo.svg/80px-Sony_Pictures_logo.svg.png'),(7,'Metro-Goldwyn-Mayer','Estados Unidos','1924-04-17','https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Metro-Goldwyn-Mayer_%E2%80%94_Slats_the_Lion_%281926%29.png/320px-Metro-Goldwyn-Mayer_%E2%80%94_Slats_the_Lion_%281926%29.png'),(9,'Columbia Pictures','Estados Unidos','1918-01-10','https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Columbia_Pictures_logo.svg/220px-Columbia_Pictures_logo.svg.png'),(12,'New Line Cinema','Estados Unidos','1967-07-11','https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/New_Line_Cinema_2024.svg/320px-New_Line_Cinema_2024.svg.png'),(18,'Netflix Studios','Estados Unidos','2013-08-29','https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Netflix_2015_logo.svg/200px-Netflix_2015_logo.svg.png');
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
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(510) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generos`
--

LOCK TABLES `generos` WRITE;
/*!40000 ALTER TABLE `generos` DISABLE KEYS */;
INSERT INTO `generos` VALUES (1,'Acción','https://cdn2.iconfinder.com/data/icons/movie-59/60/pistol__gun__weapon__movie__film-512.png'),(2,'Aventura','https://cdn1.iconfinder.com/data/icons/adventure-outline-1/64/Adventure-Line-15-512.png'),(3,'Drama','https://cdn0.iconfinder.com/data/icons/font-awesome-solid-vol-4/640/theater-masks-512.png'),(4,'Comedia','https://cdn2.iconfinder.com/data/icons/emoji-137/64/happy_smile_laugh_1_Emoji_Emoticon-512.png'),(5,'Ciencia ficción','https://cdn2.iconfinder.com/data/icons/movie-59/60/UFO__spaceship__alien__movie__film-512.png'),(6,'Fantasía','https://cdn2.iconfinder.com/data/icons/magic-29/64/Weapon_fantasy_spell_book_magig-512.png'),(7,'Terror','https://cdn1.iconfinder.com/data/icons/funeral-7/64/reaper-death-cultures-spooky-terror-scary-scythe-character-costume-horror-user-skull-halloween-512.png'),(8,'Thriller','https://cdn3.iconfinder.com/data/icons/police-101/512/18_Knife_Kill_Blood_Killer_Sharp_Crime-512.png'),(9,'Animación','https://cdn0.iconfinder.com/data/icons/phosphor-bold-vol-3-1/256/pencil-simple-line-duotone-512.png'),(10,'Romance','https://cdn0.iconfinder.com/data/icons/valentine-2119/64/Valentine_Outline__unlock-love-valentines-romantic-heart-512.png'),(11,'Comedia Romántica','https://cdn4.iconfinder.com/data/icons/valentines-2026/200/Valentines-12-512.png'),(12,'Musical','https://cdn2.iconfinder.com/data/icons/picol-vector/32/music-512.png'),(13,'Biográfico','https://cdn3.iconfinder.com/data/icons/lined-office-1/64/Artboard_25-512.png'),(14,'Histórico','https://cdn3.iconfinder.com/data/icons/lined-office-1/64/Artboard_29-512.png'),(15,'Western','https://cdn0.iconfinder.com/data/icons/phosphor-light-vol-1/256/cactus-light-512.png'),(16,'Deportes','https://cdn4.iconfinder.com/data/icons/sports-outline-24-px/24/Baseball_bat_sport_game_play-512.png'),(17,'Policíaco','https://cdn1.iconfinder.com/data/icons/people-sign/24/Police-512.png'),(18,'Guerra','https://cdn4.iconfinder.com/data/icons/tabler-vol-6/24/tank-512.png'),(19,'Suspenso','https://cdn0.iconfinder.com/data/icons/phosphor-fill-vol-2/256/detective-fill-512.png'),(20,'Documental','https://cdn0.iconfinder.com/data/icons/user-interface-2063/24/UI_Essential_icon_expanded-66-512.png');
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
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estreno` date DEFAULT NULL,
  `taquilla` decimal(15,2) DEFAULT NULL,
  `pais` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

--
-- Table structure for table `posters`
--

DROP TABLE IF EXISTS `posters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pelicula` int NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pelicula` (`id_pelicula`),
  CONSTRAINT `posters_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posters`
--

LOCK TABLES `posters` WRITE;
/*!40000 ALTER TABLE `posters` DISABLE KEYS */;
INSERT INTO `posters` VALUES (21,1,'https://media-cache.cinematerial.com/p/500x/unoktgtv/la-la-land-movie-poster.jpg?v=1472589717'),(22,1,'https://media-cache.cinematerial.com/p/500x/97blej9u/la-la-land-movie-poster.jpg?v=1485385477'),(23,2,'https://media-cache.cinematerial.com/p/500x/k3wytzyi/easy-a-movie-cover.jpg?v=1456775480'),(24,3,'https://media-cache.cinematerial.com/p/500x/zv8lstqd/titanic-movie-poster.jpg?v=1704644889'),(25,4,'https://cdn.cinematerial.com/p/136x/7uwb4va7/inception-movie-poster-sm.jpg?v=1456797089'),(26,5,'https://media-cache.cinematerial.com/p/500x/srmnoyxu/pulp-fiction-movie-poster.jpg?v=1668291848'),(27,6,'https://media-cache.cinematerial.com/p/500x/dpm18533/the-notebook-movie-poster.jpg?v=1542222904'),(28,7,'https://media-cache.cinematerial.com/p/500x/ehswn4xu/crazy-stupid-love-movie-poster.jpg?v=1456719391'),(29,8,'https://media-cache.cinematerial.com/p/500x/wg45dazz/pretty-woman-movie-poster.jpg?v=1500475362'),(30,9,'https://media-cache.cinematerial.com/p/500x/la3ndczu/notting-hill-movie-poster.jpg?v=1456294832'),(31,10,'https://media-cache.cinematerial.com/p/500x/ok36qxyk/when-harry-met-sally-movie-poster.jpg?v=1456292533'),(32,11,'https://media-cache.cinematerial.com/p/500x/qq3vsm6r/youve-got-mail-dvd-movie-cover.jpg?v=1456741031'),(33,12,'https://media-cache.cinematerial.com/p/500x/wf55ztco/the-holiday-movie-poster.jpg?v=1456819010'),(34,13,'https://media-cache.cinematerial.com/p/500x/sgxdi0lk/bridget-joness-diary-movie-poster.jpg?v=1456815944'),(35,14,'https://media-cache.cinematerial.com/p/500x/aqrsaifm/crazy-rich-asians-movie-poster.jpg?v=1536507321'),(36,15,'https://media-cache.cinematerial.com/p/500x/kuslonid/10-things-i-hate-about-you-movie-poster.jpg?v=1456036365'),(37,16,'https://media-cache.cinematerial.com/p/500x/87f9e7dz/500-days-of-summer-movie-poster.jpg?v=1456332437'),(38,17,'https://media-cache.cinematerial.com/p/500x/tj9qbixq/silver-linings-playbook-movie-poster.jpg?v=1456561108'),(39,18,'https://media-cache.cinematerial.com/p/500x/kj1asoku/to-all-the-boys-ive-loved-before-movie-poster.jpg?v=1532857913'),(40,19,'https://media-cache.cinematerial.com/p/500x/necnlbz6/me-before-you-movie-poster.jpg?v=1456062022'),(41,20,'https://media-cache.cinematerial.com/p/500x/ememh1wk/love-actually-british-movie-poster.jpg?v=1456180571');
/*!40000 ALTER TABLE `posters` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-04  0:08:11
