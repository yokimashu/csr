<?php 
include('../config/db_config.php');
if(isset($_POST['id'])) {
$transId = $_POST['id'];
$accept_enrolle = $con->prepare("UPDATE tbl_enrollment 
SET status = 'ACTIVE' WHERE objid = :id");
$accept_enrolle->execute([':id' =>$transId]);

}
?>