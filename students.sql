SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `idnumber` int NOT NULL,
  `career` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `students` (`name`, `lastName`,`idNumber`, `career`) VALUES
('Oscar', 'Murillo','14523', 'Artes');

CREATE TABLE `course`(
  `id-course` int NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  `mean` int NOT NULL,
  `semester` int NOT NULL,
  `projects` varchar(255) NOT NULL,
  `id_student` int NOT NULL,
  PRIMARY KEY (`id-course`),
  KEY `relation` (`id_student`),
  CONSTRAINT `relation` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `course` (`course`, `mean`,`semester`, `projects`, `id_student` ) VALUES
('Filosofia','8', '2', 'Tarea', 1);



