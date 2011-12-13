CREATE TABLE `umpermissions` (
  `id` char(36) NOT NULL,
  `umrole_id` char(36) DEFAULT NULL,
  `umuser_id` char(36) DEFAULT NULL,
  `plugin` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `params` text,
  `allowed` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
);

CREATE TABLE `umroles` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rank` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
);

CREATE TABLE `umusers` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `umrole_id` char(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
);