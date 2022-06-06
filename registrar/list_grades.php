<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$objid= $students_id = $subjects_id = $prelim =$midterm =$finals = $remarks = '';

$objid = $_SESSION['id'];

//querry to select current student information

$get_all_grades_sql = "SELECT * FROM tbl_students s inner join tbl_enrollment e on s.students_id = e.students_id WHERE e.status = 'ACTIVE' ORDER BY last_name";
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
                  <a href="add_grades.php"><button class="btn btn-success">Add Grades<i
                        class="icon-plus icon-white"></i></button></a>
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

              <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="listgrades">
                <thead>
                  <tr>
                    <th> TRANSACTION ID </th>
                    <th> STUDENT ID</th>
                    <th> LAST NAME </th>
                    <th> FIRST NAME </th>
                    <th> MIDDLE NAME </th>
                    <th> COURSE </th>
                    <th> YEAR </th>
                    <th> OPTIONS </th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($grades_data = $get_all_grades_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                  <tr style="font-size: 1rem">
                    <td><?php echo $grades_data['objid']; ?> </td>
                    <td><?php echo $grades_data['students_id']; ?> </td>
                    <td><?php echo $grades_data['last_name'] ?> </td>
                    <td><?php echo $grades_data['first_name'] ?> </td>
                    <td><?php echo $grades_data['middle_name'] ?></td>
                    <td><?php echo $grades_data['course_code'] ?></td>
                    <td><?php echo $grades_data['year_level'] ?></td>
                    <td>
                    <a class="btn btn-primary" href="add_grades.php?student_id=<?php echo $grades_data['students_id'];?>&objid=<?php echo
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
  $('#listgrades').DataTable({
    'paging': true,
    'lengthChange': true,
    'searching': true,
    'ordering': true,
    'info': true,
    'autoWidth': true
  });

  // $(document).on('click', 'button[data-role=confirm_delete]', function (event) {
  //   event.preventDefault();
  //   var user_id = ($(this).data('id'));
  //   $('#user_id').val(user_id);
  //   $('#deleteuser_Modal').modal('toggle');
  // })
</script>
</body>

</html>