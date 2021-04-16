<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</dept>";

    $teachers_id = $_POST['teachers_id'];
    $surname = $_POST['surname'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $work_status = $_POST['work_status'];
    $courses_id = $_POST['courses_id'];
    $contact_number = $_POST['contact_number'];
    $email_address = $_POST['email_address'];



  
      //insert user to database
      $register_user_sql = "INSERT INTO tbl_faculty SET 
        teachers_id    = :teachers_id,
        surname        = :surname,
        first_name     = :first_name,
        middle_name    = :middle_name,
        work_status    = :work_status,
        faculty_dept   = :faculty_dept,
        contact_number = :contact_number,
        email_address  = :email_address";
    
  

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':teachers_id'        => $teachers_id,
        ':surname'            => $surname,
        ':first_name'         => $first_name,
        ':middle_name'        => $middle_name,
        ':work_status'        => $work_status,
        ':faculty_dept'       => implode(" , ",$courses_id),
        ':contact_number'     => $contact_number,
        ':email_address'      => $email_address
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