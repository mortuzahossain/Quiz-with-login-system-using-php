-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 06:34 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question` varchar(1000) NOT NULL,
  `a` varchar(1000) NOT NULL,
  `b` varchar(1000) NOT NULL,
  `c` varchar(1000) NOT NULL,
  `d` varchar(1000) NOT NULL,
  `ans` varchar(1000) NOT NULL,
  `level` int(2) NOT NULL,
  `tearm` int(2) NOT NULL,
  `course` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `question`, `a`, `b`, `c`, `d`, `ans`, `level`, `tearm`, `course`) VALUES
(1, 'What is a data integrity?', 'It is the data contained in database that is non redundant.', 'It is the data contained in database that is accurate and consistent.', 'It is the data contained in database that is secured.', 'It is the data contained in database that is shared.', 'b', 1, 1, 1),
(2, ' As per equivalence rules for query transformation, selection operation distributes over', 'Union', 'Intersection', 'Set difference', 'All of the above', 'd', 1, 1, 1),
(3, ' In SQL the word ‘natural’ can be used with', 'inner join', 'full outer join', 'right outer join', 'all of the above', 'a', 1, 1, 1),
(4, ' Which of the following relational algebraic operations is not from set theory?', 'Union', 'Intersection', ' Cartesian Product', 'Select', 'd', 1, 1, 1),
(5, 'An entity set that does not have sufficient attributes to form a primary key is a', 'strong entity set', 'weak entity set', 'simple entity set', 'primary entity set', 'b', 1, 1, 1),
(6, 'In case of entity integrity, the primary key may be', 'not Null', 'Null', 'both Null and not Null', 'any value', 'a', 1, 1, 1),
(7, 'A logical schema-', 'is a standard way of organizing information into accessible parts.\r\n\r\n', 'is the entire database.', 'describes how data is actually stored on disk', ' both B and C', 'b', 1, 1, 1),
(8, 'Which of the operations constitute a basic set of operations for manipulating relational data?', 'Predicate calculus', 'Relational calculus', 'Relational algebra', 'None of the above', 'c', 1, 1, 1),
(9, 'Which of the following is another name for weak entity?', 'Child', 'Owner', 'Dominant', 'All of the above', 'a', 1, 1, 1),
(10, 'Which of the following is record based logical model?', 'E-R model', 'Object oriented model', 'Network Model', 'None of the above', 'c', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_no` int(30) NOT NULL,
  `firstname` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_no`, `firstname`, `lastname`, `email`, `password`, `phone`) VALUES
(1, 1234, 'Faiyaz', 'Utsho', 'faiyazutsho358@gmail.com', '1234', '1234567');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
