<?php


session_start();

$idno = $subjects_description = $units = $course_code = $year_level = $semester = $pre_requisites = $alert_msg = '';


$btnNew = 'disabled';
$btnStatus = 'enabled';

if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$user_id = $_SESSION['id'];

include('../config/db_config.php');
include('insert_subjects.php');
include('../includes/sql.php');

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
            <div class="muted pull-left">Enroll Students</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <form class="form-horizontal" role="form" id="enroll_student" method="post" action="<?php htmlspecialchars("PHP_SELF"); ?>">
                <fieldset>
                  <legend>Details</legend>

                  <div class="control-group">
                    <label class="control-label" for="select01">Search Student:</label>
                    <div class="controls">
                      <select id="search_student" name="student" class="chzn-select span5">
                        <option selected="selected">Please select...</option>
                        <?php while ($get_student = $get_all_students_data->fetch(PDO::FETCH_ASSOC)) { ?>
                          <option value="<?php echo
                                          $get_student['students_id']; ?>">
                            <?php echo $get_student['first_name'] . ' ' . $get_student['middle_name'] . ' ' . $get_student['last_name']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>


               
                    <!-- <div class="control-group" hidden>
                      <label class="control-label" for="focusedInput">ID No.</label>
                      <div class="controls">
                        <input type="text" class="form-control" name="idno" value="<?php echo $idno; ?>" required>
                      </div>
                    </div> -->

                    <div class="control-group">
                      <label class="control-label" for="select01">Course</label>
                      <div class="controls">
                        <select id="course" name="course_code" class="chzn-select span5">
                          <option selected="selected">Please select...</option>
                          <?php while ($get_courses = $get_all_courses_data->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo
                                            $get_courses['courses_id']; ?>"><?php echo $get_courses['courses']; ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="select01">Year Level</label>
                      <div class="controls">
                        <select id="level" name="year_level" class="chzn-select span5">
                          <option selected="selected">Please select...</option>
                          <?php while ($get_level = $get_all_levels_data->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo
                                            $get_level['code']; ?>"><?php echo $get_level['year_level']; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="select01">Semester</label>
                      <div class="controls">
                        <select id="semester" name="semester" class="chzn-select span5">
                          <option selected="selected">Please select...</option>
                          <?php while ($get_semester = $get_all_semesters_data->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo
                                            $get_semester['code']; ?>"><?php echo $get_semester['semester']; ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>


                



                  <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                      <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">SUBJECTS</div>
                      </div>


                      <div class="block-content collapse in">
                        <div class="span12">

                          <div class="control-group">
                            <label class="control-label" for="select01">Add Custom Subject</label>
                            <div class="controls">
                              <select id="custom_subjects" name="custom_subjects" class="chzn-select span5">
                                <option selected="selected">Please select...</option>
                                <?php while ($get_subjects = $get_all_subjects_data->fetch(PDO::FETCH_ASSOC)) { ?>
                                  <option value="<?php echo
                                                  $get_subjects['subjects_id']; ?>"><?php echo $get_subjects['subjects_description']; ?>
                                  </option>
                                <?php } ?>
                              </select>
                              <button class="btn btn-primary" id="add_subject">Add</button>
                            </div>
                            </div>

                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="subjects">
                              <thead>
                                <tr>
                                  <th>Subject Code</th>
                                  <th>Descriptive Title</th>
                                  <th>No. of Units</th>
                                  <th>Days</th>
                                  <th>Time</th>
                                  <th>Room</th>
                                  <th>Options</th>
                                </tr>
                              </thead>
                              <tbody id="list_subjects">

                              </tbody>



                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- /block -->
                    </div>

                  </div><br>

                  <!-- /.box-body -->
                  <div class="box-footer">
                    <input type="submit" <?php echo $btnNew; ?> name="add" id="new" class="btn btn-primary" value="New">
                    <input type="submit" <?php echo $btnStatus; ?> name="save" id="save" class="btn btn-primary" value="Save">
                    <a href="list_enrollment.php">
                      <input type="button" name="cancel" class="btn btn-default" value="Cancel">
                    </a>
                  </div>
                  </div>
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

<script>
  $('#semester').on('change', function() {

    var course = $('#course').val();
    var level = $('#level').val();
    var semester = $('#semester').val();
    console.log(course);
    console.log(level);
    console.log(semester);
    $('#list_subjects').load("load_subjects.php", {
        course: course,
        level: level,
        semester: semester
      },
      function(response, status, xhr) {
        if (status == "error") {
          alert(msg + xhr.status + " " + xhr.statusText);
          console.log(msg + xhr.status + " " + xhr.statusText);
          console.log("xhr=" + xhr.responseText);
        }


      });


  });


  $('#save').click(function() {
    event.preventDefault();
    console.log("hello");

    var idno = $('#search_student').val();
    var course = $('#course').val();
    var yearlevel = $('#level').val();
    var semester = $('#semester').val();


    $.ajax({
      url: "insert_enrolle.php",
      method: 'POST',
      dataType: 'json',
      data: {
        idno: idno,
        course: course,
        yearlevel: yearlevel,
        semester: semester
      },
      error: function(xhr, b, c) {
        console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
      }





    });
    $('#subjects tr').each(function(row, tr) {


      var col1 = $(tr).find('td:eq(0)').text();
      var col2 = $(tr).find('td:eq(1)').text();
      var col3 = $(tr).find('td:eq(2)').text();
      var col4 = $(tr).find('td:eq(3)').text();
      var col5 = $(tr).find('td:eq(4)').text();
      var col6 = $(tr).find('td:eq(5)').text();
      console.log(col1);
      console.log(col6);
      $.ajax({

        url: 'insert_enrolle_item.php',
        method: 'POST',
        data: {
          idno: idno,
          subcode: col1,
          deptitle: col2,
          units: col3,
          days: col4,
          time: col5,
          sroom: col6,
        },
        success: function(response) {
          var result = jQuery.parseJSON(response);

          if (result == "You successfully enrolled new student!") {
            notification('success', result);
            $("#save").attr("disabled", true);
            $("#new").attr("disabled", false);
            // reset_form_input('enroll_student');

          } else {
            notification('error', result);
            $("#save").attr("disabled", false);
            $("#new").attr("disabled", true);
          }
        },
        error: function(chr, d, e) {
          console.log("xhr=" + chr.responseText + " b=" + d.responseText + " c=" + e.responseText);

        }
      })


    });


  });
  // reset the elements inside the form
  function reset_form_input(form_id) {
    $('#' + form_id).each(function() {
      this.reset();
    });
  }

  function deleteRow(r) {
    // DELETE SELECTED ROW
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("subjects").deleteRow(i);
  }

  $('#add_subject').click(function() {
    event.preventDefault();
    var subject_id = $('#custom_subjects').val();
    console.log(subject_id);
    $.ajax({
      url: 'get_subject_details.php',
      type: 'POST',
      data: {
        id: subject_id
      },
      success: function(response) {
        var result = jQuery.parseJSON(response);
        var table = document.getElementById("subjects");
        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);
        var cell7 = row.insertCell(6);
        console.log(result.subjects_id);
        cell1.innerHTML = result.subjects_id;
        cell2.innerHTML = result.subjects_description;
        cell3.innerHTML = result.units;
        cell4.innerHTML = result.days;
        cell5.innerHTML = result.time;
        cell6.innerHTML = result.room_description;
        cell7.innerHTML = '<button class="btn btn-outline-success btn-sm " id = "remove" data-placement="top" title="Remove Subject"  onclick = "deleteRow(this)"> <i class="fa icon-remove"></i></button>';
      },
      error: function(chr, d, e) {
        console.log("xhr=" + chr.responseText + " b=" + d.responseText + " c=" + e.responseText);
      }
    })

  });

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