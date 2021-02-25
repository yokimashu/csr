<?php
    include('../config/db_config.php');


  $alert_msg = '';
    if (isset($_POST['update'])){

  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

         //to check if data are passed
       
    $year_level = $_POST['year_level'];
    $total_students_number = $_POST['total_students_number'];
  

            $update_year_sql = "UPDATE tbl_year SET 
                total_students_number    = :total_students_number
                WHERE year_level         = :year_level";
    
          $update_year = $con->prepare($update_year_sql);
          $update_year->execute([
                ':total_number_students'    => $description, 
                ':year_level'               => $year_level
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