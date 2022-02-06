<?php
include('../config/db_config.php');



if (isset($_POST['student_id'])) {
  $objid = $_POST['objid'];
  $student_id = $_POST['student_id'];
  $year       = $_POST['year'];
  $semester   = $_POST['semester'];
  $subject    = $_POST['subcode'];
  $title      = $_POST['deptitle'];
  $units      = $_POST['units'];
  $day        = $_POST['days'];
  $time       = $_POST['time'];
  $room       = $_POST['sroom'];


  if ($student_id != '' && $subject != '' && $title != '' && $units != '' && $day != '' && $time != '' && $room != '') {

    $query = "CALL spInsertEnrollmentItem (

            :objid,
            :id,
            :year,
            :semester,
            :subject,
            :title,
            :units,
            :day,
            :stime,
            :room
            )";

    $execute = $con->prepare($query);
    $execute->execute([

      ':objid'          =>  $objid,
      ':id'             =>  $student_id,
      ':year'           =>  $year,
      ':semester'       =>  $semester,
      ':subject'        =>  $subject,
      ':title'          =>  $title,
      ':units'          =>  $units,
      ':day'            =>  $day,
      ':stime'          =>  $time,
      ':room'           =>  $room

    ]);



    echo json_encode("You successfully enrolled new student!");
  } else {
    echo json_encode("There is something wrong in the enrollment!");
  }
}
