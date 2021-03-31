-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 11:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `chatbot_questions`
--

CREATE TABLE `chatbot_questions` (
  `id` int(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot_questions`
--

INSERT INTO `chatbot_questions` (`id`, `alias`, `answer`) VALUES
(1, 'courses', 'Which faculty are you interested in?'),
(2, 'engineering', 'Which courses are you interested in?'),
(3, 'no', 'Nice talking to you!'),
(4, 'yes', 'Do you have any other questions?'),
(5, 'civil engineering', 'What would you like to know about the course?');

-- --------------------------------------------------------

--
-- Table structure for table `faq_accomodation`
--

CREATE TABLE `faq_accomodation` (
  `no` int(11) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `question` mediumtext NOT NULL,
  `answer` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_accomodation`
--

INSERT INTO `faq_accomodation` (`no`, `alias`, `question`, `answer`) VALUES
(1, 'accomodation', 'Accommodation', 'There are various types of on-campus accommodation available at UNM and there are off-campus accommodation in facilities and housing areas near the university. Please make your specific enquiries on accommodation with an accommodation counsellor. Range of pricing for accommodation is from RM450 – RM900 per month'),
(2, 'when_check_in', 'When can I Check-In to my Room?\r\n\r\n', 'Kindly inform Accommodation Office of your arrival date via OLAA so that your room will be ready upon your arrival. Failure to do so may affect your check-in experience.\r\n\r\nOur normal Check-In hours are:\r\n\r\nMonday to Friday:9.00 am-7.00 pm\r\n\r\nSaturday, Sunday & Public Holidays: Closed\r\n\r\nIf your submitted Check-In timing is outside of the normal Check-In hours, kindly ensure that you have received a confirmation from Accommodation Office who will make the necessary arrangements for your Check-In.'),
(3, 'procedures', 'What are the Check-In procedures?\r\n', 'Those travelling by your own transport should make your way to the Accommodation Office at Radius or Tioman during normal Check-In Hours. Those traveling by taxi or GRAB, should ask to be dropped-off at the Main Lobby (Level B) of Trent Building (white colour building with clock tower) foyer Security Services counter whereby our Security Personnel will assist you to call the Admin On Call to meet you for the Accommodation check-in.'),
(4, 'guaranteed', 'Is accommodation guaranteed?\r\n\r\n', 'The accommodation is guaranteed for all new students starting their foundation or first year undergraduate or postgraduate studies. However, we do not guarantee the availability of your preferred room-type. Your chances are greater the earlier you apply, accept and pay for your preferred room as we allocate rooms on a “First Come First Served with Payment” basis.\r\n\r\nAs a general guide, we will allocate rooms according to the following priority in descending order.\r\n\r\n - Below 18 years old\r\n\r\n - International Students\r\n\r\n - East Malaysians\r\n\r\n - Special Needs - Disability or a specific medical requirement\r\n\r\n - Malaysians from outside the Klang Valley'),
(5, 'special_needs', 'What is available for students with special needs?\r\n', 'The University has wheel chair friendly accommodations located on the ground floor and have previously housed visually challenged and physically challenged Residents.\r\n\r\nIf you have a physical disability or have special needs, kindly indicate when applying via OLAA and provide written supporting documentation or medical reports from a registered physician/doctor. These will be forwarded to our Student Wellbeing and Learning Support Office for further advise and assessment.'),
(6, 'not_preferred', 'What happens when I cannot get my preferred Room Type?\r\n\r\n', 'In the event that you do not get your preferred Room Type, it is recommended that you accept what is been offered to prevent further delay. You will have the chance to change to your preferred room type by applying for Room Transfer after you have Checked-In to the room offered to you. Your Room Transfer request will be processed according to room availability due to “No Show”.'),
(7, 'when_offered', 'When will I know what I have been offered?\r\n\r\n', 'Allocations are made based on the date of your application. It takes Accommodation Office about one week to process all the applications, so do not worry if you do not hear from us straight away. We will send you your room offer as soon as we can.'),
(8, 'pay_acco', 'How do I pay for my Accommodation Rental?', 'There are several payment methods available for students to make accommodation payments. Full details will be provided in the Tax Invoice when we issue your room offer. \r\n\r\nBank/Telegraphic Transfer\r\n\r\nPlease remember to submit to the University your transaction slip\r\n\r\nBank Draft\r\n\r\nPlease issued to “The University of Nottingham in Malaysia Sdn. Bhd.”\r\n\r\nCrossed Cheque\r\n\r\nMake payable to “The University of Nottingham in Malaysia Sdn. Bhd.”\r\n\r\nCredit/Debit Card\r\n\r\nOnly acceptable at Finance Counters at Block A or Block H, University of Nottingham Malaysia.\r\n\r\nMyNottingham\r\n\r\nUse the Payment Gateway after logging in with your Student ID.'),
(9, 'include', 'What is included in my Accommodation Rental?', 'Accommodation rental fee is inclusive of:\r\n\r\n• WiFi connection (20 GB per day per student)\r\n\r\n• Utilities – water and electricity\r\n\r\n• First 200 kwH air conditioning usage\r\n\r\n• Room Housekeeping & Maintenance Services\r\n\r\nA monthly electricity charge of RM0.509 per unit of electricity above 200 kwh will be imposed according to the usage measured by the air-conditioning electricity meter. The first 200 kwh (1-200 kwh) is not charged to encourage sensible usage. The electricity rate is granted and changed by Energy Commission.\r\n\r\nBilling Cycle for Air-Con Charges:Additional usage above 200 kwH per month will be billed on a quarterly basis based on meter reading as follows:\r\nBilling Month\r\n\r\nFor Period\r\n\r\nMarch\r\n\r\nDec, Jan, Feb\r\n\r\nJune\r\n\r\nMar, Apr, May\r\n\r\nSeptember\r\n\r\nJun, Jul, Aug\r\n\r\nDecember\r\n\r\nSep, Oct, Nov'),
(10, 'bring', 'What do I need to bring with me?', 'Upon checking in, you will receive a Welcome Pack consisting of the following: toothpaste, toothbrush, face towel, shampoo, foam bath, drinking water and some biscuits.\r\n\r\nYour room is fully furnished and include the following: bed, mattress, study table and chair, wardrobe, book shelf, pedestal with drawers, bedside table, fan, curtains and mirror. Deluxe Single Ensuite Bathroom (DSEB) rooms will also have a mini refrigerator within the room.\r\n\r\nRefrigerators are also available in the common pantry/kitchen (equipped with microwave oven and infrared cooker). Hot and cold-water dispensers are available at every floor of each hall. Irons and ironing boards are available upon request.\r\n\r\nYou may consider bringing the following: drinking cup, plates, fork and spoon, thermos flask, crockery (if you wish to cook) and personal bedding items.\r\n\r\nYou may consider purchasing our Bedding Pack consisting of the following: pillow, pillow case, blanket, towel and bedsheet at RM90.00\r\n'),
(11, 'car', 'Can I bring a car with me?', 'Residents may apply for a “Green” Vehicle Parking Permit that will allow you to park at designated zone according to the time of the day. Kindly take note that limited parking bays are available. Illegally parked vehicles will be clamped by Security Office.'),
(12, 'bill_cycle', 'What is the Billing Cycle for Rental Charges?', 'Effective from April 2015, room rentals will be billed on a quarterly basis \r\n'),
(13, 'stay_break', 'Is it possible to stay in the Halls of Residence during break or holiday periods?', 'Students who wish to stay during the Summer Break (1st June – 31st August) may continue to stay provided they pay an additional quarterly rental payment. Such students must inform the Accommodation Office before 30th April.'),
(14, 'family', 'Do you have accommodation for families and couples?', 'Yes, we do provide Guest Houses and Deluxe Studio Rooms for couples and small families. Each Deluxe Studio Room unit include bedroom with queen size bed; lounge with sofa and dining table, pantry with refrigerator and microwave oven and ensuite bathroom with water heater. The guest house has a common area fully furnished and equip with refrigerator, microwave oven, television, cutlery, tableware, dining table set, air-conditioning and settee. Guest House’s room are fully furnished with air-conditioning, wardrobe, bed, mattress, water heater, iron, iron board, writing desk and chair'),
(15, 'distance', 'How far away is the accommodation from campus?', 'Since the accommodation halls are located within the campus, all academic and non-academic facilities are just a few minutes’ walk away.'),
(16, 'move_out', 'Can I move out before the end of the agreed duration of stay?', 'YES, you are allowed to Check-Out before the semester ends. Resident must submit the Check-Out Acknowledgment form and Refund Notice at least two (2) weeks before the Check-Out Date and must settle all outstanding fees for your accommodation.'),
(17, 'wifi', 'How do I connect to the WIFI available within the campus?', 'If you have your Student ID and Email Username, you may connect to EDUROAM using the following steps:\r\n\r\nStep 1\r\n\r\nGo to WI-FI setting on your device.\r\n\r\nStep 2\r\n\r\nSelect the WI-FI network “EDUROAM”.\r\n\r\nStep 3\r\n\r\nWhen prompted, enter your “username@nottingham.edu.my” followed by your password.\r\n\r\nStep 4\r\n\r\nAccept certificate if prompted\r\n\r\nPlease make sure the DNS is set to auto\r\n\r\nAndroid : Choose PEAP for EAP method, ignore the Anonymous identity'),
(18, 'sponsored', ' If I am a sponsored student, do I need to pay my accommodation rental?', 'You are advised to follow-up with the University\'s Sponsorship Office on payment arrangements for your accommodation.\r\n\r\nGenerally, you are advised to pay the accommodation rental to secure your offered room. The amount paid will be refunded to you once your sponsor has confirmed the arrangements for your accommodation.'),
(19, 'pay_full', 'Do I need to pay full month rent if I check-in after the 16th of the calendar month?', 'The following cut-off dates are being practiced.\r\n\r\n \r\n\r\nCheck-In / Check-Out Dates\r\n\r\nRental Charged\r\n\r\nA\r\n\r\nCheck-In Before 15th\r\n\r\nFull month rental\r\n\r\nB\r\n\r\nCheck-In 15th onwards\r\n\r\nHalf month rental\r\n\r\nC\r\n\r\nCheck-Out Before 15th\r\n\r\nHalf month rental\r\n\r\nD\r\n\r\nCheck-Out 15th onwards\r\n\r\nFull month rental\r\n\r\nResidents are still required to pay full rental as per the above Billing Cycle. Credits/Deductions will be calculated as follows for the 4 scenarios A to D:\r\n\r\nA. Full month rental is charged, do deduction.\r\n\r\nB. Half month rental will be credited/deducted against the next quarter billing.\r\n\r\nC. Half month rental will be refunded.\r\n\r\nD. Full month rental is charged, do deduction.'),
(20, 'gender', 'Is the room allocation separated by gender?\r\n', 'Every accommodation hall is divided into male floors located at the ground only or ground and first floors, with the female floors assigned at the floors above (except for l2 Langkawi, which is an all-female hall. Please indicate your preference for the all female hall when applying in OLAA).'),
(21, 'no_show', ' What about cancellation and \"No Show\" situations?', 'If the applicant cancels the room booking (after paying the advanced rental fees):\r\n\r\nwithin 14 days after programme registration date, or\r\nwithin 14 days before check-in date\r\nThe advance rental paid will be refunded with RM100 deducted as administrative charges.\r\n\r\nAccommodation office will refund in full the advanced rental to the applicant if the student application status is withdrawn for academic reasons, does not meet academic requirements or is disqualified to study at UNM.'),
(22, 'visitor', 'Can I bring visitors into my room?', 'All visitors (including friends, relatives, and/or family members) are allowed to visit the residents. Only same gender visitors are allowed into the resident\'s room but must leave before 12 midnight. No visitors, irrespective of gender are allowed in the resident\'s room between 12 midnight until 8am. All visitors are not allowed to stay overnight in the accommodation halls. If any of the above is violated, the incident will be reported by the hall warden and/or hall tutors to UNM, which may involve reports being made to parents/guardians and eviction from the accommodation halls.'),
(23, 'details', 'Where can I find more details about Accommodation Terms & Conditions?', 'For a copy of the Accommodation Handbook, please click vist https://www.nottingham.edu.my/Study/Documents/Accommodation/Accommodation-Handbook-20202021.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `faq_duration_of_programme`
--

CREATE TABLE `faq_duration_of_programme` (
  `no` int(11) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `question` mediumtext NOT NULL,
  `answer` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_duration_of_programme`
--

INSERT INTO `faq_duration_of_programme` (`no`, `alias`, `question`, `answer`) VALUES
(1, 'duration_foundation', 'Duration of Foundation programmes', 'The foundation programme runs full-time for either two or three semesters. \r\n\r\nTwo-semester programme\r\nThis is suitable if you have completed at least 12 years of formal education but need to enhance your skills in order to undertake an undergraduate degree.\r\n\r\nThree-semester programme\r\nThis is ideal if you have completed a minimum of 11 years of formal education. \r\n\r\nAfter you have successfully completed the foundation programme you can go on to study one of our undergraduate degree programmes.'),
(3, 'apm_duration', 'Applied Psychology and Management BSc (Hons)  ', ' Full-time, 3 years'),
(4, 'teba_duration', 'TESOL in Education BA (Hons)', ' Full-time, 3 years'),
(5, 'tebe_duration', 'TESOL in Education BEd (Hons)', ' Full time, 4 years'),
(6, 'bef_duration', 'Business Economics and Finance BSc (Hons)', ' Full-time, 3 years'),
(7, 'bem_duration', 'Business Economics and Management BSc (Hons)', ' Full-time, 3 years'),
(8, 'eie_duration', 'Economics and International Economics BSc (Hons)', ' Full-time, 3 years'),
(9, 'eb_duration', 'Economics BSc (Hons)', ' Full-time, 3 years'),
(10, 'engllb_duration\r\n', 'English Language and Literature BA (Hons)', ' Full-time, 3 years'),
(11, 'ecwb_duration', 'English with Creative Writing BA (Hons)', ' Full-time, 3 years'),
(12, 'fam_duration', 'Finance, Accounting and Management BSc (Hons)', ' Full-time, 3 years'),
(13, 'ibm_duration', 'International Business Management BSc (Hons)\r\n\r\n', ' Full-time, 3 years'),
(14, 'ics_duration', 'International Communication Studies BA (Hons)', ' Full-time, 3 years'),
(15, 'icsell_duration', 'International Communication Studies with English Language and Literature BA (Hons)', ' Full-time, 3 years'),
(16, 'icsfts_duration', 'International Communication Studies with Film and Television Studies BA (Hons)', ' Full-time, 3 years'),
(17, 'icspa_duration', 'International Communication Studies with Performing Arts BA (Hons)', ' Full-time, 3 years'),
(18, 'la_duration', 'Liberal Arts BA (Hons)', ' Full-time, 3 years'),
(19, 'irb_duration', 'International Relations BA (Hons)', ' Full-time, 3 years'),
(20, 'irf_duration', 'International Relations with French BA (Hons)', ' Full-time, 3 years'),
(21, 'irs_duration', 'International Relations with Spanish BA (Hons)', ' Full-time, 3 years'),
(22, 'mb_duration', 'Management BSc (Hons)', ' Full-time, 3 years'),
(23, 'cebm_duration', 'Chemical Engineering BEng/MEng (Hons)', 'BEng - Full-time 3 years / MEng - Full-time, 4 years'),
(24, 'ceee_duration', 'Chemical Engineering with Environmental Engineering BEng/MEng (Hons)', 'BEng - Full-time 3 years / MEng - Full-time, 4 years'),
(25, 'cvebm_duration', 'Civil Engineering BEng/MEng (Hons)', ' BEng - Full-time 3 years / MEng - Full-time, 4 years'),
(26, 'eeebm_duration', 'Electrical and Electronic Engineering BEng/MEng (Hons)', 'BEng - Full-time 3 years / MEng - Full-time, 4 years'),
(27, 'mmb_duration', 'Mathematics and Management BSc (Hons)', ' Full-time 3 years'),
(28, 'mnebm_duration', 'Mechanical Engineering BEng/MEng (Hons)', 'BEng - Full-time 3 years / MEng - Full-time, 4 years'),
(29, 'mte_duration', 'Mechatronic Engineering BEng/MEng (Hons)\r\n\r\n', 'BEng - Full-time 3 years / MEng - Full-time, 4 years'),
(30, 'bs_duration', 'Biomedical Sciences BSc (Hons)', 'Full-time, 3 years'),
(31, 'bio_duration', 'Biotechnology BSc (Hons)', 'Full-time, 3 years'),
(32, 'csb_duration', 'Computer Science BSc (Hons)', 'Full-time, 3 years'),
(33, 'csai_duration', 'Computer Science with Artificial Intelligence BSc (Hons)', 'Full-time, 3 years'),
(34, 'es_duration', 'Environmental Science BSc (Hons)', 'Full-time, 3 years'),
(35, 'n_duration', 'Nutrition BSc (Hons)', 'Full-time, 3 years'),
(36, 'phs_duration', 'Pharmaceutical and Health Sciences BSc (Hons)', 'Full-time, 3 years'),
(37, 'pmp_duration', 'Pharmacy MPharm (Hons)', ' Full-time, 4 years (2 years in Malaysia + 2 years in the UK)'),
(38, 'pcnb_duration', 'Psychology and Cognitive Neuroscience BSc (Hons)', 'Full-time, 3 years'),
(39, 'psy_duration', 'Psychology BSc (Hons)', 'Full-time, 3 years'),
(40, 'se_duration', 'Software Engineering BSc (Hons)', 'Full-time, 3 years'),
(41, 'bmm_duration', 'Business and Management MSc', ' 1 year full-time'),
(42, 'cem_duration', 'Chemical Engineering MSc\r\n', ' 1 year full-time, 2 year part-time'),
(43, 'cvem_duration', 'Civil Engineering MSc', ' 1 year full-time'),
(44, 'ema_duration', 'Education: MA\r\n', ' 1-2 years full-time, 2-4 years part-time'),
(45, 'esiem_duration', 'Education: Special and Inclusive Education MA\r\n', ' 1-2 years full-time, 2-4 years part-time'),
(46, 'esiepc_duration', 'Education: Special and Inclusive Education PGCert\r\n', ' 1-2 years full-time, 2-4 years part-time'),
(47, 'esiepd_duration', 'Education: Special and Inclusive Education PGDip\r\n', ' 1-2 years full-time, 2-4 years part-time'),
(48, 'etesolm_duration', 'Education: Teaching English to Speakers of Other Languages MA\r\n', ' 1-2 years full-time, 2-4 years part-time'),
(49, 'etesolpc_duration', 'Education: Teaching English to Speakers of Other Languages PGCert\r\n', ' 1-2 years full-time, 2-4 years part-time'),
(50, 'etesolpd_duration', 'Education: Teaching English to Speakers of Other Languages PGDip\r\n', ' 1-2 years full-time, 2-4 years part-time'),
(51, 'elmm_duration', 'Educational Leadership and Management MA\r\n', ' 1-2 years full-time, 2-4 years part-time'),
(52, 'elmpc_duration', 'Educational Leadership and Management PGCert\r\n', ' 1-2 years full-time, 2-4 years part-time'),
(53, 'elmpd_duration', 'Educational Leadership and Management PGDip\r\n', ' 1-2 years full-time, 2-4 years part-time'),
(54, 'ellm_duration', 'English Language and Literature MA\r\n', '1 year full-time, 2-3 years part time'),
(55, 'ecwm_duration', 'English with Creative Writing MA', '1 year full-time, 2-3 years part time'),
(56, 'eem_duration', 'Environmental Engineering MSc', '1 year full-time'),
(57, 'fi_duration', 'Finance and Investment MSc\r\n', '1 year full-time, 2-4 years part-time'),
(58, 'idm_duration', 'International Development Management MSc\r\n', ' Full-time, 1 year, Part-time, 2 years'),
(59, 'irm_duration', 'International Relations MA', ' Full-time, 1 year, Part-time, 2 years'),
(60, 'meee_duration', 'MSc Electrical and Electronic Engineering', '1 year full-time'),
(61, 'mp_duration', 'Management Psychology MSc\r\n', '1-2 years full time, 2-4 years part time'),
(62, 'mbaf_duration', 'Master of Business Administration Finance MBA\r\n', '1-2 years full time, 2-4 years part time'),
(63, 'mba_duration', 'Master of Business Administration MBA\r\n', '1-2 years full time, 2-4 years part time'),
(64, 'mem_duration', 'Mechanical Engineering MSc\r\n', '1 year full-time'),
(65, 'mcc_duration', 'Media, Communications and Culture MA\r\n', ' 1 year full-time, 2-3 years part-time'),
(66, 'ohsl_duration', 'Occupational Health and Safety Leadership MSc', '1-2 years full-time, 2-4 years part-time'),
(67, 'pce_duration', 'Postgraduate Certificate in Education\r\n', ' 1-2 years full-time, 2-4 years part-time'),
(68, 'pgche_duration', 'Post-Graduate Certificate in Higher Education (International)\r\n', ' 1-2 years full-time, 2-4 years part-time'),
(69, 'pde_duration', 'Postgraduate Diploma in Education', ' 1-2 years full-time, 2-4 years part-time');

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
  `question` mediumtext NOT NULL,
  `answer` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_fees`
--

INSERT INTO `faq_fees` (`no`, `alias`, `question`, `answer`) VALUES
(1, 'duration_foundation', ' Foundation programmes', 'The foundation programme runs full-time for either two or three semesters. \r\n\r\nTwo-semester programme\r\nThis is suitable if you have completed at least 12 years of formal education but need to enhance your skills in order to undertake an undergraduate degree.\r\n\r\nThree-semester programme\r\nThis is ideal if you have completed a minimum of 11 years of formal education. \r\n\r\nAfter you have successfully completed the foundation programme you can go on to study one of our undergraduate degree programmes.'),
(3, 'apm_fee', 'Applied Psychology and Management BSc (Hons)  ', 'Malaysian – RM37,500 per year, Non-Malaysian – RM43,500 per year'),
(4, 'teba_fee', 'TESOL in Education BA (Hons)', 'Malaysian – RM28,200 per year, Non-Malaysian – RM34,500 per year'),
(5, 'tebe_fee', 'TESOL in Education BEd (Hons)', 'Malaysian – RM28,200 per year, Non-Malaysian – RM34,500 per year'),
(6, 'bef_fee', 'Business Economics and Finance BSc (Hons)', 'Malaysian – RM38,500 per year, Non-Malaysian – RM46,900 per year'),
(7, 'bem_fee', 'Business Economics and Management BSc (Hons)', ' Malaysian – RM38,200 per year, Non-Malaysian – RM46,900 per year'),
(8, 'eie_fee', 'Economics and International Economics BSc (Hons)', 'Malaysian – RM37,300 per year, Non-Malaysian – RM46,800 per year'),
(9, 'eb_fee', 'Economics BSc (Hons)', 'Malaysian – RM37,300 per year, Non-Malaysian – RM46,800 per year'),
(10, 'ellb_fee', 'English Language and Literature BA (Hons)', 'Malaysian – RM28,000 per year / Non-Malaysian – RM34,000 per year'),
(11, 'ecwb_fee', 'English with Creative Writing BA (Hons)', 'Malaysian – RM28,000 per year / Non-Malaysian – RM34,000 per year'),
(12, 'fam_fee', 'Finance, Accounting and Management BSc (Hons)', 'Malaysian – RM38,900 per year, Non-Malaysian – RM48,000 per year'),
(13, 'ibm_fee', 'International Business Management BSc (Hons)\r\n\r\n', 'Malaysian – RM38,500 per year, Non-Malaysian – RM48,000 per year'),
(14, 'ics_fee', 'International Communication Studies BA (Hons)', ' Malaysian – RM37,200 per year, Non-Malaysian – RM43,200 per year'),
(15, 'icsell_fee', 'International Communication Studies with English Language and Literature BA (Hons)', 'Malaysian – RM37,200 per year, Non-Malaysian – RM43,200 per year'),
(16, 'icsfts_fee', 'International Communication Studies with Film and Television Studies BA (Hons)', 'Malaysian – RM37,200 per year, Non-Malaysian – RM43,200 per year'),
(17, 'icspa_fee', 'International Communication Studies with Performing Arts BA (Hons)', 'Malaysian – RM29,100 per year, Non-Malaysian – RM35,300 per year'),
(18, 'la_fee', 'Liberal Arts BA (Hons)', 'Malaysian – RM28,500 per year, Non-Malaysian – RM34,600 per year'),
(19, 'irb_fee', 'International Relations BA (Hons)', ' Malaysian – RM37,100 per year, Non-Malaysian – RM43,300 per year'),
(20, 'irf_fee', 'International Relations with French BA (Hons)', 'Malaysian – RM37,100 per year, Non-Malaysian – RM43,300 per year'),
(21, 'irs_fee', 'International Relations with Spanish BA (Hons)', 'Malaysian – RM37,100 per year, Non-Malaysian – RM43,300 per year'),
(22, 'mb_fee', 'Management BSc (Hons)', 'Malaysian – RM38,400 per year, Non-Malaysian – RM49,500 per year'),
(23, 'cebm_fee', 'Chemical Engineering BEng/MEng (Hons)', 'Malaysian – RM48,900 per year, Non-Malaysian – RM57,000 per year'),
(24, 'ceee_fee', 'Chemical Engineering with Environmental Engineering BEng/MEng (Hons)', 'Malaysian – RM48,900 per year, Non-Malaysian – RM57,000 per year'),
(25, 'cvebm_fee', 'Civil Engineering BEng/MEng (Hons)', 'Malaysian – RM48,950 per year, Non-Malaysian – RM59,300 per year'),
(26, 'eeebm_fee', 'Electrical and Electronic Engineering BEng/MEng (Hons)', 'Malaysian – RM48,950 per year, Non-Malaysian – RM59,300 per year'),
(27, 'mmb_fee', 'Mathematics and Management BSc (Hons)', 'Malaysian – RM38,200 per year, Non-Malaysian – RM47,000 per year'),
(28, 'mnebm_fee', 'Mechanical Engineering BEng/MEng (Hons)', 'Malaysian – RM48,900 per year, Non-Malaysian – RM57,000 per year'),
(29, 'mte_fee', 'Mechatronic Engineering BEng/MEng (Hons)\r\n\r\n', 'Malaysian – RM48,900 per year, Non-Malaysian – RM57,000 per year'),
(30, 'bs_fee', 'Biomedical Sciences BSc (Hons)', ' Malaysian – RM45,600 per year, Non-Malaysian – RM53,800 per year'),
(31, 'bio_fee', 'Biotechnology BSc (Hons)', 'Malaysian – RM45,600 per year, Non-Malaysian – RM53,800 per year'),
(32, 'csb_fee', 'Computer Science BSc (Hons)', 'Malaysian – RM40,800 per year, Non-Malaysian – RM47,500 per year'),
(33, 'csai_fee', 'Computer Science with Artificial Intelligence BSc (Hons)', 'Malaysian – RM40,900 per year, Non-Malaysian – RM48,500 per year.'),
(34, 'es_fee', 'Environmental Science BSc (Hons)', 'Malaysian – RM41,200 per year, Non-Malaysian – RM48,000 per year'),
(35, 'n_fee', 'Nutrition BSc (Hons)', 'Malaysian – RM43,700 per year, Non-Malaysian – RM46,000 per year'),
(36, 'phs_fee', 'Pharmaceutical and Health Sciences BSc (Hons)', 'Malaysian – RM45,600 per year, Non-Malaysian – RM53,800 per year'),
(37, 'pmp_fee', 'Pharmacy MPharm (Hons)', 'Malaysian – RM50,200/year, Non-Malaysian – RM58,900/year Malaysian and Non-Malaysian - Fees in GBP25,000/year for years 3 and 4.'),
(38, 'pcnb_fee', 'Psychology and Cognitive Neuroscience BSc (Hons)', 'Malaysian – RM39,900 per year, Non-Malaysian – RM46,900 per year'),
(39, 'psy_fee', 'Psychology BSc (Hons)', 'Malaysian – RM39,900 per year, Non-Malaysian – RM46,900 per year'),
(40, 'se_fee', 'Software Engineering BSc (Hons)', 'Malaysian – R40,500 per year, Non-Malaysian – RM47,500 per year'),
(41, 'bmm_fee', 'Business and Management MSc', 'Malaysian – RM47,400 per programme, Non-Malaysian – RM58,900 per programme'),
(42, 'cem_fee', 'Chemical Engineering MSc\r\n', 'Malaysian – RM53,300 per programme, Non-Malaysian – RM59,900 per programme'),
(43, 'cvem_fee', 'Civil Engineering MSc', 'Malaysian – RM53,300 per programme, Non-Malaysian – RM59,900 per programme'),
(44, 'ema_fee', 'Education: MA\r\n', 'Malaysian – RM46,000 per course, Non-Malaysian – RM55,200 per course'),
(45, 'esiem_fee', 'Education: Special and Inclusive Education MA\r\n', ' Malaysian – RM47,200 per course, Non-Malaysian – RM56,900 per course'),
(46, 'esiepc_fee', 'Education: Special and Inclusive Education PGCert\r\n', 'Malaysian – RM15,800 per course, Non-Malaysian – RM18,900 per course'),
(47, 'esiepd_fee', 'Education: Special and Inclusive Education PGDip\r\n', 'Malaysian – RM31,100 per course, Non-Malaysian – RM37,900 per course'),
(48, 'etesolm_fee', 'Education: Teaching English to Speakers of Other Languages MA\r\n', 'Malaysian – RM47,200 per course, Non-Malaysian – RM56,900 per course'),
(49, 'etesolpc_fee', 'Education: Teaching English to Speakers of Other Languages PGCert\r\n', 'Malaysian – RM15,800 per course, Non-Malaysian – RM18,900 per course'),
(50, 'etesolpd_fee', 'Education: Teaching English to Speakers of Other Languages PGDip\r\n', 'Malaysian – RM26,100 per course, Non-Malaysian – RM30,100 per course'),
(51, 'elmm_fee', 'Educational Leadership and Management MA\r\n', 'Malaysian – RM47,200 per course, Non-Malaysian – RM56,900 per course'),
(52, 'elmpc_fee', 'Educational Leadership and Management PGCert\r\n', 'Malaysian – RM15,800 per course, Non-Malaysian – RM18,900 per course'),
(53, 'elmpd_fee', 'Educational Leadership and Management PGDip\r\n', 'Malaysian – RM31,100 per course, Non-Malaysian – RM37,900 per course'),
(54, 'ellm_fee', 'English Language and Literature MA\r\n', 'Malaysian - RM37,900 per programme, Non-Malaysian - RM45,500 per programme'),
(55, 'ecwm_fee', 'English with Creative Writing MA', 'Malaysian - RM37,900 per programme, Non-Malaysian - RM45,500 per programme'),
(56, 'eem_fee', 'Environmental Engineering MSc', 'Malaysian – RM53,300 per programme, Non-Malaysian – RM59,900 per programme'),
(57, 'fi_fee', 'Finance and Investment MSc\r\n', 'Malaysian – RM47,500 per programme, Non-Malaysian – RM56,900 per programme'),
(58, 'idm_fee', 'International Development Management MSc\r\n', 'Malaysian – RM46,500 per programme, Non-Malaysian – RM56,500 per programme'),
(59, 'irm_fee', 'International Relations MA', 'Malaysian – RM46,500 per programme, Non-Malaysian – RM56,500 per programme'),
(60, 'meee_fee', 'MSc Electrical and Electronic Engineering', 'Malaysian – RM52,000 per programme, Non-Malaysian – RM59,900 per programme'),
(61, 'mp_fee', 'Management Psychology MSc\r\n', 'Malaysian – RM50,100 per programme, Non-Malaysian – RM55,300 per programme'),
(62, 'mbaf_fee', 'Master of Business Administration Finance MBA\r\n', 'Malaysian - RM63,500 per programme, Non-Malaysian - RM69,900 per programme'),
(63, 'mba_fee', 'Master of Business Administration MBA\r\n', 'Malaysian - RM62,600 per programme, Non-Malaysian - RM68,365 per programme'),
(64, 'mem_fee', 'Mechanical Engineering MSc\r\n', 'Malaysian – RM53,300 per programme, Non-Malaysian – RM59,900 per programme'),
(65, 'mcc_fee', 'Media, Communications and Culture MA\r\n', 'Malaysian – RM49,100 per programme, Non-Malaysian – RM57,100 per programme'),
(66, 'ohsl_fee', 'Occupational Health and Safety Leadership MSc', 'Malaysian – RM49,500 per course, Non-Malaysian – RM54,900 per course'),
(67, 'pce_fee', 'Postgraduate Certificate in Education\r\n', 'Malaysian – RM15,800 per course, Non-Malaysian – RM18,900 per course'),
(68, 'pgche_fee', 'Post-Graduate Certificate in Higher Education (International)\r\n', 'Malaysian - RM15,800 per course, Non-Malaysian - RM19,800 per course'),
(69, 'pde_fee', 'Postgraduate Diploma in Education', 'Malaysian – RM31,100 per course, Non-Malaysian – RM37,900 per course');

-- --------------------------------------------------------

--
-- Table structure for table `faq_general`
--

CREATE TABLE `faq_general` (
  `id` int(11) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `question` mediumtext NOT NULL,
  `answer` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_general`
--

INSERT INTO `faq_general` (`id`, `alias`, `question`, `answer`) VALUES
(1, 'Hi | Hey | Hi there | Hello', '', 'Hi there '),
(2, 'fee', '', '300'),
(5, 'ranking', 'What is the ranking of The University of Nottingham?', 'Please refer to :\r\nNottingham makes top 50 in university world ranking.\r\nFor information on our UK and international rankings, visit the following web pages:\r\nUK league tables. \r\nInternational league tables.'),
(6, 'focus', 'What is the main focus of The University of Nottingham?', 'At The University of Nottingham, we are committed to providing a truly international education, inspiring our students, producing world-leading research and benefitting the communities around our campuses in the UK, China and Malaysia. Our purpose is to improve life for individuals and societies worldwide. By bold innovation and excellence in all that we do, we make both knowledge and discovery matter.\r\n'),
(7, 'under_18', 'Can i apply if I\'m under 18 years old?', 'f you are an applicant who will be under the age of 18 when you register with the University, it is essential that your parents or legal guardian complete an Under 18 Consent Form.\r\n\r\nFurther information is available in the University Policy.                   '),
(8, 'tuition_fees', 'How much are tuition fees and are there any scholarships being offered?', 'Please refer to this link for tuition fees and scholarships for Malaysian and International students.\r\nYou may also email sponsorship enquiries to us. '),
(9, 'exchange_programme', 'Can students participate in the exchange programmes?', 'Please refer to our exchange programmes information page and contact the International Office for more details. \r\n  '),
(10, 'activities', 'What are the recreational activities provided for students?', 'These activities are organised by Students Association (SA), Clubs and Societies in The University of Nottingham Malaysia Campus (UNMC) and by UNMC itself. They may include language classes, martial arts, English proficiency and development workshops, to tri-campus games, cultural events, food bazaar, charity run, carnival and much, much more. \r\nUNMC also provide a wide range of sports facilities comprising of a Gymnasium, sports hall and swimming pool. '),
(11, 'pay', 'How can I pay for my tuition and accommodation fees?', 'Paying your fees as a Malaysian student or as an International student is slightly different. \r\n\r\nPayment information link for Malaysian students.\r\n\r\nPayment information link for International students.'),
(12, 'calendar', 'Is there a calendar for term dates and other important dates for reference?', 'To view the dates of terms and semesters for the academic year, and other key dates, please visit our Academic Calendar.'),
(13, 'contact', 'Who should I contact to check on the status of my application?', 'Local students :\r\nEmail Admission office \r\nby providing us with the application index number as reference. \r\n\r\nInternational students : \r\nEmail International office by providing us with the application index number as reference. \r\n\r\nContact International Office for enquiries on students or general questions about our course and application process.'),
(14, 'accomodation', 'What is the accommodation like at The University of Nottingham Malaysia Campus?', 'Depending on your budget, we offer a variety of on-campus, as well as off-campus options.\r\n\r\nPlease refer to the list of common questions for useful information, including how to apply.'),
(15, 'offer', 'What should I do after receiving an offer from The University of Nottingham Malaysia Campus?', 'After receiving the offer from The University of Nottingham Malaysia Campus, you need to formally accept the offer before the formal offer letter can be issued. You will be given a four-week duration to accept. \r\nIf you are a foundation,undergraduate and postgraduate-taught applicant, you are required to pay a tuition deposit fee of RM 1,000 when accepting the offer. The tuition is not applicable if you are a postgraduate research student.\r\nOffer letters are not transferable between campuses. You may contact our UK International Office for them to advise you accordingly. \r\nIf you decide to not join UNMC, please read up on the University\'s accepting and obtaining a refund policy. '),
(16, 'graduate', 'What can I do after I have graduated from The University of Nottingham Malaysia Campus? ', 'The Careers Advisory Service (CAS) can play an important role in your career development. Our services will provide you with essential resources and guidance for your career choices and offer many opportunities for you to develop the skills needed to plan and manage your future.'),
(17, 'visit', 'Can I visit the University?', 'Yes. You are welcome to visit The University of Nottingham Malaysia Campus from 9am to 5pm during weekdays. \r\nCampus location map. '),
(18, 'transport', 'What are the available modes of transportation to get to The University of Nottingham Malaysia Campus?', 'Please refer to our transportation information page for details. ');

-- --------------------------------------------------------

--
-- Table structure for table `faq_intake`
--

CREATE TABLE `faq_intake` (
  `no` int(11) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `question` mediumtext NOT NULL,
  `answer` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_intake`
--

INSERT INTO `faq_intake` (`no`, `alias`, `question`, `answer`) VALUES
(1, 'duration_foundation', 'Duration of Foundation programmes', 'The foundation programme runs full-time for either two or three semesters. \r\n\r\nTwo-semester programme\r\nThis is suitable if you have completed at least 12 years of formal education but need to enhance your skills in order to undertake an undergraduate degree.\r\n\r\nThree-semester programme\r\nThis is ideal if you have completed a minimum of 11 years of formal education. \r\n\r\nAfter you have successfully completed the foundation programme you can go on to study one of our undergraduate degree programmes.'),
(3, 'apm_intake', 'Applied Psychology and Management BSc (Hons)  ', 'September'),
(4, 'teba_intake', 'TESOL in Education BA (Hons)', 'September'),
(5, 'tebe_intake', 'TESOL in Education BEd (Hons)', 'September'),
(6, 'bef_intake', 'Business Economics and Finance BSc (Hons)', 'February and September'),
(7, 'bem_intake', 'Business Economics and Management BSc (Hons)', 'September'),
(8, 'eie_intake', 'Economics and International Economics BSc (Hons)', 'September'),
(9, 'eb_intake', 'Economics BSc (Hons)', 'September'),
(10, 'ellb_intake', 'English Language and Literature BA (Hons)', 'September'),
(11, 'ecwb_intake', 'English with Creative Writing BA (Hons)', 'September'),
(12, 'fam_intake', 'Finance, Accounting and Management BSc (Hons)', ' February and September'),
(13, 'ibm_intake', 'International Business Management BSc (Hons)\r\n\r\n', 'September'),
(14, 'ics_intake', 'International Communication Studies BA (Hons)', 'September'),
(15, 'icsell_intake', 'International Communication Studies with English Language and Literature BA (Hons)', 'September'),
(16, 'icsfts_intake', 'International Communication Studies with Film and Television Studies BA (Hons)', 'September'),
(17, 'icspa_intake', 'International Communication Studies with Performing Arts BA (Hons)', 'September'),
(18, 'la_intake', 'Liberal Arts BA (Hons)', 'September'),
(19, 'irb_intake', 'International Relations BA (Hons)', 'September'),
(20, 'irf_intake', 'International Relations with French BA (Hons)', 'September'),
(21, 'irs_intake', 'International Relations with Spanish BA (Hons)', 'September'),
(22, 'mb_intake', 'Management BSc (Hons)', 'September'),
(23, 'cebm_intake', 'Chemical Engineering BEng/MEng (Hons)', ' February and September'),
(24, 'ceee_intake', 'Chemical Engineering with Environmental Engineering BEng/MEng (Hons)', ' February and September'),
(25, 'cvebm_intake', 'Civil Engineering BEng/MEng (Hons)', 'September'),
(26, 'eeebm_intake', 'Electrical and Electronic Engineering BEng/MEng (Hons)', 'September'),
(27, 'mmb_intake', 'Mathematics and Management BSc (Hons)', 'September'),
(28, 'mnebm_intake', 'Mechanical Engineering BEng/MEng (Hons)', 'September'),
(29, 'mte_intake', 'Mechatronic Engineering BEng/MEng (Hons)\r\n\r\n', 'September'),
(30, 'bs_intake', 'Biomedical Sciences BSc (Hons)', 'September'),
(31, 'bio_intake', 'Biotechnology BSc (Hons)', 'September'),
(32, 'csb_intake', 'Computer Science BSc (Hons)', 'September'),
(33, 'csai_intake', 'Computer Science with Artificial Intelligence BSc (Hons)', 'September'),
(34, 'es_intake', 'Environmental Science BSc (Hons)', 'September'),
(35, 'n_intake', 'Nutrition BSc (Hons)', 'September'),
(36, 'phs_intake', 'Pharmaceutical and Health Sciences BSc (Hons)', 'September'),
(37, 'pmp_intake', 'Pharmacy MPharm (Hons)', 'September'),
(38, 'pcnb_intake', 'Psychology and Cognitive Neuroscience BSc (Hons)', 'September'),
(39, 'psy_intake', 'Psychology BSc (Hons)', 'September'),
(40, 'se_intake', 'Software Engineering BSc (Hons)', 'September'),
(41, 'bmm_intake', 'Business and Management MSc', 'September'),
(42, 'cem_intake', 'Chemical Engineering MSc\r\n', 'September'),
(43, 'cvem_intake', 'Civil Engineering MSc', 'September'),
(44, 'ema_intake', 'Education: MA\r\n', 'February, June, September and November'),
(45, 'esiem_intake', 'Education: Special and Inclusive Education MA\r\n', 'February, June, September and November'),
(46, 'esiepc_intake', 'Education: Special and Inclusive Education PGCert\r\n', 'February, June, September and November'),
(47, 'esiepd_intake', 'Education: Special and Inclusive Education PGDip\r\n', 'February, June, September and November'),
(48, 'etesolm_intake', 'Education: Teaching English to Speakers of Other Languages MA\r\n', 'February, June, September and November'),
(49, 'etesolpc_intake', 'Education: Teaching English to Speakers of Other Languages PGCert\r\n', 'February, June, September and November'),
(50, 'etesolpd_intake', 'Education: Teaching English to Speakers of Other Languages PGDip\r\n', 'February, June, September and November'),
(51, 'elmm_intake', 'Educational Leadership and Management MA\r\n', 'February, June, September and November'),
(52, 'elmpc_intake', 'Educational Leadership and Management PGCert\r\n', 'February, June, September and November'),
(53, 'elmpd_intake', 'Educational Leadership and Management PGDip\r\n', 'February, June, September and November'),
(54, 'ellm_intake', 'English Language and Literature MA\r\n', 'September'),
(55, 'ecwm_intake', 'English with Creative Writing MA', 'September'),
(56, 'eem_intake', 'Environmental Engineering MSc', 'September'),
(57, 'fi_intake', 'Finance and Investment MSc\r\n', ' February (part-time), September (full-time and part-time), November (part-time)'),
(58, 'idm_intake', 'International Development Management MSc\r\n', 'February and September'),
(59, 'irm_intake', 'International Relations MA', 'February and September'),
(60, 'meee_intake', 'MSc Electrical and Electronic Engineering', ' September'),
(61, 'mp_intake', 'Management Psychology MSc\r\n', 'February and September'),
(62, 'mbaf_intake', 'Master of Business Administration Finance MBA\r\n', 'February (part-time), June (part-time), September (full-time and part-time), November (part-time)'),
(63, 'mba_intake', 'Master of Business Administration MBA\r\n', 'February (part-time), June (part-time), September (full-time and part-time), November (part-time)'),
(64, 'mem_intake', 'Mechanical Engineering MSc\r\n', 'September'),
(65, 'mcc_intake', 'Media, Communications and Culture MA\r\n', ' February (Part-time) and September'),
(66, 'ohsl_intake', 'Occupational Health and Safety Leadership MSc', 'September'),
(67, 'pce_intake', 'Postgraduate Certificate in Education\r\n', 'February, June, September and November'),
(68, 'pgche_intake', 'Post-Graduate Certificate in Higher Education (International)\r\n', 'June and November'),
(69, 'pde_intake', 'Postgraduate Diploma in Education', ' February, June, September and November');

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
-- Table structure for table `queue_staff`
--

CREATE TABLE `queue_staff` (
  `Staff_ID` int(5) NOT NULL,
  `Queue_Num` int(5) NOT NULL,
  `session` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` int(5) NOT NULL,
  `Type` enum('Admin','Counselor') DEFAULT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Display_Name` varchar(255) DEFAULT NULL,
  `Serving` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `Type`, `First_Name`, `Last_Name`, `Username`, `Password`, `Display_Name`, `Serving`) VALUES
(1, 'Admin', 'Master', 'Account', 'Admin', 'a1', 'Counter One', NULL),
(2, 'Counselor', 'One', 'Account', 'One', 'a1', 'Counter One', NULL),
(3, 'Counselor', 'Two', 'Account', 'Two', 'a1', 'Counter Two', NULL),
(4, 'Counselor', 'Three', 'Account', 'Three', 'a1', 'Counter Three', NULL),
(5, 'Counselor', 'Four', 'Account', 'Four', 'a1dasdfdsfsdf', 'Counter Four', NULL);

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
(6, 'fd', 'spm', 'Email', NULL),
(7, 'fd', 'spm', 'Email', NULL),
(8, 'fsd', 'spm', 'Email', NULL);

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
(6, '3213', 'abc@gmail.com'),
(7, '3213', 'abc@gmail.com'),
(8, 'fsf', 'abc@gmail.com');

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
(6, 'abc', 'yi kai'),
(7, 'Ng', 'yi kai'),
(8, 'abc', 'yi kai');

-- --------------------------------------------------------

--
-- Table structure for table `student_remark`
--

CREATE TABLE `student_remark` (
  `Student_ID` int(5) NOT NULL,
  `Remark` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatbot_questions`
--
ALTER TABLE `chatbot_questions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `queue_staff`
--
ALTER TABLE `queue_staff`
  ADD PRIMARY KEY (`Queue_Num`,`Staff_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`);

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
-- Indexes for table `student_remark`
--
ALTER TABLE `student_remark`
  ADD PRIMARY KEY (`Student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq_accomodation`
--
ALTER TABLE `faq_accomodation`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `faq_duration_of_programme`
--
ALTER TABLE `faq_duration_of_programme`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `faq_exchange_opportunities`
--
ALTER TABLE `faq_exchange_opportunities`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq_facilities`
--
ALTER TABLE `faq_facilities`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `faq_fees`
--
ALTER TABLE `faq_fees`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `faq_general`
--
ALTER TABLE `faq_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `faq_intake`
--
ALTER TABLE `faq_intake`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
