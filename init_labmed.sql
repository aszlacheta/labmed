SET NAMES utf8;
-- -----------------------------------------------------------------------------------
-- tworzenie bazy danych

DROP DATABASE IF EXISTS labmed;
CREATE DATABASE labmed CHARACTER SET utf8 COLLATE utf8_general_ci;
USE labmed;
-- -----------------------------------------------------------------------------------
-- zakładanie tabel


CREATE TABLE IF NOT EXISTS `users` (
  `id`             INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`           VARCHAR(255)     NOT NULL,
  `email`          VARCHAR(255)     NOT NULL,
  `password`       VARCHAR(60)      NOT NULL,
  `remember_token` VARCHAR(100)              DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `users_email_unique` (`email`)
)
  ENGINE = InnoDB;

CREATE TABLE asortyment (
  ID    INT NOT NULL AUTO_INCREMENT,
  nazwa VARCHAR(100),
  opis  VARCHAR(300),

  PRIMARY KEY (ID)
);

CREATE TABLE notatki (
  ID    INT NOT NULL AUTO_INCREMENT,
  nazwa VARCHAR(100),
  opis  VARCHAR(1024),
  data_utworzenia DATE,
  user_id INT(10) UNSIGNED,
  user_email VARCHAR(255),
  user_name VARCHAR(255),

  PRIMARY KEY (ID)
);


CREATE TABLE odczynnik (
  ID               INT NOT NULL AUTO_INCREMENT,
  nazwa            VARCHAR(100),
  firma            VARCHAR(100),
  numer_kat        VARCHAR(100),
  ilosc            INT(100),
  jednostka        VARCHAR(100),
  masa_molowa      INT(100),
  data_waznosci    DATE,
  cena_za_szt      FLOAT(10, 2),
  data_dodania     TIMESTAMP    DEFAULT NOW(),
  lokalizacja      VARCHAR(100),
  temperatura      FLOAT(10, 4),
  odczynnik_typ_id INT,
  asortyment_id    INT,
  CONSTRAINT chk_jednostka CHECK (jednostka = 'ml'
                                  OR jednostka = 'μl'
                                  OR jednostka = 'nl'
                                  OR jednostka = 'g'
                                  OR jednostka = 'mg'
                                  OR jednostka = 'ug'
                                  OR jednostka = 'ng'),

  PRIMARY KEY (ID)
);

CREATE TABLE odczynnik_typ (
  ID  INT NOT NULL AUTO_INCREMENT,
  typ VARCHAR(100),

  PRIMARY KEY (ID)
);

CREATE TABLE urzadzenie_typ (
  ID       INT NOT NULL AUTO_INCREMENT,
  typ      VARCHAR(100),
  nadgrupa INT NULL,

  PRIMARY KEY (ID)
);

CREATE TABLE urzadzenie (
  ID                 INT NOT NULL AUTO_INCREMENT,
  nazwa              VARCHAR(100),
  numer_kat          VARCHAR(100),
  data_zakupu        DATE,
  data_wymiany_filtr DATE,
  czas_gwarancji     DATE,
  lokalizacja        VARCHAR(100),
  urzadzenie_typ_id  INT,
  asortyment_id      INT,
  ilosc              INT,

  PRIMARY KEY (ID)
);

CREATE TABLE sprzet_jedn (
  ID                    INT NOT NULL AUTO_INCREMENT,
  nazwa                 VARCHAR(100),
  firma                 VARCHAR(100),
  numer_kat             VARCHAR(100),
  pojemnosc             INT(100),
  kalibracja            INT(100),
  data_naprawy          DATE,
  opis_naprawy          VARCHAR(300),
  data_zakupu           DATE,
  data_wymiany_filtr    DATE,
  czas_gwarancji        DATE,
  lokalizacja           VARCHAR(100),
  sprzet_jedn_typ_id    INT,
  sprzet_jedn_podtyp_id INT,
  asortyment_id         INT,
  ilosc                 INT,
  cena_za_szt           FLOAT(4, 2),

  PRIMARY KEY (ID)
);

CREATE TABLE sprzet_jedn_typ (
  ID    INT NOT NULL AUTO_INCREMENT,
  nazwa VARCHAR(100),

  PRIMARY KEY (ID)
);

CREATE TABLE sprzet_jedn_podtyp (
  ID                 INT NOT NULL AUTO_INCREMENT,
  nazwa              VARCHAR(100),
  sprzet_jedn_typ_id INT,

  PRIMARY KEY (ID)
);

CREATE TABLE material_biologiczny (
  ID                          INT NOT NULL AUTO_INCREMENT,
  rodzaj_komorek              VARCHAR(100),
  rodzaj_tkanki               VARCHAR(100),
  firma                       VARCHAR(100),
  data_dostarczenia           DATE,
  data_izolacji               DATE,
  organizm                    VARCHAR(100),
  data_zamrozenia             DATE,
  temperatura_przechowywania  FLOAT(10, 4),
  ilosc_komorek               INT(100),
  stezenie_RNA                FLOAT(10, 4),
  stezenie_DNA                FLOAT(10, 4),
  objetosc_tkanki             FLOAT(10, 4),
  sposob_utrwalenia           VARCHAR(300),
  obserwacje                  VARCHAR(300),
  rodzaj_probowki             VARCHAR(100),
  stezenie                    INT(100),
  objetosc_probki             FLOAT(10, 4),
  data_gwarancji              DATE,
  lokalizacja                 VARCHAR(100),
  material_biologiczny_typ_id INT,
  asortyment_id               INT,

  PRIMARY KEY (ID)
);


CREATE TABLE material_biologiczny_typ (
  ID    INT NOT NULL AUTO_INCREMENT,
  nazwa VARCHAR(100),

  PRIMARY KEY (ID)
);

-- ---------------------------------------------------------------------------------------------
-- dodawanie kluczy obcych

ALTER TABLE odczynnik        ADD FOREIGN KEY (asortyment_id) REFERENCES asortyment (ID);
ALTER TABLE odczynnik        ADD FOREIGN KEY (odczynnik_typ_id) REFERENCES odczynnik_typ (ID);
ALTER TABLE urzadzenie        ADD FOREIGN KEY (urzadzenie_typ_id) REFERENCES urzadzenie_typ (ID);
ALTER TABLE urzadzenie        ADD FOREIGN KEY (asortyment_id) REFERENCES asortyment (ID);
ALTER TABLE sprzet_jedn      ADD FOREIGN KEY (sprzet_jedn_typ_id) REFERENCES sprzet_jedn_typ (ID);
ALTER TABLE sprzet_jedn      ADD FOREIGN KEY (sprzet_jedn_podtyp_id) REFERENCES sprzet_jedn_podtyp (ID);
ALTER TABLE sprzet_jedn      ADD FOREIGN KEY (asortyment_id) REFERENCES asortyment (ID);
ALTER TABLE sprzet_jedn_podtyp    ADD FOREIGN KEY (sprzet_jedn_typ_id) REFERENCES sprzet_jedn_typ (ID);
ALTER TABLE material_biologiczny  ADD FOREIGN KEY (material_biologiczny_typ_id) REFERENCES material_biologiczny_typ (ID);
ALTER TABLE material_biologiczny  ADD FOREIGN KEY (asortyment_id) REFERENCES asortyment (ID);
ALTER TABLE notatki ADD FOREIGN KEY (user_id) REFERENCES users (ID);
ALTER TABLE notatki ADD FOREIGN KEY (user_email) REFERENCES users (email);

-- ---------------------------------------------------------------------------------------------
-- wypłenienie przykładowymi danymi

INSERT INTO asortyment VALUES (1, 'Odczynniki', 'Odczynniki');
INSERT INTO asortyment VALUES (2, 'Urządzenia', 'Urządzenia');


INSERT INTO odczynnik_typ VALUES (1, 'odczynniki chemiczne');
INSERT INTO odczynnik_typ VALUES (2, 'odczynniki biologiczne');


INSERT INTO urzadzenie_typ VALUES (1, 'komory laminarne', NULL);
INSERT INTO urzadzenie_typ VALUES (2, 'urządzenia pomiarowe', NULL);
INSERT INTO urzadzenie_typ VALUES (3, 'drobny sprzęt labolatoryjny', NULL);
INSERT INTO urzadzenie_typ VALUES (4, 'wirówki', 3);
INSERT INTO urzadzenie_typ VALUES (5, 'worteksy', 3);
INSERT INTO urzadzenie_typ VALUES (6, 'mieszadła', 3);
INSERT INTO urzadzenie_typ VALUES (7, 'pipetory', 3);


--  ID	nazwa					firma		nr. katalogowy	ilość		jednostka	m.mol.	d. ważności		cena		data dod.	lokal.	temp	odcz. typ id	asort. id
INSERT INTO odczynnik
VALUES (1, 'czterochlorek hafnu', 'YT', 'YT-3381', 5, 'g', 3, '2017-10-11', 82.05, NOW(), '', 25, 1, 1);
INSERT INTO odczynnik VALUES (2, 'anilina', 'PT', 'PT-1007', 15, 'ml', 9, '2016-09-23', 121.39, NOW(), '', 48, 2, 1);
INSERT INTO odczynnik
VALUES (3, 'nadmanganian sodu', 'SM', 'SM-3179', 48, 'ng', 2, '2016-11-05', 482.00, NOW(), '', 91, 1, 1);
INSERT INTO odczynnik
VALUES (4, 'nadmanganian litu', 'SB', 'SB-3041', 33, 'g', 11, '2019-01-22', 307.50, NOW(), '', 45, 1, 1);
INSERT INTO odczynnik
VALUES (5, 'diselenek węgla', 'DW', '50-0091', 5, 'g', 2, '2025-01-05', 188.00, NOW(), '', 199, 1, 1);


--  ID	nazwa							nr. kat.	data zak.	data wym. filtr.	gwarancja		lokalizacja		urz. typ. id	as. typ. id		ilosc
INSERT INTO urzadzenie VALUES (1, 'wirówka mała', 'WIR-001', NOW(), '2016-04-20', '2018-05-01', '', 4, 2, 3);
INSERT INTO urzadzenie VALUES (2, 'wirówka duża', 'WIR-021', NOW(), '2016-05-15', '2017-11-02', '', 4, 2, 5);
INSERT INTO urzadzenie VALUES (3, 'komora laminarna mała', 'KL-005', NOW(), '2019-05-15', '2022-11-02', '', 1, 2, 1);
INSERT INTO urzadzenie VALUES (4, 'komora laminarna średnia', 'KL-006', NOW(), '2019-05-15', '2022-11-02', '', 1, 2, 3);
INSERT INTO urzadzenie VALUES (5, 'komora laminarna duża', 'KL-007', NOW(), '2019-05-15', '2022-11-02', '', 1, 2, 15);
INSERT INTO urzadzenie VALUES (6, 'mieszadełko stalowe', 'MI-007', NOW(), NULL, '2016-11-02', '', 6, 2, 22);
INSERT INTO urzadzenie VALUES (7, 'mieszadełko aluminiowe', 'MI-017', NOW(), NULL, '2027-11-02', '', 6, 2, 0);
INSERT INTO urzadzenie VALUES (8, 'mieszadełko drewniane', 'MI-027', NOW(), NULL, '2020-11-02', '', 6, 2, 6);


INSERT INTO sprzet_jedn_typ VALUES (1, 'piepty');
INSERT INTO sprzet_jedn_typ VALUES (2, 'końcówki do pipet');
INSERT INTO sprzet_jedn_typ VALUES (3, 'butelki hodowlane');
INSERT INTO sprzet_jedn_typ VALUES (4, 'płytki wielodołkowe');
INSERT INTO sprzet_jedn_typ VALUES (5, 'szalki');
INSERT INTO sprzet_jedn_typ VALUES (6, 'probówki');


INSERT INTO sprzet_jedn_podtyp VALUES (1, 'automatyczne 0,2-2 µl', 1);
INSERT INTO sprzet_jedn_podtyp VALUES (2, 'automatyczne 0,5-10 µl', 1);
INSERT INTO sprzet_jedn_podtyp VALUES (3, 'automatyczne 10-50 µl', 1);
INSERT INTO sprzet_jedn_podtyp VALUES (4, 'automatyczne 20-200 µl', 1);
INSERT INTO sprzet_jedn_podtyp VALUES (5, 'automatyczne 100-1000 µl', 1);
INSERT INTO sprzet_jedn_podtyp VALUES (6, 'automatyczne wielokanałowe', 1);
INSERT INTO sprzet_jedn_podtyp VALUES (7, 'serologiczne 1 ml', 1);
INSERT INTO sprzet_jedn_podtyp VALUES (8, 'serologiczne 2 ml', 1);
INSERT INTO sprzet_jedn_podtyp VALUES (9, 'serologiczne 5 ml', 1);
INSERT INTO sprzet_jedn_podtyp VALUES (10, 'serologiczne 10 ml', 1);
INSERT INTO sprzet_jedn_podtyp VALUES (11, 'serologiczne 25 ml', 1);
INSERT INTO sprzet_jedn_podtyp VALUES (12, 'serologiczne 50 ml', 1);
INSERT INTO sprzet_jedn_podtyp VALUES (13, 'jednomiarowe', 1);
INSERT INTO sprzet_jedn_podtyp VALUES (14, 'Pasteura', 1);

INSERT INTO sprzet_jedn_podtyp VALUES (15, 'do 20 µl', 2);
INSERT INTO sprzet_jedn_podtyp VALUES (16, 'do 200 µl', 2);
INSERT INTO sprzet_jedn_podtyp VALUES (17, 'do 1000 µl', 2);

INSERT INTO sprzet_jedn_podtyp VALUES (18, '25 cm2', 3);
INSERT INTO sprzet_jedn_podtyp VALUES (19, '75 cm2', 3);
INSERT INTO sprzet_jedn_podtyp VALUES (20, '225 cm2', 3);

INSERT INTO sprzet_jedn_podtyp VALUES (21, '6-dołkowe', 4);
INSERT INTO sprzet_jedn_podtyp VALUES (22, '12-dołkowe', 4);
INSERT INTO sprzet_jedn_podtyp VALUES (23, '24-dołkowe', 4);
INSERT INTO sprzet_jedn_podtyp VALUES (24, '48-dołkowe', 4);
INSERT INTO sprzet_jedn_podtyp VALUES (25, '96-dołkowe', 4);
INSERT INTO sprzet_jedn_podtyp VALUES (26, '384-dołkowe', 4);
INSERT INTO sprzet_jedn_podtyp VALUES (27, '1536-dołkowe', 4);

INSERT INTO sprzet_jedn_podtyp VALUES (28, '35mm', 5);
INSERT INTO sprzet_jedn_podtyp VALUES (29, '60mm', 5);
INSERT INTO sprzet_jedn_podtyp VALUES (30, '100mm', 5);
INSERT INTO sprzet_jedn_podtyp VALUES (31, '150mm', 5);

INSERT INTO sprzet_jedn_podtyp VALUES (32, 'Eppendorf 200 µl', 6);
INSERT INTO sprzet_jedn_podtyp VALUES (33, 'Eppendorf 1,5 ml', 6);
INSERT INTO sprzet_jedn_podtyp VALUES (34, 'Eppendorf 2 ml', 6);
INSERT INTO sprzet_jedn_podtyp VALUES (35, 'flakony 15 ml', 6);
INSERT INTO sprzet_jedn_podtyp VALUES (36, 'flakony 50 ml', 6);
INSERT INTO sprzet_jedn_podtyp VALUES (37, 'z zamknięciem dwupozycyjnym 5 ml', 6);
INSERT INTO sprzet_jedn_podtyp VALUES (38, 'z zamknięciem dwupozycyjnym 13 ml', 6);
INSERT INTO sprzet_jedn_podtyp VALUES (39, 'do zamrażania', 6);


--     ID	nazwa			firma			nr. kat		pojemnosc	kalibracja	dat. nap.	opis nap.	dat. zak.	datwym. filtr	gwarancja					lok.	typ		podtyp 	 as. ilosc	cena
INSERT INTO sprzet_jedn
VALUES (1, 'Sprzęt 1', 'Firma 1', 'NR-001', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 15 MONTH, '', 1, 1, 2, 3, 4);
INSERT INTO sprzet_jedn VALUES
  (2, 'Sprzęt 2', 'Firma 1', 'NR-002', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 10 MONTH, '', 1, 2, 2, 5, 11);
INSERT INTO sprzet_jedn VALUES
  (3, 'Sprzęt 3', 'Firma 1', 'NR-003', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 10 MONTH, '', 1, 3, 2, 7, 12);
INSERT INTO sprzet_jedn VALUES
  (4, 'Sprzęt 4', 'Firma 1', 'NR-004', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 10 MONTH, '', 1, 4, 2, 11, 20);
INSERT INTO sprzet_jedn VALUES
  (5, 'Sprzęt 5', 'Firma 1', 'NR-005', 50, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 5 MONTH, '', 1, 5, 2, 12, 25);
INSERT INTO sprzet_jedn VALUES
  (6, 'Sprzęt 6', 'Firma 2', 'NR-006', 22, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 5 MONTH, '', 1, 6, 2, 55, 30);
INSERT INTO sprzet_jedn
VALUES (7, 'Sprzęt 7', 'Firma 2', 'NR-007', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 5 MONTH, '', 1, 7, 2, 5, 21);
INSERT INTO sprzet_jedn VALUES
  (8, 'Sprzęt 8', 'Firma 2', 'NR-008', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 5 MONTH, '', 1, 8, 2, 91, 12);
INSERT INTO sprzet_jedn VALUES
  (9, 'Sprzęt 9', 'Firma 2', 'NR-009', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 5 MONTH, '', 1, 9, 2, 25, 55);
INSERT INTO sprzet_jedn VALUES
  (10, 'Sprzęt 10', 'Firma 3', 'NR-010', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 5 MONTH, '', 1, 10, 2, 15, 12);
INSERT INTO sprzet_jedn VALUES
  (11, 'Sprzęt 11', 'Firma 3', 'NR-011', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 7 MONTH, '', 1, 11, 2, 33, 22);
INSERT INTO sprzet_jedn VALUES
  (12, 'Sprzęt 12', 'Firma 4', 'NR-012', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 22 MONTH, '', 1, 12, 2, 12, 44);
INSERT INTO sprzet_jedn VALUES
  (13, 'Sprzęt 13', 'Firma 5', 'NR-013', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 2 MONTH, '', 1, 13, 2, 24, 31);
INSERT INTO sprzet_jedn VALUES
  (14, 'Sprzęt 14', 'Firma 5', 'NR-014', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 22 MONTH, '', 1, 14, 2, 42, 20);

INSERT INTO sprzet_jedn VALUES
  (15, 'Sprzęt 15', 'Firma 5', 'NR-015', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 22 MONTH, '', 2, 15, 2, 24, 22);
INSERT INTO sprzet_jedn VALUES
  (16, 'Sprzęt 16', 'Firma 5', 'NR-016', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 11 MONTH, '', 2, 16, 2, 1, 12);
INSERT INTO sprzet_jedn VALUES
  (17, 'Sprzęt 17', 'Firma 5', 'NR-017', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 24 MONTH, '', 2, 17, 2, 5, 42);

INSERT INTO sprzet_jedn VALUES
  (18, 'Sprzęt 18', 'Firma 6', 'NR-018', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 22 MONTH, '', 3, 18, 2, 5, 21);
INSERT INTO sprzet_jedn VALUES
  (19, 'Sprzęt 19', 'Firma 7', 'NR-019', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 22 MONTH, '', 3, 19, 2, 12, 21);
INSERT INTO sprzet_jedn VALUES
  (20, 'Sprzęt 20', 'Firma 7', 'NR-020', 30, 0, NULL, '', NOW(), NULL, NOW() + INTERVAL 22 MONTH, '', 3, 20, 2, 2, 42);


INSERT INTO material_biologiczny_typ VALUES (1, 'hodowlany');
INSERT INTO material_biologiczny_typ VALUES (2, 'zamrożony');
INSERT INTO material_biologiczny_typ VALUES (3, 'ultrwalony');

INSERT INTO material_biologiczny VALUES
  (1, 'Komórka 1', 'Tkanka 1', 'Firma 1', NOW(), NOW() - INTERVAL 2 DAY, 'Organizm', NOW() - INTERVAL 5 DAY, 30, 15, 50,
    90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 1, 1);
INSERT INTO material_biologiczny VALUES
  (2, 'Komórka 2', 'Tkanka 1', 'Firma 1', NOW(), NOW() - INTERVAL 5 DAY, 'Organizm', NOW() - INTERVAL 4 DAY, 30, 15, 50,
    90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 1, 1);
INSERT INTO material_biologiczny VALUES
  (3, 'Komórka 3', 'Tkanka 1', 'Firma 1', NOW(), NOW() - INTERVAL 3 DAY, 'Organizm', NOW() - INTERVAL 2 DAY, 30, 15, 50,
    90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 1, 1);
INSERT INTO material_biologiczny VALUES
  (4, 'Komórka 4', 'Tkanka 1', 'Firma 2', NOW(), NOW() - INTERVAL 3 DAY, 'Organizm', NOW() - INTERVAL 5 DAY, 30, 15, 50,
    90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 1, 1);
INSERT INTO material_biologiczny VALUES
  (5, 'Komórka 5', 'Tkanka 2', 'Firma 2', NOW(), NOW() - INTERVAL 7 DAY, 'Organizm', NOW() - INTERVAL 16 DAY, 30, 15,
      50, 90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 1, 1);
INSERT INTO material_biologiczny VALUES
  (6, 'Komórka 6', 'Tkanka 2', 'Firma 2', NOW(), NOW() - INTERVAL 3 DAY, 'Organizm', NOW() - INTERVAL 5 DAY, 30, 15, 50,
    90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 2, 1);
INSERT INTO material_biologiczny VALUES
  (7, 'Komórka 7', 'Tkanka 2', 'Firma 2', NOW(), NOW() - INTERVAL 5 DAY, 'Organizm', NOW() - INTERVAL 6 DAY, 30, 15, 50,
    90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 2, 1);
INSERT INTO material_biologiczny VALUES
  (8, 'Komórka 8', 'Tkanka 2', 'Firma 2', NOW(), NOW() - INTERVAL 6 DAY, 'Organizm', NOW() - INTERVAL 5 DAY, 30, 15, 50,
    90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 2, 1);
INSERT INTO material_biologiczny VALUES
  (9, 'Komórka 9', 'Tkanka 2', 'Firma 3', NOW(), NOW() - INTERVAL 4 DAY, 'Organizm', NOW() - INTERVAL 7 DAY, 30, 15, 50,
    90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 2, 1);
INSERT INTO material_biologiczny VALUES
  (10, 'Komórka 10', 'Tkanka 3', 'Firma 4', NOW(), NOW() - INTERVAL 5 DAY, 'Organizm', NOW() - INTERVAL 8 DAY, 30, 15,
       50, 90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 2, 1);
INSERT INTO material_biologiczny VALUES
  (11, 'Komórka 11', 'Tkanka 3', 'Firma 4', NOW(), NOW() - INTERVAL 2 DAY, 'Organizm', NOW() - INTERVAL 5 DAY, 30, 15,
       50, 90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 2, 1);
INSERT INTO material_biologiczny VALUES
  (12, 'Komórka 12', 'Tkanka 3', 'Firma 5', NOW(), NOW() - INTERVAL 3 DAY, 'Organizm', NOW() - INTERVAL 3 DAY, 30, 15,
       50, 90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 3, 1);
INSERT INTO material_biologiczny VALUES
  (13, 'Komórka 13', 'Tkanka 3', 'Firma 5', NOW(), NOW() - INTERVAL 2 DAY, 'Organizm', NOW() - INTERVAL 2 DAY, 30, 15,
       50, 90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 3, 1);
INSERT INTO material_biologiczny VALUES
  (14, 'Komórka 14', 'Tkanka 4', 'Firma 6', NOW(), NOW() - INTERVAL 2 DAY, 'Organizm', NOW() - INTERVAL 4 DAY, 30, 15,
       50, 90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 3, 1);
INSERT INTO material_biologiczny VALUES
  (15, 'Komórka 15', 'Tkanka 5', 'Firma 7', NOW(), NOW() - INTERVAL 8 DAY, 'Organizm', NOW() - INTERVAL 7 DAY, 30, 15,
       50, 90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 3, 1);
INSERT INTO material_biologiczny VALUES
  (16, 'Komórka 16', 'Tkanka 6', 'Firma 7', NOW(), NOW() - INTERVAL 2 DAY, 'Organizm', NOW() - INTERVAL 25 DAY, 30, 15,
       50, 90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 3, 1);
INSERT INTO material_biologiczny VALUES
  (17, 'Komórka 17', 'Tkanka 6', 'Firma 8', NOW(), NOW() - INTERVAL 2 DAY, 'Organizm', NOW() - INTERVAL 2 DAY, 30, 15,
       50, 90, 100, 'sposób utrwalania', 'obserwacje', 'probówka', 21, 15, NOW() + INTERVAL 15 MONTH, '', 3, 1);


-- ---------------------------------------------------------------------------------------------
-- tworzenie procedur
