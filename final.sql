-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2017 at 02:54 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `Daily_Food`
--

CREATE TABLE `Daily_Food` (
  `Food_id` varchar(5) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Daily_Food`
--

INSERT INTO `Daily_Food` (`Food_id`, `Date`) VALUES
('10', '2017-04-01'),
('11', '2017-04-01'),
('12', '2017-04-01'),
('13', '2017-04-01'),
('14', '2017-04-01'),
('15', '2017-04-01'),
('25', '2017-05-01'),
('16', '2017-05-01'),
('26', '2017-05-01'),
('27', '2017-05-01'),
('19', '2017-05-01'),
('28', '2017-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Fa_id` varchar(5) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone_No` varchar(15) NOT NULL,
  `Points` int(5) DEFAULT NULL,
  `Dept` varchar(3) NOT NULL,
  `Bill` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`First_Name`, `Last_Name`, `Fa_id`, `Email`, `Phone_No`, `Points`, `Dept`, `Bill`) VALUES
('Revathy', 'GL', 'cs14', 'revathygrt@gmail.com', '9446323824', 212, 'CS', 1189),
('Anil', 's', 'cs30', 'anils@gmail.com', '9999855555', NULL, 'cs', NULL),
('Ashwathy', 'Kurup', 'ec19', 'ashwathyk@gmail.com', '9447754079', 51, 'EC', 430),
('Priya', 'Darshini', 'ec20', 'priya@yahoo.com', '9061280676', NULL, 'EC', NULL),
('Shalu', 'Murali', 'ee17', 'shalu@outlook.com', '9846253707', 32, 'EE', 310),
('Liju', 'Philip', 'ee45', 'lijup@gmail.com', '9447754029', NULL, 'EE', NULL),
('Jacob', 'Punnos', 'ei10', 'jacobpun@yahoo.com', '8281107586', NULL, 'EI', NULL),
('Sobhana', 'George', 'ei30', 'sobhanag@gmail.com', '9447964036', NULL, 'EI', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_list`
--

CREATE TABLE `faculty_list` (
  `Fa_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_list`
--

INSERT INTO `faculty_list` (`Fa_id`) VALUES
('cs14'),
('cs25'),
('cs30'),
('ec19'),
('ec20'),
('ee17'),
('ee45'),
('ei10'),
('ei30');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `C_id` varchar(6) NOT NULL,
  `Usr_Flag` int(2) NOT NULL,
  `fdbk_Staus` int(2) NOT NULL,
  `Feedback` text NOT NULL,
  `Responses` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`C_id`, `Usr_Flag`, `fdbk_Staus`, `Feedback`, `Responses`) VALUES
('98/14', 0, 0, 'The food was really delicious.', ''),
('ee17', 1, 0, 'The breakfast was awesome.  But lunch was sub-par.', '');

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `Food_Name` varchar(20) NOT NULL,
  `Food_id` int(3) NOT NULL,
  `Quantity` int(3) NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`Food_Name`, `Food_id`, `Quantity`, `Cost`) VALUES
('Tea', 1, 1, 8),
('Black coffee', 2, 1, 5),
('Black Tea', 3, 1, 5),
('Bru Coffee', 4, 1, 10),
('chappati', 5, 1, 5),
('Poori', 6, 1, 3),
('Uppumavu', 7, 1, 12),
('Idily', 8, 1, 4),
('Dosa', 9, 1, 4),
('Kadala Curry', 10, 1, 10),
('Veg Curry', 11, 1, 8),
('Egg Curry', 12, 1, 12),
('Chicken Curry', 13, 1, 30),
('Beef Curry', 14, 1, 30),
('Kappa', 15, 1, 15),
('Fish Curry', 16, 1, 20),
('Fish Fry', 17, 1, 10),
('Chicken Fry', 18, 1, 30),
('Beef Fry', 19, 1, 30),
('Chicken Biriyani', 20, 1, 80),
('Veg Biriyani', 21, 1, 50),
('Puttu', 22, 1, 15),
('Meals', 23, 1, 35),
('Thali Meals', 24, 1, 50),
('Ghee Roast', 25, 1, 30),
('Ice Cream', 26, 1, 25),
('Chilli Chicken', 27, 1, 40),
('Plane Dhosa', 28, 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `User_name` varchar(20) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `C_id` varchar(5) NOT NULL,
  `usr_lvl` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`User_name`, `Password`, `C_id`, `usr_lvl`) VALUES
('addymcp1', 'adnan', '01/14', 0),
('akash1996', 'tintu', '04/14', 0),
('karthik19996', 'karthu', '120/1', 0),
('sangs1996', 'sangs', '124/1', 0),
('niju1994', 'ikka', '38/14', 0),
('aravinds1996', 'aravi', '39/14', 0),
('rohit1996', 'saji1996', '62/14', 0),
('balu1996', 'balu10', '76/14', 0),
('jerry1996', 'jerry123', '87/14', 0),
('Aniljith', 'anils', '98/14', 0),
('revo1996', 'aravind', 'cs14', 1),
('geethu', 'aravind', 'cs25', 1),
('anils', 'anils', 'cs30', 1),
('ashukurup', 'ashu123', 'ec19', 1),
('priyadarsha', 'priya', 'ec20', 1),
('shalum', 'shalu', 'ee17', 1),
('lijup', 'liju', 'ee45', 1),
('jacobpun', 'jacob', 'ei10', 1),
('sobhag', 'sobha', 'ei30', 1),
('superuser', 'canteen', 'high', 2),
('admin', 'cmsadmin', 'top', 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `C_id` varchar(5) NOT NULL,
  `Food_Name` text NOT NULL,
  `Date` date NOT NULL,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`C_id`, `Food_Name`, `Date`, `Amount`) VALUES
('98/14', 'Egg Curry', '2017-04-01', 24),
('98/14', '', '2017-04-02', 0),
('98/14', 'Egg Curry', '2017-04-01', 24),
('98/14', 'Black coffee', '2017-04-01', 5),
('98/14', 'Black coffee', '2017-04-01', 5),
('98/14', 'Black Tea', '2017-04-02', 10),
('cs14', 'Black coffee', '2017-04-14', 5),
('cs14', 'Poori', '2017-04-14', 3),
('98/14', '', '2017-04-04', 0),
('98/14', 'Fish Curry', '2017-04-04', 20),
('98/14', 'Fish Curry', '2017-04-06', 20),
('98/14', 'Beef Curry', '2017-04-01', 90),
('cs14', 'Egg Curry', '2017-04-01', 60),
('cs14', 'Egg Curry', '2017-04-01', 60),
('cs14', 'Poori', '2017-04-01', 12),
('cs14', 'Poori', '2017-04-07', 12),
('cs14', 'Puttu', '2017-04-08', 45),
('cs14', 'Tea', '2017-04-07', 8),
('cs14', 'Chicken Biriyani', '2017-04-07', 160),
('98/14', 'Chicken Biriyani', '2017-04-28', 160),
('cs14', 'Ice Cream', '2017-04-14', 25),
('ec19', 'Chicken Biriyani', '2017-04-14', 80),
('cs14', 'Veg Biriyani', '2017-04-05', 100),
('cs14', 'chappati', '2017-04-08', 25),
('cs14', 'Beef Curry', '2017-04-05', 30),
('cs14', 'Chicken Biriyani', '2017-05-06', 160),
('cs14', 'Uppumavu', '2017-05-11', 12),
('cs14', 'Chicken Fry', '2017-04-11', 30),
('cs14', 'Uppumavu', '2017-04-11', 12),
('cs14', 'Chicken Biriyani', '2017-04-14', 480),
('cs14', 'Uppumavu', '2017-04-23', 96),
('ee17', 'Veg Biriyani', '2017-04-04', 350),
('ee17', 'Chicken Fry', '2017-04-06', 60),
('ee17', 'Puttu', '2017-04-08', 75),
('ec19', 'Veg Biriyani', '2017-04-21', 350),
('62/14', 'Chicken Biriyani', '2017-04-15', 240),
('62/14', 'Chicken Fry', '2017-04-15', 90),
('87/14', 'Chicken Biriyani', '2017-04-14', 400),
('124/1', 'Chicken Fry', '2017-04-21', 150),
('04/14', 'Chicken Biriyani', '2017-04-12', 320),
('38/14', 'Veg Biriyani', '2017-04-15', 300);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Stud_id` varchar(5) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone_No` varchar(15) NOT NULL,
  `Points` float DEFAULT NULL,
  `batch` varchar(5) NOT NULL,
  `No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`First_Name`, `Last_Name`, `Stud_id`, `Email`, `Phone_No`, `Points`, `batch`, `No`) VALUES
('Adnan', 'Maqbool', '01/14', 'addymcp1@gmail.com', '7907222479', NULL, 'S6D', 44),
('Akash', 'Suresh', '04/14', 'akashms@gmail.com', '8606299379', 64, 'S6D', 43),
('Karthik', 'Krishnan', '120/1', 'karthikiyer@gmail.com', '7736725849', NULL, 'S6D', 42),
('Sangeeth', 'Dev S', '124/1', 'discover007@gmail.com', '9995888492', 30, 'S6D', 38),
('Nijas', 'MM', '38/14', 'nijasmm@gmail.com', '7034054057', 60, 'S6D', 45),
('Aravind', 'Sankar', '39/14', 'aravinds1996@gmail.com', '9400796771', NULL, 'S6D', 36),
('Rohit', 'Saji', '62/14', 'rohitsajikv@gmail.com', '9447744717', 66, 'S6D', 40),
('Balu', 'R Krishnan', '76/14', 'brk.balu10@gmail.com', '9447931013', NULL, 'S6D', 39),
('Jerry', 'Thomas', '87/14', 'jervthomas@gmail.com', '8281331647', 80, 'S6D', 41),
('ANILJITH', 'K', '98/14', 'aniljithk@gmail.com', '8592085305', 82.8, 'S6D', 37);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Fa_id`),
  ADD UNIQUE KEY `F_id` (`Fa_id`);

--
-- Indexes for table `faculty_list`
--
ALTER TABLE `faculty_list`
  ADD PRIMARY KEY (`Fa_id`);

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`Food_id`),
  ADD UNIQUE KEY `Food_id` (`Food_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`C_id`),
  ADD UNIQUE KEY `C_id` (`C_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Stud_id`),
  ADD UNIQUE KEY `Stud_id` (`Stud_id`),
  ADD KEY `no` (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `Food_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
