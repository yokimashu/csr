<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$department =  '';

$user_id = $_SESSION['id'];

//querry to select current user's information
$get_user_sql = "SELECT * FROM tbl_users WHERE user_id = :id";
$get_user_data = $con->prepare($get_user_sql);
$get_user_data->execute([':id' => $user_id]);
while ($result = $get_user_data->fetch(PDO::FETCH_ASSOC)) {
  $user_name   = $result['username'];
  $department  = $result['department'];
}

$get_all_users_sql = "SELECT * FROM tbl_users ORDER BY user_id Asc ";
$get_all_users_data = $con->prepare($get_all_users_sql);
$get_all_users_data->execute();


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
            <div class="muted pull-left">LIST OF COURSES</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
                <div class="btn-group">
                  <a href="add_course.php"><button class="btn btn-success">Add New Course<i class="icon-plus icon-white"></i></button></a>
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
                    <th> Course</th>
                    <th> Number of Enrolles </th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($users_data = $get_all_users_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <tr style="font-size: 1rem">
                      <td><?php echo $users_data['user_id']; ?> </td>
                      <td><?php echo $users_data['last_name']; ?> </td>
                      <td>
                        <!-- <a class="btn btn-outline-success btn-xs" href="update_users.php?objid=<?php echo $users_data['user_id']; ?>&id=<?php echo $users_data['user_id']; ?>">
                          <i class="fa fa-check"></i>
                        </a> -->
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
<!-- new -->
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