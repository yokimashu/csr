<?php
    include('../config/db_config.php');


  $alert_msg = '';
    if (isset($_POST['update'])){

  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

         //to check if data are passed
       
    $user_id              = $_POST['user_id'];
    $first_name           = $_POST['first_name'];
    $middle_name          = $_POST['middle_name'];
    $last_name            = $_POST['last_name'];
    $contact_no           = $_POST['contact_no'];
    $email      = $_POST['email'];
    $username             = $_POST['username'];
    $userpass             = $_POST['userpass'];
    $account_type         = $_POST['account_type'];

  

            $update_faculty_sql = "UPDATE tbl_users SET 
                account_type         = :account_type,
                userpass             = :userpass,
                username             = :username,
                email                = :email,
                contact_no           = :contact_no,
                last_name            = :last_name,
                middle_name          = :middle_name,
                first_name           = :first_name,
                WHERE user_id        = :user_id";
    
          $update_users = $con->prepare($update_users_sql);
          $update_users->execute([
                ':account_type'              => $account_type, 
                ':userpass'                  => $userpass,
                ':username'                  => $username,
                ':email'                     => $email,
                ':contact_no'                => $contact_no,
                ':last_name'                 => $last_name,
                ':middle_name'               => $middle_name,
                ':first_name'                => $first_name,
                ':user_id'                   => $user_id
          ]);
        
      // echo "Data Inserted";

    
            $alert_msg .= ' 
              <div class="new-alert new-alert-success alert-dismissible">
                  <i class="icon fa fa-success"></i>
                  Data Updated.
              </div>     
            ';

          }
    
?>