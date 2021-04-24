<?php 

include('../billing/config/db_config4.php');

if (isset($_POST['orno'])) {

        $id = $_POST['id'];
         $orno = $_POST['orno'];
         $amount = $_POST['amount'];
         $det = $_POST['det'];
         $quarter = $_POST['quarter'];

         

        $sql = "UPDATE payments SET orno = '$orno', amount = '$amount' , det = '$det' , quarter = '$quarter' WHERE id = '$id'   ";

        $res = mysqli_query($conn,$sql);


        if ($res == TRUE) {
    
    echo "Successfully Updated";
}else{
    echo "Failed to Update";
}


}




 ?>