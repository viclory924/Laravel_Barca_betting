-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bettend
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_10_02_092606_create_players_table',1),(4,'2017_10_02_135252_create_sessions_table',1),(5,'2017_11_03_093601_update_players_add_access_token',1),(6,'2017_11_13_090712_add_field_in_player_table',1),(7,'2017_11_20_120138_update_players_table_add_balance',1),(8,'2019_01_04_202954_create_pages_content_table',1),(9,'2019_01_10_105111_update_players_table_add_email_hash',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages_content`
--

DROP TABLE IF EXISTS `pages_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages_content`
--

LOCK TABLES `pages_content` WRITE;
/*!40000 ALTER TABLE `pages_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `player_id` int(11) NOT NULL DEFAULT '0',
  `balance` decimal(8,2) NOT NULL,
  `email_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,'lasernet82','lasernet82','info@nettrading.eu1','$2y$10$SI..n4rh486X0OVQe8PQg.wsHS47Ez96Hnqef7WKFg8z/2sUBdurq',NULL,'2019-04-19 10:34:40','2019-04-19 10:35:21','3f16f9e6e4f73c1a72e0dc4b97ea5c3d',1208,0.00,'a58149d355f02887dfbe55ebb2b64ba368629a73c6b5bb3f5545fd9764feb1bd'),(2,'abc','abc','abc@gmail.com','$2y$10$qQSFHSGdMx1lEdhC49UDn.Ix4fPBiJjzp.CkOWbrENqigRRQiKUMe',NULL,'2019-04-19 11:15:24','2019-04-19 11:15:24','',1209,0.00,'7e7e69ea3384874304911625ac34321cd59ba0a69b5068b04f79c17aaf953cd7'),(3,'tbz','tbz','tbz@gmail.com','$2y$10$G6R/saymkHmwW.iIPa0x1e088jPVexCl9SCTLEuwFz6PtlIJytGB2',NULL,'2019-04-19 11:16:56','2019-04-19 11:16:56','',1210,0.00,'f7cade80b7cc92b991cf4d2806d6bd78d59ba0a69b5068b04f79c17aaf953cd7'),(4,'rio','rio','rio@gmail.com','$2y$10$NQtK3UtWsRCMBMCdCxWBMe3k0arfBicb0rp.bhHTNBAdH3SSyaGiu',NULL,'2019-04-19 11:21:10','2019-04-19 11:21:38','3a76e0585f00f517be4fa05a9038a2a4',1211,0.00,'285ab9448d2751ee57ece7f762c39095d59ba0a69b5068b04f79c17aaf953cd7'),(5,'markus','markus','markus@gmail.com','$2y$10$j/luBTF2g0WmebtasCRGAeWEp2gnr.zh8FmxVAw.2m0wfj38fFuni',NULL,'2019-04-19 11:54:50','2019-04-19 11:54:50','',1212,0.00,'a01610228fe998f515a72dd730294d87d59ba0a69b5068b04f79c17aaf953cd7'),(6,'eth','eth','hunter@gmail.com','$2y$10$ma5.MqgaHfN68Gw5rr58xe8WbT5XueS7jAY8yK6n2SBnXttVpu5ba',NULL,'2019-04-19 11:55:58','2019-04-19 11:57:28','5477a7ed3ca276e43d8e9f9eca14c7bb',1213,0.00,'33ceb07bf4eeb3da587e268d663aba1ad59ba0a69b5068b04f79c17aaf953cd7'),(7,'Aleksa95','Aleksa95','aleksaprebiracevicorona@gmail.com','$2y$10$59/pa4QoCpHfGqtrNjJVgud6iP8tcnJn32hPJWHQExm7M3Zc02LoK',NULL,'2019-05-10 12:18:35','2019-05-10 12:18:41','22cfe5e6e924216c3e187b96314f6d67',1255,0.00,'3bf55bbad370a8fcad1d09b005e278c27a3e47ed2267d6002a651ffd8a85954c'),(8,'mblsh7777777','mblsh7777777','trademgrig111@gmail.com','$2y$10$PTrDT9X7BxVOSCF8tQBeYOLBOf3cJKfBvodzZhf.y.4R9FnT7zdHi',NULL,'2019-05-28 05:21:54','2019-05-28 05:21:54','',1283,0.00,'018b59ce1fd616d874afad0f44ba338d06f137848496c2eed26588bf63438a6c'),(9,'super11','super11','super11@bet.com','$2y$10$f7ve0eQun.Gc5xcfhDDGzuTj83iULXYvhyl8sd/w0aoPRmKIUzypC',NULL,'2019-06-04 09:27:37','2019-06-04 09:27:37','90f0a7a7ebd226ad13181b6ebdfdfed4',1298,0.00,'a51fb975227d6640e4fe47854476d1336189bd36da9400207d59ab95e73b3810'),(10,'mblsh888','mblsh888','mblsh888@gmail.com','$2y$10$fBZBYw2imSNDKKwkvIDXzu2buzmhEdeUKUxYbLlZUxyiZJvLSGg/O',NULL,'2019-06-13 04:24:43','2019-06-13 04:24:43','a76efdf8578fe293e1ecb105d0791484',1308,0.00,'a0872cc5b5ca4cc25076f3d868e1bdf825f8c8bfc5a63b2d6920db2b0fab254c'),(11,'coptimo123','coptimo123','coptimo@gmail.com','$2y$10$UwOmufVTGj0E0KQytsqmH.JZRFLfPyrX1n8kx2erqlzOnZzcfa.o6',NULL,'2019-06-16 10:39:14','2019-06-16 10:39:14','6ad18a7e94861f2e6d4c90afc2da8003',1328,0.00,'4c22bd444899d3b6047a10b20a2f26dbd59ba0a69b5068b04f79c17aaf953cd7'),(12,'tester011','tester011','tester011@gmail.com','$2y$10$LywoFdZiAyAwTwO8Lbe4XeySSI/9Jh5Gzyq6vlg15i01crhKy0qz6',NULL,'2019-06-17 04:47:31','2019-06-17 04:47:31','a403a955131f5812ae740f15c301b393',1329,0.00,'01e9565cecc4e989123f9620c1d09c09d59ba0a69b5068b04f79c17aaf953cd7'),(13,'bettend123','bettend123','bettend@gmail.com','$2y$10$2oFY/Vm/X/SF4d3Cku/zfOoGwCxDF0Rc6dWeNX2.llQg8.WAr5yG2',NULL,'2019-06-17 05:32:14','2019-06-17 05:32:15','c3ea5494f0210b4e10f65053b9b5216b',1330,0.00,'fe51510c80bfd6e5d78a164cd5b1f688d59ba0a69b5068b04f79c17aaf953cd7'),(14,'testerk1','testerk1','testerk1@gmail.com','$2y$10$Pz2XXI.WzOji7jMrEexpAeQQvS5eRccy1hGcKy/ErrUdPt1RhA3by',NULL,'2019-06-17 13:35:49','2019-06-17 13:35:49','826d4ae9f3c32746ccb3fa204bec16e3',1331,0.00,'e077e1a544eec4f0307cf5c3c721d9440f05e70c205ba80012d12957afe558c0'),(15,'karan11','karan patwardhan','karan11@gmail.com','$2y$10$HCbDksjoJpGOsjTR6WO5FeoJ.XqFRNN/KYCeKeBNFbQXf42Im5Nuy','qL8PWX8Og6aTI2TCo9th2dQPdjrq33BtjF6ZWjbrL3140UGjxOr569c5DwpL','2019-06-18 11:59:39','2019-08-16 06:01:03','b9b4f9a10b446a9d301803013ce40423',1332,8.00,'28e209b61a52482a0ae1cb9f5959c7920f05e70c205ba80012d12957afe558c0'),(16,'vitkor','Vitalii Korolchuk test','vitalik100500.kor100500@gmail.com','$2y$10$Ocg6dOPJXR4kDdBkq430B.9U9JdBPpaHT9aFX3Pu3gpZ7nhEwWgBy',NULL,'2019-06-19 11:12:18','2019-06-19 11:12:18',' ',1169,20.00,NULL),(17,'mblsh777','mblsh777','trademgrig@gmail.com','$2y$10$/k95dt10bmPGMIfSlTjFQuJeqkwLrsEkjdOf44IbBdQ8KZwgQ1P3e',NULL,'2019-06-19 12:35:07','2019-06-19 12:35:07',' ',1158,0.00,NULL),(18,'mblsh7777','Mihails Grigorjevs','trademgrig1111@gmail.com','$2y$10$Uy7Pj6/B.6rziBUxzEBShunK1NCKJscGBGtQvsnfdRoaVZ3zMg.kS',NULL,'2019-06-19 13:27:15','2019-07-03 12:47:37','b226006726c2cea75794b755410db503',1333,0.00,'ff49cc40a8890e6a60f40ff3026d273025f8c8bfc5a63b2d6920db2b0fab254c'),(19,'testvit','Vitalii Korolchuk','vitalik.kor@gmail.com','$2y$10$NRtGuixczJanr/XAbu6Cj.Ik3wB1GJA.oRn/7vWW2fSVk7bCL47AC',NULL,'2019-06-23 07:23:07','2019-06-23 07:23:07',' ',1190,10.00,NULL),(20,'testvit1','testvit1','testvit1@mail.com','$2y$10$fOyne2lb.w/X6MNDBJUx6eWaiWR6Ea6.aYQsN4mYy8W3FVkkCzMYO',NULL,'2019-06-23 07:27:17','2019-06-23 07:27:17','d57daae34b3a58442aebf46ec171ad84',1334,0.00,'8edd72158ccd2a879f79cb2538568fdc2f36c159a144acdf40e453d5cf27af67'),(21,'sweety','sweety patson','sweety@gmail.com','$2y$10$NaZtYGOGAdDIqvwFAxjSM.PIbtoTevKvhy51cqYzJStf.1QLm5cDy','68gkIEhSa561ELQjSCPFW3gUDgyH2uVnmRGlaMvrtY8UrIrSqI0bxNTOh7jK','2019-06-25 13:42:40','2019-09-21 18:27:50','7deb93e60e91f5dcd71f1bf22a1c0393',1335,509.45,'9cb67ffb59554ab1dabb65bcb370ddd90f05e70c205ba80012d12957afe558c0'),(22,'vitalik','Test','vitalik@mail.com','$2y$10$nosXf.iqsjc5GTRRLEV/VOmhtPaiDqDdk1DdT8P2bcBGXNIlqQAAa',NULL,'2019-06-26 16:02:54','2019-06-26 16:05:54','d3aea3d3888f2d91a999874f0d6eaa17',1336,0.00,'3d779cae2d46cf6a8a99a35ba4167977ee1ec39aee41512a0c619ad7cce3bf0f'),(23,'test','test','test@test.com','$2y$10$KDPDs2spMOcwi8cJaMuqh.0h5rbVEgK2WHPT26EkygI.GZvOySzTy',NULL,'2019-06-26 16:03:23','2019-06-26 16:03:23',' ',71,0.00,NULL),(24,'aster','aster','aster@gmail.com','$2y$10$oNYtXFx0p32DvHUGYN55EuwCDcnAQaE.7cuKk6M7GVMSQWoyPampa','1vraLtNyGx5xhQWKzxaTs5Qcf0TyKSXkT9bDcnZV7g1deoYPPkMCsEXlgSPv','2019-06-27 04:58:14','2019-06-27 04:58:37','',1337,0.00,'e48e13207341b6bffb7fb1622282247b57b9ee159cc4cf02d671cde1910eec50'),(25,'mendis','same mendis','mendis@gmail.com','$2y$10$3pXTyaEXZGEg/e9msvIQ7OAm9sixGwgnmyp/GEKX94O6reUYkQ0eC',NULL,'2019-06-27 05:00:29','2019-06-27 05:01:29','8e22951edc97f26473b45dd6712dfec2',1338,0.00,'05311655a15b75fab86956663e1819cd0c0fb6b2ee7dbb235035f7f6fdcfe8fb'),(26,'karan01','karan patwardhan','karan01@gmail.com','$2y$10$9dG5ZL8LgANTdVmBwRMJ7u6dDIldi.8YxwU.RaMApzObEv6viOoX6',NULL,'2019-07-02 15:17:53','2019-07-02 15:19:26','c8638a7cf1d756df1daa0b1a490b5f54',1340,0.00,'4f87658ef0de194413056248a00ce0090f05e70c205ba80012d12957afe558c0'),(27,'тест кириллица','test тест 123','protest072019@gmail.com','$2y$10$hntM7aaVva.hQT9jFh3hkuabLPkWVe1oRaFhelKG8Kliu0KLSfckC','UwZPgiFfenz7ug39x3jLoTU8hIbqKhtIx90ZuhIvTcK0bh0ZfLF5UE2XPW7p','2019-07-04 12:22:55','2019-07-04 13:17:44','',1342,0.00,'5e1b18c4c6a6d31695acbae3fd70ecc61fd34ffe4c8f02d9aa02b50812073f9a'),(28,'tester1','Artem Badyuk','tester1@gmail.com','$2y$10$/mtDNivo4c2t/j9VnaNB4ucZ.sPTEoJbD.2pIb/t9l2vJ5ucGofMG',NULL,'2019-07-04 12:43:33','2019-07-04 12:43:33',' ',1223,0.00,NULL),(29,'mblsh999','Mihails Grigorjevs','office1@bettend.com','$2y$10$UZEyL3mZyvK5tRVAY1ZyVere8U8QoMVYH/QdPSEyc.fh5/ipw.aee',NULL,'2019-07-09 07:27:40','2019-07-09 07:50:45','00a6ba4c55c4181898e718d0c7c488e8',1344,0.00,'a50abba8132a77191791390c3eb19fe7b908d136343e318aceba72ae3cae4200'),(30,'sweety','sweety patson','sweety@gmail.com','$2y$10$9K1Yl2AfGbmmvNwpwyDAeuUPHkxeZ16na/KPTClzn3hj1RUFYFD.C',NULL,'2019-07-18 15:19:41','2019-07-18 15:19:41',' ',1335,500.00,NULL),(31,'sweety','sweety patson','sweety@gmail.com','$2y$10$WQ87VOfh3Vj3LTXjiQfMUOdlc6/J1SG4/TJ9YYcGxt/jI3T/BnF9q',NULL,'2019-07-18 15:20:41','2019-07-18 15:20:41',' ',1335,500.00,NULL),(32,'sweety','sweety patson','sweety@gmail.com','$2y$10$kdbxZcfZXrJq8TkgmZ4/lem7cm4HEbuV6rog7eL37Jp7iFyVzNnnS',NULL,'2019-07-18 15:22:16','2019-07-18 15:22:16',' ',1335,500.00,NULL),(33,'sweety','sweety patson','sweety@gmail.com','$2y$10$rJXfed2Kr2MdT/K9/JIUTuVVNfJZRfxTGrNO5T3P2h7b4vcPMLyD.',NULL,'2019-07-18 15:23:39','2019-07-18 15:23:39',' ',1335,500.00,NULL),(34,'sweety','sweety patson','sweety@gmail.com','$2y$10$tHujV5G/DdjeMa915PP0IOif0w11Unx0hPMfHh7QlKjP.r0yhds5u',NULL,'2019-07-18 15:35:28','2019-07-18 15:35:28',' ',1335,500.00,NULL),(35,'sweety','sweety patson','sweety@gmail.com','$2y$10$Q6oCONXkAAgXsWjcl0Y0nuSIL8Y.ucXnNxUYEmYZXEx1CJvCr8Rh.',NULL,'2019-07-18 16:26:27','2019-07-18 16:26:27',' ',1335,500.00,NULL),(36,'sweety','sweety patson','sweety@gmail.com','$2y$10$OC.N0V/.gTaxzi6JBUXHVOnY5/4oMqQM3DsiEw4FBxbq0RE.BcaNe',NULL,'2019-07-18 16:27:23','2019-07-18 16:27:23',' ',1335,500.00,NULL),(37,'trademgrig88','Mihails Grigorjevs','trademgrig88@gmail.com','$2y$10$iF3eiqa2/fMfUdphBXvcKunTZTPZt9bc/.fPgJtyGRrTbMXHA9LIW','c2rtFDdABnOMM0JMGPER7395A50LIe5kMqQD8Hv1uVTdyT1wp7tqcIlwtYyM','2019-07-31 08:07:29','2019-08-07 14:52:32','ab1147938cce9fc0e40b95b0e7c707ca',1376,0.00,'79a49b3e3762632813f9e35f4ba53d6c25f8c8bfc5a63b2d6920db2b0fab254c'),(38,'sweety1000','sweety patwardhan','sweety1234@gmail.com','$2y$10$HAIAXsy1FBQC41uxsDrYzeN07u.p0r.RKE.AvVHYmOc2xh3X6G5Py',NULL,'2019-08-01 13:29:02','2019-08-01 14:16:08','abcae55685ad8158e09e476a3b42cca8',1383,60.00,'cd0dce8fca267bf1fb86cf43e18d55980f05e70c205ba80012d12957afe558c0'),(39,'tester007','karan patwardhan','tester_gmail@gmail.com','$2y$10$0LwP/BgFP39E6mIqZwg5peYJREsTzK1bCeUDRE9/0GVZbU9QUizvK','tvvHDBise0cz0uLjyMYlpsFPg1pvvr0Q5uwWd5lg6l0aflI5gaMr4A6QuYoJ','2019-08-02 21:12:22','2019-08-03 09:36:15','',1386,30.00,'363763e5c3dc3a68b399058c34aecf2c0f05e70c205ba80012d12957afe558c0'),(40,'tester5','tester5','tester5','$2y$10$UT5SvlprBgW1ySQmgffffutJtra3ch/QiagHeXIrxtQuIO4gGfOUO',NULL,'2019-08-03 09:37:23','2019-08-03 09:37:23','',1387,0.00,'4fa7c62536118cc404dec4a0ca88d4f60f05e70c205ba80012d12957afe558c0'),(41,'tester51','karan patwardhan','tester51234@gmail.com','$2y$10$8cQT/549gXL3mcBJNVZlSeTvrn7hEffAsCCijegP08rRoehq7x4gq','UV1icmUIjd2ed9Bc6fy5MB0saS5dslxZSaL60I6usxlljTOOtpoCrbBsa0nn','2019-08-03 09:40:38','2019-08-03 13:44:30','1347c64a0b3aa206942e450fc528c89f',1388,150.00,'0c0a7566915f4f24853fc4192689aa7e0f05e70c205ba80012d12957afe558c0'),(42,'dsd','dsd','yucel.sonmez2710@gmail.com','$2y$10$ZPZOYZjKTV2Q0S/4.yL7CeyKp7vj.wKRIvuQjJWOySHXvyOk3iyL2',NULL,'2019-08-04 21:26:30','2019-08-04 21:26:30','d17c9746bcf6e7b28a7e95621ecf6524',1389,0.00,'2bd7f907b7f5b6bbd91822c0c7b835f6bb83fb12afe3d6b381165637586d5c1f'),(43,'trademgrig777','Mihails Grigorjevs','trademgrig777@gmail.com','$2y$10$C7eGSuxUh4oOBVGxhLaS6.yt3rmtS6qoAu1c.ojpV4d9DwvKoysmy',NULL,'2019-08-05 05:57:50','2019-08-05 05:58:23','77fb09cc415b17cdbba1e0b5fd6a289c',1390,0.00,'359f38463d487e9e29bd20e24f0c050a25f8c8bfc5a63b2d6920db2b0fab254c'),(44,'waiver','waiver','trete@gmail.com','$2y$10$1YNLTaFyyVQfSIBhCP0sNOoAMruECOZbQDO1bO.TTy21ftoamrfmu',NULL,'2019-08-09 15:23:23','2019-08-09 15:23:23','930f6746134d73c6ac20049d307cc835',1398,0.00,'d9731321ef4e063ebbee79298fa36f56f208d5f4fff768cd87d9ca267f7a6290'),(45,'abbie','abbie mathews','abbie@gmail.com','$2y$10$VcJPLFuzeH7rzgOpYK1W2etttSfsbIq1S8hIXa7svgh9JZfFCN1pm','omynEhRIciYh0wUGzs8CPcThi4vusFpVCuht0eB59QVknHwt2mPGMVSHyGeB','2019-08-12 15:13:50','2019-08-12 16:52:23','',1401,30.00,'9701a1c165dd9420816bfec5edd6c2b1fb81ac5120ce69a8dbb7c0bccf17e0c1'),(46,'james007','james bond','james@gmail.com','$2y$10$6M6WDaCwONkqQC.Ie38goeT2F2.YP.CfIRqjYMTJbB7aCeDyH8rzi',NULL,'2019-08-12 16:55:09','2019-08-12 17:03:29','e2917a1e31a863e3e7f58d923c8bb0d4',1402,0.00,'28fc2782ea7ef51c1104ccf7b9bea13d0f05e70c205ba80012d12957afe558c0'),(47,'ibrahim.manea','Mani Ibrah','ibrahimsaadmanea@gmail.com','$2y$10$md1fTXRToUTBjhuUMBDJbeSfY9zx0pAkT6CmpmqHpYp8YgFsilP7a',NULL,'2019-08-13 12:28:07','2019-08-13 12:41:16','cc2e75396d50e4d8cb089c72d9451a8a',1403,0.00,'4edaa105d5f53590338791951e38c3ad7445b326664b6c563295272a75d14aae'),(48,'Petr2000','Petr2000','petyacalugin@yandex.ru','$2y$10$jSYpoMDSHZLaO5KfSK5ltOX/6Vhbm02oSc8QqdOG9uA4gdf2Jlqje',NULL,'2019-08-25 17:09:14','2019-08-25 17:09:14','a23c67c42ebf1de3a590865d8d0b7fcb',1409,0.00,'7b5b23f4aadf9513306bcd59afb6e4c94355b8782761f4561999078fcdf35c10'),(49,'asd','asd','gdg.pro82@gmail.com','$2y$10$AM5GSWSqLmt8OgVkFjJueeE4Fri9z9B6HveyXBwVXuEYlK82FQRgq',NULL,'2019-08-29 12:58:11','2019-08-29 12:58:11','e45165bb3472edaa84a9d72b65268fdb',1411,0.00,'54072f485cdb7897ebbcaf7525139561ad8f594ce11ff7c5075c705b7acda5f0'),(50,'Yegor','Yegor','vladislavsirbu@email.com','$2y$10$X5l7gHvHAR.J/6fISoNeKubNe4PeFyLIn42NoMp2FuOCJbWrf/xC6',NULL,'2019-09-10 16:41:27','2019-09-10 16:41:28','b368accd17eaaa56ab4d3e065bbbc0c5',1412,0.00,'0e4e946668cf2afc4299b462b812cacaf3e5177ea1df7008d7f217dadc368255'),(51,'G31081978@gmail.com','G31081978@gmail.com','g31081978@gmail.com','$2y$10$ajSw3KV9THMtKMA.dqxNpue7OGKkeopZBGrltwQIauy7McwRdTLc6',NULL,'2019-09-11 08:29:39','2019-09-11 08:29:39','04d01b04f76d3e0c34f032ec1fb66b14',1413,0.00,'59f51fd6937412b7e56ded1ea2470c25e9cf2a5d230288bb23c58c205c63d442'),(52,'rishi rans','rana','ranarishikumar@gmail.com','$2y$10$PV5WBAaI8bnQkIi2g8srFuw7Z9IPoRZBDAEtnLTM8NakQk8dbved2',NULL,'2019-09-21 13:54:09','2019-09-21 13:55:56','b18586ba2d3229ca269c5c517e66c826',1414,0.00,'7a674153c63cff1ad7f0e261c369ab2c0963a36e09c089857b44305600cf8465');
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-27 12:47:44
