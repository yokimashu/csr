<?php 

include('../config/db_config.php');
if(isset($_POST['id'])){

$query = "SELECT * FROM tbl_subjects s INNER JOIN tbl_schedules t  ON s.subjects_id = t.subject_code 
INNER JOIN tbl_rooms r ON t.room_code = r.room_no
WHERE s.subjects_id = :subject ";
$execute = $con->prepare($query);
$execute->execute([':subject' => $_POST['id']]);
$subject_id  ='';
$title  ='';
$units  ='';
$days  ='';
$time_start  ='';
$time_end  ='';
$room  ='';

while($result = $execute->fetch(PDO::FETCH_ASSOC)){
    $subject_id  = $result['subjects_id'];
    $title  = $result['subjects_description'];
    $units  = $result['units'];
    $days  = $result['days'];
    $time_start  = $result['start_time'];
    $time_end  = $result['end_time'];
    $room  = $result['room_description'];
}
$data = array(
    'subjects_id' => $subject_id,
    'subjects_description' => $title,
    'units' => $units,
    'days' => $days,
    'time' => $time_start.'-'.$time_end,
    'room_description' => $room
);
echo json_encode($data);
}


?>