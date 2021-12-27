<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$courses = $number_of_enrollees =  '';

$courses_id = $_SESSION['id'];

//querry to select current user's information
$get_courses_sql = "SELECT * FROM tbl_courses WHERE courses_id = :id";
$get_courses_data = $con->prepare($get_courses_sql);
$get_courses_data->execute([':id' => $courses_id]);
while ($result = $get_courses_data->fetch(PDO::FETCH_ASSOC)) {
  $courses_id   = $result['courses_id'];
  $courses = $result['courses'];
  $number_of_enrollees  = $result['no.of enrollees'];
  
}

$get_all_courses_sql = "SELECT * FROM tbl_courses ORDER BY courses_id Asc ";
$get_all_courses_data = $con->prepare($get_all_courses_sql);
$get_all_courses_data->execute();


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
                  <a href="add_courses.php"><button class="btn btn-success">Add New Course<i class="icon-plus icon-white"></i></button></a>
                </div>
                <!-- <div class="btn-group pull-right">
                  <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Print</a></li>
                    <li><a href="#">Save as PDF</a></li>
                    <li><a href="#">Export to Excel</a></li>
                  </ul>
                </div> -->
              </div>

              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                <thead>
                  <tr>
                    <th> COURSE ID</th>
                    <th> COURSES</th>
                    <th> NUMBER OF ENROLLEES</th>
                    <th> OPTIONS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($courses_data = $get_all_courses_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <tr style="font-size: 1rem">
                      <td><?php echo $courses_data['courses_id']; ?> </td>
                      <td><?php echo $courses_data['courses']; ?> </td>
                      <td><?php echo $courses_data['number_of_enrollees']; ?> </td>
                      
                      <td>
                        <a class="btn btn-primary" href="edit_courses.php?courses_id=<?php echo
    $courses_data['courses_id']; ?>"><i class="icon-edit"></i>
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
  // $('#pr').DataTable({
  //   'paging': true,
  //   'lengthChange': true,
  //   'searching': true,
  //   'ordering': true,
  //   'info': true,
  //   'autoWidth': true
  // })
  // $(document).on('click', 'button[data-role=confirm_delete]', function(event) {
  //   event.preventDefault();
  //   var user_id = ($(this).data('id'));
  //   $('#user_id').val(user_id);
  //   $('#deleteuser_Modal').modal('toggle');
  // })
</script>
</body>

</html>