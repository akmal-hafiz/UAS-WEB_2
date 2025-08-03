-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2025 at 08:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kacamata`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `deskripsi`, `gambar`, `stok`, `kategori`) VALUES
(6, ' RAYBAN KIO BIO-BASED', 1000000, 'Ray-Ban Kai Bio-Based are a stylish choice for those looking to make a positive impact. The metal frame in pale gold adds a touch of elegance, while the solid dark grey lenses provide 100% UV protection. These oval-shaped sunglasses are perfect for any occasion, whether you hitting the beach or strolling through the city.', 'KIO BIO-BASED.avif', 3, 'sunglasses'),
(8, 'RAY-BAN CLUBMASTER', 1800000, 'You dont have to compromise on style. Every lens is etched with the logo and is available in different thicknesses.', 'RAYBAN CLUBMASTER.avif', 4, 'eyeglasses'),
(9, 'RAY-BAN AVIATOR', 800000, 'You dont have to compromise on style. Every lens is etched with the logo and is available in different thicknesses.', 'AVIATOR.avif', 3, 'eyeglasses'),
(10, 'OAKLEY SLASH', 3000000, 'Slash your permission to push past any limits. The result of decades of research with athletes, Sphaera Slash was designed with an alternative slash lens shape to help reduce cheek crash, and optimizes sport performance through a wide field of view and lightweight O Matter™ frame', 'oakley Slash.avif', 1, 'sport'),
(11, 'OAKLEY RESISTOR ', 1000000, 'The future looks brighter than ever in Resistor Sweep, a sunglass built specifically for youth from fit to function. Inspired by the popular Sutro Lite Sweep, Resistor Sweep features a swept lens design and shape that adds a modern twist to retro Oakley® attitude. ', 'OAKLEY RESISTOR SWEEP.avif', 2, 'sport'),
(12, 'OAKLEY FROGSKINS', 1000000, 'while a classic Oakley Factory Pilot logo gives a nod to the glory days and lets you be you. For enhanced color and contrast everywhere you go, Prizm™ Lens Technology provides the details.', 'Oakley Frogskins sunglasses - Black.jpg', 2, 'sport'),
(13, 'MEGA WAYFAYER', 1000000, 'while a classic Oakley Factory Pilot logo gives a nod to the glory days and lets you be you. For enhanced color and contrast everywhere you go, Prizm™ Lens Technology provides the details.', 'MEGA WAYFAYER.avif', 1, 'sunglasses'),
(14, 'Redux Eye Jacket', 1000000, 'while a classic Oakley Factory Pilot logo gives a nod to the glory days and lets you be you. For enhanced color and contrast everywhere you go, Prizm™ Lens Technology provides the details.', 'redux.avif', 1, 'sunglasses');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'akmal', 'akmal@gmail.com', '$2y$10$P2OAzQEEZUar8AWfS9c/..AackKBD50VUXKVVTHGKswPYlb4sHiLy', 'admin', '2025-08-03 14:28:28'),
(2, 'mahda@gmail.com', 'mahda@gmail.com', '$2y$10$Kk01HcgNEP3AiOT7Tnrzyu1r5w.qSt.e7TIjNuynYZh7KQHmfwNmK', 'user', '2025-08-03 14:45:03'),
(3, 'baymax', 'baymax@gmail.com', '$2y$10$nH1wl5Q7MPJfJTHDxBPOm.jL28G7Ua8hMH/KtKXQ4FzbUfWunrLyq', 'user', '2025-08-03 15:00:55'),
(4, 'hafiz', 'hafiz@gmail.com', '$2y$10$gRRfDc/rmPuN9/skhcUxGOOAgYKU5fWJUtX6iTQBHeIxlTBcFej/W', 'user', '2025-08-03 23:51:13'),
(5, 'flacko', 'flacko@gmail.com', '$2y$10$kYbVZUvuVmWpIQjFEvwEBO69GiFDWBteXUlBEgBBuYn6SJkcw3.P6', 'user', '2025-08-04 00:11:12'),
(6, 'kucing', 'kucing@gmail.com', '$2y$10$Hbni3KDNk75S6MbUnvVkjeh.1XSp9XZ/ScL9.GCQqYGCVXuu7H7b2', 'user', '2025-08-04 00:23:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
