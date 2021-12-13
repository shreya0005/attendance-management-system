-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2021 at 08:50 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attmgsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`username`, `password`, `email`, `fname`, `phone`, `type`) VALUES
('admin', 'admin', 'admin@gmail.com', 'admin', '2147483647', 'admin'),
('student', 'student', 'student@gmail.com', 'Student', '4512224500', 'student'),
('teacher', 'teacher', 'teacher@gmail.com', 'Teacher', '1247778540', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `stat_id` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL,
  `st_status` varchar(10) NOT NULL,
  `stat_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`stat_id`, `course`, `st_status`, `stat_date`) VALUES
('72027027', 'algo', 'Present', '2021-11-14'),
('72027029', 'algo', 'Present', '2021-11-14'),
('72027044', 'algo', 'Absent', '2021-11-14'),
('72027027', 'aiml', 'Absent', '2021-11-13'),
('72027029', 'aiml', 'Present', '2021-11-13'),
('72027044', 'aiml', 'Present', '2021-11-13'),
('72027027', 'oop', 'Present', '2021-04-10'),
('72027029', 'oop', 'Present', '2021-04-10'),
('72027044', 'oop', 'Present', '2021-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `st_id` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `st_status` varchar(30) NOT NULL,
  `st_name` varchar(30) NOT NULL,
  `st_dept` varchar(30) NOT NULL,
  `st_batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `st_id` varchar(20) NOT NULL,
  `st_name` varchar(20) NOT NULL,
  `st_dept` varchar(20) NOT NULL,
  `st_batch` int(4) NOT NULL,
  `st_sem` int(11) NOT NULL,
  `st_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`st_id`, `st_name`, `st_dept`, `st_batch`, `st_sem`, `st_email`) VALUES
('72027027', 'Kriti', 'Computer', 2023, 5, 'kriti@gmail.com'),
('72027029', 'Shreya', 'IT', 2023, 6, 'shreya@gmail.com'),
('72027044', 'Pratibha', 'EnTc', 2022, 7, 'pratibha@gmail.com'),
('72027065', 'Akash', 'Computer', 2021, 7, 'akash@gmail.com'),
('72027051', 'Shivani', 'IT', 2024, 7, 'shivani@gmail.com'),
('72027069', 'Janvi', 'Computer', 2024, 7, 'janvi@gmail.com'),
('72027081', 'Priya', 'EnTc', 2020, 7, 'priya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tc_id` varchar(20) NOT NULL,
  `tc_name` varchar(20) NOT NULL,
  `tc_dept` varchar(20) NOT NULL,
  `tc_email` varchar(30) NOT NULL,
  `tc_course` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`tc_id`, `tc_name`, `tc_dept`, `tc_email`, `tc_course`) VALUES
('101', 'Rekha', 'Computer', 'rekha@gmail.com', 'Data Science'),
('102', 'Seema', 'Entc', 'rekha@gmail.com', 'AI/ML'),
('103', 'Priti', 'Computer', 'priti@gmail.com', 'Object Oriented Programming'),
('104', 'Atul', 'IT', 'atul@gmail.com', 'Data Structures and Algorithms'),
('105', 'Naveed', 'Entc', 'naveed@gmail.com', 'Discrete Mathematics'),
('106', 'Akshay', 'Computer', 'akshay@gmail.com', 'Database Management'),
('107', 'Jaya', 'IT', 'jaya@gmail.com', 'Computer Networks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `stat_id` (`stat_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tc_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`stat_id`) REFERENCES `students` (`st_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
