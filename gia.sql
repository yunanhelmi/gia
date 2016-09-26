# Host: localhost  (Version 5.5.5-10.1.16-MariaDB)
# Date: 2016-09-27 01:14:21
# Generator: MySQL-Front 5.4  (Build 1.4)

/*!40101 SET NAMES latin1 */;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "login"
#

