<?php
include('../config/db_config.php');
if(isset($_POST['id'])){

    $id = $_POST['id'];
    $yearlevel = $_POST['yearLevel'];
    $semester = $_POST['sem'];
    $enrolledStudentId = '';
$create_stmt = $con->prepare(
    "SELECT id from tbl_enrollment WHERE
        students_id = :id AND 
        year_level  =  :yearlevel AND
        semester   =   :semester LIMIT 1" );
$create_stmt->execute([
    ':id'   =>$id,
    ':yearlevel'   =>$yearlevel,
    ':semester'   =>$semester
]);

while($result = $create_stmt->fetch(PDO::FETCH_ASSOC)){
    $enrolledStudentId = $result['id'];


}

echo json_encode($enrolledStudentId);

}




?>