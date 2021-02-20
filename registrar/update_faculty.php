<?php
    include('../config/db_config.php');


  $alert_msg = '';
    if (isset($_POST['update'])){

  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

         //to check if data are passed
       
    $teachers_id          = $_POST['teachers_id'];
    $surname              = $_POST['surname'];
    $first_name           = $_POST['first_name'];
    $middle_name          = $_POST['middle_name'];
    $work_status          = $_POST['work_status'];
    $faculty_dept         = $_POST['faculty_dept'];
    $contact_number       = $_POST['contact_number'];
    $email_address        = $_POST['email_address'];

  

            $update_faculty_sql = "UPDATE tbl_faculty SET 
                email_address        = :email_address,
                contact_number       = :contact_number,
                faculty_dept         = :faculty_dept,
                work_status          = :work_status,
                middle_name          = :middle_name,
                first_name           = :first_name,
                surname              = :surname
                WHERE teachers_id    = :teachers_id";
    
          $update_faculty = $con->prepare($update_faculty_sql);
          $update_faculty->execute([
                ':email_address'             => $email_address, 
                ':contact_number'            => $contact_number,
                ':faculty_dept'              => $faculty_dept,
                ':work_status'               => $work_status,
                ':middle_name'               => $middle_name,
                ':first_name'                => $first_name,
                ':surname'                   => $surname,
                ':teachers_id'               => $teachers_id
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