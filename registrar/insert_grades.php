<?php
  include('../config/db_config.php');


  //if button insert clicked



    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $objid = $_POST['objid'];
    $students_id = $_POST['students_id'];
    $subjects_id = $_POST['subject'];
    $prelim = $_POST['prelim'];
    $midterm = $_POST['midterm'];
    $finals = $_POST['finals'];
    $remarks = $_POST['remarks'];
    
  if(isset($_POST['objid'])){
     // UPDATE THE PRELIM GRADE
      $update_prelim = "CALL spUpdateGrades(
         :objid,
         :students_id,
         :subjects_id,
         :prelim,
         :midterm,
         :finals,
         :remarks
       )";
  

      $execute_update_prelim = $con->prepare($update_prelim);
      $execute_update_prelim->execute([
        ':objid'            => $objid,
        ':students_id'      => $students_id,
        ':subjects_id'      => $subjects_id,
        ':prelim'           => $prelim,
        ':midterm'           => $midterm,
        ':finals'           => $finals,
        ':remarks'           => $remarks
      
      ]);
      
 
    }

 
?>