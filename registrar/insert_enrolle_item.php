<?php
include('../config/db_config.php');
if(isset($_POST['idno'])){
    $idno = $_POST['idno'];
$subject = $_POST['subcode'];
$title = $_POST['deptitle'];
$units = $_POST['units'];
$day = $_POST['days'];
$time = $_POST['time'];
$room = $_POST['sroom'];
if($idno !='' && $subject !='' && $title !='' && $units !='' && $day !='' && $time !='' && $room !=''){
    $query = "INSERT INTO tbl_enrollment_item SET
            students_id = :id,
            subject_code = :subject,
            descriptive_title = :title,
            units = :units,
            days = :day,
            time = :stime,
            room = :room ";

            $execute = $con->prepare($query);
            $execute->execute([':id' =>$idno,
            ':subject' => $subject,
            ':title' =>$title ,
           ':units' => $units,
           ':day' => $day,
           ':stime' => $time,
           ':room' => $room]);   


           $grades = "INSERT INTO tbl_grades SET
           students_id  = :id,
           subjects_id  = :subjects_id,
           descriptive_title    =   :title,
           prelim   =   '',
           midterm  =   '' ,
           final    =   '',
            remarks =   ''";

           $insert_grades = $con->prepare($grades);
           $insert_grades->execute([
            ':id'   =>  $idno,
           ':subjects_id'   =>  $subject,
           ':title' =>  $title]);
 echo json_encode("You successfully enrolled new student!");
}else{
    echo json_encode("There is something wrong in the enrollment!");
}
}

?>