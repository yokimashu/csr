<?php 
include('../config/db_config.php');
if(isset($_POST['studentid'])){
    $curYear = date('Y');
 $query = "INSERT INTO tbl_enrollment SET
            `students_id` = :id,
            `objid` = :objid,
            `course_code` = :course,
            `year_level` = :level,
            `semester` = :sem,
            `major` = 'N/A',
            `year` = :year,
            `status` = :status ";
            $execute = $con->prepare($query);
            $execute->execute([
            ':id'     => $_POST['studentid'],
            ':objid'    => $_POST['objid'],
            ':course'    => $_POST['course'],
            ':level'     => $_POST['yearlevel'],
            ':year'        => $curYear,
            ':sem'       => $_POST['semester'],
            ':status'       =>'PENDING']);   
 
    
}

?>