<?php
    include('../config/db_config.php');


  $alert_msg = '';
    if (isset($_POST['update'])){

  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

         //to check if data are passed
       
    $students_id = $_POST['students_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $surname = $_POST['surname'];
    $date_of_birth = $_POST['date_of_birth'];
    $place_of_birth = $$_POST['place_of_birth'];
    $nationality = $_POST['nationality'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $home_address = $_POST['home_address'];
    $provincial_address = $_POST['provincial_address'];
    $contact_number = $_POST['contact_number'];
    $facebook_account = $_POST['facebook_account'];
    $religion = $_POST['religion'];
    $baptized = $_POST['baptized'];
    $confirmed = $_POST['confirmed'];
    $parent_name = $_POST['parent_name'];
    $parent_contact_number = $_POST['parent_contact_number'];
    $parent_address = $_POST['parent_address'];
    $elementary_school = $_POST['elementary_school'];
    $high_school = $_POST['high_school'];
    $last_attended_college = $_POST['last_attended_college'];
  

            $update_students_sql        = "UPDATE tbl_students SET 
                last_attended_college   = :last_attended_college,
                high_school             = :high_school,
                elementary_school       = :elementary_school,
                parent_address          = :parent_address,
                parent_contact_number   = :parent_contact_number,
                parent_name             = :parent_name,
                confirmed               = :confirmed,
                baptized                = :baptized,
                religion                = :religion,
                facebook_account        = :facebook_account,
                contact_number          = :contact_number,
                provincial_address      = :provincial_address,
                home_address            = :home_address,
                status                  = :status,
                gender                  = :gender,
                nationality             = :nationality,
                place_of_birth          = :place_of_birth,
                date_of_birth           = :date_of_birth,
                surname                 = :surname,
                middle_name             = :middle_name,
                first_name              = :first_name
                WHERE students_id       = :students_id";
    
          $update_students = $con->prepare($update_students_sql);
          $update_students->execute([
                ':last_attended_college'    => $last_attended_college, 
                ':high_school '             => $high_school ,
                ':elementary_school'        => $elementary_school,
                ':parent_address  '         => $parent_address,
                ':parent_contact_number '   => $parent_contact_number,
                ':parent_name'              => $parent_name,
                ':confirmed'                => $confirmed,
                ':baptized'                 => $baptized,
                ':facebook_account'         => $facebook_account,
                ':contact_number '          => $contact_number,
                ':provincial_address'       => $provincial_address,
                ':home_address'             => $home_address,
                ':status'                   => $status,
                ':gender'                   => $gender,
                ':nationality '             => $nationality, 
                ':place_of_birth'           => $place_of_birth,
                ':date_of_birth'            => $date_of_birth,
                ':surname'                  => $surname,
                ':middle_name'              => $middle_name,
                ':students_id'              => $students_id 
          ]);
        
      // echo "Data Updated";

    
            $alert_msg .= ' 
              <div class="new-alert new-alert-success alert-dismissible">
                  <i class="icon fa fa-success"></i>
                  Data Updated.
              </div>     
            ';

          }
    
?>