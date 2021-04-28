<?php


session_start();

$teacher_id = $status = $department = $courses_id = $courses =  $alert_msg = '';


$btnNew = 'disabled';
$btnStatus = 'enabled';

if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$user_id = $_SESSION['id'];

include('../config/db_config.php');
include('insert_status.php');

//select user
$get_user_sql = "SELECT * FROM tbl_users WHERE user_id = :id";
$user_data = $con->prepare($get_user_sql);
$user_data->execute([':id' => $user_id]);
while ($result = $user_data->fetch(PDO::FETCH_ASSOC)) {
  $db_first_name = $result['first_name'];
  $db_middle_name = $result['middle_name'];
  $db_last_name = $result['last_name'];
  $db_email_ad = $result['email'];
  $db_contact_no = $result['contact_no'];
  $db_user_name = $result['username'];
  $db_department = $result['department'];
}


//select all courses
$get_all_courses_sql = "SELECT * FROM tbl_courses ORDER BY courses_id Asc ";
$get_all_courses_data = $con->prepare($get_all_courses_sql);
$get_all_courses_data->execute();



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
            <div class="muted pull-left">Add Status</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <form class="form-horizontal" role="form" method="post" action="<?php htmlspecialchars("PHP_SELF"); ?>">
                <fieldset>
                  <legend>Details</legend>




                  <div class="box-body">
                    <?php echo $alert_msg; ?>
                    <div class="control-group">
                      <label class="control-label" for="focusedInput">Teacher ID:</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="teacher_id" value="<?php echo $teacher_id; ?>" required>
                      </div>
                    </div><br>

                    

                    <!-- <div class="control-group">
                    <label class="control-label" for="focusedInput">Status: 
                                      </label>
                                          <div class="controls" >
                                            <select class="span3 m-wrap" id="work_status" name="category">
                                              <option value="">Please Select&#10240&#10240&#10240&#10240&#10240</option>
                                              <option value="Full-time">Full-time</option>
                                              <option value="Part-time">Part-time</option>
                                            </select>
                                          </div>
                    </div> -->

                    <label class="control-label"
                                            style="display: inline-block; margin-left: 15px;">Status: 
                                             </label>
                                          <div class="controls" >
                                            <select class="span3 m-wrap" id="status" name="status">
                                              <option value="">Please Select&#10240&#10240&#10240&#10240&#10240</option>
                                              <option value="Full-time">Full-time</option>
                                              <option value="Part-time">Part-time</option>
                                            </select>
                                          </div>
                    </div> </fieldset> </br>
                    <br>

                    <div class="control-group">
                      <label class="control-label" for="multiSelect">Department:</label>
                      <div class="controls">
                        <select multiple="multiple" id="multiSelect" class="chzn-select span5" name="courses_id[]">
                          <option>
                            <?php while ($get_courses = $get_all_courses_data->fetch(PDO::FETCH_ASSOC)) { ?>
                          <option value="<?php echo
                                          $get_courses['courses_id']; ?>"><?php echo $get_courses['courses']; ?></option>
                        <?php } ?>
                        </select>
                        <p class="help-block">Start typing to activate auto complete!</p>
                      </div> <br>
                      

                    </div><br>


                  
                    </div> <br>

                    <!-- /.box-body -->
                    <div class="box-footer">
                      <input type="submit" <?php echo $btnNew; ?> name="add" class="btn btn-primary" value="New">
                      <input type="submit" <?php echo $btnStatus; ?> name="save" class="btn btn-primary" value="Save">
                      <a href="list_status.php">
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