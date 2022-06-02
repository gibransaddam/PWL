SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `domisili` varchar(30) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `kontak` (`id`, `nama`, `nim`, `domisili`) VALUES
(1, 'Iman K', 'duhaweb@gmail.com', '081391225070'),
(3, 'Arif', 'arif@gmail.com', '081324567709'),
(4, 'Andi', 'andi@gmail.com', '083274355769');


ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
