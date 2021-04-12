<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $courses_id = $_POST['courses_id'];
    $courses = $_POST['courses'];
    
  
      //insert user to database
      $register_user_sql = "INSERT INTO tbl_courses SET 
        courses_id             = :courses_id,
        courses                = :courses";
  
  

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':courses_id'        => $courses_id,
        ':courses'           => $courses
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