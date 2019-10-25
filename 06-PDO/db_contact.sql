CREATE TABLE `AddContact` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
    `prenom` varchar(80)  NULL,
    `nom` varchar(80)  NULL,
    `email` varchar(80) NOT NULL,
    `tel` int(20) NOT NULL,
     `sujet` varchar(256) NOT NULL,
    `message` text NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `contact` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
    `prenom` varchar(80)  NULL,
    `nom` varchar(80)  NULL,
    `email` varchar(80) NOT NULL,
    `tel` int(20) NOT NULL,
     `type` tinyint(1) NOT NULL,
    `message` text NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;