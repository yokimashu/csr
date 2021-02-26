<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $year_level = $_POST['year_level'];
    $total_students_number = $_POST['total_students_number'];
  
      //insert user to database
      $register_user_sql = "INSERT INTO tbl_year SET 
        year_level                = :year_level,
        total_students_number     = :total_students_number";

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':year_level'                         => $year_level,
        ':total_students_number'              => $total_students_number
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