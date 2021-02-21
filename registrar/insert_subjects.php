<?php
  include('../config/db_config.php');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['save'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $subjects_id = $_POST['subjects_id'];
    $subjects_description = $_POST['subjects_description'];
    $units = $_POST['units'];
    $course_code = $_POST['course_code'];
    $year_level = $_POST['year_level'];
    $semester = $_POST['semester'];
    $pre_requisites = $_POST['pre_requisites'];
    
      //insert user to database
      $register_user_sql = "INSERT INTO tbl_subjects SET 
        subjects_id             = :subjects_id,
        subjects_description    = :desc,
        units                   = :units,
        course_code             = :course_code,
        year_level              = :year_level,
        semester                = :semester,
        pre_requisites          = :pre_requisites";

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':subjects_id'    => $subjects_id,
        ':desc'           => $subjects_description,
        ':units'          => $units,
        ':course_code'    => $course_code,
        ':year_level'     => $year_level,
        ':semester'       => $semester,
        ':pre_requisites' => implode(" , ", $pre_requisites)

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