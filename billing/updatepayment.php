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
                    <h3>Update Payment</h3>
                    <p id="response"></p>
                    <?php 

                    $id= $_GET['id'];

                    $sql = "SELECT * FROM payments WHERE id = '$id'";
                    $res = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($res);

                        $id =$row['id'];
                        

                        

                     ?>

                     
                      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">


                  <div class="control-group">
                            <label class="control-label" for="focusedInput">O.R Number</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="orno" id="orno" type="number" value="<?php echo $row['orno'] ?>" >
                            </div>
                  </div>

                  <div class="control-group">
                            <label class="control-label" for="focusedInput">Amount</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="amount" id="amount" type="number" value="<?php echo $row['amount'] ?>"  >
                            </div>
                  </div>

                  <div class="control-group">
                            <label class="control-label" for="focusedInput">Date</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="det" id="det" type="date" value="<?php echo $row['det'] ?>">
                            </div>
                  </div>

                    <div class="control-group">
                  <label class="control-label">Quarter: <span class="required">*</span></label>
                  <div class="controls">
                    <select class="span5 m-wrap" id ="quarter" name="quarter">
                      <option><?php echo $row['quarter'] ?></option>
                      <option >Prelim</option>
                      <option >Midterm</option>
                      <option >Final</option>
                      <option >Promisory</option>
                    </select>
                  </div>
                </div>



                 

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
    
        $(document).ready(function(){

           $('#btn').click(function(){
            var id= $("#id").val();   
            var orno= $("#orno").val();
            var amount= $("#amount").val();
            var det= $("#det").val();
            var quarter= $("#quarter").val();
         


            $.post("../billing/editpayment.php",{
                id:id,
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