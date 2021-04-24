<?php 

include('../billing/config/db_config4.php');

	if (isset($_POST['tuition'])) {
		  $objid = $_POST['objid'];
		 $course=$_POST['course'];
       	 $year  = $_POST['year'];
       
       	  $semester  = $_POST['semester'];
         $id2 = $_POST['students_id'];
         $tuition = $_POST['tuition'];
         $misc = $_POST['misc'];
         $other = $_POST['other'];
         $comp = $_POST['comp'];
         $speech = $_POST['speech'];
         $nstp = $_POST['nstp'];
         $other2 = $_POST['other2'];

         $total = ($tuition + $misc + $other + $comp + $speech + $nstp + $other);

$sql= "INSERT INTO assessment(objid,stud_id, tuition, misc, others, comp, speech, nstp, others2, total, course, year, semester) VALUES ('$objid','$id2','$tuition','$misc','$other','$comp','$speech','$nstp','$other2','$total','$course','$year','$semester') ";


$res  = mysqli_query($conn,$sql);

if ($res == TRUE) {
	
	echo "Successfully Saved";
}else{
	echo "Failed to Save";
}


}




 ?>