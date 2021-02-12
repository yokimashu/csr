<?php
    include('../config/db_config.php');


  $alert_msg = '';
    if (isset($_POST['update'])){

  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

         //to check if data are passed
       
    $subjects_id           = $_POST['subjects_id'];
    $subjects_description  = $_POST['subjects_description'];
    $units                 = $_POST['units'];
    $course_code          = $_POST['course_code'];
    $year_level           = $_POST['year_level'];
    $semester             = $_POST['semester'];
    $pre_requisites       = $_POST['pre_requisites'];

  

            $update_subjects_sql = "UPDATE tbl_subjects SET 
                pre_requisites         = :pre_requisites,
                semester               = :semester,
                year_level             = :year_level,
                course_code            = :course_code,
                units                  = :units,
                subjects_description   = :subjects_description
                WHERE subjects_id      = :subjects_id";
    
          $update_subjects = $con->prepare($update_subjects_sql);
          $update_subjects->execute([
                ':pre_requisites'              => $pre_requisites, 
                ':semester'                    => $semester,
                ':year_level'                  => $year_level,
                ':course_code'                 => $course_code,
                ':units'                       => $units,
                ':subjects_description'        => $subjects_description,
                ':subjects_id'                 => $subjects_id
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