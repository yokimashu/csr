/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.34-MariaDB : Database - csr
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`csr` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `csr`;

/*Table structure for table `assessment` */

DROP TABLE IF EXISTS `assessment`;

CREATE TABLE `assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objid` int(11) NOT NULL,
  `stud_id` varchar(100) NOT NULL,
  `tuition` int(11) NOT NULL,
  `misc` int(11) NOT NULL,
  `others` int(11) NOT NULL,
  `comp` int(11) NOT NULL,
  `speech` int(11) NOT NULL,
  `nstp` int(11) NOT NULL,
  `others2` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `assessment` */

insert  into `assessment`(`id`,`objid`,`stud_id`,`tuition`,`misc`,`others`,`comp`,`speech`,`nstp`,`others2`,`total`,`course`,`year`,`semester`) values (18,2,'2',12300,100,100,100,100,100,100,12300,'BSIT','I','1st'),(19,2,'2',11700,100,100,100,100,100,100,12300,'BSIT','I','1st');

/*Table structure for table `grades` */

DROP TABLE IF EXISTS `grades`;

CREATE TABLE `grades` (
  `objid` int(10) DEFAULT NULL,
  `students_id` int(11) DEFAULT NULL,
  `subjects_id` varchar(10) DEFAULT NULL,
  `descriptive_title` varchar(30) DEFAULT NULL,
  `prelim` int(3) DEFAULT NULL,
  `midterm` int(3) DEFAULT NULL,
  `finals` int(3) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `grades` */

insert  into `grades`(`objid`,`students_id`,`subjects_id`,`descriptive_title`,`prelim`,`midterm`,`finals`,`remarks`) values (1,12345,'mis',NULL,90,80,95,'85');

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objid` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `orno` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `det` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `quarter` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `payments` */

insert  into `payments`(`id`,`objid`,`stud_id`,`course`,`year`,`orno`,`amount`,`det`,`semester`,`quarter`) values (5,2,2,'BSIT','I',2311,3500,'2021-04-22','1st','Prelim');

/*Table structure for table `student_image` */

DROP TABLE IF EXISTS `student_image`;

CREATE TABLE `student_image` (
  `student_id` int(11) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `student_image` */

insert  into `student_image`(`student_id`,`photo`,`status`) values (1013,'61e01d45b977b.jpg','ACTIVE'),(7625,'61ff392d1848a.jpg','ACTIVE');

/*Table structure for table `tbl_courses` */

DROP TABLE IF EXISTS `tbl_courses`;

CREATE TABLE `tbl_courses` (
  `courses_id` varchar(100) DEFAULT NULL,
  `courses` varchar(100) DEFAULT NULL,
  `number_of_enrollees` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_courses` */

insert  into `tbl_courses`(`courses_id`,`courses`,`number_of_enrollees`) values ('BSIT','Bachelor of Science in Information Technology',130),('BSTM','Bachelor of Science in Tourism Management',100),('BSBA (MM)','Bachelor of Science in Bussiness Administration (Marketing Management)',55),('BSBA (FM)','Bachelor of Science in Bussiness Administration (Financial Management)',60),('Midwifery','Midwifery',30),('BSC','Bachelor of Science in Caregiving',50),('BEED','Bachelor of Science in Elementary Education',145),('BSED (Math)','Bachelor of Science in Secondary Education (Major in Mathematics)',15),('BSED (Fil.)','Bachelor of Science in Secondary Education (Major in Filipino)',20),('BSED (Eng.)','Bachelor of Science in Secondary Education (Major in English)',10),('Cooking I','Cooking I',NULL);

/*Table structure for table `tbl_enrollment` */

DROP TABLE IF EXISTS `tbl_enrollment`;

CREATE TABLE `tbl_enrollment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objid` int(11) NOT NULL,
  `students_id` varchar(20) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `year_level` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `major` varchar(10) NOT NULL,
  `year` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_enrollment` */

insert  into `tbl_enrollment`(`id`,`objid`,`students_id`,`course_code`,`year_level`,`semester`,`major`,`year`,`status`) values (210,1317,'7625','BSIT','I','1st','N/A',2022,'PENDING');

/*Table structure for table `tbl_enrollment_item` */

DROP TABLE IF EXISTS `tbl_enrollment_item`;

CREATE TABLE `tbl_enrollment_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objid` varchar(100) NOT NULL,
  `students_id` varchar(20) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `descriptive_title` varchar(100) NOT NULL,
  `units` varchar(5) NOT NULL,
  `days` varchar(200) NOT NULL,
  `time` varchar(20) NOT NULL,
  `room` varchar(20) NOT NULL,
  `year` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_enrollment_item` */

insert  into `tbl_enrollment_item`(`id`,`objid`,`students_id`,`subject_code`,`descriptive_title`,`units`,`days`,`time`,`room`,`year`,`semester`) values (7,'1317','7625','ITC111','Introduction to Computing','3','Monday , Tuesday , Wednesday , Thursday , Friday','10:00:00-11:00:00','CompLabu','I','1st'),(8,'1317','7625','Filipino1','Komunikasyon sa Akademikong Filipino','3','Monday , Tuesday , Wednesday , Thursday , Friday ,','11:00:00-12:00:00','CompLabu','I','1st'),(9,'1317','7625','ITC112','Computer Programming 1','3','Monday , Wednesday , Thursday','08:00:00-09:00:00','CompLabuzz','I','1st');

/*Table structure for table `tbl_faculty` */

DROP TABLE IF EXISTS `tbl_faculty`;

CREATE TABLE `tbl_faculty` (
  `teachers_id` int(11) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `work_status` varchar(10) NOT NULL,
  `faculty_dept` varchar(30) NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  PRIMARY KEY (`teachers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_faculty` */

insert  into `tbl_faculty`(`teachers_id`,`surname`,`first_name`,`middle_name`,`work_status`,`faculty_dept`,`contact_number`,`email_address`) values (1,'culzmo','jane','geulinm','full-time','nonel',2147483647,'khristelculi@gmail.com'),(12,'culi','khristel jane','sates','Full-time','BSBA (MM)',9953697626,'khristelculi@gmail.com'),(800,'joy','madam','gomz','Part-time','BSC',9236783921,'yow@yahoo.com'),(1213,'culi','khristel ','sates','ssdsd','bsit',2147483647,'khristelculi@gmail.com'),(9301,'salz','el','la','Full-time','BSED (Fil.)',2147483647,'el2@gmail.com'),(9769,'calunsag','madam','irish','Part-time','BSIT',9872347532,'khristelculi@gmail.com'),(100123,'feb','glory','marites','full-time','bsbaa',2147483647,'glofymarites@gmail.com'),(123456,'bridgertonz','suzy','bae','part-timer','canteen',2147483647,'hellotesting@gmail.com');

/*Table structure for table `tbl_grades` */

DROP TABLE IF EXISTS `tbl_grades`;

CREATE TABLE `tbl_grades` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `objid` varchar(20) DEFAULT NULL,
  `students_id` varchar(20) DEFAULT NULL,
  `subjects_id` varchar(10) DEFAULT NULL,
  `descriptive_title` varchar(30) DEFAULT NULL,
  `prelim` int(11) DEFAULT '0',
  `midterm` int(11) DEFAULT '0',
  `finals` int(11) DEFAULT '0',
  `remarks` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idno`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_grades` */

insert  into `tbl_grades`(`idno`,`objid`,`students_id`,`subjects_id`,`descriptive_title`,`prelim`,`midterm`,`finals`,`remarks`) values (9,'1317','7625','ITC111','Introduction to Computing',85,90,90,'\n                                  PASSED         '),(10,'1317','7625','Filipino1','Komunikasyon sa Akademikong Fi',75,83,80,'\n                                  PASSED         '),(11,'1317','7625','ITC112','Computer Programming 1',90,90,90,'FAILED');

/*Table structure for table `tbl_message` */

DROP TABLE IF EXISTS `tbl_message`;

CREATE TABLE `tbl_message` (
  `notif_objid` int(11) NOT NULL,
  `message_objid` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`message_objid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_message` */

insert  into `tbl_message`(`notif_objid`,`message_objid`,`message`,`date`,`time`,`sender`) values (40,1,'hello','2021-05-20','20:09:17',NULL),(40,2,'test','2021-06-01','13:42:07',NULL);

/*Table structure for table `tbl_rooms` */

DROP TABLE IF EXISTS `tbl_rooms`;

CREATE TABLE `tbl_rooms` (
  `room_no` int(11) NOT NULL AUTO_INCREMENT,
  `room_description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`room_no`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_rooms` */

insert  into `tbl_rooms`(`room_no`,`room_description`) values (2,'CompLabuzz'),(3,'fdfab'),(5,'science room miss boulevarder'),(7,'gogo'),(20,'CompLabu'),(100,'testing'),(150,'testing after back up'),(200,'CompLabuy');

/*Table structure for table `tbl_schedules` */

DROP TABLE IF EXISTS `tbl_schedules`;

CREATE TABLE `tbl_schedules` (
  `objid` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(20) NOT NULL,
  `courses_id` varchar(50) NOT NULL,
  `days` longtext NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `room_code` varchar(20) NOT NULL,
  `teacher_code` varchar(20) NOT NULL,
  PRIMARY KEY (`objid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_schedules` */

insert  into `tbl_schedules`(`objid`,`subject_code`,`courses_id`,`days`,`start_time`,`end_time`,`room_code`,`teacher_code`) values (2,'BIO SCI 1','','Monday','00:00:01','00:00:01','3','1213'),(3,'ICT','','Monday , Wednesday , Friday','00:00:01','00:00:01','2','100123'),(5,'ITC112','','Monday , Wednesday , Thursday','08:00:00','09:00:00','2','1'),(6,'PE2','','Tuesday , Thursday','09:00:00','10:00:00','20','1213'),(7,'ITC111','','Monday , Tuesday , Wednesday , Thursday , Friday','10:00:00','11:00:00','20','1'),(8,'Filipino1','','Monday , Tuesday , Wednesday , Thursday , Friday , Saturday','11:00:00','12:00:00','20','1213'),(9,'BIO SCI 1','','Monday , Wednesday , Friday','07:00:00','08:00:00','100','1213'),(10,'BME2','','Monday','19:54:00','20:56:00','5','12'),(11,'CP 100 ','Midwiferey','Monday , Friday','08:00:00','09:00:00','7','800'),(12,'BME1','Array','Monday , Wednesday , Friday','09:00:00','10:00:00','20','800'),(13,'CP 102 B','Midwiferey','Saturday','08:15:00','20:15:00','100','800'),(14,'BME2','baby','Monday','09:00:00','10:00:00','7','800'),(15,'ITM321','BSED (Eng.)','Monday , Tuesday , Wednesday , Thursday , Friday','08:30:00','09:30:00','20','12');

/*Table structure for table `tbl_semester` */

DROP TABLE IF EXISTS `tbl_semester`;

CREATE TABLE `tbl_semester` (
  `code` varchar(6) NOT NULL,
  `semester` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_semester` */

insert  into `tbl_semester`(`code`,`semester`) values ('1st','First Semester'),('2nd','Second Semester'),('Summer','Summer');

/*Table structure for table `tbl_status` */

DROP TABLE IF EXISTS `tbl_status`;

CREATE TABLE `tbl_status` (
  `teacher_id` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_status` */

insert  into `tbl_status`(`teacher_id`,`status`,`department`) values (1,'Full -Time','BSIT'),(3,'Full-time','BSBA'),(5,'Part-time','BSED (Fil.)'),(6,'Part-time','BSED (Fil.)'),(7,'Full-time','ask'),(8,'Full-time','BSIT'),(80191,'Full-time','BSBA (FM)');

/*Table structure for table `tbl_student_address` */

DROP TABLE IF EXISTS `tbl_student_address`;

CREATE TABLE `tbl_student_address` (
  `student_id` int(11) NOT NULL,
  `street` varchar(200) NOT NULL,
  `vil_subd` varchar(200) NOT NULL,
  `barangay` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `region` varchar(200) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_student_address` */

insert  into `tbl_student_address`(`student_id`,`street`,`vil_subd`,`barangay`,`city`,`province`,`region`,`zipcode`,`status`) values (1013,'Big Tibuco, Molave','Big Tibuco,Molave, 1 Brgy 2','Barangay II','San Carlos City','Negros Occidental','asda','6127','ACTIVE'),(7625,'Big Tibuco, Molave','Big Tibuco,Molave, 1 Brgy 1','Rizal','San Carlos City','Negros Occidental','VI','6127','ACTIVE');

/*Table structure for table `tbl_student_guardian` */

DROP TABLE IF EXISTS `tbl_student_guardian`;

CREATE TABLE `tbl_student_guardian` (
  `student_id` int(11) NOT NULL,
  `parent_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` int(11) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_student_guardian` */

insert  into `tbl_student_guardian`(`student_id`,`parent_name`,`address`,`contact`,`occupation`,`status`) values (1013,'Arnold Mondero 2','23',123,'123','ACTIVE'),(7625,'Arnold Mondero','23',123,'123','ACTIVE');

/*Table structure for table `tbl_students` */

DROP TABLE IF EXISTS `tbl_students`;

CREATE TABLE `tbl_students` (
  `students_id` int(11) NOT NULL,
  `student_status` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(100) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `civil_status` varchar(20) DEFAULT NULL,
  `contact_number` bigint(20) DEFAULT NULL,
  `facebook_account` varchar(30) DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `baptized` tinyint(1) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `elementary_school` varchar(100) DEFAULT NULL,
  `high_school` varchar(100) DEFAULT NULL,
  `last_attended_college` varchar(100) DEFAULT NULL,
  `status` varchar(30) DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_students` */

insert  into `tbl_students`(`students_id`,`student_status`,`first_name`,`middle_name`,`last_name`,`date_of_birth`,`place_of_birth`,`nationality`,`gender`,`civil_status`,`contact_number`,`facebook_account`,`religion`,`baptized`,`confirmed`,`elementary_school`,`high_school`,`last_attended_college`,`status`) values (102094,'','khristel','sates','culi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ACTIVE'),(33097,'','ella','lara','salazar',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ACTIVE'),(5988,'','Irish','Romano','Calunsag','1999-09-19','manila','Filipino','0','0',2147483647,'Irish Calunsag','Roman Catholic',0,0,'rmes','tanon college','csr','ACTIVE'),(7625,'New Student','Jonard','amistad','Mondero','1993-06-14','molave','Filipino','Male','',2147483647,'jonard@gmail.com','Catholic',0,0,'1231','123','123123','Single'),(1013,'Old Student','karla 2','malsi','Mondero','1993-06-14','Ylagan Street','Filipino','Male','Single',2147483647,'jonard@gmail.com','Catholic',0,0,'1231','123','123123','ACTIVE');

/*Table structure for table `tbl_subjects` */

DROP TABLE IF EXISTS `tbl_subjects`;

CREATE TABLE `tbl_subjects` (
  `subjects_id` varchar(20) NOT NULL,
  `subjects_description` varchar(150) NOT NULL,
  `units` varchar(20) NOT NULL,
  `courses_id` varchar(10) NOT NULL,
  `year_level` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `pre_requisites` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`subjects_description`,`units`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_subjects` */

insert  into `tbl_subjects`(`subjects_id`,`subjects_description`,`units`,`courses_id`,`year_level`,`semester`,`pre_requisites`) values ('ACCTN','Accounting','3','BSBA','II','1st','NONE'),('ITC311','Applications Development Systems & Emerging Technologies','3','BSIT','III','1st','ITM221'),('TPC9','Applied Business Tools and Technologies in Tourism','3','BSTM','IV','1st','NONE'),('REED 1','ARSE w/ Congregational Study','1','BSTM','III','1st','NONE'),('GE6','Art Appreciation','3','BSIT','I','2nd','NONE'),('ITM411','Capstone1','3','BSIT','IV','1st','ITM322/ITE323'),('ITM421','Capstone2','3','BSIT','IV','2nd','ITM411'),('CP 102 A','Clinical Practicum M102(306 HRS)','6','MIDWIFERY','II','2nd','NONE'),('CP 102 B','Clinical Practicum M102(357 HRS)','7','MIDWIFERY','II','2nd','NONE'),('CP PHC 2','Clinical Practicum PHC2(102 HRS)','2','MIDWIFERY','II','2nd','NONE'),('CP 100 ','Clinical Practicum(153 HRS)','3','MIDWIFERY','I','1st','NONE'),('CP 101-B','Clinical Practicum(51 HRS)','3','MIDWIFERY','I','Summer','NONE'),('ITC112','Computer Programming 1','3','BSIT','I','1st','none'),('ITC121','Computer Programming 2','3','BSIT','I','2nd','ITC112'),('GE3','Contemporary World','3','BSIT','I','2nd','NONE'),('TME4','Cruise Tourism','3','BSTM','IV','1st','NONE'),('ITC221','Data Structures and Algorithms','3','BSIT','II','2nd','ITC111'),('ITM223','Discrete Mathematics','3','BSIT','II','2nd','ITC112'),('TME21','Ecotourism Management','3','BSTM','II','2nd','NONE'),('THC10','Entrepreneurship in Tourism and Hospitality','3','BSTM','III','2nd','NONE'),('GE8','Ethics','3','BSIT','I','2nd','NONE'),('REED 2','Evangelization','1','BSTM','III','2nd','NONE'),('TPC6','Foreign Language','3','BSTM','III','1st','NONE'),('TPC7','Foreign Language 2','3','BSTM','III','2nd','NONE'),('MID 100','Foundation of Midwifery Practice','3','MIDWIFERY','I','1st','NONE'),('PE2','Fund. of Rhythmic Activities','2','BSIT','I','2nd','NONE'),('ACCT','Fundamentals','1','BSIT','I','1st','Array'),('ITM311','Fundamentals of Database Systems','3','BSIT','III','1st','ITM221'),('GE6','Gender and Society','3','BSTM','II','1st','NONE'),('GEN.Z00','General Zoology','3','MIDWIFERY','II','1st','NONE'),('TPC1','Global Culture and Tourism Geography','3','BSTM','III','1st','NONE'),('H.ECON','Health Economics w/ TAR','3','MIDWIFERY','II','2nd','NONE'),('TME12','Heritage Tourism','3','BSTM','II','1st','NONE'),('BIO SCI 1','Human Anatomy and Physiology','5','MIDWIFERY','I','1st','NONE'),('PE3','Individual/Dual Games','2','BSIT','II','1st','NONE'),('ITM321','Information Assurance and Security 1','3','BSIT','III','2nd','ITC211'),('ITM412','Information Assurance and Security 2','3','BSIT','IV','1st','ITM321'),('ITC211','Information Management','3','BSIT','II','2nd','ITM121'),('ICT','Information Technology','3','MIDWIFERY','II','2nd','NONE'),('ITM221','Integrative Programming and Technologies','3','BSIT','II','2nd','NONE'),('ITC111','Introduction to Computing','3','BSIT','I','1st','none'),('ITM121','Introduction to Human-Computer Interaction','3','BSIT','I','2nd','ITC111'),('TPC10','Introduction to Meetings, Incentives, Conferences & Events Management','3','BSTM','IV','1st','NONE'),('ITE3S1','ITElective1','3','BSIT','I','Summer','NONE'),('ITE411','ITElective2(Cert. Review)','3','BSIT','IV','1st','NONE'),('ITE412','ITElective3','3','BSIT','IV','1st','NONE'),('ITE424','ITElective4','3','BSIT','IV','2nd','NONE'),('Filipino1','Komunikasyon sa Akademikong Filipino','3','BSIT','I','1st','NONE'),('THC8','Legal Aspects in Tourism and Hospitality','3','BSTM','III','1st','NONE'),('RIZAL','Life, Works and Writing of Rizal','3','MIDWIFERY','I','Summer','NONE'),('GE10','Living in the Era','3','BSIT','II','1st','NONE'),('THC5','Macro Perspective of Tourism and Hospitality','3','BSTM','II','2nd','NONE'),('REED 3','Marriage and Family','1','BSTM','IV','1st','NONE'),('GE4','Math in the Modern World','3','BSIT','I','1st','NONE'),('THC1','Micro Perspective of Tourism and Hospitality','3','BSTM','II','1st','NONE'),('BIO SCI 2','Microbiology and Parasitology','4','MIDWIFERY','II','1st','NONE'),('THC9','Multicultural Diversity in Workplace for the Tourism Professionals','3','BSTM','III','2nd','NONE'),('ITE221','Multimedia','3','BSIT','II','1st','ITM121'),('NSTP1','Nat\'l Service Training Program 1','3','BSIT','I','1st','NONE'),('NSTP2','Nat\'l Service Training Program 2','3','BSIT','I','2nd','NSTP1'),('ITM222','Networking 1','3','BSIT','II','2nd','ITC211'),('ITM313 ','Networking 2','3','BSIT','III','1st','ITM222'),('MID 101','Normal OB','3','MIDWIFERY','I','2nd','NONE'),('N & D','Nutrition & Dietetics','3','MIDWIFERY','I','2nd','NONE'),('ITE212','Object-Oriented Programming','3','BSIT','II','1st','ITC121'),('BME1','Operation MO Operation Ko','3','BSTM','III','2nd','NONE'),('GE4','Pagbasa at Pagsulat sa Iba\'t ibang Disiplina','3','MIDWIFERY','I','2nd','NONE'),('Filipino2','Pagbasa at Pagsulat tungo sa Pananaliksik','3','BSIT','I','2nd','Filipino1'),('MID 102','Pathologic OB, Care of Infants and Feeding','3','MIDWIFERY','II','1st','NONE'),('THC4','Philippine Culture and Tourism Geography','3','BSTM','I','1st','NONE'),('THC11','Philippine Popular Culture','3','BSTM','I','1st','NONE'),('PHILO 110','Philosophy of Human Person','3','MIDWIFERY','I','2nd','NONE'),('PE1','Physical Fitness','2','BSIT','I','1st','NONE'),('ITE211','Platform Technologies','3','BSIT','II','1st','ITM121'),('POLGOV','Political Government w/ Phil. Constitution','3','MIDWIFERY','I','Summer','NONE'),('ITM3S1','Practicum','6','BSIT','III','Summer','none'),('PRACTICUM','Practicum Tourism','6','BSTM','IV','2nd','NONE'),('PHC','Primary Health Care 2','3','MIDWIFERY','II','2nd','NONE'),('PHC 1','Primary Health Care 2','4','MIDWIFERY','II','1st','NONE'),('HEALTH EDUC','Principles, Methods and Strategies of Teaching in Health','3','MIDWIFERY','I','2nd','NONE'),('MID 103','Prof. Growth and Development and Ethics ','3','MIDWIFERY','II','2nd','NONE'),('THC6','Professional Development and Applied Ethics','3','BSTM','II','2nd','NONE'),('GE5','Purposive Communication','3','BSIT','I','1st','NONE'),('THC3','Quality Service Management in Tourism and Hospitality','3','BSTM','III','1st','NONE'),('ITM322','Quantative Methods','3','BSIT','III','2nd','NONE'),('GE11','Reading Visual Art','3','BSIT','II','1st','NONE'),('GE2','Readings in Philippine History','3','BSIT','I','1st','NONE'),('TPC8','Research in Tourism','3','BSTM','IV','1st','NONE'),('THC2','Risk Management as Applies to Safety, Securtiy and Sanitation','3','BSTM','I','2nd','NONE'),('GE9','Rizal\'s Life and Works','3','BSIT','III','2nd','NONE'),('GE13','Rizal\'s Life,Works and Writing','3','BSTM','III','1st','NONE'),('Theo2','Sacraments of the Church','3','BSIT','I','2nd','NONE'),('Theo4','Sacred Liturgy','3','BSIT','II','2nd','NONE'),('GE7','Science, Technology and Society','3','BSIT','I','2nd','NONE'),('ITM423','Social and Professional Issues','3','BSIT','IV','2nd','NONE'),('SSCI','Sociology and Anthropology','3','MIDWIFERY','II','2nd','NONE'),('BME2','Strategic Management & Total Quality Management','3','BSTM','IV','1st','NONE'),('TPC2','Sustainable Tourism','3','BSTM','III','1st','NONE'),('TME20','Sustainable Tourism Destination Marketing','3','BSTM','IV','1st','NONE'),('ITM422','System Administration and Maintenance','3','BSIT','IV','2nd','ITM321'),('ITM312','System Integration and Architecture','3','BSIT','III','1st','ITM221/ITM222'),('ITE323','Systems Analysis and Design','3','BSIT','III','2nd','ITM311'),('PE4','Team Sports','2','BSIT','II','2nd','NONE'),('ITE322','Technopreneurship','3','BSIT','III','2nd','ACCT'),('Theo3','The Commandments/Morality','3','BSIT','II','1st','NONE'),('GE7','The Contemporary World','3','BSTM','II','2nd','NONE'),('Theo1','The Creed/Salvation History','3','BSIT','I','1st','NONE'),('TPC3','Tour and Travel Management','3','BSTM','III','2nd','NONE'),('TME5','Tour Guiding','3','BSTM','II','2nd','NONE'),('THC7','Tourism and Hospitality Marketing','3','BSTM','II','1st','NONE'),('TPC5','Tourism Policy Planning and Development','3','BSTM','III','2nd','NONE'),('TPC 7','Transportation Management','3','BSTM','I','1st','NONE'),('GE1','Understanding Self','3','BSIT','I','1st','NONE'),('ITE321','Web Systems and Technologies','3','BSIT','III','2nd','ITM313');

/*Table structure for table `tbl_units` */

DROP TABLE IF EXISTS `tbl_units`;

CREATE TABLE `tbl_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_units` */

insert  into `tbl_units`(`id`,`price`) values (1,450);

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `position` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `userpass` varchar(100) NOT NULL,
  `account_type` tinyint(1) NOT NULL,
  `department` tinyint(1) NOT NULL,
  `chatNo` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`user_id`,`first_name`,`middle_name`,`last_name`,`email`,`contact_no`,`position`,`username`,`userpass`,`account_type`,`department`,`chatNo`) values (3,'Felix Michael','Formaran','Oberes','f.m.oberes@gmail.com','09999918570','','yokimashu','$2y$10$6LQCa7LPVmT9EhDKXs/Tpe7zD82JWJcw9ZUW7TXI3Kl8WOW2wuYmK',1,0,2),(207,'khristel jane','s','culi','khristelculi@gmail.com','09953697626','','1','$2y$10$jUV8gsCl1uscXCyw7pxIsO9/.06Za92ABxp0VUhHJT.8s3HbErUyG',2,0,NULL),(210,'ella','mae','lara','ellarame@yahoo.com','09952348123',NULL,'ellarako143','1',1,0,NULL),(211,'joy','a','gomo','khristelculi@gmail.com','09953697626',NULL,'gomzd','1',1,0,NULL),(212,'Jenelle','Eyas','Morrissey','khristelculi@gmail.com','6039219647',NULL,'3','3',2,0,NULL),(213,'Jenelle','Eyas','Morrissey','khristelculi@gmail.com','6039219647',NULL,'3','3',2,0,NULL),(214,'khristel jane','sates','culi','khristelculi@gmail.com','91209953697',NULL,'0','0',0,0,NULL),(215,'khristel jane','sates','culi','khristelculi@gmail.com','91209953697',NULL,'0','0',0,0,NULL),(216,'khristel','jane','culi','khristelculi@gmail.com','23321',NULL,'9','9',1,0,NULL),(217,'irish','y','calunsag','aj@gmail.com','09328721923',NULL,'hehirish@gmail.com','1',1,1,NULL),(218,'april','may','june','khristelculi@gmail.com','6039219647',NULL,'registrar','1',1,0,NULL),(219,'hello','final','defend','goforit@yahoo.com','09321238921',NULL,'gogo','1',1,0,NULL),(220,'hello','final','defend','goforit@yahoo.com','09321238921',NULL,'gogo','1',1,0,NULL),(221,'hello','final','defend','goforit@yahoo.com','09321238921',NULL,'gogo','1',1,0,NULL),(222,'jager','jag','ger','jager@yahoo.com','09212136721',NULL,'jagger','1',1,0,NULL),(223,'fifi','fufu','fafa','khristelculi@gmail.com','91209953697',NULL,'fifufa','1',1,0,NULL),(224,'jasmine','a','curtis','jascurtiz@gmail.com','09123453212',NULL,'jassy','12',1,1,NULL);

/*Table structure for table `tbl_year` */

DROP TABLE IF EXISTS `tbl_year`;

CREATE TABLE `tbl_year` (
  `code` varchar(5) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `objid` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbl_year` */

insert  into `tbl_year`(`code`,`year_level`) values ('I','First Year'),('II','Second Year'),('III','Third Year'),('IV','Fourth Year');

/* Procedure structure for procedure `spInsertEnrollmentItem` */

/*!50003 DROP PROCEDURE IF EXISTS  `spInsertEnrollmentItem` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertEnrollmentItem`(
	objid VARCHAR(50),
	student_id VARCHAR(50),
	year VARCHAR(50),
        semester VARCHAR(50),
        subject VARCHAR(50),
        title VARCHAR(50),
	units VARCHAR(50),
        day VARCHAR(50),
        time VARCHAR(50),
	room VARCHAR(50)
          
    
    )
BEGIN
	INSERT INTO tbl_enrollment_item SET
	`objid` = objid,
	`students_id` = student_id,
	`year` = year,
	`semester` = semester,
	`subject_code` = subject,
	`descriptive_title` = title,
	`units` = units,
	`days` = day,
	`time` = time,	
	`room` = room;			
	
	
	insert into tbl_grades SET
	
	`objid` = objid,
	`students_id` = student_id,
	`subjects_id` = subject,
	`descriptive_title` = title;
	
	
    END */$$
DELIMITER ;

/* Procedure structure for procedure `spUpdateGrades` */

/*!50003 DROP PROCEDURE IF EXISTS  `spUpdateGrades` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateGrades`(
    
    objid varchar(50),
    student_id VARCHAR(50),
    subject_id VARCHAR(50),
    prelim VARCHAR(50),
    midterm VARCHAR(50),
    finals VARCHAR(50),
    remarks VARCHAR(50)
    
		
   
    )
BEGIN
   
   
	update tbl_grades 
	set
	`prelim` = prelim,
	`midterm` = midterm,
	`finals` = finals,
	`remarks` = remarks
	 WHERE
	 `descriptive_title` = subject_id and
	 `objid` = objid and
	 `students_id` = student_id;
	
    END */$$
DELIMITER ;

/* Procedure structure for procedure `spUpdateMidterm` */

/*!50003 DROP PROCEDURE IF EXISTS  `spUpdateMidterm` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateMidterm`(
    
     objid VARCHAR(50),
    student_id VARCHAR(50),
    subject_id VARCHAR(50),
    prelim_grade VARCHAR(50),
    midterm_grade VARCHAR(50)
   
    
    
    )
BEGIN
    
  SET  @existing_midterm = (SELECT midterm FROM tbl_grades WHERE `objid` = objid AND `students_id` = student_id AND `descriptive_title` = subject_id);
  
  
  
  IF(prelim_grade != 0 && midterm_grade != 0 && midterm_grade != @existing_midterm ) THEN
	SET @prelim_average = prelim_grade * .20;
	SET @midterm_average = midterm_grade * .80;
	SET @midterm_grade = @prelim_average + @midterm_average;
	UPDATE tbl_grades 
	SET
	`midterm` = @midterm_grade
	 WHERE
	 `descriptive_title` = subject_id AND
	 `objid` = objid AND
	 `students_id` = student_id;
	 
	 
	END IF;
  
    END */$$
DELIMITER ;

/* Procedure structure for procedure `spUpdateStudent` */

/*!50003 DROP PROCEDURE IF EXISTS  `spUpdateStudent` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateStudent`(
    id varchar(50),
    student_status VARCHAR(50),
    fname VARCHAR(50),
    mname VARCHAR(50),
    lname VARCHAR(50),
    bday VARCHAR(50),
    place_of_birth VARCHAR(100),
    nationality VARCHAR(50),
    gender VARCHAR(10),
    sstatus VARCHAR(50),
    cnumber int(20),
    fbaccount VARCHAR(100),
    religion VARCHAR(50),
    baptized VARCHAR(5),
    confirmed VARCHAR(5),
    elem_school VARCHAR(100),
    high_school VARCHAR(100),
    last_attended VARCHAR(100),
    street VARCHAR(100),
    vil_subd VARCHAR(100),
    brgy VARCHAR(100), 
    city VARCHAR(100),
    province VARCHAR(100),
    region VARCHAR(100),
    zipcode int(10),
    parent VARCHAR(100),
    address varchar(100),
    contact int(50),
    occupation varchar(100)
    
    
    )
BEGIN
	UPDATE tbl_students SET
	student_status = student_status,
	first_name = fname,
	middle_name = mname,
	last_name = lname,
	date_of_birth = bday,
	place_of_birth = place_of_birth,
	nationality = nationality,
	gender = gender,
	civil_status = sstatus,
	contact_number = cnumber,
	facebook_account = fbaccount,
	religion = religion,
	baptized = baptized,
	confirmed = confirmed,
	elementary_school = elem_school,
	high_school = high_school,
	last_attended_college = last_attended
	where students_id = id;
	
	
	UPDATE tbl_student_address SET
	street = street,
	vil_subd = vil_subd,
	barangay = brgy,
	city = city,
	province = province,
	region = region,
	zipcode = zipcode 
	WHERE student_id = id;
	
	update tbl_student_guardian SET
	parent_name = parent,
	address = address,
	contact = contact,
	occupation = occupation
	where student_id = id;
	
	
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
