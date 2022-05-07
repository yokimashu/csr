<?php
include('excel/SimpleXLSXGen.php');

if(isset($_POST['export_grades'])){
    $date = date('m/d/Y', time());
$id = $_POST['id_no'];
$name = $_POST['last_name'].', '.$_POST['first_name'];
$sql = "SELECT * FROM tbl_grades WHERE students_id = :student ";
$export_grade = $con->prepare($sql);
$export_grade->execute([':student'  =>  $id]);
while ($row = $export_grade->fetch(PDO::FETCH_ASSOC)){ 
    $nestedData=array(); 
  
    $nestedData[] = $row["students_id"];
    $nestedData[] = $name;
    $nestedData[] = $_POST['year_level'];
    $nestedData[] = $_POST['course'];
    $nestedData[] = $_POST['semester'];
    $nestedData[] = $row["descriptive_title"];
    $nestedData[] = $row["prelim"];
    $nestedData[] = $row["midterm"];
    $nestedData[] = $row["finals"];
    $nestedData[] = $row["remarks"];

    $data[] = $nestedData;
}   

$hd1 = [['Student Id','Name','Year Level','Course','Semester','Subject Title','Prelim','Midterm','Final','Remarks']];
$final = array_merge($hd1, $data);



SimpleXLSXGen::fromArray($final)->downloadAs($date.$name.'.xlsx');// or downloadAs('books.xlsx') or $xlsx_content = (string) $xlsx 
}

?>