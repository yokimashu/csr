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
$PHPJasperXML->sql ="SELECT * from tbl_students s inner join tbl_enrollment_item i on s.students_id = i.students_id WHERE subject_code = '".$subject_code."'";
// $PHPJasperXML->sql = "CALL spPrintDtr('12345678','2019-10-01','2019-10-31')";
$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
