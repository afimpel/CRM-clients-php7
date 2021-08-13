CREATE DATABASE abmClient;
CREATE USER 'abmClient'@'%' IDENTIFIED BY '3x4mpl3';
GRANT ALL PRIVILEGES ON abmClient.* TO 'abmClient'@'%';
FLUSH PRIVILEGES;

USE abmClient;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groupClient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1AFCC6985E237E06` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observations` longtext COLLATE utf8_unicode_ci NOT NULL,
  `groupClient_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C82E74BCEAE29D` (`groupClient_id`),
  CONSTRAINT `FK_C82E74BCEAE29D` FOREIGN KEY (`groupClient_id`) REFERENCES `groupClient` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
