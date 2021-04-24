<?php
include('../billing/config/db_config4.php');

session_start();    


?>

<!DOCTYPE html>
<html class="no-js">


<?php
include('../billing/includes/header2.php');
include('../billing/includes/sidebar2.php');

?>


<div class="content-wrapper">
  <div class="content-header"></div>



  <section class="content">


    <div class="span9" id="content">
      <div class="row-fluid">
        <!-- block -->
        <div class="block">
          <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">List of Students</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
                
                <div class="btn-group pull-right">
                  <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Print</a></li>
                    <li><a href="#">Save as PDF</a></li>
                    <li><a href="#">Export to Excel</a></li>
                  </ul>
                </div>
              </div>

              <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="example2">
                <thead>
                  <tr>
                    <th> STUD I.D</th>
                    <th> FIRST NAME</th>
                    <th> MIDDLE NAME</th>
                    <th> LAST NAME</th>
                    <th> YEAR LEVEL</th>
                    <th>STATUS</th>
                    <th> OPTIONS</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 

                    include('../billing/config/db_config4.php');

                    $sql = "SELECT  tbl_students.students_id, tbl_students.first_name,tbl_students.middle_name,tbl_students.last_name, tbl_enrollment.course_code,tbl_enrollment.year_level,tbl_enrollment.status,tbl_enrollment.objid FROM tbl_students INNER JOIN tbl_enrollment ON tbl_students.students_id = tbl_enrollment.students_id WHERE course_code  = 'BSTM'  ";

                    $res  = mysqli_query($conn,$sql);


               
                        while ($row = mysqli_fetch_array($res)) {

                   
                        
                     ?>
                     <tr>
                         <td><?php echo $row['students_id'] ?></td>
                         <td><?php echo $row['first_name'] ?></td>
                         <td><?php echo $row['middle_name'] ?></td>
                         <td><?php echo $row['last_name'] ?></td>
                         <td><?php echo $row['year_level'] ?></td>
                         <td><?php echo $row['status'] ?></td>
                         <td><a class="btn btn-primary" href="studentinfo.php?objid=<?php echo $row['objid']; ?>"><i class="icon-search"></i></td>

                     </tr>





                 <?php } ?>
                    
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
<?php include('../billing/includes/footer2.php'); ?>
</div>


<script>
  $('#example2').DataTable({
    'paging': true,
    'lengthChange': true,
    'searching': true,
    'ordering': true,
    'info': true,
    'autoWidth': true
  });

  $(document).on('click', 'button[data-role=confirm_delete]', function (event) {
    event.preventDefault();
    var user_id = ($(this).data('id'));
    $('#user_id').val(user_id);
    $('#deleteuser_Modal').modal('toggle');
  })
</script>
</body>

</html>