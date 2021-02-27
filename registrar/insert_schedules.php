<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
  
  
      //insert user to database
      $register_user_sql = "INSERT INTO tbl_schedules SET 
        day             = :day,
        start_time      = :start_time,
        end_time        = :end_time";
    
  

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':day'             => $day,
        ':start_time'      => $start_time,
        ':end_time'        => $end_time
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