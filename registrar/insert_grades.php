<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $objid = $_POST['objid'];
    $student_id = $_POST['student_id'];
    $subject_id = $_POST['subject_id'];
    $prelim = $_POST['prelim'];
    $midterm = $_POST['midterm'];
    $finals = $_POST['finals'];
    $remarks = $_POST['remarks'];
    
  
      //insert user to database
      $register_user_sql = "INSERT INTO tbl_grades SET 
        objid             = :objid,
        student_id           = :student_id,
        subject_id           = :subject_id,
        prelim               = :prelim,
        midterm              = :midterm,
        finals               = :finals,
        remarks              =:remarks";
  

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':objid'            => $objid,
        ':student_id'       => $student_id,
        ':subject_id'       => $subject_id,
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