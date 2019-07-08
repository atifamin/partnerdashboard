
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mykanban`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `boards`
--

CREATE TABLE IF NOT EXISTS `boards` (
`board_id` int(11) NOT NULL,
  `board_name` varchar(255) NOT NULL,
  `board_default` tinyint(1) NOT NULL,
  `board_order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `boards`
--

INSERT INTO `boards` (`board_id`, `board_name`, `board_default`, `board_order`) VALUES
(1, 'Personal', 1, 0),
(4, 'My Projects', 0, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
  `conf_background_image` varchar(200) NULL,
  `conf_navbar_color` int(11) NOT NULL,
  `conf_administrator_email` varchar(255) NOT NULL,
  `conf_administrator_name` varchar(255) NOT NULL,
  `conf_date_format` int(11) NOT NULL,
  `conf_background_opacity` float NOT NULL DEFAULT '0.2',
  `conf_session_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `configs`
--

INSERT INTO `configs` (`conf_background_image`, `conf_navbar_color`, `conf_administrator_email`, `conf_administrator_name`, `conf_date_format`, `conf_background_opacity`) VALUES ('eca68f2b2de52855d043d8ab7adac011.jpg', 19, 'info@digitalborder.net', 'DigitalBorder', 2, '0.1');

-- --------------------------------------------------------

--
-- Struttura della tabella `containers`
--

CREATE TABLE IF NOT EXISTS `containers` (
`container_id` int(11) NOT NULL,
  `container_board` int(11) NOT NULL,
  `container_name` varchar(255) NOT NULL,
  `container_order` int(11) NOT NULL,
  `container_color` varchar(11) NOT NULL,
  `container_done` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `containers`
--

INSERT INTO `containers` (`container_id`, `container_board`, `container_name`, `container_order`, `container_color`, `container_done`) VALUES
(1, 1, 'TO DO LIST', 0, '7', 0),
(5, 1, 'DO TODAY', 1, '16', 0),
(7, 1, 'DONE', 3, '10', 1),
(15, 1, 'IN PROGRESS', 2, '14', 0),
(25, 4, 'All projects', 0, '6', 0),
(26, 4, '30%', 1, '7', 0),
(27, 4, '50%', 2, '8', 0),
(28, 4, '70%', 3, '9', 0),
(29, 4, 'DONE', 5, '10', 0),
(32, 4, 'Beta Testing', 4, '14', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
`task_id` int(11) NOT NULL,
  `task_title` varchar(255) NOT NULL,
  `task_description` text NOT NULL,
  `task_user` int(11) NOT NULL,
  `task_date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_due_date` datetime DEFAULT NULL,
  `task_date_closed` timestamp NULL DEFAULT NULL,
  `task_container` int(11) NOT NULL,
  `task_order` int(11) NOT NULL,
  `task_time_spent` time DEFAULT NULL,
  `task_time_estimate` time DEFAULT NULL,
  `task_color` varchar(20) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_title`, `task_description`, `task_user`, `task_date_creation`, `task_due_date`, `task_date_closed`, `task_container`, `task_order`, `task_time_spent`, `task_time_estimate`, `task_color`) VALUES
(5, 'Send project start to Joe', 'Quisque rutrum. Donec orci lectus, aliquam ut, faucibus non, euismod id, nulla. Ut non enim eleifend felis pretium feugiat. Praesent metus tellus, elementum eu, semper a, adipiscing nec, purus.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Vestibulum rutrum, mi nec elementum vehicula, eros quam gravida nisl, id fringilla neque ante vel mi. Suspendisse faucibus, nunc et pellentesque egestas, lacus ante convallis tellus, vitae iaculis lacus elit id tortor. Fusce pharetra convallis urna.', 0, '2016-10-11 20:02:32', '0000-00-00 00:00:00', NULL, 5, 1, '00:18:10', '00:22:10', '1'),
(8, 'Setting dei container', 'aggiungere pagina con form per aggiungere i container', 0, '2016-10-11 20:12:55', '0000-00-00 00:00:00', NULL, 6, 3, '00:00:00', '00:00:00', '1'),
(12, 'My blu task 2', 'asd', 0, '2016-10-14 20:52:33', '2016-10-27 13:26:00', NULL, 6, 1, '00:01:53', '00:00:00', '1'),
(14, 'da fare completa', 'Duis lobortis massa imperdiet quam. Morbi nec metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia.', 0, '2016-10-14 21:18:25', '0000-00-00 00:00:00', NULL, 6, 2, '00:00:26', '00:00:02', '1'),
(28, 'asd', 'ad', 0, '2016-10-17 12:14:12', '0000-00-00 00:00:00', NULL, 8, 1, '00:00:00', '00:00:00', '1'),
(33, 'Call John for appointment', '', 0, '2016-10-17 21:15:09', '0000-00-00 00:00:00', '2016-10-23 20:41:23', 7, 1, '00:00:00', '00:00:00', '1'),
(34, 'Study new competitors', '', 0, '2016-10-17 21:15:26', '0000-00-00 00:00:00', '2016-10-30 16:30:26', 7, 3, '00:33:36', '01:00:01', '1'),
(37, 'Send email to Joe', 'with details of briefing', 0, '2016-10-17 21:17:41', '0000-00-00 00:00:00', NULL, 1, 5, '00:00:04', '00:00:00', '1'),
(38, 'Create a pitch for startup', '', 0, '2016-10-17 21:26:14', '0000-00-00 00:00:00', '2016-10-19 19:17:36', 15, 1, '01:02:30', '00:15:00', '1'),
(41, 'Project 1', '', 0, '2016-10-23 20:36:20', '0000-00-00 00:00:00', NULL, 25, 2, '00:00:00', '00:00:00', '15'),
(46, 'Project 2', '', 0, '2016-11-01 18:37:10', '0000-00-00 00:00:00', NULL, 32, 1, '00:00:00', '00:00:00', '12'),
(47, 'App mobile Project', '', 0, '2016-11-01 18:37:22', '0000-00-00 00:00:00', NULL, 26, 1, '00:00:00', '00:00:00', '17'),
(48, 'Project 3', '', 0, '2016-11-01 18:41:55', '0000-00-00 00:00:00', NULL, 28, 1, '00:00:00', '00:00:00', '1'),
(49, 'Project 4', '', 0, '2016-11-01 18:43:55', '0000-00-00 00:00:00', NULL, 28, 2, '00:00:00', '00:00:00', '8'),
(50, 'Project 6', '', 0, '2016-11-01 18:45:42', '0000-00-00 00:00:00', NULL, 25, 1, '00:00:00', '00:00:00', '20'),
(51, 'Graphic generic project', '', 0, '2016-11-01 18:45:53', '0000-00-00 00:00:00', NULL, 29, 1, '00:00:00', '00:00:00', '0'),
(56, 'Buy new software', 'Software 1, Software 2', 0, '2016-11-01 18:52:29', '0000-00-00 00:00:00', NULL, 1, 1, '00:00:00', '00:00:00', '13'),
(57, 'Call Patrick ', '', 0, '2016-11-01 18:52:50', '2016-11-18 19:55:00', '2016-11-06 12:35:25', 7, 4, '00:00:00', '00:00:00', ''),
(64, 'Start new project', 'New description here.', 0, '2016-11-02 19:35:25', '0000-00-00 00:00:00', NULL, 1, 2, '00:00:06', '01:00:00', '8'),
(69, 'Write a letter', '', 0, '2016-11-03 20:40:20', '2016-11-02 21:43:00', NULL, 5, 2, '00:00:00', '00:00:00', '12'),
(70, 'Publish beta program', '', 0, '2016-11-03 20:40:35', '0000-00-00 00:00:00', NULL, 1, 3, '00:00:00', '00:00:00', '5'),
(71, 'Write a newsletter', '', 0, '2016-11-03 20:40:56', '0000-00-00 00:00:00', NULL, 1, 4, '00:00:01', '00:00:00', '3'),
(72, 'Buy myKanban webApp', '', 0, '2016-11-03 20:41:22', '0000-00-00 00:00:00', '2016-11-03 20:41:31', 7, 2, '00:00:00', '00:00:00', '10');

-- --------------------------------------------------------

--
-- Struttura della tabella `tasks_todo`
--

CREATE TABLE IF NOT EXISTS `tasks_todo` (
`id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `task_periods`
--

CREATE TABLE IF NOT EXISTS `task_periods` (
`task_periods_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_date_start` datetime NOT NULL,
  `task_date_stop` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `task_periods`
--

INSERT INTO `task_periods` (`task_periods_id`, `task_id`, `task_date_start`, `task_date_stop`) VALUES
(1, 12, '2016-10-16 19:52:44', '2016-10-16 19:53:59'),
(2, 14, '2016-10-16 19:58:54', '2016-10-16 19:59:14'),
(3, 14, '2016-10-16 19:59:33', '2016-10-16 19:59:39'),
(7, 12, '2016-10-17 13:09:27', '2016-10-17 13:09:53'),
(8, 12, '2016-10-17 13:09:50', '2016-10-17 13:09:53'),
(9, 12, '2016-10-17 13:09:55', '2016-10-17 13:09:56'),
(10, 12, '2016-10-17 13:11:07', '2016-10-17 13:11:09'),
(11, 12, '2016-10-17 13:11:24', '2016-10-17 13:11:30'),
(12, 34, '2016-10-17 23:17:52', '2016-10-17 23:26:44'),
(13, 34, '2016-10-17 23:26:22', '2016-10-17 23:26:44'),
(15, 7, '2016-10-19 19:45:54', '2016-10-19 19:45:55'),
(23, 38, '2016-10-19 19:48:23', '2016-10-19 20:08:12'),
(26, 38, '2016-10-19 20:08:03', '2016-10-19 20:08:12'),
(27, 38, '2016-10-19 20:08:12', '2016-10-19 20:11:44'),
(29, 38, '2016-10-19 20:11:47', '2016-10-19 20:12:12'),
(31, 39, '2016-10-19 20:18:56', '2016-10-19 20:19:00'),
(32, 39, '2016-10-19 20:19:21', '2016-10-19 20:19:27'),
(33, 32, '2016-10-19 20:26:00', '2016-10-19 20:45:54'),
(34, 34, '2016-10-19 21:27:28', '2016-10-19 21:34:51'),
(37, 35, '2016-10-30 14:01:42', '2016-10-30 14:01:46'),
(38, 35, '2016-10-30 14:01:48', '2016-10-30 14:01:48'),
(39, 35, '2016-10-30 14:01:53', '2016-10-30 14:01:55'),
(40, 35, '2016-10-30 14:01:56', '2016-10-30 14:01:57'),
(41, 35, '2016-10-30 14:01:57', '2016-10-30 14:01:57'),
(42, 35, '2016-10-30 14:01:58', '2016-10-30 14:01:58'),
(43, 35, '2016-10-30 14:01:59', '2016-10-30 14:01:59'),
(44, 34, '2016-10-30 14:02:12', '2016-10-30 14:02:21'),
(45, 35, '2016-10-30 17:21:51', '2016-10-30 17:21:59'),
(46, 35, '2016-10-30 18:01:23', '2016-10-30 18:01:24'),
(47, 34, '2016-10-31 10:53:07', '2016-10-31 11:10:37'),
(48, 38, '2016-10-31 18:52:45', '2016-10-31 18:52:51'),
(49, 38, '2016-10-31 18:52:58', '2016-10-31 18:57:21'),
(51, 5, '2016-10-31 18:57:11', '2016-10-31 18:57:18'),
(56, 38, '2016-10-31 19:08:09', '2016-10-31 19:08:09'),
(59, 38, '2016-10-31 19:10:21', '2016-10-31 19:10:25'),
(60, 38, '2016-10-31 19:10:26', '2016-10-31 19:14:45'),
(61, 38, '2016-10-31 19:14:47', '2016-10-31 19:14:48'),
(62, 5, '2016-10-31 19:14:50', '2016-10-31 19:14:51'),
(63, 5, '2016-10-31 19:14:54', '2016-10-31 19:14:57'),
(64, 5, '2016-10-31 19:14:58', '2016-10-31 19:15:00'),
(65, 5, '2016-10-31 19:15:54', '2016-10-31 19:15:57'),
(66, 5, '2016-10-31 19:15:58', '2016-10-31 19:15:59'),
(67, 5, '2016-10-31 19:16:00', '2016-10-31 19:16:01'),
(68, 5, '2016-10-31 19:16:01', '2016-10-31 19:16:02'),
(70, 5, '2016-11-01 18:38:39', '2016-11-01 18:38:44'),
(71, 44, '2016-11-01 18:38:56', '2016-11-01 18:44:49'),
(72, 44, '2016-11-01 18:44:53', '2016-11-01 18:44:55'),
(73, 5, '2016-11-01 18:44:57', '2016-11-01 18:44:59'),
(74, 5, '2016-11-01 18:45:04', '2016-11-01 18:45:10'),
(75, 5, '2016-11-01 18:45:13', '2016-11-01 18:45:15'),
(76, 5, '2016-11-01 18:45:18', '2016-11-01 18:45:20'),
(77, 5, '2016-11-01 18:46:18', '2016-11-01 18:46:20'),
(78, 5, '2016-11-01 18:46:21', '2016-11-01 18:46:23'),
(79, 5, '2016-11-01 18:46:24', '2016-11-01 18:46:26'),
(80, 44, '2016-11-01 18:47:39', '2016-11-01 18:47:44'),
(81, 44, '2016-11-01 18:47:46', '2016-11-01 18:47:48'),
(82, 44, '2016-11-01 18:47:49', '2016-11-01 18:47:51'),
(83, 44, '2016-11-01 18:47:52', '2016-11-01 18:47:59'),
(84, 5, '2016-11-01 18:49:33', '2016-11-01 18:51:01'),
(85, 44, '2016-11-01 18:51:04', '2016-11-01 18:58:32'),
(86, 38, '2016-11-01 18:58:35', '2016-11-01 18:58:44'),
(87, 5, '2016-11-01 18:58:45', '2016-11-01 19:00:28'),
(88, 44, '2016-11-01 19:00:29', '2016-11-01 19:00:34'),
(89, 37, '2016-11-01 19:00:35', '2016-11-01 19:00:39'),
(90, 38, '2016-11-01 19:01:19', '2016-11-01 19:01:21'),
(91, 5, '2016-11-01 19:01:22', '2016-11-01 19:01:25'),
(92, 44, '2016-11-01 19:01:26', '2016-11-01 19:03:18'),
(93, 35, '2016-11-01 19:04:01', '2016-11-01 19:04:45'),
(94, 47, '2016-11-01 19:37:24', '2016-11-01 19:37:25'),
(95, 38, '2016-11-01 19:55:22', '2016-11-01 19:55:32'),
(96, 38, '2016-11-01 19:57:25', '2016-11-01 19:57:26'),
(97, 38, '2016-11-01 19:58:40', '2016-11-01 19:58:42'),
(98, 38, '2016-11-01 20:05:57', '2016-11-01 20:05:58'),
(99, 38, '2016-11-01 20:15:52', '2016-11-01 20:15:53'),
(100, 38, '2016-11-01 20:15:57', '2016-11-01 20:16:00'),
(101, 38, '2016-11-01 20:34:25', '2016-11-01 20:34:26'),
(102, 64, '2016-11-02 20:35:31', '2016-11-02 20:35:37'),
(103, 38, '2016-11-03 21:41:45', '2016-11-03 22:10:57'),
(104, 67, '2016-11-05 12:05:17', '2016-11-05 12:25:13'),
(105, 71, '2016-11-05 19:31:47', '2016-11-05 19:31:48');


--
-- Update from v.1.0 to v.1.1
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

ALTER TABLE `users` ADD PRIMARY KEY (`user_id`);
ALTER TABLE  `users` CHANGE  `user_id`  `user_id` INT( 11 ) NOT NULL AUTO_INCREMENT ;

INSERT INTO `users` (`user_id`, `user_name`, `user_last_name`, `user_email`, `user_password`) VALUES (1, 'Admin', 'One', '<USER_NAME>', <PASSWORD>);

ALTER TABLE `users` ADD `user_daily_reminder` BOOLEAN NOT NULL DEFAULT FALSE;



CREATE TABLE IF NOT EXISTS `boards_users` (
  `board_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO boards_users (board_id, user_id)
SELECT board_id, 1
FROM boards;



ALTER TABLE `task_periods` ADD `task_periods_user` INT NOT NULL ;
UPDATE `task_periods` SET `task_periods_user` = 1;



--
-- Indexes for dumped tables
--

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
 ADD PRIMARY KEY (`board_id`);

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
-- Indexes for table `task_periods`
--
ALTER TABLE `task_periods`
 ADD PRIMARY KEY (`task_periods_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `containers`
--
ALTER TABLE `containers`
MODIFY `container_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `tasks_todo`
--
ALTER TABLE `tasks_todo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task_periods`
--
ALTER TABLE `task_periods`
MODIFY `task_periods_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;

ALTER TABLE `tasks` ADD `task_archived` BOOLEAN NOT NULL DEFAULT FALSE ;


CREATE TABLE IF NOT EXISTS `attachments` (
`attachment_id` int(11) NOT NULL,
  `attachment_filename` varchar(255) NOT NULL,
  `attachment_original_filename` varchar(255) NOT NULL,
  `attachment_task_id` int(11) NOT NULL,
  `attachment_creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments` ADD PRIMARY KEY (`attachment_id`);

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments` MODIFY `attachment_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `attachments` CHANGE `attachment_filename` `attachment_filename` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `attachments` CHANGE `attachment_original_filename` `attachment_original_filename` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `attachments` ADD `attachment_user_id` INT NOT NULL ;

ALTER TABLE `users` ADD `user_permissions` INT NOT NULL DEFAULT '0' ;

CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);


