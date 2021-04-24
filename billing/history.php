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
              <div class="muted pull-left">SEARCH STUDENT</div>
            </div>
            <div class="block-content collapse in">


              <form method="POST"  id="hide">


            <div class="span4">
               <div class="control-group">
                            <label class="control-label" for="focusedInput">STUDENT ID </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="students_id" name="students_id" type="text"  required="" >
                            </div>
                  </div>
             


               
             
                
      

             </div>



             <div class="span4">
                 <div class="control-group">
                            <label class="control-label" for="focusedInput">YEAR LEVEL</label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="year_level" name="year_level" type="text"  required="" >
                            </div>
                          </div>


            

        
                
            </div>

            <div class="span4">
                 <div class="control-group">
                            <label class="control-label" for="focusedInput">SEMESTER </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="semester" name="semester" type="text" required=""  >
                            </div>
                          </div>

                  </div>


                     <span id="result"></span> 


                  <button class="btn btn-success" type="submit" name="submit" id="btn2">Search</button>

               </form>
                
                


              </div>

                

    

                






              </div>
            </div>


         <div class="block" id="info" >
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">STUDENT INFO</div>
            </div>
            <div class="block-content collapse in">
         <?php 


include('../billing/config/db_config4.php');

if (isset($_POST['submit'])) {

  $stud_id = $_POST['students_id'];
  $year_level = $_POST['year_level'];
  $semester = $_POST['semester'];
  
$sql = "SELECT tbl_students.students_id,tbl_students.first_name,tbl_students.middle_name,tbl_students.last_name,tbl_enrollment.students_id,tbl_enrollment.course_code,tbl_enrollment.year_level,tbl_enrollment.semester,tbl_enrollment.status FROM tbl_students INNER JOIN tbl_enrollment ON tbl_students.students_id = tbl_enrollment.students_id WHERE tbl_students.students_id = '$stud_id'  ";

          $res  = mysqli_query($conn,$sql);
       while ($row= mysqli_fetch_array($res)) {

          $name  =$row['first_name'];
          $stud  =$row['students_id'];

        ?>
         
            <div class="span4" >
                 <div class="control-group">
                            <label class="control-label" for="focusedInput">FIRST NAME </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="first_name" type="text" readonly="" value="<?php echo $row['first_name'] ?>" >
                            </div>
                  </div>
             


                 <div class="control-group">
                            <label class="control-label" for="focusedInput">STUDENT ID </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="stud_id" type="text" readonly=""  value="<?php echo $row['students_id'] ?>" >
                            </div>
                          </div>



                 <div class="control-group">
                            <label class="control-label" for="focusedInput">STATUS </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="status" type="text" readonly=""  value="<?php echo $row['status'] ?>" >
                            </div>
                          </div>
                
             
                
      

             </div>



             <div class="span4">
                 <div class="control-group">
                            <label class="control-label" for="focusedInput">MIDDLE NAME</label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="middle_name" type="text" readonly=""  value="<?php echo $row['middle_name'] ?>" >
                            </div>
                          </div>


                 <div class="control-group">
                            <label class="control-label" for="focusedInput">YEAR </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="year" type="text" readonly=""  value="<?php echo $row['year_level'] ?>" >
                            </div>
                          </div>




              
                 <div class="control-group">
                            <label class="control-label" for="focusedInput">SEMESTER </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="sem" type="text" readonly=""  value="<?php echo $row['semester'] ?>" >
                            </div>
                          </div>
                
            

        
                
            </div>

            <div class="span4">
                 <div class="control-group">
                            <label class="control-label" for="focusedInput">LAST NAME </label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="last_name" type="text" readonly=""  value="<?php echo $row['last_name'] ?>" >
                            </div>
                          </div>



               
                 <div class="control-group">
                            <label class="control-label" for="focusedInput">COURSE</label>
                            <div class="controls">
                              <input class="input-xlarge focused" id="cors" type="text" readonly=""  value="<?php echo $row['course_code'] ?>"  > 
                            </div>
                    </div>
                
      

              </div>
    
          <?php } } ?>





     
              </div>



              </div>



          <div class="row-fluid section">
          <!-- block -->
          <div class="span8">    

          <div class="block" id="block">
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
                      if (isset($_POST['submit'])) {

                         $stud_id = $_POST['students_id'];
                        $year_level = $_POST['year_level'];
                        $semester = $_POST['semester'];
                   
                      

                    $sql = "SELECT * FROM tbl_enrollment_item WHERE students_id = '$stud_id'  and year = '$year_level' and semester = '$semester' ";

                    $res  = mysqli_query($conn,$sql);


               
                        while ($row = mysqli_fetch_array($res)) {

                            $objid =$row['objid'];
                        
                     ?>
                     <tr>
                         <td><?php echo $row['subject_code'] ?></td>
                         <td><?php echo $row['descriptive_title'] ?></td>
                         <td><?php echo $row['units'] ?></td>
                         <td><?php echo $row['days'] ?></td>
                         <td><?php echo $row['time'] ?></td>
                         <td><?php echo $row['room'] ?></td>
                         


                     </tr>
                     
                              



                 <?php } } ?>


                    
                </tbody>
                <tfoot> 

                    <tr>

                        <th></th>
                        <th>TOTAL NUMBER OF UNITS</th>
                        <th> 
                          <?php 
                           if (isset($_POST['submit'])) {

                         $stud_id = $_POST['students_id'];
                        $year_level = $_POST['year_level'];
                        $semester = $_POST['semester'];


                          $sql = "SELECT sum(units)  as sum from tbl_enrollment_item WHERE students_id = '$stud' and year = '$year_level' and semester = '$semester'";

                           $res  = mysqli_query($conn,$sql);

                           $row = mysqli_fetch_assoc($res);

                          

                           echo $row['sum'];

                           

                         }

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
           </div><!--END SPAN 8-->



           <div class="span4">
             <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">ASSESSMENT</div>
            </div>
            <div class="block-content collapse in">
              
             

             

                 <div class="span12">
                  <center>
                           <?php 

                            if (isset($_POST['submit'])) {

                         $stud_id = $_POST['students_id'];
                         $year_level = $_POST['year_level'];
                          $semester = $_POST['semester'];

                        

                          $sql = "SELECT sum(units)  as sum from tbl_enrollment_item WHERE students_id = '$stud_id' and year = '$year_level' and semester = '$semester'";

                           $res  = mysqli_query($conn,$sql);

                           $row = mysqli_fetch_assoc($res);

                           $units = $row['sum'];

                           

                           
                           $sql2  = "SELECT * FROM tbl_units";

                           $res2 = mysqli_query($conn,$sql2);

                           $row2  =mysqli_fetch_array($res2);

                           $price = $row2['price'];

                           $total = $units * $price;

                           $sql3="SELECT * FROM assessment WHERE stud_id = '$stud_id'  and year ='$year_level' and semester = '$semester'";

                           $res3 = mysqli_query($conn,$sql3);
                           $row3 = mysqli_fetch_array($res3);

                           $ass_id = $row3['id'];
                           $total2 = $row3['total'];
                           $objid = $row3['objid'];

                           ?>

                 <div class="control-group">

                               
                          <input type="hidden" name="objid" id="objid" value="<?php echo $objid ?>">

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

                    if ($total > 0) {
                     
                    echo "";

                    }else{

                      echo " ";

                    }

                    

                    }


                    
                    ?>
                      
                    
                   
                  <br>
              



                  </center>
                
                 </div>

                

                
               
                

     
              </div>









              </div>


            




           </div>








          








         </div><!--END ROW FLUID-->


          <div class="block" id="block">
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
                    <th> OR. NO </th>
                    <th> AMOUNT</th>
                    <th> DATE </th>
                    <th> QUARTER</th>
                  
                     
                  </tr>
                </thead>
                <tbody>
                    <?php 

                    include('../billing/config/db_config4.php');
                      if (isset($_POST['submit'])) {

                         $stud_id = $_POST['students_id'];
                        $year_level = $_POST['year_level'];
                        $semester = $_POST['semester'];
                   
                      

                    $sql = "SELECT * FROM payments WHERE stud_id = '$stud_id'  and year = '$year_level' and semester = '$semester' ";

                    $res  = mysqli_query($conn,$sql);


               
                        while ($row = mysqli_fetch_array($res)) {

                            $objid =$row['objid'];
                        
                     ?>
                     <tr>
                         <td><?php echo $row['orno'] ?></td>
                         <td><?php echo "&#8369".' '. $row['amount'] ?></td>
                         <td><?php echo $row['det'] ?></td>
                         <td><?php echo $row['quarter'] ?></td>
                          <td><a class="btn btn-primary" href="../billing/updatepayment.php?id=<?php echo $row['id']; ?>"><i class="icon-edit"></i></td>
                         


                     </tr>
                     
                              



                 <?php } } ?>


                    
                </tbody>
               
              </table>

              
            </div>
          </div>
        </div>
 <button type='button' class='btn btn-success btn-block' id='print'>Print</button>

        <!-- /block -->


      
                <!--BLOCK-->



      
            

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
        
      $(document).ready(function(){

          $('#print').click(function(){

            var objid = $('#objid').val();

            window.open('../billing/printassessment.php?objid=' + objid,"");

          });

      });
       

     

         

      

      

            
     

        

</script>







</script>



</body>

</html>