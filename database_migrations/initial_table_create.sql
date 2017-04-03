CREATE TABLE `nbdata` (
  `ref_date` int(10) DEFAULT NULL,
  `geography` varchar(10) DEFAULT NULL,
  `characteristics` varchar(30) DEFAULT NULL,
  `sex` varchar(15) DEFAULT NULL,
  `agegroup` varchar(30) DEFAULT NULL,
  `vector` varchar(10) DEFAULT NULL,
  `coordinate` varchar(10) DEFAULT NULL,
  `value` varchar(30) DEFAULT NULL,
  `hash_value` varchar(255) NOT NULL,
  PRIMARY KEY (`hash_value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `nbdata_last_update` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `scan_date` varchar(50) DEFAULT NULL,
  `last_modified` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;