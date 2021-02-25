<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$teacher_id = $status = $department = '';

$teacher_id = $_SESSION['id'];

//querry to select current user's information
$get_status_sql = "SELECT * FROM tbl_status WHERE teacher_id = :id";
$get_status_data = $con->prepare($get_status_sql);
$get_status_data->execute([':id' => $teacher_id]);
while ($result = $get_status_data->fetch(PDO::FETCH_ASSOC)) {
  $teacher_id                = $result['teacher_id'];
  $status      = $result['status'];
  $department = $result['department'];
}

$get_all_status_sql = "SELECT * FROM tbl_status ORDER BY teacher_id Asc ";
$get_all_status_data = $con->prepare($get_all_status_sql);
$get_all_status_data->execute();


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
            <div class="muted pull-left">List of Teacher Status</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
                <!-- <div class="btn-group" style="margin-bottom:20px;">
                  <a href="add_subject.php"><button class="btn btn-success">Add New Year Level<i
                        class="icon-plus icon-white"></i></button></a>
                </div> -->
                <div class="btn-group pull-right">
                  <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Print</a></li>
                    <li><a href="#">Save as PDF</a></li>
                    <li><a href="#">Export to Excel</a></li>
                  </ul>
                </div>
              </div>

              <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="example2">
                <thead>
                  <tr>
                    <th> TEACHER ID</th>
                    <th> STATUS</th>
                    <th> DEPARTMENT </th>
                    <th> OPTIONS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($status_data = $get_all_status_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                  <tr style="font-size: 1rem">
                    <td><?php echo $status_data['teacher_id']; ?> </td>
                    <td><?php echo $status_data['status']; ?> </td>
                    <td><?php echo $status_data['department'] ?> </td>
                    <td>
                    <a class="btn btn-primary" href="edit_status.php?teacher_id=<?php echo
    $status_data['teacher_id']; ?>"><i class="icon-edit"></i>
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


<script>
  $('#example2').DataTable({
    'paging': true,
    'lengthChange': true,
    'searching': true,
    'ordering': true,
    'info': true,
    'autoWidth': true
  });

  $(document).on('click', 'button[data-role=confirm_delete]', function (event) {
    event.preventDefault();
    var user_id = ($(this).data('id'));
    $('#user_id').val(user_id);
    $('#deleteuser_Modal').modal('toggle');
  })
</script>
</body>

</html>