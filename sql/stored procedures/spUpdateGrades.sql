DELIMITER $$

USE `csr`$$

DROP PROCEDURE IF EXISTS `spUpdateGrades`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateGrades`(
    
    objid VARCHAR(50),
    student_id VARCHAR(50),
    subject_id VARCHAR(50),
    prelim VARCHAR(50),
    midterm VARCHAR(50),
    finals VARCHAR(50),
    remarks VARCHAR(50),
    student_status VARCHAR(50)
		
   
    )
BEGIN
   
   
	UPDATE tbl_grades 
	SET
	`prelim` = prelim,
	`midterm` = midterm,
	`finals` = finals,
	`remarks` = remarks
	 WHERE
	 `descriptive_title` = subject_id AND
	 `objid` = objid AND
	 `students_id` = student_id;
	 
	 
	 UPDATE tbl_enrollment SET STATUS = student_status 
	 WHERE students_id = student_id;
	
    END$$

DELIMITER ;