-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2021 at 01:32 PM
-- Server version: 8.0.26
-- PHP Version: 7.3.24-(to be removed in future macOS)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `overcomer`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int NOT NULL,
  `exam_name` varchar(250) NOT NULL,
  `time_allowed` int NOT NULL,
  `number_of_question` int NOT NULL,
  `exam_desc` text NOT NULL,
  `start_date` varchar(200) NOT NULL,
  `close_date` varchar(200) NOT NULL,
  `date_added` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_name`, `time_allowed`, `number_of_question`, `exam_desc`, `start_date`, `close_date`, `date_added`) VALUES
(1, 'General studies', 30, 30, 'General studies Mid term test', '1427238000', '1430863200', '1411026887'),
(2, 'CHM 101 Exam', 45, 35, 'CHEMISTRY', '1411596000', '1411682400', '1411582721'),
(3, 'MTH 101', 25, 20, 'General Mathematics (PRE-TEST)', '1432166400', '1432339200', '1429387709'),
(5, 'PHY 101 (Test)', 20, 15, 'PHY Pre Test', '1432159200', '1432245600', '1431967314'),
(6, 'BIO 101(Test)', 15, 20, 'BIOLOGY PRE-TEST', '1432072800', '1432159200', '1431971801'),
(7, 'CHM 101(Test)', 15, 20, 'CHEMISTRY PRE-TEST', '1431986400', '1432159200', '1432059673'),
(9, 'GNS 101(Test)', 15, 25, 'GENERAL STUDIES PRE-TEST', '1432159200', '1432245600', '1432061692'),
(10, 'PHY 101 Exam', 45, 40, 'PHYSICS', '1434405600', '1434578400', '1434478243'),
(11, 'BIO 101 Exam', 35, 35, 'BIOLOGY', '1434405600', '1434578400', '1434542767'),
(12, 'GNS 101Exam', 30, 35, 'GENERAL STUDIES', '1434492000', '1434664800', '1434545683');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `que_id` int NOT NULL,
  `exam_id` int NOT NULL,
  `question` text NOT NULL,
  `opt_A` varchar(255) NOT NULL,
  `opt_B` varchar(255) NOT NULL,
  `opt_C` varchar(255) NOT NULL,
  `opt_D` varchar(255) NOT NULL,
  `ans` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(52, 2, '1.	 What mass of sodium metal will be discharged at the cathode when a current of 10A is passed through molten sodium chloride for a period of 4hrs?', '34.3g ', '3.43g', '40.3g', '4.03g', 'A'),
(53, 2, '<p>For a particular reaction, E<sup>&theta;</sup><sub>cell</sub> is &gt; 0. The above statement implies that, the reaction is &hellip;</p>\r\n', 'positive', 'At equilibrium', 'Negative', 'At random', 'A'),
(54, 2, '<p>Zn<sub>(s)</sub>/Zn<sup>2+</sup><sub>(aq)</sub> (0.20m) // Cu<sup>2+</sup><sub>(aq)</sub>(0.20m)<sup> </sup>/ Cu<sub>(s)</sub> . Given: E<sup>&theta;</sup>(Cu<sup>2+</sup><sub>(aq)</sub>/Cu)= +0.34v; E<sup>&theta;</sup>(Zn<sup>2+</sup><sub>(aq)</sub>/Zn)= -0.76v. Find the E<sup>&theta;</sup><sub>(cell)</sub> value of the cell.</p>\r\n', '.-0.76v', '-1.10v', '1.10v', '0.76v', 'C'),
(55, 2, '<p>All of the following are applications of electrolysis except&hellip;.</p>\r\n', 'Electroplating ', 'Extraction of aluminium', 'Extraction of iron', 'Manufacture of sodium', 'C'),
(56, 2, 'The positive electrode, through which electrons leaves the electrolyte is calledâ€¦. ', 'Anode', 'Cathode ', '. Cation ', 'Anion', 'A'),
(57, 2, '<p>For the dissociation of water at 1500&deg;C H<sub>2</sub>O<sub>(g)&nbsp; &rarr; </sub>H<sub>2(g)</sub> + 1/2O<sub>2(g)</sub></p>\r\n\r\n<p>[k<sub>p</sub>=1.87x 10<sup>-6</sup>, R=0.08205 atm dm<sup>3</sup> k<sup>-1</sup> mol<sup>-1</sup>]. What is the corresponding value of k<sub>c</sub> ?</p>\r\n', '1.55x10<sup>-7</sup>', '1.2 x10<sup>7</sup>', '1.55 x 10<sup>7</sup>', '1.2 x 10<sup>-7</sup>', 'A'),
(58, 2, '<p>In an equilibrium reaction, if âˆ†n is positive, then ..</p>\r\n', 'K<sub>c</sub> > K<sub>p</sub>', 'K<sub>p</sub> > . K<sub>c</sub>', 'K<sub>p</sub>= K<sub>c</sub>', 'K<sup>p</sup>=0  ', 'B'),
(59, 2, '_________is not a factor affecting chemical reaction in equilibrium..   ', '. Pressure ', 'Temperature ', '.  Light   ', 'catalyst ', 'C'),
(60, 2, '<p>SO<sub>2(g)</sub> + 1/2O<sub>2(g)</sub> SO<sub>3(g)</sub>; âˆ†H =-114kJmol<sup>-1</sup> . From the above chemical equation, increase in pressure will favour the ______ reaction</p>\r\n', 'Forward ', 'Backward ', 'Reverse ', 'Equilibrium', 'A'),
(61, 2, '__________ has an effect on equilibrium  constant (k)  ', 'Temperature ', ' Pressure  ', 'Catalyst', 'Concentration', 'A'),
(62, 2, '<p>If 30g of glucose is dissolved in 250cm<sup>3</sup> of water. What is the molarity in dm<sup>3</sup> ?</p>\r\n', '0.25mol/dm<sup>3</sup>', '0.5mol/dm<sup>3</sup>', '0.6mol/dm<sup>3</sup>', '0.67mol/dm<sup>3</sup>', 'D'),
(63, 2, 'Oxidation is _________ of electron while reduction is ______ of electron', 'loss, gain  ', 'loss, loss  ', 'gain, gain   ', 'gain,  loss', 'A'),
(64, 2, '<p>Oxygen is a mixture of two isotopes of <sub>8</sub><sup>16</sup>O and <sub>8</sub><sup>18</sup>O with relative abundance of 90% and 10% respectively. The relative atomic mass of oxygen is</p>\r\n', '16.0', '16.2', '17.0', '18.0', 'B'),
(65, 2, '<p>What is the number of atoms of aliuminium in a mass of 5.4g sample? [Al = 27g/mol, A.N = 6.02 x10<sup>23</sup> ].</p>\r\n', '0.2 x  10<sup>23</sup>', '0.3  x 10<sup>23</sup>', '0.6 x 10<sup>23</sup>', '1.2 x  10<sup>23</sup>', 'D'),
(66, 2, '<p>What are the oxidation numbers of the underlined atoms in the compounds below?</p>\r\n\r\n<p>(i) XeF<sub>2</sub></p>\r\n\r\n<p>(ii) Ca(VO<sub>3</sub>) <sub>2</sub></p>\r\n', '+2 & +5  ', '+3  & +7  ', '+3 & +5', '+3 & +6', 'A'),
(67, 2, '<p>25cm<sup>3</sup> of impure Na<sub>2</sub>CO<sub>3</sub> solution neutralized 20cm<sup>3</sup> of a 0.1M HCl solution. If the mass of the impure salt was 8.48g, what was the percentage purity of the sodium carbonate(IV)?</p>\r\n', '8    ', '25', '40    ', '50', 'D'),
(68, 2, '<p>Calculate the root mean square velocity of hydrogen, given that the density of hydrogen at STP is 0.091k=Kgm<sup>-3</sup></p>\r\n', '100m/s   ', '1837.8m/s  ', '2500m/s    ', '183.78m/s', 'B'),
(69, 2, '<p>Calculate the root mean square velocity of nitrogen at 30&deg; C. The molecular mass of nitrogen is 28.02g/mol</p>\r\n', '513.9m/s   ', '513.9m/s  ', '619m/s   ', '510.3m/s<sup>2</sup>', 'B'),
(70, 2, 'Two gases  A and  B  have relative molecular mass of 64 and  16 rrespectively.  Calculate the  ratio of the relative rates  of diffussion of gases  A  and B', '2/1  ', 'Â½   ', '2/5    ', '3/1', 'B'),
(71, 2, '<p>The change that occurs in the below system is _______. H<sub>2</sub> O<sub>(g) &rarr; </sub>H<sub>2</sub>O<sub>(l)</sub></p>\r\n', 'Condensation', 'Condensation', 'Fusion ', 'Vaporization', 'A'),
(72, 2, 'The change of vapour to solid is called ____ ', 'Decomposition', 'Deposition ', 'Condensation', 'Solidification', 'B'),
(73, 2, '<p>If 12g of N<sub>2</sub> and 9.0g of O<sub>2</sub> are put into a 1.00litre container at 27&deg; C, what is the total pressure in the container?</p>\r\n', '22.4atm  ', '224atm', '2.24atm  ', '0.0224atm', 'A'),
(74, 2, '<p>23. According to the kkinetic theory of gases, the relationship between p, v, m, u, and n is</p>\r\n', 'pv=1/2mnu  ', 'pv=1/3mnu<sup>3</sup>', 'pv=1/3mnu<sup>2</sup>', 'pv=1/3mnu<sup>-2</sup>', 'C'),
(75, 2, '<p>If 34.08g of Na<sub>2</sub>SO<sub>4</sub> is dissolved in 100g of water with their respective molar masses of 142g/mol and 18g/mol. What will bbe the mole fraction of Na<sub>2</sub>SO<sub>4</sub>?</p>\r\n', '0.05moles   ', '0.04moles   ', '0.03moles  ', '0.02moles', 'B'),
(76, 2, '<p>In the equilibrium A + B C + D, the initial concentration of both A and B is 1.6mol/dm<sup>3</sup>. At 298k, the equilibrium mixture contains 1.2mol/dm<sup>3</sup> of C. Determine the value of Kc.</p>\r\n', '4', '9', '2', '5', 'B'),
(77, 2, 'Rusting of iron is due to the presence of ___ and ___  ', ' water  and oil ', 'moisture and air  ', 'air and oil   ', 'water and steam', 'B'),
(78, 2, 'In the electroplating of a spoon,  ____ is placed at the cathode    ', 'Silver rod  ', 'Silver salt ', 'Soon  ', 'Non of the above', 'C'),
(79, 2, 'For a cheemical sytem in equilibrium when 0.72 of the factors involved in the equilibrium is altered the equilibrium will shift so as to annul or neutralize the effect of the change. The above principle is stated by..  ', 'Danielâ€™s  ', 'Gibbsâ€™s ', 'Le Chatelerâ€™s  ', 'Vant hoff', 'C'),
(80, 2, 'electrolyte always contains ions.  ', 'True', 'False  ', 'Maybe  ', 'Non of the above', 'A'),
(81, 2, 'The two poles through which electric current enters or leaves an electrolyte is known as ___', ' Electrolyte ', ' Electrode ', ' Cathode ', ' Anode', 'B'),
(82, 2, '<p>In the discharge of ions in electrochemical series, Fe<sup>2+</sup> will be discharged before the following except&hellip;</p>\r\n', 'Sn<sup>2+</sup>', 'Na<sup>2+</sup>', 'K<sup>+</sup>', 'Na<sup>+</sup>', 'A'),
(83, 2, '______ conduct electricity. ', 'Electrolyte ', 'Non-electrolyte  ', 'Anions   ', 'Cations', 'A'),
(84, 2, 'A dynamic equilibrium is a state of equilibrium when the rates of forward and reverse reactions are ____  ', ' The same ', 'Not equal   ', 'Varies ', 'Constant', 'A'),
(85, 2, 'Which of these statements is not correct? ', 'Equilibrium constant is temperature independent  ', 'Chemical equilibrium ', 'Catalyst has no effect on position of equilibrium  ', 'Equilibrium can only occur in a reversible closed system', 'A'),
(86, 2, '<p>The K<sub>c</sub> expression for the reaction of H<sub>2</sub> and I<sub>2</sub> to give HI in term of degree of dissociation is ____</p>\r\n', 'K<sub>c</sub> =  (4x<sup>2</sup>)/((a-x)(b-x)) ', 'K<sub>c</sub> = (4x<sup>2</sup>)/((a+x)(b+x))  ', 'K<sub>c</sub> = ((a-x)(b-x))/4x<sup>2</sup>', 'K<sub>c</sub> = x<sup>2</sup>/((a-x)(b-x))', 'A'),
(87, 2, '	The equation  âˆ†G^Â° = -RTInKP  is known as _____', 'Gibbâ€™s  isothermal ', 'Vant Hoff isothermal  ', 'Gibbâ€™s isotherm  ', 'Vant Hoff isotherm', 'D'),
(88, 2, '<p>The ratio of K<sub>c</sub> and K<sub>p</sub> at 30<sup>&deg;C</sup> for 2CO + O<sub>2</sub> &rarr; CO<sub>2</sub> is (R =8.314J/mol/k)</p>\r\n', '3.9 x 10<sup>-4</sup>', '2.5 x 10<sup>3</sup>', '1.53 x 10<sup>-7</sup>', '1.0', 'C'),
(89, 2, '<p>For the reaction PCl<sub>3</sub>(g) + Cl<sub>2</sub>(g) PCl<sub>5</sub>(g). The value of K<sub>C</sub> at 250&deg;C is 26. The value of Kp at this temperature will be ____&nbsp; [ R = 0.082 atm(dm)<sup>3</sup>/k/mol ]</p>\r\n', '0.61  ', '0.57 ', '0.83 ', '0.46', 'A'),
(90, 2, 'Which of the following is not true about the application of electrolysis?', 'Electroplating ', 'refunding of metals ', 'Manufacturing of chemicals ', 'Catalytic cracking', 'C'),
(91, 2, 'The method of coating the surface of a metal is termed ____ ', 'Electrolysis ', 'Electrocution ', 'Thermosetting  ', 'Electroplating', 'D'),
(92, 2, '<p>The relationship between K<sub>p</sub> and K<sub>c</sub> is &hellip;</p>\r\n', 'K<sub>p</sub> = K<sub>c</sub> (RT)<sup>-âˆ†n</sup>', 'K<sub>p</sub> = K<sub>c</sub> (RT)<sup>âˆ†n</sup>', 'K<sub>p</sub> = (RT)<sup>âˆ†n</sup>', 'K<sub>p</sub> = K<sub>c</sub> (R/T)<sup>âˆ†n</sup>', 'B'),
(93, 2, 'Light influenced reactions are  called _____', 'Auto-chemical reactions ', 'Thermal reactions ', 'Photo-chemical reactions  ', 'Chain reaction', 'C'),
(94, 2, 'The average of 27 results is how many times reliable than the average of 3 results?  ', '9  ', '3 ', '4  ', '6', 'A'),
(95, 2, 'The following are the examples of determinate errors except? .', ' A student uses the wrong equivalent weight in her calculation   ', 'A sample picks up moisture during weighing   ', 'The analytical weights are  corroded', 'The burette is misread once.', 'C'),
(96, 2, '	Perform these  calculations and round off the answers to the correct number of significant figures,    (2.568 x 5.8)/4.186  and  5.41 â€“ 0.398  ', '3.6  &  5.01   ', '3.56 & 5.00   ', '3.55  &  5.021', '3.6 & 5.012', 'A'),
(97, 2, 'Given the summation :  y =1.05(Â±0.02) + 4.10(Â±0.03) â€“ 197(Â±0.05)  where the values in the parenthesis are the limits estimate of standard errors. The absolute standard error and %R.E in y are â€¦. ', 'Â±0.06 &1.89%', 'Â±1.89 & 0.06%', 'Â±0.07 & 1.9%   ', 'None is correct', 'A'),
(98, 2, '<p>The empirical formular of a compound containing 40.2%K, 26.9%Cr, and the remaining being oxygen is &hellip; [K = 39.0, Cr = 52.0, O = 16.0]</p>\r\n', 'KCrO<sub>4</sub> ', 'K<sub>3</sub>CrO<sub>4</sub> ', 'K<sub>2</sub>CrO<sub>4</sub> ', 'K<sub>2</sub> Cr<sub>2</sub>O<sub>4</sub>', 'C'),
(99, 2, '<p>What is the number of copper atoms in one naira coin which weighs 7.39g? [Cu = 63.5g/mol]</p>\r\n', '6.02 x 10<sup>23</sup>atms ', '6.02 x 10<sup>22</sup>atms ', '0.602 x 10<sup>23</sup>atms', '6.02 x 10<sup>22</sup>', 'B'),
(100, 2, 'Calculate the mass of Pb, which would be obtained by heating 34.25g of lead oxide in a stream of hhydrogen and the mass of water formed at the same time   [Pb = 207, H =  1, O = 16]  ', '3.6g  &  31.05g ', '3.26g  & 3.6g  ', '3.6g & 37.0g ', '31.05 & 3.6g', 'D'),
(101, 2, '<p>The oxidizing agent in the reaction: Ni<sup>2+</sup><sub>aq</sub> + Zn<sub>s</sub> &rarr; Zn<sup>2+</sup><sub>aq</sub> + Ni<sub>s</sub></p>\r\n', 'Zn ', 'Zn<sup>2+</sup> ', 'Ni<sup>2+</sup>', 'Ni', 'C'),
(102, 2, 'The algebraic  sum the oxidation number of the numbers in the formular of an electrically neutral  compound  is â€¦.  ', 'Unity ', 'Double   ', 'Zero ', 'Negative', 'C'),
(103, 2, 'A  reducing  agent  â€¦â€¦.. electron and  is oxidiized. ', 'accept     ', 'donates   .', 'magnetizes   ', 'reflects', 'A'),
(106, 5, '<p>What is the angle between the vectors A=2i+3j and B=i-2j</p>\r\n', '120', '160', '60', '38', 'A'),
(107, 5, '<p>The gravitational force of attraction F between two particles M1 and M2 separated by distance r is giving by F=K<sup>-x</sup>(M<sub>1</sub>M<sub>2</sub>)<sup>y</sup>R<sup>z </sup>&nbsp;If K is a dimensional constant with a dimension: M<sup>-1</sup>L<sup>3</sup>T<sup>-2</sup>, the values of x,y and z are respectively given as</p>\r\n', '1,1,-2 ', ' 2,1,-1 ', ' -1,1,-2 ', '-1,1,-2', 'C'),
(108, 5, '<p>The speed (V) of sound in a medium is determined to depend on the Young&rsquo;s modulus Y, the density &rho; and the wavelength Ï . The dimensional equation is givien as V=KY<sup>x</sup>&rho;<sup>y</sup>Ï <sup>z</sup>. Where K is dimentionless, values of x, y, x respectively are:</p>\r\n', ' Â½, -Â½. Â½   ', ' Â½ , 0 , -Â½', 'Â½ , -Â½, 0', ' 0, Â½ , Â½', 'C'),
(109, 5, '<p>The force F experienced by a charge q=2C moving with a velocity V in a magnetic&nbsp; field B is given by F=qV X B. Given are V=2i+4j+6k and F=4i-20j+12k. What then is B if Bx = By</p>\r\n', '-2i -2j -4k  ', ' I + j + 4k', '  -3i-3j-4k', '2i+2j+2k', 'C'),
(110, 5, '<p>The horizontal range (R) of a projectile motion is giving by _____ and maximum when ________ respectively&nbsp;</p>\r\n', ' (U<sup>2</sup>sin2ÆŸ)/g, ÆŸ=45', '(u<sup>2</sup> sin<sup>2</sup> ÆŸ)/g, ÆŸ=90 ', ' (u<sup>2</sup> sin2ÆŸ)/g, ÆŸ=90 ', '(u<sup>2</sup> sin2ÆŸ)/g, sin2ÆŸ = Â½ ', 'A'),
(111, 5, '<p>The position of a particle moving on an x axis is given by: x=13.2+8.9t<sup>2</sup>+1.2t<sup>3</sup>. What is the acceleration of the particle at time t=2.6s<br />\r\n&nbsp;</p>\r\n', ' 36.52m/s2', '94.45m/s2', '36.52m/s2', '17.8m/s2', 'A'),
(112, 5, '<p>The velocity of a particle is described by the equation V=2Ct + 3Dt<sup>2, </sup>where C=0.1m/s<sup>2</sup> and D=0.02m/s<sup>3</sup>. Given the time interval t=3s and t=6s, the average velocity and acceleration during this interval respectively are</p>\r\n', '2.22m/s; 0.55m/s<sup>2</sup>', ' 3.36m/s;  0.74m/s<sup>2</sup>', ' 2.62m/s; 0.92m/s<sup>2</sup>', ' 2.22m/s; 0.74m/s<sup>2</sup>', 'D'),
(113, 5, '<p>A tractor can exert a force of 5X10<sup>5</sup> while moving at a constant speed of 10m/s. Determine its power in horse power</p>\r\n', '5X106N', ' 6702W', '6702hp', '5X106hp', 'C'),
(114, 5, '<p>A body of 5kg move round a circle of diameter 10m with a constant speed of 10m/s. Calculate the force towards the center.<br />\r\n&nbsp;</p>\r\n', '40N', '40Kg', '100N', '50N', 'D'),
(115, 5, '<p>A 10g bullet moving at 70m/s penetrate a block of wood 5cm before stopping. Determine the K.E of the bullet</p>\r\n', '52.4J', '24.5J', '24.5KJ', '52.4KJ', 'B'),
(116, 5, '<p>The following are examples of vector quantities except<br />\r\n&nbsp;</p>\r\n', ' Stress', 'Weight', 'Force', 'Pressure', 'D'),
(117, 5, '<p>Mass of 3kg and 5kg connected by a cord are suspended over a frictionless pulley. What is their acceleration when released<br />\r\n&nbsp;</p>\r\n', '4.25m/s<sup>2</sup>', '4.52m/s<sup>2</sup>', ' 2.54m/s<sup>2</sup>', '2.45m/s<sup>2</sup>', 'D'),
(118, 5, '<p>A block of mass 6kg is released from rest on a frictionless incline plane at an angle of 60<sup>o</sup> with the horizontal. What is the acceleration down the plane (g=9.8m/s<sup>2</sup>)<br />\r\n&nbsp;</p>\r\n', '4.9m/s<sup>2</sup>', '8.5m/s<sup>2</sup>', '9.8m/s<sup>2</sup>', '8.7m/s<sup>2</sup>', 'B'),
(119, 5, '<p>A body of mass 5kg is acted upon by a horizontal force of 20N. Calculate the acceleration produced if the first force is opposed by a second force of 5N<br />\r\n&nbsp;</p>\r\n', '0.3m/s<sup>2</sup>', '0.03m/s<sup>2</sup>', '3.0m/s<sup>2</sup>', '3.2m/s<sup>2</sup>', 'C'),
(120, 5, '<p>A force of 10N give a mass M<sub>1</sub> and acceleration of 20m/s<sup>2</sup> and a mass M<sub>2</sub> an acceleration of 5m/s<sup>2</sup>. Calculate M<sub>1</sub> and M<sub>2</sub><br />\r\n&nbsp;</p>\r\n', '2.0kg and 0.25kg', ' 0.5kg and 2.0kg', ' 5.0kg and 20.0kg', '20kg and 1.0kg', 'B'),
(121, 5, '<p>Two equal forces each magnitude of 20N act on a beam oppositely at the end of the beam. What is the torque, if the separation between the force is 40cm.<br />\r\n&nbsp;</p>\r\n', ' 4Nm', '6Nm', ' 8Nm', ' 10Nm', 'C'),
(122, 5, '<p>A gun of mass 10kg released a bullet of mass 40g at a speed of 100m/s. Find the gun&rsquo;s speed of recoil<br />\r\n&nbsp;</p>\r\n', ' 0.4m/s', '0.4m/s<sup>2</sup>', '0.2m/s', '0.2m/s<sup>2</sup>', 'A'),
(123, 5, '<p>Calculate the energy stored in a string of length 20cm which extends to 24cm when it supports a weight of 50N</p>\r\n', '1250J', '1J', '0.04J', '0.04N/m', 'B'),
(124, 5, '<p>Find the workdone when a force is applied on a string resulting in extension of 20m, if the spring has a stiffness of 500Nm<sup>-1</sup>.<br />\r\n&nbsp;</p>\r\n', '10000 J', '0.1X10<sup>6</sup> J', ' 200000 J', '100000 J', 'B'),
(125, 6, '<p>The nudeotides is formed with a backbone made of sugars and phosphate atoms and is joined together by &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.</p>\r\n', 'chemical reaction', 'Ester bond', 'Distillation', 'chemical bond', 'B'),
(126, 6, '<p>The theory that stated that the cell is the basic structural and functional unit of life is &hellip;&hellip;&hellip;&hellip;&hellip;</p>\r\n', 'cell theory', 'Hookeâ€™s theory', 'Atomic theory', ' All of the above', 'A'),
(127, 6, '<p>The process at which the information in the DNA is read, using the genetic code which specifies the sequence of amino acid within protein is called&hellip;&hellip;&hellip;&hellip;</p>\r\n', 'Mutation', 'Transcription', 'Differentiation', 'None of the above', 'B'),
(128, 6, '<p>&hellip;&hellip;&hellip;&hellip;..is often referred to as power house of a cell</p>\r\n', 'mitochydion', 'mitochondrial', 'mitochindrion', 'Mitoduma.', 'C'),
(129, 6, '<p>Organism that stores their DNA inside the cell nucleus are called</p>\r\n', 'Eukaryotic', 'prokaryotic', 'okaryotic', 'Mutayotic', 'A'),
(130, 6, '<p>What is the functional unit of nervous system?</p>\r\n', 'Neuron', 'Nervous tissue', 'Receptor', 'Ejector', 'A'),
(131, 6, '<p>The part of the Neuron&nbsp; that conducts messages away from the body cell is known as</p>\r\n', 'receptors', 'Axon', 'Neuron', 'Axion', 'B'),
(132, 6, '<p>The two basic type of cell in the body living organisms is known as</p>\r\n', 'somatic cell and reproductive cells', 'Bodily cells and somatic cells', 'Gametic cells and reproductive cells', ' Chromosomes cells and sexual cells', 'A'),
(133, 6, '<p>A process of cell division in the somatic cells is called</p>\r\n', 'Anaphase', 'Interphase', 'Mitosis', 'Meiosis', 'C'),
(134, 3, '<p>Solve <img alt=\"\" src=\"mth_question/question1.jpg\" style=\"height:43px; width:283px\" /></p>\r\n', '-1/2, 1/3', '-1/2, 1/2', '-1/2, -1/2', '-1/2, -1/3', 'C'),
(136, 3, '<p><img alt=\"\" src=\"mth_question/question3.jpg\" style=\"height:43px; width:285px\" /></p>\r\n', '3/2 or 13/2', '1/2 or 13/2', '1/2 or 7/2', '5/2 or 13/2', 'B'),
(137, 3, '<p><img alt=\"\" src=\"mth_question/question4.jpg\" style=\"height:40px; width:479px\" /></p>\r\n', '3, 4, 5', '2, 4, 6', '2, 3, 1/2', '4, 2, 3', 'C'),
(138, 3, '<p><img alt=\"\" src=\"mth_question/question5.jpg\" style=\"height:44px; width:316px\" /></p>\r\n', '7', '12', '14', '10', 'D'),
(139, 7, '<p>&nbsp;</p>\r\n\r\n<p>______ are nuclides with the same number of Neutron but</p>\r\n\r\n<p>&nbsp;with different number of proton</p>\r\n', 'isotopes ', ' Isobars ', ' Isotones ', ' Isotopy', 'C'),
(140, 7, '<p>S- orbital is _____ in shape</p>\r\n', 'Dumb-bell', ' Spherical ', 'Directional', 'Circle', 'B'),
(141, 3, '<p>Find the number of elements in the power set X={5,7,11,19}</p>\r\n', '16', '20', '25', '30', 'A'),
(142, 7, '<p>How many moles of Ammonia gas are there in 500cm<sup>3</sup> of the gas?</p>\r\n', ' 0.0202 mol ', '0.202mol ', ' 0.22mol ', ' 0.022mol', 'C'),
(143, 3, '<p><strong>List the elements in the set Y = { X: X &epsilon; Z<sup>+</sup>, X is a multiple of 3&nbsp; and X &lt; 10 }</strong></p>\r\n', '{3,4,5,6,7,8,9,10}', '{3,9}', '{3,6,9}', '{3}', 'C'),
(144, 6, '<p>Mitosis can be subdided into four main stage namely</p>\r\n', 'Prophase, Anaphase, Metaphase and Telophase', 'Prohase, metaphase, Anaphase, Telephase', 'Metaphase, Anaphase, Telephase, Prophase', 'Prophase Telephase, Anaphase metaphase.', 'B'),
(145, 6, '<p>&hellip;&hellip;&hellip;&hellip;systems control all skeletal movement in the nervous system</p>\r\n', 'Autonomic Nervous system', 'Body nervous system', 'Parasympathetic Nervous system', 'Somatic nervous system.', 'D'),
(146, 3, '<p><strong>Which is the odd one &micro;={x: 1,2,3,4,5,6,7,8 } A={1,2,4,5} B={3,6,7,8}</strong></p>\r\n', 'AâŠ†B', 'ÂµâŠ‡A', 'AâŠ‚Âµ', 'AnB=ÆŸ', 'A'),
(147, 7, '<p>How would you prepare 500cm<sup>3</sup> solution of 0.35m of sulphamic acid (NH<sub>2</sub>S0<sub>3</sub>H)? (N=14.0, S=32, H=1.0, O=16)</p>\r\n', '16.98g ', ' 16.98kg ', ' 1.698g ', ' 0.175g', 'A'),
(148, 6, '<p>In humans, the most predominant part of the brain which perform the function of like intelligence and speech in the &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</p>\r\n', 'hypothalamus  ', 'Cerebellum  ', 'Medulla oblongata', 'Pins varolli', 'A'),
(149, 3, '<p>The rule/law {A u B} <sup>c</sup> = A<sup>c</sup> n B<sup>c</sup></p>\r\n', 'Distributive', 'Associative', 'commutative', 'De Morgan', 'D'),
(150, 6, '<p>The part of the brain that continues into the spinal cord is referred to as;</p>\r\n', 'Medulla Oblongata', 'Hypothalamus', 'Thalamus', 'Cerebellum.', 'A'),
(151, 6, '<p>The part of peripheral nervous system which control activists inside the body that are normally involuntary is known as</p>\r\n', 'Parasympathetic nervous system', 'Autonomic Nervous system', 'sympathetic Nervous system', 'Somatic Nervous system', 'B'),
(152, 3, '<p>The statement &ldquo;Element of Z but not of A and B&rdquo; can be represented as the following except [where Z is the universal set]</p>\r\n', 'Z-(AnB)', 'Z-(AuB)', '(AuB)<sup>C</sup>', 'Neither B nor A', 'A'),
(153, 6, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;is the part of nervous system that comes into action in the time of emergency or prolonged exertion</p>\r\n', 'Somatic Nervous system', 'Autonomic nervous system', 'Parasympathetic Nervous system', 'Sympathetic Nervous system', 'D'),
(154, 7, '<p>What is the number of Cu atom in one naira coin which</p>\r\n\r\n<p>&nbsp;weighed 7.93g. Assuming the material from which the coin was made contains 86% copper (Cu = 63.5g/mol)</p>\r\n', ' 6.62 Ã—10<sup>22</sup>', ' 6.03Ã—10<sup>22</sup>', ' 6.47Ã—10<sup>22</sup>', ' 6.26Ã—10<sup>22</sup>', 'C'),
(155, 6, '<p>The nervous pathway taken by nerve impulse in a reflex action is called</p>\r\n', 'Reflex arc', 'Reflex ark', 'Reflex action', 'Reflex path', 'A'),
(156, 7, '<p>In the measured values; 3.65, 4.11, 3.59, 7.51, 3.95, 3.87, 4.06,</p>\r\n\r\n<p>&nbsp;1.48, 3.60, 3.79 and 3.99, the value to be rejected are __________</p>\r\n', ' 1.48 ', ' 1.48 and 7.50 ', ' 1.48 and 7.51 ', ' 7. 51', 'C'),
(157, 6, '<p>The stage at which chromosomes first appear in for of a fine single thread is refered to as &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</p>\r\n', 'Polypeptone  ', 'totipotent  ', 'Pluripotent', 'Lepto tene.', 'D'),
(158, 6, '<p>In human, the part of the upper digestive tract responsible for opening &amp; closure of the tradiea &amp; esophagus during swalling is</p>\r\n', 'Soft palate  ', 'Hard palate  ', 'Esophagi  ', ' None of the above', 'A'),
(159, 6, '<p>Which one out of the following is not a significance of mitosis</p>\r\n', 'Cell produced  have the same chromosome number as found in the parent cell.', 'The quality of the genratic materials is maintained in the offspring as in the parent cells.', 'Four daughter cells develop and transform into gametic cells', 'It is an  educational division.', 'C'),
(160, 7, '<p>The mass of an object was measured four times on an analytical balance with the following results: 0.2041g, 0.2049g, 0.2.39g and 0.2043g. what is the mean of the measurement?</p>\r\n', ' 0.2041g ', ' 0.2042g ', ' 0.2042g ', ' 0.2049g', 'C'),
(161, 6, '<p>In meiosis, the re-appearance of chromosomes in the nucleus of the two haploid daughter cells as a result of condensation occurs at;</p>\r\n', 'Telophase  1', ' Prophase II', 'Metaphase II', 'Anaphase 1', 'B'),
(162, 7, '<p>What is the Absolute error if 60.36g is the actual mass of</p>\r\n\r\n<p>a metallic object which was measured to be 60.31g in error?</p>\r\n', '- 0.05g ', ' 0.05g ', '- 0.5g ', ' 0.05%', 'A'),
(163, 7, '<p>Instrumental, operative, personal and methodical errors are altogether classified as _____</p>\r\n', ' Determinate ', ' Relative error ', ' random Error ', ' Indeterminate', 'A'),
(164, 7, '<p>Round off 4.445&times;10<sup>-5</sup> to 3 Significant figures</p>\r\n', ' 4.44Ã—10<sup>-5</sup> ', ' 4.45Ã—10<sup>-5</sup> ', ' 4.44Ã—10<sup>-5</sup> ', ' 4.45Ã—10<sup>-3</sup> ', 'C'),
(165, 7, '<p>The Error that varies from one measurement to another is</p>\r\n\r\n<p>&nbsp;called ___</p>\r\n', ' Constant ', ' Systematic ', ' random ', ' None', 'B'),
(166, 7, '<p>In atomic nucleus, Protons and Neutrons as nuclear particle</p>\r\n\r\n<p>are called ______</p>\r\n', ' Gamma rays ', ' Nucleons ', ' Nuclear ', ' Radiation', 'B'),
(167, 7, '<p>The shape of d-orbital is _________</p>\r\n', ' Spherical ', ' Dumb â€“ bell ', ' Spherically circular ', ' Double dumb-bell', 'B'),
(168, 9, '<p><u>Each</u> of them got a ball. What kind of pronoun is the underlined word?</p>\r\n', 'Demonstrative', 'Relative', 'Distributive', 'General', 'C'),
(169, 7, '<p>Neutron was discovered by&nbsp; &hellip;&hellip;&hellip;..</p>\r\n', ' mosley ', ' Ruthefold  ', ' Chadwick  ', ' Milikan', 'C'),
(170, 7, '<p>One of the following did not contribute to the elucidation of the structure of atom?&nbsp;</p>\r\n', ' Sir  Isaac Newton ', ' James Chadwick ', ' J.J. Thomson ', ' Ernest Rutherford.', 'A'),
(171, 9, '<p>The masculine word for &ldquo;goose&rdquo; is</p>\r\n', 'goose', 'gander ', 'geese ', 'he-goose', 'B'),
(172, 9, '<p>The plural form of the word &ldquo;sheep&quot; is</p>\r\n', 'sheep ', 'sheeps ', 'ship ', 'ships', 'A'),
(173, 9, '<p><u>When</u> did he give you the food? The underlined word is what kind of pronoun?</p>\r\n', 'interrogative ', 'relative ', 'indefinite ', 'demonstrative', 'B'),
(174, 9, '<p>&ldquo;You danced&rdquo; has which of the following structures?</p>\r\n', ' 2nd person plural', '1st person plural', '1ST person sing', '3rd person sing', 'A'),
(175, 7, '<p>No two electrons in any one atom can have the same four Quantum numbers.&nbsp; This statements known as &hellip;&hellip;&hellip;..</p>\r\n', ' Pauli Exclusion principles  ', 'Milikan exclusion law ', ' John Dalton theory ', 'Chadwick principal', 'A'),
(176, 9, '<p>It is ____ own house</p>\r\n', 'my ', 'mined ', 'mine ', 'mine own', 'A'),
(177, 9, '<p>The woman gave us <em>much</em> milk. The italicized word is a/an</p>\r\n', 'adjective ', 'noun ', 'adverb ', 'pronoun', 'A'),
(178, 9, '<p>Shola&rsquo;s house is opposite mine. <em>This sentence is in what case?</em></p>\r\n', 'genitive ', 'objective ', 'subjective ', 'passive', 'A'),
(179, 7, '<p>In the arrangement of electron in the orbital, electrons are arranged singly before pairing when law is obeyed?&nbsp;</p>\r\n', '  Paulis ', ' Hundâ€™s ', ' Daltonâ€™s  ', 'Bohrâ€™s model', 'B'),
(180, 9, '<p>I <u>will</u> fight. The underlined word is</p>\r\n', 'auxiliary verb ', 'principal verb', 'preposition', 'noun', 'A'),
(181, 7, '<p>The nucleus of an atom consists of &hellip;&hellip;&hellip;..and &hellip;&hellip;&hellip;..</p>\r\n', ' Proton  and electron  ', ' Elecron and Newtron ', ' mass no and Atomic no ', ' Proton and Neutron', 'D'),
(182, 9, '<p>A group of swans <u>floated by</u>. The underlined expression is a/an</p>\r\n', 'conditional phrase', 'phrasal preposition', 'verb phrase', 'adverbial phrase', 'B'),
(183, 9, '<p>&ldquo;Friendship&rdquo; belongs to what word class?</p>\r\n', 'Pronoun ', 'adjective ', 'noun ', 'adjective', 'C'),
(184, 9, '<p>He got a house through us. <em>Change the voice of this sentence.</em></p>\r\n', 'by us did he get a house', 'we got a house through him', 'we got him a house', 'a house was gotten for him', 'C'),
(185, 9, '<p>You were _______ to see me.</p>\r\n', 'suppose ', 'supposed ', 'supposs ', 'supposes', 'B'),
(186, 9, '<p>He made ___ hutch.</p>\r\n', 'a ', 'an ', '__ ', 'some', 'A'),
(187, 9, '<p>I have <u>no</u> time to waste</p>\r\n', 'Adverb ', 'Preposition ', 'adjective ', 'negation', 'C'),
(188, 9, '<p>The resumption date has been rescheduled. <u>Be that as it may</u>, we will still continue the practical. <em>The underlined expression is</em> a/an&nbsp;</p>\r\n', 'adjectival clause', ' coordinating conjunction', 'adverbial phrase', 'correlating conjunction', 'C'),
(189, 7, '<p>How many Glucose molecules are there in 5.23gram of&nbsp; C&lt;sub&gt;6H1206&lt;/sub&gt;?&nbsp;</p>\r\n', ' 1.75x10<sup>22</sup>', ' 1.75x10<sup>23</sup>', ' 1.75x10 <sup>20</sup>', ' 1.71x10 <sup>23</sup>', 'A'),
(190, 9, '<p>The woman denied <u>knowing her own husband</u>.</p>\r\n', 'Prepositional phrase', 'Verb phrase', 'adjectival phrase', 'noun clause', 'B'),
(191, 9, '<p>What a pity! What kind of a sentence is this by function?</p>\r\n', 'imperative ', 'interrogative ', 'exclamatory ', 'declarative', 'C'),
(192, 9, '<p>PJ loves <u>to babble during interviews</u>. (a) Prepositional phrase (b) Verb phrase (c) adjectival phrase (d) noun clause</p>\r\n', 'Prepositional phrase', 'Verb phrase', 'adjectival phrase', 'noun clause', 'B'),
(193, 9, '<p>Who are ____ boys?</p>\r\n', 'this ', 'these ', 'that ', 'that ', 'B'),
(194, 9, '<p><em>Come here</em>. This sentence is functioning as a/an ____ sentence</p>\r\n', 'Imperative ', 'Declarative ', 'Interrogative', 'Qualitative', 'A'),
(195, 7, '<p>a student claimed not to observed any colour change with methylorange indicator during titration.&nbsp; This error can be categorized as &hellip;&hellip;&hellip;.</p>\r\n', 'Operative', 'personal', 'Determinant', 'methodical.', 'B'),
(196, 9, '<p>Fighting seems good but the consequences are bad. This sentence is by structure a ____ sentence</p>\r\n', 'compound', 'complex ', 'complex -compound', ' compound-complex', 'B'),
(197, 9, '<p>Where is the topic sentence located in a paragraph?</p>\r\n', 'beginning', 'end', 'centre ', 'anywhere', 'D'),
(198, 9, '<p>The security officers spotted a suspicious car on campus. This same yellow car attracted the attention of the police in town yesterday. <em>What cohesive device is used in the above sentences?</em></p>\r\n', 'Repetition ', 'Substitution ', 'Ellipsis ', 'Ellipsis ', 'A'),
(199, 9, '<p>He came <u>now</u>. The underlined word is an adverb of __________</p>\r\n', 'time ', 'degree ', 'manner ', 'pattern', 'A'),
(200, 9, '<p>If the topic of an essay is &ldquo;The patient dog eats the fattest bone&rdquo;. <em>The essay can be said to be </em></p>\r\n', 'philosophical ', 'narrative ', 'biographical ', 'debate', 'B'),
(201, 9, '<p>I used to go to church under false &shy;&shy;&shy;____, I never wanted to go but my mother made me.</p>\r\n', 'faÃ§ade ', 'feeling ', 'pretences ', 'agreement', 'A'),
(202, 7, '<p>Calculate the Electronic configuration of a compound containing&nbsp; 40.20k , 26.9% Cr and the remaining being oxygen (k=39.0 cr =52, 0=16)</p>\r\n', ' k<sub>2 </sub>cr<sub> 04</sub>  ', 'N<sub>2</sub>cr<sub>04</sub>  ', ' kcr<sub>2</sub> 0<sub>4</sub>  ', ' k<sub>2</sub>cr0<sub>2</sub>.', 'A'),
(203, 9, '<p>It rained <u>cat and dog</u> yesterday.</p>\r\n', 'adjectival phrase', 'noun phrase', 'verb phrase', 'adverb phrase', 'D'),
(204, 7, '<p>.A liquid that is added from the burette is known as &hellip;&hellip;&hellip;&hellip;&hellip;&nbsp;</p>\r\n', ' Titrand ', '  Titrant ', ' standard solution ', '  Primary solution  ', 'B'),
(205, 7, '<p>A solution whose concentration is accurately known as &hellip;&hellip;&hellip;&hellip;&hellip;.</p>\r\n', ' standard solution  ', ' unsaturated solution ', ' super saturated solution ', ' saturated solution', 'A'),
(206, 7, '<p>How many moles of H2S04 are there in 10g of the compound?</p>\r\n', ' 0.12mol  ', '0.102mol  ', ' 0.2mol ', ' 0.02mol', 'B'),
(207, 7, '<p>Round off (2,765x103) x (2.3x105) to the correct significant figure&nbsp;&nbsp;</p>\r\n', ' 6.35x108 ', ' 6.4x108  ', ' 6.359x108  ', ' 6.36x108', 'B'),
(208, 7, '<p>A student claimed not to observe any colour change with methylorange indicator during titration.&nbsp; This error can be categorized as &hellip;&hellip;&hellip;.</p>\r\n', ' Operative  ', ' personal  ', ' Determinant ', ' methodical.', 'B'),
(209, 3, '<p>Given the sequence 5,1,-3&hellip;which term of the sequence is -75</p>\r\n', '22nd ', '21st ', '23rd ', '20th', 'B'),
(210, 3, '<p>What is the nth term of the AP: 12, 5, -2?</p>\r\n', '9n-7', 'No option', '7n-19', '19-7n', 'D'),
(211, 3, '<p><img alt=\"\" src=\"mth_question/question8.jpg\" style=\"height:52px; width:180px\" /></p>\r\n', '<p><img alt=\"\" src=\"mth_question/question8opa.jpg\" style=\"height:52px; width:180px\" /></p>', '<p><img alt=\"\" src=\"mth_question/question8opb.jpg\" style=\"height:52px; width:180px\" /></p>', '<p><img alt=\"\" src=\"mth_question/question8opc.jpg\" style=\"height:52px; width:180px\" /></p>', '<p><img alt=\"\" src=\"mth_question/question8opd.jpg\" style=\"height:52px; width:180px\" /></p>', 'C'),
(212, 9, '<p>Either the professors or the boy ______ to school</p>\r\n', 'go', 'going', 'goed', 'goes', 'D'),
(213, 9, '<p>All of the following are cohesive devices except ____<br />\r\n&nbsp;</p>\r\n', 'Repetition', 'Ellipsis', 'Substitution', 'Rhetorical questions', 'D'),
(214, 3, '<p>What is the coefficient of the fourth term in the expansion of second term (x-3y)<sup>5</sup></p>\r\n', '-270', '28', '-15', '18', 'A'),
(215, 3, '<p><img alt=\"\" src=\"mth_question/question7.JPG\" style=\"height:45px; width:480px\" /></p>\r\n', 'x>-4 or x>2', 'x<-4 or x<2', 'x<4 or x>2', 'x>-1 or x>1', 'D'),
(216, 3, '<p><img alt=\"\" src=\"mth_question/question6.JPG\" style=\"height:51px; width:192px\" /></p>\r\n', 'x=5, x=5/2 and x=1', 'x=3, x=5/2 and x=1', 'x=3, x=2/3 and x=5', 'x=3, x=5/2 and x=4', 'B'),
(217, 3, '<p><img alt=\"\" src=\"mth_question/question9.JPG\" style=\"height:50px; width:147px\" /></p>\r\n', '2<sup>7x</sup>', '2<sup>3x</sup>', '4<sup>x</sup>', '8<sup>x</sup>', 'A'),
(218, 3, '<p><img alt=\"\" src=\"mth_question/question10.JPG\" style=\"height:33px; width:303px\" /></p>\r\n', '0', '1', '2', '3', 'A'),
(219, 3, '<p>In the expansion of (a+b)<sup>n</sup>, for a large n, the best method to apply is</p>\r\n', 'Pascalâ€™s triangle', 'Binomial expansion', 'Polynomial', 'Factorization', 'B'),
(220, 3, '<p>&hellip;&hellip;&hellip;&hellip;&hellip;&hellip; is the summation of terms of some sequence</p>\r\n', ' G.P', 'A.P', 'Series', 'Sequence', 'C'),
(221, 3, '<p>Given that x = -2 is a factor of 5x<sup>4</sup> &ndash; 21x<sup>3</sup> &ndash; Px<sup>2</sup> &ndash; 26x + 4 = 0. What is the value of P?</p>\r\n', '70', '72', '74', '76', 'D'),
(222, 3, '<p>x<sup>2</sup> &ndash; 9 = 0 and 16y<sup>2</sup> &ndash; 4 = 0. Find xy</p>\r\n', '2/3', '3/2', '10/3', '3/10', 'B'),
(223, 3, '<p>N = Set of all natural Numbers</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; V = Set of Countable Numbers</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; W = Set of all Real Numbers</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Z = Set of all Integers</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; R = Set of all Rational Numbers</p>\r\n\r\n<p>Which of the following is correct?</p>\r\n', ' N C V C W C R C Z', 'N C V C W C R C Z', 'N C Z C R C W C V', 'N C Z C R C W C V', 'C'),
(224, 3, '<p>Set theory was formally initiated by?</p>\r\n', ' Georg Carter (19th Century)', 'George Canter (18th Century)', 'George Canter (19th Century)', 'Georg Carte (18th Century)', 'C'),
(225, 3, '<p><img alt=\"\" src=\"mth_question/q24.png\" style=\"height:36px; width:265px\" /></p>\r\n', 'log<sup>X</sup>â¡3', 'log<sup>X</sup>4', 'log<sup>X</sup>5', 'log<sup>X</sup>6', 'A'),
(226, 3, '<p>If p,q,r are three consecutive terms of an AP whose sum is 24. The ratio p:r = 6:1. Find p, q and r.</p>\r\n', '11,12,13', '12,15,18', 'No option', '-12,-7,-2', 'C'),
(227, 10, '<p>Newton&#39;s law of Universal gravitation is represented by F = (GM<sub>1</sub>M<sub>2</sub>)/r<sub>2</sub>. All symbols have their usual meaning.</p>\r\n\r\n<p>The dimesion of G is equal to _________________</p>\r\n', 'MLT<sup>-2</sup>', 'M<sup>-2</sup>L<sup>3</sup>T<sup>-2</sup>', 'M<sup>-2</sup>LT<sup>-2</sup>', 'MLT', 'B'),
(228, 10, '<p>A Car is driven a distnce of 50m eastwards, then norward for 30m and then 25m in the direction 30<sup>o</sup> east of north. Determine the total displacement of the car from the starting points</p>\r\n', '71.65m', '81.1cm', '99.54m', '81.1m', 'D'),
(229, 10, '<p>Find the angle between the vector E and H, If E= i +2j + 3k and H=7i - 5j + K</p>\r\n', '0<sup>o</sup>', '0', '90<sup>o</sup>', '90', 'C'),
(230, 10, '<p>Which of the following Physical quantity is NOT a vector?</p>\r\n', 'Momentum', 'Force', 'Mass', 'Velocity', 'C'),
(231, 10, '<p>A pirate ship is located 560m from a front defending the harbor entrace of an island. A defence at see located at the entrace of 82ms<sup>-1 </sup>. At what possible angle from the horizontal must shell be fired to hit the ship</p>\r\n', '54.7<sup>o</sup>', '82.05<sup>o</sup>', '27.35<sup>o</sup>', '64.63<sup>o</sup>', 'C'),
(232, 10, '<p>Which of the following is not an SI Basic Unit?</p>\r\n', 'Meter', 'Kilogram', 'Newton', 'Ampere', 'C'),
(233, 10, '<p>The Position of a particle moving on an X axis is given by;</p>\r\n\r\n<p>X = 13.2 + 8.9t<sup>2</sup> + 1.2t<sup>3 , </sup>What is the acceleration of the particle at time t=2.6s?</p>\r\n', '70.6m/s<sup>2</sup>', '57.4m/s<sup>2</sup>', '27.2m/s<sup>2</sup>', '36.5m/s<sup>2</sup>', 'D'),
(234, 10, '<p>The gravitational force of attraction F between two particles M<sub>1</sub> and M<sub>2</sub> separated by distance r is given as F=K<sup>-x</sup>[M<sub>1</sub>M<sub>2</sub>]<sub>y</sub>R<sub>z</sub> . If K is a demensional constant and its dimension is given as M<sup>-1</sup>L<sup>3</sup>T<sup>-2 </sup>. The values of x, y and z are respectively equal to</p>\r\n', 'x = -1, y = 1 and z = -2', 'x = 1, y = 1 and z = -2', 'x = 2, y = 1 and z = -1', 'x = 1, y = 1 and z = 2', 'A'),
(235, 10, '<p>For which of the following sets are fundamentals unit?</p>\r\n', 'Volume, Length, speed', 'Area, Length, Volume', 'Volume, mass, time', 'Time, distance, area', 'C'),
(236, 10, '<p>A body moving along a straight line 40m/s undergoes an acceleration of 4m/s<sup>2 </sup>. After 10seconds. It speed will be</p>\r\n', '20m/s', '28m/s', '16m/s', '80m/s', 'D'),
(237, 10, '<p>When an Object is moving with uniform velocity, What is its acceleration?</p>\r\n', 'Zero', 'Uniform', 'Non-uniform', 'Negative', 'A'),
(238, 10, '<p>A speed of 90km/h, expressed in cms<sup>-1</sup> is</p>\r\n', '2.5', '2500', '300', '90', 'B'),
(239, 10, '<p>A bullet is fired horizontally with a velocity of 40m/s from the top of a building 50m high. How far from the foot of the building will the bullet be assumed to touch the ground? (taking g=10m/s<sup>2 </sup>)</p>\r\n', '126.485', '126.48m', '3.16s', '2000m', 'B'),
(240, 10, '<p>A cyclist moving with constant acceleration accelerates from rest to 2.0m/s in 5s and then continues at a constant velocity. How far does it travel while speeding up?</p>\r\n', '5m', '5m/s', '5s', '5m/s<sup>2</sup>', 'A'),
(241, 10, '<p>The ability or tendency of a body to return to it original shape after being deformed privided the force was not two great is term ____________</p>\r\n', 'Surface tension', 'Bulk Modulus', 'Elasticity', 'Viscosity', 'C'),
(242, 10, '<p>A typical brick has a mass of 2,268g and occupies a volume of 1,230cm<sup>3 </sup>. What is the density of teh brick</p>\r\n', '1.84g/cm<sup>3</sup>', '18.5cm<sup>3</sup>/g', '1530g/cm<sup>3</sup>', '1.3 X 10<sup>-3</sup>cm<sup>3</sup>/g', 'A'),
(243, 10, '<p>______________________ can be defined as the functional force between two layers of moving fluid</p>\r\n', 'angle of contact', 'viscosity', 'Tension', 'Modulli', 'B'),
(244, 10, '<p>A guitar string has a length of 10.0m and a cross-section area of 2 x 10<sup>-6</sup>m<sup>2</sup>. by how much you strech the guitar string to obtain a tension of 50N? Given that the young modulus of the guitar string is 2 X 10<sup>9</sup>Pa</p>\r\n', '125m', '0.125m', '1040m', '4000m', 'B'),
(245, 10, '<p>The materials which elongate and undergo plastic deformation until they break are termed</p>\r\n', 'Elastic materials', 'viscous materials', 'Brittle Materials', 'Ductile materials', 'D'),
(246, 10, '<p>________________&nbsp; is perculiear to fluids</p>\r\n', 'Elasticity', 'Bulk Modulus', 'Young Modulus', 'Shear modulus', 'D'),
(247, 10, '<p>______________ materials breaks just after elastic limit is reached<br />\r\n&nbsp;</p>\r\n', 'Brittle', 'Ductile', 'Soft', 'Solid', 'A'),
(248, 10, '<p>The relative change in size or shape of a body is referred to as</p>\r\n', 'Stress', 'Strain', 'Ductility', 'Elasticity', 'B'),
(249, 10, '<p>Shear modulus can be defined as</p>\r\n', 'Ratio of shear stress to shear strain', 'ratio of tensile stress to tensile strain', 'ratio of elasticity to shear modulus', 'ratio of young modulus to shear strain', 'A'),
(250, 10, '<p>A vertical steel beam in a bulding support a lord of 60000N. If the length of the beam is 40m and it cross-section area is 0.008m<sup>2</sup>. Find the distance it is compressed along it length (Young Modulus of steel = 2X10<sup>11</sup>Pa)</p>\r\n', '0.00015m', '0.0015m', '0.015m', '0.15m', 'B'),
(251, 11, '<p>_______________ is an example of a colonial organism</p>\r\n', 'Volvox', 'spirogyra', 'Zygnema', 'Oedogonium', 'A'),
(252, 11, '<p>Prophase 1 of meiosos 1 is sub-divided into the following except _____________</p>\r\n', 'Zygonema', 'Leptonema', 'Chromonema', 'Pachynema', 'C'),
(253, 11, '<p>The scientist who discovered the protoplasm of the cell is _____________</p>\r\n', ' Robert hook', 'Mathias Schleiden', 'Rudolfvon Virchow', 'Felix Dujardin', 'D'),
(254, 11, '<p>The form of cell that lie side by side are reffered to as ______________</p>\r\n', 'Independent', 'Colony', 'Organism', 'Filament', 'D'),
(255, 11, '<p>The component of cell which functions in the synthesis of protein is called ______________</p>\r\n', 'Golgi body', 'Lysoseme', 'Nucleolus', 'Ribosome', 'D'),
(256, 11, '<p>____________________ condensed to form a chromosome</p>\r\n', 'Chromomere', 'Chromatids', 'Centromere', 'Chromatin fibre', 'D'),
(257, 11, '<p>The factors affecting diffusion are as follows except ______________</p>\r\n', 'Differences in concentration', 'State of matter', 'Molecular size', 'Diffusing power', 'D'),
(258, 11, '<p>The point that joins the chromosome to the spindle fibre on the centromere is the ____________</p>\r\n', ' Chinatocore', 'Kinetocore', 'Kinetokore', 'Kinetocore', 'D'),
(259, 11, '<p>Robert Hook came out with the outcome of his discovery on cell in the year _________</p>\r\n', '1996', '1966', '1665', '1938', 'C'),
(260, 11, '<p>The following are part of the interactions between cell and its environment except _______________</p>\r\n', 'Turbidity', 'Haemolysis', 'Flaccidity', 'Turgidity', 'A'),
(261, 11, '<p>Chromomeres are seen in ________________ stage of prophase 1 of meiotic division 1</p>\r\n', 'Diaknesis', 'Zygotene', 'Leptotene', 'Pachytene', 'C'),
(262, 11, '<p>The division of the nucleus is known as _______________</p>\r\n', 'Interkinesis', 'Interkinesis', 'Cytokinesis', 'Karyotype', 'B'),
(263, 11, '<p>The region where the centriole is produced in the cell is called _________________</p>\r\n', 'Chromosome', 'Centrosome', 'Centriosome', 'Chromomere', 'B'),
(264, 11, '<p>The interior part of the nucleus is called _____________</p>\r\n', 'Nucleosome', 'Nucleolus', 'Nucleoplasm', 'Nuclear membrane', 'C'),
(265, 11, '<p>______________ literally means coloured material</p>\r\n', 'Chromatid', 'Chromomere', 'Centriole', 'Chromatin', 'D'),
(266, 11, '<p>One of these is not found in the chloroplast______________</p>\r\n', 'Cristae', 'Thylakoid disk', 'Thylakoid membrane', 'Grana', 'A'),
(267, 11, '<p>The non-pigmented plastid found in the plant is the ________________</p>\r\n', 'Chloroplast', 'Thromoplast', 'Etioplast', 'Leucoplast', 'C'),
(268, 11, '<p>The cell wall of fungi are made of _____________</p>\r\n', 'Cellulose', 'Chitin', 'Peptidoglycan complex', 'Phospholipids', 'B');
INSERT INTO `question` (`que_id`, `exam_id`, `question`, `opt_A`, `opt_B`, `opt_C`, `opt_D`, `ans`) VALUES
(269, 11, '<p>The cell component which carry organelles is the__________________</p>\r\n', 'Protoplasm', 'Cytoplasm', 'Nucleus', 'Mitochondrion', 'B'),
(270, 11, '<p>Another name for dictyosome is _______________</p>\r\n', 'Nucleus', 'Protoplasm', 'Golgi body', 'Cytoplasm', 'C'),
(271, 11, '<p>One of the following is not an example of protozoa</p>\r\n', 'Amoeba', 'Paramecium', 'Euglena', 'Hydra', 'D'),
(272, 11, '<p>What is invested in schlerenchyma cells that makes it hard?</p>\r\n', 'Lignin', 'Grana', 'Stromatids', 'Collagen', 'A'),
(273, 11, '<p>Which of the following is the process of acquiring energy and material?</p>\r\n', 'Photosynthesis', 'Nutrition', 'Respiration', 'Digestion', 'B'),
(274, 11, '<p>The most fundamental material needed by living organisms is _____________</p>\r\n', 'Beryllium', 'Helium', 'Carbon', 'Oxygen', 'C'),
(275, 11, '<p>An organism capable of synthesizing its own organic substances from inorganic compound is called ___________</p>\r\n', 'Chemotroph ', 'Autrotroph', 'Litotroph ', 'Organotroph', 'B'),
(276, 11, '<p>Chlorophyll resides in the ________________</p>\r\n', 'Wax cuticle', 'Spongy mesophyll', 'Heavy maple syrup', 'Thylakoid membrane', 'D'),
(277, 11, '<p>All the following are under the classification of protozoa except _______________</p>\r\n', 'Sarcomastigophora', 'FIlicales', 'Microspora', 'Opalinata', 'B'),
(278, 11, '<p>The science of classification and identification of organism is known as ______________</p>\r\n', 'Hierarchy', 'Nomenclature', 'Taxonomy', 'Grouping', 'C'),
(279, 11, '<p>A collection of related divisions forms the__________</p>\r\n', 'Family', 'Phylum', 'Variety', 'Kingdom', 'D'),
(280, 11, '<p>Another biological term for fertilization is called _____________</p>\r\n', 'Isogamy', 'Syngamy', 'Oogamy', 'Anisogamy', 'B'),
(281, 11, '<p>Peptidoglycan complex is only found in the wall of ________________</p>\r\n', 'Bacterial', 'Fungi', 'Virus', 'Protozoa', 'A'),
(282, 11, '<p>Generally, the subphylum vertebrate is divided into _____________</p>\r\n', '9', '12', '7', '3', 'C'),
(283, 11, '<p>The dark reaction stage of the photosynthesis is also known as _____________________</p>\r\n', 'Citric acid cycle', 'Lactid acid cycle', 'Calvin cycle', 'Fermentation cycle', 'C'),
(284, 11, '<p>The following are macronutrients except ________________</p>\r\n', 'Nitrogen', 'Iron ', 'Phosphorous ', 'Potassium', 'B'),
(285, 11, '<p>One of the following is a micronutrient</p>\r\n', 'Iron ', 'Sulphur ', 'Nitrogen ', 'Phosphorous', 'A'),
(286, 11, '<p>The movement of plant part in response to light stimulus is ____________</p>\r\n', 'Photolysis ', 'Photomotion ', 'Photosynthesis ', 'Phototropism', 'D'),
(287, 11, '<p>The following are most important excretory organs in vertebrate except ___________</p>\r\n', 'Lungs ', 'Gills ', 'Skin ', 'Liver', 'B'),
(288, 11, '<p>Each cerebral hemispheres is composed of the following lobes except ____________</p>\r\n', 'Frontal ', 'Pariental ', 'Transverse ', 'Occipital', 'C'),
(289, 11, '<p>Yeast is an example of _______________ classification of fungi</p>\r\n', 'Myxomyectes ', 'Phycomyectes ', 'Ascomycetes ', 'Basidiomycetes', 'C'),
(290, 11, '<p>_______________ is formed from the association of a fungus and an algae</p>\r\n', 'Thallus ', 'Liverwort ', 'Fern ', 'Lichen', 'D'),
(291, 11, '<p>The petiole in class filicinae is covered by brownish hairs called _____________</p>\r\n', 'Pinnules', 'Ramenta ', 'Apophysis ', 'Theca', 'B'),
(292, 11, '<p>Cnidaria is another name for the phylum _______________</p>\r\n', 'Protozoa ', 'Porifera ', 'Coelenterate ', 'Nematoda', 'C'),
(293, 11, '<p>The layer found in between the ectoderm and endoderm of the coelenterates is the ____________</p>\r\n', 'Mesoglea ', 'Mesoglae ', 'Mesegloea ', 'Mesglae', 'A'),
(294, 11, '<p>The larvae stage of _____________ are called decacanth</p>\r\n', 'Cestoda ', 'Trematoda ', 'Turbellaria ', 'Cestodaria', 'D'),
(295, 11, '<p>Clitellum is found in _________________-</p>\r\n', 'Snail ', 'Cockroach ', 'Earthworm ', 'Planaria', 'C'),
(296, 11, '<p>Periplanata Americana is the scientific name of ______________</p>\r\n', 'Snail ', 'Cockroach ', 'Grasshopper ', 'Planaria', 'B'),
(297, 11, '<p>The limbs of the following vertebrate follows the generalized pentadactyl plan except ______________</p>\r\n', 'Pisces ', 'Amphibians ', 'Reptiles ', 'Birds', 'A'),
(298, 11, '<p>_________ are the vertebrate that are not tetrapods</p>\r\n', 'Pisces ', 'Amphibians ', 'Reptiles ', 'Mammals', 'A'),
(299, 11, '<p>The points on the chromosomes where crossing over takes place is called ______________</p>\r\n', 'Chromatid ', 'Chiasma ', 'Chiasmata ', 'Chromatin', 'B'),
(300, 11, '<p>Stachyose is an example of ___________</p>\r\n', 'Monosaccharide ', 'Disaccharide ', 'Oligosaccharide ', 'Polysaccharide', 'C'),
(301, 11, '<p>_________________ gives the cell its functionality</p>\r\n', 'Gene ', 'Chromosome ', 'Organelles ', 'Membrane', 'C'),
(302, 11, '<p>The nature of the -------- determines the type of amino acid</p>\r\n', 'Alpha carbon', 'R-group', 'Carboxyclic group', ' Amine group', 'D'),
(303, 11, '<p>The German Biologist&nbsp; who discovered that all cells come from previously existing cell is ________________</p>\r\n', 'Robert hook', 'Rudolf Van Virchow', 'Theodor Schwann', 'Anton Van Leewenhoek', 'B'),
(304, 11, '<p>Cells that lie side by side are _____________ cells</p>\r\n', 'Filamentous ', 'Colony ', 'independent ', 'Free-living', 'A'),
(305, 11, '<p>Glucose is a/an ___________________</p>\r\n', 'Aldopentose ', 'Ketohexose ', 'Aldohexose ', 'Ketopentose', 'C'),
(306, 11, '<p>_______________________ is an acidic amino acid</p>\r\n', 'Aseorbic acid', 'Aspartic acid', 'Glucidic acid', 'Palmitic acid', 'B'),
(307, 11, '<p>Felix Dujardin, a French Biologist discovered the ___________</p>\r\n', 'Cytoplasm ', 'Nucleus ', 'Protoplasm  ', 'Mitochondrion', 'C'),
(308, 11, '<p>________________ joins two sister chromatids together</p>\r\n', 'Centriole ', 'Spindle fibre', 'Chromomere ', 'Centromere', 'D'),
(309, 11, '<p>The loose connective tissue is made up of the following except</p>\r\n', 'Collagen fibres', 'Elastic fibres', 'Ground substance', 'Areolar fibres', 'D'),
(310, 11, '<p>Arrangement of the chromosomes on the equator of the spindle fibre occurs in ________</p>\r\n', 'Anaphase ', 'Metaphase ', 'Telophase ', 'Prophase', 'B'),
(311, 11, '<p>A band which joins two monosaccharides together to form a disaccharide is called ____________ bond</p>\r\n', 'Ionic ', 'Gluconic ', 'Hydrogen ', 'Glucosidic', 'D'),
(312, 12, '<p>They <u>each</u> got a house. What kind of pronoun is the underlined word?</p>\r\n', 'demonstrative ', 'relative ', 'distributive ', 'general ', 'C'),
(313, 12, '<p>The plural form of the word &ldquo;stadium&quot; is</p>\r\n', 'stadium ', 'stadiumes ', 'stadiums ', 'stadia ', 'D'),
(314, 12, '<p><u>When</u> was the match? The underlined word is what kind of pronoun?</p>\r\n', 'interrogative ', 'relative ', 'indefinite ', 'demonstrative ', 'A'),
(315, 12, '<p>&ldquo;We danced&rdquo; has which of the following structures?</p>\r\n', '3<sup>rd</sup> person plural', '1<sup>st</sup> person plural', '2<sup>nd</sup> person sing', '3<sup>rd</sup> person sing', 'A'),
(316, 12, '<p>It is ________</p>\r\n', 'my ', 'mined ', 'mine ', 'mine own', 'C'),
(317, 12, '<p>They gave us <em>many</em> things. The italicized word is a/an</p>\r\n', 'adjective ', 'noun ', 'adverb ', 'pronoun ', 'A'),
(318, 12, '<p>His shop is adjacent mine. <em>This sentence is in what case?</em></p>\r\n', 'genitive ', 'objective ', 'subjective ', 'passive ', 'A'),
(319, 12, '<p>I <u>am</u> great. The underlined word is</p>\r\n', 'auxiliary verb', 'principal verb', 'preposition ', 'noun ', 'B'),
(320, 12, '<p>Some penguins <u>floated by</u>. The underlined expression is a/an</p>\r\n', 'conditional phrase', 'prepositional phrase', 'verb phrase ', 'adverbial phrase ', 'B'),
(321, 12, '<p>&ldquo;Sanctification&rdquo; belongs to what word class?</p>\r\n', 'Pronoun ', 'adjective ', 'adjective ', 'noun ', 'D'),
(322, 12, '<p>That is the boy who ______ stole the meat.</p>\r\n', 'suppose ', 'supposedly ', 'supposed to', 'suppose to', 'B'),
(323, 12, '<p>He gave me ___ oranges</p>\r\n', 'a', 'an', 'this', 'some', 'D'),
(324, 12, '<p>I have <u>no</u> time to waste. The underlined expression is a/an _______</p>\r\n', 'Adverb ', 'Preposition ', 'adjective ', 'negation ', 'C'),
(325, 12, '<p>The woman denied knowing her <u>own</u> husband. The underlined word is what kind of adjective?</p>\r\n', 'possessive ', 'demonstrative ', 'distributive ', 'emphasizing ', 'D'),
(326, 12, '<p>Help us to read oh God. What kind of a sentence is this by function?</p>\r\n', 'imperative ', 'interrogative ', 'exclamatory ', 'declarative ', 'A'),
(327, 12, '<p>Henrietta likes <u>to play football</u>.</p>\r\n', 'Prepositional phrase ', 'Verb phrase', 'adjectival phrase', 'noun clause', 'B'),
(328, 12, '<p>Whose are ____?</p>\r\n', 'this', 'those', 'that', 'them', 'B'),
(329, 12, '<p>Hope you slept well. This sentence is functioning as a/an ____ sentence</p>\r\n', 'Imperative ', 'Declarative ', 'Exclamatory ', 'Interrogative', 'B'),
(330, 12, '<p>He threw the ball at me while he was fighting. This sentence is by structure a ____ sentence</p>\r\n', 'complex ', 'compound ', 'complex-compound', 'compound-complex', 'A'),
(331, 12, '<p>I would be going for rehearsals tomorrow. That would be the best time to see my peers. <em>What cohesive device is used in the above sentences?</em></p>\r\n', 'Repetition ', 'Substitution ', 'Ellipsis ', 'Conjunction ', 'B'),
(332, 12, '<p>The guy moved <u>stealthily</u>. The underlined word is an adverb of __</p>\r\n', 'time ', 'degree ', 'manner ', 'pattern ', 'C'),
(333, 12, '<p>If the topic of an essay is &ldquo;One man&rsquo;s meat is another man&rsquo;s poison&rdquo;. <em>The essay can be said to be </em></p>\r\n', 'philosophical ', 'narrative ', 'biographical', 'debate ', 'B'),
(334, 12, '<p>He ran <u>up and down</u>.</p>\r\n', 'adjectival phrase', 'adverb phrase', 'verb phrase', 'noun phrase', 'B'),
(335, 12, '<p>Which of the following represents the 3R in the SQ3R technique?</p>\r\n', 'Read, Review and Recite', 'Recite, Recall and Remember', 'Recall, Review and Recite', 'Read, Recall and Review', 'D'),
(336, 12, '<p>All of the following are obstacles to efficient reading except ____</p>\r\n', 'Eye-movement', 'Reasoning ', 'Regression ', 'Head movement', 'B'),
(337, 12, '<p>A student reads 700 words in 4minutes, 20 seconds, what is his reading speed?</p>\r\n', '162WPM ', '3WPM ', '166WPM ', '22WPM ', 'A'),
(338, 12, '<p>Which of the following is not a formation strategy?</p>\r\n', 'Rhetorical questions', 'Substitution ', 'Repetition ', 'Definition ', 'B'),
(339, 12, '<p>Morphemes that are attached to the end of independent words are known are ________</p>\r\n', 'affixes ', 'free ', 'compound ', 'suffixes ', 'D'),
(340, 12, '<p>The process of deriving new meanings by adding morphemes to existing words is known as ______</p>\r\n', 'coinage ', 'derivation ', 'affixation ', 'neologism ', 'C'),
(341, 12, '<p>Morphemically rip apart the word &ldquo;known&rdquo;</p>\r\n', 'know-n', 'know-ed', 'known-d', 'know-en', 'D'),
(342, 12, '<p>The feminine word for &ldquo;sorcerer&rdquo; is</p>\r\n', 'sorceres ', 'sorcerer ', 'sorcerers ', 'sorceress ', 'D'),
(343, 12, '<p>The singular form of the noun &ldquo;scissors&quot; is</p>\r\n', 'scissors ', 'scissor ', 'sciss ', 'scissores ', 'A'),
(344, 12, '<p>The chef <u>who</u> dished out the food is back. The underlined word is what kind of pronoun?</p>\r\n', 'interrogative ', 'relative ', 'indefinite ', 'demonstrative', 'B'),
(345, 12, '<p>That was the <em>exact </em>game he was playing. The italicized word is a/an</p>\r\n', 'adjective ', 'noun ', 'adverb ', 'pronoun ', 'A'),
(346, 12, '<p>That was the boy <u>who</u> gave him the house. The word preceding the underlined word is the</p>\r\n', 'preceding word', 'boy ', 'antecedent ', 'relative adverb', 'C'),
(347, 12, '<p>I have <u>no</u> time to waste. <em>What is the underlined word?</em></p>\r\n', 'noun ', 'antecedent ', 'negation ', 'adjective ', 'D'),
(348, 12, '<p>We reached home <u>then</u>.</p>\r\n', 'Adverb ', 'Preposition ', 'Adjective ', 'Noun ', 'A'),
(349, 12, '<p>A style of writing where a line free of writing is used to separate paragraphs is known as ____ style</p>\r\n', 'indentation ', 'Header ', 'Block ', 'block-header', 'C'),
(350, 12, '<p>Neither the conductor nor the choristers _____ oranges.</p>\r\n', 'sell', 'sells', 'selled', 'selling', 'A'),
(351, 12, '<p>I have no money <u>to spend</u>. The underlined expression is</p>\r\n', 'Adverbial phrase ', 'Noun phrase ', 'Adverbial clause ', 'Adjectival phrase ', 'D'),
(352, 12, '<p>To <u>man</u> a gate. The underlined word is what word class in this context?</p>\r\n', 'verb ', 'noun ', 'adjective ', 'adverb ', 'A'),
(353, 12, '<p>He came <u>in order that</u> He might save mankind. The underlined expression is</p>\r\n', 'Phrasal preposition ', 'Phrasal conjunction', 'Prepositional phrase ', 'verb phrase ', 'B'),
(354, 12, '<p>One of the following is not a cohesive device</p>\r\n', 'Repetition ', 'Exemplification ', 'Ellipsis ', 'Conjunction', 'B'),
(355, 12, '<p>The topic &ldquo;The scientist is no philosopher&rdquo; is what kind of essay?</p>\r\n', 'Instructional ', 'Descriptive ', 'Philosophical ', 'Biographical ', 'C'),
(356, 12, '<p><u>What cannot be cured</u> must be endured. The underlined expression is</p>\r\n', 'Noun clause', 'Adjectival clause', 'Noun phrase', 'Conditional clause', 'A'),
(357, 12, '<p>The connotative meaning of <strong>fire </strong>is ____</p>\r\n', 'conflagration ', 'difficulty ', 'hard times ', 'infinite ', 'A'),
(358, 12, '<p>All of the following are categories of summary except _______</p>\r\n', 'short summary', ' note writing', 'note making', 'long summary', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int NOT NULL,
  `user_id` int NOT NULL,
  `exam_id` int NOT NULL,
  `score` int NOT NULL,
  `date_attempted` varchar(200) NOT NULL,
  `semester` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `user_id`, `exam_id`, `score`, `date_attempted`, `semester`) VALUES
(1, 7, 2, 26, '1411669948', '1'),
(2, 9, 2, 26, '1411670214', '1'),
(3, 8, 2, 34, '1411670380', '1'),
(4, 10, 2, 37, '1411670427', '1'),
(14, 12, 1, 100, '1427754842', '1'),
(27, 7, 1, 50, '1428858565', '1'),
(29, 8, 3, 100, '1429390380', '1'),
(30, 8, 1, 0, '1429451081', '1'),
(31, 14, 0, 0, '1432140194', '1'),
(32, 35, 0, 0, '1432140227', '1'),
(33, 35, 0, 0, '1432140234', '1'),
(34, 36, 0, 0, '1432140256', '1'),
(35, 18, 0, 0, '1432140263', '1'),
(36, 39, 0, 0, '1432140265', '1'),
(37, 35, 0, 0, '1432140322', '1'),
(38, 36, 0, 0, '1432140393', '1'),
(39, 39, 0, 0, '1432140480', '1'),
(40, 18, 0, 0, '1432140492', '1'),
(41, 14, 0, 0, '1432140539', '1'),
(42, 35, 7, 40, '1432141273', '1'),
(43, 32, 7, 90, '1432141404', '1'),
(44, 36, 7, 55, '1432141435', '1'),
(45, 18, 7, 65, '1432141441', '1'),
(46, 16, 7, 60, '1432141457', '1'),
(47, 39, 7, 50, '1432141459', '1'),
(48, 13, 7, 40, '1432141512', '1'),
(49, 14, 7, 50, '1432141531', '1'),
(50, 37, 7, 35, '1432141888', '1'),
(51, 43, 7, 40, '1432141936', '1'),
(52, 17, 7, 60, '1432142255', '1'),
(53, 34, 7, 50, '1432142262', '1'),
(54, 33, 7, 40, '1432142544', '1'),
(55, 40, 7, 70, '1432142572', '1'),
(56, 22, 7, 45, '1432142591', '1'),
(57, 29, 7, 15, '1432142704', '1'),
(58, 38, 7, 50, '1432142752', '1'),
(59, 19, 7, 50, '1432142983', '1'),
(60, 49, 7, 65, '1432143247', '1'),
(61, 21, 7, 35, '1432143296', '1'),
(62, 48, 7, 80, '1432143309', '1'),
(63, 48, 7, 80, '1432143309', '1'),
(64, 42, 7, 45, '1432143376', '1'),
(65, 44, 7, 45, '1432143574', '1'),
(66, 46, 7, 35, '1432143619', '1'),
(67, 38, 6, 50, '1432143640', '1'),
(68, 47, 7, 45, '1432143642', '1'),
(69, 49, 6, 80, '1432143690', '1'),
(70, 45, 7, 80, '1432143698', '1'),
(71, 19, 6, 80, '1432143795', '1'),
(72, 40, 6, 55, '1432143960', '1'),
(73, 34, 6, 80, '1432144132', '1'),
(74, 35, 6, 60, '1432144269', '1'),
(75, 41, 6, 40, '1432144311', '1'),
(76, 42, 6, 55, '1432144334', '1'),
(77, 48, 6, 45, '1432144414', '1'),
(78, 37, 6, 35, '1432144482', '1'),
(79, 21, 6, 40, '1432144612', '1'),
(80, 45, 6, 60, '1432144641', '1'),
(81, 33, 6, 50, '1432144651', '1'),
(82, 13, 6, 55, '1432144741', '1'),
(83, 22, 6, 35, '1432144857', '1'),
(84, 32, 6, 70, '1432144929', '1'),
(85, 14, 6, 55, '1432145007', '1'),
(86, 44, 6, 35, '1432145097', '1'),
(87, 39, 6, 50, '1432145136', '1'),
(88, 16, 6, 55, '1432145213', '1'),
(89, 36, 6, 50, '1432145255', '1'),
(90, 17, 6, 65, '1432145257', '1'),
(91, 46, 6, 75, '1432145423', '1'),
(92, 43, 6, 55, '1432145443', '1'),
(93, 47, 6, 40, '1432145466', '1'),
(94, 18, 6, 85, '1432145501', '1'),
(95, 29, 6, 45, '1432145794', '1'),
(96, 25, 6, 70, '1432146114', '1'),
(97, 51, 7, 55, '1432146276', '1'),
(98, 50, 7, 35, '1432146339', '1'),
(99, 51, 6, 50, '1432146891', '1'),
(100, 50, 6, 65, '1432146948', '1'),
(101, 25, 7, 45, '1432146974', '1'),
(102, 35, 5, 27, '1432222895', '1'),
(103, 40, 5, 53, '1432222955', '1'),
(104, 33, 5, 53, '1432222957', '1'),
(105, 13, 5, 7, '1432222982', '1'),
(106, 55, 5, 67, '1432222985', '1'),
(107, 39, 5, 53, '1432223035', '1'),
(108, 46, 5, 40, '1432223039', '1'),
(109, 34, 5, 20, '1432223044', '1'),
(110, 21, 5, 47, '1432223061', '1'),
(111, 44, 5, 40, '1432223093', '1'),
(112, 57, 5, 60, '1432223226', '1'),
(113, 49, 5, 60, '1432223862', '1'),
(114, 42, 5, 47, '1432223963', '1'),
(115, 48, 5, 40, '1432224164', '1'),
(116, 58, 5, 73, '1432224178', '1'),
(117, 38, 5, 13, '1432224206', '1'),
(118, 23, 5, 33, '1432224268', '1'),
(119, 16, 5, 53, '1432224285', '1'),
(120, 36, 5, 40, '1432224285', '1'),
(121, 15, 5, 47, '1432224315', '1'),
(122, 17, 5, 47, '1432224349', '1'),
(123, 22, 5, 20, '1432224375', '1'),
(124, 32, 5, 60, '1432224443', '1'),
(125, 18, 5, 40, '1432224601', '1'),
(126, 26, 5, 27, '1432224672', '1'),
(127, 45, 5, 27, '1432224739', '1'),
(128, 20, 5, 27, '1432224853', '1'),
(129, 35, 9, 40, '1432225084', '1'),
(130, 33, 9, 40, '1432225105', '1'),
(131, 34, 9, 60, '1432225162', '1'),
(132, 19, 5, 47, '1432225180', '1'),
(133, 13, 9, 32, '1432225291', '1'),
(134, 46, 9, 52, '1432225332', '1'),
(135, 55, 9, 52, '1432225334', '1'),
(136, 44, 9, 64, '1432225342', '1'),
(137, 39, 9, 44, '1432225404', '1'),
(138, 47, 5, 60, '1432225438', '1'),
(139, 40, 9, 44, '1432225440', '1'),
(140, 18, 9, 76, '1432225548', '1'),
(141, 57, 9, 60, '1432225549', '1'),
(142, 19, 9, 36, '1432225835', '1'),
(143, 49, 9, 52, '1432225871', '1'),
(144, 42, 9, 32, '1432225982', '1'),
(145, 48, 9, 44, '1432226075', '1'),
(146, 15, 9, 40, '1432226076', '1'),
(147, 22, 9, 56, '1432226097', '1'),
(148, 23, 9, 52, '1432226100', '1'),
(149, 47, 9, 56, '1432226111', '1'),
(150, 21, 9, 48, '1432226114', '1'),
(151, 58, 9, 60, '1432226221', '1'),
(152, 16, 9, 80, '1432226225', '1'),
(153, 36, 9, 60, '1432226266', '1'),
(154, 17, 9, 56, '1432226452', '1'),
(155, 38, 9, 20, '1432226458', '1'),
(156, 26, 9, 56, '1432226541', '1'),
(157, 45, 9, 56, '1432226584', '1'),
(158, 20, 9, 64, '1432226688', '1'),
(159, 14, 9, 52, '1432226836', '1'),
(160, 32, 9, 76, '1432226865', '1'),
(161, 25, 9, 56, '1432226921', '1'),
(162, 52, 9, 68, '1432226955', '1'),
(163, 51, 5, 60, '1432227163', '1'),
(164, 14, 5, 27, '1432227568', '1'),
(165, 25, 5, 60, '1432228013', '1'),
(166, 59, 3, 40, '1432310980', '1'),
(167, 34, 3, 50, '1432310990', '1'),
(168, 35, 3, 45, '1432310993', '1'),
(169, 46, 3, 40, '1432310996', '1'),
(170, 44, 3, 50, '1432310999', '1'),
(171, 55, 3, 40, '1432311039', '1'),
(172, 40, 3, 55, '1432311076', '1'),
(173, 49, 3, 75, '1432311090', '1'),
(174, 13, 3, 45, '1432311091', '1'),
(175, 42, 3, 20, '1432311130', '1'),
(176, 22, 3, 30, '1432312058', '1'),
(177, 23, 3, 50, '1432312381', '1'),
(178, 16, 3, 55, '1432312453', '1'),
(179, 37, 3, 45, '1432312607', '1'),
(180, 41, 3, 30, '1432312634', '1'),
(181, 18, 3, 50, '1432312634', '1'),
(182, 33, 3, 55, '1432312684', '1'),
(183, 17, 3, 55, '1432312735', '1'),
(184, 39, 3, 45, '1432312803', '1'),
(185, 45, 3, 45, '1432312829', '1'),
(186, 14, 3, 45, '1432313552', '1'),
(187, 32, 3, 85, '1432313666', '1'),
(188, 47, 3, 60, '1432313849', '1'),
(189, 36, 3, 50, '1432314039', '1'),
(190, 48, 3, 45, '1432314071', '1'),
(191, 51, 3, 80, '1432314121', '1'),
(192, 19, 3, 40, '1432314142', '1'),
(193, 60, 3, 30, '1432314143', '1'),
(194, 58, 3, 60, '1432314161', '1'),
(195, 21, 3, 35, '1432314250', '1'),
(196, 50, 3, 30, '1432314316', '1'),
(197, 61, 3, 0, '1432314501', '1');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int NOT NULL,
  `semester` varchar(50) NOT NULL,
  `details` varchar(200) DEFAULT NULL,
  `active` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester`, `details`, `active`) VALUES
(1, 'First Semester', 'Harmattan Semester', 1),
(2, 'Second Semester', 'Rain Semester', 0);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int NOT NULL,
  `session_name` varchar(200) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `session_name`, `active`) VALUES
(1, '2013/2014', 0),
(2, '2014/2015', 0),
(6, '2020/2021', 1),
(7, 'Hello', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `Fullname` varchar(250) NOT NULL,
  `date_added` varchar(60) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `session_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `Fullname`, `date_added`, `photo`, `role`, `session_id`) VALUES
(5, 'adigun', 'fge4f1ee7e4f1ee7eaa6a044d69f39', 'aremu isaiah', '1411282419', 'upload/Snapshot_20140701_7.JPG', 1, 0),
(7, 'salam', 'fgee11242ee112422f474604d69f39', 'adeleke salam', '1411669696', 'upload/Pict0055.jpg', 0, 1),
(8, 'zecko25', 'fg939634793963477317cb24d69f39', 'isaac ayoola', '1411669753', 'upload/Zecko.jpg', 0, 1),
(9, 'access2emma', 'fgee11242ee112422f474604d69f39', 'Emmanuel Adeniyi', '1411669877', 'upload/A0175.jpg', 1, 1),
(10, 'Vickyboi', 'fge10adc3e10adc37c4a8d04d69f39', 'Moses Victor', '1411670194', 'upload/vick_png.jpg', 0, 1),
(11, 'olabisi', 'fg16c3cdc16c3cdc6e719a34d69f39', 'olabisi josephine', '1411720815', 'upload/Faridatu.jpg', 0, 1),
(12, 'testing', 'fgae2b1fcae2b1fcdc724af4d69f39', 'testing testing', '1427746030', 'upload/2UORL8O.PNG', 0, 2),
(13, 'adelekeaj', 'fg5f4dcc35f4dcc35baa61e4d69f39', 'Adegoke Adeleke', '1431852494', 'upload/IMG-20150517-00377.jpg', 0, 2),
(14, 'aladefb', 'fg137ab33137ab33ad5eec44d69f39', 'Favour Alade', '1431852583', 'upload/IMG-20150517-00378.jpg', 0, 2),
(15, 'adelabuma', 'fgb5428a7b5428a7d01d84d4d69f39', 'Moses Adelabu', '1431852639', 'upload/IMG-20150517-00379.jpg', 0, 2),
(16, 'akinyemiic', 'fgfec7449fec7449a9de8a94d69f39', 'Ifeoluwa Akinyemi', '1431852681', 'upload/IMG-20150517-00380.jpg', 0, 2),
(17, 'moshoodlo', 'fga46d324a46d3241749c934d69f39', 'Lateefat Moshood', '1431852718', 'upload/IMG-20150517-00381.jpg', 0, 2),
(18, 'adeniyido', 'fg8bd10a68bd10a69cf05694d69f39', 'Dorcas Adeniyi', '1431852761', 'upload/IMG-20150517-00382.jpg', 0, 2),
(19, 'onifadejo', 'fg4214c734214c7300f80234d69f39', 'Johnson Onifade', '1431852796', 'upload/IMG-20150517-00383.jpg', 0, 2),
(20, 'ogunladema', 'fg76340357634035363c7c24d69f39', 'Mayowa Ogunlade', '1431852824', 'upload/IMG-20150517-00384.jpg', 0, 2),
(21, 'odediranvi', 'fg2f909072f909079d070604d69f39', 'Victor Odediran', '1431852863', 'upload/IMG-20150517-00385.jpg', 0, 2),
(22, 'adekunlevi', 'fg2ae38e22ae38e28032adc4d69f39', 'Victor Adekunle', '1431852894', 'upload/IMG-20150517-00386.jpg', 0, 2),
(23, 'alamuda', 'fgdee677fdee677fea1c8324d69f39', 'Damilare Alamu', '1431852942', 'upload/IMG-20150517-00387.jpg', 0, 2),
(24, 'ayorindeto', 'fgc0f6c36c0f6c362da531b4d69f39', 'Tobi Ayorinde', '1431852987', 'upload/IMG-20150517-00388.jpg', 0, 2),
(25, 'gbadegesinbe', 'fg72ff0d072ff0d04bbde374d69f39', 'Benjamin Gbadegesin', '1431853039', 'upload/IMG-20150517-00389.jpg', 0, 2),
(26, 'ajalavi', 'fgffc150affc150a88fa8464d69f39', 'Victor Ajala', '1431853069', 'upload/IMG-20150517-00390.jpg', 0, 2),
(27, 'adeyemomi', 'fg3a955b73a955b71614c794d69f39', 'Micheal Adeyemo', '1431853117', 'upload/IMG-20150517-00391.jpg', 0, 2),
(28, 'ogunrindeti', 'fg41cc4dd41cc4ddb8479864d69f39', 'Timothy Ogunrinde', '1431853165', 'upload/IMG-20150517-00392.jpg', 0, 2),
(29, 'afolabima', 'fg34a3f9634a3f96a5afd7a4d69f39', 'Mayowa Afolabi', '1431853247', 'upload/IMG-20150517-00393.jpg', 0, 2),
(30, 'holayemine', 'fga53f392a53f39255b5a0f4d69f39', 'edward olayemi', '1432058975', 'upload/admin2_002_1.jpg', 1, 2),
(31, 'zecko', 'fge10adc3e10adc37c4a8d04d69f39', 'isaac ayoola', '1432059061', 'upload/Koala.jpg', 1, 2),
(32, '141757', 'fg9860cc79860cc7b3fab0a4d69f39', 'Mayowa Adeleke', '1432062081', 'upload/IMG-20150518-00406.jpg', 0, 2),
(33, '147092', 'fg17213f917213f9f5288f74d69f39', 'Jemimah Awobiyi', '1432062166', 'upload/IMG-20150518-00407.jpg', 0, 2),
(34, '144256', 'fgc27a035c27a035f4b575b4d69f39', 'Oluwatobi Omotoso', '1432062231', 'upload/IMG-20150519-00415.jpg', 0, 2),
(35, '144238', 'fg12b8e5b12b8e5b0e1e1b04d69f39', 'Fatima Bello', '1432062285', 'upload/IMG-20150519-00416.jpg', 0, 2),
(36, '140683', 'fgcfee7edcfee7ed15da4794d69f39', 'Oluwafunmilayo Ojeniyi', '1432062337', 'upload/IMG-20150517-00394.jpg', 0, 2),
(37, '145094', 'fg9fd634b9fd634be0b81f44d69f39', 'Mary Oluwatodimu', '1432062393', 'upload/IMG-20150517-00395.jpg', 0, 2),
(38, '146023', 'fg8ef91aa8ef91aaeb630b94d69f39', 'Mercy Ayeko', '1432062436', 'upload/IMG-20150517-00396.jpg', 0, 2),
(39, '145026', 'fg497fce4497fce42cf8e434d69f39', 'Temitayo Adewale', '1432062546', 'upload/IMG-20150519-00417.jpg', 0, 2),
(40, 'Damilola', 'fg4afc49c4afc49c0d402264d69f39', 'OLayinka Mathew', '1432062635', 'upload/OLAYINKA MATHEW DAMILOLA.jpg', 0, 2),
(41, '145204', 'fgcdb5f63cdb5f63fc82f124d69f39', 'Oluwafemi Abey', '1432062766', 'upload/IMG_20150518_192110.jpg', 0, 2),
(42, '144233', 'fg66f8a2866f8a2865396264d69f39', 'Oluwaseun Kolawole', '1432063049', 'upload/IMG-20150518-00404.jpg', 0, 2),
(43, '146802', 'fgdf4434fdf4434f995027b4d69f39', 'Opeyemi Alabi', '1432063112', 'upload/IMG-20150518-00405.jpg', 0, 2),
(44, '142862', 'fg85c8c4185c8c41591d3304d69f39', 'VICTORIA FATOLA', '1432141927', 'upload/C360_2015-05-20-17-56-56-022.jpg', 0, 2),
(45, '141140', 'fgb53bdd9b53bdd96c2c72b4d69f39', 'AJAO OPEYEMI', '1432141977', 'upload/C360_2015-05-20-17-55-35-193.jpg', 0, 2),
(46, '141138', 'fg8a50a0f8a50a0ff9db2044d69f39', 'ADEGOKE GRACE', '1432142028', 'upload/C360_2015-05-20-17-56-37-433.jpg', 0, 2),
(47, '142032', 'fg334acd0334acd0e4c036e4d69f39', 'OMOLE OLOLADE', '1432142072', 'upload/C360_2015-05-20-17-56-17-038.jpg', 0, 2),
(48, '141856', 'fg0cd5d730cd5d7374152334d69f39', 'RASAQ SULIYAT', '1432142121', 'upload/C360_2015-05-20-18-07-36-370.jpg', 0, 2),
(49, '141778', 'fg452f0b4452f0b435eb2db4d69f39', 'BAMIGBOLA SILAS', '1432142171', 'upload/C360_2015-05-20-18-09-44-766.jpg', 0, 2),
(50, '141325', 'fg6129ea46129ea47735cd24d69f39', 'ADEGBENRO DAMILOLA', '1432143817', 'upload/IMG_20150519_184234.jpg', 0, 2),
(51, '142467', 'fg8d3789b8d3789bac2e6244d69f39', 'OLANIYAN SEGUN', '1432145419', 'upload/SEGUN.jpg', 0, 2),
(52, '143373', 'fg378e100378e10097366304d69f39', 'Adeleke Joshua', '1432146439', 'upload/IMG_20150520_191944.jpg', 0, 2),
(53, 'isolate', 'fg5b52b955b52b957dd42cc4d69f39', 'Esan Adedayo', '1432147221', 'upload/827.jpg', 0, 2),
(54, 'ELIJAH', 'fg10fd85e10fd85e30145424d69f39', 'ADENIRAN ELIJAH', '1432150231', 'upload/C360_2014-10-23-17-07-31-626.jpg', 1, 2),
(55, 'kayode', 'fg0c838b50c838b5b702ddb4d69f39', 'EJALONIBU AKINTUNDE', '1432155509', 'upload/Kayode wa000.jpg', 0, 2),
(56, 'saxlord', 'fg94810289481028bc86c574d69f39', 'Moses Victor', '1432223994', 'upload/447748.jpg', 1, 2),
(57, '141775', 'fg178c959178c9593625fcd4d69f39', 'STEPHEN BAMIGBOLA', '1432221637', 'upload/C360_2015-05-21-17-18-43-130.jpg', 0, 2),
(58, '145548', 'fgbff5309bff5309ee34bcf4d69f39', 'Rasaq Suliat', '1432222879', 'upload/IMG_20150521_173157.jpg', 0, 2),
(59, '147014', 'fg1a568e91a568e97bd55164d69f39', 'AZEEZAT OMOWONUOLA', '1432227671', 'upload/IMG-20150521-00437.jpg', 0, 2),
(60, '144387', 'fg0fa123c0fa123cb4543184d69f39', 'Olakojo Oyewale', '1432312999', 'upload/IMG_20150522_183152.jpg', 0, 2),
(61, '146006', 'fg75ba73475ba73497c35c64d69f39', 'Jolayemi Diana', '1432313057', 'upload/IMG_20150522_183120.jpg', 0, 2),
(62, 'neyo', 'fg5f4dcc35f4dcc35baa61e4d69f39', 'Emma Niyi', '1630812977', 'upload/mth01C.PNG', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_attempt`
--

CREATE TABLE `user_attempt` (
  `usr_at_id` int NOT NULL,
  `exam_id` int NOT NULL,
  `usr_id` int NOT NULL,
  `is_attempted` tinyint(1) NOT NULL,
  `date_done` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_attempt`
--

INSERT INTO `user_attempt` (`usr_at_id`, `exam_id`, `usr_id`, `is_attempted`, `date_done`) VALUES
(1, 0, 6, 1, 1411658883),
(2, 2, 6, 1, 1411658974),
(3, 2, 7, 1, 1411669766),
(4, 2, 8, 1, 1411669864),
(5, 2, 9, 1, 1411669904),
(6, 2, 10, 1, 1411670221),
(7, 2, 8, 1, 1411670231),
(8, 2, 10, 1, 1411670480),
(10, 3, 8, 1, 1429390380),
(11, 1, 8, 1, 1429451081),
(12, 0, 14, 1, 1432140194),
(13, 0, 35, 1, 1432140227),
(14, 0, 35, 1, 1432140233),
(15, 0, 36, 1, 1432140256),
(16, 0, 18, 1, 1432140263),
(17, 0, 39, 1, 1432140265),
(18, 0, 35, 1, 1432140322),
(19, 0, 36, 1, 1432140393),
(20, 0, 39, 1, 1432140480),
(21, 0, 18, 1, 1432140492),
(22, 0, 14, 1, 1432140539),
(23, 7, 35, 1, 1432141273),
(24, 7, 32, 1, 1432141404),
(25, 7, 36, 1, 1432141435),
(26, 7, 18, 1, 1432141441),
(27, 7, 16, 1, 1432141457),
(28, 7, 39, 1, 1432141459),
(29, 7, 13, 1, 1432141512),
(30, 7, 14, 1, 1432141531),
(31, 7, 37, 1, 1432141888),
(32, 7, 43, 1, 1432141936),
(33, 7, 17, 1, 1432142255),
(34, 7, 34, 1, 1432142261),
(35, 7, 33, 1, 1432142544),
(36, 7, 40, 1, 1432142572),
(37, 7, 22, 1, 1432142591),
(38, 7, 29, 1, 1432142704),
(39, 7, 38, 1, 1432142752),
(40, 7, 19, 1, 1432142983),
(41, 7, 49, 1, 1432143247),
(42, 7, 21, 1, 1432143296),
(43, 7, 48, 1, 1432143309),
(44, 7, 48, 1, 1432143309),
(45, 7, 42, 1, 1432143376),
(46, 7, 44, 1, 1432143574),
(47, 7, 46, 1, 1432143619),
(48, 6, 38, 1, 1432143640),
(49, 7, 47, 1, 1432143642),
(50, 6, 49, 1, 1432143690),
(51, 7, 45, 1, 1432143698),
(52, 6, 19, 1, 1432143795),
(53, 6, 40, 1, 1432143960),
(54, 6, 34, 1, 1432144132),
(55, 6, 35, 1, 1432144269),
(56, 6, 41, 1, 1432144310),
(57, 6, 42, 1, 1432144334),
(58, 6, 48, 1, 1432144414),
(59, 6, 37, 1, 1432144482),
(60, 6, 21, 1, 1432144611),
(61, 6, 45, 1, 1432144640),
(62, 6, 33, 1, 1432144651),
(63, 6, 13, 1, 1432144741),
(64, 6, 22, 1, 1432144857),
(65, 6, 32, 1, 1432144929),
(66, 6, 14, 1, 1432145007),
(67, 6, 44, 1, 1432145097),
(68, 6, 39, 1, 1432145136),
(69, 6, 16, 1, 1432145213),
(70, 6, 36, 1, 1432145255),
(71, 6, 17, 1, 1432145257),
(72, 6, 46, 1, 1432145423),
(73, 6, 43, 1, 1432145443),
(74, 6, 47, 1, 1432145466),
(75, 6, 18, 1, 1432145501),
(76, 6, 29, 1, 1432145794),
(77, 6, 25, 1, 1432146114),
(78, 7, 51, 1, 1432146276),
(79, 7, 50, 1, 1432146339),
(80, 6, 51, 1, 1432146891),
(81, 6, 50, 1, 1432146948),
(82, 7, 25, 1, 1432146974),
(83, 5, 35, 1, 1432222895),
(84, 5, 40, 1, 1432222955),
(85, 5, 33, 1, 1432222957),
(86, 5, 13, 1, 1432222982),
(87, 5, 55, 1, 1432222985),
(88, 5, 39, 1, 1432223035),
(89, 5, 46, 1, 1432223039),
(90, 5, 34, 1, 1432223044),
(91, 5, 21, 1, 1432223061),
(92, 5, 44, 1, 1432223093),
(93, 5, 57, 1, 1432223226),
(94, 5, 49, 1, 1432223862),
(95, 5, 42, 1, 1432223963),
(96, 5, 48, 1, 1432224164),
(97, 5, 58, 1, 1432224178),
(98, 5, 38, 1, 1432224206),
(99, 5, 23, 1, 1432224268),
(100, 5, 16, 1, 1432224285),
(101, 5, 36, 1, 1432224285),
(102, 5, 15, 1, 1432224314),
(103, 5, 17, 1, 1432224349),
(104, 5, 22, 1, 1432224375),
(105, 5, 32, 1, 1432224443),
(106, 5, 18, 1, 1432224601),
(107, 5, 26, 1, 1432224672),
(108, 5, 45, 1, 1432224739),
(109, 5, 20, 1, 1432224853),
(110, 9, 35, 1, 1432225084),
(111, 9, 33, 1, 1432225105),
(112, 9, 34, 1, 1432225162),
(113, 5, 19, 1, 1432225179),
(114, 9, 13, 1, 1432225291),
(115, 9, 46, 1, 1432225332),
(116, 9, 55, 1, 1432225334),
(117, 9, 44, 1, 1432225342),
(118, 9, 39, 1, 1432225404),
(119, 5, 47, 1, 1432225438),
(120, 9, 40, 1, 1432225440),
(121, 9, 18, 1, 1432225548),
(122, 9, 57, 1, 1432225549),
(123, 9, 19, 1, 1432225835),
(124, 9, 49, 1, 1432225871),
(125, 9, 42, 1, 1432225982),
(126, 9, 48, 1, 1432226075),
(127, 9, 15, 1, 1432226076),
(128, 9, 22, 1, 1432226097),
(129, 9, 23, 1, 1432226100),
(130, 9, 47, 1, 1432226111),
(131, 9, 21, 1, 1432226114),
(132, 9, 58, 1, 1432226221),
(133, 9, 16, 1, 1432226225),
(134, 9, 36, 1, 1432226266),
(135, 9, 17, 1, 1432226452),
(136, 9, 38, 1, 1432226458),
(137, 9, 26, 1, 1432226541),
(138, 9, 45, 1, 1432226584),
(139, 9, 20, 1, 1432226688),
(140, 9, 14, 1, 1432226836),
(141, 9, 32, 1, 1432226864),
(142, 9, 25, 1, 1432226921),
(143, 9, 52, 1, 1432226955),
(144, 5, 51, 1, 1432227163),
(145, 5, 14, 1, 1432227568),
(146, 5, 25, 1, 1432228012),
(147, 3, 59, 1, 1432310980),
(148, 3, 34, 1, 1432310990),
(149, 3, 35, 1, 1432310993),
(150, 3, 46, 1, 1432310996),
(151, 3, 44, 1, 1432310999),
(152, 3, 55, 1, 1432311039),
(153, 3, 40, 1, 1432311076),
(154, 3, 49, 1, 1432311090),
(155, 3, 13, 1, 1432311091),
(156, 3, 42, 1, 1432311130),
(157, 3, 22, 1, 1432312058),
(158, 3, 23, 1, 1432312381),
(159, 3, 16, 1, 1432312453),
(160, 3, 37, 1, 1432312607),
(161, 3, 41, 1, 1432312634),
(162, 3, 18, 1, 1432312634),
(163, 3, 33, 1, 1432312684),
(164, 3, 17, 1, 1432312735),
(165, 3, 39, 1, 1432312803),
(166, 3, 45, 1, 1432312829),
(167, 3, 14, 1, 1432313552),
(168, 3, 32, 1, 1432313666),
(169, 3, 47, 1, 1432313849),
(170, 3, 36, 1, 1432314039),
(171, 3, 48, 1, 1432314071),
(172, 3, 51, 1, 1432314121),
(173, 3, 19, 1, 1432314142),
(174, 3, 60, 1, 1432314143),
(175, 3, 58, 1, 1432314161),
(176, 3, 21, 1, 1432314250),
(177, 3, 50, 1, 1432314316),
(178, 3, 61, 1, 1432314501);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`),
  ADD UNIQUE KEY `session_name` (`session_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_attempt`
--
ALTER TABLE `user_attempt`
  ADD PRIMARY KEY (`usr_at_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `que_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user_attempt`
--
ALTER TABLE `user_attempt`
  MODIFY `usr_at_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
