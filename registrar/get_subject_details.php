<?php

include('../config/db_config.php');
if (isset($_POST['id'])) {


    $id = $_POST['id'];
    $idno    = $_POST['idno'];


    // $sql = "SELECT s.`subjects_id`, s.`subjects_description`, s.`units`, c.`days`, 
    // CONCAT(c.`start_time`,'-', c.`end_time`) AS time, r.`room_description`
    // FROM tbl_subjects s 
    // INNER JOIN tbl_schedules c ON c.`subject_code` =s.`subjects_id` 
    // INNER JOIN tbl_rooms r ON r.`room_no` = c.`room_code`
    // INNER JOIN tbl_faculty f ON f.`teachers_id` = c.`teacher_code`
    // WHERE s.subjects_id = :subject AND s.pre_requisites NOT IN 
    // (SELECT s.subjects_id FROM tbl_subjects s 
    // INNER JOIN tbl_grades g ON s.subjects_id = g.subjects_id WHERE remarks 
    // IN ('ACTIVE','FAILED')AND g.`students_id` = :idno)";

    // $prep_sql = $con->prepare($sql);
    // $prep_sql->execute([':subject'=> $subject,
    // ':idno'         => $idno
    // ]);

    // $query = "SELECT * FROM tbl_subjects s INNER JOIN tbl_schedules t  ON s.subjects_id = t.subject_code 
    // INNER JOIN tbl_rooms r ON t.room_code = r.room_no
    // WHERE s.subjects_id = :subject ";
    // $execute = $con->prepare($query);
    // $execute->execute([':subject' => $_POST['id']]);

    $query = "SELECT * FROM tbl_subjects s INNER JOIN tbl_schedules c ON c.`subject_code` =s.`subjects_id` 
              INNER JOIN tbl_rooms r ON r.`room_no` = c.`room_code`
              INNER JOIN tbl_faculty f ON f.`teachers_id` = c.`teacher_code`
              WHERE s.subjects_id = :subject AND s.pre_requisites NOT IN 
              (SELECT s.subjects_id FROM tbl_subjects s 
              INNER JOIN tbl_grades g ON s.subjects_id = g.subjects_id WHERE remarks 
              IN ('ACTIVE','FAILED')AND g.`students_id` = :idno)";
    $execute = $con->prepare($query);
    $execute->execute([
        ':subject' => $id,
        ':idno'         => $idno
    ]);

    $subject_id  = '';
    $title  = '';
    $units  = '';
    $days  = '';
    $time_start  = '';
    $time_end  = '';
    $room  = '';


    $subject_count = $execute->rowCount();

    while ($result = $execute->fetch(PDO::FETCH_ASSOC)) {
        $subject_id  = $result['subjects_id'];
        $title  = $result['subjects_description'];
        $units  = $result['units'];
        $days  = $result['days'];
        $time_start  = $result['start_time'];
        $time_end  = $result['end_time'];
        $room  = $result['room_description'];
       
    }



    if ($subject_count == 0) {

    $query = "SELECT * FROM tbl_subjects where subjects_id = :subject";
    $execute = $con->prepare($query);
    $execute->execute([':subject' => $_POST['id']]);
    
    while ($result = $execute->fetch(PDO::FETCH_ASSOC)) {
        $prerequisite = $result['pre_requisites'];
    }

        $subject_id  = '';
        $title  = '';
        $units  = '';
        $days  = '';
        $time_start  = '';
        $time_end  = '';
        $room  = '';
       

        $data = array(
            'subjects_id' => $subject_id,
            'subjects_description' => $title,
            'units' => $units,
            'days' => $days,
            'time' => $time_start . '-' . $time_end,
            'room_description' => $room,
            'prerequisite' => $prerequisite,
            'message' => 'Prerequisite subject '. $prerequisite .' is either not yet COMPLETED or UNENROLLED!'


        );
        echo json_encode($data);
    } else {
        $data = array(
            'subjects_id' => $subject_id,
            'subjects_description' => $title,
            'units' => $units,
            'days' => $days,
            'time' => $time_start . '-' . $time_end,
            'room_description' => $room,
            'message' => 'success'

        );
        echo json_encode($data);
    }
}
