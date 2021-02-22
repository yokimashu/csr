<?php


$fname = $mname = $lname = $contact_number = $email = $uname = $upass = $btnStatus = $department = $alert_msg = '';
$btnNew = 'disabled';

if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$user_id = $_SESSION['id'];

include('../config/db_config.php');
// include ('insert_students.php');

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
                          <li><a href="#tab3" data-toggle="tab">Step 4</a></li>
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
                        <legend>Student's Information</legend>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">ID Number: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="idNumber" type="number" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">First Name: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="fName" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Middle Name: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="mName" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Last Name: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="lName" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                                          <label class="control-label" for="date01">Date of Birth: </label>
                                          <div class="controls">
                                            <input type="date"  id="dateOfBirth" value="">
                                          </div>
                                        </div>
                                        
                          
                            <div class="control-group">
                            <label class="control-label" for="focusedInput">Place of Birth: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="placeOfBirth" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Nationality: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="nationality" type="text" value="">
                            </div>
                          </div>


                          <div class="control-group">
  								<label class="control-label">Gender: <span class="required">*</span></label>
  								<div class="controls">
  									<select class="span6 m-wrap" id ="gender" name="category">
  										<option value="">Select...</option>
  										<option value="Male">Male</option>
  										<option value="Female">Female</option>
  									</select>
  								</div>
                </div>
                        

                          <div class="control-group">
  								<label class="control-label">Status: <span class="required">*</span></label>
  								<div class="controls">
  									<select class="span6 m-wrap" id ="status" name="category">
  										<option value="">Select...</option>
  										<option value="Single">Single</option>
  										<option value="Married">Married</option>
  										<option value="Widowed">Widowed</option>
  									</select>
  								</div>
                </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Home Address: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="homeAddress" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Provincial Address: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="provincialAddress" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Contact Number: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="contactNumber" type="number" value="">
                            </div>
                          </div>

                          <!-- <div class="control-group">
                            <label class="control-label" for="focusedInput">Parent/Guardian: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="parent" type="text" value="">
                            </div>
                          </div> -->

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Facebook Account: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="fbAcc" type="text" placeholder="Optional" value="">
                            </div>
                          </div>

                        </fieldset>
                      </form>
                    </div>

                    <div class="tab-pane" id="tab2">
                      <form class="form-horizontal">
                        <fieldset>
                          <legend>Other Info</legend>
                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Religion: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="religion" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox">Baptized? :</label>
                                          <div class="controls">
                                            <label class="uniform" >
                                              <input class="uniform_on" type="checkbox" id="baptizedYes" value="Yes">
                                              Yes
                                            </label>
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" id="baptizedNo" value="No">
                                              No
                                            </label>
                                          </div>
                                          
                                        </div>

                                        <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox">Confirmed? :</label>
                                          <div class="controls">
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" id="confirmedYes" value="Yes">
                                              Yes
                                            </label>
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" id="confirmedNo" value="No">
                                              No
                                            </label>
                                          </div> 
                                        </div>
                        </fieldset>
                      </form>
                    </div>

                    <div class="tab-pane" id="tab3">
                      <form class="form-horizontal">
                        <fieldset>
                          <legend>Parent/Guardian Information</legend>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Parent Name: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="parentName" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Contact Number: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="parentContactNumber type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Address: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="parentAddress type="text" value="">
                            </div>
                          </div>

                        </fieldset>
                      </form>
                    </div>

                    <div class="tab-pane" id="tab4">
                      <form class="form-horizontal">
                        <fieldset>
                          <legend>Academic Background</legend>

                          <div class="control-group">
                                          <label class="control-label" for="optionsCheckbox">Confirmed? :</label>
                                          <div class="controls">
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" id="confirmedYes" value="Yes">
                                              Yes
                                            </label>
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" id="confirmedNo" value="No">
                                              No
                                            </label>
                                          </div> 
                                        </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">High School: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="highSchool" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Last Attended College/University: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="college" type="text" value="">
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
  <!-- <div class="box-footer">
    <input type="submit" <?php echo $btnNew; ?> name="add" class="btn btn-primary" value="New">
    <input type="submit" <?php echo $btnStatus; ?> name="insert" class="btn btn-primary" value="Save">
    <a href="list_students.php">
      <input type="button" name="cancel" class="btn btn-default" value="Cancel">
    </a>
  </div> -->
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
    jQuery(document).ready(function() {   
       FormValidation.init();
    });


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

        var students_id = document.getElementById("idNumber").value;
        var first_name = document.getElementById("fName").value;
        var middle_name = document.getElementById("mName").value;
        var last_name = document.getElementById("lName").value;
        var date_of_birth = document.getElementById("dateOfBirth").value;
        var place_of_birth = document.getElementById("placeOfBirth").value;
        var nationality = document.getElementById("nationality").value;
        var gender = document.getElementById("gender").value;
        var status = document.getElementById("status").value;
        var home_address = document.getElementById("homeAddress").value;
        var provincial_address = document.getElementById("provincialAddress").value;
        var contact_number = document.getElementById("contactNumber").value;
        var facebook_account = document.getElementById("parent").value;
        var religion = document.getElementById("religion").value;
        var baptized = document.getElementById("baptizedYes").value;
        var baptized = document.getElementById("baptizedNo").value;
        var confirmed = document.getElementById("confirmedYes").value;
        var confirmed = document.getElementById("confirmedNo").value;
        var parent_name = document.getElementById("parentName").value;
        var parent_contact_number = document.getElementById("parentContactNumber").value;
        var parent_address = document.getElementById("parentAddress").value;
        var elementary_school = document.getElementById("elemSchool").value;
        var high_school = document.getElementById("highSchool").value;
        var last_attended_college = document.getElementById("college").value;

        var docno = $(this).val();
            $.ajax({
              type:'POST',
              data:{students_id:students_id,first_name:first_name,middle_name:middle_name,last_name:last_name,date_of_birth:date_of_birth,place_of_birth:place_of_birth,nationality:nationality,gender:gender,status:status,home_address:home_address,provincial_address:provincial_address,contact_number:contact_number,facebook_account:facebook_account,religion:religion,baptized:baptized,baptized:baptized,confirmed:confirmed,parent_name:parent_name,parent_contact_number:parent_contact_number,parent_address:parent_address,elementary_school:elementary_school,high_school:high_school,last_attended_college:last_attended_college},
              url:'insert_students.php',
               success:function(data){
              
                   alert (data);
               }
            
                 
                });           
     
                
  
             
             
        alert('Finished!, Starting over!');
        $('#rootwizard').find("a[href*='tab1']").trigger('click');
      });
    });
  </script>

</body>

</html>