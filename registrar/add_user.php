<?php
include('../config/db_config.php');
include('insert.php');

session_start();

$fname = $mname = $lname = $contact_number = $email = $uname = $upass = $btnStatus = $department = $alert_msg = '';
$btnNew = 'disabled';

if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$user_id = $_SESSION['id'];



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




<div class="span9" id="content">
      <!-- morris stacked chart -->
      <div class="row-fluid">
        <!-- block -->
        <div class="block">
          <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Add User</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <form class="form-horizontal" method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
                <fieldset>
                  <legend>User's Form</legend>




                  
                    <div class="box-body">
                      <?php echo $alert_msg; ?>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">First Name</label>
                        <div class="controls">
                          <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo $fname; ?>" required>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Middle Name</label>
                        <div class="controls">
                          <input type="text" class="form-control" name="middlename" placeholder="Middlename" value="<?php echo $mname; ?>" required>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Last Name</label>
                        <div class="controls">
                          <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo $lname; ?>" required>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Email Address</label>
                        <div class="controls">
                          <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo $email; ?>">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Contact Number</label>
                        <div class="controls">
                          <input type="number" class="form-control" name="contact_number" placeholder="Contact Number" value="<?php echo $contact_number; ?>" required>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Username</label>
                        <div class="controls">
                          <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $uname; ?>" required>
                        </div>
                      </div>


                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Password</label>
                        <div class="controls">
                          <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $upass; ?>" required>
                        </div>
                      </div>
                      <!-- 
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Department</label>
                        <div class="controls">
                        <input type="text" class="form-control" name="department" placeholder="Department" value="<?php echo $department; ?>" required>
                        </div>
                      </div>  -->

                    </div><br>

                    <!-- /.box-body -->
                    <div class="box-footer">
                      <input type="submit" <?php echo $btnNew; ?> name="add" class="btn btn-primary" value="New">
                      <input type="submit" <?php echo $btnStatus; ?> name="insert" class="btn btn-primary" value="Save">
                      <a href="users">
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
<!-- /.content-wrapper -->
<?php include('../includes/footer.php'); ?>

</body>

</html>