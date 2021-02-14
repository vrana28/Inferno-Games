
CREATE DATABASE `game` /;

USE `game`;



DROP TABLE IF EXISTS `igrice`;

CREATE TABLE `igrice` (
  `id_igrice` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `ocena` float(11) NOT NULL,
  `datum_nastanka` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_vrste` int(11) NOT NULL,
  PRIMARY KEY (`id_igrice`),
  KEY `id_vrste` (`id_vrste`),
  CONSTRAINT `igrice_ibfk_1` FOREIGN KEY (`id_vrste`) REFERENCES `vrste_igrica` (`id_vrste`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



insert  into `igrice`(`id_igrice`,`naslov`,`cena`,`ocena`,`datum_nastanka`,`id_vrste`) values 
(1,'Bloodborne',4000,9.3,'24.06.2015.',2);


DROP TABLE IF EXISTS `vrste_igrica`;

CREATE TABLE `vrste_igrica` (
  `id_vrste` int(11) NOT NULL,
  `naziv_vrste` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_vrste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


insert  into `vrste_igrica`(`id_vrste`,`naziv_vrste`) values 
(1,'PS5'),
(2,'PS4'),
(3,'PS3'),
(4,'PSP');


