<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$room_description = $room_no = '';

$room_id = $_SESSION['id'];

//querry to select current room's information
$get_room_sql = "SELECT * FROM tbl_rooms WHERE room_no = :id";
$get_room_data = $con->prepare($get_room_sql);
$get_room_data->execute([':id' => $room_id]);
while ($result = $get_room_data->fetch(PDO::FETCH_ASSOC)) {
  $room_no   = $result['room_no'];
  $room_description  = $result['room_description'];
}

$get_all_room_sql = "SELECT * FROM tbl_rooms ORDER BY room_no Asc ";
$get_all_room_data = $con->prepare($get_all_room_sql);
$get_all_room_data->execute();


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
            <div class="muted pull-left">LIST OF ROOM</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
                <div class="btn-group">
                  <a href="add_room.php"><button class="btn btn-success">Add Room <i class="icon-plus icon-white"></i></button></a>
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
                    <th> ROOM NO. </th>
                    <th> ROOM DESCRIPTION</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php while ($room_data = $get_all_room_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <tr style="font-size: 1rem">
                      <td><?php echo $room_data['room_no']; ?> </td>
                      <td><?php echo $room_data['room_description']; ?> </td>
                        <!-- <a class="btn btn-outline-success btn-xs" href="update_users.php?objid=<?php echo $room_data['room_no']; ?>&id=<?php echo $room_data['room_no']; ?>"> -->
                          <i class="fa fa-check"></i>
                        </a>
                        <!-- &nbsp; -->

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
    var room_id = ($(this).data('id'));
    $('#room_id').val(room_id);
    $('#deleteroom_Modal').modal('toggle');
  })
</script>
</body>

</html>