CREATE TABLE `02820087` (
  `ref_date` varchar(20) DEFAULT NULL,
  `geography` varchar(255) DEFAULT NULL,
  `characteristics` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `agegroup` varchar(255) DEFAULT NULL,
  `statistics` varchar(255) DEFAULT NULL,
  `datatype` varchar(255) DEFAULT NULL,
  `vector` varchar(50) DEFAULT NULL,
  `coordinate` varchar(50) DEFAULT NULL,
  `value` decimal(10,1) DEFAULT NULL,
  `hash_value` varchar(255) NOT NULL,
  PRIMARY KEY (`hash_value`),
  KEY `hash_value` (`hash_value`),
  KEY `ref_date` (`ref_date`),
  KEY `character` (`characteristics`),
  KEY `geo` (`geography`),
  KEY `sex` (`sex`),
  KEY `age` (`agegroup`),
  KEY `stats` (`statistics`),
  KEY `datatype` (`datatype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `02820002` (
  `ref_date` varchar(20) DEFAULT NULL,
  `geography` varchar(255) DEFAULT NULL,
  `characteristics` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `agegroup` varchar(255) DEFAULT NULL,
  `vector` varchar(50) DEFAULT NULL,
  `coordinate` varchar(50) DEFAULT NULL,
  `value` DECIMAL (10,1) DEFAULT NULL,
  `hash_value` varchar(255) NOT NULL,
  PRIMARY KEY (`hash_value`),
  KEY `hash_value` (`hash_value`),
  KEY `ref_date` (`ref_date`),
  KEY `character` (`characteristics`),
  KEY `geo` (`geography`),
  KEY `sex` (`sex`),
  KEY `age` (`agegroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `02820008` (
  `ref_date` varchar(20) DEFAULT NULL,
  `geography` varchar(255) DEFAULT NULL,
  `characteristics` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `vector` varchar(50) DEFAULT NULL,
  `coordinate` varchar(50) DEFAULT NULL,
  `value` DECIMAL (10,1) DEFAULT NULL,
  `hash_value` varchar(255) NOT NULL,
  PRIMARY KEY (`hash_value`),
  KEY `hash_value` (`hash_value`),
  KEY `ref_date` (`ref_date`),
  KEY `character` (`characteristics`),
  KEY `geo` (`geography`),
  KEY `sex` (`sex`),
  KEY `age` (`age`),
  KEY `industry` (`industry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `02820088` (
  `ref_date` varchar(20) DEFAULT NULL,
  `geography` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `statistics` varchar(255) DEFAULT NULL,
  `datatype` varchar(255) DEFAULT NULL,
  `vector` varchar(50) DEFAULT NULL,
  `coordinate` varchar(50) DEFAULT NULL,
  `value` DECIMAL (10,1) DEFAULT NULL,
  `hash_value` varchar(255) NOT NULL,
  PRIMARY KEY (`hash_value`),
  KEY `hash_value` (`hash_value`),
  KEY `ref_date` (`ref_date`),
  KEY `geo` (`geography`),
  KEY `stats` (`statistics`),
  KEY `datatype` (`datatype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `02820122` (
  `ref_date` varchar(20) DEFAULT NULL,
  `geo` varchar(255) DEFAULT NULL,
  `geographical_classification` varchar(255) DEFAULT NULL,
  `characteristics` varchar(255) DEFAULT NULL,
  `statistics` varchar(255) DEFAULT NULL,
  `vector` varchar(50) DEFAULT NULL,
  `coordinate` varchar(50) DEFAULT NULL,
  `value` DECIMAL (10,1) DEFAULT NULL,
  `hash_value` varchar(255) NOT NULL,
  PRIMARY KEY (`hash_value`),
  KEY `hash_value` (`hash_value`),
  KEY `ref_date` (`ref_date`),
  KEY `character` (`characteristics`),
  KEY `geo` (`geo`),
  KEY `stats` (`statistics`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `02820123` (
  `ref_date` varchar(20) DEFAULT NULL,
  `geo` varchar(255) DEFAULT NULL,
  `geographical_classification` varchar(255) DEFAULT NULL,
  `characteristics` varchar(255) DEFAULT NULL,
  `vector` varchar(50) DEFAULT NULL,
  `coordinate` varchar(50) DEFAULT NULL,
  `value` DECIMAL (10,1) DEFAULT NULL,
  `hash_value` varchar(255) NOT NULL,
  PRIMARY KEY (`hash_value`),
  KEY `hash_value` (`hash_value`),
  KEY `ref_date` (`ref_date`),
  KEY `character` (`characteristics`),
  KEY `geo` (`geo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `02820128` (
  `ref_date` varchar(20) DEFAULT NULL,
  `geo` varchar(255) DEFAULT NULL,
  `geographical_classification` varchar(255) DEFAULT NULL,
  `characteristics` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `agegroup` varchar(255) DEFAULT NULL,
  `vector` varchar(50) DEFAULT NULL,
  `coordinate` varchar(50) DEFAULT NULL,
  `value` DECIMAL (10,1) DEFAULT NULL,
  `hash_value` varchar(255) NOT NULL,
  PRIMARY KEY (`hash_value`),
  KEY `hash_value` (`hash_value`),
  KEY `ref_date` (`ref_date`),
  KEY `character` (`characteristics`),
  KEY `geo` (`geo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `02820129` (
  `ref_date` varchar(20) DEFAULT NULL,
  `geo` varchar(255) DEFAULT NULL,
  `geographical_classification` varchar(255) DEFAULT NULL,
  `characteristics` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `agegroup` varchar(255) DEFAULT NULL,
  `vector` varchar(50) DEFAULT NULL,
  `coordinate` varchar(50) DEFAULT NULL,
  `value` DECIMAL (10,1) DEFAULT NULL,
  `hash_value` varchar(255) NOT NULL,
  PRIMARY KEY (`hash_value`),
  KEY `hash_value` (`hash_value`),
  KEY `ref_date` (`ref_date`),
  KEY `character` (`characteristics`),
  KEY `geo` (`geo`),
  KEY `sex` (`sex`),
  KEY `age` (`agegroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `nbdata_sources` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(255) DEFAULT NULL,
  `name` VARCHAR(50) DEFAULT NULL,
  `current_version` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `nbdata_sources` (`url`, `name`, `current_version`)
VALUES
  ('http://www20.statcan.gc.ca/tables-tableaux/cansim/csv/02820087-eng.zip', '02820087', NULL),
  ('http://www20.statcan.gc.ca/tables-tableaux/cansim/csv/02820002-eng.zip', '02820002', NULL),
  ('http://www20.statcan.gc.ca/tables-tableaux/cansim/csv/02820088-eng.zip', '02820088', NULL),
  ('http://www20.statcan.gc.ca/tables-tableaux/cansim/csv/02820008-eng.zip', '02820008', NULL),
  ('http://www20.statcan.gc.ca/tables-tableaux/cansim/csv/02820122-eng.zip', '02820122', NULL),
  ('http://www20.statcan.gc.ca/tables-tableaux/cansim/csv/02820123-eng.zip', '02820123', NULL),
  ('http://www20.statcan.gc.ca/tables-tableaux/cansim/csv/02820128-eng.zip', '02820128', NULL),
  ('http://www20.statcan.gc.ca/tables-tableaux/cansim/csv/02820129-eng.zip', '02820129', NULL);

CREATE TABLE `nbdata_last_update` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `scan_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` varchar(255) DEFAULT NULL,
  `source_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;