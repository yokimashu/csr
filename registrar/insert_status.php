<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);s
    // echo "</pre>";

    $teacher_id = $_POST['teacher_id'];
    $status = $_POST['status'];
    $department = $_POST['department'];
    $courses_id = $_POST['courses_id'];
    
  
      //insert user to database
      $register_user_sql = "INSERT INTO tbl_status SET 
        teacher_id               = :teacher_id,
        status                   = :status,
        department               = :department";

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':teacher_id'                         => $teacher_id,
        ':status'                             => $status,
        ':department'                         => implode(" , ",$courses_id)
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