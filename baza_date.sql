-- Setează codificarea corectă
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- Creare Tabel Destinații
CREATE TABLE IF NOT EXISTS `destinatii` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(255) NOT NULL,
  `imagine` varchar(255) NOT NULL,
  `pret_bilet` decimal(10,2) NOT NULL,
  `timp_vizitare` varchar(255) DEFAULT NULL,
  `orar` varchar(255) DEFAULT NULL,
  `animale` varchar(100) DEFAULT NULL,
  `parcare` varchar(100) DEFAULT NULL,
  `ghid_audio` varchar(100) DEFAULT NULL,
  `acces_dizabilitati` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Golire tabel înainte de insert
TRUNCATE TABLE `destinatii`;

-- Inserare cele 5 obiective accurate
INSERT INTO `destinatii` (`nume`, `imagine`, `pret_bilet`, `timp_vizitare`, `orar`, `animale`, `parcare`, `ghid_audio`, `acces_dizabilitati`) VALUES
('Biserica Neagră', 'biserica.jpg', 20.00, '1 oră', 'Mar-Sâm: 10:00-19:00, Dum: 12:00-19:00', 'Nu este permis accesul', 'Publică (Piața Enescu)', 'Disponibil (RO/EN/DE)', 'Partial (Rampă la intrare)'),
('Cetățuia de pe Strajă', 'cetatuia.jpg', 0.00, '45 min', 'Zilnic: 09:00-20:00 (Exterior)', 'Permis (doar în exterior)', 'Limitată la baza dealului', 'Nu este disponibil', 'Dificil (trepte multe)'),
('Muntele Tâmpa', 'tampa.jpg', 25.00, '2-3 ore', 'Telecabină: 09:30-17:00 (Luni închis)', 'Permis (cu lesă)', 'Parcare Telecabină', 'Nu este cazul', 'Accesibil doar via Telecabină'),
('Piața Sfatului', 'piata.jpg', 0.00, 'Nelimitat', 'Acces non-stop (Zonă pietonală)', 'Permis', 'Parcare subterană (Regina Maria)', 'Panouri informative', 'Accesibil (Zonă plană)'),
('Strada Sforii', 'strada.jpg', 0.00, '15 min', 'Acces non-stop', 'Permis', 'Nu există (Zonă pietonală)', 'Nu este cazul', 'Accesibil');

SET FOREIGN_KEY_CHECKS = 1;
