-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2018 at 06:57 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authorid` int(11) NOT NULL,
  `authorname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorid`, `authorname`) VALUES
(3, '7ankalolo'),
(4, 'elsawy'),
(5, 'ahmed'),
(222, 'yasser'),
(223, 'amr');

-- --------------------------------------------------------

--
-- Table structure for table `authors_has_books`
--

CREATE TABLE `authors_has_books` (
  `authorid` int(11) NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors_has_books`
--

INSERT INTO `authors_has_books` (`authorid`, `id`) VALUES
(3, 1202);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) NOT NULL,
  `isbn` bigint(20) NOT NULL,
  `booktitle` text NOT NULL,
  `dateofpublish` date NOT NULL,
  `numberofpages` int(11) NOT NULL,
  `bestofcollections` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `booktitle`, `dateofpublish`, `numberofpages`, `bestofcollections`) VALUES
(1202, 1, 'a', '2018-12-12', 2131, 'Best');

-- --------------------------------------------------------

--
-- Table structure for table `books_has_genre`
--

CREATE TABLE `books_has_genre` (
  `id` bigint(20) NOT NULL,
  `genreid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_has_genre`
--

INSERT INTO `books_has_genre` (`id`, `genreid`) VALUES
(1202, 5);

-- --------------------------------------------------------

--
-- Table structure for table `edtion`
--

CREATE TABLE `edtion` (
  `edtion id` int(11) NOT NULL,
  `edtionnumber` int(11) NOT NULL,
  `id` bigint(20) NOT NULL,
  `printdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `edtion`
--

INSERT INTO `edtion` (`edtion id`, `edtionnumber`, `id`, `printdate`) VALUES
(783, 123, 1202, '2018-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `format`
--

CREATE TABLE `format` (
  `formatid` int(11) NOT NULL,
  `formatname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `format`
--

INSERT INTO `format` (`formatid`, `formatname`) VALUES
(2, 'cd'),
(3, 'dvd'),
(4, 'book\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `format_has_books`
--

CREATE TABLE `format_has_books` (
  `formatid` int(11) NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `format_has_books`
--

INSERT INTO `format_has_books` (`formatid`, `id`) VALUES
(3, 1202);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genreid` int(11) NOT NULL,
  `genrename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genreid`, `genrename`) VALUES
(4, 'action'),
(5, 'comdey'),
(6, 'A'),
(88, 'programming'),
(89, 'action');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `userpassword` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `username`, `userpassword`) VALUES
(2, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorid`);

--
-- Indexes for table `authors_has_books`
--
ALTER TABLE `authors_has_books`
  ADD PRIMARY KEY (`authorid`,`id`),
  ADD KEY `fk_authors_has_books_books1_idx` (`id`),
  ADD KEY `fk_authors_has_books_authors1_idx` (`authorid`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn_UNIQUE` (`isbn`);

--
-- Indexes for table `books_has_genre`
--
ALTER TABLE `books_has_genre`
  ADD PRIMARY KEY (`id`,`genreid`),
  ADD KEY `fk_books_has_genre_genre1_idx` (`genreid`),
  ADD KEY `fk_books_has_genre_books1_idx` (`id`);

--
-- Indexes for table `edtion`
--
ALTER TABLE `edtion`
  ADD PRIMARY KEY (`edtion id`),
  ADD KEY `fk_edtion_books1_idx` (`id`);

--
-- Indexes for table `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`formatid`);

--
-- Indexes for table `format_has_books`
--
ALTER TABLE `format_has_books`
  ADD PRIMARY KEY (`formatid`,`id`),
  ADD KEY `fk_format_has_books_books1_idx` (`id`),
  ADD KEY `fk_format_has_books_format1_idx` (`formatid`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genreid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;
--
-- AUTO_INCREMENT for table `authors_has_books`
--
ALTER TABLE `authors_has_books`
  MODIFY `authorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1203;
--
-- AUTO_INCREMENT for table `books_has_genre`
--
ALTER TABLE `books_has_genre`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1203;
--
-- AUTO_INCREMENT for table `edtion`
--
ALTER TABLE `edtion`
  MODIFY `edtion id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=784;
--
-- AUTO_INCREMENT for table `format`
--
ALTER TABLE `format`
  MODIFY `formatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `format_has_books`
--
ALTER TABLE `format_has_books`
  MODIFY `formatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genreid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `authors_has_books`
--
ALTER TABLE `authors_has_books`
  ADD CONSTRAINT `fk_authors_has_books_authors1` FOREIGN KEY (`authorid`) REFERENCES `authors` (`authorid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_authors_has_books_books1` FOREIGN KEY (`id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books_has_genre`
--
ALTER TABLE `books_has_genre`
  ADD CONSTRAINT `fk_books_has_genre_books1` FOREIGN KEY (`id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_books_has_genre_genre1` FOREIGN KEY (`genreid`) REFERENCES `genre` (`genreid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `edtion`
--
ALTER TABLE `edtion`
  ADD CONSTRAINT `fk_edtion_books1` FOREIGN KEY (`id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `format_has_books`
--
ALTER TABLE `format_has_books`
  ADD CONSTRAINT `fk_format_has_books_books1` FOREIGN KEY (`id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_format_has_books_format1` FOREIGN KEY (`formatid`) REFERENCES `format` (`formatid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
