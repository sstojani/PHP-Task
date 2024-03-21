-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 09:49 AM
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
-- Database: `responsive`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', 1, 1709052259),
('user', 17, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1709052259, 1709052259),
('manageTasks', 2, NULL, NULL, NULL, 1709052259, 1709052259),
('user', 1, NULL, NULL, NULL, 1709052259, 1709052259),
('viewOwnTasks', 2, NULL, NULL, NULL, 1709052259, 1709052259);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'manageTasks'),
('user', 'viewOwnTasks');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1708684026),
('m140506_102106_rbac_init', 1708684029),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1708684029),
('m180523_151638_rbac_updates_indexes_without_prefix', 1708684029),
('m200409_110543_rbac_update_mssql_trigger', 1708684029),
('m240222_134624_initial', 1708684294),
('m240223_103054_add_foreign_key_to_auth_assignment_table', 1708684321),
('m240223_112650_create_task_table', 1708687940),
('m240227_112507_add_foreign_key_to_task_table', 1709033192);

-- --------------------------------------------------------

--
-- Table structure for table `prospect`
--

CREATE TABLE `prospect` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zip_code` int(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fiscal_code` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prospect`
--

INSERT INTO `prospect` (`id`, `email`, `first_name`, `last_name`, `date`, `address`, `city`, `zip_code`, `phone`, `fiscal_code`) VALUES
(78, 'john.doe@example.com', 'John', 'Doe', '2024-03-20 15:20:31', '123 Main St', 'Anytown', 12345, '555-1234', 'ABC123'),
(79, 'jane.smith@example.com', 'Jane', 'Smith', '2024-03-20 15:20:31', '456 Elm St', 'Anycity', 54321, '555-5678', 'DEF456'),
(80, 'john.doe@example.com', 'John', 'Doe', '2024-03-20 15:21:06', '123 Main St', 'Anytown', 12345, '555-1234', 'ABC123'),
(81, 'jane.smith@example.com', 'Jane', 'Smith', '2024-03-20 15:21:06', '456 Elm St', 'Anycity', 54321, '555-5678', 'DEF456'),
(82, 'john.doe@example.com', 'John', 'Doe', '2024-03-20 15:31:43', '123 Main St', 'Anytown', 12345, '555-1234', 'ABC123'),
(83, 'jane.smith@example.com', 'Jane', 'Smith', '2024-03-20 15:31:43', '456 Elm St', 'Anycity', 54321, '555-5678', 'DEF456');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `user_id`, `request_text`, `created_at`, `status`) VALUES
(6, 17, 'sdadasdas', '2024-03-20 11:02:55', 1),
(7, 17, 'semi', '2024-03-20 11:04:32', 0),
(8, 17, 'dasasasd', '2024-03-20 11:05:18', 1),
(11, 1, 'sadasd', '2024-03-20 11:21:24', 1),
(15, 17, 'Need water in the office.', '2024-03-21 08:37:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` smallint(6) DEFAULT 0,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`, `assigned_to`, `order`) VALUES
(3, 'Bathrom', 'Bathrom Cleaning', 1, 1709033973, 1709033973, 1, 1),
(5, 'Garazh', 'Clean the garazh', 0, 1709044616, 1709044681, 1, 2),
(7, 'sss', 'ssss', 1, 1709110158, 1709110158, 17, 0),
(10, 'gggg', 'gggg', 1, 2345634, 234567, 1, 4),
(11, 'gggg', 'gggg', 1, 2345634, 234567, 1, 3),
(12, 'gggg', 'gggg', 1, 2345634, 234567, 1, 5),
(13, 'gggg', 'gggg', 1, 2345634, 234567, 1, 6),
(14, 'gggg', 'gggg', 1, 2345634, 234567, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `auth_key`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$13$2XZofohYOJxn6RAp/Ymr7.7/Y25WStk7c0CYh8ufirEq9TLrVLJfy', 'dAol2oiDvsFG4pErVqqThuJgqiWZAhTM', '2024-02-23 11:47:31', '2024-02-23 11:49:32'),
(17, 'user', '$2y$13$QjEdrc7aiLmmwAxWAuGmAOtw1gJurt2Q14yFGn6QPLxo.y4krU8BW', 'K57a2UNfRb_JnFNeSpdi_ewjmWJUzNxL', '2024-02-28 09:48:18', '2024-02-28 09:48:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `prospect`
--
ALTER TABLE `prospect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-task-assigned_to` (`assigned_to`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prospect`
--
ALTER TABLE `prospect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk-task-assigned_to` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
