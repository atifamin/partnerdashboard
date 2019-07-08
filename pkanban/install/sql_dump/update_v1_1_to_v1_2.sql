--
-- Update from v.1.1 to v.1.2
--

ALTER TABLE `tasks` ADD `task_archived` BOOLEAN NOT NULL DEFAULT FALSE;


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
ALTER TABLE `attachments`
 ADD PRIMARY KEY (`attachment_id`);

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
MODIFY `attachment_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `attachments` CHANGE `attachment_filename` `attachment_filename` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `attachments` CHANGE `attachment_original_filename` `attachment_original_filename` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `attachments` ADD `attachment_user_id` INT NOT NULL ;
