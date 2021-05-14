<?php


session_start();

$objid = $students_id = $subjects_id = $prelim = $midterm = $finals = $remarks = $alert_msg = '';
$fname = $mname = $lname = $course = $year_level = $course = $semester = $status = '';
$photo = 'default.jpg';

if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$user_id = $_SESSION['id'];

include('../config/db_config.php');
include ('insert_grades.php');

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
$student_id = $_GET['student_id'];
$obj = $_GET['objid'];
$get_enrolled = "SELECT * from tbl_students s inner join tbl_enrollment e  on s.students_id = e.students_id 
inner join student_image i on s.students_id = i.student_id where s.students_id = :studentid";
$student_data = $con->prepare($get_enrolled);
$student_data->execute([':studentid'  =>  $student_id]);
while($get_info = $student_data->fetch(PDO::FETCH_ASSOC)){
  $objid = $get_info['objid'];
  $students_id  = $get_info['students_id'];
  $fname  = $get_info['first_name'];
  $mname  = $get_info['middle_name'];
  $lname  = $get_info['last_name'];
  $course  = $get_info['course_code'];
  $year_level  = $get_info['year_level'];
  $semester  = $get_info['semester'];
  $status  = $get_info['status'];
  $photo = $get_info['photo'];
}
$get_grades  = "SELECT * FROM tbl_grades where objid =:obj";
$get_grades_record = $con->prepare($get_grades);
$get_grades_record->execute([':obj'  =>  $obj]);
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
            <div class="muted pull-left">Add Grades</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <form class="form-horizontal" role="form" method="post" action="<?php htmlspecialchars("PHP_SELF"); ?>">
                <fieldset>
                  <legend>Grades</legend>




                  <div class="box-body">
                             
                    <div class="row-fluid">

                      <div class="span12">
                        <input type="hidden" readonly id="objectid" value = "<?php echo $obj;?>">
                        <!-- block -->
                        <div class="block">
                          <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Student Info</div>
                          </div>
                          <div class="block-content collapse in">
                          <div class="span2" style="padding-bottom:30px;">
                              <div class="register-box-body" style="width:300px;margin:auto;">

                                <img src="../studentimage/<?php echo $photo;?>" align="center" id="photo" class="elevation-2"
                                  style="margin-top:20px;margin-left:20px;margin-bottom:20px;width:200px;height:200px" ;
                                  id="image">
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
                            </div>
                     
            <div class="span4">

              <div class="control-group">
                <label class="control-label" for="focusedInput">Student ID: </label>
                <div class="controls">
                  <input class="input-xlarge focused" id="id_no" type="text" readonly="" value="<?php echo $students_id;?>">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="focusedInput">First Name: </label>
                <div class="controls">
                  <input class="input-xlarge focused" id="first_name" type="text" readonly="" value="<?php echo $fname;?>">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label" for="focusedInput">Middle Name:</label>
                <div class="controls">
                  <input class="input-xlarge focused" id="middle_name" type="text" readonly="" value="<?php echo $mname;?>">
                </div>
              </div>

              <div class="control-group">
                            <label class="control-label" for="focusedInput">Last Name: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="last_name" type="text" readonly="" value="<?php echo $lname;?>">
                            </div>
                          </div>

              <div class="control-group">
                <label class="control-label" for="focusedInput">Year Level: </label>
                <div class="controls">
                  <input class="input-xlarge focused" id="year_level" type="text" readonly="" value="<?php echo $year_level;?>">
                </div>
              </div>

            </div>

            <div class="span4">
               
            <div class="control-group">
                            <label class="control-label" for="focusedInput">Course:</label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="course" type="text" readonly="" value="<?php echo $course;?>">
                            </div>
                    </div>
                
            

              <div class="control-group">

                <label class="control-label" for="focusedInput">Semester: </label>
                <div class="controls">
                  <input class="input-xlarge focused" id="semester" type="text" readonly="" value="<?php echo $semester;?>">
                </div>
              </div>

            </div>

            <div class="span4">

            <div class="control-group">
                <label class="control-label" for="focusedInput">Status: </label>
                <div class="controls">
                  <input class="input-xlarge focused" id="status" type="text" readonly="" value="<?php echo $status;?>">
                </div>
              </div>
               

                          <div class="control-group" hidden>
                            <label class="control-label" hidden for="focusedInput">objid: </label>
                            <div class="controls">
                              <input class="input-xlarge focused" h id="objid" type="text" readonly="" value="">
                            </div>
                          </div>

              </div>
       

                 
                            <div class="span10">
                              <table cellpadding="0" cellspacing="0" border="0"
                                class="table table-striped table-bordered" id="grades">
                                <thead>

                                  <th>SUBJECT NAME</th>
                                  <th> PRELIM </th>
                                  <th> MIDTERM </th>
                                  <th> FINALS</th>
                                  <th> REMARKS</th>
                                </thead>
                                <tbody id="showgrades">
                                  <tr>
                                  <?php while($view_grades = $get_grades_record->fetch(PDO::FETCH_ASSOC)){ ?>
                                  <td><?php echo $view_grades['descriptive_title'];?></td>
                                  <td contentEditable = "true"><?php echo $view_grades['prelim'];?></td>
                                  <td contentEditable = "true"><?php echo $view_grades['midterm'];?></td>
                                  <td contentEditable = "true"><?php echo $view_grades['finals'];?></td>
                                  <td  contentEditable = "true"><?php echo $view_grades['remarks'];?></td>
                                  </tr>

                                    <?php }?>
                                </tbody>
                              </table>
                            </div>
                          </div>

                        </div>

                      </div>

                    </div>



                  </div><br>

                  <!-- /.box-body -->
                  <div class="box-footer">
                    <input type="submit"  name="save" class="btn btn-primary" id="save"
                      value="Save">
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

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include('../includes/footer.php'); ?>
<script>
  $('#students').DataTable({
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
  // $(document).ready(function() {

  //   $(document).ajaxStart(function() {
  //     Pace.restart()
  //   })

  // });

  // $("#students tbody").on("click", "#showinfo", function () {
  //   event.preventDefault();
  //   var currow = $(this).closest('tr');
  //   var col1 = currow.find('td:eq(0)').text();


  //   $('#objectid').val(col1);
  //   $('#showgrades').load("load_student_grades.php", {
  //       objid: col1
  //     },
  //     function (response, status, xhr) {
  //       if (status == "error") {
  //         alert(msg + xhr.status + " " + xhr.statusText);
  //         console.log(msg + xhr.status + " " + xhr.statusText);
  //         console.log("xhr=" + xhr.responseText);
  //       }


  //     });

  //   $('#photo').load("load_photo.php", {
  //       objid: col1
  //     },
  //     function (response, status, xhr) {
  //       if (status == "error") {
  //         alert(msg + xhr.status + " " + xhr.statusText);
  //         console.log(msg + xhr.status + " " + xhr.statusText);
  //         console.log("xhr=" + xhr.responseText);
  //       }


  //     });

  //   console.log(col1);
  // })
  $('#save').click(function () {

    event.preventDefault();
    console.log("save");
    var objid = '<?php echo $obj;?>';

    $('#grades tr').each(function (row, tr) {
      var col1 = $(tr).find('td:eq(0)').text();
      var col2 = $(tr).find('td:eq(1)').text();
      var col3 = $(tr).find('td:eq(2)').text();
      var col4 = $(tr).find('td:eq(3)').text();
      var col5 = $(tr).find('td:eq(4)').text();
      console.log(col1,col2,col3,col4,col5);
      $.ajax({
        url: 'insert_grades.php',
        data: {
          objid: objid,
          subject: col1,
          prelim: col2,
          midterm: col3,
          final: col4,
          rmrks: col5
        },
        method: 'POST',
        success: function(response) {
          notification('success', 'Grades recorded!');
        },
        error: function(chr, d, e) {
          console.log("xhr=" + chr.responseText + " b=" + d.responseText + " c=" + e.responseText);

        }

      })
    });
  })

  function notification(status, message) {
    swal({
      title: message,
      // text: "You clicked the button!",
      icon: status,
      button: "Ok done!",

    });



  }
</script>


</body>

</html>