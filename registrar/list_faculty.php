<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$teachers_id = $surname = $first_name = $middlename = $work_status = $faculty_dept = $contact_number = $email_address =  '';

$teachers_id = $_SESSION['id'];

//querry to select current user's information
$get_faculty_sql = "SELECT * FROM tbl_faculty WHERE teachers_id = :id";
$get_faculty_data = $con->prepare($get_faculty_sql);
$get_faculty_data->execute([':id' => $teachers_id]);
while ($result = $get_faculty_data->fetch(PDO::FETCH_ASSOC)) {
  $faculty_teachers_id   = $result['teachers_id'];
  $faculty_surname  = $result['surname'];
  $faculty_first_name   = $result['first_name'];
  $faculty_middle_name   = $result['middle_name'];
  $faculty_work_status   = $result['work_status'];
  $faculty_faculty_dept   = $result['faculty_dept'];
  $faculty_contact_number   = $result['contact_number'];
  $faculty_email_address   = $result['email_address'];
  
}

$get_all_faculty_sql = "SELECT * FROM tbl_faculty ORDER BY teachers_id ASC ";
$get_all_faculty_data = $con->prepare($get_all_faculty_sql);
$get_all_faculty_data->execute();


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
            <div class="muted pull-left">List of Faculty</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
                <div class="btn-group">
                  <a href="add_faculty.php"><button class="btn btn-success">Add New Teacher<i class="icon-plus icon-white"></i></button></a>
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
                    <th> TEACHERS ID #</th>
                    <th> LAST NAME </th>
                    <th> FIRST NAME </th>
                    <th> MIDDLE NAME</th>
                    <th> STATUS</th>
                    <th> DEPARTMENT</th>
                    <th> CONTACT NUMBER</th>
                    <th> EMAIL ADDRESS</th>
                    <th> OPTIONS</th>
                    
                    
                  </tr>
                </thead>
                <tbody>
                  <?php while ($faculty_data = $get_all_faculty_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <tr style="font-size: 1rem">
                      <td><?php echo $faculty_data['teachers_id']; ?> </td>
                      <td><?php echo $faculty_data['surname']; ?> </td>
                      <td><?php echo $faculty_data['first_name']; ?> </td>
                      <td><?php echo $faculty_data['middle_name']; ?> </td>
                      <td><?php echo $faculty_data['work_status']; ?> </td>
                      <td><?php echo $faculty_data['faculty_dept']; ?> </td>
                      <td><?php echo $faculty_data['contact_number']; ?> </td>
                      <td><?php echo $faculty_data['email_address']; ?> </td>
                      <td>
                  
                        <a class="btn btn-primary" href="edit_faculty.php?teacher_id=<?php echo
    $faculty_data['teachers_id']; ?>"><i class="icon-edit"></i>
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
    var user_id = ($(this).data('id'));
    $('#user_id').val(user_id);
    $('#deleteuser_Modal').modal('toggle');
  })
</script>
</body>

</html>