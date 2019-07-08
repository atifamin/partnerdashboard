-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2019 at 08:30 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tbpikbfe_taskboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `attachment_id` int(11) NOT NULL,
  `attachment_filename` varchar(255) CHARACTER SET utf8 NOT NULL,
  `attachment_original_filename` varchar(255) CHARACTER SET utf8 NOT NULL,
  `attachment_task_id` int(11) NOT NULL,
  `attachment_creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `attachment_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `board_id` int(11) NOT NULL,
  `board_name` varchar(255) NOT NULL,
  `board_default` tinyint(1) NOT NULL,
  `board_order` int(11) NOT NULL,
  `board_dashboard_name` varchar(128) NOT NULL COMMENT '[New Item for Atif] Dashboard Name associated with this TaskBoard',
  `board_partner_id` int(11) NOT NULL COMMENT '[New Item for Atif] Dashboard Partner ID for this TaskBoard',
  `board_type` varchar(64) NOT NULL COMMENT '[New Item for Atif] Identifies what type of TaskBoard is this '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`board_id`, `board_name`, `board_default`, `board_order`, `board_dashboard_name`, `board_partner_id`, `board_type`) VALUES
(1, 'Personal', 1, 0, '', 0, ''),
(4, 'My Projects', 0, 1, '', 0, ''),
(5, 'Pipeline-1', 0, 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `boards_users`
--

CREATE TABLE `boards_users` (
  `board_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boards_users`
--

INSERT INTO `boards_users` (`board_id`, `user_id`) VALUES
(1, 1),
(4, 1),
(4, 81),
(0, 0),
(0, 0),
(0, 0),
(0, 0),
(0, 0),
(5, 1),
(5, 77),
(5, 79),
(5, 81);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `conf_background_image` varchar(200) DEFAULT NULL,
  `conf_navbar_color` int(11) NOT NULL,
  `conf_administrator_email` varchar(255) NOT NULL,
  `conf_administrator_name` varchar(255) NOT NULL,
  `conf_date_format` int(11) NOT NULL,
  `conf_background_opacity` float NOT NULL DEFAULT '0.2',
  `conf_session_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`conf_background_image`, `conf_navbar_color`, `conf_administrator_email`, `conf_administrator_name`, `conf_date_format`, `conf_background_opacity`, `conf_session_data`) VALUES
('eca68f2b2de52855d043d8ab7adac011.jpg', 19, 'info@digitalborder.net', 'DigitalBorder', 3, 0.1, 'eyJ0bSI6MTU1NzUxMjg4MywiY2QiOiI2YjdhOTllZC1jNTk5LTRmMDItYTAzNC04MGM3OTQyMzU5YWMiLCJkbSI6ImxvY2FsaG9zdDo4MSJ9');

-- --------------------------------------------------------

--
-- Table structure for table `containers`
--

CREATE TABLE `containers` (
  `container_id` int(11) NOT NULL,
  `container_board` int(11) NOT NULL,
  `container_name` varchar(255) NOT NULL,
  `container_order` int(11) NOT NULL,
  `container_color` varchar(11) NOT NULL,
  `container_funding_percentage` decimal(5,0) NOT NULL COMMENT '[New Item For Atif] Funding Percentage Associated with this Container',
  `container_done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `containers`
--

INSERT INTO `containers` (`container_id`, `container_board`, `container_name`, `container_order`, `container_color`, `container_funding_percentage`, `container_done`) VALUES
(1, 1, 'TO DO LIST', 0, '7', '0', 0),
(5, 1, 'DO TODAY', 1, '16', '0', 0),
(7, 1, 'DONE', 3, '10', '0', 1),
(15, 1, 'IN PROGRESS', 2, '14', '0', 0),
(25, 4, 'All projects', 0, '6', '0', 0),
(26, 4, '30%', 1, '7', '0', 0),
(27, 4, '50%', 2, '8', '0', 0),
(28, 4, '70%', 3, '9', '0', 0),
(29, 4, 'DONE', 5, '10', '0', 0),
(32, 4, 'Beta Testing', 4, '14', '0', 0),
(33, 5, 'Request Submitted', 0, '8', '0', 0),
(35, 5, 'Request Under Review', 1, '14', '0', 0),
(37, 5, 'Review Completed', 2, '12', '0', 0),
(39, 5, 'Request Approved', 3, '11', '0', 0),
(41, 5, 'Funding Closed', 4, '10', '0', 1),
(43, 5, 'Funding Denied', 5, '1', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_title` varchar(255) NOT NULL,
  `task_description` text NOT NULL,
  `task_user` int(11) NOT NULL,
  `task_date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_due_date` datetime DEFAULT NULL,
  `task_date_closed` timestamp NULL DEFAULT NULL,
  `task_container` int(11) NOT NULL,
  `task_order` int(11) NOT NULL,
  `task_funding_amount_requested` int(11) NOT NULL COMMENT '[New Item For Atif] - Funding amount requested by User',
  `task_funding_approved_amount` int(11) NOT NULL COMMENT '[New Item For Atif] - Funding Amount Approved by Partner',
  `task_user_bizVault_status` varchar(48) NOT NULL COMMENT '[New Item For Atif] - bizVault Status for this Deal (Task)',
  `task_user_bizVault_access_id` int(11) NOT NULL COMMENT '[New Item For Atif] - bizVault Access ID for this Deal (Task)',
  `task_time_spent` time DEFAULT NULL,
  `task_time_estimate` time DEFAULT NULL,
  `task_color` varchar(20) DEFAULT '0',
  `task_archived` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_title`, `task_description`, `task_user`, `task_date_creation`, `task_due_date`, `task_date_closed`, `task_container`, `task_order`, `task_funding_amount_requested`, `task_funding_approved_amount`, `task_user_bizVault_status`, `task_user_bizVault_access_id`, `task_time_spent`, `task_time_estimate`, `task_color`, `task_archived`) VALUES
(5, 'Send project start to Joe', 'Quisque rutrum. Donec orci lectus, aliquam ut, faucibus non, euismod id, nulla. Ut non enim eleifend felis pretium feugiat. Praesent metus tellus, elementum eu, semper a, adipiscing nec, purus.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Vestibulum rutrum, mi nec elementum vehicula, eros quam gravida nisl, id fringilla neque ante vel mi. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor. Fusce pharetra convallis urna.', 0, '2016-10-11 20:02:32', '0000-00-00 00:00:00', NULL, 5, 1, 0, 0, '', 0, '00:18:10', '00:22:10', '1', 0),
(8, 'Setting dei container', 'aggiungere pagina con form per aggiungere i container', 0, '2016-10-11 20:12:55', '0000-00-00 00:00:00', NULL, 6, 3, 100, 0, '', 0, '00:00:00', '00:00:00', '1', 0),
(12, 'My blu task 2', 'asd', 0, '2016-10-14 20:52:33', '2016-10-27 13:26:00', NULL, 6, 1, 0, 0, '', 0, '00:01:53', '00:00:00', '1', 0),
(14, 'da fare completa', 'Duis lobortis massa imperdiet quam. Morbi nec metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia.', 0, '2016-10-14 21:18:25', '0000-00-00 00:00:00', NULL, 6, 2, 100, 0, '', 0, '00:00:26', '00:00:02', '1', 0),
(28, 'asd', 'ad', 0, '2016-10-17 12:14:12', '0000-00-00 00:00:00', NULL, 8, 1, 0, 0, '', 0, '00:00:00', '00:00:00', '1', 0),
(33, 'Call John for appointment', '', 0, '2016-10-17 21:15:09', '0000-00-00 00:00:00', '2016-10-23 20:41:23', 7, 1, 0, 0, '', 0, '00:00:00', '00:00:00', '1', 0),
(34, 'Study new competitors', '', 0, '2016-10-17 21:15:26', '0000-00-00 00:00:00', '2016-10-30 16:30:26', 7, 3, 0, 0, '', 0, '00:33:36', '01:00:01', '1', 0),
(37, 'Send email to Joe', 'with details of briefing', 0, '2016-10-17 21:17:41', '0000-00-00 00:00:00', NULL, 1, 1, 200, 0, '', 0, '00:00:04', '00:00:00', '1', 0),
(38, 'Create a pitch for startup', '', 0, '2016-10-17 21:26:14', '0000-00-00 00:00:00', '2016-10-19 19:17:36', 15, 1, 0, 0, '', 0, '01:02:30', '00:15:00', '1', 0),
(41, 'Project 1', '', 0, '2016-10-23 20:36:20', '0000-00-00 00:00:00', NULL, 25, 2, 0, 0, '', 0, '00:00:00', '00:00:00', '15', 0),
(46, 'Project 2', '', 0, '2016-11-01 18:37:10', '0000-00-00 00:00:00', NULL, 32, 1, 0, 0, '', 0, '00:00:00', '00:00:00', '12', 0),
(47, 'App mobile Project', '', 0, '2016-11-01 18:37:22', '0000-00-00 00:00:00', NULL, 26, 1, 0, 0, '', 0, '00:00:00', '00:00:00', '17', 0),
(48, 'Project 3', '', 0, '2016-11-01 18:41:55', '0000-00-00 00:00:00', NULL, 28, 1, 0, 0, '', 0, '00:00:00', '00:00:00', '1', 0),
(49, 'Project 4', '', 0, '2016-11-01 18:43:55', '0000-00-00 00:00:00', NULL, 28, 2, 0, 0, '', 0, '00:00:00', '00:00:00', '8', 0),
(50, 'Project 6', '', 0, '2016-11-01 18:45:42', '0000-00-00 00:00:00', NULL, 25, 1, 200, 0, '', 0, '00:00:00', '00:00:00', '20', 0),
(51, 'Graphic generic project', '', 0, '2016-11-01 18:45:53', '0000-00-00 00:00:00', NULL, 29, 1, 0, 0, '', 0, '00:00:00', '00:00:00', '0', 0),
(56, 'Buy new software', 'Software 1, Software 2', 0, '2016-11-01 18:52:29', '0000-00-00 00:00:00', NULL, 1, 2, 0, 0, '', 0, '00:00:00', '00:00:00', '13', 0),
(69, 'Write a letter', '', 0, '2016-11-03 20:40:20', '2016-11-02 21:43:00', NULL, 5, 3, 0, 0, '', 0, '00:00:04', '00:00:00', '12', 0),
(70, 'Publish beta program', '', 0, '2016-11-03 20:40:35', '0000-00-00 00:00:00', NULL, 15, 3, 0, 0, '', 0, '00:00:00', '00:00:00', '5', 0),
(71, 'Write a newsletter', '', 0, '2016-11-03 20:40:56', '0000-00-00 00:00:00', NULL, 15, 2, 0, 0, '', 0, '00:00:01', '00:00:00', '3', 0),
(72, 'Buy myKanban webApp', '', 0, '2016-11-03 20:41:22', '0000-00-00 00:00:00', '2016-11-03 20:41:31', 7, 2, 400, 0, '', 0, '00:00:00', '00:00:00', '10', 0),
(74, 'some title', 'test description', 1, '2019-05-10 18:29:54', '0000-00-00 00:00:00', '2019-05-21 20:17:55', 5, 2, 0, 0, '', 0, '00:00:00', '00:00:00', '', 0),
(75, 'Test1-Deal', 'This is the deal for Test1', 1, '2019-05-21 20:14:32', '0000-00-00 00:00:00', '2019-05-21 20:17:55', 43, 2, 0, 0, '', 0, '00:00:00', '00:00:00', '', 0),
(77, 'Test2-Deal', 'This is the deal for Test2', 1, '2019-05-21 20:15:06', '0000-00-00 00:00:00', '2019-05-29 08:20:58', 41, 4, 0, 0, '', 0, '00:00:00', '00:00:00', '7', 0),
(79, 'Test3-Deal', 'This is the deal for Test3', 1, '2019-05-21 20:15:57', '0000-00-00 00:00:00', '2019-05-21 20:18:13', 43, 1, 0, 0, '', 0, '00:00:02', '00:00:00', '', 0),
(81, 'Test4-Deal', 'This is the deal for Test4', 1, '2019-05-21 20:16:10', '0000-00-00 00:00:00', '2019-05-29 08:21:02', 41, 1, 0, 0, '', 0, '00:00:01', '00:00:00', '', 0),
(83, 'Test5-Deal', 'This is the deal for Test5', 1, '2019-05-21 20:16:24', '0000-00-00 00:00:00', '2019-05-29 08:21:19', 41, 3, 0, 0, '', 0, NULL, '00:00:00', '', 0),
(85, 'Test6-Deal', 'This is the deal for Test6', 1, '2019-05-21 20:16:39', '0000-00-00 00:00:00', NULL, 35, 1, 0, 0, '', 0, '00:00:00', '00:00:00', '', 0),
(87, 'Test7-Deal', 'This is the deal for Test7', 1, '2019-05-21 20:16:52', '0000-00-00 00:00:00', '2019-05-29 08:20:56', 41, 5, 0, 0, '', 0, '00:00:00', '00:00:00', '', 0),
(89, 'Test8-Deal', 'This is the deal for Test8', 1, '2019-05-21 20:17:10', '0000-00-00 00:00:00', '2019-05-29 08:21:07', 41, 2, 0, 0, '', 0, '00:00:00', '00:00:00', '', 0),
(91, 'Test9-Deal', 'This is the deal for Test9', 1, '2019-05-21 20:17:22', '0000-00-00 00:00:00', NULL, 33, 1, 0, 0, '', 0, '00:00:00', '00:00:00', '', 0),
(93, 'Test10-Deal', 'This is the deal for Test10', 1, '2019-05-21 20:18:29', '0000-00-00 00:00:00', NULL, 33, 0, 0, 0, '', 0, '00:00:00', '00:00:00', '', 0),
(94, 'Sign up page', '', 1, '2019-06-17 13:04:52', '0000-00-00 00:00:00', NULL, 1, 0, 0, 0, '', 0, '00:00:00', '00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasks_todo`
--

CREATE TABLE `tasks_todo` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `task_comment`
--

CREATE TABLE `task_comment` (
  `task_comment_id` int(11) NOT NULL,
  `task_comment_task_id` int(11) NOT NULL,
  `task_comment_user_id` int(11) NOT NULL,
  `task_comment_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `task_comment_title` varchar(128) NOT NULL,
  `task_comment_message` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_email_attachments`
--

CREATE TABLE `task_email_attachments` (
  `task_email_attachment_id` int(11) NOT NULL,
  `task_email_id` int(11) NOT NULL,
  `task_email_attachment_receive_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_email_attachment_type` varchar(48) NOT NULL,
  `task_email_attachment_virus_scan_status` varchar(32) NOT NULL,
  `task_email_attachment_filename` varchar(128) NOT NULL,
  `task_email_attachment_pathname` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_periods`
--

CREATE TABLE `task_periods` (
  `task_periods_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_date_start` datetime NOT NULL,
  `task_date_stop` datetime DEFAULT NULL,
  `task_periods_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_periods`
--

INSERT INTO `task_periods` (`task_periods_id`, `task_id`, `task_date_start`, `task_date_stop`, `task_periods_user`) VALUES
(1, 12, '2016-10-16 19:52:44', '2016-10-16 19:53:59', 1),
(2, 14, '2016-10-16 19:58:54', '2016-10-16 19:59:14', 1),
(3, 14, '2016-10-16 19:59:33', '2016-10-16 19:59:39', 1),
(7, 12, '2016-10-17 13:09:27', '2016-10-17 13:09:53', 1),
(8, 12, '2016-10-17 13:09:50', '2016-10-17 13:09:53', 1),
(9, 12, '2016-10-17 13:09:55', '2016-10-17 13:09:56', 1),
(10, 12, '2016-10-17 13:11:07', '2016-10-17 13:11:09', 1),
(11, 12, '2016-10-17 13:11:24', '2016-10-17 13:11:30', 1),
(12, 34, '2016-10-17 23:17:52', '2016-10-17 23:26:44', 1),
(13, 34, '2016-10-17 23:26:22', '2016-10-17 23:26:44', 1),
(15, 7, '2016-10-19 19:45:54', '2016-10-19 19:45:55', 1),
(23, 38, '2016-10-19 19:48:23', '2016-10-19 20:08:12', 1),
(26, 38, '2016-10-19 20:08:03', '2016-10-19 20:08:12', 1),
(27, 38, '2016-10-19 20:08:12', '2016-10-19 20:11:44', 1),
(29, 38, '2016-10-19 20:11:47', '2016-10-19 20:12:12', 1),
(31, 39, '2016-10-19 20:18:56', '2016-10-19 20:19:00', 1),
(32, 39, '2016-10-19 20:19:21', '2016-10-19 20:19:27', 1),
(33, 32, '2016-10-19 20:26:00', '2016-10-19 20:45:54', 1),
(34, 34, '2016-10-19 21:27:28', '2016-10-19 21:34:51', 1),
(37, 35, '2016-10-30 14:01:42', '2016-10-30 14:01:46', 1),
(38, 35, '2016-10-30 14:01:48', '2016-10-30 14:01:48', 1),
(39, 35, '2016-10-30 14:01:53', '2016-10-30 14:01:55', 1),
(40, 35, '2016-10-30 14:01:56', '2016-10-30 14:01:57', 1),
(41, 35, '2016-10-30 14:01:57', '2016-10-30 14:01:57', 1),
(42, 35, '2016-10-30 14:01:58', '2016-10-30 14:01:58', 1),
(43, 35, '2016-10-30 14:01:59', '2016-10-30 14:01:59', 1),
(44, 34, '2016-10-30 14:02:12', '2016-10-30 14:02:21', 1),
(45, 35, '2016-10-30 17:21:51', '2016-10-30 17:21:59', 1),
(46, 35, '2016-10-30 18:01:23', '2016-10-30 18:01:24', 1),
(47, 34, '2016-10-31 10:53:07', '2016-10-31 11:10:37', 1),
(48, 38, '2016-10-31 18:52:45', '2016-10-31 18:52:51', 1),
(49, 38, '2016-10-31 18:52:58', '2016-10-31 18:57:21', 1),
(51, 5, '2016-10-31 18:57:11', '2016-10-31 18:57:18', 1),
(56, 38, '2016-10-31 19:08:09', '2016-10-31 19:08:09', 1),
(59, 38, '2016-10-31 19:10:21', '2016-10-31 19:10:25', 1),
(60, 38, '2016-10-31 19:10:26', '2016-10-31 19:14:45', 1),
(61, 38, '2016-10-31 19:14:47', '2016-10-31 19:14:48', 1),
(62, 5, '2016-10-31 19:14:50', '2016-10-31 19:14:51', 1),
(63, 5, '2016-10-31 19:14:54', '2016-10-31 19:14:57', 1),
(64, 5, '2016-10-31 19:14:58', '2016-10-31 19:15:00', 1),
(65, 5, '2016-10-31 19:15:54', '2016-10-31 19:15:57', 1),
(66, 5, '2016-10-31 19:15:58', '2016-10-31 19:15:59', 1),
(67, 5, '2016-10-31 19:16:00', '2016-10-31 19:16:01', 1),
(68, 5, '2016-10-31 19:16:01', '2016-10-31 19:16:02', 1),
(70, 5, '2016-11-01 18:38:39', '2016-11-01 18:38:44', 1),
(71, 44, '2016-11-01 18:38:56', '2016-11-01 18:44:49', 1),
(72, 44, '2016-11-01 18:44:53', '2016-11-01 18:44:55', 1),
(73, 5, '2016-11-01 18:44:57', '2016-11-01 18:44:59', 1),
(74, 5, '2016-11-01 18:45:04', '2016-11-01 18:45:10', 1),
(75, 5, '2016-11-01 18:45:13', '2016-11-01 18:45:15', 1),
(76, 5, '2016-11-01 18:45:18', '2016-11-01 18:45:20', 1),
(77, 5, '2016-11-01 18:46:18', '2016-11-01 18:46:20', 1),
(78, 5, '2016-11-01 18:46:21', '2016-11-01 18:46:23', 1),
(79, 5, '2016-11-01 18:46:24', '2016-11-01 18:46:26', 1),
(80, 44, '2016-11-01 18:47:39', '2016-11-01 18:47:44', 1),
(81, 44, '2016-11-01 18:47:46', '2016-11-01 18:47:48', 1),
(82, 44, '2016-11-01 18:47:49', '2016-11-01 18:47:51', 1),
(83, 44, '2016-11-01 18:47:52', '2016-11-01 18:47:59', 1),
(84, 5, '2016-11-01 18:49:33', '2016-11-01 18:51:01', 1),
(85, 44, '2016-11-01 18:51:04', '2016-11-01 18:58:32', 1),
(86, 38, '2016-11-01 18:58:35', '2016-11-01 18:58:44', 1),
(87, 5, '2016-11-01 18:58:45', '2016-11-01 19:00:28', 1),
(88, 44, '2016-11-01 19:00:29', '2016-11-01 19:00:34', 1),
(89, 37, '2016-11-01 19:00:35', '2016-11-01 19:00:39', 1),
(90, 38, '2016-11-01 19:01:19', '2016-11-01 19:01:21', 1),
(91, 5, '2016-11-01 19:01:22', '2016-11-01 19:01:25', 1),
(92, 44, '2016-11-01 19:01:26', '2016-11-01 19:03:18', 1),
(93, 35, '2016-11-01 19:04:01', '2016-11-01 19:04:45', 1),
(94, 47, '2016-11-01 19:37:24', '2016-11-01 19:37:25', 1),
(95, 38, '2016-11-01 19:55:22', '2016-11-01 19:55:32', 1),
(96, 38, '2016-11-01 19:57:25', '2016-11-01 19:57:26', 1),
(97, 38, '2016-11-01 19:58:40', '2016-11-01 19:58:42', 1),
(98, 38, '2016-11-01 20:05:57', '2016-11-01 20:05:58', 1),
(99, 38, '2016-11-01 20:15:52', '2016-11-01 20:15:53', 1),
(100, 38, '2016-11-01 20:15:57', '2016-11-01 20:16:00', 1),
(101, 38, '2016-11-01 20:34:25', '2016-11-01 20:34:26', 1),
(103, 38, '2016-11-03 21:41:45', '2016-11-03 22:10:57', 1),
(104, 67, '2016-11-05 12:05:17', '2016-11-05 12:25:13', 1),
(105, 71, '2016-11-05 19:31:47', '2016-11-05 19:31:48', 1),
(106, 69, '2019-05-16 08:39:44', '2019-05-16 08:39:48', 1),
(107, 81, '2019-05-29 08:33:12', '2019-05-29 08:33:13', 79),
(108, 79, '2019-05-29 08:34:21', '2019-05-29 08:34:23', 79);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `dashboard_user_id` int(11) NOT NULL COMMENT '[New Item For Atif] - This is the User''s Primary ID from Dashboard',
  `user_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_daily_reminder` tinyint(1) NOT NULL DEFAULT '0',
  `user_permissions` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `dashboard_user_id`, `user_name`, `user_last_name`, `user_email`, `user_password`, `user_daily_reminder`, `user_permissions`) VALUES
(1, 5001, 'Atif', 'One', 'atifamin2002@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0),
(77, 5002, 'Faisal', 'One', 'user1@user1.com', '202cb962ac59075b964b07152d234b70', 0, 10),
(79, 0, 'User ', 'Two', 'user2@user2.com', '202cb962ac59075b964b07152d234b70', 0, 10),
(81, 0, 'User', 'Three', 'user3@user3.com', '202cb962ac59075b964b07152d234b70', 0, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`attachment_id`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`board_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `containers`
--
ALTER TABLE `containers`
  ADD PRIMARY KEY (`container_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `tasks_todo`
--
ALTER TABLE `tasks_todo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_comment`
--
ALTER TABLE `task_comment`
  ADD PRIMARY KEY (`task_comment_id`);

--
-- Indexes for table `task_email_attachments`
--
ALTER TABLE `task_email_attachments`
  ADD PRIMARY KEY (`task_email_attachment_id`);

--
-- Indexes for table `task_periods`
--
ALTER TABLE `task_periods`
  ADD PRIMARY KEY (`task_periods_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `attachment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `containers`
--
ALTER TABLE `containers`
  MODIFY `container_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `tasks_todo`
--
ALTER TABLE `tasks_todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task_comment`
--
ALTER TABLE `task_comment`
  MODIFY `task_comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task_email_attachments`
--
ALTER TABLE `task_email_attachments`
  MODIFY `task_email_attachment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task_periods`
--
ALTER TABLE `task_periods`
  MODIFY `task_periods_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
