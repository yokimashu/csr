<?php


session_start();

$day = $start_time = $end_time = $alert_msg = '';


$btnNew = 'disabled';
$btnStatus = 'enabled';

if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$user_id = $_SESSION['id'];

include('../config/db_config.php');
include('insert_schedules.php');
include('../includes/sql.php');

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
            <div class="muted pull-left">Add Schedule</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <form class="form-horizontal" role="form" method="post" action="<?php htmlspecialchars("PHP_SELF"); ?>">
                <fieldset>
                  <legend>Add Schedule Form</legend>


                  <!-- search students -->
                  <div class="control-group">
                    <label class="control-label" for="select01">Search Subject:</label>
                    <div class="controls">
                      <select id="select01" name="subject" class="chzn-select span5">
                        <option>
                          <?php while ($get_subjects = $get_all_subjects_data->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo
                                        $get_subjects['subjects_id']; ?>"><?php echo $get_subjects['subjects_description']; ?></option>
                        </option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <!-- search students -->

                  <!-- Schedules -->
                  <div class="control-group">
                    <label class="control-label" for="multiSelect">Day/s</label>
                    <div class="controls">
                      <select multiple="multiple" id="multiSelect" class="chzn-select span4" name='schedule[]'>
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                        <option>Thursday</option>
                        <option>Friday</option>
                        <option>Saturday</option>
                      </select>
                      <p class="help-block">Start typing to activate auto complete!</p>
                    </div><br>
                    <!-- Schedules -->

                    <div class="control-group">
                      <label class="control-label" for="focusedInput">Start Time</label>
                      <div class="controls">
                        <input type="time" class="form-control" name="start_time" value="<?php echo $start_time; ?>" required>
                      </div>
                    </div></br>

                    <div class="control-group">
                      <label class="control-label" for="focusedInput">End Time</label>
                      <div class="controls">
                        <input type="time" class="form-control" name="end_time" value="<?php echo $end_time; ?>" required>
                      </div>
                    </div>

                    <!-- Rooms -->
                    <div class="control-group">
                      <label class="control-label" for="select01">Room Assignment:</label>
                      <div class="controls">
                        <select id="select01" name="room" class="chzn-select span5">
                          <option>
                            <?php while ($get_rooms = $get_all_rooms_data->fetch(PDO::FETCH_ASSOC)) { ?>
                          <option value="<?php echo
                                          $get_rooms['room_no']; ?>"><?php echo $get_rooms['room_description']; ?></option>
                          </option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                    <!-- Rooms -->

                    <!-- teacher -->
                    <div class="control-group">
                      <label class="control-label" for="select01">Teacher/Instructor:</label>
                      <div class="controls">
                        <select id="select01" name="teacher" class="chzn-select span5">
                          <option>
                            <?php while ($get_teachers = $get_all_teachers_data->fetch(PDO::FETCH_ASSOC)) { ?>
                          <option value="<?php echo
                                          $get_teachers['teachers_id']; ?>"><?php echo $get_teachers['first_name'] . ' ' . $get_teachers['middle_name'] . ' ' . $get_teachers['surname']; ?></option>
                          </option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                    <!-- teacher -->

                  </div><br>

                  <!-- /.box-body -->
                  <div class="box-footer">
                    <input type="submit" <?php echo $btnNew; ?> name="add" class="btn btn-primary" value="New">
                    <input type="submit" <?php echo $btnStatus; ?> name="save" class="btn btn-primary" value="Save">
                    <a href="list_schedules.php">
                      <input type="button" name="cancel" class="btn btn-default" value="Cancel">
                    </a>
                  </div>
              </form>
            </div>
            <!-- /.box -->
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer here -->
<?php include('../includes/footer.php'); ?>
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