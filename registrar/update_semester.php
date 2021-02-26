<?php
    include('../config/db_config.php');


  $alert_msg = '';
    if (isset($_POST['update'])){

  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

         //to check if data are passed
       
    $semester_id        = $_POST['semester_id'];
    $number_of_students = $_POST['number_of_students'];
  

            $update_semester_sql = "UPDATE tbl_semester SET 
                number_of_students    = :number_of_students
                WHERE semester_id       = :semester_id";
    
          $update_semester = $con->prepare($update_semester_sql);
          $update_semester->execute([
                ':number_of_students'           => $number_of_students, 
                ':semester_id'                  => $semester_id
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