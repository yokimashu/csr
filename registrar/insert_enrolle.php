<?php 
include('../config/db_config.php');
if(isset($_POST['idno'])){
 $query = "INSERT INTO tbl_enrollment SET
            students_id = :id,
            course_code = :course,
            year_level = :level,
            semester = :sem,
            major = 'N/A',
            status = 'ACTIVE' ";
            $execute = $con->prepare($query);
            $execute->execute([':id' =>$_POST['idno'],
            ':course' => $_POST['course'],
            ':level' => $_POST['yearlevel'],
           ':sem' => $_POST['semester'] ]);   
 
    
}

?>