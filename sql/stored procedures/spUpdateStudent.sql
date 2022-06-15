DELIMITER $$

USE `csr`$$

DROP PROCEDURE IF EXISTS `spUpdateStudent`$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateStudent`(
    id VARCHAR(50),
    student_status VARCHAR(50),
    fname VARCHAR(50),
    mname VARCHAR(50),
    lname VARCHAR(50),
    bday VARCHAR(50),
    place_of_birth VARCHAR(100),
    nationality VARCHAR(50),
    gender VARCHAR(10),
    sstatus VARCHAR(50),
    cnumber INT(20),
    fbaccount VARCHAR(100),
    religion VARCHAR(50),
    baptized VARCHAR(5),
    confirmed VARCHAR(5),
    elem_school VARCHAR(100),
    high_school VARCHAR(100),
    last_attended VARCHAR(100),
    street VARCHAR(100),
    vil_subd VARCHAR(100),
    brgy VARCHAR(100), 
    city VARCHAR(100),
    province VARCHAR(100),
    region VARCHAR(100),
    zipcode INT(10),
    parent VARCHAR(100),
    address VARCHAR(100),
    contact INT(50),
    occupation VARCHAR(100)
    
    
    )
BEGIN
	UPDATE tbl_students SET
	student_status = student_status,
	first_name = fname,
	middle_name = mname,
	last_name = lname,
	date_of_birth = bday,
	place_of_birth = place_of_birth,
	nationality = nationality,
	gender = gender,
	civil_status = sstatus,
	contact_number = cnumber,
	facebook_account = fbaccount,
	religion = religion,
	baptized = baptized,
	confirmed = confirmed,
	elementary_school = elem_school,
	high_school = high_school,
	last_attended_college = last_attended
	WHERE students_id = id;
	
	
	UPDATE tbl_student_address SET
	street = street,
	vil_subd = vil_subd,
	barangay = brgy,
	city = city,
	province = province,
	region = region,
	zipcode = zipcode 
	WHERE student_id = id;
	
	UPDATE tbl_student_guardian SET
	parent_name = parent,
	address = address,
	contact = contact,
	occupation = occupation
	WHERE student_id = id;
	
	
    END$$

DELIMITER ;