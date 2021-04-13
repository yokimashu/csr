<?php
  include('../config/db_config.php');
  date_default_timezone_set('Asia/Manila');

  $alert_msg = '';     

  //if button insert clicked

  if (isset($_POST['students_id'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $students_id = $_POST['students_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = date('Y-m-d', strtotime($_POST['date_of_birth']));
    $place_of_birth = $_POST['place_of_birth'];
    $nationality = $_POST['nationality'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $street = $_POST['street'];
    $subd = $_POST['subd'];
    $brgy = $_POST['brgy'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $region = $_POST['region'];
    $zip_code = $_POST['zip_code'];
    $contact_number   = $_POST['contact_number'];
    $facebook_account = $_POST['facebook_account'];
    $religion   = $_POST['religion'];
    $baptized  = $_POST['baptized'];
    $confirmed = $_POST['confirmed'];
    $parent_name = $_POST['parent_name'];
    $parent_contact_number = $_POST['parent_contact_number'];
    $parent_address = $_POST['parent_address'];
    $elementary_school = $_POST['elementary_school'];
    $high_school = $_POST['high_school'];
    $last_attended_college = $_POST['last_attended_college'];
  
      //insert user to database
      $register_user_sql      = "INSERT INTO tbl_students SET 
        students_id           = :students_id,
        first_name            = :first_name,
        middle_name           = :middle_name,
        last_name             = :last_name,
        date_of_birth         = :date_of_birth,
        place_of_birth        = :place_of_birth,
        nationality           = :nationality,
        gender                = :gender,
        status                = :status,
        home_address          = :home_address,
        provincial_address    = :provincial_address,
        contact_number        = :contact_number,
        facebook_account      = :facebook_account,
        religion              = :religion,
        baptized              = :baptized,
        confirmed             = :confirmed,
        parent_name           = :parent_name,
        parent_contact_number = :parent:contact_number,
        parent_address        = :parent_address,
        elementary_school     = :elementary_school,
        high_school           = :high_school,
        last_attended_college = :last_attended_college";

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':students_id'           => $students_id,
        ':first_name'            => $first_name,
        ':middle_name'           => $middle_name,
        ':last_name'             => $last_name,
        ':date_of_birth'         => $date_of_birth,
        ':place_of_birth'        => $place_of_birth,
        ':nationality'           => $nationality,
        ':gender'                => $gender,
        ':status'                => $status,
        ':home_address'          => $home_address,
        ':provincial_address'    => $provincial_address,
        ':contact_number'        => $contact_number,
        ':facebook_account'      => $facebook_account,
        ':religion'              => $religion,
        ':baptized'              => $baptized,
        ':confirmed'             => $confirmed,
        ':parent_name'           => $parent_name,
        ':parent_contact_number' => $parent_contact_number,
        ':parent_address'        => $parent_address,
        ':elementary_school'     => $elementary_school,
        ':high_school'           => $high_school,
        ':last_attended_college' => $last_attended_college

      ]);

        $query_address = "INSERT INTO tbl_student_address SET
        student_id = :students_id,
        students_id

        ";
        
   

        ':students_id'     => $students_id,
        ':street'            => $steet,
        ':vil_subd'           => $subd,
        ':barangay'           => $brgy,
        ':city'               => $city,
        ':province'          => $province,
        ':region'            => $region,
        ':zip_code'             => $zip_code
        ";

    }

  

 

 
?>