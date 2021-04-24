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
                    <h3>Update Assessment</h3>
                    <p id="response"></p>
                    <?php 

                    $id= $_GET['id'];

                    $sql = "SELECT * FROM assessment WHERE id = '$id'";
                    $res = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($res);

                        $objid =$row['objid'];

                     ?>

                     <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                      <input type="hidden" name="objid" id="objid" value="<?php echo $objid; ?>">





                      <div class="control-group">
                <label class="control-label" for="focusedInput">Tuition Fees</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="tuition" id="tuition" type="number" value="<?php echo $row['total'] ?>" onkeyup="AddInputs()" >
                            </div>
                 </div>

                 <div class="control-group">
                            <label class="control-label" for="focusedInput">Misc Fees</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="misc" id="misc" type="number" onkeyup="AddInputs()" value="<?php echo $row['misc'] ?>">
                            </div>
                 </div>

                   <div class="control-group">
                            <label class="control-label" for="focusedInput">Other Fees</label >

                            <div class="controls">
                              <input class="input-xlarge focused" name="other" id="other" type="number" onkeyup="AddInputs()" value="<?php echo $row['others'] ?>" >
                            </div>
                  </div>

                   <div class="control-group">
                            <label class="control-label" for="focusedInput">Comp Fees</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="comp" id="comp" type="number" onkeyup="AddInputs()" value="<?php echo $row['comp'] ?>">
                            </div>
                  </div>

                  <div class="control-group">
                            <label class="control-label" for="focusedInput">Speech Fees</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="speech" id="speech" type="number" onkeyup="AddInputs()" value="<?php echo $row['speech'] ?>">
                            </div>
                  </div>

                  <div class="control-group">
                            <label class="control-label" for="focusedInput">NSTP</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="nstp" id="nstp" type="number" onkeyup="AddInputs()" value="<?php echo $row['nstp'] ?>">
                            </div>
                  </div>

                  <div class="control-group">
                            <label class="control-label" for="focusedInput">Other Fees</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="other2" id="other2" type="number" onkeyup="AddInputs()" value="<?php echo $row['others2'] ?>">
                            </div>
                  </div>
                  <h3  style="float: left">TOTAL&nbsp&nbsp:&nbsp&nbsp</h3>
                  <h3 id="sum" style="float:left"></h3>

                 <button class="btn btn-success btn-block" name="submit" id="btn">Update</button>
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
            var id= $("#id").val();  
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


            $.post("../billing/editassessment.php",{
                id:id,
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