# Export von Tabelle downloads
# ------------------------------------------------------------

CREATE TABLE `downloads` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `download_type` varchar(256) DEFAULT NULL,
  `download_name` varchar(256) DEFAULT NULL,
  `download_description` mediumtext,
  `download_url` varchar(256) DEFAULT NULL,
  `download_date` datetime DEFAULT NULL,
  `is_active` int(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Export von Tabelle downloads_categories_mm
# ------------------------------------------------------------

CREATE TABLE `downloads_categories_mm` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `download_id` int(11) unsigned NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_pairs` (`download_id`,`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Export von Tabelle downloads_worlds_mm
# ------------------------------------------------------------

CREATE TABLE `downloads_worlds_mm` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `download_id` int(11) unsigned DEFAULT NULL,
  `world_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_pairs` (`download_id`,`world_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

