# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.01 (MySQL 5.7.24)
# Base de datos: inventario
# Tiempo de Generación: 2019-02-19 16:39:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla categorias
# ------------------------------------------------------------

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;

INSERT INTO `categorias` (`id`, `categoria`, `created_at`, `updated_at`)
VALUES
	(1,'equipos electromecánicos','2019-02-11 14:00:43','2019-02-11 14:00:43'),
	(2,'taladros','2019-02-11 14:00:58','2019-02-11 14:00:58'),
	(3,'andamios','2019-02-11 14:01:04','2019-02-11 14:01:04'),
	(4,'generadores de energia','2019-02-11 14:01:13','2019-02-11 14:01:13'),
	(5,'equipos de construcción','2019-02-11 14:01:29','2019-02-11 14:01:29'),
	(6,'martillos mecánicos','2019-02-11 14:01:40','2019-02-11 14:01:40'),
	(11,'ropa','2019-02-13 17:57:17','2019-02-13 17:57:17');

/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla clientes
# ------------------------------------------------------------

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `ultima_compra`, `compras`, `created_at`, `updated_at`)
VALUES
	(1,'Didier Ramirez','31231213','didier@gmail.com','(312) 312-3121','Santa Helena','2019-02-01 00:00:00','2019-02-19 11:31:30',12,'2019-02-11 16:04:33','2019-02-19 11:31:30'),
	(2,'amanda lucia quiñones','312312312','amanda@gmail.com','(313) 321-2131','Rincon de Yambitara 2 Etapa','2019-02-19 00:00:00','2019-02-16 11:17:38',5,'2019-02-16 11:17:19','2019-02-16 11:17:38');

/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla migrations
# ------------------------------------------------------------

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2018_06_27_193138_create_permission_tables',1),
	(4,'2018_06_30_165214_create_categorias_table',1),
	(5,'2018_07_05_160739_create_productos_table',1),
	(6,'2018_07_08_112822_create_clientes_table',1),
	(7,'2018_07_08_163053_create_ventas_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla model_has_permissions
# ------------------------------------------------------------



# Volcado de tabla model_has_roles
# ------------------------------------------------------------

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`)
VALUES
	(1,'App\\User',1),
	(2,'App\\User',2),
	(3,'App\\User',3);

/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla password_resets
# ------------------------------------------------------------



# Volcado de tabla permissions
# ------------------------------------------------------------



# Volcado de tabla productos
# ------------------------------------------------------------

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `nombre`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `created_at`, `updated_at`)
VALUES
	(2,1,'102','Plato Flotante para Allanadora','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/yxTnyDnd8sNBfQv3yaMxdV4okNl9Gfbg9AjAAkzO.png',16,4500,6300,'4',NULL,'2019-02-16 10:14:12'),
	(3,1,'103','Compresor de Aire para pintura','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/LilLDgPBKJGCSWbNiI1rKkDAWZesrtPw03tKiPeU.jpeg',15,3000,4200,'5',NULL,'2019-02-16 10:14:12'),
	(4,1,'104','Cortadora de Adobe sin Disco','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/0JgUoevitc9rFjUDFEGBjoSUDS0c7bIc6DQIS6FU.jpeg',19,4000,5600,'1',NULL,'2019-02-19 11:31:30'),
	(5,1,'105','Cortadora de Piso sin Disco','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/romUWpoicr0Ahffx5L7mybO7VqJ4tNXjkhj07nBj.jpeg',19,1540,2156,'1',NULL,'2019-02-19 11:31:30'),
	(6,1,'106','Disco Punta Diamante','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/KhdaYgtXE6eWarSQ5mQL5AgAgZYMWvLqDTt0eXK0.jpeg',18,1100,1540,'2',NULL,'2019-02-16 11:17:38'),
	(7,1,'107','Extractor de Aire','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/LU1xinmT1tFaNsXggS8KOCyXFcyaBnhpwWiQae09.jpeg',20,1540,2156,'0',NULL,'2019-02-09 16:39:59'),
	(8,1,'108','Guadañadora','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/sdzIN9zQGIM2dp2jmD3gADXA2Ei7nS12fmsc3O16.jpeg',17,1540,2156,'3',NULL,'2019-02-16 11:17:38'),
	(9,1,'109','Hidrolavadora Eléctrica','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/r1sXO9ueWGCwljrxYFJWTDgqIXl8Ro3x8wrkGtMv.jpeg',20,2600,3640,'0',NULL,'2019-02-09 16:40:20'),
	(10,1,'110','Hidrolavadora Gasolina','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/WKlEDvRl57yqhIw2DCUdGn41nyHD0Pqs88KzLUOR.png',20,2210,3094,'0',NULL,'2019-02-09 16:40:30'),
	(11,1,'111','Motobomba a Gasolina','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/7caEbNMH3jJUoNDs1Mwz1xbqVTdb3DY6pYro2K4g.jpeg',20,2860,4004,'0',NULL,'2019-02-09 16:40:45'),
	(12,1,'112','Motobomba Eléctrica','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/WpJ4et0NXrncLxeVD4TyqChq2pFPWYrGI9qacva7.jpeg',20,2400,3360,'0',NULL,'2019-02-09 16:42:20'),
	(13,1,'113','Sierra Circular','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/AfbwLQsiuCnWI2ahO2yvBG8ztZQNvNoaBYudXGJi.jpeg',20,1100,1540,'0',NULL,'2019-02-09 16:51:49'),
	(14,1,'114','Disco de tugsteno para Sierra circular','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/NqCtxgbnbfYiotooOdoVKqsV1eRiMYigECwMfQyJ.jpeg',20,4500,6300,'0',NULL,'2019-02-09 16:52:00'),
	(15,1,'115','Soldador Electrico','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/UjT3aJwLpiShtFX5XbWpM8nFxefxemYoTpGCXIgo.png',20,1980,2772,'0',NULL,'2019-02-09 16:52:13'),
	(16,1,'116','Careta para Soldador','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/ipqloDGOeYa0SyToW3i6EUWW78dikGGMnBrabcNI.jpeg',20,4200,5880,'0',NULL,'2019-02-09 16:52:34'),
	(17,1,'117','Torre de iluminacion','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/X5hoNWLqKb22c94Tk0Hrk7Ahj1J1fmHnt9YgMZp5.jpeg',20,1800,2520,'0',NULL,'2019-02-09 16:52:43'),
	(18,2,'201','Martillo Demoledor de Piso 110V','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/sW5X4fiqMNKJjOl7RKMJ2rZoMF2hPgCCv7NBb4v5.jpeg',20,5600,7840,'0',NULL,'2019-02-09 16:52:52'),
	(19,2,'202','Muela o cincel martillo demoledor piso','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/WV1Y1rvNyqjjNcGSTfqp7z5OzOeG3Qy7KaAO6Ce9.jpeg',20,9600,13440,'0',NULL,'2019-02-09 16:53:06'),
	(20,2,'203','Taladro Demoledor de muro 110V','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/RXlbDygxPytV2lWjDiaKwIfXpEQTqHMdlZv1KYnc.jpeg',20,3850,5390,'0',NULL,'2019-02-09 16:53:28'),
	(21,2,'204','Muela o cincel martillo demoledor muro','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/rJzTl7S2SD08wETdXkOSvfJ4pU4biCU4xOxIPgyc.jpeg',20,9600,13440,'0',NULL,'2019-02-09 16:53:42'),
	(22,2,'205','Taladro Percutor de 1/2&quot; Madera y Metal&quot;','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/xRYu7L0lowPA9R7Ns2jWUNuFdTfkwR9uxIZqJE2R.jpeg',20,8000,11200,'0',NULL,'2019-02-09 16:54:18'),
	(23,2,'206','Taladro Percutor SDS Plus 110V','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/tXF71OAoBPjLVmuSaADgiJsgDujoMnNISr6MRCDM.jpeg',20,3900,5460,'0',NULL,'2019-02-09 16:57:11'),
	(24,2,'207','Taladro Percutor SDS Max 110V (Mineria)','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/1dzOfqiSuROAsL9OQyms6gQ8uWybdigDlnVJ3X3q.jpeg',20,4600,6440,'0',NULL,'2019-02-09 16:57:22'),
	(25,3,'301','Andamio colgante','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/NqtmIVsppZ7n2d6OhWA2f82AiHweQz372OCgfrjB.jpeg',20,1440,2016,'0',NULL,'2019-02-09 16:57:35'),
	(26,3,'302','Distanciador andamio colgante','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/ViKaZpQTCvDzZX3PxpLDUUCenqM6cnGezgAGcL1S.jpeg',20,1600,2240,'0',NULL,'2019-02-09 16:57:45'),
	(27,3,'303','Marco andamio modular','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/AqK8QpsHflE2w5oLLZPoHjOLMaqccrv2gXy8LJG8.jpeg',20,900,1260,'0',NULL,'2019-02-09 16:57:59'),
	(28,3,'304','Marco andamio tijera','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/iBAnu6srR9X40ynrxOS61prQ9HZ4LH9SUCKEOwje.jpeg',20,100,140,'0',NULL,'2019-02-09 16:58:08'),
	(30,3,'306','Escalera interna para andamio','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/m5ihrYUjz4WYWoaBjkuZqrZI4lhjMYftibrmqH6s.png',20,270,378,'0',NULL,'2019-02-09 16:58:51'),
	(31,3,'307','Pasamanos de seguridad','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/YzX6IydLyZ1gkRwxTsmr77IDNi83WwrVatXsTlYd.jpeg',20,75,105,'0',NULL,'2019-02-09 16:59:11'),
	(33,3,'309','Arnes de seguridad','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/kwekn3YMgmcYkPvviXnMb7H6Kf3ZE90mhPeLjEAq.jpeg',20,1750,2450,'0',NULL,'2019-02-09 16:59:32'),
	(34,3,'310','Eslinga para arnes','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/dJ5RnsxwLF6l4kl30rwTyKN3i9ykdnRE3xw4V91S.jpeg',20,175,245,'0',NULL,'2019-02-09 17:00:54'),
	(35,3,'311','Plataforma Metálica','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/KRT0FiRlwfQB6AkKjcJbUTjlgyyqDxAD5quEEwvM.jpeg',20,420,588,'0',NULL,'2019-02-09 17:01:04'),
	(36,4,'401','Planta Electrica Diesel 6 Kva','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/AZO0wneltU9cbDGwUU8MCn7e8wKETXKumLpyjWDv.jpeg',20,3500,4900,'0',NULL,'2019-02-09 17:01:14'),
	(37,4,'402','Planta Electrica Diesel 10 Kva','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/6JRO8XH3URhvrLIvFjlwwjQZWxagHiJ3lJy78AvA.jpeg',20,3550,4970,'0',NULL,'2019-02-09 17:01:23'),
	(38,4,'403','Planta Electrica Diesel 20 Kva','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/v07a4gn2PxNKnFYulrQDD4fPZYwdv5DxlVXAF9dz.jpeg',20,3600,5040,'0',NULL,'2019-02-09 17:01:35'),
	(39,4,'404','Planta Electrica Diesel 30 Kva','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/3ve69XeYvI5FDDpQ5tXiwUspolAf17dr3pJoFQmH.jpeg',20,3650,5110,'0',NULL,'2019-02-09 17:01:48'),
	(40,4,'405','Planta Electrica Diesel 60 Kva','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/RAqgNS71Qwqtt0houusv1BpxYoB1vXinrAIhRqT8.jpeg',20,3700,5180,'0',NULL,'2019-02-09 17:01:57'),
	(41,4,'406','Planta Electrica Diesel 75 Kva','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/bpojiC5RMDrkfqN9oV06L3xQO877qFwWV8f4m7nz.jpeg',20,3750,5250,'0',NULL,'2019-02-09 17:02:09'),
	(42,4,'407','Planta Electrica Diesel 100 Kva','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/N6ZZAvRNgz42VF7NMQxp5LD8f3pmyjrh6uCOdfpm.jpeg',20,3800,5320,'0',NULL,'2019-02-09 17:02:18'),
	(43,4,'408','Planta Electrica Diesel 120 Kva','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/690gfQbsJ9QznyEf8G0ThbWGlDrZkEAznq4wl3XY.png',20,3850,5390,'0',NULL,'2019-02-09 17:02:26'),
	(44,5,'501','Escalera de Tijera Aluminio','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/UltfdFwyKilxl2OSLQQ63BGnETZE3Wtbn42fC4Le.png',20,350,490,'0',NULL,'2019-02-09 17:02:36'),
	(45,5,'502','Extension Electrica','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/CjJcRJTT4cp6Hob5z70AqkFaXQTRJlWBJQnShMaj.jpeg',20,370,518,'0',NULL,'2019-02-09 17:02:45'),
	(46,5,'503','Gato tensor','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/CZqIK9KnHCzjanXKLuVPDH0KkjYjyuzFrubts3mO.jpeg',20,380,532,'0',NULL,'2019-02-09 17:02:54'),
	(47,5,'504','Lamina Cubre Brecha','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/TvrSN50bglWb0fU3weviEZKUlCdeT7XlA7G817IR.jpeg',20,380,532,'0',NULL,'2019-02-09 17:03:04'),
	(48,5,'505','Llave de Tubo','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/D5tTPMecXTzXyd9HUZMvHeIT4DYyoHocTY4sQRnr.jpeg',20,480,672,'0',NULL,'2019-02-09 17:03:16'),
	(49,5,'506','Manila por Metro','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/ApFyHwlmo5DF9wb1yMcH8cuAO1CLpPS18xhiDi9n.jpeg',20,600,840,'0',NULL,'2019-02-09 17:03:26'),
	(50,5,'507','Polea 2 canales','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/7ykRKbawqoIXnZsl4vh5yYs4Cp6DCHBlSw6IU6y8.jpeg',20,900,1260,'0',NULL,'2019-02-09 17:03:56'),
	(51,5,'508','Tensor','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/lfsSzv1dW0yX0A9Vr3ghnefl0GYp1hVHyz4W8IZ4.jpeg',20,100,140,'0',NULL,'2019-02-09 17:03:34'),
	(52,5,'509','Bascula','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/RggmHRlKc8aRkURRIGp1EUAnt5ePFXAYsh9HE6ii.jpeg',20,130,182,'0',NULL,'2019-02-09 17:03:47'),
	(53,5,'510','Bomba Hidrostatica','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/T6ObRnQQGWjDZc4dSsZNnCADfGztsuHDueVEI4HV.jpeg',20,770,1078,'0',NULL,'2019-02-09 17:04:05'),
	(54,5,'511','Chapeta','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/uO7ndIPhZk6FnnaxLTjSB1i30eWREQfvVhukOITZ.jpeg',20,660,924,'0',NULL,'2019-02-09 17:04:18'),
	(55,5,'512','Cilindro muestra de concreto','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/eBzPwhkq8TZsl62yxKES3HVx05uU8HYd7wdPiP1w.jpeg',20,400,560,'0',NULL,'2019-02-09 17:04:26'),
	(56,5,'513','Cizalla de Palanca','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/AFlaHjd201Cn6Gm536y65yfXfi1Ty8uW21cDBd9J.jpeg',20,450,630,'0',NULL,'2019-02-09 17:04:35'),
	(57,5,'514','Cizalla de Tijera','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/7D8Qh9EvVAxhPdE62jrqOCHWwgpi5gxCvInpp4rE.jpeg',20,580,812,'0',NULL,'2019-02-09 17:04:45'),
	(58,5,'515','Coche llanta neumatica','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/bKEDsYTRsMz7dJkKcnE1K6VglBp8OLXT0lrmNqRc.jpeg',20,420,588,'0',NULL,'2019-02-09 17:04:53'),
	(59,5,'516','Cono slump','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/yKnzB0wXLFsUj3xYlMdzCgS0oC5JKCqFbMDskwvF.jpeg',20,140,196,'0',NULL,'2019-02-09 17:05:02'),
	(60,5,'517','Cortadora de Baldosin','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','/storage/productos/SfC5fMaWEIenB0wYESmO8m8VuaRYi8aco7A01xth.png',20,930,1302,'0',NULL,'2019-02-09 17:05:11'),
	(61,6,'601','martillo mecanico','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy <b>text of the printing</b> and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br></p>','/storage/productos/KTMZ9AHjtmksW3uICFwPqOg1O1WnZy7H0SiJG7xf.jpeg',15,100000,190000,'0','2019-02-15 10:09:29','2019-02-15 10:09:29');

/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla role_has_permissions
# ------------------------------------------------------------



# Volcado de tabla roles
# ------------------------------------------------------------

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`)
VALUES
	(1,'Administrador','web','2019-02-15 09:26:03','2019-02-15 09:26:03'),
	(2,'Bodega','web','2019-02-15 09:26:03','2019-02-15 09:26:03'),
	(3,'Vendedor','web','2019-02-15 09:26:03','2019-02-15 09:26:03');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla users
# ------------------------------------------------------------

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `apellidos`, `email`, `telefono`, `estado`, `foto`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Silvio Mauricio','Gutierrez Quiñones','silviotista93@gmail.com','318564382','activo','/storage/usuarios/oFhryB4HWDGwPNE1hv1t8OHGT4txw0FESUiBv6Gl.jpeg','$2y$10$H4RM7h1CSCdg17AQ1wPD7eTi5SGIZPLEEDwaQHpBARj8MCHBg0uHC',NULL,'2019-02-15 09:26:03','2019-02-15 09:33:15'),
	(2,'Silvio','Gutierrez','smgutierrez@gmail.com','318564382','activo','','$2y$10$ys9fCzKlKvF5Spl.xlXlgeUctgzqrQ2OzbYNPUPi3xGR.OTd8pndy',NULL,'2019-02-15 09:26:04','2019-02-15 09:26:04'),
	(3,'Cristian','Zalazar','cristian@gmail.com','318564382','activo','','$2y$10$3UPaHHI7FU7UdOYWQyqysueCuEO3QWEcB5I8EqXXEqjq9YtBaNnrC',NULL,'2019-02-15 09:26:04','2019-02-15 09:26:04');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla ventas
# ------------------------------------------------------------

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `created_at`, `updated_at`)
VALUES
	(3,'10001',1,1,'[{\"id\":\"2\",\"nombre\":\"Plato Flotante Para Allanadora\",\"descripcion\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"cantidad\":\"1\",\"stock\":\"16\",\"precio\":\"6300\",\"total\":\"6300\"},{\"id\":\"3\",\"nombre\":\"Compresor De Aire Para Pintura\",\"descripcion\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"cantidad\":\"1\",\"stock\":\"15\",\"precio\":\"4200\",\"total\":\"4200\"}]',1050,10500,11550,'TC-1231212','2019-02-16 10:14:12','2019-02-16 10:14:12'),
	(4,'10004',2,1,'[{\"id\":\"6\",\"nombre\":\"Disco Punta Diamante\",\"descripcion\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"cantidad\":\"2\",\"stock\":\"18\",\"precio\":\"1540\",\"total\":\"3080\"},{\"id\":\"8\",\"nombre\":\"Guadañadora\",\"descripcion\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"cantidad\":\"3\",\"stock\":\"17\",\"precio\":\"2156\",\"total\":\"6468\"}]',954.8,9548,10502.8,'Efectivo','2019-02-16 11:17:38','2019-02-16 11:17:38'),
	(5,'10005',1,1,'[{\"id\":\"4\",\"nombre\":\"Cortadora De Adobe Sin Disco\",\"descripcion\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"5600\",\"total\":\"5600\"},{\"id\":\"5\",\"nombre\":\"Cortadora De Piso Sin Disco\",\"descripcion\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"2156\",\"total\":\"2156\"}]',775.6,7756,8531.6,'Efectivo','2019-02-19 11:31:30','2019-02-19 11:31:30');

/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
