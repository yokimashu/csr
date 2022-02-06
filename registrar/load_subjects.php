<?php

include('../config/db_config.php');
 $course = $_POST['course'];
 $level = $_POST['level'];
 $semester = $_POST['semester'];
 $idno = $_POST['idno'];

 if(isset($_POST['semester'])){
    // $sql = "SELECT s.`subjects_id`, s.`subjects_description`, s.`units`, c.`days`, 
    // CONCAT(c.`start_time`,'-', c.`end_time`) AS time, r.`room_description` FROM tbl_subjects s 
    // INNER JOIN tbl_schedules c ON c.`subject_code` =s.`subjects_id` 
    // INNER JOIN tbl_rooms r ON r.`room_no` = c.`room_code`
    // INNER JOIN tbl_faculty f ON f.`teachers_id` = c.`teacher_code`
    // WHERE s.course_id = :code AND s.year_level= :year_level AND s.semester = :semester"; 

        $sql = "SELECT s.`subjects_id`, s.`subjects_description`, s.`units`, c.`days`, 
        CONCAT(c.`start_time`,'-', c.`end_time`) AS time, r.`room_description`
        FROM tbl_subjects s 
        INNER JOIN tbl_schedules c ON c.`subject_code` =s.`subjects_id` 
        INNER JOIN tbl_rooms r ON r.`room_no` = c.`room_code`
        INNER JOIN tbl_faculty f ON f.`teachers_id` = c.`teacher_code`
        -- INNER JOIN tbl_grades g ON g.subjects_id = s.`subjects_id`
        WHERE s.courses_id = :code AND s.year_level= :year_level AND s.semester = :semester 
        AND s.pre_requisites NOT IN 
        (SELECT s.subjects_id FROM tbl_subjects s 
        INNER JOIN tbl_grades g ON s.subjects_id = g.subjects_id WHERE remarks 
        IN ('ACTIVE','FAILED')AND g.`students_id` = :idno);
        -- AND (g.remarks IN ('FAILED', 'ACTIVE') AND g.students_id = :idno";

    $prep_sql = $con->prepare(  $sql);
    $prep_sql->execute([':code'=> $course,
    ':year_level'   => $level,
    ':semester'     => $semester,
    ':idno'         => $idno
    ]);

    

    while($result = $prep_sql->fetch(PDO::FETCH_ASSOC)){
        $subject_course = $result['subjects_id'];
        $description = $result['subjects_description'];
        $units = $result['units'];
        $days = $result['days'];
        $time = $result['time'];
        $room = $result['room_description'];

        echo "<tr>";
        echo "<td>";
        echo $subject_course;
        echo "</td>";
        echo "<td>";
        echo $description;
        echo "</td>";
        echo "<td>";
        echo $units;
        echo "</td>";
        echo "<td>";
        echo $days;
        echo "</td>";
        echo "<td>";
        echo $time;
        echo "</td>";
        echo "<td>";
        echo $room;
        echo "</td>";
        echo "<td>";
        echo '<button class="btn btn-outline-success btn-sm " id = "remove" data-placement="top" title="Remove Subject"  onclick = "deleteRow(this)"> <i class="fa icon-remove"></i></button>';
        echo "</td>";
        echo "</tr>";

        
    }

 }
?>