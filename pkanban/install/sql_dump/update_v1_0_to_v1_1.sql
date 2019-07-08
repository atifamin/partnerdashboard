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
ALTER TABLE `users` MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO `users` (`user_id`, `user_name`, `user_last_name`, `user_email`, `user_password`) VALUES
(1, 'Admin', 'One', '<USER_NAME>', <PASSWORD>);

UPDATE `tasks` SET `task_user` = 1;

CREATE TABLE IF NOT EXISTS `boards_users` (
  `board_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO boards_users (board_id, user_id)
SELECT board_id, 1
FROM boards;



ALTER TABLE `task_periods` ADD `task_periods_user` INT NOT NULL ;
UPDATE `task_periods` SET `task_periods_user` = 1;

