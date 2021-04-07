<?php

include('../config/db_config.php');
 $course = $_POST['course'];
 $level = $_POST['level'];
 

 if(isset($_POST['semester'])){
    $sql = "SELECT  FROM tbl_enrollment_item e 
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
        $descriptive_title = $result['descriptive_title'];
        $prelim = $result['prelim'];
        $midterm = $result['midterm'];
        $finals = $result['finals'];
        $remarks = $result['remarks'];

        echo "<tr>";
        echo "<td>";
        echo $subject_course;
        echo "</td>";
        echo "<td>";
        echo $descriptive_title;
        echo "</td>";
        echo "<td>";
        echo $prelim;
        echo "</td>";
        echo "<td>";
        echo $midterm;
        echo "</td>";
        echo "<td>";
        echo $finals;
        echo "</td>";
        echo "<td>";
        echo $remarks;
        echo "</td>";
        echo "</td>";
        echo "<td>";
        echo '<button class="btn btn-outline-success btn-sm " id = "remove" data-placement="top" title="Remove Subject"  onclick = "deleteRow(this)"> <i class="fa icon-remove"></i></button>';
        echo "</td>";
        echo "</tr>";

        
    }

 }
?>