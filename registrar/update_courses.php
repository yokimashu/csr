<?php
    include('../config/db_config.php');


  $alert_msg = '';
    if (isset($_POST['update'])){

  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

         //to check if data are passed
       
    $courses_id = $_POST['courses_id'];
    $courses = $_POST['courses'];
    $number_of_enrollees = $_POST['number_of_enrollees'];
  

            $update_courses_sql = "UPDATE tbl_courses SET 
                number_of_enrollees    = :number_of_enrollees
                courses                = :courses
                WHERE courses_id       = :courses_id";
    
          $update_courses = $con->prepare($update_courses_sql);
          $update_courses->execute([
                ':number_of_enrollees'       => $number_of_enrollees, 
                ':courses'                   => $courses,
                ':courses_id'                => $courses_id
                
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