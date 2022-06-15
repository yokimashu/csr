<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("PHPJasperXML.inc.php");
include_once ('setting.php');
include('reportConnection.php');


$subject_code = $_GET['id'];

$PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->debugsql=true;
// $PHPJasperXML->arrayParameter=array("employeeNo"=>'12345678');
      
$xml = $PHPJasperXML->load_xml_file("tor.jrxml");
    
// $PHPJasperXML->xml_dismantle($xml);
$PHPJasperXML->sql ="SELECT CONCAT(last_name,', ',first_name,' ',LEFT(middle_name, 1),'.') AS name,
s.`place_of_birth`,
s.`high_school`,
s.`last_attended_college`,
s.`elementary_school`,
s.`high_school`,
ti.`units`,	
ti.`descriptive_title`,
ti.`subject_code`,
te.year as yyear,
DATE_FORMAT(date_of_birth,'%M %d, %Y') AS birthday, 
CONCAT(ad.`street`,', ',ad.`city`) AS address,
ag.`parent_name`,
i.`finals`,
ti.`semester`,
ti.`year`
 FROM tbl_students s 
 INNER JOIN 
 tbl_enrollment_item ti ON s.`students_id` = ti.`students_id` 
 INNER JOIN tbl_student_address ad ON s.`students_id` = ad.`student_id`
 INNER JOIN tbl_student_guardian ag ON s.`students_id` = ag.`student_id`
  INNER JOIN tbl_grades i ON s.`students_id` = i.`students_id`
  INNER JOIN tbl_enrollment te ON s.`students_id` = te.`students_id`
  WHERE s.students_id = ".$subject_code." GROUP BY ti.`subject_code`
";
// $PHPJasperXML->sql = "CALL spPrintDtr('12345678','2019-10-01','2019-10-31')";
$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

echo $subject_code;
?>
