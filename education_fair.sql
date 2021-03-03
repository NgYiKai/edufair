-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 03:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education fair`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq_accomodation`
--

CREATE TABLE `faq_accomodation` (
  `no` int(11) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_accomodation`
--

INSERT INTO `faq_accomodation` (`no`, `alias`, `question`, `answer`) VALUES
(1, 'accomodation', 'Accommodation', 'There are various types of on-campus accommodation available at UNM and there are off-campus accommodation in facilities and housing areas near the university. Please make your specific enquiries on accommodation with an accommodation counsellor. Range of pricing for accommodation is from RM450 – RM900 per month');

-- --------------------------------------------------------

--
-- Table structure for table `faq_duration_of_programme`
--

CREATE TABLE `faq_duration_of_programme` (
  `no` int(11) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_duration_of_programme`
--

INSERT INTO `faq_duration_of_programme` (`no`, `alias`, `question`, `answer`) VALUES
(1, 'duration_ug', 'Duration for UG programmes', 'Arts, Business and Science programmes are 3 years. Engineering programmes would be 3 or 4 years on the BEng or the MEng programmes – please specify when you speak with a counsellor'),
(2, 'duration_foundation', 'Duration of Foundation programmes', 'One year');

-- --------------------------------------------------------

--
-- Table structure for table `faq_exchange_opportunities`
--

CREATE TABLE `faq_exchange_opportunities` (
  `no` int(11) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_exchange_opportunities`
--

INSERT INTO `faq_exchange_opportunities` (`no`, `alias`, `question`, `answer`) VALUES
(1, 'exchange_opportunities', 'Exchange opportunities for UG programme', 'Yes, you can go to the UK and China campuses or do an exchange with any one of the Universitas 21 universities from 1 semester only to up to a year. Please enquire specifically about this with a course counsellor as not all programmes have this availability and is subject to the student meeting some academic requirements');

-- --------------------------------------------------------

--
-- Table structure for table `faq_facilities`
--

CREATE TABLE `faq_facilities` (
  `no` int(11) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_facilities`
--

INSERT INTO `faq_facilities` (`no`, `alias`, `question`, `answer`) VALUES
(1, 'facilities', 'Facilities in UNM', 'Sports Centre, Student Association and numerous clubs and societies, etc');

-- --------------------------------------------------------

--
-- Table structure for table `faq_fees`
--

CREATE TABLE `faq_fees` (
  `no` int(11) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_fees`
--

INSERT INTO `faq_fees` (`no`, `alias`, `question`, `answer`) VALUES
(1, 'tuition_fees_foundation_business', 'Tuition fees for Foundation in Business and Management', 'tbc');

-- --------------------------------------------------------

--
-- Table structure for table `faq_general`
--

CREATE TABLE `faq_general` (
  `id` int(11) NOT NULL,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_general`
--

INSERT INTO `faq_general` (`id`, `queries`, `replies`) VALUES
(1, 'Hi | Hey | Hi there | Hello', 'Hi there '),
(2, 'fee', '300');

-- --------------------------------------------------------

--
-- Table structure for table `faq_intake`
--

CREATE TABLE `faq_intake` (
  `no` int(11) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_intake`
--

INSERT INTO `faq_intake` (`no`, `alias`, `question`, `answer`) VALUES
(1, 'intake_foundation', 'Intake for Foundation programmes', 'April, June and September'),
(2, 'intake_ug', 'Intake for UG programmes', 'September for all UG programmes; selected programmes in February');

-- --------------------------------------------------------

--
-- Table structure for table `faq_location`
--

CREATE TABLE `faq_location` (
  `no` int(11) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_location`
--

INSERT INTO `faq_location` (`no`, `alias`, `question`, `answer`) VALUES
(1, 'location', 'Location of UNM', 'UNM is in Semenyih, Selangor');

-- --------------------------------------------------------

--
-- Table structure for table `faq_scholarship`
--

CREATE TABLE `faq_scholarship` (
  `no` int(11) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_scholarship`
--

INSERT INTO `faq_scholarship` (`no`, `alias`, `question`, `answer`) VALUES
(1, 'scholarships', 'Scholarships', 'UNM offers automatic tuition fee discounts as partial scholarships for academically qualified students. Full scholarships are available under The Star and Sin Chew but are highly competitive and needs to be applied for via The Star and Sin Chew. Please ask our scholarship counsellors for more details and conditions. PTPTN loans are also available for UG students and help on this may be obtained from the sponsorship counsellors');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `Student_ID` int(5) NOT NULL,
  `Queue_Num` int(5) NOT NULL,
  `session` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_additional_info`
--

CREATE TABLE `student_additional_info` (
  `Student_ID` int(5) NOT NULL,
  `PreviousSchool` varchar(255) DEFAULT NULL,
  `HighestQualification` varchar(255) DEFAULT NULL,
  `MarketingPreference` enum('Email','SMS','Both','None') DEFAULT NULL,
  `Privacy` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_additional_info`
--

INSERT INTO `student_additional_info` (`Student_ID`, `PreviousSchool`, `HighestQualification`, `MarketingPreference`, `Privacy`) VALUES
(1, 'fd', 'spm', 'Email', NULL),
(2, 'fd', 'spm', 'Email', NULL),
(3, 'fd', 'spm', 'Email', NULL),
(4, 'fd', 'spm', 'Email', NULL),
(5, 'fd', 'spm', 'Email', NULL),
(6, 'fd', 'spm', 'Email', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_contact_info`
--

CREATE TABLE `student_contact_info` (
  `Student_ID` int(5) NOT NULL,
  `Phone_Number` varchar(11) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_contact_info`
--

INSERT INTO `student_contact_info` (`Student_ID`, `Phone_Number`, `Email`) VALUES
(1, '3213', 'abc@gmail.com'),
(2, '3213', 'abc@gmail.com'),
(3, '3213', 'abc@gmail.com'),
(4, '3213', 'abc@gmail.com'),
(5, '3213', 'abc@gmail.com'),
(6, '3213', 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_personal_info`
--

CREATE TABLE `student_personal_info` (
  `Student_ID` int(5) NOT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_personal_info`
--

INSERT INTO `student_personal_info` (`Student_ID`, `First_Name`, `Last_Name`) VALUES
(1, 'abc', 'ffsd'),
(2, 'abc', 'ffsd'),
(3, 'abc', 'ffsd'),
(4, 'abc', 'yi kai'),
(5, 'John ', 'Lee'),
(6, 'abc', 'yi kai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq_accomodation`
--
ALTER TABLE `faq_accomodation`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `faq_duration_of_programme`
--
ALTER TABLE `faq_duration_of_programme`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `faq_exchange_opportunities`
--
ALTER TABLE `faq_exchange_opportunities`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `faq_facilities`
--
ALTER TABLE `faq_facilities`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `faq_fees`
--
ALTER TABLE `faq_fees`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `faq_general`
--
ALTER TABLE `faq_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_intake`
--
ALTER TABLE `faq_intake`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `faq_location`
--
ALTER TABLE `faq_location`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `faq_scholarship`
--
ALTER TABLE `faq_scholarship`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`Queue_Num`,`Student_ID`);

--
-- Indexes for table `student_additional_info`
--
ALTER TABLE `student_additional_info`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `student_contact_info`
--
ALTER TABLE `student_contact_info`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `student_personal_info`
--
ALTER TABLE `student_personal_info`
  ADD PRIMARY KEY (`Student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq_accomodation`
--
ALTER TABLE `faq_accomodation`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq_duration_of_programme`
--
ALTER TABLE `faq_duration_of_programme`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq_exchange_opportunities`
--
ALTER TABLE `faq_exchange_opportunities`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq_facilities`
--
ALTER TABLE `faq_facilities`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq_fees`
--
ALTER TABLE `faq_fees`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq_general`
--
ALTER TABLE `faq_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faq_intake`
--
ALTER TABLE `faq_intake`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq_location`
--
ALTER TABLE `faq_location`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq_scholarship`
--
ALTER TABLE `faq_scholarship`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_additional_info`
--
ALTER TABLE `student_additional_info`
  ADD CONSTRAINT `student_additional_info_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student_personal_info` (`Student_ID`) ON DELETE CASCADE;

--
-- Constraints for table `student_contact_info`
--
ALTER TABLE `student_contact_info`
  ADD CONSTRAINT `student_contact_info_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `student_personal_info` (`Student_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
