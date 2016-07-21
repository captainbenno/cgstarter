-- MySQL dump 10.13  Distrib 5.6.31, for Linux (x86_64)
--
-- Host: localhost    Database: cgstarter
-- ------------------------------------------------------
-- Server version	5.6.31

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
-- Table structure for table `captcha`
--

DROP TABLE IF EXISTS `captcha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `captcha`
--

LOCK TABLES `captcha` WRITE;
/*!40000 ALTER TABLE `captcha` DISABLE KEYS */;
INSERT INTO `captcha` VALUES (1,1462952961,'66.249.65.117','9asXB'),(2,1463039199,'66.249.66.108','SexeT'),(3,1463078586,'66.249.75.170','edO1J'),(4,1463094834,'66.249.75.162','NC2RI'),(5,1463228650,'38.100.21.66','kLhlq'),(6,1463261979,'144.76.30.236','NUO8H'),(7,1463312875,'66.249.79.177','irQDB'),(8,1463455179,'82.80.249.192','PDlhw'),(9,1463455180,'82.80.249.192','NIfMN'),(10,1463464030,'66.249.66.108','JMNPU'),(11,1463493886,'69.58.178.57','mMgky'),(12,1463493898,'69.58.178.57','7Ujjb'),(13,1463605793,'54.167.167.28','tfAr0'),(14,1463710965,'13.82.55.99','y4uvP'),(15,1463737526,'66.249.66.110','BruTh'),(16,1463744072,'180.76.15.153','zzDTY'),(17,1463948545,'167.114.65.240','8JCBq'),(18,1464014141,'180.76.15.29','OI0HP'),(19,1464111981,'192.166.219.136','osFjd'),(20,1464307165,'87.106.143.171','sUBfD'),(21,1464490452,'136.243.152.18','cZJz2'),(22,1464572622,'66.249.64.38','VzC1z'),(23,1464665402,'66.249.64.38','DkHYe'),(24,1465002905,'64.74.215.100','Q1DrL'),(25,1465130327,'66.249.66.169','gvCEU'),(26,1465133703,'192.99.44.141','STgkL'),(27,1465155366,'66.249.66.162','s86QD'),(28,1465166242,'108.59.8.70','ZaQmM'),(29,1465191267,'66.249.66.166','Zoi7E'),(30,1465317876,'144.76.29.66','i8NGp'),(31,1465399171,'138.201.88.141','idAOL'),(32,1465592383,'66.249.64.245','ONlkr'),(33,1465672861,'66.249.66.166','D8Qlt'),(34,1465707857,'66.249.66.166','E4Zut'),(35,1465775807,'66.249.66.169','mTVcj'),(36,1465866758,'38.100.21.69','5UW1Q');
/*!40000 ALTER TABLE `captcha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emails` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `email` varchar(256) NOT NULL,
  `title` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `read` datetime DEFAULT NULL,
  `read_by` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `title` (`title`),
  KEY `created` (`created`),
  KEY `read` (`read`),
  KEY `read_by` (`read_by`),
  KEY `email` (`email`(78))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
INSERT INTO `emails` VALUES (1,'John Doe','john@doe.com','Test Message','This is only a test message. Notice that once you\'ve read it, the button changes from blue to grey, indicating that it has been reviewed.','2013-01-01 00:00:00',NULL,NULL);
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attempt` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` VALUES (237,'2016-07-21 10:56:43',NULL,NULL,'127.0.0.1');
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `order_items_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `reward_id` int(11) DEFAULT NULL,
  `reward_title` varchar(255) DEFAULT NULL,
  `reward_cost` decimal(10,0) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `project_title` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_items_id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `billing_street_address1` varchar(255) DEFAULT NULL,
  `billing_street_address2` varchar(255) DEFAULT NULL,
  `billing_suburb` varchar(255) DEFAULT NULL,
  `billing_state` varchar(45) DEFAULT NULL,
  `billing_country` varchar(255) DEFAULT NULL,
  `billing_postcode` varchar(45) DEFAULT NULL,
  `delivery_street_address1` varchar(255) DEFAULT NULL,
  `delivery_street_address2` varchar(255) DEFAULT NULL,
  `delivery_suburb` varchar(255) DEFAULT NULL,
  `delivery_country` varchar(255) DEFAULT NULL,
  `delivery_state` varchar(255) DEFAULT NULL,
  `delivery_postcode` varchar(45) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_total` decimal(10,0) DEFAULT NULL,
  `order_subtotal` decimal(10,0) DEFAULT NULL,
  `order_delivery` decimal(10,0) DEFAULT NULL,
  `payment_transaction_ref` varchar(255) DEFAULT NULL,
  `payment_gateway` varchar(45) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `order_ref` varchar(45) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `payment_auth_code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_leaders`
--

DROP TABLE IF EXISTS `project_leaders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_leaders` (
  `project_leader_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `leader_type` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `leader_profile` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`project_leader_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_leaders`
--

LOCK TABLES `project_leaders` WRITE;
/*!40000 ALTER TABLE `project_leaders` DISABLE KEYS */;
INSERT INTO `project_leaders` VALUES (1,12,0,1,'Dr Mark Snoswell is President of The CGSociety, Publisher & Art Director of Ballistic Media and founder of Ballistic Media. Mark keeps a fairly low public profile choosing to work behind the scenes. Mark has been a major contributor to recent CGChallenges writing much of the inspirational and technical support material.\n');
/*!40000 ALTER TABLE `project_leaders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_news`
--

DROP TABLE IF EXISTS `project_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_news` (
  `project_news_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `teaser_text` varchar(255) DEFAULT NULL,
  `teaser_image` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  `description` text,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`project_news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_news`
--

LOCK TABLES `project_news` WRITE;
/*!40000 ALTER TABLE `project_news` DISABLE KEYS */;
INSERT INTO `project_news` VALUES (1,'EXPOSÉ 12 - order it now or miss out!','',NULL,'2016-07-21 07:44:27',12,1,'Starting with EXPOSÉ 12 we are going back to our roots...  we’re going Ballistic again!\nBallistic Media started as a crown funded company long before the term “crowd funding” was invented. From now on Ballistic books and other new products will be created and sold only by campaign and direct sales. \n',1);
/*!40000 ALTER TABLE `project_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_rewards`
--

DROP TABLE IF EXISTS `project_rewards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_rewards` (
  `project_reward_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `teaser_text` varchar(255) DEFAULT NULL,
  `teaser_image` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `is_active` bit(1) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `shipping` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`project_reward_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_rewards`
--

LOCK TABLES `project_rewards` WRITE;
/*!40000 ALTER TABLE `project_rewards` DISABLE KEYS */;
INSERT INTO `project_rewards` VALUES (1,1,'EXPOSÉ 12 - Hard Cover Book','Beautifully presented, highest quality print, hard cover edition.','Beautifully presented, highest quality print, hard cover edition.','/themes/default/img/demobook.png',50,'',2000,15),(2,1,'EXPOSÉ 12 – Limited Edition book','Beautifully presented, highest quality print, leather cover edition.','Beautifully presented, highest quality print, leather cover edition.','/themes/default/img/demobook.png',120,'',200,15),(3,1,'EXPOSÉ 12  EXTENDED -- eBook',' Incredible eBook extensions to the printed books','Incredible eBook extensions to the printed books','/themes/default/img/demobook.png',20,'',10000,NULL),(6,1,'EXPOSÉ MEMBERSHIP','1 year access to exclusive content','1 year access to exclusive content','/themes/default/img/demobook.png',20,'',10000,NULL),(7,1,'EXPOSÉ 12 + EXTENDED + MEMBERSHIP','Hardcover book + eBook + 1yr Membership','Hardcover book + eBook + 1yr Membership','/themes/default/img/demobook.png',70,'',300,15),(8,1,'EXPOSÉ 12 LIMITED + EXTENDED + MEMBERSHIP','Limited Edition book + eBook + 1yr Membership','Limited Edition book + eBook + 1yr Membership','/themes/default/img/demobook.png',140,'',50,15),(9,1,'EXPOSÉ 12 BOX of 10','10 copies of the EXPOSÉ 12 - Hard Cover Book','10 copies of the EXPOSÉ 12 - Hard Cover Book','/themes/default/img/demobook.png',375,'',50,150);
/*!40000 ALTER TABLE `project_rewards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_rewards_join_backers`
--

DROP TABLE IF EXISTS `project_rewards_join_backers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_rewards_join_backers` (
  `project_rewards_join_backers_id` int(11) NOT NULL AUTO_INCREMENT,
  `reward_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`project_rewards_join_backers_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_rewards_join_backers`
--

LOCK TABLES `project_rewards_join_backers` WRITE;
/*!40000 ALTER TABLE `project_rewards_join_backers` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_rewards_join_backers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `is_active` bit(1) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `teaser_text` varchar(255) DEFAULT NULL,
  `teaser_image` varchar(255) DEFAULT NULL,
  `goal` decimal(10,0) DEFAULT NULL,
  `stub` varchar(45) DEFAULT NULL,
  `url_google` varchar(255) DEFAULT NULL,
  `url_facebook` varchar(255) DEFAULT NULL,
  `url_twitter` varchar(255) DEFAULT NULL,
  `url_instagram` varchar(255) DEFAULT NULL,
  `url_pinterest` varchar(255) DEFAULT NULL,
  `shipping` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'EXPOSÉ 12 ','<h3>Were back!</h3>\n<p>Starting with EXPOSÉ 12 we are going back to our roots...  we’re going Ballistic again!</p>\n<p>Ballistic Media started as a crowd funded company long before the term \"crowd funding\" was invented. From now on Ballistic books and other new products will be created and sold only by campaign and direct sales.</p>\n\n<h3>Better prices – same award winning quality!</h3>\n<p>We can deliver more books at a lower price by returning to our original campaign model. We can also offer new add-ons and products and expand quickly with the new model.</p>\n<p>Ballistic is a multi-award winning book publisher. We are still the world’s leading premiere digital art book publisher with over 50 books published and delivered globally over the last decade.</p>\n\n<h3>Affordable shipping!</h3>\n<p>Ballistic Media has over a decade of experience with global shipping of books. We have shipped many 10\'s thousands of books to over 170 countries. With our experience we can offer unbeatable quality and price for shipping books in our famous specialty book cartons.</p>\n<blockquote>FLAT RATE SHIPPING TO THE WORLD  		<b>$15 per book</b></blockquote>\n\n<h3>New to Ballistic and EXPOSÉ – celebrating EXPOSÉ all around the world.</h3>\n<p>EXPOSÉ is the first and premiere showcase for digital art and artists. Every year EXPOSÉ features the best digital art in the known universe. Since it launched in 2003 EXPOSÉ has been a global sensation… just take a look at these artists from previous editions celebrating EXPOSÉ all around the world.</p>\n\n<blockquote>With the re-launch of Ballistic we are excited to bring a whole range of new products and benefits...</blockquote>\n<p><b>EXTENDED</b> editions are eBook extensions to the printed books. Every year we get over 6,000 entries but we only have room for 300 or so in the books. With EXPOSÉ 12 we will bring out and extended edition as an eBook in the first quarter after the print book ships. It will feature an additional 300 or more artists in the same format as the print book.</p>\n<p><b>MEMBERSHIP</b> includes a year’s access to exclusive access to artists, judges and other industry leaders in a series of monthly webinars through the year. Membership will also give you access and discounts for the growing range of EXPOSÉ products being released over the next 12 months.</p>\n\n','2016-07-20 00:00:00','2016-08-21 00:00:00','',1,'This is the Test Project teaser text','',50000,'expose12',NULL,NULL,NULL,NULL,NULL,NULL),(2,'Test Project','This is a test project','2016-03-01 00:00:00','2016-03-30 00:00:00','',1,'This is the Test Project teaser text','',600,'test2',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `input_type` enum('input','textarea','radio','dropdown','timezones') CHARACTER SET latin1 NOT NULL,
  `options` text COMMENT 'Use for radio and dropdown: key|value on each line',
  `is_numeric` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'forces numeric keypad on mobile devices',
  `show_editor` enum('0','1') NOT NULL DEFAULT '0',
  `input_size` enum('large','medium','small') DEFAULT NULL,
  `translate` enum('0','1') NOT NULL DEFAULT '0',
  `help_text` varchar(256) DEFAULT NULL,
  `validation` varchar(128) NOT NULL,
  `sort_order` tinyint(3) unsigned NOT NULL,
  `label` varchar(128) NOT NULL,
  `value` text COMMENT 'If translate is 1, just start with your default language',
  `last_update` datetime DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site_name','input',NULL,'0','0','large','0',NULL,'required|trim|min_length[3]|max_length[128]',10,'Site Name','CGStarter.com','2016-04-27 11:10:26',1),(2,'per_page_limit','dropdown','10|10\r\n25|25\r\n50|50\r\n75|75\r\n100|100','1','0','small','0',NULL,'required|trim|numeric',50,'Items Per Page','10','2016-04-27 11:10:26',1),(3,'meta_keywords','input',NULL,'0','0','large','0','Comma-seperated list of site keywords','trim',20,'Meta Keywords','these, are, keywords','2016-04-27 11:10:26',1),(4,'meta_description','textarea',NULL,'0','0','large','0','Short description describing your site.','trim',30,'Meta Description','This is the site description.','2016-04-27 11:10:26',1),(5,'site_email','input',NULL,'0','0','medium','0','Email address all emails will be sent from.','required|trim|valid_email',40,'Site Email','youremail@yourdomain.com','2016-04-27 11:10:26',1),(6,'timezones','timezones',NULL,'0','0','medium','0',NULL,'required|trim',60,'Timezone','UTC','2016-04-27 11:10:26',1),(7,'welcome_message','textarea',NULL,'0','1','large','1','Message to display on home page.','trim',70,'Welcome Message','a:7:{s:5:\"dutch\";s:8264:\"<p><img src=\"data:image/png;base64,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\" data-filename=\"ci3-fire-starter.png\" style=\"line-height: 1.42857143; width: 74.4px; height: 96px; float: left;\"><br></p><p>Deze inhoud wordt <em style=\"color: rgb(41, 82, 24); background-color: rgb(255, 239, 198);\">dynamisch</em> gegenereerd. <strong>Deze tekst kan worden bewerkt in de admin -instellingen.</strong></p><p></p>\";s:7:\"english\";s:0:\"\";s:10:\"indonesian\";s:8251:\"<p><img src=\"data:image/png;base64,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\" data-filename=\"ci3-fire-starter.png\" style=\"line-height: 1.42857143; width: 74.4px; height: 96px; float: left;\"><br></p><p>Konten ini sedang dihasilkan secara <em style=\"color: rgb(41, 82, 24); background-color: rgb(255, 239, 198);\">dinamis</em>. <strong>Teks ini diedit dalam pengaturan admin.</strong></p><p></p>\";s:7:\"russian\";s:8345:\"<p><img src=\"data:image/png;base64,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\" data-filename=\"ci3-fire-starter.png\" style=\"line-height: 1.42857143; width: 74.4px; height: 96px; float: left;\"><br></p><p>Это содержание генерируется <em style=\"color: rgb(41, 82, 24); background-color: rgb(255, 239, 198);\">динамически</em>. <strong>Этот текст можно изменить в настройках администратора.</strong></p><p></p>\";s:18:\"simplified-chinese\";s:8151:\"<p><img src=\"data:image/png;base64,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\" data-filename=\"ci3-fire-starter.png\" style=\"line-height: 1.42857143; width: 74.4px; height: 96px; float: left;\"><br></p><p>正在动态生成此内容. <strong>该文本可编辑在管理设置.</strong></p><p></p>\";s:7:\"spanish\";s:8269:\"<p><img src=\"data:image/png;base64,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\" data-filename=\"ci3-fire-starter.png\" style=\"line-height: 1.42857143; width: 74.4px; height: 96px; float: left;\"><br></p><p>Este contenido se genera <em style=\"color: rgb(41, 82, 24); background-color: rgb(255, 239, 198);\">dinámicamente</em>. <strong>Este texto es editable en la configuración de administrador.</strong></p><p></p>\";s:7:\"turkish\";s:8264:\"<p><img src=\"data:image/png;base64,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\" data-filename=\"ci3-fire-starter.png\" style=\"line-height: 1.42857143; width: 74.4px; height: 96px; float: left;\"><br></p><p>Bu içerik <em style=\"color: rgb(41, 82, 24); background-color: rgb(255, 239, 198);\">dinamik</em> olarak oluşturulan ediliyor. <strong>Bu metin yönetici ayarlarında düzenlenebilir.</strong></p><p></p>\";}','2016-04-27 11:10:26',1);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(256) NOT NULL,
  `language` varchar(64) DEFAULT NULL,
  `is_admin` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `deleted` enum('0','1') NOT NULL DEFAULT '0',
  `validation_code` varchar(50) DEFAULT NULL COMMENT 'Temporary code for opt-in registration',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','ce516f215aa468c376736c9013e8b663f7b3c06226a87739bc6b32882f9278349a721ea725a156eecf9e3c1868904a77e4d42c783e0287a0909a8bbb97e1525f','66cb0ab1d9efe250b46e28ecb45eb33b3609f1efda37547409a113a2b84c3f94b6a0e738acc391e2dfa718676aa55adead05fcb12d2e32aee379e190511a3252','Site','Administrator','admin@admin.com','english','1','1','0',NULL,'2013-01-01 00:00:00','2015-12-22 19:27:23'),(2,'johndoe','4e8ece39c9905fe6989022a7747d2c67d90582cdf483d762905f026b3f2328dbc019acf59f77a57472228933c33429de859210a3c6b2976234501462994cf73c','a876126be616f492fa9ff8fb554eadffb8e43ed9faef8e1070c2508d76c57b1613899ceb97972f7959c4c05617ce36e25ba63787a8bd3f183680863c687a7c12','John','Doe','john@doe.com','english','0','1','0',NULL,'2013-01-01 00:00:00','2015-12-18 20:39:48'),(3,'khakjhad','413987a4f8c43b3ccf2cc19d2169b9b9276305d03d7553b865be0a1ce5fa1f8cd93348e9a3033ad5d633f8721fa86311b4b1e28197a6746788e4be968efe1991','b90aac1b1a4aa6c23c5268d8759f85649fd39c8cefadc2691090f6436281bfe6132cb865a7f1edc40255238635361359d4b8c24f6a4ef076b09fb35c0b50253e','benen','kjsdkjsdjk','ben@ballisticmedia.net',NULL,'0','0','0','0226e64d1f407d175b97e8c348e2e2f8bac52d66','2016-04-26 11:58:35','2016-04-26 11:58:35'),(4,'benbenben','02f84cbecf2e42389eb57e2344d9bcc3fde41726242e24bbfeb07535f0719be02614976c58b8ea7ff961180981f1f0c342ca8953870ce9a38118adceef6b7940','94dd8466ac9a808b46a4cebc8502dc6280c0bbbf0385668b8174b988f0104d94c2523238e6727d40affa449febee0bce8629eeefe9c48ff9ee69d066ee2a5793','Ben','Dry','captainbenno73@gmail.com','english','0','1','0','197c3f9b6ea76fbd1ee1aabce620dad499fde01c','2016-04-26 12:31:27','2016-04-26 12:32:49'),(5,'benben','4b7e0c05ad938e0f8fd699bfdd35ee1681b759fc4f7b21ed39c51ea8be5210f8720c7fbee4d6951950089bf2a20d4089515e0e15209e7fc41cd2f6ba50df557e','3c2982e0292bb993495443e613c0731ab84c3ad54e194bba1ab509f0d470a08920a4fc3a47235ca90895e59a85fe43298452adda2ee5720f87a22893ecb45eaa','Ben','Dry','ben@fred.com',NULL,'0','1','0','caa570756c5d93f21e12d9554e007b4d0b0ffce2','2016-05-02 13:08:12','2016-05-02 13:08:12'),(6,'asdadadasdasd','65821520852979947f2cffa1c37e1584a18a26d8323c2d6c2b3ddcaab5a68567d4d62f90c5381aee312682d922e47a70dc5f57d778c5e1e3f7a18f0e1b081030','a465880969892c9239295b2992e170d726ee4eee0ae7a60399bc40176534fcb668cc654c4940a6688318cd44fdcc76d8f2d739ddd18dfdd3513535ee39c92eeb','asdad','adasdasd','asdadad',NULL,'0','0','0','d041cec4ea5e0c1ba58c0d1a6198c8841858ee71','2016-05-04 13:41:26','2016-05-04 13:41:26'),(8,'asdadad','9c44c5f4a74270b9dc7ec155d10eee9180f3b0f548d4c8bf83768b8b04116a871ce4e1140fc78fa023a9ca0da2d7bbdc4849fb0f25d60a76aecf076fcbe93217','bb47fa8658e309c6d45328278732e1d55ad34783d8c166a806413cdef356d3afef591e6d7c76b1e6347ad40279aa415d09fda4be66837d045f2beec9672fd5bb','asdad','adasdasd','asdadad','ENG','0','0','0','aa15ed7c5de7b833f1fe9c2351d0356124155671','2016-05-04 13:57:54','2016-05-04 13:57:54'),(10,'ben@benasdad.com','6ba9e892343b3808745253694434102a350c9f5aa648700b16381d4d7d32fd6e760dd15035cccf6ca73c51feb52a2b3bae7754e5e7e1b68b47d302e00851a33f','52e74e5eda1cb06d96524f301adabc4ba0ff7e54f206562cd508762503b5e10937d933208054945f07bb113010d9550117f8c3ca5fa455fd8473d36d944794cf','asdads','asdasd','ben@benasdad.com','ENG','0','0','0','7992d6b223e8557cfe4e5739cef8a0ef00c41065','2016-05-04 14:09:16','2016-05-04 14:09:16'),(11,'ben.dry@aligent.com.au','05434d2dde5d252e221ea039d8cbbbcaeeaf3302f4529a09245ad49e8ae427f606c3adb92205f8e9801078c522399417db534b36c83a744dd6812ecee33126f8','b0e008bd7f0594def3251600e405df7ba9d5885912b58eedc3808f57c1248ff8891201d06276e7ae7f8b2e5c5911011a9fba5622784b31026d624e58309195bc','Benjamin','Dry','ben.dry@aligent.com.au','ENG','0','0','0','afa69e8120cce6f9d4dcd10f788c92882f0eef16','2016-05-13 07:44:27','2016-05-13 07:44:27'),(12,'mark@ballisticmedia.net','','','Mark','Snoswell','mark@ballisticmedia.net','ENG','0','1','0','','2016-05-13 07:44:27','2016-05-13 07:44:27');
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

-- Dump completed on 2016-07-21 19:58:08
