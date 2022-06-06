<?php 
include('../config/db_config.php');




if (isset($_POST['customSub'])) {
$message  = '';
$tableSubject = $_POST['tableSub'];
$customSub = $_POST['customSub'];
$cusDays = '';
$cusStartTime = '';
$cusEndTime =   '';
$conflictSubject = '';
$checkSubjectQuery = "SELECT * FROM tbl_schedules WHERE 
subject_code = :ccode LIMIT 1
";

$getSubject = $con->prepare($checkSubjectQuery);
$getSubject->execute([':ccode'  =>  $customSub]);

while ($result = $getSubject->fetch(PDO::FETCH_ASSOC)) {
    $cusDays = $result['days'];
    $cusStartTime = $result['start_time'];
    $cusEndTime =   $result['end_time'];
}
$getConfictSched = "SELECT subject_code FROM tbl_schedules WHERE 
subject_code = :subject AND
days = :days AND
start_time = :starttime AND 
end_time =  :endtime
";

$exeConflictSched = $con->prepare($getConfictSched);
$exeConflictSched->execute([
':subject'  =>  $tableSubject,
':days' =>  $cusDays,
':starttime'    =>$cusStartTime,
':endtime'  =>  $cusEndTime
]);

if($exeConflictSched->rowCount() > 0)
{
while($confictResult = $exeConflictSched->fetch(PDO::FETCH_ASSOC)){
    $conflictSubject = $confictResult['subject_code'];

}
$message = $conflictSubject.' has schedule conflict with the subject you want to add';
}else {

    $message = 'subject is clear';   
}
echo json_encode($message);
}



?>