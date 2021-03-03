<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$objid= $student_id = $subject_id = $prelim =$midterm =$finals = $remarks = '';

$objid = $_SESSION['id'];

//querry to select current student information
$get_grades_sql = "SELECT * FROM tbl_grades WHERE objid = :id";
$get_grades_data = $con->prepare($get_grades_sql);
$get_grades_data->execute([':id' => $objid]);
while ($result = $get_grades_data->fetch(PDO::FETCH_ASSOC)) {
  $objid               = $result['objid'];
  $student_id      = $result['student_id'];
  $subject_id     = $result['subject_id'];
  $prelim         = $result['prelim'];
  $midterm      = $result['midterm'];
  $finals       = $result['finals'];
  $remarks = $result['remarks'];
}

$get_all_grades_sql = "SELECT * FROM tbl_grades ORDER BY objid Asc ";
$get_all_grades_data = $con->prepare($get_all_grades_sql);
$get_all_grades_data->execute();


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
            <div class="muted pull-left">List of Student Grades</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
                <div class="btn-group" style="margin-bottom:20px;">
                  <a href="add_grades.php"><button class="btn btn-success">Add New Year Level<i
                        class="icon-plus icon-white"></i></button></a>
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

              <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="example2">
                <thead>
                  <tr>
                    <th> OBJID </th>
                    <th> STUDENT ID</th>
                    <th> SUBJECT ID </th>
                    <th> PRELIM </th>
                    <th> MIDTERM </th>
                    <th> FINALS </th>
                    <th> REMARKS </th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($grades_data = $get_all_grades_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                  <tr style="font-size: 1rem">
                    <td><?php echo $grades_data['objid']; ?> </td>
                    <td><?php echo $grades_data['student_id']; ?> </td>
                    <td><?php echo $grades_data['subject_id'] ?> </td>
                    <td><?php echo $grades_data['prelim'] ?> </td>
                    <td><?php echo $grades_data['midterm'] ?></td>
                    <td><?php echo $grades_data['finals'] ?></td>
                    <td><?php echo $grades_data['remarks'] ?></td>
                    <td>
                    <a class="btn btn-primary" href="edit_grades.php?objid=<?php echo
    $grades_data['objid']; ?>"><i class="icon-edit"></i>
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