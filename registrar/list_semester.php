<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$semester_id = $number_of_students = '';

$semester_id = $_SESSION['id'];

//querry to select current user's information
$get_semester_sql = "SELECT * FROM tbl_semester WHERE semester_id = :id";
$get_semester_data = $con->prepare($get_semester_sql);
$get_semester_data->execute([':id' => $semester_id]);
while ($result = $get_semester_data->fetch(PDO::FETCH_ASSOC)) {
  $semester_id   = $result['semester_id'];
  $number_of_students  = $result['number_of_students'];
}

$get_all_semester_sql = "SELECT * FROM tbl_semester ORDER BY semester_id Asc ";
$get_all_semester_data = $con->prepare($get_all_semester_sql);
$get_all_semester_data->execute();


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
            <div class="muted pull-left">List of Semester</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
                <div class="btn-group">
                  <a href="add_semester.php"><button class="btn btn-success">Add Semester <i class="icon-plus icon-white"></i></button></a>
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
                    <th> SEMESTER </th>
                    <th> TOTAL NUMBER OF STUDENTS</th>
                    <th> OPTIONS</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php while ($semester_data = $get_all_semester_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <tr style="font-size: 1rem">
                      <td><?php echo $semester_data['semester_id']; ?> </td>
                      <td><?php echo $semester_data['number_of_students']; ?> </td>
                     <td>
                      <a class="btn btn-primary" href="edit_semester.php?semester_id=<?php echo
    $semester_data['semester_id']; ?>"><i class="icon-edit"></i>
                          </a>
                        <!-- &nbsp; -->
</td>
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