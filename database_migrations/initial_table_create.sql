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
)