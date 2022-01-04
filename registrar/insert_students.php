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
    $student_status = $_POST['student_status'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = date('Y-m-d', strtotime($_POST['date_of_birth']));
    $place_of_birth = $_POST['place_of_birth'];
    $nationality = $_POST['nationality'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $contact_number   = $_POST['contact_number'];
    $facebook_account = $_POST['facebook_account'];
    $religion   = $_POST['religion'];
    $baptized  = $_POST['baptized'];
    $confirmed = $_POST['confirmed'];
    $elementary_school = $_POST['elementary_school'];
    $high_school = $_POST['high_school'];
    $last_attended_college = $_POST['last_attended_college'];
  
      //insert user to database
      $register_user_sql      = "INSERT INTO tbl_students SET 
        students_id           = :students_id,
        student_status       = :student_status,
        first_name            = :first_name,
        middle_name           = :middle_name,
        last_name             = :last_name,
        date_of_birth         = :date_of_birth,
        place_of_birth        = :place_of_birth,
        nationality           = :nationality,
        gender                = :gender,
        civil_status           = :status,
        contact_number        = :contact_number,
        facebook_account      = :facebook_account,
        religion              = :religion,
        baptized              = :baptized,
        confirmed             = :confirmed,
        elementary_school     = :elementary_school,
        high_school           = :high_school,
        last_attended_college = :last_attended_college";

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':students_id'           => $students_id,
        ':student_status'       => $student_status,
        ':first_name'            => $first_name,
        ':middle_name'           => $middle_name,
        ':last_name'             => $last_name,
        ':date_of_birth'         => $date_of_birth,
        ':place_of_birth'        => $place_of_birth,
        ':nationality'           => $nationality,
        ':gender'                => $gender,
        ':status'                => $status,
        ':contact_number'        => $contact_number,
        ':facebook_account'      => $facebook_account,
        ':religion'              => $religion,
        ':baptized'              => $baptized,
        ':confirmed'             => $confirmed,
        ':elementary_school'     => $elementary_school,
        ':high_school'           => $high_school,
        ':last_attended_college' => $last_attended_college

      ]);

     //INSERT THE ADDRESS OF THE STUDENT   
      $street = $_POST['street'];
      $subd = $_POST['subd'];
      $brgy = $_POST['brgy'];
      $city = $_POST['city'];
      $province = $_POST['province'];
      $region = $_POST['region'];
      $zip_code = $_POST['zip_code'];


        $query_address = "INSERT INTO tbl_student_address
        (student_id,street,vil_subd,barangay,city,province,region,zipcode)
        VALUES(:student_id,:street,:vil_subd,:barangay,:city,:province,:region,:zip_code)";
       
        $set_query = $con->prepare($query_address);
        $set_query->execute([
        ':student_id'    =>      $students_id,
        ':street'        =>      $street,
        ':vil_subd'      =>      $subd,
        ':barangay'      =>      $brgy,
        ':city'          =>      $city,
        ':province'      =>      $province,
        ':region'        =>      $region,
        ':zip_code'      =>      $zip_code
        ]);


        //INSERT THE INFORMATION OF THE STUDENT
        $parent_name                 =                $_POST['parent_name'];
        $parent_contact_number       =                $_POST['parent_contact_number'];
        $parent_address              =                $_POST['parent_address'];
        $parent_occupation           =                $_POST['parent_occupation'];

        $query_parent_info =            "INSERT INTO tbl_student_guardian 
                                        (student_id,parent_name,address,contact,occupation)
                                        VALUES(:student_id,:parent,:address,:contact,:occupation)";

        $execute_parent = $con->prepare($query_parent_info);
        $execute_parent->execute([
            ':student_id'         =>      $students_id,
            ':parent'             =>      $parent_name,
            ':address'            =>      $parent_address,
            ':contact'            =>      $parent_contact_number,
            ':occupation'         =>      $parent_occupation
                                 ]);
    $fileName = 'default.jpg';
    $img = $_POST['studentimage'];
    if($img !=  '')
    {
    $folderPath = "../studentimage/";
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.jpg';
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);

    }
    $add_photo = "INSERT INTO student_image 
    (student_id,photo) VALUES (:student_id,:photo)";

    $execute_photo = $con->prepare($add_photo);
    $execute_photo->execute([
      ':student_id'   =>  $students_id,
      ':photo'        =>  $fileName
    ]);
  
    }
    

  

 

 
?>