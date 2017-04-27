CREATE TABLE `geography_prov` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `lang` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `name` (`name`),
  KEY `language` (`lang`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;


INSERT INTO `geography_prov` (`id`, `name`, `lang`)
VALUES
  (1, 'Newfoundland and Labrador', 'EN'),
  (2, 'Nova Scotia', 'EN'),
  (3, 'Prince Edward Island', 'EN'),
  (4, 'New Brunswick', 'EN'),
  (5, 'Quebec', 'EN'),
  (6, 'Ontario', 'EN'),
  (7, 'Manitoba', 'EN'),
  (8, 'Saskatchewan', 'EN'),
  (9, 'Alberta', 'EN'),
  (10, 'British Columbia', 'EN'),
  (11, 'Canada', 'EN'),
  (12, 'Terre-Neuve-et-Labrador', 'FR'),
  (13, 'Nouvelle-Écosse', 'FR'),
  (14, 'Île-du-Prince-Édouard', 'FR'),
  (15, 'Nouveau-Brunswick	', 'FR'),
  (16, 'Québec', 'FR'),
  (17, 'Ontario	', 'FR'),
  (18, 'Manitoba', 'FR'),
  (19, 'Saskatchewan', 'FR'),
  (20, 'Alberta', 'FR'),
  (21, 'Colombie-Britannique', 'FR'),
  (22, 'Canada', 'FR');

CREATE TABLE `characteristics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `characteristic` varchar(255) DEFAULT NULL,
  `characteristic_fr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `Characteristic` (`characteristic`),
  KEY `Characteristic French` (`characteristic_fr`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

CREATE TABLE `tables` (
  `id`  int(11) NOT NULL AUTO_INCREMENT,
  `table` VARCHAR(255),
  KEY `id` (`id`)
);

INSERT INTO `tables` (`id`, `table`)
VALUES
  (1, '02820002'),
  (2, '02820008'),
  (3, '02820087'),
  (4, '02820088'),
  (5, '02820122'),
  (6, '02820123'),
  (7, '02820128'),
  (8, '02820129');


CREATE TABLE `table_characteristics` (
  `table_id` int(11) NOT NULL,
  `characteristic_id` int(11) NOT NULL,
  KEY `table_id` (`table_id`),
  KEY `characteristic_id` (`characteristic_id`)
);

INSERT INTO `table_characteristics` (`table_id`, `characteristic_id`)
VALUES
  (1, 13),
  (1, 15),
  (1, 14),
  (1, 11),
  (1, 4),
  (1, 10),
  (1, 12),
  (1, 1),
  (1, 9),
  (1, 8),
  (2, 15),
  (2, 1),
  (2, 10),
  (2, 4),
  (2, 12),
  (2, 14),
  (3, 2),
  (3, 6),
  (3, 5),
  (3, 4),
  (3, 1),
  (3, 3),
  (3, 7),
  (5, 10),
  (5, 4),
  (5, 11),
  (5, 12),
  (5, 7),
  (5, 13),
  (5, 6),
  (5, 5),
  (5, 1),
  (5, 14),
  (6, 15),
  (6, 14),
  (6, 13),
  (6, 8),
  (6, 12),
  (6, 11),
  (6, 4),
  (6, 10),
  (6, 1),
  (6, 9),
  (7, 10),
  (7, 9),
  (7, 1),
  (7, 11),
  (7, 4),
  (7, 12),
  (7, 8),
  (7, 13),
  (7, 14),
  (7, 15),
  (8, 15),
  (8, 9),
  (8, 10),
  (8, 4),
  (8, 11),
  (8, 12),
  (8, 8),
  (8, 13),
  (8, 14),
  (8, 1);

