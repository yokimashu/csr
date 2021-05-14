<?php 
include('../config/db_config.php');
if(isset($_POST['objid'])){

$sql = "CALL spGetGrades(:objid)";
$execute = $con->prepare($sql);
$execute->execute([':objid' =>  $_POST['objid']]);
while($result = $execute->fetch(PDO::FETCH_ASSOC)){
    $subject = $result['descriptive_title'];
    $prelim = $result['prelim'];
    $midterm = $result['midterm'];
    $final = $result['finals'];
    $remarks = $result['remarks'];
    echo "<tr>";
    echo "<td>";
    echo $subject;
    echo "</td>";
    echo "<td contenteditable='true'>";
    echo $prelim;
    echo "</td>";
    echo "<td contenteditable='true'>";
    echo $midterm;
    echo "</td>";
    echo "<td contenteditable='true'>";
    echo $final;
    echo "</td>";
    echo "<td contenteditable='true'>";
    echo $remarks;
    echo "</td>";
    echo "</tr>" ;
}

}

?>