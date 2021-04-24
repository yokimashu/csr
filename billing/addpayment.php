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


    <div class="span6" id="content">
      <div class="row-fluid">
        <!-- block -->
        <div class="block">
          <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"></div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">

                <center>
                    <h3>Add Payment</h3>
                    <p id="response"></p>
                    <?php 

                    $id= $_GET['objid'];

                    $sql = "SELECT * FROM tbl_enrollment WHERE objid = '$id'";
                    $res = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($res);

                        $objid =$row['objid'];
                        $students_id = $row['students_id'];
                        $course_code = $row['course_code'];
                        $year_level = $row['year_level'];
                         $semester = $row['semester'];

                        

                     ?>

                     
                      <input type="hidden" name="objid" id="objid" value="<?php echo $objid; ?>">
                      <input type="hidden" name="students_id" id="students_id" value="<?php echo $students_id; ?>">
                      <input type="hidden" name="course_code" id="course_code" value="<?php echo $course_code; ?>">
                      <input type="hidden" name="year_level" id="year_level" value="<?php echo $year_level; ?>">
                      <input type="hidden" name="semester" id="semester" value="<?php echo $semester; ?>">



                  <div class="control-group">
                            <label class="control-label" for="focusedInput">O.R Number</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="orno" id="orno" type="number" >
                            </div>
                  </div>

                  <div class="control-group">
                            <label class="control-label" for="focusedInput">Amount</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="amount" id="amount" type="number"  >
                            </div>
                  </div>

                  <div class="control-group">
                            <label class="control-label" for="focusedInput">Date</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="det" id="det" type="date" required="">
                            </div>
                  </div>

                    <div class="control-group">
                  <label class="control-label">Quarter: <span class="required">*</span></label>
                  <div class="controls">
                    <select class="span5 m-wrap" id ="quarter" name="quarter">
                      <option>Select...</option>
                      <option >Prelim</option>
                      <option >Midterm</option>
                      <option >Final</option>
                      <option >Promisory</option>
                    </select>
                  </div>
                </div>



                 

                 <button class="btn btn-success btn-block" name="submit" id="btn">Save</button>
                 <a href="../billing/studentinfo.php?objid=<?php echo $row['objid']; ?>"><button class="btn btn-danger btn-block" style="margin-top: 10px;">Back</button></a>




                </center>
             
              
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

 <script type="text/javascript">
    
        $(document).ready(function(){

           $('#btn').click(function(){
            var objid= $("#objid").val();  
            var semester= $("#semester").val();
            var students_id= $("#students_id").val();
            var course_code= $("#course_code").val();
            var year_level= $("#year_level").val();
            var orno= $("#orno").val();
            var amount= $("#amount").val();
            var det= $("#det").val();
            var quarter= $("#quarter").val();
         


            $.post("../billing/savepayment.php",{
                objid:objid,
                students_id:students_id,
                course_code:course_code,
                year_level:year_level,
                semester:semester,
                orno:orno,
                amount:amount,
                det:det,
                quarter:quarter

            },

            function(data,status){

                if (data ==="sucess") {

                    $("#response").html("<div class='alert alert-info'>"+data+"</div>");
                }else{

                    $("#response").html("<div class='alert alert-warning'>"+data+"</div>");
                }

            });


           })

        });    

    </script>


<script>
  $('#example2').DataTable({
    'paging': true,
    'lengthChange': true,
    'searching': true,
    'ordering': true,
    'info': true,
    'autoWidth': true
  });

  
</script>
</body>

</html>