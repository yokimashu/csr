<?php
include('../config/db_config.php');
date_default_timezone_set('Asia/Manila');
 
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
    $contact_number   = $_POST['contact_number'];
    $facebook_account = $_POST['facebook_account'];
    $religion   = $_POST['religion'];
    $baptized  = $_POST['baptized'];
    $confirmed = $_POST['confirmed'];
    $elementary_school = $_POST['elementary_school'];
    $high_school = $_POST['high_school'];
    $last_attended_college = $_POST['last_attended_college'];
    $street = $_POST['street'];
    $subd = $_POST['subd'];
    $brgy = $_POST['brgy'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $region = $_POST['region'];
    $zip_code = $_POST['zip_code'];
    $parent_name  =  $_POST['parent_name'];
    $parent_contact_number   = $_POST['parent_contact_number'];
    $parent_address  =  $_POST['parent_address'];
    $parent_occupation  =  $_POST['parent_occupation'];
    $fileName = 'default.jpg';
    $img = $_POST['studentimage'];
    $oldphoto = $_POST['oldphoto'];
    //insert user to database
    $register_user_sql = "CALL spUpdateStudent(
    :students_id,
    :first_name,
    :middle_name,
    :last_name,
    :date_of_birth,
    :place_of_birth,
    :nationality,
    :gender,
    :status,
    :contact_number,
    :facebook_account,
    :religion,
    :baptized,
    :confirmed,
    :elementary_school,
    :high_school,
    :last_attended_college,
    :street,
    :vil_subd,
    :barangay,
    :city,
    :province,
    :region,
    :zip_code,
    :parent,
    :address,
    :contact,
    :occupation,
    :photo)";

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
      ':last_attended_college' => $last_attended_college,
      ':street'                => $street,
      ':vil_subd'              => $subd,
      ':barangay'              => $brgy,
      ':city'                  => $city,
      ':province'              => $province,
      ':region'                => $region,
      ':zip_code'              => $zip_code,
      ':parent'                => $parent_name,
      ':address'               => $parent_address,
      ':contact'               => $parent_contact_number,
      ':occupation'            => $parent_occupation,
      ':photo'                 => $img
    ]);
 

    if ($oldphoto !=  $img) {
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
}
  




echo $img;



?>