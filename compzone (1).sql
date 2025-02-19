-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2025 at 08:36 PM
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
-- Database: `compzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'muabshirahemd', '81dc9bdb52d04dc20036dbd8313ed055', 'gmaingzone@gmail.com', '2025-02-07 17:50:37'),
(4, 'gmaingzone', '250cf8b51c773f3f8dc8b4be867a9a02', 'gamingzone456@gmail.com', '2025-02-08 18:40:42'),
(5, 'hello', '5d41402abc4b2a76b9719d911017c592', 'hello@gmail.com', '2025-02-08 19:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `filename`) VALUES
(2, 'In_blamck_background_500x.png'),
(3, 'In_blamck_background_500x.png'),
(4, 'In_blamck_background_500x.png'),
(5, 'In_blamck_background_500x.png'),
(6, 'In_blamck_background_500x.png'),
(7, 'In_blamck_background_500x.png'),
(8, 'In_blamck_background_500x.png'),
(9, 'Logo_1_500x.png'),
(10, 'Logo_1_500x.png');

-- --------------------------------------------------------

--
-- Table structure for table `imageone`
--

CREATE TABLE `imageone` (
  `imageid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imageone`
--

INSERT INTO `imageone` (`imageid`, `id`, `filename`, `uploaded_at`) VALUES
(1, 6, '1738871689_6.png', '2025-02-06 19:54:38'),
(2, 14, '1738873054_14.png', '2025-02-06 20:13:12'),
(3, 15, '1738927642_15.png', '2025-02-07 11:24:35'),
(4, 16, '1738942191_16.png', '2025-02-07 15:28:53'),
(5, 17, '1739101741_17.jpg', '2025-02-09 11:48:33'),
(6, 18, '', '2025-02-11 18:16:15'),
(7, 19, '1739298299_19.jpeg', '2025-02-11 18:20:34'),
(8, 20, '1739302344_20.jpg', '2025-02-11 19:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL CHECK (`quantity` > 0),
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','processing','shipped','delivered','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `total_price`, `status`, `created_at`, `updated_at`, `address`) VALUES
(1, 19, 10, 1, '5000.00', 'pending', '2025-02-12 19:02:53', '2025-02-12 19:02:53', 'My home '),
(2, 19, 10, 1, '5000.00', 'shipped', '2025-02-12 19:03:33', '2025-02-12 19:05:03', 'My home ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Gaming Headset 3003', 'Gaming headphones are electronic devices that provide audio and other features for gaming. They are designed to enhance the gaming experience by providing high-quality sound, noise cancellation, and other features. \r\nFeatures\r\nSound quality: Gaming headphones are tuned to provide detailed sound and spatial cues to help gamers locate enemies. \r\nNoise cancellation: Some gaming headphones have noise-canceling technology to reduce ambient noise. \r\nComfort: Gaming headphones often have large, padded earpieces and headbands to provide comfort during long gaming sessions. \r\nMicrophone: Most gaming headphones include a microphone. \r\nRGB lighting: Some gaming headphones have RGB lighting. \r\nInline controls: Some gaming headphones have inline controls for quick adjustments. \r\nSoftware: Some gaming headphones have software that allows for sound customization.', '10000.00', 'uploads/1738956843_gmaing headset.png', '2025-02-07 19:34:03', '2025-02-07 19:34:52'),
(2, 'Gaming Mouse (Wireless)', 'Rechargeable Mouse, Energy-Efficient - Equipped with a built-in 700 mAh battery, this wireless mouse could charge rapidly and get enough power for a full day of use in only 5 minutes, without any downtime during recharging. A full charge can last up to 90 days.\r\nLess Noise, More Focus - Eliminate noise and distractions with 90% reduced click sound for enhancing your working Immersion.\r\nCompact Design, Travel Friendly - With the dimension of 4.09*2.68*1.49 in, this compact wireless mouse provides more portability and a better travel experience.\r\nErgonomic Design, Comfort Grip - The contoured shape of this mouse is ergonomically designed to fit the natural curve of your hand, ensuring lasting comfort and productivity. Featuring rubber side-grips, it offers added thumb support for a superior working experience.\r\nAdvanced Optical Tracking - Featuring 6-level adjustable DPI (800/1200/1600/2400/3200/4800), this wireless mouse provides high-performance precision and smart cursor control on most surfaces.\r\nPlug and Play - Simply plug the USB mini-receiver into your Windows, Mac, Chrome OS, or Linux computer and enjoy seamless connectivity up to 49 feet.\r\nNotice - Please be aware that a Type-C charging cable is included. The USB receiver is stored at the back of the wireless mouse. Only compatible with USB-A port.', '3000.00', 'uploads/1738957001_wireless mouse.png', '2025-02-07 19:36:41', '2025-02-07 19:36:41'),
(6, 'Gaming Seleves 2.0', 'The finger sleeve for gaming is made of carbon fiber and spandex material, making you more sensitive and comfortable to the phone screen; It can isolate hand sweat, anti slip and anti drop, helping you improve the gaming experience.', '120.00', 'uploads/1738959826_1.jpg', '2025-02-07 20:23:46', '2025-02-07 20:23:46'),
(9, 'G FORCE GRAPHIC CARD RTX 4090', 'The NVIDIA® GeForce RTX™ 4090 is the ultimate GeForce GPU. It brings an enormous leap in performance, efficiency, and AI-powered graphics. Experience ultra-high performance gaming, incredibly detailed virtual worlds, unprecedented productivity, and new ways to create. It’s powered by the NVIDIA Ada Lovelace architecture and comes with 24 GB of G6X memory to deliver the ultimate experience for gamers and creators.', '60000.00', 'uploads/1739304247_geforce-rtx-4090-product-photo-002.png', '2025-02-11 20:04:07', '2025-02-11 20:04:07'),
(10, 'GAMING KEYBOARD RGB', 'A gaming keyboard is a specialized keyboard designed to enhance the gaming experience with features that improve performance, accuracy, and comfort. Unlike standard keyboards, gaming keyboards often come equipped with **mechanical switches** for faster response times, **anti-ghosting and N-key rollover** to prevent missed keystrokes, and **RGB backlighting** for customizable aesthetics. Many models also include **programmable macro keys**, **dedicated media controls**, and **ergonomic wrist rests** to support long gaming sessions. Some high-end gaming keyboards even offer **adjustable actuation points**, **hot-swappable switches**, and **wireless connectivity with low-latency response**, making them a vital tool for serious gamers seeking precision and speed.', '5000.00', 'uploads/1739304680_gmaing keyboard.png', '2025-02-11 20:11:20', '2025-02-11 20:11:20'),
(11, 'LOGITECH MOUSEPAD', 'A gaming mouse pad is designed to provide a smooth, consistent surface for enhanced precision and control during gameplay. Unlike standard mouse pads, gaming mouse pads often feature high-quality materials, such as micro-textured cloth or low-friction hard surfaces, to improve tracking accuracy for both optical and laser sensors. Many gaming mouse pads also come with non-slip rubber bases to prevent movement during intense gaming sessions.', '300.00', 'uploads/1739304806_logitech-mouse-pad-studio-series-corner-view-graphite.png', '2025-02-11 20:13:26', '2025-02-11 20:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `signup_user`
--

CREATE TABLE `signup_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup_user`
--

INSERT INTO `signup_user` (`id`, `name`, `lastname`, `dob`, `gender`, `email`, `pass`) VALUES
(5, 'Mubashir', 'Ahmed', '2006-08-18', 'male', 'mubashirahmedmemon01@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Muzammil', 'Ahmed', '2000-02-08', 'male', 'ahmedmuzammil976@gmail.com', '604aec454b766f22d3c0063a356d090a'),
(7, 'Muzammil', 'Ahmed', '2000-02-08', 'male', 'ahmedmuzammil976@gmail.com', '604aec454b766f22d3c0063a356d090a'),
(10, 'Mubashir Ahmed', 'Ahmed Memon', '2006-08-18', 'male', 'mubashirahmed@gmail.com', '68053af2923e00204c3ca7c6a3150cf7'),
(11, 'Mudassir', 'Ahmed', '2002-12-22', 'female', 'mudassirahmed121@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'Mubashir', 'Ahmed', '2006-08-18', 'male', 'mubashirahmedmemon01@gamil.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(13, 'Shaista', 'balloo', '1980-09-11', 'female', 'shaistaballo@gmail.com', '717d8b3d60d9eea997b35b02b6a4e867'),
(14, 'BEBO RANI', 'RANI MOTII', '2008-08-16', 'female', 'motii@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(15, 'INUMAKI SENIOR', 'FROM JJK', '2001-10-23', 'male', 'inumakitoge@gmail.com', 'cd27dfd2713de674fc38e08afdabbbd6'),
(16, 'Ahmed Ali', 'Shokat Ali', '2006-08-13', 'male', 'ahmedali@gmail.com', '743c41a921516b04afde48bb48e28ce6'),
(17, 'Satoru', 'Gojo', '1989-12-07', 'male', 'satougojo@gmail.com', '585af228c017f77987b473f2e1c2db44'),
(18, 'mubashirahmed', 'ahmedmemon', '2006-08-18', 'male', 'mubahirahmedking@gmail.com', 'b83a886a5c437ccd9ac15473fd6f1788'),
(19, 'Mubashir', 'Ahmed', '2006-08-18', 'male', 'mubashir@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(20, 'Abdul Faheem', 'Bhatti', '1976-10-15', 'male', 'abdulfaheembhatti@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4');

--
-- Triggers `signup_user`
--
DELIMITER $$
CREATE TRIGGER `after_signup_insert` AFTER INSERT ON `signup_user` FOR EACH ROW BEGIN
    INSERT INTO imageone (id, filename) 
    VALUES (NEW.id, '');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_profile_view`
-- (See below for the actual view)
--
CREATE TABLE `user_profile_view` (
`id` int(11)
,`name` varchar(255)
,`lastname` varchar(255)
,`dob` date
,`gender` varchar(10)
,`email` varchar(255)
,`filename` varchar(100)
,`uploaded_at` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `user_profile_view`
--
DROP TABLE IF EXISTS `user_profile_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_profile_view`  AS  select `su`.`id` AS `id`,`su`.`name` AS `name`,`su`.`lastname` AS `lastname`,`su`.`dob` AS `dob`,`su`.`gender` AS `gender`,`su`.`email` AS `email`,`img`.`filename` AS `filename`,`img`.`uploaded_at` AS `uploaded_at` from (`signup_user` `su` left join `imageone` `img` on(`su`.`id` = `img`.`id`)) order by `img`.`uploaded_at` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imageone`
--
ALTER TABLE `imageone`
  ADD PRIMARY KEY (`imageid`),
  ADD KEY `fk_user_image` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup_user`
--
ALTER TABLE `signup_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `imageone`
--
ALTER TABLE `imageone`
  MODIFY `imageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `signup_user`
--
ALTER TABLE `signup_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `imageone`
--
ALTER TABLE `imageone`
  ADD CONSTRAINT `fk_user_image` FOREIGN KEY (`id`) REFERENCES `signup_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `signup_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
