<?php 

include('../billing/config/db_config4.php');

	if (isset($_POST['unit'])) {
		
		$price = $_POST['unit'];


$sql= "UPDATE tbl_units SET price='$price' WHERE id ='1' ";


$res  = mysqli_query($conn,$sql);

if ($res == TRUE) {
	
	echo "Successfully Saved";
}else{
	echo "Failed to Save";
}


	}
 ?>