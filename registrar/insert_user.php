<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    // $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $contact_no = $_POST['contact_no'];
    $email= $_POST['email'];
    $username1 = $_POST['username'];
    $userpass = $_POST['userpass'];
    $account_type = $_POST['account_type'];



  
      //insert user to database
      $register_user_sql = "INSERT INTO tbl_users SET 
        -- user_id        = :user_id,
        first_name     = :first_name,
        middle_name    = :middle_name,
        last_name      = :last_name,
        contact_no     = :contact_no,
        email          = :email,
        username       = :username,
        userpass       = :userpass,
        account_type   = :account_type";
    
  

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        // ':user_id'            => $user_id,
        ':first_name'         => $first_name,
        ':middle_name'        => $middle_name,
        ':last_name'          => $last_name,
        ':contact_no'         => $contact_no,
        ':email'              => $email,
        ':username'           => $username1,
        ':userpass'           => $userpass,
        ':account_type'       => $account_type
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