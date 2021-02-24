-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2021 at 09:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `School`
--

-- --------------------------------------------------------

--
-- Table structure for table `AcceptedFiles`
--

CREATE TABLE `AcceptedFiles` (
  `course` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path11` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path12` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path13` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path14` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path15` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `AcceptedFiles`
--

INSERT INTO `AcceptedFiles` (`course`, `path1`, `path2`, `path3`, `path4`, `path5`, `path6`, `path7`, `path8`, `path9`, `path10`, `path11`, `path12`, `path13`, `path14`, `path15`, `created_at`, `updated_at`) VALUES
('electrical', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('logic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('mathematic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `GivenCourses`
--

CREATE TABLE `GivenCourses` (
  `teacherid` bigint(20) UNSIGNED NOT NULL,
  `course` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path1` int(10) DEFAULT NULL,
  `path2` int(10) DEFAULT NULL,
  `path3` int(10) DEFAULT NULL,
  `path4` int(10) DEFAULT NULL,
  `path5` int(10) DEFAULT NULL,
  `path6` int(10) DEFAULT NULL,
  `path7` int(10) DEFAULT NULL,
  `path8` int(10) DEFAULT NULL,
  `path9` int(10) DEFAULT NULL,
  `path10` int(10) DEFAULT NULL,
  `path11` int(10) DEFAULT NULL,
  `path12` int(10) DEFAULT NULL,
  `path13` int(10) DEFAULT NULL,
  `path14` int(10) DEFAULT NULL,
  `path15` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `GivenCourses`
--

INSERT INTO `GivenCourses` (`teacherid`, `course`, `year`, `path1`, `path2`, `path3`, `path4`, `path5`, `path6`, `path7`, `path8`, `path9`, `path10`, `path11`, `path12`, `path13`, `path14`, `path15`, `created_at`, `updated_at`) VALUES
(1, 'mathematic', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'electrical', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'logic', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `HomeworkSize`
--

CREATE TABLE `HomeworkSize` (
  `course` varchar(40) NOT NULL,
  `path1` int(3) DEFAULT NULL,
  `path2` int(3) DEFAULT NULL,
  `path3` int(3) DEFAULT NULL,
  `path4` int(3) DEFAULT NULL,
  `path5` int(3) DEFAULT NULL,
  `path6` int(3) DEFAULT NULL,
  `path7` int(3) DEFAULT NULL,
  `path8` int(3) DEFAULT NULL,
  `path9` int(3) DEFAULT NULL,
  `path10` int(3) DEFAULT NULL,
  `path11` int(3) DEFAULT NULL,
  `path12` int(3) DEFAULT NULL,
  `path13` int(3) DEFAULT NULL,
  `path14` int(3) DEFAULT NULL,
  `path15` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `HomeworkSize`
--

INSERT INTO `HomeworkSize` (`course`, `path1`, `path2`, `path3`, `path4`, `path5`, `path6`, `path7`, `path8`, `path9`, `path10`, `path11`, `path12`, `path13`, `path14`, `path15`) VALUES
('electrical', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('mathematic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('logic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE `Students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`id`, `name`, `password`, `email`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'zaDtVVFYVJ', '$2y$10$bLW7dEljdkYfHGZ9mERovOiXGmrZuzPso8/z1Wvu0kTbU4t/nMezS', '1TeEKK3U6m@gmail.com', 'Student', NULL, NULL, NULL),
(2, 'NwkikqsiTH', '$2y$10$zn7Z1CQtFVJ7Bhrq.knoWeFLDGXEhYN0/5d3TcAmZC5OaGpWGQAd.', 'fQ9slEu35T@gmail.com', 'Student', NULL, NULL, NULL),
(3, 'K8MoXNi7BR', '$2y$10$ZetAF1sRDDyZ8JwLe/8kxudrr12zVBhnWZW9gWSBOKe4lF0Tmyljq', 'Q2oITB6UzV@gmail.com', 'Student', NULL, NULL, NULL),
(4, '2BrFPmi5SD', '$2y$10$zMHlXnp7qP3gkzxmNOj3Neaq5mJHWOqpWt.j7rOowFxALGxvNb.PS', 'MOK8HipW3Q@gmail.com', 'Student', NULL, NULL, NULL),
(5, 'ovKW7GyTcA', '$2y$10$ZltZCNk7rGTGhIsahl2OsOV..McESy7A.HDUoTGm9bzrZCwH2mBAG', 'FaHY4SodPS@gmail.com', 'Student', NULL, NULL, NULL),
(6, 'k3hNYnT3ln', '$2y$10$f/KncV8Vq73Yp2fPseH/M.vQczNbheTDSacEsUj7pE62FB7tZcWf.', 'Rti3NELM8i@gmail.com', 'Student', NULL, NULL, NULL),
(7, 'fxuUXMkqWx', '$2y$10$ew35uOxJp5YEka79uUUc7uQfJYx48vXlOlEsurXaflGWVE2JgM6R6', 'rDwacAR3Hi@gmail.com', 'Student', NULL, NULL, NULL),
(8, 'hOLxMDFy78', '$2y$10$bjyGymlFyiiJxSxYN2l52.fl5yWAGarfAop5XraF6YGyjDzk.951O', 'wt3UrR8t6T@gmail.com', 'Student', NULL, NULL, NULL),
(9, 'uxYxWLURk9', '$2y$10$54rDadp5Q89GadexTlkea.Hotke.rnpgfmH5rYGj8AQqKDWxJqIJq', 'pHA4x5riHY@gmail.com', 'Student', NULL, NULL, NULL),
(10, 'RjwePGwG5k', '$2y$10$K.mnvhj.RkSkZ67ma.C/Su8x5/GjQZo18ei5LdgeipHRlqcq/3Zsi', '1EeC7FCNod@gmail.com', 'Student', NULL, NULL, NULL),
(11, 'DynhsrgWYV', '$2y$10$Zqg7T1ACfn3Fq9xcwCzjZOxdxaHlj/AB1rmf0Uc9QW3abyrkCnNP2', 'kVsklgf2tK@gmail.com', 'Student', NULL, NULL, NULL),
(12, 'xI1gh0CA7X', '$2y$10$ONFctR3ZPvU.beX6PneKXeJxDfPWTUXlbrI1ym5oE9St5wP04v0Ee', '1x2ZHeLDUW@gmail.com', 'Student', NULL, NULL, NULL),
(13, 'tJYYRCyHPG', '$2y$10$biC8IwHRnniNzXs8sGeWyuJ2DITzvyxgf7gZ/lSvs02cxvX7DGekq', 'PIcijQDou6@gmail.com', 'Student', NULL, NULL, NULL),
(14, 'HXtdg5DIHa', '$2y$10$Cg1uhUyY0Si0iFC6cC/gDuvWnwSCzLZag7YVmFtrs3gUQp5KpCKd2', '7PINOdewvS@gmail.com', 'Student', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `TakenCourses`
--

CREATE TABLE `TakenCourses` (
  `studentid` bigint(20) UNSIGNED NOT NULL,
  `course` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Teachers`
--

CREATE TABLE `Teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Teachers`
--

INSERT INTO `Teachers` (`id`, `name`, `password`, `email`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Q1MAZaIMAo', '$2y$10$76Uj3fZhgIQhvQynUe23OObINAGWWCFqbT/p9vC7cycHWJnCyNhxa', 'UZql9gb2yV@gmail.com', 'Teacher', NULL, NULL, NULL),
(2, 'lh8YdaSpzk', '$2y$10$4GkPB64H3kZ4t9iKKUIaS.BPkoPeA1ye6TbVxd2QC1eHYXWY1idMi', 'etp0EYE8zr@gmail.com', 'Teacher', NULL, NULL, NULL),
(3, 'RkXdu4c8f9', '$2y$10$6.W5XJrOlbTqHD78I7gZ9.trZE731ACfLqeYqvesBBAxk8GiARACa', 'h7rmymooB6@gmail.com', 'Teacher', NULL, NULL, NULL),
(4, '0sQM11rswI', '$2y$10$XT4tHpfLpx/njmBjdnB1vevDL1w.ALy9dWnNeO5IDeWb86vf6d77q', 'atAhPZPFxu@gmail.com', 'Teacher', NULL, NULL, NULL),
(5, 'CKSirUqGP7', '$2y$10$E6VTwaQ2aq/IK7TGMBIwD.L/4baGhh0doNuSJno2tUF8rDc0gX0k6', 'coGa42M2UE@gmail.com', 'Teacher', NULL, NULL, NULL),
(6, 'igM6wZqOqa', '$2y$10$SQK8tYKYGMCM31zQHz5kj.sdVmbHp6pZ4kR6FH2PsdrRp1Zx4O.xS', '0e1orfkZ7F@gmail.com', 'Teacher', NULL, NULL, NULL),
(7, 'KArQpri69i', '$2y$10$/aYdbjZ8T1DgadIbx8MhPO0eQGV2aF7luTzJ6McOSaDZ2CuSSiI.q', 'bHAFnv0czi@gmail.com', 'Teacher', NULL, NULL, NULL),
(8, 'TjO0XVMgqI', '$2y$10$z7lCMKRNuf657/1X4O6mOevPIk0JTo88p6igd53PQKhLhnDmz1s12', 'E5vuDOpnJ4@gmail.com', 'Teacher', NULL, NULL, NULL),
(9, 'bM0kqV0nAV', '$2y$10$xvnjY4YfSztl5v3YU9k7zeiR.dgqFhlTZY4E5UoLhUrF5hqSI5ddK', 'wDnRKVH1D6@gmail.com', 'Teacher', NULL, NULL, NULL),
(10, 'eXKlCIZPIk', '$2y$10$.0/rpQ7N/ZjPjGgTTEXEdO.jCjGm86ixoGuQ2CcOdjitEPUtmLqr2', 'zWhTSgmhAG@gmail.com', 'Teacher', NULL, NULL, NULL),
(11, 'TNhyavpvQf', '$2y$10$pTDLM6PoqJY1cDu43YAHq.KS9CwbMsXa5mBq7A5tk8RX/ksY1TGlC', 'eyQwtHLNgO@gmail.com', 'Teacher', NULL, NULL, NULL),
(12, 'Kehlb7O283', '$2y$10$qWYINw.Emz.blJbNJbXSp.OZPnsZmB7tLHNJZK94qcz.4HrOwBUWW', '8Ju4xWdGcv@gmail.com', 'Teacher', NULL, NULL, NULL),
(13, '3XtWNh1UyF', '$2y$10$e6HamC4adcZVJ12DiKTMPuu.hwNZO9qkz1p9wW1xxLCa1pEtVoQF2', 'Pqq19lf6yY@gmail.com', 'Teacher', NULL, NULL, NULL),
(14, '1pBmnWx7zO', '$2y$10$zdFXI8S4jj0L2VX.zg3oMer8HACweg022NmjkOkEPbidX/vSCiYJ.', 'I4weNzRe60@gmail.com', 'Teacher', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AcceptedFiles`
--
ALTER TABLE `AcceptedFiles`
  ADD PRIMARY KEY (`course`);

--
-- Indexes for table `GivenCourses`
--
ALTER TABLE `GivenCourses`
  ADD PRIMARY KEY (`teacherid`,`course`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TakenCourses`
--
ALTER TABLE `TakenCourses`
  ADD PRIMARY KEY (`studentid`,`course`,`year`);

--
-- Indexes for table `Teachers`
--
ALTER TABLE `Teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Teachers`
--
ALTER TABLE `Teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `GivenCourses`
--
ALTER TABLE `GivenCourses`
  ADD CONSTRAINT `teacher_id` FOREIGN KEY (`teacherid`) REFERENCES `Teachers` (`id`);

--
-- Constraints for table `TakenCourses`
--
ALTER TABLE `TakenCourses`
  ADD CONSTRAINT `student_id` FOREIGN KEY (`studentid`) REFERENCES `Students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
