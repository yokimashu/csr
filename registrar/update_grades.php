<?php
    include('../config/db_config.php');


  $alert_msg = '';
    if (isset($_POST['update'])){

  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

         //to check if data are passed
       
    $objid = $_POST['objid'];
    $students_id = $_POST['students_id'];
    $subjects_id = $_POST['subjects_id'];
    $prelim = $_POST['prelim'];
    $midterm = $_POST['midterm'];
    $finals = $_POST['finals'];
    $remarks = $_POST['remarks'];
  

            $update_grades_sql = "UPDATE tbl_grades SET 
                remarks = :remarks,
                finals = :finals,
                midterm = :midterm,
                prelim = :prelim,
                subjects_id = :subjects_id,
                students_id = :students_id
                WHERE objid    = :objid";
    
          $update_grades = $con->prepare($update_grades_sql);
          $update_grades->execute([
                ':remarks'       => $remarks, 
                ':finals'        => $finals, 
                ':midterm'       => $midterm, 
                ':prelim'        => $prelim, 
                ':subjects_id'   => $subjects_id, 
                ':students_id'   => $students_id, 
                ':objid'         => $objid
               
          ]);
        
      // echo "Data Updated";

    
            $alert_msg .= ' 
              <div class="new-alert new-alert-success alert-dismissible">
                  <i class="icon fa fa-success"></i>
                  Data Updated.
              </div>     
            ';

          }
    
?>