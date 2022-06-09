<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$students_id = $surname = $first_name = $middle_name =  '';

$students_id = $_SESSION['id'];

//querry to select current user's information
$get_students_sql = "SELECT * FROM tbl_students WHERE students_id = :id";
$get_students_data = $con->prepare($get_students_sql);
$get_students_data->execute([':id' => $students_id]);
while ($result = $get_students_data->fetch(PDO::FETCH_ASSOC)) {
  $students_id   = $result['students_id'];
  $students_surname  = $result['last_name'];
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
              <div class="table-toolbar" style = "margin-bottom:20px;">
                <div class="btn-group">
                  <a href="add_student.php"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
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
                    <th> OPTIONS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($students_data = $get_all_students_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <tr style="font-size: 1rem">
                      <td><?php echo $students_data['students_id']; ?> </td>
                      <td><?php echo $students_data['last_name']; ?> </td>
                      <td><?php echo $students_data['first_name']; ?> </td>
                      <td><?php echo $students_data['middle_name']; ?> </td>
                      <td>
                      <a class="btn btn-primary" href="edit_students.php?students_id=<?php echo
                         $students_data['students_id']; ?>"><i class="icon-edit"></i>
                          </a>
            
                      
                      <!-- PRINT THE TOR -->
                          <a class = "btn btn-primary" id = "link_tor" href="../jasperreport/tor.php?id=<?php echo
                         $students_data['students_id']; ?>"  target="blank" >
                          <i class = "icon-print"></i>
                            <!-- <button class = "btn btn-primary" id = "print_tor"> <i class = "icon-print"></i></button> -->
                          </a>    

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
  // $('#example2').DataTable({
  //   'paging': true,
  //   'lengthChange': true,
  //   'searching': true,
  //   'ordering': true,
  //   'info': true,
  //   'autoWidth': true
  // })
  // $(document).on('click', 'button[data-role=confirm_delete]', function(event) {
  //   event.preventDefault();
  //   var students_id = ($(this).data('id'));
  //   $('#students_id').val(students_id);
  //   $('#deleteuser_Modal').modal('toggle');
  // })

</script>
</body>

</html>