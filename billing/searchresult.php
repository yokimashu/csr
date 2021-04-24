<?php 


include('../billing/config/db_config4.php');

if (isset($_POST['students_id'])) {

	$students_id = $_POST['students_id'];
	



$sql = "SELECT tbl_students.students_id,tbl_students.first_name,tbl_students.middle_name,tbl_students.last_name,tbl_enrollment.students_id,tbl_enrollment.course_code,tbl_enrollment.year_level,tbl_enrollment.semester,tbl_enrollment.status FROM tbl_students INNER JOIN tbl_enrollment ON tbl_students.students_id = tbl_enrollment.students_id WHERE students_id = '$students_id'  ";


 					$res  = mysqli_query($conn,$sql);
 					 $data = array();
              $row= mysqli_fetch_array($res);

                  $data['students_id'] = $row['students_id'];
                    $data['first_name'] = $row['first_name'];
                    $data['middle_name'] = $row['middle_name'];
                    $data['last_name'] = $row['last_name'];
                    $data['course_code'] = $row['course_code'];
                    $data['year_level'] = $row['year_level'];
                    $data['semester'] = $row['semester'];
                    $data['status'] = $row['status'];
                   
                 

               


                   


 
}








 ?>



















