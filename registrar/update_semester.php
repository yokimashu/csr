<?php
    include('../config/db_config.php');


  $alert_msg = '';
    if (isset($_POST['update'])){

  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

         //to check if data are passed
       
    $code        = $_POST['code'];
    $semester = $_POST['semester'];
  

            $update_semester_sql = "UPDATE tbl_semester SET 
                semester    = :semester
                WHERE code      = :code";
    
          $update_semester = $con->prepare($update_semester_sql);
          $update_semester->execute([
                ':semester'           => $semester, 
                ':code'                  => $code
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