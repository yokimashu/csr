<?php
  include('../config/db_config.php');
  
  //if button insert clicked

  if (isset($_POST['objid'])) {

    
    //     echo "<pre>";
    //     print_r($_POST);
    // echo "</pre>";

    $objid = $_POST['objid'];
    $subjects_id = $_POST['subject'];
    $prelim = $_POST['prelim'];
    $midterm = $_POST['midterm'];
    $finals = $_POST['final'];
    $remarks = $_POST['rmrks'];
    
  
      //insert user to database
      $register_user_sql = "UPDATE tbl_grades SET
        prelim               = :prelim,
        midterm              = :midterm,
        finals               = :finals,
        remarks              = :remarks WHERE objid = :objid and descriptive_title  = :title";
  

      $register_data = $con->prepare($register_user_sql);
      $register_data->execute([
        ':objid'            => $objid,
        ':title'            => $subjects_id,
        ':prelim'           => $prelim,
        ':midterm'          => $midterm,
        ':finals'           => $finals,
        ':remarks'          => $remarks
      ]);

      $check_remarks = "CALL spUpdateRemarks(:subid,:obj,:prelim,:midterm,:final)";
      $remarks = $con->prepare($check_remarks);
      $remarks->execute([
        ':subid' => $subjects_id,
        ':obj' => $objid,
        ':prelim' => $objid,
        ':midterm' => $objid,
        ':final' => $objid
  
      ]);

    }
  


 
?>