<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$code= $year_level = '';

$code = $_SESSION['id'];

//querry to select current user's information
$get_year_sql = "SELECT * FROM tbl_year WHERE code = :id";
$get_year_data = $con->prepare($get_year_sql);
$get_year_data->execute([':id' => $code]);
while ($result = $get_year_data->fetch(PDO::FETCH_ASSOC)) {
  $code                 = $result['code'];
  $year_level           = $result['year_level'];
}

$get_all_year_sql = "SELECT * FROM tbl_year ORDER BY code Asc ";
$get_all_year_data = $con->prepare($get_all_year_sql);
$get_all_year_data->execute();


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
            <div class="muted pull-left">List of Year Level</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
                <div class="btn-group" style="margin-bottom:20px;">
                  <a href="add_year.php"><button class="btn btn-success">Add New Year Level<i
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
                    <th> CODE</th>
                    <th> YEAR LEVEL</th>
                    <th> OPTIONS </th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($year_data = $get_all_year_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                  <tr style="font-size: 1rem">
                    <td><?php echo $year_data['code']; ?> </td>
                    <td><?php echo $year_data['year_level']; ?> </td>
                    <td>
                    <a class="btn btn-primary" href="edit_year.php?code=<?php echo
    $year_data['code']; ?>"><i class="icon-edit"></i>
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
  // $('#example2').DataTable({
  //   'paging': true,
  //   'lengthChange': true,
  //   'searching': true,
  //   'ordering': true,
  //   'info': true,
  //   'autoWidth': true
  // });

  // $(document).on('click', 'button[data-role=confirm_delete]', function (event) {
  //   event.preventDefault();
  //   var user_id = ($(this).data('id'));
  //   $('#user_id').val(user_id);
  //   $('#deleteuser_Modal').modal('toggle');
  // })
</script>
</body>

</html>