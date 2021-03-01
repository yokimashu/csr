<?php


session_start();

$objid = $student_id = $subject_id =$prelim =$midterm =$finals =$remarks =$alert_msg = '';


 $btnNew = 'disabled';
 $btnStatus = 'enabled';

if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$user_id = $_SESSION['id'];

include('../config/db_config.php');
include ('update_grades.php');

//select user
$get_user_sql = "SELECT * FROM tbl_users WHERE user_id = :id";
$user_data = $con->prepare($get_user_sql);
$user_data->execute([':id' => $user_id]);
while ($result = $user_data->fetch(PDO::FETCH_ASSOC)) {
  $db_first_name = $result['first_name'];
  $db_middle_name = $result['middle_name'];
  $db_last_name = $result['last_name'];
  $db_email_ad = $result['email'];
  $db_contact_number = $result['contact_no'];
  $db_user_name = $result['username'];
  $db_department = $result['department'];
}

  //get grades data
if (isset($_GET['objid'])) {
  $objid = $_GET['objid'];

  $get_grades_sql = "SELECT * FROM tbl_grades WHERE objid = :objid";
  $get_grades_data = $con->prepare($get_grades_sql);
  $get_grades_data->execute([':objid' => $objid]);
  while ($result = $get_grades_data->fetch(PDO::FETCH_ASSOC)) {
      $student_id    = $result['student_id'];
      $subject_id    = $result['subject_id'];
      $prelim    = $result['prelim'];
      $midterm    = $result['midterm'];
      $finals    = $result['finals'];
      $remarks    = $result['remarks'];
  

  }
}
?>

<!DOCTYPE html>
<html>

<?php
include('../includes/header.php');
include('../includes/sidebar.php');
?>


<div class="content-wrapper">
  <div class="content-header"></div>


  <!-- Main content -->
  <section class="content">


    <div class="span9" id="content">
      <!-- morris stacked chart -->
      <div class="row-fluid">
        <!-- block -->
        <div class="block">
          <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Edit Grade</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <form class="form-horizontal" role="form" method="post" action="<?php htmlspecialchars("PHP_SELF"); ?>">
                <fieldset>
                  <legend>Grade Edit Form</legend>




                  <div class="box-body">
                    <?php echo $alert_msg; ?>

                    <div class="control-group">
                      <label class="control-label" for="focusedInput">Objid</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="objid" value="<?php echo $objid; ?>" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="focusedInput">Student Id</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="student_id"  value="<?php echo $student_id; ?>" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="focusedInput">Subject Id</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="subject_id"  value="<?php echo $subject_id; ?>" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="focusedInput">Prelim</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="prelim"  value="<?php echo $prelim; ?>" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="focusedInput">Midterm</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="midterm"  value="<?php echo $midterm; ?>" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="focusedInput">Finals</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="finals"  value="<?php echo $finals; ?>" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="focusedInput">Remarks</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="remarks"  value="<?php echo $remarks; ?>" required>
                      </div>
                    </div>



                  </div><br>

                 <!-- /.box-body -->
                 <div class="box-footer">
                        <input type="submit" <?php echo $btnNew; ?> name="add" class="btn btn-primary" value="New">
                        <input type="submit" <?php echo $btnStatus; ?> name="update" class="btn btn-primary" value="Save">
                        <a href="list_grades.php">
                          <input type="button" name="cancel" class="btn btn-default" value="Cancel">
                        </a>
                      </div>
                  </form>
            </div>
            <!-- /.box -->
          </div>
          <div class="col-md-1"></div>
        </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer here -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0
  </div>
  <strong>Copyright &copy; <?php echo 2018; ?>.</strong> All rights
  reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.js"></script>

<script>
  $('#users').DataTable({
    'paging': true,
    'lengthChange': true,
    'searching': true,
    'ordering': true,
    'info': true,
    'autoWidth': true,
    'autoHeight': true
  })
</script>

<script type="text/javascript">
  $(document).ready(function() {

    $(document).ajaxStart(function() {
      Pace.restart()
    })

  });
</script>


</body>

</html>