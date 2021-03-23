<?php

include('../config/db_config.php');
 $course = $_POST['course'];
 $level = $_POST['level'];
 $semester = $_POST['semester'];

 if(isset($_POST['semester'])){
    $sql = "SELECT s.`subjects_id`, s.`subjects_description`, s.`units`, c.`days`, 
    CONCAT(c.`start_time`,'-', c.`end_time`) AS time, r.`room_description` FROM tbl_subjects s 
    INNER JOIN tbl_schedules c ON c.`subject_code` =s.`subjects_id` 
    INNER JOIN tbl_rooms r ON r.`room_no` = c.`room_code`
    INNER JOIN tbl_faculty f ON f.`teachers_id` = c.`teacher_code`
    WHERE s.course_code = :code AND s.year_level= :year_level AND s.semester = :semester"; 

    $prep_sql = $con->prepare($sql);
    $prep_sql->execute([':code'=> $course,
    ':year_level' => $level,
    ':semester' => $semester
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
        echo "</td>";
        echo "<td>";
        echo '<button class="btn btn-outline-success btn-sm " id = "remove" data-placement="top" title="Remove Subject"  onclick = "deleteRow(this)"> <i class="fa icon-remove"></i></button>';
        echo "</td>";
        echo "</tr>";

        
    }

 }
?>