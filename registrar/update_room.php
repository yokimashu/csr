<?php
    include('../config/db_config.php');


  $alert_msg = '';
    if (isset($_POST['update'])){

  //     echo "<pre>";
  //     print_r($_POST);
  // echo "</pre>";

         //to check if data are passed
       
    $room_no = $_POST['room_no'];
    $description = $_POST['room_description'];
  

            $update_room_sql = "UPDATE tbl_rooms SET 
                room_description    = :desc
                WHERE room_no       = :room_no";
    
          $update_room = $con->prepare($update_room_sql);
          $update_room->execute([
                ':desc'           => $description, 
                ':room_no'        => $room_no
          ]);
        
      // echo "Data Inserted";

    
            $alert_msg .= ' 
              <div class="new-alert new-alert-success alert-dismissible">
                  <i class="icon fa fa-success"></i>
                  Data Updated.
              </div>     
            ';

          }
    
?>