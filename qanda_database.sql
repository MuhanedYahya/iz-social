-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 03:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qanda_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `AnswerID` int(11) UNSIGNED NOT NULL,
  `Answer` varchar(800) NOT NULL,
  `Answer_Date` varchar(100) NOT NULL,
  `Votes` int(11) DEFAULT NULL,
  `UnVotes` int(11) DEFAULT NULL,
  `Parent_Answer_ID` int(11) DEFAULT NULL,
  `QuestionID` int(11) UNSIGNED NOT NULL,
  `UserID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`AnswerID`, `Answer`, `Answer_Date`, `Votes`, `UnVotes`, `Parent_Answer_ID`, `QuestionID`, `UserID`) VALUES
(30, 'No, not unless we stop writing new programs and versions of operating systems - there will always be unexpected tricks to get around protocols. And even then, there are plenty of viruses that try to convince you to install them, clicking past confirmation checks and unsafe warnings.', '2021-05-22 01:27', 78, 63, NULL, 168, 14),
(31, 'The email marketing industry has over a hundred companies that provide email marketing platforms, though only a handful of companies are recognized.', '2021-05-22 01:34', 34, 16, NULL, 169, 15),
(32, 'No I am not happy with Anyone bombing anyone.  I am not happy that Palestinian civillians including kids have to suffer for someone esle’s fault.  Recent conflict between Israel and Palestine is plain and simple.  Israelis displaced Palestinians from their homes which is very much wrong.', '2021-05-22 01:44', 17, 12, NULL, 170, 16),
(33, 'Often it’s deep-rooted. Perhaps parents, lack of friends, or someone passing judgment on them, especially as a child. Often when comparisons are made, judgments are also made.', '2021-05-22 01:53', 9, 5, NULL, 172, 17),
(34, 'Building a communications training software that teaches you how to learn and communicate better. You’d be posed with a situation, and you’d write an answer to how you’d verbally respond to various scenarios and confrontations. It would function much like Grammarly. The software would inform you of the perfect structure, sequence, and words to use to get the most optimal results.  A platform similar to Zoom but with 4K broadcasting for presenters. I’m a magician, and there are so many things I love and hate about Zoom. Let’s get some competition in that space because Zoom is good but not an end-all.', '2021-05-22 01:55', 10, 6, NULL, 173, 18),
(35, 'Native English speakers are incredibly fortunate that their language has become the lingua franca of the world. And this contributes to the why relatively few speak any language other than English with any degree of competence.', '2021-05-22 01:59', 4, 2, NULL, 174, 19),
(36, 'Perfect Body (Men and Women): Well, as America leads the world when it comes to obesity, I very rarely see it properly reflected. Instead, I see men and women of all ages with nearly perfectly toned bodies. And those who can be on the screen, having a BMI of +29, are very much underrepresented and often typecast (funny fat person, bitter fat person).     Teeth: Always pearly white, and never a cavity or uneven tooth to be seen. In the US this might be normal, but in most parts of the world, it isn’t always the case.     Hair: If you see the heads of hair and the styling on the ladies and gentlemen performers, it is always intricate and stunning. In real life, most of us don’t have 8 hours a week to do our hair and most of us guy grow bald at some stage.', '2021-05-22 02:02', 10, 4, NULL, 175, 20),
(37, 'ADOBE PREMIER PRO: mainly used by both Hollywood and indie filmmakers. a lot of tutorials around has made premier become a house hold software everybody want to use. monthly subscription', '2021-05-22 02:08', 7, 5, NULL, 176, 21),
(38, 'Never be afraid of your problems. You’re hiding from your problems and that’s why you’re browsing hours and hours useless things on internet. Change your mindset a little and improve yourself.', '2021-05-22 02:16', 8, 2, NULL, 178, 22),
(468, 'doğru', '2021-07-26 11:39', 0, 0, 36, 175, 18);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) UNSIGNED NOT NULL,
  `Voted` int(2) NOT NULL,
  `UnVoted` int(2) NOT NULL,
  `Answered` int(2) NOT NULL,
  `Seen` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `QuestionID` int(11) UNSIGNED NOT NULL,
  `Question` varchar(500) NOT NULL,
  `Question_type` int(2) NOT NULL DEFAULT 1,
  `Section_Name` varchar(50) DEFAULT NULL,
  `Question_Date` varchar(100) NOT NULL,
  `Option1` varchar(150) DEFAULT NULL,
  `Option2` varchar(150) DEFAULT NULL,
  `Option3` varchar(150) DEFAULT NULL,
  `Option4` varchar(150) DEFAULT NULL,
  `Option5` varchar(150) DEFAULT NULL,
  `Correct_Option` varchar(150) DEFAULT NULL,
  `Yes` int(2) DEFAULT 0,
  `No` int(2) DEFAULT 0,
  `UserID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`QuestionID`, `Question`, `Question_type`, `Section_Name`, `Question_Date`, `Option1`, `Option2`, `Option3`, `Option4`, `Option5`, `Correct_Option`, `Yes`, `No`, `UserID`) VALUES
(168, 'Will we ever stop 100% computer viruses?', 1, NULL, '2021-05-22 01:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(169, 'What is the best email platform and why?', 1, NULL, '2021-05-22 01:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(170, 'Are you happy with the recent Israeli bombings of Palestine?', 1, NULL, '2021-05-22 01:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14),
(172, 'What is the best way to deal with insecure people?', 1, NULL, '2021-05-22 01:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(173, 'What are some great business ideas that you wouldn&#039;t mind giving away for free?', 1, NULL, '2021-05-22 01:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(174, 'Why do most British people only speak English?', 1, NULL, '2021-05-22 01:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(175, 'What is something unrealistic that you often see in movies that annoys the hell out of you?', 1, NULL, '2021-05-22 01:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(176, 'What are the top 15 best video editing software for beginners in 2022?', 1, NULL, '2021-05-22 02:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(177, 'What are some amazing facts about humans?', 1, NULL, '2021-05-22 02:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(178, 'Does anyone want to write their heart out here?', 1, NULL, '2021-05-22 02:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(334, 'python or javascript?', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-17 05:03', 'python', 'javascript', '', '', '', '', 0, 0, 24),
(336, 'choose your country?', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-17 11:54', 'iraq', 'turkey', '', '', '', '', 0, 0, 15),
(369, 'en sevdiğin gün?', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-24 12:15', 'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', '', 0, 0, 18),
(402, 'siteyi beğendiniz mi?', 3, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-29 04:19', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 12),
(403, 'hallit', 3, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-29 02:59', NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 18),
(404, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-29 03:38', 'q', 's', 'e', 'r', 'y', '', 0, 0, 18),
(405, 'juıju', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-29 03:42', 'njn', 'n', 'nk', 'kkk', 'ı87', '', 0, 0, 18),
(406, 'ıoujyht', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-29 03:48', '34', '654', '767', 'yuj', 'ybu', '', 0, 0, 18),
(407, 'rtfrtfr', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-29 03:53', '456', '546', 'yhty', 'h', 'y', '', 0, 0, 18),
(408, 'rgtggty', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-29 03:55', 'yth', 'tyh', 'ghbgh', 'b', 'n', '', 0, 0, 18),
(409, 'ttgty', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-29 03:59', 'gtrtg', 'rtgtrg', 'yby', 'hyhy', 'juju', '', 0, 0, 18),
(410, 'saddddddd', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-29 04:16', '1', '2', '3', '4', '', '', 0, 0, 18),
(411, '12321', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-30 02:32', '1', '2', '', '', '', '', 0, 0, 18),
(412, '2323', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-30 02:32', '3', '4', '', '', '', '', 0, 0, 18),
(413, 'ds', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-30 02:35', 'd', 'f', '', '', '', '', 0, 0, 18),
(414, '3333333', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-30 02:37', '4', '5', '', '', '', '', 0, 0, 18),
(415, '56', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-30 02:42', '7', '8', '', '', '', '', 0, 0, 18),
(416, '22222222', 2, 'Tüm izü öğrencileri/öğretmenleri', '2021-07-30 02:46', '1', '2', '', '', '', '', 0, 0, 18);

-- --------------------------------------------------------

--
-- Table structure for table `recorded_information`
--

CREATE TABLE `recorded_information` (
  `ID` int(11) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Optional_Answer` varchar(500) DEFAULT NULL,
  `Voted` int(11) DEFAULT NULL,
  `UnVoted` int(11) DEFAULT NULL,
  `Yes` int(11) DEFAULT NULL,
  `No` int(11) DEFAULT NULL,
  `AnswerID` int(11) UNSIGNED DEFAULT NULL,
  `QuestionID` int(11) UNSIGNED DEFAULT NULL,
  `UserID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recorded_information`
--

INSERT INTO `recorded_information` (`ID`, `Date`, `Optional_Answer`, `Voted`, `UnVoted`, `Yes`, `No`, `AnswerID`, `QuestionID`, `UserID`) VALUES
(338, '2021-07-30 02:51', '1', NULL, NULL, NULL, NULL, NULL, 411, 24),
(339, '2021-07-30 03:00', '2', NULL, NULL, NULL, NULL, NULL, 416, 24),
(340, '2021-07-30 03:01', '7', NULL, NULL, NULL, NULL, NULL, 415, 24),
(341, '2021-07-30 03:06', '4', NULL, NULL, NULL, NULL, NULL, 414, 24),
(342, '2021-07-30 03:08', 'd', NULL, NULL, NULL, NULL, NULL, 413, 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) UNSIGNED NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Profile_Picture` varchar(100) DEFAULT NULL,
  `User_info` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Email`, `Name`, `Phone_Number`, `Password`, `Profile_Picture`, `User_info`) VALUES
(0, 'anonymous_qanda@gmail.com', 'Anonymous', '00000000000', 'QandAAnonymous', 'anonymous.png', 'i\'m anonymous'),
(12, 'mohannad11bale@gmail.com', 'Mohannad Yahya', '1231231221', '1234', '1127-photo_2021-03-30_15-35-34.jpg', '2&gt;dev/null'),
(13, 'muhammad@yahoo.com', 'Muhammad Hassan', '05564409876', '123', '7852-klklp.jpg', 'Delivery Manager at Apriorit. We’ve been building challenging security software solutions for tech'),
(14, 'charles@gmail.com', 'Charles Wong', '09985409988', '123', '4480-a.jpg', 'Full Stack Engineer Intern at Cognizant'),
(15, 'polat@yahoo.com', 'Polat kemal', '05557658767', '123', '2826-pp.jpg', ''),
(16, 'tom@yahoo.com', 'Tom Wetz', '08887653322', '123', '6421-rtrtr.jpg', 'Self-employed Mac Whisperer.'),
(17, 'dan@gmail.com', 'Dan', '09995677689', '123', '3182-ddd.jpg', 'Guitarist, music enthusiast, historian, author, archaeologist'),
(18, 'gary@yahoo.com', 'Gary James', '09946782298', '123', '4962-lkl.jpg', 'IT Generalist, Mac whisperer, car enthusiast'),
(19, 'phillip@gmail.com', 'Phillip Remaker', '07765465599', '123', '5796-cccxx.jpg', 'For videography, tech and filmmaking tips and tutorials'),
(20, 'ben@gmail.com', 'Ben Mates', '27837123512', '123', '6026-cc.jpg', 'I am…Kori rose. I am an SEO and Digital Marketing expert at freelancing my interests in the travel h'),
(21, 'michael@yahoo.com', 'Michael Laitman', '05556789876', '123', '8528-aaaa.jpg', 'There’s nothing special to know about me expect one thing.\r\n\r\nI’m just a human being, just like you '),
(22, 'ryan@yahoo.com', 'Ryan Thompson', '09896704578', '123', '3215-vvvv.jpg', 'Made for words, not for thoughts…'),
(24, 'abdullah.ali@gmail.com', 'Abdullah-ali', '12313123123', '123', '3989-mains.jpg', 'bilgisayar mühendisliği');

-- --------------------------------------------------------

--
-- Table structure for table `users_additional_information`
--

CREATE TABLE `users_additional_information` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) UNSIGNED NOT NULL,
  `Profile_Picture` varchar(250) DEFAULT NULL,
  `Bio` varchar(400) DEFAULT NULL,
  `facebook_link` varchar(200) DEFAULT NULL,
  `instagram_link` varchar(200) DEFAULT NULL,
  `twitter_link` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`AnswerID`),
  ADD KEY `user` (`UserID`),
  ADD KEY `question` (`QuestionID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userid` (`UserID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`QuestionID`),
  ADD KEY `test` (`UserID`);

--
-- Indexes for table `recorded_information`
--
ALTER TABLE `recorded_information`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `u` (`UserID`),
  ADD KEY `q` (`QuestionID`),
  ADD KEY `a` (`AnswerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `users_additional_information`
--
ALTER TABLE `users_additional_information`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `AnswerID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=478;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `QuestionID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;

--
-- AUTO_INCREMENT for table `recorded_information`
--
ALTER TABLE `recorded_information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users_additional_information`
--
ALTER TABLE `users_additional_information`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`),
  ADD CONSTRAINT `question` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`),
  ADD CONSTRAINT `user` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `userid` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `test` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `recorded_information`
--
ALTER TABLE `recorded_information`
  ADD CONSTRAINT `a` FOREIGN KEY (`AnswerID`) REFERENCES `answers` (`AnswerID`),
  ADD CONSTRAINT `q` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`),
  ADD CONSTRAINT `u` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `users_additional_information`
--
ALTER TABLE `users_additional_information`
  ADD CONSTRAINT `id` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
