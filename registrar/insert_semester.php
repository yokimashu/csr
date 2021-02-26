<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $semester_id = $_POST['semester_id'];
    $number_of_students = $_POST['number_of_students'];
  
      //insert user to database
      $register_user_sql = "INSERT INTO tbl_semester SET 
        semester_id             = :semester_id,
        number_of_students      = :number_of_students";

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':semester_id'             => $semester_id,
        ':number_of_students'      => $number_of_students
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