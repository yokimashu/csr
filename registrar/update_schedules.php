<?php
    include('../config/db_config.php');


  $alert_msg = '';
    if (isset($_POST['update'])){

  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

         //to check if data are passed
       
    $objid          = $_POST['objid'];
    $subject_code    = $_POST['subject_code'];
    $days           = $_POST['days'];
    $start_time     = $_POST['start_time'];
    $end_time       = $_POST['end_time'];
    $room_code      = $_POST['room_code'];
    $teacher_code   = $_POST['teacher_code'];

  

            $update_status_sql = "UPDATE tbl_schedules SET 
                teacher_code           = :teacher_code,
                room_code              = :room_code,
                end_time               = :end_time,
                start_time             = :start_time,
                days                   = :days,
                subject_code           = :subject_code
                WHERE objid            = :objid";
    
          $update_status= $con->prepare($update_status_sql);
          $update_status->execute([
                ':teacher_code'     => $teacher_code, 
                ':room_code'        => $room_code,
                ':end_time'         => $end_time,
                ':start_time'       => $start_time,
                ':days'             => implode(" , ", $days),
                ':subject_code'     => $subject_code,
                ':objid'            => $objid
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