`

CREATE DATABASE IF NOT EXISTS `dbtarea` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbtarea`;

DROP PROCEDURE IF EXISTS `Geteditorials`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Geteditorials` ()  NO SQL
Select editorial.CodigoEd , editorial.NombreEd
from editorial$$

DROP PROCEDURE IF EXISTS `GetLibros`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetLibros` ()  READS SQL DATA
Select  libros.ID, libros.Nombre, libros.Autor, libros.Precio, editorial.NombreEd
from libros
join editorial on editorial.CodigoEd = libros.Editorial$$

DROP PROCEDURE IF EXISTS `increaseby10`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `increaseby10` (IN `Id_Edit` INT)  NO SQL
Update libros
set libros.Precio =  libros.Precio + libros.Precio*0.10
where libros.Editorial =Id_Edit$$

DROP PROCEDURE IF EXISTS `Increasebyany`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Increasebyany` (IN `ID_edit` INT, IN `aumento` INT)  NO SQL
Update libros
set libros.Precio =  libros.Precio + libros.Precio*(aumento/100)
where libros.Editorial = ID_edit$$

DELIMITER ;



DROP TABLE IF EXISTS `editorial`;
CREATE TABLE `editorial` (
  `CodigoEd` int(11) NOT NULL,
  `NombreEd` varchar(20) NOT NULL,
  `Descript` varchar(20) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `editorial` (`CodigoEd`, `NombreEd`, `Descript`, `Fecha`) VALUES
(1, 'Santillana', 'Editorial Santillana', '2018-11-20'),
(2, 'Uned', 'Editorial Uned', '2018-11-12');



DROP TABLE IF EXISTS `libros`;
CREATE TABLE `libros` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Autor` varchar(20) NOT NULL,
  `Editorial` int(25) NOT NULL,
  `Precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `libros` (`ID`, `Nombre`, `Autor`, `Editorial`, `Precio`) VALUES
(1, 'Libro1', 'Pedro Castro', 1, '1112464'),
(2, 'Libro2', 'Carlos Rodriguez', 2, '454334');


ALTER TABLE `editorial`
  ADD PRIMARY KEY (`CodigoEd`);


ALTER TABLE `libros`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_editorial` (`Editorial`);




ALTER TABLE `libros`
  ADD CONSTRAINT `FK_editorial` FOREIGN KEY (`Editorial`) REFERENCES `editorial` (`CodigoEd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
