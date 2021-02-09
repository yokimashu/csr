<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $room_no = $_POST['room_no'];
    $description = $_POST['room_description'];
  
      //insert user to database
      $register_user_sql = "INSERT INTO tbl_rooms SET 
        room_no             = :room_no,
        room_description    = :desc";

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':room_no'        => $room_no,
        ':desc'           => $description
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