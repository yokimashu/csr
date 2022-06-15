DELIMITER $$

USE `csr`$$

DROP PROCEDURE IF EXISTS `spInsertEnrollmentItem`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertEnrollmentItem`(
	objid VARCHAR(50),
	student_id VARCHAR(50),
	YEAR VARCHAR(50),
        semester VARCHAR(50),
        SUBJECT VARCHAR(50),
        title VARCHAR(50),
	units VARCHAR(50),
        DAY VARCHAR(50),
        TIME VARCHAR(50),
	room VARCHAR(50)
          
    
    )
BEGIN
	INSERT INTO tbl_enrollment_item SET
	`objid` = objid,
	`students_id` = student_id,
	`year` = YEAR,
	`semester` = semester,
	`subject_code` = SUBJECT,
	`descriptive_title` = title,
	`units` = units,
	`days` = DAY,
	`time` = TIME,	
	`room` = room;			
	
	
	INSERT INTO tbl_grades SET
	
	`objid` = objid,
	`students_id` = student_id,
	`subjects_id` = SUBJECT,
	`descriptive_title` = title;
	
	
    END$$

DELIMITER ;