SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE pdvb.Director (
  id int(11) NOT NULL,
  user varchar(20) NOT NULL,
  password varchar(250) NOT NULL
) 
ENGINE=InnoDB 
DEFAULT CHARSET=utf8;


INSERT INTO pdvb.Director (id, user, password) VALUES
(1, 'pdvb', 'f45baf7ba713fc7a933be0a5bfc65a521d3e1304');

/*Create Table Acampante*/
CREATE TABLE pdvb.Acampante (
	id INT auto_increment NOT NULL PRIMARY KEY,
	Correo varchar(100) NOT NULL,
	Nombres varchar(100) NOT NULL,
	Apellidos varchar(100) NOT NULL,
	Edad INT NOT NULL,
	Sexo varchar(10) NOT NULL,
	Codigo_Pais varchar(10) NOT NULL,
	Celular INT NOT NULL,
	Pais varchar(100) NOT NULL,
	Ciudad varchar(100) NOT NULL,
	Asiste_Iglesia BOOL DEFAULT FALSE NOT NULL,
	Nombre_Iglesia varchar(100),
	Id_Taller INT,
	Color varchar(100),
	Numero_Cuarto INT,
	Usuario varchar(100) NOT NULL,
	Contrasena varchar(250) NOT NULL,
	Fecha_Registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP

)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_spanish_ci;

/*Create Table Taller*/
CREATE TABLE pdvb.Talleres (
	id INT auto_increment NOT NULL PRIMARY KEY,
	Taller varchar(100) NOT NULL,
	Inscritos INT DEFAULT 0 NOT NULL,
	Edad_Min INT DEFAULT 0 NOT NULL,
	Edad_Max INT DEFAULT 0 NOT NULL,
	Disponible BOOL DEFAULT FALSE NOT NULL,
	Link_Zoom varchar(500),
	Fecha_Creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP

)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_spanish_ci;

INSERT INTO pdvb.Talleres
(Taller, Inscritos, Edad_Min, Edad_Max, Disponible, Link_Zoom, Fecha_Creacion) VALUES
('Conductas Auto destructivas (Adicciones)', 0, 11, 18, 1, '', CURRENT_TIMESTAMP),
('La lucha en tu interior (Ansiedad)', 0, 19, 36, 1, '', CURRENT_TIMESTAMP);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
