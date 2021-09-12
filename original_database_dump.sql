-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2014 at 10:37 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `exam_id` int(18) NOT NULL AUTO_INCREMENT,
  `exam_name` varchar(250) NOT NULL,
  `time_allowed` int(11) NOT NULL,
  `number_of_question` int(11) NOT NULL,
  `exam_desc` text NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `close_date` varchar(200) NOT NULL,
  `date_added` varchar(200) NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_name`, `time_allowed`, `number_of_question`, `exam_desc`, `start_date`, `close_date`, `date_added`) VALUES
(1, 'General studies', 15, 3, 'General studies Mid term test', '1410991200', '1411596000', '1411026887'),
(2, 'Mathematics', 35, 30, 'Mathematics Mid semester test', '1410991200', '1411596000', '1411069803');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `que_id` int(18) NOT NULL AUTO_INCREMENT,
  `exam_id` int(18) NOT NULL,
  `question` text NOT NULL,
  `opt_A` varchar(255) NOT NULL,
  `opt_B` varchar(255) NOT NULL,
  `opt_C` varchar(255) NOT NULL,
  `opt_D` varchar(255) NOT NULL,
  `ans` varchar(1) NOT NULL,
  PRIMARY KEY (`que_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`que_id`, `exam_id`, `question`, `opt_A`, `opt_B`, `opt_C`, `opt_D`, `ans`) VALUES
(3, 1, 'Choose the option nearest in meaning to the word or phrase in Italics.\r\nThe mistake brought the show to an ignominious end', 'a good', 'a palatable', 'a disgraceful', 'a satisfactory', 'C'),
(4, 1, 'Choose the option nearest in meaning to the word or phrase in Italics.\r\nThe old woman is suffering from dementia\r\n', 'Lucidity', 'Sagacity', 'Senility', 'Insanity', 'C'),
(5, 1, 'Choose the option nearest in meaning to the word CORRUGATED.\r\nTheir new house was roofed with CORRUGATED sheets\r\n', 'Corrupted', 'Alluninium', 'Iron', 'Folded', 'D'),
(6, 1, 'Choose the option nearest in meaning to the word EXACERBATED\r\nHis problem was EXACERBATED by the loss of his godfather\r\n', 'Infuruated', 'Aggravated', 'Exerggerated', 'Solved', 'B'),
(7, 1, 'Choose the option nearest in meaning to the word IMPENITENCE.\r\nThe teacher sent the boy out of the class for his impertinence\r\n', 'Cheating', 'Timidity', 'Rudeness', 'Indefferent', 'C'),
(8, 1, 'Choose the word that is opposite in meaning to the word MERCENERY.\r\nHis father served as a Mercenary in the army.\r\n', 'Precher', 'Rugular', 'Officer', 'Recruit', 'C'),
(9, 1, 'Choose the word that is opposite in meaning to the word HERCULEAN \r\nWhat you are asking me to do is a herculean task\r\n', 'A Lovely', 'A Demanding', 'A Strenous', 'An Easy', 'D'),
(10, 1, 'Choose the word that is opposite in meaning to the word ANTIPATHY\r\nHis antipathy affected the growth of his business \r\n', 'Loyality', 'Respectful', 'Receptivity', 'Hostility', 'C'),
(11, 1, 'Choose the word that is opposite in meaning to the word COERCED.\r\nThe warring communities were coerced into negotiating a settlement \r\n', 'Driven', 'Parsuaded', 'Compelled', 'Pressured', 'B'),
(12, 1, 'Choose the word that is opposite in meaning to the word HOPEFUL \r\n\r\nBoth sides are very hopeful about the outcome of the peace talks, but observers are still very.....................\r\n', 'Emphatic', 'Realistic', 'Explicit', 'Pessimist', 'D'),
(13, 1, 'A _________________ of cattle of Mr. Ojo’s cassava farm last week.  What a pity!  ', 'hard', 'horde', ' team  ', 'range', 'A'),
(14, 1, 'This bunch of bananas belongs to my children:  Ajayi and Okwonkwo.  It is __________________ ', 'theirs ', 'theres ', ' their', 'their’s', 'A'),
(15, 1, 'Have you heard that? The snake has ___________________ Comfort!', 'beaten   ', ' bit  ', 'bitten', 'bitten', 'C'),
(16, 1, 'Find how “a” is choose a word from a - d that has ‘a’ similar pronounciation of ‘a’ as in pat.', 'hat', 'part', ' laid   ', 'bent', 'A'),
(17, 1, 'The following Nigeria Geo-Political Zones has six(6) states each except.........................', 'North West', 'North East', 'South East', 'South South', 'C'),
(18, 1, 'The ______________________ of Directors of this company met last Tuesday ', 'Group', 'Chief', 'Board', 'Lunch', 'C'),
(19, 1, 'Which of these sentences is correct?', 'The dog has a cut on its right leg', 'The dog has a cut on it’s right leg', 'The dog has a cut on its’ right leg', 'The dog has a cut on it right leg', 'A'),
(20, 1, 'Choose the word nearest in meaning\r\nJuxtapose __________   ', 'combine', 'complete ', 'contrast', 'comment', 'C'),
(21, 1, 'Choose the word nearest in meaning\r\nIrksome __________    ', 'troublesome', ' combat', 'cartel', 'biocide', 'A'),
(22, 1, 'Choose the word nearest in meaning\r\nDiagnose __________     ', 'sickness', 'avouch', 'dilation', 'discover', 'D'),
(23, 1, 'Choose the word nearest in meaning\r\nJuvenile __________    ', 'youth', ' premature ', 'unripe', 'cagey', 'A'),
(24, 1, 'Choose the word nearest in meaning\r\nAbduct __________      ', 'argue', 'kidnap', 'estrange ', 'surveillance  ', 'B'),
(25, 1, 'Choose the word nearest in meaning\r\nEncourage __________ ', 'discuss ', 'exasperate ', 'support ', 'execrate', 'C'),
(26, 1, 'Give the opposite in meaning \r\nReal     __________       ', 'virtual ', ' indecorous ', 'worst', ' competent', 'A'),
(27, 1, 'Give the opposite in meaning\r\nExpensive     __________   ', 'realistic', ' cheap ', ' rare ', 'desirous', 'B'),
(28, 1, 'Give the opposite in meaning\r\nInvest     __________          ', 'spend ', 'hide ', ' spoil ', ' harvest ', 'D'),
(29, 1, 'Give the opposite in meaning\r\nMortal     __________         ', 'death ', ' ruin ', ' immortal ', 'irreparable ', 'C'),
(30, 1, 'Give the opposite in meaning\r\nSincerity     __________     ', ' fraudulent ', 'decoy ', 'entice', 'deform', 'A'),
(31, 1, 'Choose the word nearest in meaning\r\nEncourage.    __________ ', 'discuss ', 'exasperate ', 'support', 'execrate', 'C'),
(32, 1, 'Choose the word nearest in meaning\r\nPrimary   __________       ', ' beginning ', 'main ', 'agreement ', ' kernel', 'B'),
(33, 1, 'Choose the word nearest in meaning\r\nUnfold    __________         ', 'reveal ', 'demarcate', 'expunge ', 'expedite', 'A'),
(34, 1, 'Choose the word nearest in meaning\r\nGovern    __________        ', ' guard ', 'guide ', 'guile ', ' guild', 'B'),
(35, 1, 'Choose the word nearest in meaning\r\nWreck    __________         ', 'distort', ' destroy ', 'distinct ', 'discrete', 'B'),
(36, 1, 'Choose the word nearest in meaning\r\nLinear     __________        ', 'listed ', 'leisure', ' stalk ', 'straight ', 'D'),
(37, 1, 'Choose the word nearest in meaning\r\nClue     __________            ', 'idea ', ' inlet ', 'infringe ', 'ingrain', 'A'),
(38, 1, 'Choose the word nearest in meaning\r\nAmateur     __________     ', 'athlete ', 'athirst', 'novice', ') loutish', 'C'),
(39, 1, 'Choose the word nearest in meaning\r\nDue     __________              ', 'payment ', 'commitment ', 'levy ', 'obligation	', 'C'),
(40, 1, 'Choose the word nearest in meaning\r\nScrutinize     __________    ', '  sources ', 'examine ', ') initiate ', 'booris', 'B'),
(41, 1, 'Give the opposite in meaning \r\nStable     __________                ', 'strong', 'grounded', 'fluctuate', 'fluid	', 'C'),
(42, 1, 'Give the opposite in meaning\r\nJust     __________             ', 'unfair ', 'faith ', ' crook ', ' slothful', 'A'),
(43, 1, 'Give the opposite in meaning\r\nHardworking     _______', ' sleepy ', 'lazy ', ' rotten ', ' talkative', 'b'),
(44, 1, 'Give the opposite in meaning\r\nCunning    __________   ', ' preferable ', 'straightforward', 'concerning ', ' watchful', 'B'),
(45, 1, 'Give the opposite in meaning\r\nJovial     __________      ', 'friendly ', 'joking', ' shouting ', 'unfriendly ', 'D'),
(46, 1, 'Give the opposite in meaning\r\nDeter ________________', 'encourage ', ' enrage ', 'endow ', 'enlist', 'A'),
(47, 1, 'Give the opposite in meaning\r\nVile _______________     ', ' foul ', 'lavish', ' pleasant ', ' formidable', 'C'),
(48, 1, 'Prevention is better than', 'cure', 'core', 'cold', ' chore', 'A'),
(49, 1, 'Left-handedness is a form of', 'living', ' orientation', 'intelligence', ' learning', 'B'),
(50, 1, 'A bird in hand is better than ten in the ', ' cage', 'kitchen', 'bush	', 'zoo	', 'C'),
(51, 1, 'To whom much is given, much is ', ' lent', 'expected', 'borrowed', 'lost	', 'B'),
(52, 2, 'What is the programmer''s name', 'Olusegun', 'seyi', 'janet', 'itunu', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date_attempted` varchar(200) NOT NULL,
  PRIMARY KEY (`result_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `user_id`, `exam_id`, `score`, `date_attempted`) VALUES
(1, 2, 1, 67, '1411244750'),
(2, 2, 1, 33, '1411244991');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `session_id` int(18) NOT NULL AUTO_INCREMENT,
  `session_name` varchar(200) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `session_name`) VALUES
(1, '2013/3014'),
(2, '2012/2013');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Fullname` varchar(250) NOT NULL,
  `date_added` varchar(60) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `session_id` int(18) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `Fullname`, `date_added`, `photo`, `role`, `session_id`) VALUES
(1, 'oluseg', 'fge10adc3e10adc37c4a8d04d69f39', 'Olaniyi olusegun', '', 'olaseg.jpg', 1, 1),
(2, 'olaseg3', 'fge10adc3e10adc37c4a8d04d69f39', 'laniyi olusegun', '1411048822', 'a59bac3e6aef9b94ed0e5924c611b627.jpg', 0, 1),
(3, 'jboss', 'fg31210da31210da21c29c54d69f39', 'Abolade Akintomiwa', '1411051151', 'ce506e1b8d0b1c5650ded56506c0b354.jpg', 0, 1),
(4, 'ghidhehorn', 'fge10adc3e10adc37c4a8d04d69f39', 'Olaniyi oluseyi', '1411222029', 'eb2b7d826101e264996d7f6473360fee.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_attempt`
--

CREATE TABLE IF NOT EXISTS `user_attempt` (
  `usr_at_id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `is_attempted` tinyint(1) NOT NULL,
  `date_done` int(11) NOT NULL,
  PRIMARY KEY (`usr_at_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_attempt`
--

INSERT INTO `user_attempt` (`usr_at_id`, `exam_id`, `usr_id`, `is_attempted`, `date_done`) VALUES
(1, 1, 2, 1, 1411244953),
(2, 1, 2, 1, 1411244980);
