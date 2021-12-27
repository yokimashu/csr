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
include('update_schedules.php');
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

if (isset($_GET['objid'])) {
  $objid = $_GET['objid'];

  $get_schedule_sql = "SELECT * FROM tbl_schedules WHERE objid = :objid";
  $get_schedule_data = $con->prepare($get_schedule_sql);
  $get_schedule_data->execute([':objid' => $objid]);
  while ($result = $get_schedule_data->fetch(PDO::FETCH_ASSOC)) {
    $subjects = $result['subject_code'];
    $course = $result['courses_id'];
    $days = $result['days'];
    $start_time = $result['start_time'];
    $end_time = $result['end_time'];
    $room = $result['room_code'];
    $teacher = $result['teacher_code'];
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
            <div class="muted pull-left">Edit Schedule</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <form class="form-horizontal" role="form" method="post" action="<?php htmlspecialchars("PHP_SELF"); ?>">
                <fieldset>
                  <legend>Edit Schedule Form</legend>


                  <!-- search students -->
                  <?php echo $alert_msg; ?>

                  <div class="control-group">
                    <label class="control-label" for="select01">Search Subject:</label>
                    <div class="controls">
                      <select id="select01" name="subject_code" class="chzn-select span5">
                        <option>
                          <?php while ($get_subjects = $get_all_subjects_data->fetch(PDO::FETCH_ASSOC)) { ?>

                            <?php $selected = ($subjects == $get_subjects['subjects_id']) ? 'selected' : ''; ?>
                        <option <?= $selected; ?> value="<?php echo $get_subjects['subjects_id']; ?>"><?php echo $get_subjects['subjects_description']; ?></option>
                      <?php } ?>

                      </select>
                    </div>
                  </div>
                  <!-- search students -->

                  <!-- Schedules -->
                  <div class="control-group">
                    <label class="control-label" for="multiSelect">Day/s</label>
                    <div class="controls">
                      <select multiple="multiple" id="multiSelect" class="chzn-select span4" name='days[]'>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
           
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
                        <select id="select01" name="room_code" class="chzn-select span5">
                          <option>
                            <?php while ($get_rooms = $get_all_rooms_data->fetch(PDO::FETCH_ASSOC)) { ?>

                            <?php $selected = ($room == $get_rooms['room_no']) ? 'selected' : ''; ?>
                          <option <?= $selected; ?> value="<?php echo $get_rooms['room_no']; ?>"><?php echo $get_rooms['room_description']; ?></option>

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
                        <select id="select01" name="teacher_code" class="chzn-select span5">
                          <option>
                            <?php while ($get_teachers = $get_all_teachers_data->fetch(PDO::FETCH_ASSOC)) { ?>
                         
                            <?php $selected = ($teacher == $get_teachers['teachers_id']) ? 'selected' : ''; ?>
                          <option <?= $selected; ?> value="<?php echo$get_teachers['teachers_id']; ?>"><?php echo $get_teachers['first_name'] . ' ' . $get_teachers['middle_name'] . ' ' . $get_teachers['surname']; ?></option>
                        <?php } ?>    
                
                        </select>
                      </div>
                    </div>
                    <!-- teacher -->

                    <div class="control-group hidden">
                      <label class="control-label" for="focusedInput">Objid</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="objid" value="<?php echo $objid; ?>" required>
                      </div>
                    </div>

                  </div><br>

                  <!-- /.box-body -->
                  <div class="box-footer">
                    <input type="submit" <?php echo $btnNew; ?> name="add" class="btn btn-primary" value="New">
                    <input type="submit" <?php echo $btnStatus; ?> name="update" class="btn btn-primary" value="Save">
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