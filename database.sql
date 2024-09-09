-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 10:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personalbudget`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `expense_category_assigned_to_user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_methods_assigned_to_user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `date_of_expense` date NOT NULL,
  `expense_comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `user_id`, `expense_category_assigned_to_user_id`, `payment_methods_assigned_to_user_id`, `amount`, `date_of_expense`, `expense_comment`) VALUES
(5, 22, 338, 40, 222.00, '2024-09-04', 'obligation'),
(6, 22, 327, 40, 22.00, '2024-09-04', ''),
(8, 22, 340, 39, 123.00, '2024-08-06', 'splata dlugu'),
(9, 22, 327, 38, 11.00, '2024-09-04', 'adsf'),
(11, 22, 342, 39, 250.00, '2024-08-04', 'zalatwienie sprawy'),
(14, 22, 327, 38, 1520.00, '2024-05-07', ''),
(15, 22, 327, 38, 444444.00, '2024-01-17', ''),
(17, 22, 328, 38, 350.00, '2024-09-09', '');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_category_assigned_to_users`
--

CREATE TABLE `expenses_category_assigned_to_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `expenses_category_assigned_to_users`
--

INSERT INTO `expenses_category_assigned_to_users` (`id`, `name`, `user_id`) VALUES
(234, 'Food', 19),
(235, 'Fuel', 19),
(236, 'City transport', 19),
(237, 'Taxi', 19),
(238, 'Fun', 19),
(239, 'Health', 19),
(240, 'Clothes', 19),
(241, 'Hygiene', 19),
(242, 'Kids', 19),
(243, 'Recreation', 19),
(244, 'Travel', 19),
(245, 'Savings', 19),
(246, 'For pension', 19),
(247, 'Debt repayment', 19),
(248, 'Presents', 19),
(249, 'Another', 19),
(265, 'Food', 20),
(266, 'Fuel', 20),
(267, 'City transport', 20),
(268, 'Taxi', 20),
(269, 'Fun', 20),
(270, 'Health', 20),
(271, 'Clothes', 20),
(272, 'Hygiene', 20),
(273, 'Kids', 20),
(274, 'Recreation', 20),
(275, 'Travel', 20),
(276, 'Savings', 20),
(277, 'For pension', 20),
(278, 'Debt repayment', 20),
(279, 'Presents', 20),
(280, 'Another', 20),
(296, 'Food', 21),
(297, 'Fuel', 21),
(298, 'City transport', 21),
(299, 'Taxi', 21),
(300, 'Fun', 21),
(301, 'Health', 21),
(302, 'Clothes', 21),
(303, 'Hygiene', 21),
(304, 'Kids', 21),
(305, 'Recreation', 21),
(306, 'Travel', 21),
(307, 'Savings', 21),
(308, 'For pension', 21),
(309, 'Debt repayment', 21),
(310, 'Presents', 21),
(311, 'Another', 21),
(327, 'Food', 22),
(328, 'Fuel', 22),
(329, 'City transport', 22),
(330, 'Taxi', 22),
(331, 'Fun', 22),
(332, 'Health', 22),
(333, 'Clothes', 22),
(334, 'Hygiene', 22),
(335, 'Kids', 22),
(336, 'Recreation', 22),
(337, 'Travel', 22),
(338, 'Savings', 22),
(339, 'For pension', 22),
(340, 'Debt repayment', 22),
(341, 'Presents', 22),
(342, 'Another', 22),
(358, 'Food', 23),
(359, 'Fuel', 23),
(360, 'City transport', 23),
(361, 'Taxi', 23),
(362, 'Fun', 23),
(363, 'Health', 23),
(364, 'Clothes', 23),
(365, 'Hygiene', 23),
(366, 'Kids', 23),
(367, 'Recreation', 23),
(368, 'Travel', 23),
(369, 'Savings', 23),
(370, 'For pension', 23),
(371, 'Debt repayment', 23),
(372, 'Presents', 23),
(373, 'Another', 23),
(374, 'Food', 24),
(375, 'Fuel', 24),
(376, 'City transport', 24),
(377, 'Taxi', 24),
(378, 'Fun', 24),
(379, 'Health', 24),
(380, 'Clothes', 24),
(381, 'Hygiene', 24),
(382, 'Kids', 24),
(383, 'Recreation', 24),
(384, 'Travel', 24),
(385, 'Savings', 24),
(386, 'For pension', 24),
(387, 'Debt repayment', 24),
(388, 'Presents', 24),
(389, 'Another', 24);

-- --------------------------------------------------------

--
-- Table structure for table `expenses_category_default`
--

CREATE TABLE `expenses_category_default` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `expenses_category_default`
--

INSERT INTO `expenses_category_default` (`id`, `name`) VALUES
(1, 'Food'),
(2, 'Fuel'),
(3, 'City transport'),
(4, 'Taxi'),
(5, 'Fun'),
(6, 'Health'),
(7, 'Clothes'),
(8, 'Hygiene'),
(9, 'Kids'),
(10, 'Recreation'),
(11, 'Travel'),
(12, 'Savings'),
(13, 'For pension'),
(14, 'Debt repayment'),
(15, 'Presents'),
(16, 'Another');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `income_category_assigned_to_user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `date_of_income` date NOT NULL,
  `income_comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `user_id`, `income_category_assigned_to_user_id`, `amount`, `date_of_income`, `income_comment`) VALUES
(34, 22, 54, 300.00, '2024-08-01', 'sprzedaz allegro'),
(39, 22, 54, 250.00, '2024-09-09', ''),
(40, 22, 55, 300.00, '2024-09-09', ''),
(41, 22, 56, 350.00, '2024-09-09', '');

-- --------------------------------------------------------

--
-- Table structure for table `incomes_category_assigned_to_users`
--

CREATE TABLE `incomes_category_assigned_to_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `incomes_category_assigned_to_users`
--

INSERT INTO `incomes_category_assigned_to_users` (`id`, `name`, `user_id`) VALUES
(33, 'Paycheck', 19),
(34, 'Investments', 19),
(35, 'Passive income', 19),
(36, 'Another', 19),
(40, 'Paycheck', 20),
(41, 'Investments', 20),
(42, 'Passive income', 20),
(43, 'Another', 20),
(47, 'Paycheck', 21),
(48, 'Investments', 21),
(49, 'Passive income', 21),
(50, 'Another', 21),
(54, 'Paycheck', 22),
(55, 'Investments', 22),
(56, 'Passive income', 22),
(57, 'Another', 22),
(61, 'Paycheck', 23),
(62, 'Investments', 23),
(63, 'Passive income', 23),
(64, 'Another', 23),
(65, 'Paycheck', 24),
(66, 'Investments', 24),
(67, 'Passive income', 24),
(68, 'Another', 24),
(69, 'Charity', 22);

-- --------------------------------------------------------

--
-- Table structure for table `incomes_category_default`
--

CREATE TABLE `incomes_category_default` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `incomes_category_default`
--

INSERT INTO `incomes_category_default` (`id`, `name`) VALUES
(1, 'Paycheck'),
(2, 'Investments'),
(3, 'Passive income'),
(4, 'Another');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods_assigned_to_users`
--

CREATE TABLE `payment_methods_assigned_to_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment_methods_assigned_to_users`
--

INSERT INTO `payment_methods_assigned_to_users` (`id`, `name`, `user_id`) VALUES
(26, 'Debit card', 18),
(27, 'Cash', 18),
(28, 'Credit card', 18),
(29, 'Debit card', 19),
(30, 'Cash', 19),
(31, 'Credit card', 19),
(32, 'Debit card', 20),
(33, 'Cash', 20),
(34, 'Credit card', 20),
(35, 'Debit card', 21),
(36, 'Cash', 21),
(37, 'Credit card', 21),
(38, 'Debit card', 22),
(39, 'Cash', 22),
(40, 'Credit card', 22),
(41, 'Debit card', 23),
(42, 'Cash', 23),
(43, 'Credit card', 23),
(44, 'Debit card', 24),
(45, 'Cash', 24),
(46, 'Credit card', 24),
(47, 'Cheque', 22);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods_default`
--

CREATE TABLE `payment_methods_default` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment_methods_default`
--

INSERT INTO `payment_methods_default` (`id`, `name`) VALUES
(1, 'Debit card'),
(2, 'Cash'),
(3, 'Credit card');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(18, 'a@abc.com', 'a', 'a@abc.com'),
(19, 'q@com.pll', 'a', 'q@com.pll'),
(20, 'Jolanta.skucha@gmail.com', 'w', 'Jolanta.skucha@gmail.com'),
(21, 's', '$2y$12$JJV6JEs0oJI5lByzlUR3mu/XPYPUrWa2S9ic1hgZYfXTi5EzSvutG', 's@test.com'),
(22, 'abc', '$2y$12$47VO.P.K0Sq4YCbhC3kM9.4PBuR73RIk96ig5voVdGb0nxo1r7xha', 'abc@abc.com'),
(23, 'adf', '$2y$12$DhooSqA02KmknRaSoANLJuHogwBmMu/DKoSLF5QPe6Fv1DEnJFIkS', 'adf@adf.com'),
(24, 'df', '$2y$12$WXufxMSWzQnAu4ImLfVWK.3LyC5nRazGs7UHb8.LdWXItOkP6atWS', 'df@df.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_payment_method` (`payment_methods_assigned_to_user_id`),
  ADD KEY `FK_expense_category` (`expense_category_assigned_to_user_id`),
  ADD KEY `FK_user_id` (`user_id`);

--
-- Indexes for table `expenses_category_assigned_to_users`
--
ALTER TABLE `expenses_category_assigned_to_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_u` (`user_id`);

--
-- Indexes for table `expenses_category_default`
--
ALTER TABLE `expenses_category_default`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`) USING BTREE,
  ADD KEY `FK_incomes_category` (`income_category_assigned_to_user_id`);

--
-- Indexes for table `incomes_category_assigned_to_users`
--
ALTER TABLE `incomes_category_assigned_to_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK-user` (`user_id`);

--
-- Indexes for table `incomes_category_default`
--
ALTER TABLE `incomes_category_default`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods_assigned_to_users`
--
ALTER TABLE `payment_methods_assigned_to_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_userId` (`user_id`);

--
-- Indexes for table `payment_methods_default`
--
ALTER TABLE `payment_methods_default`
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
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `expenses_category_assigned_to_users`
--
ALTER TABLE `expenses_category_assigned_to_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT for table `expenses_category_default`
--
ALTER TABLE `expenses_category_default`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `incomes_category_assigned_to_users`
--
ALTER TABLE `incomes_category_assigned_to_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `incomes_category_default`
--
ALTER TABLE `incomes_category_default`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_methods_assigned_to_users`
--
ALTER TABLE `payment_methods_assigned_to_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `payment_methods_default`
--
ALTER TABLE `payment_methods_default`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `FK_expense_category` FOREIGN KEY (`expense_category_assigned_to_user_id`) REFERENCES `expenses_category_assigned_to_users` (`id`),
  ADD CONSTRAINT `FK_payment_method` FOREIGN KEY (`payment_methods_assigned_to_user_id`) REFERENCES `payment_methods_assigned_to_users` (`id`),
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expenses_category_assigned_to_users`
--
ALTER TABLE `expenses_category_assigned_to_users`
  ADD CONSTRAINT `FK_u` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `FK_incomes_category` FOREIGN KEY (`income_category_assigned_to_user_id`) REFERENCES `incomes_category_assigned_to_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `incomes_category_assigned_to_users`
--
ALTER TABLE `incomes_category_assigned_to_users`
  ADD CONSTRAINT `FK-user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_methods_assigned_to_users`
--
ALTER TABLE `payment_methods_assigned_to_users`
  ADD CONSTRAINT `FK_userId` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
