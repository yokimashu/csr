<?php

session_start();

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
                          <li><a href="#tab1" data-toggle="tab">Basic Information</a></li>
                          <li><a href="#tab3" data-toggle="tab">Address</a></li>
                          <li><a href="#tab4" data-toggle="tab">Parent/Guardian</a></li>
                          <li><a href="#tab5" data-toggle="tab">School Attended</a></li>
                          <li><a href="#tab2" data-toggle="tab">Other Information</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div id="bar" class="progress progress-striped active">
                    <div class="bar"></div>
                  </div>
                  <div class="tab-content">

                    <div class="tab-pane" id="tab1">
                      <form id="firsttab">
                        <fieldset>
                          <!-- <legend>Student's Information</legend> -->

                          <div align="center">
                            <?php echo $alert_msg; ?>
                          </div>

                          <div class="span12" id="content">
                            <div class="row-fluid">
                              <div class="span8">
                                <!-- block -->
                                <div class="block">
                                  <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Profile</div>
                                  </div>
                                  <div class="block-content collapse in">
                                    <div class="span12">


                                      <div class="control-group span12">
                                        <label class="control-label" for="focusedInput"
                                          style="display: inline-block;">ID Number: </label>
                                        <div class="controls" style="display: inline-block;">
                                          <input class="input-xlarge focused span20" id="idNumber" type="number" readonly
                                            value="">
                                        </div>
                                      </div>

                                  

                                      
                                      
                                        <div class="control-group span12">
                                          <label class= "control-label"
                                          >Student Status: <span
                                              class="required" >*</span></label>
                                              <div class="controls" >
                                                <select class="span5 m-wrap" id="student_status" name="category">
                                                 <option value="">Please Select&#10240&#10240&#10240&#10240&#10240</option>
                                                 <option value="New">New Student</option>
                                                 <option value="Old">Old Student</option>
                                                 <option value="Transferee">Transferee Student</option>
                                               </select>
                                          </div>
                                        </div>
                                      
                                      <p>
                                          <div class="control-group span12">
                                          <label class="control-label" for="focusedInput"
                                            >First Name: </label>
                                          <div class="controls" >
                                            <input class="input-xlarge focused span5" id="fName" type="text" value="">
                                          </div>
                                          <label class="control-label" for="focusedInput"
                                            >Middle Name: </label>
                                          <div class="controls" >
                                            <input class="input-xlarge focused span5" id="mName" type="text" value="">
                                          </div>
                                          <label class="control-label" for="focusedInput"
                                           >Last Name: </label>
                                          <div class="controls" >
                                            <input class="input-xlarge focused span5" id="lName" type="text" value="">
                                          </div>


                                        </div>
                                      </p>

                                      <p>
                                        <div class="control-group span12">
                                          <label class="control-label" for="date01" >Date
                                            of Birth: </label>
                                          <div class="controls " >
                                            <input class="input-xlarge focused span5" type="date" id="dateOfBirth"
                                              value="">
                                          </div>

                                          <label class="control-label" for="focusedInput"
                                            >Place of Birth:</label>
                                          <div class="controls" >
                                            <input class="input-xlarge focused span5" id="placeOfBirth" type="text"
                                              value="">
                                          </div>

                                          <label class="control-label" for="focusedInput"
                                            >Nationality: </label>
                                          <div class="controls" >
                                            <input class="input-xlarge focused span5" id="nationality" type="text"
                                              value="">
                                          </div>
                                        </div>
                                      </p>

                                      <p>

                                        <div class="control-group span12">

                                          <label class="control-label" >Gender: <span
                                              class="required">*</span></label>
                                          <div class="controls" >
                                            <select class="span5 m-wrap" id="gender" name="category">
                                              <option value="">Please Select&#10240&#10240&#10240&#10240&#10240</option>
                                              <option value="Male">Male</option>
                                              <option value="Female">Female</option>
                                            </select>
                                          </div>

                                          <label class="control-label"
                                            >Status: <span
                                              class="required">*</span></label>
                                          <div class="controls" >
                                            <select class="span5 m-wrap" id="status" name="category">
                                              <option value="">Please Select&#10240&#10240&#10240&#10240&#10240</option>
                                              <option value="Single">Single</option>
                                              <option value="Married">Married</option>
                                              <option value="Widowed">Widowed</option>
                                            </select>
                                          </div>

                                        </div>

                                      </p>

                                      <div class="control-group span5">

                                        <div class="control-group">
                                          <label class="control-label">Contact Number:
                                          </label>
                                          <div class="controls" >
                                            <input class="input-xlarge focused span8" id="contactNumber" type="number"
                                              value="">
                                          </div>
                                          <label class="control-label"
                                           >Facebook Account: </label>
                                          <div class="controls" >
                                            <input class="input-xlarge focused" id="fbAcc" type="text"
                                              placeholder="Optional" value="">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- /block -->

                              <div class="span4">
                                <!-- block -->
                                <div class="block">
                                  <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Upload Photo</div>
                                  </div>
                                  <div class="block-content collapse in">
                                    <div class="span10" style="padding-bottom:30px;margin-left:60px;">
                                      <div class="register-box-body" style="width:300px;margin:auto;">
                                        <input type="hidden" name="image" class="image-tag" id="image-tag">
                                        <img src="../dist/img/no-photo.png" align="center" id="photo"
                                          class="elevation-2"
                                          style="margin-top:20px;margin-left:20px;margin-bottom:20px;width:200px;height:200px"
                                          ; id="image">
                                      </div>
                                      <style>
                                        input[type="file"] {
                                          display: none;

                                        }

                                        .custom-file-upload {
                                          border: 1px solid #ccc;
                                          border-radius: 5px;
                                          display: inline-block;
                                          padding: 7px 12px;
                                          cursor: pointer;
                                        }
                                      </style>
                                      <div style="margin-left:70px">
                                        <label for="fileToUpload" class="custom-file-upload">
                                          <i class="fa icon-download"></i> Import Image
                                        </label>
                                        <input type="file" id="fileToUpload" name="myFile"
                                          class="btn btn-danger custom-file-upload ">
                                      </div>
                                    </div><br>
                                  </div>
                                </div>
                              </div>


                            </div>
                          </div>
                        </fieldset>
                      </form>
                    </div>



                    <!-- /block -->




                    <div class="tab-pane" id="tab2">
                      <form class="form-horizontal" id="secondtab">
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
                              <!-- <label class="uniform">
                              <input class="uniform_on" type="checkbox" id="baptizedYes" value="Yes">
                              Yes
                            </label>
                            <label class="uniform">
                              <input class="uniform_on" type="checkbox" id="baptizedNo" value="No">
                              No
                            </label> -->
                              <div class="controls" style="display: inline-block; margin-left: 15px;">
                                <select class="span12 m-wrap" id="baptized" name="category">
                                  <option selected value="Yes">Yes</option>
                                  <option value="No">No</option>
                                </select>
                              </div>
                            </div>

                          </div>

                          <div class="control-group">
                            <label class="control-label" for="optionsCheckbox">Confirmed? :</label>
                            <div class="controls">
                              <!-- <label class="uniform">
                              <input class="uniform_on" type="checkbox" id="confirmedYes" value="Yes">
                              Yes
                            </label>
                            <label class="uniform">
                              <input class="uniform_on" type="checkbox" id="confirmedNo" value="No">
                              No
                            </label> -->
                              <div class="controls" style="display: inline-block; margin-left: 15px;">
                                <select class="span12 m-wrap" id="confirmed" name="category">
                                  <option selected value="Yes">Yes</option>
                                  <option value="No">No</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </form>
                    </div>

                    <div class="tab-pane" id="tab3">
                      <form class="form-horizontal">
                        <fieldset>
                          <legend>Address</legend>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Street: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="street" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Village/Subdivision: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="subd" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Barangay: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="brgy" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">City: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="city" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Province: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="province" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Region: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="region" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Zip Code: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="zipCode" type="text" value="">
                            </div>
                          </div>



                        </fieldset>
                      </form>
                    </div>

                    <div class="tab-pane" id="tab4">
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
                            <label class="control-label" for="focusedInput">Address: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="parentAddress" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Contact Number: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="parentContactNumber" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Occupation: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="parentOccupation" type="text" value="">
                            </div>
                          </div>

                        </fieldset>
                      </form>
                    </div>

                    <div class="tab-pane" id="tab5">
                      <form class="form-horizontal">
                        <fieldset>
                          <legend>Last School Attended</legend>
                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Elementary School: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="elemSchool" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">High School: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="highSchool" type="text" value="">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="focusedInput">Last College Attended: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="college" type="text" value="">
                            </div>
                          </div>

                        </fieldset>
                      </form>
                    </div>
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
  <script src="../vendors/pixelarity/pixelarity-faceless.js"></script>
  <script src="../assets/scripts.js"></script>
  <script src="../vendors/sweetalert/sweetalert.min.js"></script>

  <script>
    jQuery(document).ready(function () {
      FormValidation.init();
    });


    $(function () {
      $(".datepicker").datepicker();
      $(".uniform_on").uniform();
      $(".chzn-select").chosen();
      $('.textarea').wysihtml5();

      $('#rootwizard').bootstrapWizard({
        onTabShow: function (tab, navigation, index) {
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
      $('#rootwizard .finish').click(function () {

        var students_id = document.getElementById("idNumber").value;
        var first_name = document.getElementById("fName").value;
        var middle_name = document.getElementById("mName").value;
        var last_name = document.getElementById("lName").value;
        var date_of_birth = document.getElementById("dateOfBirth").value;
        var place_of_birth = document.getElementById("placeOfBirth").value;
        var nationality = document.getElementById("nationality").value;
        var gender = document.getElementById("gender").value;
        var status = document.getElementById("status").value;
        var contact_number = document.getElementById("contactNumber").value;
        var facebook_account = document.getElementById("fbAcc").value;
        var religion = document.getElementById("religion").value;
        var baptized = document.getElementById("baptized").value;
        var confirmed = document.getElementById("confirmed").value;
        var street = document.getElementById("street").value;
        var subd = document.getElementById("subd").value;
        var brgy = document.getElementById("brgy").value;
        var city = document.getElementById("city").value;
        var province = document.getElementById("province").value;
        var region = document.getElementById("region").value;
        var zip_code = document.getElementById("zipCode").value;
        var parent_name = document.getElementById("parentName").value;
        var parent_contact_number = document.getElementById("parentContactNumber").value;
        var parent_address = document.getElementById("parentAddress").value;
        var parent_occupation = document.getElementById("parentOccupation").value;
        var elementary_school = document.getElementById("elemSchool").value;
        var high_school = document.getElementById("highSchool").value;
        var last_attended_college = document.getElementById("college").value;
        var student_image = $('#image-tag').val();
        // var docno = $(this).val();
        console.log(contact_number);
        $.ajax({
          type: 'POST',
          data: {
            students_id: students_id,
            first_name: first_name,
            middle_name: middle_name,
            last_name: last_name,
            date_of_birth: date_of_birth,
            place_of_birth: place_of_birth,
            nationality: nationality,
            gender: gender,
            status: status,
            contact_number: contact_number,
            facebook_account: facebook_account,
            religion: religion,
            baptized: baptized,
            confirmed: confirmed,
            street: street,
            subd: subd,
            brgy: brgy,
            city: city,
            province: province,
            region: region,
            zip_code: zip_code,
            parent_name: parent_name,
            parent_contact_number: parent_contact_number,
            parent_address: parent_address,
            parent_occupation: parent_occupation,
            elementary_school: elementary_school,
            high_school: high_school,
            last_attended_college: last_attended_college,
            studentimage: student_image
          },
          url: 'insert_students.php',
          success: function (response) {
           
            
              notification("Congratulations", "The student is successfully saved","Refresh","success","success");

     
          },
          error: function (chr, d, e) {
            console.log("xhr=" + chr.responseText + " b=" + d.responseText + " c=" + e.responseText);
            notification("Opps!", "There is something wrong on your information provided","Close","error","error");
          }


        });


        $('#rootwizard').find("a[href*='tab1']").trigger('click');
      });

    });

    $("#fileToUpload").change(function (e) {

      var img = e.target.files[0];

      if (!pixelarity.open(img, false, function (res) {

          $("#photo").attr("src", res);
          $(".image-tag").attr("value", res);
        }, "jpg", 0.7)) {

        alert("Whoops! That is not an image!");
      }


    });

     //GENERATE NEW ID NUMBER
          $('#fName').change(function() {
                if ($('#idNumber').val() == '') {
                    $.ajax({
                        type: 'POST',
                        data: {},
                        url: 'generate_id.php',
                        success: function(data) {
                            //$('#entity_no').val(data);
                            document.getElementById("idNumber").value = data;
                            console.log(data);
                        }
                    });
                }
            });

            //ADD A SWEETALERTS NOTIFICATION
    function notification(title, message,text,value,status) {
      swal(title, message, status, {
          buttons: {
            catch: {
              text: text,
              value: value,
            }

          },
        })
        .then((value) => {
          switch (value) {

            case "success":
              window.location.reload(true);
              break;
              case "error":

              break;

          }
        });

    }
  </script>

</body>

</html>