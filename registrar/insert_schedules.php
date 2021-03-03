<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $subject = $_POST['subject'];
    $schedule = $_POST['schedule'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $room = $_POST['room'];
    $teacher = $_POST['teacher'];
  
  
      //insert user to database
      $register_schedule_sql = "INSERT INTO tbl_schedules SET 
        subject_code         = :subjects,
        days                  = :days,
        start_time            = :start_time,
        end_time              = :end_time,
        room_code             = :room,
        teacher_code          = :teacher";
    
  

      $register_data = $con->prepare($register_schedule_sql);
      $register_data->execute([
        ':subjects'         => $subject,
        ':days'             => implode(" , ", $schedule),
        ':start_time'       => $start_time,
        ':end_time'         => $end_time,
        ':room'             => $room,
        ':teacher'          => $teacher
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