<?php


session_start();

$fname = $mname = $lname = $contact_number = $email = $uname = $upass = $btnStatus = $department = $alert_msg = '';
$btnNew = 'disabled';

if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$user_id = $_SESSION['id'];

include('../config/db_config.php');
// include ('insert.php');

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

<body>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span9" id="content">

        <!-- wizard -->
        <div class="row-fluid section">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">Add Student</div>
            </div>
            <div class="block-content collapse in">
              <div class="span12">
                <div id="rootwizard">
                  <div class="navbar">
                    <div class="navbar-inner">
                      <div class="container">
                        <ul>
                          <li><a href="#tab1" data-toggle="tab">Step 1</a></li>
                          <li><a href="#tab2" data-toggle="tab">Step 2</a></li>
                          <li><a href="#tab3" data-toggle="tab">Step 3</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div id="bar" class="progress progress-striped active">
                    <div class="bar"></div>
                  </div>
                  <div class="tab-content">

                    <div class="tab-pane" id="tab1">
                      <form class="form-horizontal">
                        <fieldset>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">ID Number: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="focusedInput" type="number" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">First Name: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Middle Name: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Last Name: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="select01">Gender: </label>
                            <div class="controls">
                              <select id="select01" class="chzn-select">
                                <option>Select Gender...</option>
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="select02">Status: </label>
                            <div class="controls">
                              <select id="select02" class="chzn-select">
                                <option>Select Status...</option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Widowed</option>
                              </select>
                            </div>
                          </div>

                        </fieldset>
                      </form>
                    </div>

                    <div class="tab-pane" id="tab2">
                      <form class="form-horizontal">
                        <fieldset>
                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Address</label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="focusedInput">City</label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="focusedInput">State</label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                            </div>
                          </div>
                        </fieldset>
                      </form>
                    </div>

                    <div class="tab-pane" id="tab3">
                      <form class="form-horizontal">
                        <fieldset>
                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Company Name</label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Contact Name</label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Contact Phone</label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                            </div>
                          </div>
                        </fieldset>
                      </form>
                    </div>
                    <ul class="pager wizard">
                      <li class="previous first" style="display:none;"><a href="javascript:void(0);">First</a></li>
                      <li class="previous"><a href="javascript:void(0);">Previous</a></li>
                      <li class="next last" style="display:none;"><a href="javascript:void(0);">Last</a></li>
                      <li class="next"><a href="javascript:void(0);">Next</a></li>
                      <li class="next finish" style="display:none;"><a href="javascript:;">Finish</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /block -->
        </div>
        <!-- /wizard -->

      </div>
    </div>
  </div>



  <!-- /.box-body -->
  <div class="box-footer">
    <input type="submit" <?php echo $btnNew; ?> name="add" class="btn btn-primary" value="New">
    <input type="submit" <?php echo $btnStatus; ?> name="insert" class="btn btn-primary" value="Save">
    <a href="users">
      <input type="button" name="cancel" class="btn btn-default" value="Cancel">
    </a>
  </div>
  </div>
  <!-- /.box -->
  <div class="col-md-1"></div>

  <!-- /.content -->
  <!-- /.content-wrapper -->

  <!-- footer here -->
  <hr>
  <footer>
    <p>&copy; Vincent Gabriel 2013</p>
  </footer>
  </div>

  <!--/.fluid-container-->
  <link href="../vendors/datepicker.css" rel="stylesheet" media="screen">
  <link href="../vendors/uniform.default.css" rel="stylesheet" media="screen">
  <link href="../vendors/chosen.min.css" rel="stylesheet" media="screen">

  <link href="../vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

  <script src="../vendors/jquery-1.9.1.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../vendors/jquery.uniform.min.js"></script>
  <script src="../vendors/chosen.jquery.min.js"></script>
  <script src="../vendors/bootstrap-datepicker.js"></script>

  <script src="../vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
  <script src="../vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

  <script src="../vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

  <script type="text/javascript" src="../vendors/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="../assets/form-validation.js"></script>

  <script src="../assets/scripts.js"></script>

  <script>
    // jQuery(document).ready(function() {   
    //    FormValidation.init();
    // });


    $(function() {
      $(".datepicker").datepicker();
      $(".uniform_on").uniform();
      $(".chzn-select").chosen();
      $('.textarea').wysihtml5();

      $('#rootwizard').bootstrapWizard({
        onTabShow: function(tab, navigation, index) {
          var $total = navigation.find('li').length;
          var $current = index + 1;
          var $percent = ($current / $total) * 100;
          $('#rootwizard').find('.bar').css({
            width: $percent + '%'
          });
          // If it's the last tab then hide the last button and show the finish instead
          if ($current >= $total) {
            $('#rootwizard').find('.pager .next').hide();
            $('#rootwizard').find('.pager .finish').show();
            $('#rootwizard').find('.pager .finish').removeClass('disabled');
          } else {
            $('#rootwizard').find('.pager .next').show();
            $('#rootwizard').find('.pager .finish').hide();
          }
        }
      });
      $('#rootwizard .finish').click(function() {
        alert('Finished!, Starting over!');
        $('#rootwizard').find("a[href*='tab1']").trigger('click');
      });
    });
  </script>

</body>

</html>