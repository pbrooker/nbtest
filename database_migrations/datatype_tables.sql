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

CREATE TABLE `table_characteristics` (
  `table_id` int(11) NOT NULL,
  `characteristic_id` int(11) NOT NULL,
  KEY `table_id` (`table_id`),
  KEY `characteristic_id` (`characteristic_id`)
);
