-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 05, 2020 la 12:41 PM
-- Versiune server: 10.4.10-MariaDB
-- Versiune PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `proiectbd`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `artisti`
--

CREATE TABLE `artisti` (
  `ID_Artist` int(11) NOT NULL,
  `Nume` varchar(25) NOT NULL,
  `Prenume` varchar(20) NOT NULL,
  `CNP` varchar(15) NOT NULL,
  `Nationalitate` varchar(15) DEFAULT NULL,
  `Sex` varchar(1) DEFAULT 'F',
  `Data_Nastere` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `artisti`
--

INSERT INTO `artisti` (`ID_Artist`, `Nume`, `Prenume`, `CNP`, `Nationalitate`, `Sex`, `Data_Nastere`) VALUES
(0, 'Valeria', 'Ibbs', '1970308183569', 'roman', 'F', '1981-03-03'),
(1, 'Berkley', 'Michelet', '1865436334543', 'rus', 'M', '1981-01-20'),
(2, 'Quint', 'Coulling', '2940501106764', 'englez', 'M', '1977-06-02'),
(3, 'Enrika', 'Rennenbach', '2870724350191', 'roman', 'F', '1994-11-17'),
(4, 'Myrta', 'Kinningley', '1930611515302', 'roman', 'F', '1970-10-12'),
(5, 'Merrili', 'Donett', '1961029250940', 'rus', 'F', '1991-09-20'),
(6, 'Glynis', 'Rishbrook', '2950602317986', 'roman', 'F', '1995-07-28'),
(7, 'Bentley', 'Pucker', '6010417350412', 'roman', 'M', '1989-05-21'),
(8, 'Larissa', 'McNiven', '1870218235494', 'polonez', 'F', '1980-09-21'),
(9, 'Heda', 'Kenion', '1891127525729', 'englez', 'F', '1975-10-29'),
(10, 'Kellen', 'Downs', '1881107013662', 'roman', 'F', '1981-08-14'),
(11, 'Dre', 'Stobbart', '2950315383798', 'roman', 'F', '1989-08-09'),
(12, 'Korella', 'Lauridsen', '2890109152757', 'roman', 'F', '1970-12-15'),
(13, 'Hobie', 'Colter', '5010319342574', 'german', 'M', '1977-06-21'),
(14, 'Barnabe', 'Finnes', '2900801252581', 'german', 'M', '1979-04-27'),
(15, 'Lira', 'Grocutt', '2850725512351', 'roman', 'F', '1984-08-12'),
(16, 'Jeralee', 'Veldman', '2940224055641', 'roman', 'F', '1992-05-26'),
(17, 'Kimball', 'Kinkade', '2930130415158', 'francez', 'M', '1994-09-22'),
(18, 'Thebault', 'Schaffler', '6000119044909', 'francez', 'M', '1991-07-08'),
(19, 'Darlleen', 'Osmon', '2890825175680', 'roman', 'F', '1986-06-27');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `clienti`
--

CREATE TABLE `clienti` (
  `ID_client` int(11) NOT NULL,
  `ID_ghid_fk` int(11) NOT NULL,
  `Nume` varchar(25) NOT NULL,
  `Prenume` varchar(20) NOT NULL,
  `CNP` varchar(14) NOT NULL,
  `Sex` varchar(1) DEFAULT 'F',
  `Adresa_livrare` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `clienti`
--

INSERT INTO `clienti` (`ID_client`, `ID_ghid_fk`, `Nume`, `Prenume`, `CNP`, `Sex`, `Adresa_livrare`) VALUES
(0, 0, 'Hadrian', 'Wickie', '5021119339280', 'M', '6096 Dexter Point'),
(1, 1, 'Maynard', 'Ough', '5010719367476', 'F', '38709 Elka Center'),
(2, 2, 'Jeannette', 'McJarrow', '2970721043627', 'F', '98 Pine View Pass'),
(3, 3, 'Ursulina', 'Wellesley', '6020328393831', 'F', '95878 Oneill Hill'),
(4, 4, 'Loraine', 'Serridge', '2920827297477', 'F', '933 Bultman Park'),
(5, 5, 'Giana', 'Langston', '1960702350261', 'F', '8154 Carpenter Terrace'),
(6, 6, 'Annadiane', 'McGown', '1940728374846', 'F', '48 Little Fleur Trail'),
(7, 7, 'Trista', 'Stiles', '1971230246975', 'F', '4854 Summerview Park'),
(8, 8, 'Rodie', 'Stairmand', '2850723218060', NULL, '53 Bluestem Terrace'),
(9, 9, 'Andy', 'Robardet', '1850401038681', 'F', '48 Schlimgen Circle'),
(10, 10, 'Gilles', 'Ayllett', '1900307515991', 'M', '041 Hanover Crossing'),
(11, 11, 'Lawrence', 'Remer', '2891022467625', NULL, '97 Badeau Street'),
(12, 12, 'Billye', 'Hutchin', '1930903434117', 'F', '7 Clemons Plaza'),
(13, 13, 'Earvin', 'Goley', '6000504054274', 'M', '2 Mariners Cove Point'),
(14, 14, 'Mikael', 'Cunnington', '2901208183712', 'M', '969 Paget Place'),
(15, 1, 'Base', 'Broy', '1901002162462', 'M', '960 Maple Wood Street'),
(16, 0, 'Nathaniel', 'Gander', '1880918153099', 'M', '81836 Valley Edge Junction'),
(17, 0, 'Eulalie', 'Fenne', '1920429056177', 'F', '33999 Upham Street'),
(18, 2, 'Dorthy', 'Galbraith', '5000512313144', 'F', '238 Fisk Trail'),
(19, 3, 'Willi', 'Guerreau', '1970502076969', NULL, '331 Hanson Lane'),
(20, 4, 'Sadye', 'Krienke', '1941025397392', 'F', '3236 Fremont Trail'),
(21, 5, 'Liuka', 'Santoro', '1870703101326', 'F', '5 Erie Parkway'),
(22, 6, 'Wells', 'MacNeilley', '2850812209167', 'M', '409 Comanche Court'),
(23, 7, 'Edik', 'Guarnier', '1880911208003', 'M', '32108 Saint Paul Court'),
(24, 2, 'Griffie', 'Beeton', ' 2850727402468', 'M', '469 Tennessee Circle');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `curenti`
--

CREATE TABLE `curenti` (
  `ID_curent` int(11) NOT NULL,
  `Denumire` varchar(15) NOT NULL,
  `Perioada` varchar(45) DEFAULT NULL,
  `Descriere` varchar(255) DEFAULT NULL,
  `Culori_predominante` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `curenti`
--

INSERT INTO `curenti` (`ID_curent`, `Denumire`, `Perioada`, `Descriere`, `Culori_predominante`) VALUES
(0, 'Body Art', '1965-2000', 'Arta corpului', 'culoarea pielii, galben'),
(1, 'Realism Clasic', '1970-1990', NULL, 'albastru, gri'),
(2, 'Stilul internat', '1918-1945', NULL, NULL),
(3, 'Cubism', '1908-1914', 'Pictorul se rupe într-un mod atât de hotărât de tradiționala artă figurativă', 'portocaliu, albastru'),
(4, 'Romantism', '1750–1890', NULL, 'rosu, galben'),
(5, 'Divizionism', '1880–1910', 'Definit de separarea culorilor în zone foarte mici care interacționează optic', 'maro, negru'),
(6, 'Suprarealism', '1920–1960', NULL, NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `expozitii`
--

CREATE TABLE `expozitii` (
  `ID_expozitie` int(11) NOT NULL,
  `Denumire_expozitie` varchar(45) NOT NULL,
  `Telefon` varchar(11) NOT NULL,
  `Adresa` varchar(45) NOT NULL,
  `Program` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `expozitii`
--

INSERT INTO `expozitii` (`ID_expozitie`, `Denumire_expozitie`, `Telefon`, `Adresa`, `Program`) VALUES
(0, 'Little Sister', '4683213028', '6840 Lotheville Hill', 'L-V 10am-18pm'),
(1, 'The Land Before Time', '5319467577', '6840 Lotheville Hill', 'L-V 10am-18pm'),
(2, 'Millie', '2695075298', '6840 Lotheville Hill', 'L-V 10am-18pm'),
(3, 'Great Yokai War', '7049677177', '6840 Lotheville Hill', 'L-V 10am-18pm'),
(4, 'City of Hope', '8111713208', '6840 Lotheville Hill', 'L-V 10am-18pm'),
(5, 'Brothers', '7438365307', '6840 Lotheville Hill', 'L-V 10am-18pm'),
(6, 'Top Secret', '4458596249', '6840 Lotheville Hill', 'L-V 10am-18pm'),
(7, 'Friends & Lovers', '4774269020', '6840 Lotheville Hill', 'L-V 10am-18pm'),
(8, 'Through the Mists', '4987292170', '6840 Lotheville Hill', 'L-V 10am-18pm'),
(9, 'Powerpuff Girls, The', '9703923080', '6840 Lotheville Hill', 'L-V 10am-18pm');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `facturi`
--

CREATE TABLE `facturi` (
  `ID_Factura` int(11) NOT NULL,
  `ID_client_fk` int(11) NOT NULL,
  `ID_obiect_fk` int(11) NOT NULL,
  `ID_metoda_de_plata_fk` int(11) NOT NULL,
  `cod_factura` varchar(15) NOT NULL,
  `taxa_transport` int(10) NOT NULL,
  `cost_total` int(10) NOT NULL,
  `data_facturarii` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `facturi`
--

INSERT INTO `facturi` (`ID_Factura`, `ID_client_fk`, `ID_obiect_fk`, `ID_metoda_de_plata_fk`, `cod_factura`, `taxa_transport`, `cost_total`, `data_facturarii`) VALUES
(0, 0, 1, 1, '4071040109', 20, 1200, '2019-06-19'),
(1, 16, 1, 0, '4219555722', 20, 5633, '2018-06-12'),
(2, 17, 2, 0, '1943974840', 20, 200, '2018-09-26'),
(3, 15, 3, 0, '7763556682', 20, 466, '2018-11-25'),
(4, 2, 4, 1, '7749187748', 20, 3400, '2019-01-19'),
(5, 24, 5, 1, '5781356165', 20, 2000, '2019-02-10'),
(6, 18, 6, 2, '9102992972', 20, 3556, '2018-01-25'),
(7, 19, 7, 0, '3885748165', 20, 1244, '2018-03-17'),
(8, 3, 8, 3, '8913768231', 20, 3688, '2018-06-27'),
(9, 3, 9, 4, '1135133121', 20, 900, '2018-09-30'),
(10, 0, 7, 5, '2164411726', 20, 1045, '2018-12-02'),
(11, 0, 7, 6, '2901759542', 20, 1144, '2019-05-20'),
(12, 2, 12, 1, '4581572313', 20, 1200, '2019-12-24'),
(13, 0, 1, 2, '2014428631', 20, 1346, '2018-05-05'),
(14, 1, 14, 0, '5294119630', 20, 14074, '2019-01-14');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `ghizi`
--

CREATE TABLE `ghizi` (
  `ID_ghid` int(11) NOT NULL,
  `ID_expozitie_fk` int(11) NOT NULL,
  `Nume_ghid` varchar(25) NOT NULL,
  `Prenume` varchar(20) NOT NULL,
  `Descriere` varchar(255) DEFAULT NULL,
  `Pret_h_prezentare` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `ghizi`
--

INSERT INTO `ghizi` (`ID_ghid`, `ID_expozitie_fk`, `Nume_ghid`, `Prenume`, `Descriere`, `Pret_h_prezentare`) VALUES
(0, 0, 'Vaughn', 'Bampton', 'Ghid tanar cu experienta si prezentari minunate', 40),
(1, 1, 'Deloris', 'Bursell', 'Ghid tanar cu experienta si prezentari minunate', 35),
(2, 2, 'Masha', 'Erratt', 'Ghid tanar cu experienta si prezentari minunate', 40),
(3, 3, 'Shannen', 'Bettinson', NULL, 45),
(4, 4, 'Annabal', 'Hun', 'Prezentari minunate', 45),
(5, 5, 'Sebastien', 'McCreary', 'Ghid tanar cu experienta si prezentari minunate', 50),
(6, 6, 'Roley', 'Geary', 'Prezentari minunate', 30),
(7, 7, 'Doug', 'Kunisch', 'Ghid tanar cu experienta si prezentari minunate', 30),
(8, 8, 'Sandor', 'Elsby', 'Ghid tanar cu experienta si prezentari minunate', 35),
(9, 9, 'Cordi', 'Barbour', NULL, 40),
(10, 0, 'Frederick', 'Vowels', 'Ghid tanar cu experienta si prezentari minunate', 45),
(11, 1, 'Robinette', 'Klulisek', NULL, 50),
(12, 2, 'Wheeler', 'Greatham', 'Ghid tanar cu experienta si prezentari minunate', 30),
(13, 0, 'Gale', 'Keymar', 'Ghid tanar cu experienta si prezentari minunate', 35),
(14, 1, 'Dewitt', 'Bartleman', NULL, 35);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `metode_de_plata`
--

CREATE TABLE `metode_de_plata` (
  `ID_metoda` int(11) NOT NULL,
  `metoda` varchar(45) NOT NULL,
  `descriere` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `metode_de_plata`
--

INSERT INTO `metode_de_plata` (`ID_metoda`, `metoda`, `descriere`) VALUES
(0, 'lightcoin', 'moneda virtuala'),
(1, 'bitcoin', 'moneda virtuala'),
(2, 'cash', NULL),
(3, 'visa', 'card'),
(4, 'instapayment', NULL),
(5, 'mastercard', 'card'),
(6, 'cec', NULL),
(7, 'revolut', 'card');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `obiecte_de_arta`
--

CREATE TABLE `obiecte_de_arta` (
  `ID_obiect` int(11) NOT NULL,
  `ID_expozitie_fk` int(11) NOT NULL,
  `ID_curent_fk` int(11) NOT NULL,
  `ID_artist_fk` int(11) NOT NULL,
  `Denumire_obiect` varchar(45) NOT NULL,
  `Tip` varchar(15) NOT NULL,
  `Data_finisare` date DEFAULT NULL,
  `Pret` int(10) NOT NULL,
  `De_vanzare` varchar(2) NOT NULL,
  `Descriere` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `obiecte_de_arta`
--

INSERT INTO `obiecte_de_arta` (`ID_obiect`, `ID_expozitie_fk`, `ID_curent_fk`, `ID_artist_fk`, `Denumire_obiect`, `Tip`, `Data_finisare`, `Pret`, `De_vanzare`, `Descriere`) VALUES
(0, 0, 0, 0, 'Isus binecuvantand', 'icoana', '2010-07-04', 5000, 'Da', 'Icoana in doua registre'),
(1, 1, 1, 1, 'Fecioara cu Pruncul', 'icoana', '2010-01-15', 6000, 'Da', 'tempera pe lemn si foita de aur, atelier Rusia, inscriptionata in slavona'),
(2, 2, 2, 2, 'Sfantul Nicolae', 'icoana', '2016-11-08', 250, 'Da', 'tempera pe glaja, foita de aur, atelier Nordul Transilvaniei, rama lemn cioplit'),
(3, 3, 3, 3, 'Triptic cu douasprezece scene din viata lui I', 'icoana', '2007-05-31', 30700, 'Da', 'bronz gravat, inscriptionat in slavona, atelier Rusia, piesa de colectie'),
(4, 4, 4, 4, 'Maica Domnului cu Pruncul-Eleussa', 'icoana', '2007-09-02', 4570, 'Da', 'tempera pe lemn, foita de aur, atelier Tara Romaneasca, de influenta greaca, cu rama simulata sculptata'),
(5, 5, 5, 5, 'Salvador', 'pictura', '2010-02-23', 562, 'Da', 'litografie color'),
(6, 6, 6, 6, 'Florenta', 'pictura', '2010-09-25', 6343, 'Da', 'Natura statica cu ulcica'),
(7, 7, 0, 7, 'Biserica in Ardeal', 'pictura', '2018-10-01', 733, 'Da', 'M'),
(8, 8, 1, 8, 'Taranca', 'pitura', '2006-08-06', 836, 'Da', NULL),
(9, 9, 2, 9, 'Arlechin', 'sculptura', '2017-12-29', 946, 'Da', 'Bronz patinat. Compoziție cu arlechin. Nesemnat.'),
(10, 0, 0, 10, 'Idila', 'sculptura', '2006-04-29', 1025, 'Da', 'Marmură rose.Compoziție cu nuduri.Semnat pe plăcuța debronz aplicată pe soclu'),
(11, 1, 1, 11, 'Nimfa', 'sculptura', '2012-04-04', 11000, 'Da', 'Teracotă. Compoziție cu nimfă.Semnat în monogramă, dreapta,prin excizare'),
(12, 2, 2, 12, 'Clio', 'sculptura', '2017-05-01', 4500, 'Da', 'Bronz. Compoziție cu nud. Semnat pe tăblița de alamă de pe soclu'),
(13, 3, 3, 13, 'Cuplu', 'sculptura', '2011-04-06', 1200, 'Da', 'Bronz. Compoziție cu cuplu. Semnat spate jos, pe verticală prin turnare'),
(14, 4, 4, 14, 'Antichitate', 'sculptura', '2008-03-21', 1876, 'Da', 'Bronz patinat. Portretul unui filozof antic. Semnat pe spate (gât), pe verticală, prin turnare'),
(15, 5, 5, 15, 'Ciocarlie', 'sculptura', '2019-04-21', 2800, 'Da', 'Marmură. Compoziție cu nud. Semnat pe plăcuța metalică de pe soclu '),
(16, 6, 6, 16, 'Sclava', 'sculptura', '2014-01-11', 5500, 'Da', 'Bronz și bronz patinat. Compoziție iliadescă cu sclava Briseis. Nesemnat.'),
(17, 7, 0, 17, 'Pieta', 'sculptura', '2016-09-18', 3000, 'Da', 'Marmură albă și rose. Compoziție simbolică. Varianta în bronz este reprodusă în albumul „Simfonia luminii” la pag.139.'),
(18, 8, 1, 18, 'Geneza', 'sculptura', '2016-06-25', 1500, 'Da', 'Bronz și marmură rose. Compoziție simbolică. Semnat și datat (2017) prin zgrafitare, stânga jos, pe baza'),
(19, 9, 2, 19, 'Maternitate', 'grafica', '2006-03-17', 1400, 'Da', 'Compoziție cu mamă și prunc.'),
(20, 0, 0, 0, 'Omul orchestră', 'grafica', '2005-09-27', 850, 'Da', 'Carioca pe carton. Compoziție constructivistă.'),
(21, 1, 1, 0, 'Lacul', 'grafica', '2018-06-14', 600, 'Da', NULL),
(22, 2, 2, 0, 'Nul', 'grafica', '2014-10-07', 300, 'Da', NULL),
(23, 3, 3, 0, 'Gospodăria', 'grafica', '2015-05-27', 360, 'Da', 'Tempera pe carton. Compoziție cu gospodărie țărănească.'),
(24, 4, 4, 0, 'Coborârea de pe cruce', 'grafica', '2014-11-01', 3000, 'Da', 'Tehnică mixtă: acvaforte și acvatinta pecarton subțire. Tablou religios. '),
(25, 5, 5, 5, 'Veneția', 'grafica', '2009-08-20', 1356, 'Da', 'Acuarelă pe carton. Peisaj veneţian.'),
(26, 6, 6, 6, 'Tătari din Tutrakan', 'grafica', '2018-12-27', 600, 'Da', NULL),
(27, 7, 0, 7, 'Iriși', 'grafica', '2007-08-02', 500, 'Da', NULL),
(28, 8, 1, 8, 'Geamia din Turtucaia', 'grafica', '2008-02-12', 1600, 'Da', 'Tehnică mixtă: guașă și ulei pe pânză maruflată pe carton. Compoziție cu tătăroaică la cafea. '),
(29, 9, 2, 9, 'Margarete sălbatice', 'grafica', '2018-09-29', 1300, 'Da', NULL);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `artisti`
--
ALTER TABLE `artisti`
  ADD PRIMARY KEY (`ID_Artist`),
  ADD UNIQUE KEY `CNP` (`CNP`);

--
-- Indexuri pentru tabele `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`ID_client`),
  ADD UNIQUE KEY `CNP` (`CNP`),
  ADD KEY `clienti_ibfk_1` (`ID_ghid_fk`);

--
-- Indexuri pentru tabele `curenti`
--
ALTER TABLE `curenti`
  ADD PRIMARY KEY (`ID_curent`),
  ADD UNIQUE KEY `Denumire` (`Denumire`);

--
-- Indexuri pentru tabele `expozitii`
--
ALTER TABLE `expozitii`
  ADD PRIMARY KEY (`ID_expozitie`),
  ADD UNIQUE KEY `Telefon` (`Telefon`);

--
-- Indexuri pentru tabele `facturi`
--
ALTER TABLE `facturi`
  ADD PRIMARY KEY (`ID_Factura`),
  ADD UNIQUE KEY `cod_factura` (`cod_factura`),
  ADD KEY `facturi_ibfk_1` (`ID_client_fk`),
  ADD KEY `facturi_ibfk_3` (`ID_obiect_fk`),
  ADD KEY `facturi_ibfk_4` (`ID_metoda_de_plata_fk`);

--
-- Indexuri pentru tabele `ghizi`
--
ALTER TABLE `ghizi`
  ADD PRIMARY KEY (`ID_ghid`),
  ADD KEY `ghizi_ibfk_1` (`ID_expozitie_fk`);

--
-- Indexuri pentru tabele `metode_de_plata`
--
ALTER TABLE `metode_de_plata`
  ADD PRIMARY KEY (`ID_metoda`),
  ADD UNIQUE KEY `metoda` (`metoda`);

--
-- Indexuri pentru tabele `obiecte_de_arta`
--
ALTER TABLE `obiecte_de_arta`
  ADD PRIMARY KEY (`ID_obiect`),
  ADD UNIQUE KEY `Denumire_obiect` (`Denumire_obiect`),
  ADD KEY `obiecte_de_arta_ibfk_1` (`ID_curent_fk`),
  ADD KEY `obiecte_de_arta_ibfk_2` (`ID_expozitie_fk`),
  ADD KEY `obiecte_de_arta_ibfk_3` (`ID_artist_fk`);

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `clienti`
--
ALTER TABLE `clienti`
  ADD CONSTRAINT `clienti_ibfk_1` FOREIGN KEY (`ID_ghid_fk`) REFERENCES `ghizi` (`ID_ghid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `facturi`
--
ALTER TABLE `facturi`
  ADD CONSTRAINT `facturi_ibfk_1` FOREIGN KEY (`ID_client_fk`) REFERENCES `clienti` (`ID_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facturi_ibfk_3` FOREIGN KEY (`ID_obiect_fk`) REFERENCES `obiecte_de_arta` (`ID_obiect`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facturi_ibfk_4` FOREIGN KEY (`ID_metoda_de_plata_fk`) REFERENCES `metode_de_plata` (`ID_metoda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `ghizi`
--
ALTER TABLE `ghizi`
  ADD CONSTRAINT `ghizi_ibfk_1` FOREIGN KEY (`ID_expozitie_fk`) REFERENCES `expozitii` (`ID_expozitie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `obiecte_de_arta`
--
ALTER TABLE `obiecte_de_arta`
  ADD CONSTRAINT `obiecte_de_arta_ibfk_1` FOREIGN KEY (`ID_curent_fk`) REFERENCES `curenti` (`ID_curent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obiecte_de_arta_ibfk_2` FOREIGN KEY (`ID_expozitie_fk`) REFERENCES `expozitii` (`ID_expozitie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obiecte_de_arta_ibfk_3` FOREIGN KEY (`ID_artist_fk`) REFERENCES `artisti` (`ID_Artist`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
