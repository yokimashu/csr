<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $code = $_POST['code'];
    $year_level = $_POST['year_level'];
  
      //insert user to database
      $register_user_sql = "INSERT INTO tbl_year SET 
        code             = :code,
        year_level       = :year_level";

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':code'                         => $code,
        ':year_level'                   => $year_level
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