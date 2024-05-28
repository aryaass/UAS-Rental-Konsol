-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 05:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `consoles`
--

CREATE TABLE `consoles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image_link` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consoles`
--

INSERT INTO `consoles` (`id`, `name`, `price`, `stock`, `image_link`, `description`) VALUES
(1, 'PlayStation 5', 100000, 11, 'consoles/PS5.png', 'The PS5, along with Microsoft\'s Xbox Series X and Series S consoles, released the same month, are part of the ninth generation of video game consoles. '),
(2, 'PlayStation 4', 75000, 15, 'consoles/PS4.png', 'The PS4 competes with Microsoft\'s Xbox One, Nintendo\'s Wii U and the Switch. '),
(3, 'PlayStation 3', 50000, 21, 'consoles/PS3.png', 'The PS3 is a home video game console developed by Sony Computer Entertainment. It is the successor to PlayStation 2, and is part of the PlayStation brand of consoles.'),
(4, 'XBox', 90000, 18, 'consoles/XBOX.png', 'The Xbox is a home video game console and the first installment in the Xbox series of video game consoles manufactured by Microsoft.'),
(5, 'Nintendo Switch', 80000, 22, 'consoles/Switch.png', 'The Nintendo Switch itself is a tablet that can either be docked for use as a home console or used as a portable device, making it a hybrid console.'),
(6, 'Nintendo Wii', 75000, 18, 'consoles/Wii.png', 'It is Nintendo\'s fifth major home game console, following the GameCube, and is a seventh generation home console alongside Microsoft\'s Xbox 360 and Sony\'s PlayStation 3. '),
(7, 'PS Vita', 65000, 12, 'consoles/PS Vita.png', 'The PlayStation Vita (PS Vita or Vita) is a handheld video game console developed and marketed by Sony Computer Entertainment. It was first released in Japan on December 17, 2011'),
(10, 'God of War 4 : Ragnarog', 35000, 24, 'consoles/GoW 4.png', 'Exclusive games made by Sony from 2018'),
(16, 'AC Valhalla', 40000, 36, 'consoles/AC Valhalla.jpg', 'Assassin\'s Creed Valhalla is a 2020 action role-playing video game developed by Ubisoft Montreal and published by Ubisoft');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `consoles` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `consoles`, `duration`, `status`, `total_price`, `date`) VALUES
(1, 3, '1_10_6_3', 3, 'Selesai', 260000, '2021-05-30'),
(2, 3, '1_5_3_6_10', 3, 'Selesai', 340000, '2021-06-01'),
(5, 3, '1_2_3_4_5_6_7_10', 1, 'Selesai', 570000, '2021-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `phone_number`, `address`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin1234', '123456789', 'Just in case forget password hehehe'),
(2, 'admin', 'admin', 'admin@gmail.com', 'c93ccd78b2076528346216b3b2f701e6', '0123456789', 'Real admin always hidden'),
(3, 'customer', 'Norbertus', 'norbertus@gmail.com', '360d66d9c87f4a651007bfd6c043fbac', '789545123', 'On Earth 51'),
(6, 'customer', '112', '12@gmail.com', '7f2ababa423061c509f4923dd04b6cf1', '12', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consoles`
--
ALTER TABLE `consoles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consoles`
--
ALTER TABLE `consoles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
