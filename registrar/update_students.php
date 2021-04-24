<?php
include('../config/db_config.php');
date_default_timezone_set('Asia/Manila');

$alert_msg = '';     

//if button insert clicked

if (isset($_POST['students_id'])) {

  
  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

  $students_id = $_POST['idNumber'];
  $first_name = $_POST['fName'];
  $middle_name = $_POST['mName'];
  $last_name = $_POST['lName'];
  $date_of_birth = date('Y-m-d', strtotime($_POST['dateOfBirth']));
  $place_of_birth = $_POST['placeOfBirth'];
  $nationality = $_POST['nationality'];
  $gender = $_POST['gender'];
  $status = $_POST['status'];
  $contact_number   = $_POST['contactNumber'];
  $facebook_account = $_POST['fbAcc'];
  $religion   = $_POST['religion'];
  $baptized  = $_POST['baptized'];
  $confirmed = $_POST['confirmed'];
  $elementary_school = $_POST['elemSchool'];
  $high_school = $_POST['highSchool'];
  $last_attended_college = $_POST['college'];

    //insert user to database
    $register_user_sql      = "UPDATE tbl_students SET 
      first_name            = :first_name,
      middle_name           = :middle_name,
      last_name             = :last_name,
      date_of_birth         = :date_of_birth,
      place_of_birth        = :place_of_birth,
      nationality           = :nationality,
      gender                = :gender,
      status                = :status,
      contact_number        = :contact_number,
      facebook_account      = :facebook_account,
      religion              = :religion,
      baptized              = :baptized,
      confirmed             = :confirmed,
      elementary_school     = :elementary_school,
      high_school           = :high_school,
      last_attended_college = :last_attended_college
      WHERE students_id     = :students_id ";

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
      ':contact_number'        => $contact_number,
      ':facebook_account'      => $facebook_account,
      ':religion'              => $religion,
      ':baptized'              => $baptized,
      ':confirmed'             => $confirmed,
      ':elementary_school'     => $elementary_school,
      ':high_school'           => $high_school,
      ':last_attended_college' => $last_attended_college

    ]);
    $con =null;
   //INSERT THE ADDRESS OF THE STUDENT   
    $street = $_POST['street'];
    $subd = $_POST['subd'];
    $brgy = $_POST['brgy'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $region = $_POST['region'];
    $zip_code = $_POST['zip_code'];


      $query_address = "UPDATE tbl_student_address SET 
                street           =   :street,
                vil_subd         =   :vil_sub,
                barangay         =   :barangay,
                city             =   :city,
                province         =   :province,
                region           =   :region,
                zipcode          =   :zip_code
                WHERE student_id =   :student_id";
     
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
        $con = null;

      //INSERT THE INFORMATION OF THE STUDENT
      $parent_name                 =                $_POST['parentName'];
      $parent_contact_number       =                $_POST['parentContactNumber'];
      $parent_address              =                $_POST['parentAddress'];
      $parent_occupation           =                $_POST['parentOccupation'];

      $query_parent_info =            "UPDATE tbl_student_guardian SET 
                                        parent_name = :parent,
                                        address = :address,
                                        contact = :contact,
                                        occupation = :occupation,
                                        WHERE student_id = :student_id";

      $execute_parent = $con->prepare($query_parent_info);
      $execute_parent->execute([
          ':student_id'         =>      $students_id,
          ':parent'             =>      $parent_name,
          ':address'            =>      $parent_address,
          ':contact'            =>      $parent_contact_number,
          ':occupation'         =>      $parent_occupation
                               ]);
  $fileName = 'default.jpg';
  $img = $_POST['image-tag'];
  if($img !=  '')
  {
    unlink('../studentimage/' . $img);
  $folderPath = "../studentimage/";
  $image_parts = explode(";base64,", $img);
  $image_type_aux = explode("image/", $image_parts[0]);
  $image_type = $image_type_aux[1];
  $image_base64 = base64_decode($image_parts[1]);
  $fileName = uniqid() . '.jpg';
  $file = $folderPath . $fileName;
  file_put_contents($file, $image_base64);

  }
  $add_photo = "UPDATE student_image SET 
  photo = :photo 
  WHERE student_id = :student_id";

  $execute_photo = $con->prepare($add_photo);
  $execute_photo->execute([
    ':student_id'   =>  $students_id,
    ':photo'        =>  $fileName
  ]);

  }
  








?>