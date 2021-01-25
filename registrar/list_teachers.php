<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$department= $surname = $first_name =$middle_name = $birthdate = $sex = $status = $contact_number = $email_address = '';


$teachers_id = $_SESSION['id'];

//querry to select current teachers's information
$get_teachers_sql = "SELECT * FROM tbl_teachers WHERE idno = :id";
$get_teachers_data = $con->prepare($get_teachers_sql);
$get_teachers_data->execute([':id' => $teachers_id]);
while ($result = $get_teachers_data->fetch(PDO::FETCH_ASSOC)) {
  $user_name   = $result['username'];
  $department  = $result['department'];
}

$get_all_teachers_sql = "SELECT * FROM tbl_teachers ORDER BY idno Asc ";
$get_all_teachers_data = $con->prepare($get_all_teachers_sql);
$get_all_teachers_data->execute();


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
            <div class="muted pull-left">LIST OF TEACHERS</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
                <div class="btn-group">
                  <a href="add_teachers.php"><button class="btn btn-success">Add Teachers <i class="icon-plus icon-white"></i></button></a>
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
                    <th> SURNAME </th>
                    <th> FIRST NAME </th>
                    <th> MIDDLE NAME</th>
                    <th> BIRTHDATE </th>
                    <th> SEX </th>
                    <th> STATUS</th>
                    <th> CONTACT No. </th>
                    <th> EMAIL</th>
                    <th> ADDRESS </th>
                    <th> DEPARTMENT </th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($teachers_data = $get_all_teachers_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <tr style="font-size: 1rem">
                    <td><?php echo $teachers_data['idno']; ?> </td>
                      <td><?php echo $teachers_data['surname']; ?> </td>
                      <td><?php echo $teachers_data['firstname']; ?> </td>
                      <td><?php echo $teachers_data['middlename']; ?> </td>
                      <td><?php echo $teachers_data['birthdate']; ?> </td>
                      <td><?php echo $teachers_data['sex']; ?> </td>
                      <td><?php echo $teachers_data['status']; ?> </td>
                      <td><?php echo $teachers_data['contactnumber']; ?> </td>
                      <td><?php echo $teachers_data['email']; ?> </td>
                      <td><?php echo $teachers_data['address']; ?> </td>
                      <td><?php echo $teachers_data['department']; ?> </td>
                      <td>
                        <a class="btn btn-outline-success btn-xs" href="update_teachers.php?objid=<?php echo $teachers_data['idno']; ?>&id=<?php echo $teachers_data['idno']; ?>">
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