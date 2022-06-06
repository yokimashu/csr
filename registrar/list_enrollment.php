<?php

session_start();
include('../config/db_config.php');

$btnNew = 'disabled';
if (!isset($_SESSION['id'])) {
  header('location:../index');
}
$students_id = $surname = $first_name = $middle_name = $course = $student_year_level =  '';

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

// //querry to select current user's information
// $get_students_sql = "SELECT * FROM tbl_students WHERE students_id = :id";
// $get_students_data = $con->prepare($get_students_sql);
// $get_students_data->execute([':id' => $students_id]);
// while ($result = $get_students_data->fetch(PDO::FETCH_ASSOC)) {
//   $students_id   = $result['students_id'];
//   $students_surname  = $result['surname'];
//   $students_first_name   = $result['first_name'];
//   $students_middle_name   = $result['middle_name'];
//   $students_course   = $result['course'];
//   $student_year_level   = $result['students_year_level'];
// }

$get_all_students_sql = "SELECT e.objid, s.`students_id`, s.`first_name`, s.`middle_name`, s.`last_name`, e.`course_code`, s.`status`, e.`year_level`, e.`semester`, e.status 
FROM tbl_students s INNER JOIN tbl_enrollment e ON e.`students_id` = s.`students_id` ORDER BY s.students_id ASC ";
$get_all_students_data = $con->prepare($get_all_students_sql);
$get_all_students_data->execute();


?>

<!DOCTYPE html>
<html>


<!-- Left side column. contains the logo and sidebar -->

<?php
include('../includes/header.php');
include('../includes/sidebar.php');
?>


<div class="content-wrapper">
  <div class="content-header"></div>



  <section class="content">


    <div class="span9" id="content">
      <div class="row-fluid">
        <!-- block -->
        <div class="block">
          <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">List of Enrolled Students</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
                <div class="btn-group">
                  <a href="enroll_student.php"><button class="btn btn-success">Enroll Student <i class="icon-plus icon-white"></i></button></a>
                </div><br>
              </div>
              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                <thead>
                  <tr>
                    <th> TRANSACTION ID</th>
                    <th> ID #</th>
                    <th> LAST NAME </th>
                    <th> FIRST NAME </th>
                    <th> MIDDLE NAME</th>
                    <th> COURSE </th>
                    <th> YEAR</th>
                    <th> STATUS</th>
                    <th> OPTIONS</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($students_data = $get_all_students_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <tr style="font-size: 1rem">
                      <td><?php echo $students_data['objid']; ?> </td>
                      <td><?php echo $students_data['students_id']; ?> </td>
                      <td><?php echo $students_data['last_name']; ?> </td>
                      <td><?php echo $students_data['first_name']; ?> </td>
                      <td><?php echo $students_data['middle_name']; ?> </td>
                      <td><?php echo $students_data['course_code']; ?> </td>
                      <td><?php echo $students_data['year_level']; ?> </td>
                      <td><?php echo $students_data['status']; ?> </td>


                      <td>
                        <a class="btn btn-primary" href="edit_enrollment.php?students_id=<?php echo
                          $students_data['students_id']; ?>"><i class="icon-edit"></i>
                        </a>
                        <!-- &nbsp; -->
                      <button class = " btn btn-success" id = "approve_enrolle" ><i class = "icon-check"></i></button>
                      </td>


                    </tr>
                  <?php   } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /block -->
  </section>







</div>
</div>
</div>
</div>
<hr>

<!-- footer here -->
<?php include('../includes/footer.php'); ?>
</div>

<script>
  // $('#example2').DataTable({
  //   'paging': true,
  //   'lengthChange': true,
  //   'searching': true,
  //   'ordering': true,
  //   'info': true,
  //   'autoWidth': true
  // })
  // $(document).on('click', 'button[data-role=confirm_delete]', function(event) {
  //   event.preventDefault();
  //   var students_id = ($(this).data('id'));
  //   $('#students_id').val(students_id);
  //   $('#deleteuser_Modal').modal('toggle');
  // })

  $("#example2 tbody").on("click", "#approve_enrolle", function() {
      event.preventDefault();
      var currow = $(this).closest("tr");
      var transId = currow.find("td:eq(0)").text();
    console.log(transId);

        $.ajax({
          type:"POST",
          url:"accept_enrolle.php",
          data:{id:transId},
          success:function(){
            notification("Student Enrolled !", "You have succesfully enrolled the student.","Refresh","success","success");
          },
          error: function(chr, d, e) {
          console.log("xhr=" + chr.responseText + " b=" + d.responseText + " c=" + e.responseText);

        }



        })

    });

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