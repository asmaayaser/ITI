-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2022 at 01:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jumia`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookID` int(11) NOT NULL,
  `bookTitle` varchar(200) NOT NULL,
  `bookInfo` text NOT NULL,
  `Author` varchar(200) NOT NULL,
  `submissionDate` varchar(255) DEFAULT NULL,
  `bookImg` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `bookTitle`, `bookInfo`, `Author`, `submissionDate`, `bookImg`, `created_at`, `updated_at`) VALUES
(1, ' The Fifth Season', 'The Fifth Season is a 2015 science fantasy novel by N. K. Jemisin.\nIt was awarded the Hugo Award for Best Novel in 2016.It is the first volume in the Broken Earth series and is followed by The Obelisk Gate and The Stone Sky.\nThree terrible things happen in a single day. Essun, a woman living an ordinary life in a small town, comes home to find that her husband has brutally murdered their son and kidnapped their daughter. Meanwhile, mighty Sanze -- the world-spanning empire whose innovations have been civilization\'s bedrock for a thousand years -- collapses as most of its citizens are murdered to serve a madman\'s vengeance. And worst of all, across the heart of the vast continent known as the Stillness, a great red rift has been torn into the heart of the earth, spewing ash enough to darken the sky for years. Or centuries.\n', 'Nora Keita Jemisin', 'August 4, 2015', 'The_Fifth_Season.jpg', '2022-09-16 16:44:44', '2022-09-16 18:44:44'),
(2, 'A Game of Thrones', 'A Game of Thrones is the first novel in A Song of Ice and Fire, a series of fantasy novels by American author George R. R. Martin. It was first published on August 1, 1996. The novel won the 1997 Locus Award and was nominated for both the 1997 Nebula Award and the 1997 World Fantasy Award.\nWinter is coming. Such is the stern motto of House Stark, the northernmost of the fiefdoms that owe allegiance to King Robert Baratheon in far-off King’s Landing. There Eddard Stark of Winterfell rules in Robert’s name. There his family dwells in peace and comfort: his proud wife, Catelyn; his sons Robb, Brandon, and Rickon; his daughters Sansa and Arya; and his bastard son, Jon Snow. Far to the north, behind the towering Wall, lie savage Wildings and worse—unnatural things relegated to myth during the centuries-long summer, but proving all too real and all too deadly in the turning of the season.', 'George Raymond Richard Martin', 'August 1, 1996', 'AGameOfThrones.jpg', '2022-09-16 16:47:03', '2022-09-16 18:47:03'),
(9, 'A Wizard of Earthsea', 'A Wizard of Earthsea is a fantasy novel written by American author Ursula K. Le Guin and first published by the small press Parnassus in 1968. It is regarded as a classic of children\'s literature and of fantasy, within which it is widely influential.\nGed, the greatest sorcerer in all Earthsea, was called Sparrowhawk in his reckless youth.\nHungry for power and knowledge, Sparrowhawk tampered with long-held secrets and loosed a terrible shadow upon the world. This is the tale of his testing, how he mastered the mighty words of power, tamed an ancient dragon, and crossed death\'s threshold to restore the balance.', 'Ruth Robbins', '1968', 'AWizardOfEarthsea.jpg', '2022-09-16 16:54:04', '2022-09-16 18:54:04'),
(10, 'Circe', 'Circe is a 2018 novel by American writer Madeline Miller. Set during the Greek Heroic Age, it is an adaptation of various Greek myths, most notably the Odyssey, as told from the perspective of the witch Circe.\nIn the house of Helios, god of the sun and mightiest of the Titans, a daughter is born. But Circe is a strange child--neither powerful like her father nor viciously alluring like her mother. Turning to the world of mortals for companionship, she discovers that she does possess power: the power of witchcraft, which can transform rivals into monsters and menace the gods themselves.\nThreatened, Zeus banishes her to a deserted island, where she hones her occult craft, tames wild beasts, and crosses paths with many of the most famous figures in all of mythology, including the Minotaur, Daedalus and his doomed son Icarus, the murderous Medea, and, of course, wily Odysseus.', 'Madeline Miller', 'April 10, 2018', 'Circe.jpg', '2022-09-16 16:56:25', '2022-09-16 18:56:25'),
(11, 'The Night Circus', 'The Night Circus is a 2011 fantasy novel by Erin Morgenstern. It was originally written for the annual writing competition National Novel Writing Month over the span of three competitions. The novel has a nonlinear narrative written from multiple viewpoint.\nThe circus arrives without warning. No announcements precede it. It is simply there, when yesterday it was not. Within the black-and-white striped canvas tents is an utterly unique experience full of breathtaking amazements. It is called Le Cirque des Rêves, and it is only open at night.\n', 'Erin Morgenstern', '2011', 'TheNightCircus.jpg', '2022-09-16 16:57:32', '2022-09-16 18:57:32'),
(12, 'The Fifth Season', 'The Fifth Season is a 2015 science fantasy novel by N. K. Jemisin. It was awarded the Hugo Award for Best Novel in 2016.It is the first volume in the Broken Earth series and is followed by The Obelisk Gate and The Stone Sky. Three terrible things happen in a single day. Essun, a woman living an ordinary life in a small town, comes home to find that her husband has brutally murdered their son and kidnapped their daughter. Meanwhile, mighty Sanze -- the world-spanning empire whose innovations have been civilization\'s bedrock for a thousand years -- collapses as most of its citizens are murdered to serve a madman\'s vengeance. And worst of all, across the heart of the vast continent known as the Stillness, a great red rift has been torn into the heart of the earth, spewing ash enough to darken the sky for years. Or centuries.', 'Nora Keita Jemisin', 'August 4, 2015', 'The_Fifth_Season.jpg', '2022-09-16 20:25:18', '2022-09-16 22:25:18'),
(13, 'A Game of Thrones', 'A Game of Thrones is the first novel in A Song of Ice and Fire, a series of fantasy novels by American author George R. R. Martin. It was first published on August 1, 1996. The novel won the 1997 Locus Award and was nominated for both the 1997 Nebula Award and the 1997 World Fantasy Award. Winter is coming. Such is the stern motto of House Stark, the northernmost of the fiefdoms that owe allegiance to King Robert Baratheon in far-off King’s Landing. There Eddard Stark of Winterfell rules in Robert’s name. There his family dwells in peace and comfort: his proud wife, Catelyn; his sons Robb, Brandon, and Rickon; his daughters Sansa and Arya; and his bastard son, Jon Snow. Far to the north, behind the towering Wall, lie savage Wildings and worse—unnatural things relegated to myth during the centuries-long summer, but proving all too real and all too deadly in the turning of the season.', 'George Raymond Richard Martin', 'August 1, 1996', 'AGameOfThrones.jpg', '2022-09-16 20:27:40', '2022-09-16 22:27:40'),
(14, 'A Wizard of Earthsea', 'A Wizard of Earthsea is a fantasy novel written by American author Ursula K. Le Guin and first published by the small press Parnassus in 1968. It is regarded as a classic of children\'s literature and of fantasy, within which it is widely influential. Ged, the greatest sorcerer in all Earthsea, was called Sparrowhawk in his reckless youth. Hungry for power and knowledge, Sparrowhawk tampered with long-held secrets and loosed a terrible shadow upon the world. This is the tale of his testing, how he mastered the mighty words of power, tamed an ancient dragon, and crossed death\'s threshold to restore the balance.', 'Ruth Robbins', '1968', 'AWizardOfEarthsea.jpg', '2022-09-16 20:28:33', '2022-09-16 22:28:33'),
(15, 'Circe', 'Circe is a 2018 novel by American writer Madeline Miller. Set during the Greek Heroic Age, it is an adaptation of various Greek myths, most notably the Odyssey, as told from the perspective of the witch Circe. In the house of Helios, god of the sun and mightiest of the Titans, a daughter is born. But Circe is a strange child--neither powerful like her father nor viciously alluring like her mother. Turning to the world of mortals for companionship, she discovers that she does possess power: the power of witchcraft, which can transform rivals into monsters and menace the gods themselves. Threatened, Zeus banishes her to a deserted island, where she hones her occult craft, tames wild beasts, and crosses paths with many of the most famous figures in all of mythology, including the Minotaur, Daedalus and his doomed son Icarus, the murderous Medea, and, of course, wily Odysseus.', 'Madeline Miller	', 'April 10, 2018	', 'Circe.jpg', '2022-09-16 20:29:16', '2022-09-16 22:29:16'),
(16, 'The Night Circus	', 'The Night Circus is a 2011 fantasy novel by Erin Morgenstern. It was originally written for the annual writing competition National Novel Writing Month over the span of three competitions. The novel has a nonlinear narrative written from multiple viewpoint. The circus arrives without warning. No announcements precede it. It is simply there, when yesterday it was not. Within the black-and-white striped canvas tents is an utterly unique experience full of breathtaking amazements. It is called Le Cirque des Rêves, and it is only open at night.', 'Erin Morgenstern', '2011', 'TheNightCircus.jpg', '2022-09-16 20:30:06', '2022-09-16 22:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(200) DEFAULT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPass` char(40) NOT NULL,
  `Avatar` text NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_At` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `userEmail`, `userPass`, `Avatar`, `Admin`, `created_At`, `updated_At`) VALUES
(2, 'asmaa  ', 'yaserasmaa358@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'IMG-20220910-WA0044.jpg', 0, '2022-09-10 09:32:03', '2022-09-10 11:32:03'),
(4, '   omar ', 'omar@email.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1.jpg', 0, '2022-09-10 09:49:03', '2022-09-10 11:49:03'),
(5, '  aml', ' aml@gmail.com ', '00ac7ca57d33e8491d4c753ee36f8e7388a023d8', '', 0, '2022-09-10 10:04:07', '2022-09-10 12:04:07'),
(7, '     asma   ', 'asm@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 1, '2022-09-10 18:04:03', '2022-09-10 20:04:03'),
(8, '   ali ', 'ali@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'IMG-20220910-WA0028.jpg', 0, '2022-09-13 09:20:29', '2022-09-13 11:20:29'),
(9, ' mona ', 'mona@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'IMG-20220910-WA0033.jpg', 1, '2022-09-13 09:24:02', '2022-09-13 11:24:02'),
(10, '    alia  ', 'alia@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'IMG-20220910-WA0024.jpg', 0, '2022-09-15 10:50:57', '2022-09-15 12:50:57'),
(11, '     aml ', 'aml@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'IMG-20220910-WA0013.jpg', 0, '2022-09-15 11:08:56', '2022-09-15 13:08:56'),
(12, '     omnia   ', 'omnia@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'IMG-20220910-WA0015.jpg', 0, '2022-09-15 11:28:05', '2022-09-15 13:28:05'),
(13, 'saraAhmed', 'sarahmed@email.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'IMG-20220910-WA0030.jpg', 1, '2022-09-15 18:17:25', '2022-09-15 20:17:25'),
(14, 'soad', 'soad@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'IMG-20220910-WA0023.jpg', 1, '2022-09-16 16:38:12', '2022-09-16 18:38:12'),
(15, 'Ahmed', 'Ahmed@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'IMG-20220910-WA0050.jpg', 0, '2022-09-16 17:32:50', '2022-09-16 19:32:50'),
(16, 'soso', 'soso@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'IMG-20220910-WA0041.jpg', 0, '2022-09-16 20:32:33', '2022-09-16 22:32:33'),
(18, 'amna', 'amna@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'IMG-20220910-WA0050.jpg', 0, '2022-09-21 22:54:33', '2022-09-22 00:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `userEmail` varchar(200) NOT NULL,
  `userMobile` varchar(200) NOT NULL,
  `userPass` varchar(200) NOT NULL,
  `userAddress` varchar(200) NOT NULL,
  `userMore` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userMobile`, `userPass`, `userAddress`, `userMore`) VALUES
(1, 'asma', 'asmaa@gmail.com', '0125882000', '158xz5dd', '1_elhoria_street', '2022-08-23 17:19:28'),
(2, 'eslam', 'eslam@yahoo.com', '0189567413', '1239788564', 'rasheed', '0000-00-00 00:00:00'),
(3, 'asmaa yasser', 'yaserasmaa358@gmail.com', '01273457139', 'bffdhf5', 'El-Mahala El-kubra', '0000-00-00 00:00:00'),
(4, 'asmaa yasser', 'yaserasmaa358@gmail.com', '01273457139', 'bffdhf5', 'El-Mahala El-kubra', '0000-00-00 00:00:00'),
(5, 'asmaa yasser', 'yaserasmaa358@gmail.com', '01273457139', 'bffdhf5', 'El-Mahala El-kubra', '0000-00-00 00:00:00'),
(6, 'asmaa yasser', 'yaserasmaa358@gmail.com', '01273457139', 'bffdhf5', 'El-Mahala El-kubra', '0000-00-00 00:00:00'),
(7, 'asmaa yasser', 'yaserasmaa358@gmail.com', '01273457139', 'bffdhf5', 'El-Mahala El-kubra', '0000-00-00 00:00:00'),
(8, 'asmaa yasser', 'yaserasmaa358@gmail.com', '01273457139', '123456', 'El-Mahala El-kubra', '0000-00-00 00:00:00'),
(9, 'ahmed', 'ah@mail.com', '01587632025852', '8sfgreg4g56', 'vbfhhhhhhhhhhhhhh', '2022-09-06 10:56:07'),
(10, 'ahmed', 'ahmed123@yahoo.com', '01000', 'dd5ff', 'elhoria', '2022-09-06 10:56:07'),
(11, 'asmaa yasser', 'yaserasmaa358@gmail.com', '', '123456', '', '2022-09-17 17:16:11'),
(12, 'alaa', 'all@mail.com', '', '123456', '', '2022-09-17 17:16:40'),
(13, 'ali', 'ali@mail.com', '', '68956', '', '2022-09-17 17:18:26'),
(14, 'esmail', 'es@gmail.com', '', '6965120', '', '2022-09-17 17:18:57'),
(15, 'asma', 'yaserasmaa358@gmail.com', '', '123555', '', '2022-09-17 17:19:33'),
(16, 'aml', 'aml358@gmail.com', '', '8520', '', '2022-09-17 17:24:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
