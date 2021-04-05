<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $objid = $_POST['objid'];
    $students_id = $_POST['students_id'];
    $subjects_id = $_POST['subjects_id'];
    $prelim = $_POST['prelim'];
    $midterm = $_POST['midterm'];
    $finals = $_POST['finals'];
    $remarks = $_POST['remarks'];
    
  
      //insert user to database
      $register_user_sql = "INSERT INTO tbl_grades SET 
        objid             = :objid,
        students_id          = :students_id,
        subjects_id          = :subjects_id,
        prelim               = :prelim,
        midterm              = :midterm,
        finals               = :finals,
        remarks              = :remarks";
  

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':objid'            => $objid,
        ':students_id'      => $students_id,
        ':subjects_id'      => $subjects_id,
        ':prelim'           => $prelim,
        ':midterm'          => $midterm,
        ':finals'           => $finals,
        ':remarks'          => $remarks
      ]);

      $alert_msg .= ' 
          <div class="new-alert new-alert-success alert-dismissible">
              <i class="icon fa fa-success"></i>
              Data Inserted
          </div>     
      ';
     // $fname = $mname = $lname = $contact_number = $email = $uname = $upass = '';

     $btnStatus = 'disabled';
     $btnNew = 'enabled';
    }

  

 

 
?>