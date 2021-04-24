<?php 

include('../billing/config/db_config4.php');

	if (isset($_POST['orno'])) {

        $objid = $_POST['objid'];
        $students_id = $_POST['students_id'];
        $course_code = $_POST['course_code'];
        $year_level = $_POST['year_level'];
        $semester = $_POST['semester'];
        $orno = $_POST['orno'];
        $amount = $_POST['amount'];
        $det = $_POST['det'];
        $quarter = $_POST['quarter'];
		
		 

$sql= "INSERT INTO payments(objid,stud_id,course,year,orno,amount,det,semester,quarter) VALUES ('$objid','$students_id','$course_code','$year_level','$orno','$amount','$det','$semester','$quarter') ";

$sql2 = "UPDATE tbl_enrollment set STATUS ='ENROLLED' WHERE students_id  = '$students_id'";




$res  = mysqli_query($conn,$sql);

$res2  = mysqli_query($conn,$sql2);

if ($res == TRUE) {
	
	echo "Successfully Saved";
}else{
	echo "Failed to Save";
}


	}
 ?>