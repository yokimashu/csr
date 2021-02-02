<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$students_id = $surname = $first_name = $middle_name = $course = $student_year_level =  '';

$students_id = $_SESSION['id'];

//querry to select current user's information
$get_students_sql = "SELECT * FROM tbl_students WHERE students_id = :id";
$get_students_data = $con->prepare($get_students_sql);
$get_students_data->execute([':id' => $students_id]);
while ($result = $get_students_data->fetch(PDO::FETCH_ASSOC)) {
  $students_id   = $result['students_id'];
  $students_surname  = $result['surname'];
  $students_first_name   = $result['first_name'];
  $students_middle_name   = $result['middle_name'];
  $students_course   = $result['course'];
  $student_year_level   = $result['students_year_level'];
}

$get_all_students_sql = "SELECT * FROM tbl_students ORDER BY students_id ASC ";
$get_all_students_data = $con->prepare($get_all_students_sql);
$get_all_students_data->execute();


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
            <div class="muted pull-left">List of Students</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
                <div class="btn-group">
                  <a href="add_students.php"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
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
                    <th> ID #</th>
                    <th> LAST NAME </th>
                    <th> FIRST NAME </th>
                    <th> MIDDLE NAME</th>
                    <th> COURSE </th>
                    <th> YEAR</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($students_data = $get_all_students_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <tr style="font-size: 1rem">
                      <td><?php echo $students_data['students_id']; ?> </td>
                      <td><?php echo $students_data['surname']; ?> </td>
                      <td><?php echo $students_data['first_name']; ?> </td>
                      <td><?php echo $students_data['middle_name']; ?> </td>
                      <td><?php echo $students_data['course']; ?> </td>
                      <td><?php echo $students_data['student_year_level']; ?> </td>
                      <td>
                        <!-- <a class="btn btn-outline-success btn-xs" href="update_users.php?objid=<?php echo $students_data['idno']; ?>&id=<?php echo $students_data['idno']; ?>">
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

<!-- footer here -->
<?php include('../includes/footer.php'); ?>
</div>
<script src="vendors/jquery-1.9.1.js">
</script>

<script src="bootstrap/js/bootstrap.min.js">
</script>

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
    var students_id = ($(this).data('id'));
    $('#students_id').val(students_id);
    $('#deleteuser_Modal').modal('toggle');
  })
</script>
</body>

</html>