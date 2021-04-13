<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$objid =$subject_code =$schedule = $start_time = $end_time =$room_code =$teacher_code = '';

$objid = $_SESSION['id'];

// //querry to select current user's information
// $get_schedules_sql = "SELECT * FROM tbl_schedules WHERE days = :id";
// $get_schedules_data = $con->prepare($get_schedules_sql);
// $get_schedules_data->execute([':id' => $day]);
// while ($result = $get_schedules_data->fetch(PDO::FETCH_ASSOC)) {
//   $schedules_day   = $result['days'];
//   $schedules_start_time  = $result['start_time'];
//   $schedules_end_time = $result['end_time'];
 
// }

$get_all_schedules_sql = "SELECT * FROM tbl_schedules ORDER BY objid ASC ";
$get_all_schedules_data = $con->prepare($get_all_schedules_sql);
$get_all_schedules_data->execute();


?>

<!DOCTYPE html>
<html>


<!-- Left side column. contains the logo and sidebar -->

<?php
include('../includes/header.php');
include('../includes/sidebar.php');
?>


<div class="content-wrapper">
  <div class="content-header"></div>



  <section class="content">

   
    <div class="span9" id="content">
      <div class="row-fluid">
        <!-- block -->
        <div class="block">
          <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">List of Schedules</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
                <div class="btn-group">
                  <a href="add_schedules.php"><button class="btn btn-success">Add New Schedule<i class="icon-plus icon-white"></i></button></a>
                </div>
                <div class="btn-group pull-right">
                  <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Print</a></li>
                    <li><a href="#">Save as PDF</a></li>
                    <li><a href="#">Export to Excel</a></li>
                  </ul>
                </div>
              </div>

              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                <thead>
                  <tr>
                     <th> OBJID</th>
                    <th> SUBJECT CODE</th>
                    <th> DAYS </th>
                    <th> START TIME </th>
                    <th> END TIME </th>
                    <th> ROOM CODE</th>
                    <th> TEACHER CODE</th>
                    <th> OPTIONS</th>
                    
                    
                    
                  </tr>
                </thead>
                <tbody>
                  <?php while ($schedules_data = $get_all_schedules_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <tr style="font-size: 1rem">
                      <td><?php echo $schedules_data['objid']; ?> </td>
                      <td><?php echo $schedules_data['subject_code']; ?> </td>
                      <td><?php echo $schedules_data['days']; ?> </td>
                      <td><?php echo $schedules_data['start_time']; ?> </td>
                      <td><?php echo $schedules_data['end_time']; ?> </td>
                      <td><?php echo $schedules_data['room_code']; ?> </td>
                      <td><?php echo $schedules_data['teacher_code']; ?> </td>
                      
                      <td>
                      <a class="btn btn-primary" href="edit_schedules.php?day=<?php echo
    $schedules_data['objid']; ?>"><i class="icon-edit"></i>
                          </a>
                        &nbsp;

                      </td>


                    </tr>
                  <?php   } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /block -->
  </section>







</div>
</div>
                </div>
            </div>
            <hr>

<!-- footer here -->
<?php include('../includes/footer.php'); ?>
</div>
<script src="vendors/jquery-1.9.1.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
<script>
  $('#pr').DataTable({
    'paging': true,
    'lengthChange': true,
    'searching': true,
    'ordering': true,
    'info': true,
    'autoWidth': true
  })
  $(document).on('click', 'button[data-role=confirm_delete]', function(event) {
    event.preventDefault();
    var user_id = ($(this).data('id'));
    $('#user_id').val(user_id);
    $('#deleteuser_Modal').modal('toggle');
  })
</script>
</body>

</html>