<?php
include('../config/db_config.php');

if (isset($_POST['idno'])) {

  $objid      = $_POST['objid'];
  $idno       = $_POST['idno'];
  $year       = $_POST['year'];
  $semester   = $_POST['semester'];
  $subject    = $_POST['subcode'];
  $title      = $_POST['deptitle'];
  $units      = $_POST['units'];
  $day        = $_POST['days'];
  $time       = $_POST['time'];
  $room       = $_POST['sroom'];

  if ($idno != '' && $subject != '' && $title != '' && $units != '' && $day != '' && $time != '' && $room != '') {


    $query = "INSERT INTO tbl_enrollment_item SET

            objid             =   :objid,
            students_id       =   :id,
            year              =   :year,
            semester          =   :semester,
            subject_code      =   :subject,
            descriptive_title =   :title,
            units             =   :units,
            days              =   :day,
            time              =   :stime,
            room              =   :room";

    $execute = $con->prepare($query);
    $execute->execute([

      ':objid'          =>  $objid,
      ':id'             =>  $idno,
      ':year'           =>  $year,
      ':semester'       =>  $semester,
      ':subject'        =>  $subject,
      ':title'          =>  $title,
      ':units'          =>  $units,
      ':day'            =>  $day,
      ':stime'          =>  $time,
      ':room'           =>  $room

    ]);


    $query1 = "INSERT INTO tbl_grades SET

    objid                =   :objid,
    students_id          =   :id,
    -- year              =   :year,
    -- semester          =   :semester,
    subjects_id          =   :subject,
    descriptive_title    =   :title,
    remarks              =   'ACTIVE'";
    // -- days              =   :day,
    // -- time              =   :stime,
    // -- room              =   :room";

    $execute = $con->prepare($query1);
    $execute->execute([

      ':objid'          =>  $objid,
      ':id'             =>  $idno,
      // ':year'           =>  $year,
      // ':semester'       =>  $semester,
      ':subject'        =>  $subject,
      ':title'          =>  $title
      // ':units'          =>  $units,
      // ':day'            =>  $day,
      // ':stime'          =>  $time,
      // ':room'           =>  $room

    ]);


    echo json_encode("Record successfully updated!");
  } else {
    echo json_encode("Record was not updated!");
  }
}
