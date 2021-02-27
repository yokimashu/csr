<?php
    include('../config/db_config.php');


  $alert_msg = '';
    if (isset($_POST['update'])){

  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

         //to check if data are passed
       
    $code = $_POST['code'];
    $year_level = $_POST['year_level'];
  

            $update_year_sql = "UPDATE tbl_year SET 
                year_level   = :year_level
                WHERE code   = :code";
    
          $update_year = $con->prepare($update_year_sql);
          $update_year->execute([
                ':year_level'    => $year_level, 
                ':code'          => $code
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