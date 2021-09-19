<?php


//select user
$get_user_sql = "SELECT * FROM tbl_users WHERE user_id = :id";
$user_data = $con->prepare($get_user_sql);
$user_data->execute([':id' => $user_id]);
while ($result = $user_data->fetch(PDO::FETCH_ASSOC)) {
  $db_first_name = $result['first_name'];
  $db_middle_name = $result['middle_name'];
  $db_last_name = $result['last_name'];
  $db_email_ad = $result['email'];
  $db_contact_number = $result['contact_no'];
  $db_user_name = $result['username'];
  $db_department = $result['department'];
}

//select all courses
$get_all_courses_sql = "SELECT * FROM tbl_courses ORDER BY courses_id Asc ";
$get_all_courses_data = $con->prepare($get_all_courses_sql);
$get_all_courses_data->execute();

$get_all_year_sql = "SELECT * FROM tbl_year ORDER BY code Asc ";
$get_all_year_data = $con->prepare($get_all_year_sql);
$get_all_year_data->execute();

$get_all_semester_sql = "SELECT * FROM tbl_semester ORDER BY code Asc ";
$get_all_semester_data = $con->prepare($get_all_semester_sql);
$get_all_semester_data->execute();

//select all subjects
$get_all_subjects_sql = "SELECT * FROM tbl_subjects ORDER BY subjects_id Asc ";
$get_all_subjects_data = $con->prepare($get_all_subjects_sql);
$get_all_subjects_data->execute();

//select all students
$get_all_students_sql = "SELECT * FROM tbl_students ORDER BY students_id ASC ";
$get_all_students_data = $con->prepare($get_all_students_sql);
$get_all_students_data->execute();

//select year level
$get_all_levels_sql = "SELECT * FROM tbl_year ORDER BY code ASC ";
$get_all_levels_data = $con->prepare($get_all_levels_sql);
$get_all_levels_data->execute();

//select year level
$get_all_semesters_sql = "SELECT * FROM tbl_semester ORDER BY code ASC ";
$get_all_semesters_data = $con->prepare($get_all_semesters_sql);
$get_all_semesters_data->execute();


//select all rooms
$get_all_rooms_sql = "SELECT * FROM tbl_rooms ORDER BY room_no ASC ";
$get_all_rooms_data = $con->prepare($get_all_rooms_sql);
$get_all_rooms_data->execute();

//select all instructors
$get_all_teachers_sql = "SELECT * FROM tbl_faculty ORDER BY teachers_id ASC ";
$get_all_teachers_data = $con->prepare($get_all_teachers_sql);
$get_all_teachers_data->execute();





?>
