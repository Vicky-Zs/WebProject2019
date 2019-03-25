CREATE TABLE classes (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(32) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO classes (id, name) VALUES
(1, 'L2 MIASHS');

CREATE TABLE students (
  id int(11) NOT NULL AUTO_INCREMENT,
  lastname varchar(32) NOT NULL,
  firstname varchar(32) NOT NULL,
  photo varchar(16),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO students (id, lastname, firstname, photo) VALUES
(1, 'Ait Hsaine', 'Myriam', 'aithsain1u.jpg'),
(2, 'Arnould', 'Maxime', 'arnould78u.jpg'),
(3, 'Beirao', 'Camille', 'beirao1u.jpg'),
(4, 'Beloual', 'Mehdi', 'beloual2u.jpg'),
(5, 'Bouche', 'Valentine', 'bouche19u.jpg'),
(6, 'Bouvin', 'Alexis', 'bouvin4u.jpg'),
(7, 'Broche', 'Cameron', 'broche2u.jpg'),
(8, 'Callonego', 'Colleen', 'calloneg1u.jpg'),
(9, 'Carbonnier', 'Nicolas', 'carbonni1u.jpg'),
(10, 'Chabbert', 'Benjamin', 'chabbert4u.jpg'),
(11, 'Cholley', 'Wendie', 'cholley17u.jpg'),
(12, 'Claudin', 'Lou', 'claudin6u.jpg'),
(13, 'Cossin', 'Alain', 'cossin8u.jpg'),
(14, 'Couroux', 'Gabriel', 'couroux1u.jpg'),
(15, 'Darrou', 'Cedric', 'darrou2u.jpg'),
(16, 'Drouot', 'Vincent', 'drouot27u.jpg'),
(17, 'Dumont', 'Lucille', 'dumont57u.jpg'),
(18, 'Dupont', 'Felix', 'dupont115u.jpg'),
(19, 'Gaborit', 'Florian', 'gaborit3u.jpg'),
(20, 'Garni', 'Tristan', 'garni3u.jpg'),
(21, 'Hadj Messaoud', 'Yousra', 'hadjmess1u.jpg'),
(22, 'Halgue', 'Scott', 'halgue1u.jpg'),
(23, 'Herbin', 'Aurelien', 'herbin11u.jpg'),
(24, 'Husson', 'Gael', 'husson71u.jpg'),
(25, 'Klein', 'Dylan', 'klein214u.jpg'),
(26, 'Koch', 'Anne-Sophie', 'koch68u.jpg'),
(27, 'Lacour', 'Emilien', 'lacour43u.jpg'),
(28, 'Laprevote', 'Anne', 'laprevot6u.jpg'),
(29, 'Lefebvre', 'Manon', 'lefebvr87u.jpg'),
(30, 'Louis', 'Cécile', 'louis147u.jpg'),
(31, 'Macalou', 'Mariam', 'macalou4u.jpg'),
(32, 'Mananjara', 'Linah Chilande', 'mananjar2u.jpg'),
(33, 'Meligner', 'Ludovic', 'meligner3u.jpg'),
(34, 'Melz', 'Kenny', 'melz1u.jpg'),
(35, 'Merchat', 'Valentin', 'merchat1u.jpg'),
(36, 'Minger', 'Nathan', 'minger3u.jpg'),
(37, 'Nabid', 'Rayane', 'nabid1u.jpg'),
(38, 'Pailler', 'Morgane', 'pailler5u.jpg'),
(39, 'Palin', 'Theo-Michel', 'palin4u.jpg'),
(40, 'Perrot', 'Elise', 'perrot28u.jpg'),
(41, 'Petitjean', 'Nicolas', 'petitj116u.jpg'),
(42, 'Picard', 'Jeremy', 'picard85u.jpg'),
(43, 'Pierrat', 'Charly', 'pierrat55u.jpg'),
(44, 'Pintore', 'Angeline', 'pintore6u.jpg'),
(45, 'Pitault', 'Jeremy', 'pitault3u.jpg'),
(46, 'Plaut', 'Grégoire', 'plaut2u.jpg'),
(47, 'Point', 'Laure', 'point1u.jpg'),
(48, 'Ramorino', 'Eva', 'ramorino2u.jpg'),
(49, 'Rchidi', 'Souha', 'rchidi1u.jpg'),
(50, 'Ribeyre', 'Virgil', 'ribeyre6u.jpg'),
(51, 'Ruhland', 'Chloe', 'ruhland5u.jpg'),
(52, 'Scheffmann', 'Tom', 'scheffma4u.jpg'),
(53, 'Sohbi', 'Elias', 'sohbi2u.jpg'),
(54, 'Soquet', 'Chloe', 'soquet1u.jpg'),
(55, 'Tardot', 'William', 'tardot1u.jpg'),
(56, 'Valoti', 'Matteo', 'valoti1u.jpg'),
(57, 'Watelet', 'Manon', 'watelet4u.jpg'),
(58, 'Wysocki', 'Tom', 'wysocki3u.jpg'),
(59, 'Zahm', 'Florian', 'zahm8u.jpg'),
(60, 'Zlatkov', 'Mickael', 'zlatkov1u.jpg');

CREATE TABLE studentsclasses (
  student_id int(11) NOT NULL,
  class_id int(11) NOT NULL,
  PRIMARY KEY (student_id, class_id),
  FOREIGN KEY (student_id) REFERENCES students (id),
  FOREIGN KEY (class_id) REFERENCES classes (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO studentsclasses (student_id, class_id) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1);

CREATE TABLE teachers (
  id int(11) NOT NULL AUTO_INCREMENT,
  login varchar(32) NOT NULL,
  lastname varchar(32) NOT NULL,
  firstname varchar(32) NOT NULL,
  email varchar(32) CHARACTER SET ascii NOT NULL,
  password char(96) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO teachers (id, login, lastname, firstname, email, password) VALUES
(1, 'bonnin', 'Bonnin', 'Geoffray', 'bonnin@loria.fr', 'patate');

CREATE TABLE teachersclasses (
  teacher_id int(11) NOT NULL,
  class_id int(11) NOT NULL,
  PRIMARY KEY (teacher_id, class_id),
  FOREIGN KEY (teacher_id) REFERENCES teachers (id),
  FOREIGN KEY (class_id) REFERENCES classes (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO teachersclasses (teacher_id, class_id) VALUES (1, 1);