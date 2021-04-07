<?php


session_start();

$subjects_id = $subjects_description = $units = $course_code = $year_level = $semester = $pre_requisites = $alert_msg = '';


$btnNew = 'disabled';
$btnStatus = 'enabled';

if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$user_id = $_SESSION['id'];

include('../config/db_config.php');
include('insert_subjects.php');

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


//select all courses
$get_all_courses_sql = "SELECT * FROM tbl_courses ORDER BY courses_id Asc ";
$get_all_courses_data = $con->prepare($get_all_courses_sql);
$get_all_courses_data->execute();

//select all year level
$get_all_year_sql = "SELECT * FROM tbl_year ORDER BY year_level Asc ";
$get_all_year_data = $con->prepare($get_all_year_sql);
$get_all_year_data->execute();

//select all semester
$get_all_semester_sql = "SELECT * FROM tbl_semester ORDER BY semester Asc ";
$get_all_semester_data = $con->prepare($get_all_semester_sql);
$get_all_semester_data->execute();

//select all subjects
$get_all_subjects_sql = "SELECT * FROM tbl_subjects ORDER BY subjects_id Asc ";
$get_all_subjects_data = $con->prepare($get_all_subjects_sql);
$get_all_subjects_data->execute();


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
            <div class="muted pull-left">Add Subject</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <form class="form-horizontal" role="form" method="post" action="<?php htmlspecialchars("PHP_SELF"); ?>">
                <fieldset>
                  <legend>Details</legend>




                  <div class="box-body">
                    <?php echo $alert_msg; ?>
                    <div class="control-group">
                      <label class="control-label" for="focusedInput">Subjects ID</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="subjects_id" value="<?php echo $subjects_id; ?>" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="focusedInput">Subject Description</label>
                      <div class="controls">
                        <input type="text" class="form-control span5" name="subjects_description" value="<?php echo $subjects_description; ?>" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="focusedInput">Units</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="units" value="<?php echo $units; ?>" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="select01">Course</label>
                      <div class="controls">
                        <select id="select01" name="course_code" class="chzn-select span5">
                        <option selected="selected">Please select...</option>
                        <?php while ($get_courses = $get_all_courses_data->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <option value="<?php echo
    $get_courses['courses_id']; ?>"><?php echo $get_courses['courses']; ?></option>
<?php } ?>
                        </select>
                      </div>
                    </div>

                    <!-- <div class="control-group">
                      <label class="control-label" for="focusedInput">Course Code</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="course_code" value="<?php echo $course_id; ?>" required>
                      </div>
                    </div> -->

                    <!-- <div class="control-group">
                      <label class="control-label" for="focusedInput">Year Level</label>
                      <div class="controls">
                        <input type="text" class="form-control span5" name="year_level" value="<?php echo $year_level; ?>" required>
                      </div>
                    </div> -->

                    <!-- <div class="control-group">
                      <label class="control-label" for="focusedInput">Semester</label>
                      <div class="controls">
                        <input type="text" class="form-control span5" name="year_level" value="<?php echo $semester; ?>" required>
                      </div>
                    </div> -->

                    <div class="control-group">
                      <label class="control-label" for="select01">Year Level</label>
                      <div class="controls">
                        <select id="select01" name="year_level" class="chzn-select span5">
                        <option selected="selected">Please select...</option>
                        <?php while ($get_year = $get_all_year_data->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <option value="<?php echo
    $get_year['year_level']; ?>"><?php echo $get_year['year_level']; ?></option>
<?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="select01">Semester</label>
                      <div class="controls">
                        <select id="select01" name="semester" class="chzn-select span5">
                        <option selected="selected">Please select...</option>
                        <?php while ($get_semester = $get_all_semester_data->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <option value="<?php echo
    $get_semester['semester']; ?>"><?php echo $get_semester['semester']; ?></option>
<?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="multiSelect">Pre-requisite Subject/s:</label>
                      <div class="controls">
                        <select multiple="multiple" id="multiSelect" class="chzn-select span5" name="pre_requisites[]">
                          <option>
                            <?php while ($get_subjects = $get_all_subjects_data->fetch(PDO::FETCH_ASSOC)) { ?>
                          <option value="<?php echo
                                          $get_subjects['subjects_id']; ?>"><?php echo $get_subjects['subjects_description']; ?></option>
                        <?php } ?>
                        </select>
                        <p class="help-block">Start typing to activate auto complete!</p>
                      </div>

                    </div><br>

                    <!-- /.box-body -->
                    <div class="box-footer">
                      <input type="submit" <?php echo $btnNew; ?> name="add" class="btn btn-primary" value="New">
                      <input type="submit" <?php echo $btnStatus; ?> name="save" class="btn btn-primary" value="Save">
                      <a href="list_subjects.php">
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
<?php include('../includes/footer.php'); ?>
</script>
</body>

</html>