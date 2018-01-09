-- MySQL dump 10.13  Distrib 5.5.53, for Win32 (AMD64)
--
-- Host: localhost    Database: work
-- ------------------------------------------------------
-- Server version	5.5.53

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
-- Current Database: `work`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `work` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `work`;

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `aname` varchar(15) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (1,1,'游玩'),(2,1,'看看'),(3,1,'斗战神'),(4,1,'随便写个名字嘛'),(5,1,'空相册');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) NOT NULL,
  `pname` varchar(15) NOT NULL,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (1,1,'201710251653341','../photoDatabase/谢鑫磊/游玩/2017102516533419.jpeg'),(3,1,'201710251653995','../photoDatabase/谢鑫磊/游玩/2017102516539953.jpeg'),(7,1,'201710251721544','../photoDatabase/谢鑫磊/游玩/2017102517215440.jpeg'),(8,2,'201710251721228','../photoDatabase/谢鑫磊/看看/2017102517212287.jpeg'),(10,3,'201710251825743','../photoDatabase/谢鑫磊/斗战神/2017102518257434.jpeg'),(11,3,'201710251825460','../photoDatabase/谢鑫磊/斗战神/2017102518254606.jpeg'),(12,4,'201710260907318','../photoDatabase/谢鑫磊/随便写个名字嘛/2017102609073184.jpeg'),(13,4,'201710260907419','../photoDatabase/谢鑫磊/随便写个名字嘛/2017102609074191.jpeg'),(14,4,'201710260922860','../photoDatabase/谢鑫磊/随便写个名字嘛/2017102609228608.jpeg'),(15,4,'201710260922893','../photoDatabase/谢鑫磊/随便写个名字嘛/2017102609228935.jpeg'),(16,2,'201710280002844','../photoDatabase/谢鑫磊/看看/2017102800028443.jpeg'),(17,2,'201710280002745','../photoDatabase/谢鑫磊/看看/2017102800027456.jpeg'),(18,2,'201710280002303','../photoDatabase/谢鑫磊/看看/2017102800023030.jpeg'),(19,2,'201710280002338','../photoDatabase/谢鑫磊/看看/2017102800023387.jpeg'),(20,2,'201710280002824','../photoDatabase/谢鑫磊/看看/2017102800028249.jpeg'),(21,3,'201710280003324','../photoDatabase/谢鑫磊/斗战神/2017102800033242.jpeg'),(22,3,'201710280003128','../photoDatabase/谢鑫磊/斗战神/2017102800031281.jpeg'),(23,3,'201710280003450','../photoDatabase/谢鑫磊/斗战神/2017102800034503.jpeg'),(24,3,'201710280003987','../photoDatabase/谢鑫磊/斗战神/2017102800039878.jpeg');
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `add_user` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `num` varchar(20) NOT NULL,
  `add_time` date NOT NULL,
  `pro_imgs` varchar(20) NOT NULL,
  `pro_cont` varchar(100) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sex` enum('男','女') NOT NULL DEFAULT '男',
  `status` enum('启用','禁用') NOT NULL DEFAULT '禁用',
  `regist_time` varchar(20) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin@163.com','男','启用','2009-06-04','1980-01-04','13522610430'),(2,'user1','user1@yahoo.cn','男','启用','2009-02-16','1977-02-03','13566752354'),(3,'finally_m','finally_m@126.com','男','启用','2009-06-06','2009-06-02','18611966723'),(4,'zhaoxinguo','sxdtzhaoxing@foxnail','男','启用','2014-12-24','1989-12-03','18611966724'),(5,'test','144342588@qq.com','男','启用','2014-12-25 11:05:38','2014-12-03','18611966725');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL COMMENT '姓名',
  `age` int(3) NOT NULL COMMENT '年龄',
  `sex` enum('男','女') NOT NULL DEFAULT '男' COMMENT '性别',
  `phone` char(11) NOT NULL COMMENT '手机号',
  `password` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `qxian` enum('是','否') NOT NULL DEFAULT '否' COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'谢鑫磊',23,'男','18380425296','a19941001s','774084941@qq.com','是'),(4,'达瓦',18,'女','18334794309','q19941001w','2470588931@qq.com','否'),(5,'袁露',20,'女','13532615479','z19941001x','yuanlu@163.com','否'),(6,'丁小翠',50,'女','13434515479','a19690318s','dinxiaocui@163.com','否'),(7,'韩文杰',21,'男','13519968023','962464','745639007@qq.com','是'),(8,'小张',20,'男','18227905262','z19941001x','xiaozhang@163.com','否'),(9,'小明',19,'男','16705233584','s194563s','xiaoming@163.com','否'),(10,'谢谢',30,'男','18388164609','d19941001s','aksdfjaos@163.com','否'),(11,'1441510204',1,'女','15987874012','123456','fsdjhsfh@163.com','是'),(12,'秦佳',18,'女','14412510204','123456','qinjia@163.com','否'),(13,'刘比',40,'男','14011912011','123456','liubi@163.com','否');
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

-- Dump completed on 2017-10-28  8:20:28
