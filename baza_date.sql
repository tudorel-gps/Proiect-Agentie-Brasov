-- Creează baza de date dacă nu există
CREATE DATABASE IF NOT EXISTS `agentiebrasov` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `agentiebrasov`;

-- Tabelul pentru destinații (Trebuie creat primul)
CREATE TABLE IF NOT EXISTS `destinatii` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(255) NOT NULL,
  `imagine` varchar(255) NOT NULL,
  `pret_bilet` decimal(10,2) NOT NULL,
  `timp_vizitare` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabelul pentru rezervări
CREATE TABLE IF NOT EXISTS `programare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume_vizitator` varchar(255) NOT NULL,
  `email_vizitator` varchar(255) NOT NULL,
  `destinatie_id` int(11) NOT NULL,
  `data_planificata` date NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_destinatie` FOREIGN KEY (`destinatie_id`) REFERENCES `destinatii` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserăm niște date de probă ca să nu fie site-ul gol
INSERT INTO `destinatii` (`nume`, `imagine`, `pret_bilet`, `timp_vizitare`) VALUES
('Piata Sfatului', 'piata.jpg', 0.00, '24/7'),
('Castelul Bran', 'bran.jpg', 60.00, '09:00 - 18:00'),
('Biserica Neagra', 'biserica.jpg', 20.00, '10:00 - 19:00');
