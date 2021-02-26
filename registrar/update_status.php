<?php
    include('../config/db_config.php');


  $alert_msg = '';
    if (isset($_POST['update'])){

  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

         //to check if data are passed
       
    $teacher_id = $_POST['teacher_id'];
    $status = $_POST['status'];
    $department = $_POST['department'];
  

            $update_status_sql = "UPDATE tbl_status SET 
                department               = :department,
                status                   = :status
                WHERE teacher_id         = :teacher_id";
    
          $update_status= $con->prepare($update_status_sql);
          $update_status->execute([
                ':department'    => $department, 
                ':status'        => $status,
                ':teacher_id'    => $teacher_id
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