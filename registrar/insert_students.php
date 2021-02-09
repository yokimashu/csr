<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $students_id = $_POST['students_id'];
    $surname = $_POST['surname'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $course = $_POST['course'];
    $student_year_level = $_POST['student_year_level'];
  
      //insert user to database
      $register_user_sql = "INSERT INTO tbl_students SET 
        students_id      = :students_id,
        surname          = :surname,
        first_name       = :first_name,
        middle_name      = :middle_name,
        course           = :course,
        student_year_level         = :student_year_level";

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':students_id' => $students_id,
        ':surname'     => $surname,
        ':first_name'  => $first_name,
        ':middle_name' => $middle_name,
        ':course'      => $course,
        ':student_year_level'  => $student_year_level

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