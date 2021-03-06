# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Database: instagram
# Generation Time: 2016-05-16 19:41:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tblComment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblComment`;

CREATE TABLE `tblComment` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  PRIMARY KEY (`commentID`),
  KEY `comment_user` (`postID`),
  KEY `userID` (`userID`),
  CONSTRAINT `comment_user` FOREIGN KEY (`postID`) REFERENCES `tblPost` (`postID`),
  CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `tblUser` (`userID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table tblFollow
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblFollow`;

CREATE TABLE `tblFollow` (
  `followID` int(11) NOT NULL,
  `followedID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  KEY `followedID` (`followedID`),
  KEY `followUserID` (`userID`),
  CONSTRAINT `followedID` FOREIGN KEY (`followedID`) REFERENCES `tblUser` (`userID`) ON DELETE CASCADE,
  CONSTRAINT `followUserID` FOREIGN KEY (`userID`) REFERENCES `tblUser` (`userID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table tblLike
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblLike`;

CREATE TABLE `tblLike` (
  `likeID` int(11) NOT NULL AUTO_INCREMENT,
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`likeID`),
  KEY `postID` (`postID`),
  KEY `userID` (`userID`),
  CONSTRAINT `likeUserID` FOREIGN KEY (`userID`) REFERENCES `tblUser` (`userID`) ON DELETE CASCADE,
  CONSTRAINT `postID` FOREIGN KEY (`postID`) REFERENCES `tblPost` (`postID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table tblPost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblPost`;

CREATE TABLE `tblPost` (
  `postID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `uploadTime` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`postID`),
  KEY `userID` (`userID`),
  CONSTRAINT `postUserID` FOREIGN KEY (`userID`) REFERENCES `tblUser` (`userID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tblPost` WRITE;
/*!40000 ALTER TABLE `tblPost` DISABLE KEYS */;

INSERT INTO `tblPost` (`postID`, `userID`, `description`, `photo`, `uploadTime`)
VALUES
	(2,9,'drupallogo','201605152108579.png','20160515210857'),
	(3,9,'horloge','201605152111309.jpg','20160515211130'),
	(4,9,'foto mezelf','201605152153099.jpg','20160515215309'),
	(5,9,'hond','201605152227329.jpeg','20160515222732');

/*!40000 ALTER TABLE `tblPost` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tblUser
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tblUser`;

CREATE TABLE `tblUser` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `profilpic` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tblUser` WRITE;
/*!40000 ALTER TABLE `tblUser` DISABLE KEYS */;

INSERT INTO `tblUser` (`userID`, `email`, `firstname`, `lastname`, `username`, `password`, `profilpic`, `description`)
VALUES
	(1,'isabelle','isabelle','van eyken','isabelle.vaneyken@hotmail.com','$2y$12$7NspN.hl96vhY7wPR5CMYewK/wixIfJ3OC8XgsFgatt6VINXQToJe','',NULL),
	(2,'e','e','e','isabelle.vaneyken@hotmail.com','$2y$12$CvG/vKxAmugHtODqgaxBdu8p1rmfyXviLFYjN1cQCcLgYTrD3EAyG','',NULL),
	(3,'sdf','e','e','dsf@sqdfs.com','$2y$12$UmZmzrH79guqky1Z80oMjOpBOp/Qn8S2Q3uijLlhZQw3f0EPYnjk2','',NULL),
	(4,'sdf','e','e','dsf@sqdfs.com','$2y$12$nTMJp/rCJSOexymtyVytveaqTUzTbCdG1Zrqmrl.FBqILTlr2seAi','',NULL),
	(5,'qzefqsdf','qsdf','qsdf','qsdf@sqdf.com','$2y$12$yOmqkZrLaOHvc/l0ce7vpOtrHPR9W6WLp8S.PQQBMvau6gGASc4dG','',NULL),
	(6,'test','jo','ris','joris@qsdfsqdf.com','$2y$12$gYkUuPlUstSH9fx6MJ8JGuW8ICFVEOijER.hEtOt2GKGuwEuxPiWO','',NULL),
	(7,'isabelle','isabelle','isabelle','isabelle.vaneyken@hotmail.com','$2y$12$K2VneNE/Mn2tmO07qLZgNeZUFvpq0sizeVAQRL1Yh0pXbXHGaeDO2','',NULL),
	(8,'isabelle.vaneyken@hotmail.com','isabelle','isabelle','isabelle','$2y$12$BO246z7LUO1TOBeB2apyFuCkLeofjK7YmrpxbjcPtiVCNBfeiOlO2','',NULL),
	(9,'isabelle.vaneyken@hotmail.com','ab','a','a','$2y$12$qKA6JbOnpcJyM8JaWAM7eubJeyTXwiLeggT03olBkX80pTHkVvYdW','9_1460924029.jpg','Dit is een faketekst. Alles wat hier staat is slechts om een indruk te geven van het grafische effect van tekst op deze plek. Wat u hier leest is een voorbeeldtekst. Deze wordt later vervangen door de uiteindelijke tekst, die nu nog niet bekend is. De faketekst is dus een tekst die eigenlijk nergens over gaat. Het grappige is, dat mensen deze toch vaak lezen. Zelfs als men weet dat het om een faketekst gaat, lezen ze toch door.'),
	(10,'isabelle.vaneyken@hotmail.com','b','b','b','$2y$12$VfCYyCJA15VVdSyRES.W5ey/KCW7YAcaHRtUi7XumINNFNBoAEYK.','',NULL),
	(11,'c.c@c.com','c','c','c','$2y$12$S4RK8lDkIimhf/LUIYXvzO5nw/H2nrw8lama387CgTucBI5B4loUO','',NULL),
	(12,'r.r@r.com','r','r','r','$2y$12$C/AEJdJIBtbGOb0.Mls62.cJfNOcln0WZPfNzbDJ6XvEkVvFXwmK2','',NULL),
	(13,'o.o@o.com','o','o','o','$2y$12$Asm83Xx6./H5A8l45J8U7OoLvUWmS5F7oham7RLy/VRpY4CaJgJU6','',NULL),
	(14,'x.x@x.com','x','x','x','$2y$12$WnfTeyqH9RMy2vuzMCdCBu8QnL8fTJlZuFJo6DdEQ3.w6ESnwKdyK','',NULL);

/*!40000 ALTER TABLE `tblUser` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
