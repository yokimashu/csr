<?php

include('../config/db_config.php');
 $course = $_POST['course'];
 $level = $_POST['level'];
 $semester = $_POST['semester'];

 if(isset($_POST['semester'])){
    $sql = "SELECT * FROM tbl_subjects where course_code = :code AND
    year_level= :year_level AND semester = :semester";

    $prep_sql = $con->prepare($sql);
    $prep_sql->execute([':code'=> $course,
    ':year_level' => $level,
    ':semester' => $semester
    ]);
    while($result = $prep_sql->fetch(PDO::FETCH_ASSOC)){
        $subject_course = $result['subjects_id'];
        $description = $result['subjects_description'];
        $units = $result['units'];

        echo "<tr>";
        echo "<td>";
        echo $description;
        echo "</td>";
        echo "<td>";
        echo $description;
        echo "</td>";
        echo "<td>";
        echo $units;
        echo "</td>";
        echo "</tr";

        
    }

 }
?>