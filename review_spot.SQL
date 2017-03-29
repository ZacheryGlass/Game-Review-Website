-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2016 at 05:32 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `review spot`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ps4_available` tinyint(1) NOT NULL,
  `xb1_available` tinyint(1) NOT NULL,
  `pc_available` tinyint(1) NOT NULL,
  `Wii_U_available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `ps4_available`, `xb1_available`, `pc_available`, `Wii_U_available`) VALUES
(1, 'Call of Duty: Black Ops 3', 1, 1, 1, 1),
(2, 'Red Dead Redemption', 1, 1, 0, 0),
(3, 'The Elder Scrolls V: Skyrim', 1, 1, 1, 0),
(4, 'Super Mario Bros.', 0, 0, 0, 1),
(5, 'Minecraft', 1, 1, 1, 1),
(6, 'League of Legends', 0, 0, 1, 0),
(7, 'Mortal Kombat X', 1, 1, 1, 0),
(8, 'World of Warcraft', 0, 0, 0, 1),
(9, 'Destiny', 1, 1, 0, 0),
(10, 'Just Cause 3', 1, 1, 1, 0),
(11, 'Grand Theft Auto V', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `game` int(255) NOT NULL,
  `user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `Date_Time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `game`, `user`, `title`, `rating`, `review`, `Date_Time`) VALUES
(17, 1, 8, 'Great game', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet imperdiet convallis. Aenean auctor, lectus nec vehicula ullamcorper, turpis libero interdum metus, ac vehicula lacus neque at sem. Nullam suscipit turpis sed nibh convallis, vitae interdum libero placerat. In nec tellus sed sapien dignissim fringilla ut varius tortor. Curabitur interdum placerat nibh, ac sagittis nisi mollis at. Nullam vel interdum nulla. Suspendisse mollis felis sit amet dui ullamcorper imperdiet. Etiam libero dolor, fringilla ac rutrum non, malesuada non ante. Phasellus accumsan dapibus pellentesque. Vestibulum in turpis finibus, mattis sem in, commodo enim. In hac habitasse platea dictumst. Mauris vulputate lorem non dapibus hendrerit. Curabitur fringilla diam eu ante aliquam ornare. Nulla et magna sed nulla vehicula pharetra. Suspendisse maximus interdum sapien, non facilisis lorem ullamcorper tempor.\r\n\r\nCras feugiat turpis ac tempor posuere. Vestibulum varius lectus mi, eu suscipit libero cursus quis. Nam tempus nisi a efficitur viverra. Sed orci est, finibus sed tortor sit amet, varius interdum arcu. Etiam venenatis enim at mi pharetra, a aliquam eros iaculis. Phasellus cursus malesuada est, at feugiat massa consectetur in. Nullam condimentum sed diam ut blandit. Ut ac felis in odio aliquam molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sit amet lorem velit.\r\n\r\nNunc sem velit, faucibus ut gravida at, suscipit in diam. Curabitur vel fermentum augue. Suspendisse neque lacus, scelerisque interdum faucibus sit amet, lacinia non ligula. Morbi convallis rhoncus auctor. Nullam enim magna, interdum eu vulputate vehicula, rhoncus ut sem. Mauris convallis, odio at tristique dapibus, tellus nisl porttitor mauris, nec ornare libero risus vitae nunc. Aenean nec enim in leo congue condimentum. Mauris lorem lacus, cursus eu est ac, placerat ornare metus. Aenean ullamcorper sapien a eros molestie, iaculis vehicula mauris tristique.\r\n\r\nDonec ullamcorper nisl risus, nec consectetur justo mollis in. Aenean eget felis nec lorem suscipit vestibulum vel sed libero. Proin ipsum nunc, tempor sed leo at, feugiat rhoncus velit. Maecenas enim dui, convallis vitae posuere vitae, tempor vel libero. In maximus posuere lacus, vitae porttitor ex. Nullam pharetra, eros eget ullamcorper vulputate, nisl lectus finibus diam, at euismod elit magna a massa. Nulla in vestibulum augue. Vestibulum ipsum quam, vestibulum a ultrices sit amet, auctor et purus. Proin eu aliquet tortor. Etiam libero ipsum, tristique in velit non, ullamcorper euismod urna. Integer auctor accumsan turpis in lobortis. Vestibulum vulputate, lacus sit amet malesuada pharetra, risus massa maximus massa, semper malesuada ligula diam sit amet magna. Pellentesque posuere, dui id suscipit rutrum, enim augue vestibulum lectus, malesuada blandit est arcu tincidunt ex. In molestie, ligula vitae iaculis imperdiet, eros nibh accumsan enim, viverra mollis sapien odio eget mi.\r\n\r\nDuis vehicula ultrices lorem, ac sodales ante. Curabitur tincidunt orci in nulla scelerisque, nec hendrerit nulla fringilla. In suscipit, urna at bibendum dapibus, velit est auctor lorem, pellentesque iaculis sem sem eu dolor. Donec tristique non ligula at vestibulum. Donec maximus et neque eget suscipit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum commodo magna ut risus mollis, nec feugiat mauris lacinia. Curabitur accumsan elementum odio, eu euismod metus varius id. Duis efficitur, diam placerat semper tincidunt, lacus elit porta libero, at condimentum nisl ligula eget risus. Vivamus egestas, est sit amet vulputate maximus, velit lorem finibus est, quis luctus tellus ex pharetra ipsum. Mauris in vestibulum neque.', '11/22/16 04:02AM'),
(18, 5, 8, 'Number 1', 5, '', '11/22/16 04:14AM'),
(20, 3, 8, 'Best Game Ever!', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet imperdiet convallis. Aenean auctor, lectus nec vehicula ullamcorper, turpis libero interdum metus, ac vehicula lacus neque at sem. Nullam suscipit turpis sed nibh convallis, vitae interdum libero placerat. In nec tellus sed sapien dignissim fringilla ut varius tortor. Curabitur interdum placerat nibh, ac sagittis nisi mollis at. Nullam vel interdum nulla. Suspendisse mollis felis sit amet dui ullamcorper imperdiet. Etiam libero dolor, fringilla ac rutrum non, malesuada non ante. Phasellus accumsan dapibus pellentesque. Vestibulum in turpis finibus, mattis sem in, commodo enim. In hac habitasse platea dictumst. Mauris vulputate lorem non dapibus hendrerit. Curabitur fringilla diam eu ante aliquam ornare. Nulla et magna sed nulla vehicula pharetra. Suspendisse maximus interdum sapien, non facilisis lorem ullamcorper tempor.\r\n\r\nCras feugiat turpis ac tempor posuere. Vestibulum varius lectus mi, eu suscipit libero cursus quis. Nam tempus nisi a efficitur viverra. Sed orci est, finibus sed tortor sit amet, varius interdum arcu. Etiam venenatis enim at mi pharetra, a aliquam eros iaculis. Phasellus cursus malesuada est, at feugiat massa consectetur in. Nullam condimentum sed diam ut blandit. Ut ac felis in odio aliquam molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sit amet lorem velit.\r\n', '11/22/16 04:25AM'),
(21, 2, 8, 'A Waste of Money', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet imperdiet convallis. Aenean auctor, lectus nec vehicula ullamcorper, turpis libero interdum metus, ac vehicula lacus neque at sem. Nullam suscipit turpis sed nibh convallis, vitae interdum libero placerat. In nec tellus sed sapien dignissim fringilla ut varius tortor. Curabitur interdum placerat nibh, ac sagittis nisi mollis at. Nullam vel interdum nulla. Suspendisse mollis felis sit amet dui ullamcorper imperdiet. Etiam libero dolor, fringilla ac rutrum non, malesuada non ante. Phasellus accumsan dapibus pellentesque. Vestibulum in turpis finibus, mattis sem in, commodo enim. In hac habitasse platea dictumst. Mauris vulputate lorem non dapibus hendrerit. Curabitur fringilla diam eu ante aliquam ornare. Nulla et magna sed nulla vehicula pharetra. Suspendisse maximus interdum sapien, non facilisis lorem ullamcorper tempor.\r\n\r\nCras feugiat turpis ac tempor posuere. Vestibulum varius lectus mi, eu suscipit libero cursus quis. Nam tempus nisi a efficitur viverra. Sed orci est, finibus sed tortor sit amet, varius interdum arcu. Etiam venenatis enim at mi pharetra, a aliquam eros iaculis. Phasellus cursus malesuada est, at feugiat massa consectetur in. Nullam condimentum sed diam ut blandit. Ut ac felis in odio aliquam molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sit amet lorem velit.\r\n\r\nNunc sem velit, faucibus ut gravida at, suscipit in diam. Curabitur vel fermentum augue. Suspendisse neque lacus, scelerisque interdum faucibus sit amet, lacinia non ligula. Morbi convallis rhoncus auctor. Nullam enim magna, interdum eu vulputate vehicula, rhoncus ut sem. Mauris convallis, odio at tristique dapibus, tellus nisl porttitor mauris, nec ornare libero risus vitae nunc. Aenean nec enim in leo congue condimentum. Mauris lorem lacus, cursus eu est ac, placerat ornare metus. Aenean ullamcorper sapien a eros molestie, iaculis vehicula mauris tristique.', '11/22/16 04:28AM'),
(22, 1, 5, 'Best one yet', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet imperdiet convallis. Aenean auctor, lectus nec vehicula ullamcorper, turpis libero interdum metus, ac vehicula lacus neque at sem. Nullam suscipit turpis sed nibh convallis, vitae interdum libero placerat. In nec tellus sed sapien dignissim fringilla ut varius tortor. Curabitur interdum placerat nibh, ac sagittis nisi mollis at. Nullam vel interdum nulla. Suspendisse mollis felis sit amet dui ullamcorper imperdiet. Etiam libero dolor, fringilla ac rutrum non, malesuada non ante. Phasellus accumsan dapibus pellentesque. Vestibulum in turpis finibus, mattis sem in, commodo enim. In hac habitasse platea dictumst. Mauris vulputate lorem non dapibus hendrerit. Curabitur fringilla diam eu ante aliquam ornare. Nulla et magna sed nulla vehicula pharetra. Suspendisse maximus interdum sapien, non facilisis lorem ullamcorper tempor.\r\n\r\nCras feugiat turpis ac tempor posuere. Vestibulum varius lectus mi, eu suscipit libero cursus quis. Nam tempus nisi a efficitur viverra. Sed orci est, finibus sed tortor sit amet, varius interdum arcu. Etiam venenatis enim at mi pharetra, a aliquam eros iaculis. Phasellus cursus malesuada est, at feugiat massa consectetur in. Nullam condimentum sed diam ut blandit. Ut ac felis in odio aliquam molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sit amet lorem velit.\r\n\r\nNunc sem velit, faucibus ut gravida at, suscipit in diam. Curabitur vel fermentum augue. Suspendisse neque lacus, scelerisque interdum faucibus sit amet, lacinia non ligula. Morbi convallis rhoncus auctor. Nullam enim magna, interdum eu vulputate vehicula, rhoncus ut sem. Mauris convallis, odio at tristique dapibus, tellus nisl porttitor mauris, nec ornare libero risus vitae nunc. Aenean nec enim in leo congue condimentum. Mauris lorem lacus, cursus eu est ac, placerat ornare metus. Aenean ullamcorper sapien a eros molestie, iaculis vehicula mauris tristique.', '11/22/16 04:30AM'),
(23, 9, 5, 'Repedative...', 2, 'This game sucks', '11/24/16 12:06AM'),
(24, 8, 5, 'Lorem ipsum', 4, 'Lorem ipsum dolor sit amet, sea ancillae voluptatum ad. Ne ferri voluptatibus ius. Erant docendi eam et, purto choro nonumes in ius. Iusto mollis repudiandae at nam. Vim at impetus delicata, pro ne wisi nihil eloquentiam. Mei te eros nominavi. In eam ancillae phaedrum tacimates.\r\n', '11/24/16 12:08AM'),
(25, 6, 5, 'Dolor Sit Amet', 0, 'Lorem ipsum dolor sit amet, sea ancillae voluptatum ad. Ne ferri voluptatibus ius. Erant docendi eam et, purto choro nonumes in ius. Iusto mollis repudiandae at nam. Vim at impetus delicata, pro ne wisi nihil eloquentiam. Mei te eros nominavi. In eam ancillae phaedrum tacimates.\r\n\r\nSint platonem maiestatis ea mea, eligendi necessitatibus in pri. Mollis facilisi temporibus pro ad, et mel quod vocibus graecis, mucius veritus luptatum an duo. Eam ad dicat simul labores, ut nam tota tritani omittam, ne pri aeterno voluptatibus. Id tritani comprehensam ius, his ut phaedrum mandamus. Unum soluta mel ex, quas ubique nam te.\r\n\r\nVis ne diam porro ponderum, vis delenit inermis an. Sed justo simul fastidii ad, eam at habemus vivendum. Usu te nemore efficiendi theophrastus. Et qui facete ocurreret. Feugiat interpretaris pro an.\r\n', '11/24/16 12:08AM'),
(26, 2, 5, 'Test 2', 1, 'This is a test', '11/24/16 12:11AM'),
(27, 5, 11, 'Fun but gets boring fast', 3, 'Sint platonem maiestatis ea mea, eligendi necessitatibus in pri. Mollis facilisi temporibus pro ad, et mel quod vocibus graecis, mucius veritus luptatum an duo. Eam ad dicat simul labores, ut nam tota tritani omittam, ne pri aeterno voluptatibus. Id tritani comprehensam ius, his ut phaedrum mandamus. Unum soluta mel ex, quas ubique nam te.', '11/24/16 12:14AM'),
(28, 4, 11, 'This game is a lot of fun', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer imperdiet imperdiet convallis. Aenean auctor, lectus nec vehicula ullamcorper, turpis libero interdum metus, ac vehicula lacus neque at sem. Nullam suscipit turpis sed nibh convallis, vitae interdum libero placerat. In nec tellus sed sapien dignissim fringilla ut varius tortor. Curabitur interdum placerat nibh, ac sagittis nisi mollis at. Nullam vel interdum nulla. Suspendisse mollis felis sit amet dui ullamcorper imperdiet. Etiam libero dolor, fringilla ac rutrum non, malesuada non ante. Phasellus accumsan dapibus pellentesque. Vestibulum in turpis finibus, mattis sem in, commodo enim. In hac habitasse platea dictumst. Mauris vulputate lorem non dapibus hendrerit. Curabitur fringilla diam eu ante aliquam ornare. Nulla et magna sed nulla vehicula pharetra.\r\n\r\nSuspendisse maximus interdum sapien, non facilisis lorem ullamcorper tempor. Cras feugiat turpis ac tempor posuere. Vestibulum varius lectus mi, eu suscipit libero cursus quis. Nam tempus nisi a efficitur viverra. Sed orci est, finibus sed tortor sit amet, varius interdum arcu. Etiam venenatis enim at mi pharetra, a aliquam eros iaculis. Phasellus cursus malesuada est, at feugiat massa consectetur in. Nullam condimentum sed diam ut blandit. Ut ac felis in odio aliquam molestie. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sit amet lorem velit. Nunc sem velit, faucibus ut gravida at, suscipit in diam. Curabitur vel fermentum augue. Suspendisse neque lacus, scelerisque interdum faucibus sit amet, lacinia non ligula. Morbi convallis rhoncus auctor. Nullam enim magna, interdum eu vulputate vehicula, rhoncus ut sem. Mauris convallis, odio at tristique dapibus, tellus nisl porttitor mauris, nec ornare libero risus vitae nunc. Aenean nec enim in leo congue condimentum. Mauris lorem lacus, cursus eu est ac, placerat ornare metus. Aenean ullamcorper sapien a eros molestie, iaculis vehicula mauris tristique.', '11/23/16 05:24PM'),
(29, 9, 5, 'Thdsfdsfsdfa', 4, 'dfhlasdjfhlksdjhlasdjf\r\ndsfhjk\r\nsdfkjhalsdfhjasdljfhkal', '11/28/16 10:57AM'),
(30, 6, 12, 'OK', 1, 'dfjsdfhsdjl dfhjasdljhfsdhjf sd h \r\n dfasd \r\n dfas', '12/05/16 02:37PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(5, 'Zachery', 'b81fc2e9801865d7e5dc1d092a9e9ddf'),
(7, 'Test', 'e1b849f9631ffc1829b2e31402373e3c'),
(8, 'Jimmy', '364fb8805dee45e06cda5167d5c1702d'),
(9, 'Logic', 'df7690c3e99f52400e2b0bd3910bf2c4'),
(10, 'Bruce', 'ddecd855df6a1506309cb585b9dd0e44'),
(11, 'John', '1baad9235021178dc28a5948f83e6cce'),
(12, 'Test2', 'e1b849f9631ffc1829b2e31402373e3c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
