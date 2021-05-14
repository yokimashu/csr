<?php
include('../config/db_config.php');
if (isset($_POST['idno'])) {
    $query = "UPDATE tbl_enrollment SET
           
            students_id = :id,
            course_code = :course,
            year_level = :level,
            semester = :sem,
            major = 'N/A'
            WHERE  objid       = :objid";


    $execute = $con->prepare($query);
    $execute->execute([
        ':objid'     => $_POST['objid'],
        ':id'        => $_POST['idno'],
        ':course'    => $_POST['course'],
        ':level'     => $_POST['yearlevel'],
        ':sem'       => $_POST['semester']
    ]);

    $deleteSubjects = "DELETE FROM tbl_enrollment_item where objid = :objid";
    $execute = $con->prepare($deleteSubjects);
    $execute->execute([
        ':objid'     => $_POST['objid']
    ]);


    $deleteGrades = "DELETE FROM tbl_grades WHERE objid = :objid";
    $execute = $con->prepare($deleteGrades);
    $execute->execute([
        ':objid'     => $_POST['objid']
    ]);
}
