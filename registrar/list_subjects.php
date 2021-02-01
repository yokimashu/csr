<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$subjects_id = $subjects_description = $units = $course_code = $year_level = $semester = $pre_requisites = '';

$subjects_id = $_SESSION['id'];

//querry to select current user's information
$get_subjects_sql = "SELECT * FROM tbl_subjects WHERE subjects_id = :id";
$get_subjects_data = $con->prepare($get_subjects_sql);
$get_subjects_data->execute([':id' => $subjects_id]);
while ($result = $get_subjects_data->fetch(PDO::FETCH_ASSOC)) {
  $subjects_id   = $result['subjects_id'];
  $subjects_description  = $result['subjects_description'];
  $subjects_units = $result['units'];
  $subjects_course_code = $result['course_code'];
  $subjects_year_level = $result['year_level'];
  $subjects_semester = $result['semester'];
  $subjects_pre_requisites = $result['pre_requisites'];
}

$get_all_subjects_sql = "SELECT * FROM tbl_subjects ORDER BY subjects_id Asc ";
$get_all_subjects_data = $con->prepare($get_all_subjects_sql);
$get_all_subjects_data->execute();


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
            <div class="muted pull-left">LIST OF SUBJECTS</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
                <div class="btn-group">
                  <a href="add_subject.php"><button class="btn btn-success">Add New Subject<i class="icon-plus icon-white"></i></button></a>
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
                    <th> SUBJECT CODE</th>
                    <th> DESCRIPTION</th>
                    <th> UNITS </th>
                    <th> COURSE CODE </th>
                    <th> YEAR LEVEL</th>
                    <th> SEMESTER </th>
                    <th> PRE-REQUISITES</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php while ($subjects_data = $get_all_subjects_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <tr style="font-size: 1rem">
                      <td><?php echo $subjects_data['subjects_id']; ?> </td>
                      <td><?php echo $subjects_data['subjects_description']; ?> </td>
                      <td><?php echo $subjects_data['units']; ?> </td>
                      <td><?php echo $subjects_data['course_code']; ?> </td>
                      <td><?php echo $subjects_data['year_level']; ?> </td>
                      <td><?php echo $subjects_data['semester']; ?> </td>
                      <td><?php echo $subjects_data['pre_requisites']; ?> </td>
                      <td>
                        <!-- <a class="btn btn-outline-success btn-xs" href="update_users.php?objid=<?php echo $subjects_data['subjects_id']; ?>&id=<?php echo $subjects_data['subjects_id']; ?>"> -->
                          <i class="fa fa-check"></i>
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