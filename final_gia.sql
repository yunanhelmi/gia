# Host: localhost  (Version 5.6.17)
# Date: 2016-09-27 23:58:29
# Generator: MySQL-Front 5.4  (Build 1.4)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "auth_rule"
#

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "auth_rule"
#


#
# Structure for table "auth_item"
#

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "auth_item"
#


#
# Structure for table "auth_item_child"
#

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "auth_item_child"
#


#
# Structure for table "auth_assignment"
#

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "auth_assignment"
#


#
# Structure for table "client"
#

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `bisnis` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "client"
#

INSERT INTO `client` VALUES (1,'PT AXA Mandiri','Asuransi','Jalan Jalan Jalan','093838383948','2016-09-07 23:24:50','2016-09-07 23:24:50'),(2,'PT ABC Indonesia','Kecap','Jalan Jalan Jalan','093838383948','2016-09-07 23:25:25','2016-09-07 23:25:25'),(3,'PT Sembarang Wes','Asuransi','Jalan Jalan Jalan','093838383948','2016-09-07 23:26:14','2016-09-07 23:26:14');

#
# Structure for table "instruksi_kerja"
#

DROP TABLE IF EXISTS `instruksi_kerja`;
CREATE TABLE `instruksi_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `case_number` varchar(255) DEFAULT NULL,
  `type_of_instruction` varchar(255) DEFAULT NULL,
  `date_of_instruction` date DEFAULT NULL,
  `assurers` varchar(255) DEFAULT NULL,
  `assured` varchar(255) DEFAULT NULL,
  `broker` varchar(255) DEFAULT NULL,
  `conveyence` varchar(255) DEFAULT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `date_of_loss` date DEFAULT NULL,
  `detail_of_loss` varchar(255) DEFAULT NULL,
  `amount_of_claim` varchar(255) DEFAULT NULL,
  `sum_insured` varchar(255) DEFAULT NULL,
  `fee_code` varchar(255) DEFAULT NULL,
  `not_relevant` enum('0','1') DEFAULT NULL,
  `protected` enum('0','1') DEFAULT NULL,
  `time_bar_due` date DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `date_entered` datetime DEFAULT NULL,
  `adjuster` varchar(255) DEFAULT NULL,
  `actual_fee` varchar(255) DEFAULT NULL,
  `status` enum('outstanding',' issued',' incoming') DEFAULT NULL,
  `date_send_of_pa` date DEFAULT NULL,
  `date_send_of_dfr` date DEFAULT NULL,
  `date_send_of_doc_request` date DEFAULT NULL,
  `date_of_issued` date DEFAULT NULL,
  `date_of_last_correspondent` date DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`),
  CONSTRAINT `instruksi_kerja_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "instruksi_kerja"
#

INSERT INTO `instruksi_kerja` VALUES (1,2,'1','-','2016-09-30',NULL,'PT Tri Dominic','-','KM. \"TANTO ABADI Voy. 146\"','750 Kg Chicken','2016-08-18','Damage','TBA','TBA','3500000','1','',NULL,'2 months from date of entry and time bar can then be reviewed again.',NULL,'Fika Aulia','','',NULL,NULL,NULL,NULL,NULL,'','2016-09-07 23:35:19','2016-09-07 23:35:19'),(2,2,'1','-','2016-09-30',NULL,'PT Tri Dominic','-','KM. \"TANTO ABADI Voy. 146\"','750 Kg Chicken','2016-08-18','Damage','TBA','TBA','3500000','1','',NULL,'2 months from date of entry and time bar can then be reviewed again.',NULL,'Fika Aulia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-09-07 23:51:09','2016-09-07 23:51:09'),(3,2,'1','-','2016-09-30',NULL,'PT Tri Dominic','-','KM. \"TANTO ABADI Voy. 146\"','750 Kg Chicken','2016-08-18','Damage','TBA','TBA','3500000','1','',NULL,'2 months from date of entry and time bar can then be reviewed again.',NULL,'Fika Aulia','','',NULL,NULL,NULL,NULL,NULL,'','2016-09-08 00:40:44','2016-09-08 00:40:44'),(4,2,'32321','0','2016-10-03',NULL,'12313','31231','3123','12313','2016-08-31','sdfsffs','sfsdfs','sdfsdfs','23123','0','0','2016-09-27','sfdfsdfs','2016-08-10 07:35:43','wrerwerw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-09-20 11:22:40','2016-09-20 11:22:40'),(5,3,'231213','Hull Survey','2016-09-27',NULL,'qweq','wqeqe','eqwewwq','qweqe','2016-08-31','adsda','asdad','asdda','231313','1','1','2016-09-23','dfafaf','2016-09-07 06:10:32','asdfsadf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-09-20 11:25:41','2016-09-20 11:25:41');

#
# Structure for table "login"
#

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `authKey` varchar(50) DEFAULT NULL,
  `accessToken` varchar(50) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "login"
#

INSERT INTO `login` VALUES (1,'admin','admin',NULL,NULL,'admin'),(2,'aji','admin993',NULL,NULL,'admin');

#
# Structure for table "migration"
#

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "migration"
#

INSERT INTO `migration` VALUES ('m000000_000000_base',1474949553),('m140506_102106_rbac_init',1474949557);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (1,'mursit','','',NULL,'',10,NULL);
