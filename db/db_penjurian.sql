/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.10-MariaDB-log : Database - db_esilat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_esilat` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_esilat`;

/*Table structure for table `arena` */

DROP TABLE IF EXISTS `arena`;

CREATE TABLE `arena` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arena` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `arena` */

insert  into `arena`(`id`,`arena`) values 
(1,'arena sabung 1');

/*Table structure for table `atlit` */

DROP TABLE IF EXISTS `atlit`;

CREATE TABLE `atlit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `kontingen` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `tim_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `atlit` */

insert  into `atlit`(`id`,`nama`,`kontingen`,`kelas`,`kategori`,`jk`,`tim_id`) values 
(1,'richi',' jawa tengah','16 kg','seni','laki-laki',1),
(2,'seftian',' jawa timur','16 kg','seni','laki-laki',2);

/*Table structure for table `hasil_vote` */

DROP TABLE IF EXISTS `hasil_vote`;

CREATE TABLE `hasil_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `vote` varchar(255) DEFAULT NULL,
  `waktu_vote` datetime DEFAULT NULL,
  `vote_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `hasil_vote` */

/*Table structure for table `nilai` */

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `nilai` */

insert  into `nilai`(`id`,`jenis`,`nilai`) values 
(1,'pukulan',1),
(2,'tendangan',2),
(3,'jatuhan',3),
(4,'peringatan',5),
(5,'teguran',1),
(6,'binaan',1);

/*Table structure for table `partai` */

DROP TABLE IF EXISTS `partai`;

CREATE TABLE `partai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partai` varchar(255) DEFAULT NULL,
  `tim_merah_id` int(11) DEFAULT NULL,
  `tim_biru_id` int(11) DEFAULT NULL,
  `pertandingan` varchar(255) DEFAULT NULL,
  `tgl_pelaksanaan` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `partai` */

insert  into `partai`(`id`,`partai`,`tim_merah_id`,`tim_biru_id`,`pertandingan`,`tgl_pelaksanaan`) values 
(1,'kejurda',1,2,'sabung','2023-07-17');

/*Table structure for table `penilaian` */

DROP TABLE IF EXISTS `penilaian`;

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ronde_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `atlit_id` int(11) DEFAULT NULL,
  `nilai_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;

/*Data for the table `penilaian` */

insert  into `penilaian`(`id`,`ronde_id`,`users_id`,`atlit_id`,`nilai_id`) values 
(46,1,3,1,1),
(47,1,3,1,2),
(48,1,3,1,2),
(49,1,3,1,2),
(52,1,3,2,1),
(53,1,3,2,1),
(54,1,3,2,2),
(55,1,3,2,2),
(56,1,3,2,2),
(57,1,3,2,2),
(59,1,3,1,1),
(72,1,2,1,6),
(73,1,2,1,6);

/*Table structure for table `ronde` */

DROP TABLE IF EXISTS `ronde`;

CREATE TABLE `ronde` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partai_id` int(11) DEFAULT NULL,
  `arena_id` int(11) DEFAULT NULL,
  `ronde` varchar(255) DEFAULT NULL,
  `status_ronde` varchar(255) DEFAULT NULL,
  `waktu_pertandingan` int(11) DEFAULT NULL,
  `sisa_waktu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ronde` */

insert  into `ronde`(`id`,`partai_id`,`arena_id`,`ronde`,`status_ronde`,`waktu_pertandingan`,`sisa_waktu`) values 
(1,1,1,'1','aktif',120,0),
(2,1,1,'2','nonaktif',120,0),
(3,1,1,'3','nonaktif',120,0);

/*Table structure for table `tim` */

DROP TABLE IF EXISTS `tim`;

CREATE TABLE `tim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tim` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tim` */

insert  into `tim`(`id`,`tim`) values 
(1,'merah'),
(2,'biru');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `password` text,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`nama`,`password`,`role`) values 
(1,'operator@esilat.com','OPERATOR','19a89cc3085844b8e9b80b4f4dae1b73','operator'),
(2,'dewanjuri@esilat.com','KETUA PERTANDINGAN','19a89cc3085844b8e9b80b4f4dae1b73','dewan_juri'),
(3,'juri1@esilat.com','JURI 1','19a89cc3085844b8e9b80b4f4dae1b73','juri_1'),
(4,'juri2@esilat.com','JURI 2','19a89cc3085844b8e9b80b4f4dae1b73','juri_2'),
(5,'juri3@esilat.com','JURI 3','19a89cc3085844b8e9b80b4f4dae1b73','juri_3'),
(6,'timer@esilat.com','TIMER','19a89cc3085844b8e9b80b4f4dae1b73','timer');

/*Table structure for table `vote` */

DROP TABLE IF EXISTS `vote`;

CREATE TABLE `vote` (
  `id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ronde_id` int(11) DEFAULT NULL,
  `nilai_id` int(11) DEFAULT NULL,
  `waktu_vote` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `vote` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
