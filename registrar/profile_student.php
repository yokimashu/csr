<?php


include('../config/db_config.php');

if (isset($_POST['idno'])) {


    $idno = $_POST['idno'];
    $fullname = '';
    $firstname = ' ';
    $middlename = ' ';
    $lastname = '';
    $street = '';
    $age = ' ';
    $birthdate = ' ';
    $email = ' ';
    $province = ' ';
    $gender = ' ';
    $city = ' ';
    $barangay = '';
    $mobile_no = '';
    $status = ' ';
    $photo = '';


    // $user_id = $_SESSION['id  //select all data type

    $check_student_sql = "SELECT * FROM tbl_enrollment where students_id = :idno";
    $check_student_data = $con->prepare($check_student_sql);
    $check_student_data->execute([':idno' => $idno]);

    $student_count = $check_student_data->rowCount();

    if ($student_count == 0) {
        $get_all_students_sql = "SELECT s.`students_id`, s.student_status, s.`first_name`, s.`middle_name`, s.`last_name`, s.`status`
        FROM tbl_students s WHERE s.`students_id` = :idno ORDER BY s.students_id ASC ";

        $get_all_students_data = $con->prepare($get_all_students_sql);
        $get_all_students_data->execute([':idno' => $idno]);

        while ($result = $get_all_students_data->fetch(PDO::FETCH_ASSOC)) {

            $studentid          =  $result['students_id'];
            $student_status     =  $result['student_status'];
            $firstname          =  $result['first_name'];
            $middlename         =  $result['middle_name'];
            $lastname           =  $result['last_name'];
            $course             =  '';
            $status             =  $result['status'];
            $year               =  '';
            $semester           =  '';
        }
    } else {

        $get_all_students_sql = "SELECT s.`students_id`,  s.student_status, s.`first_name`, s.`middle_name`, s.`last_name`, e.`course_code`, s.`status`, e.`year_level`, e.`semester` 
    FROM tbl_students s INNER JOIN tbl_enrollment e ON e.`students_id` = s.`students_id` WHERE s.`students_id` = :idno ORDER BY s.students_id ASC ";

        $get_all_students_data = $con->prepare($get_all_students_sql);
        $get_all_students_data->execute([':idno' => $idno]);

        while ($result = $get_all_students_data->fetch(PDO::FETCH_ASSOC)) {

            $studentid          =  $result['students_id'];
            $student_status     =  $result['student_status'];
            $firstname          =  $result['first_name'];
            $middlename         =  $result['middle_name'];
            $lastname           =  $result['last_name'];
            $course             =  $result['course_code'];
            $status             =  $result['status'];
            $year               =  $result['year_level'];
            $semester           =  $result['semester'];
        }
    }

    $data = array(
        'statuscode' => 200,
        'data' => $idno,
        'data1' => $firstname,
        'data2' => $student_status,
        'data3' => $middlename,
        'data4' => $lastname,
        'data5' => $course,
        'data6' => $status,
        'data7' => $year,
        'data8' => $semester,
        'message' => 'success'
    );
    echo json_encode($data);
}
