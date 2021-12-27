<?php 
include('../config/db_config.php');
if(isset($_POST['idno'])){
 $query = "INSERT INTO tbl_enrollment SET
            objid       = :objid,
            students_id = :id,
            course_code = :course,
            year_level = :level,
            semester = :sem,
            major = 'N/A',
            status = 'PENDING' ";
            $execute = $con->prepare($query);
            $execute->execute([
            ':objid'     => $_POST['objid'],
            ':id'        => $_POST['idno'],
            ':course'    => $_POST['course'],
            ':level'     => $_POST['yearlevel'],
            ':sem'       => $_POST['semester']]);   
 
    
}

?>