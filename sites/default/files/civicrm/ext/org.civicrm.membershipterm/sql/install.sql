-- install sql for membership term extension.

CREATE TABLE `civicrm_membership_term` ( `Id` BIGINT NOT NULL AUTO_INCREMENT , `userid` INT(10) NOT NULL , `membership_id` INT(10) NOT NULL , `start_date` DATE NOT NULL , `end_date` DATE NOT NULL , `contribution_id` INT(10) NOT NULL , PRIMARY KEY (`Id`)) ENGINE = InnoDB COMMENT='Table to store membership period';

