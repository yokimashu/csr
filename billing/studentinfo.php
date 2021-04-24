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












  <section class="content">



    <div class="span9" id="content">
      <div class="row-fluid">

          <!-- wizard -->
        <div class="row-fluid section">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">STUDENT INFO</div>
            </div>
            <div class="block-content collapse in">


              <?php 




              $id = $_GET['objid'];

              include('../billing/config/db_config4.php');

                    $sql = "SELECT  tbl_students.students_id, tbl_students.first_name,tbl_students.middle_name,tbl_students.last_name, tbl_enrollment.course_code,tbl_enrollment.year_level,tbl_enrollment.status,tbl_enrollment.course_code,tbl_enrollment.semester,tbl_enrollment.year_level,tbl_enrollment.course_code,tbl_enrollment.objid FROM tbl_students INNER JOIN tbl_enrollment ON tbl_students.students_id = tbl_enrollment.students_id WHERE objid = '$id'  ";

                    $res  = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($res);


                    $students_id = $row['students_id'];
                    $objid = $row['objid'];
                    $year = $row['year_level'];
                    $semester = $row['semester'];
                    $course = $row['course_code'];







               ?>
              
            <div class="span4">
                 <div class="control-group">
                            <label class="control-label" for="focusedInput">FIRST NAME </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="idNumber" type="text" readonly="" value="<?php echo $row['first_name'] ?>">
                            </div>
                  </div>
             


                 <div class="control-group">
                            <label class="control-label" for="focusedInput">STUDENT ID </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="idNumber" type="text" readonly="" value="<?php echo $row['students_id'] ?>">
                            </div>
                          </div>



                 <div class="control-group">
                            <label class="control-label" for="focusedInput">STATUS </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="idNumber" type="text" readonly="" value="<?php echo $row['status'] ?>">
                            </div>
                          </div>
                
             
                
      

             </div>



             <div class="span4">
                 <div class="control-group">
                            <label class="control-label" for="focusedInput">MIDDLE NAME</label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="idNumber" type="text" readonly="" value="<?php echo $row['middle_name'] ?>">
                            </div>
                          </div>


                 <div class="control-group">
                            <label class="control-label" for="focusedInput">YEAR </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="idNumber" type="text" readonly="" value="<?php echo $row['year_level'] ?>">
                            </div>
                          </div>




              
                 <div class="control-group">
                            <label class="control-label" for="focusedInput">SEMESTER </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="idNumber" type="text" readonly="" value="<?php echo $row['semester'] ?>">
                            </div>
                          </div>
                
            

        
                
            </div>

            <div class="span4">
                 <div class="control-group">
                            <label class="control-label" for="focusedInput">LAST NAME </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="idNumber" type="text" readonly="" value="<?php echo $row['last_name'] ?>">
                            </div>
                          </div>



               
                 <div class="control-group">
                            <label class="control-label" for="focusedInput">COURSE</label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="idNumber" type="text" readonly="" value="<?php echo $row['course_code'] ?>">
                            </div>
                    </div>
                
      

              </div>

                

                

                


     
              </div>


            <?php     ?>





              </div>
            </div>
          </div>
          <!-- /block -->
       

        <!-- block -->
        <div class="block">
          <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Subjects Taken</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">
              <div class="table-toolbar">
               
              </div>

              <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="example2">
                <thead>
                  <tr>
                    <th> SUBJECT CODE</th>
                    <th> DESCRIPTION</th>
                    <th> UNITS </th>
                    <th> DAYS</th>
                    <th> TIME</th>
                    <th>ROOM </th>
                     
                  </tr>
                </thead>
                <tbody>
                    <?php 

                    include('../billing/config/db_config4.php');

                    $sql = "SELECT * FROM tbl_enrollment_item WHERE objid ='$objid' and year = '$year' and semester = '$semester' ";

                    $res  = mysqli_query($conn,$sql);


               
                        while ($row = mysqli_fetch_array($res)) {

                   
                        
                     ?>
                     <tr>
                         <td><?php echo $row['subject_code'] ?></td>
                         <td><?php echo $row['descriptive_title'] ?></td>
                         <td><?php echo $row['units'] ?></td>
                         <td><?php echo $row['days'] ?></td>
                         <td><?php echo $row['time'] ?></td>
                         <td><?php echo $row['room'] ?></td>
                         


                     </tr>
                     
                              



                 <?php } ?>


                    
                </tbody>
                <tfoot> 

                    <tr>

                        <th></th>
                        <th>TOTAL NUMBER OF UNITS</th>
                        <th> 
                          <?php 

                          $sql = "SELECT sum(units)  as sum from tbl_enrollment_item WHERE objid = '$id' and year = '$year' and semester = '$semester'";

                           $res  = mysqli_query($conn,$sql);

                           $row = mysqli_fetch_assoc($res);

                          

                           echo $row['sum'];

                           



                           ?>




                         </th>
                         <th></th>


                    </tr>

                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /block -->

         <div class="row-fluid section">
          <!-- block -->
          <div class="span4">

          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">ASSESSMENT</div>
            </div>
            <div class="block-content collapse in">
              
             

             

                 <div class="span12">
                  <center>
                           <?php 

                           $id2 = $_GET['objid'];

                          $sql = "SELECT sum(units)  as sum from tbl_enrollment_item WHERE objid = '$id' and year = '$year' and semester = '$semester'";

                           $res  = mysqli_query($conn,$sql);

                           $row = mysqli_fetch_assoc($res);

                           $units = $row['sum'];

                           

                           
                           $sql2  = "SELECT * FROM tbl_units";

                           $res2 = mysqli_query($conn,$sql2);

                           $row2  =mysqli_fetch_array($res2);

                           $price = $row2['price'];

                           $total = $units * $price;

                           $sql3="SELECT * FROM assessment WHERE stud_id = '$students_id' and course = '$course' and year ='$year' and semester = '$semester'";

                           $res3 = mysqli_query($conn,$sql3);
                           $row3 = mysqli_fetch_array($res3);

                           $ass_id = $row3['id'];
                           $total2 = $row3['total'];

                           ?>

                 <div class="control-group">

                                  <input type="hidden" name="objid" id="objid" value="<?php echo $id2; ?>">
                                  <input type="hidden" name="semester" id="semester" value="<?php echo $semester; ?>">
                                  <input type="hidden" name="students_id" id="students_id" value="<?php echo $students_id; ?>">
                                 <input type="hidden" name="course" id="course" value="<?php echo $course; ?>">
                                 <input type="hidden" name="year" id="year" value="<?php echo $year; ?>">


                            <label class="control-label" for="focusedInput">Tuition Fees</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="tuition" id="tuition" type="number" value="<?php echo $total ?>" onkeyup="AddInputs()" >
                            </div>
                 </div>

                 <div class="control-group">
                            <label class="control-label" for="focusedInput">Misc Fees</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="misc" id="misc" type="number" onkeyup="AddInputs()" value="<?php echo $row3['misc'] ?>">
                            </div>
                 </div>

                   <div class="control-group">
                            <label class="control-label" for="focusedInput">Other Fees</label >

                            <div class="controls">
                              <input class="input-xlarge focused" name="other" id="other" type="number" onkeyup="AddInputs()" value="<?php echo $row3['others'] ?>" >
                            </div>
                  </div>

                   <div class="control-group">
                            <label class="control-label" for="focusedInput">Comp Fees</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="comp" id="comp" type="number" onkeyup="AddInputs()" value="<?php echo $row3['comp'] ?>">
                            </div>
                  </div>

                  <div class="control-group">
                            <label class="control-label" for="focusedInput">Speech Fees</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="speech" id="speech" type="number" onkeyup="AddInputs()" value="<?php echo $row3['speech'] ?>">
                            </div>
                  </div>

                  <div class="control-group">
                            <label class="control-label" for="focusedInput">NSTP</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="nstp" id="nstp" type="number" onkeyup="AddInputs()" value="<?php echo $row3['nstp'] ?>">
                            </div>
                  </div>

                  <div class="control-group">
                            <label class="control-label" for="focusedInput">Other Fees</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="other2" id="other2" type="number" onkeyup="AddInputs()" value="<?php echo $row3['others2'] ?>">
                            </div>
                  </div>
                  <h3  style="float: left">TOTAL</h3>
                 
                  <?php if ($total2 > 0) {

                    ?>

                    <h3  style='float: right'><?php echo $total2?></h3>
                    <?php
                          }else{

                            ?>
                        
                            <h3 id='sum' style='float: right'></h3>

                            <?php
                          }
                  ?>
                  
                   <?php 

                   if ($total2 > 0) {
                     
                    echo " <a href='../billing/updateassessment.php?id=$ass_id'><button class='btn btn-success btn-block'>Update</button></a>";

                    }else{

                      echo " <button class='btn btn-success btn-block' name='submit' id='btn'>Save</button>";

                    }

                    
                    ?>
                      
                    
                   
                  <br>
                   <span id="response"></span>



                  </center>
                
                 </div>

                

                
               
                

     
              </div>









              </div>
          
         </div>


             <!-- block -->
          <div class="span8">

          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">Payments</div>
               <div class="muted pull-right">Year Level&nbsp:&nbsp<?php echo $year ?>&nbsp&nbsp|&nbsp Semester: <?php echo $semester ?></div>
               <!-- Button trigger modal -->
        


            </div>
           
            <div class="block-content collapse in">
              
            
              <div class="span12">
              <div class="table-toolbar">
               <a href="../billing/addpayment.php?objid=<?php echo $id; ?>"> <button type="button" class="btn btn-primary"   style="margin-bottom:20px;">
          ADD PAYMENT   
               </button></a>
               
              </div>

              <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="example2">
                <thead>
                  <tr>
                    <th>OR.NUMBER</th>
                    <th> AMOUNT</th>
                    <th> DATE </th>
                    <th> QUARTER</th>
                    <th> ACTIONS</th>
                
                     
                  </tr>
                </thead>
                <tbody>


                    <?php 

                  

                    $sql = "SELECT * FROM payments WHERE stud_id ='$students_id' and year = '$year' and semester = '$semester' ";

                    $res  = mysqli_query($conn,$sql);


               
                        while ($row = mysqli_fetch_array($res)) {
                        


                
                        
                     ?>
                     <tr>
                         <td><?php echo $row['orno'] ?></td>
                         <td><?php echo "&#8369".' '. $row['amount'] ?></td>
                         <td><?php echo $row['det'] ?></td>
                         <td><?php echo $row['quarter'] ?></td>
                          <td><a class="btn btn-primary" href="../billing/updatepayment.php?id=<?php echo $row['id']; ?>"><i class="icon-edit"></i></td>
                        
         

                     </tr>
 

                 <?php } ?>


                    
                </tbody>
               
              </table>
            </div>
             

              </div>
              </div>


                 <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">Payment Summary</div>
               <div class="muted pull-right">Year Level&nbsp:&nbsp<?php echo $year ?>&nbsp&nbsp|&nbsp Semester: <?php echo $semester ?></div>
               <!-- Button trigger modal -->
        


            </div>
           
            <div class="block-content collapse in">
              
            
              <div class="span12">
              <div class="table-toolbar">
              
               
              </div>

              <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="example2">
                <thead>
                  <tr>
                    <th>TOTAL TUITION FEE</th>
                    <th> </th>
                    <th>PAYMENT TOTAL</th>
                    <th></th>
                    <th> REMAINING BALANCE</th>
                    <th>STATUS</th>
                
                     
                  </tr>
                </thead>
                <tbody>


                    <?php 

                  

                    $sql = "SELECT * FROM assessment WHERE stud_id ='$students_id' and year = '$year' and semester = '$semester' ";

                                $res  = mysqli_query($conn,$sql);
                                $row2 = mysqli_fetch_array($res);

                                        $tuition = $row2['total'];
                                        $stud_id = $row2['stud_id'];
                                        $course = $row2['course'];
                                        $year = $row2['year'];
                                        $sem = $row2['semester'];
                        
                          $sql2 = mysqli_query($conn,"SELECT SUM(amount) as sum from payments WHERE stud_id = '$stud_id' and course ='$course' and year = '$year' and semester = '$sem'");
                                    $row = mysqli_fetch_assoc($sql2);
                                  
                                  $sum = $row['sum'];
                                    

                                    $balance = ($tuition - $row['sum']);

                
                        
                     ?>
                     <tr>
                         <td><?php echo "&#8369".' '. $tuition ?></td>
                         <td></td>
                         <td><?php echo  "&#8369".' '. $sum ?></td>
                         <td></td>
                          <td><?php echo  "&#8369".' '. $balance; ?></td> 
                          <td>
                            <?php 

                            if ($sum == 0) {
                              echo "UNPAID";
                            }elseif ($sum > 0 && $sum < $tuition) {
                              echo "PARTIALLY PAID";
                            }elseif ($sum >= $tuition) {
                              echo "FULLY PAID";
                            }


                             ?>



                          </td>
                        
         

                     </tr>
 

                 <?php ?>


                    
                </tbody>
               
              </table>
            </div>
             

              </div>
              </div>


          
         </div>

          </div>

          </div>





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
    
    function AddInputs(){

         const num1 = document.querySelector('#tuition').value;
         const num2 = document.querySelector('#misc').value;
         const num3 = document.querySelector('#other').value;
         const num4 = document.querySelector('#comp').value;
         const num5 = document.querySelector('#speech').value;
         const num6 = document.querySelector('#nstp').value;
         const num7 = document.querySelector('#other2').value;

        document.querySelector('#sum').innerHTML = Number(num1) + Number(num2) + Number(num3) + Number(num4) + Number(num5) +  Number(num6) + Number(num7);


    };




        $(document).ready(function(){

           $('#btn').click(function(){
            var objid= $("#objid").val();
            var semester= $("#semester").val();
            var students_id= $("#students_id").val();
            var course= $("#course").val();
            var year= $("#year").val();
            var tuition= $("#tuition").val();
            var misc= $("#misc").val();
            var other= $("#other").val();
            var comp= $("#comp").val();
            var speech= $("#speech").val();
            var nstp= $("#nstp").val();
            var other2= $("#other2").val();


            $.post("../billing/saveassessment.php",{

                 objid:objid,
                semester:semester,
                students_id:students_id,
                course:course,
                year:year,
                tuition:tuition,
                misc:misc,
                other:other,
                comp:comp,
                speech:speech,
                nstp:nstp,
                other2:other2

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

<script type="text/javascript">
  
 
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

  $(document).on('click', 'button[data-role=confirm_delete]', function (event) {
    event.preventDefault();
    var user_id = ($(this).data('id'));
    $('#user_id').val(user_id);
    $('#deleteuser_Modal').modal('toggle');
  })
</script>
</body>

</html>