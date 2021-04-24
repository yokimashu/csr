<?php 

include('../billing/config/db_config4.php');

if (isset($_POST['tuition'])) {

        $id = $_POST['id'];
        $tuition = $_POST['tuition'];
         $misc = $_POST['misc'];
         $other = $_POST['other'];
         $comp = $_POST['comp'];
         $speech = $_POST['speech'];
         $nstp = $_POST['nstp'];
         $other2 = $_POST['other2'];

         $total = ($tuition + $misc + $other + $comp + $speech + $nstp + $other);

        $sql = "UPDATE assessment SET tuition = '$tuition', misc = '$misc' , others = '$other' , comp = '$comp' , speech = '$speech' , nstp = '$nstp' , others2 = '$other2' WHERE id = '$id'   ";

        $res = mysqli_query($conn,$sql);


        if ($res == TRUE) {
    
    echo "Successfully Updated";
}else{
    echo "Failed to Update";
}


}




 ?>