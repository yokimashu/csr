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
            <div class="muted pull-left">PRICE PER UNIT</div>
          </div>
          <div class="block-content collapse in">
            <div class="span12">

                <center>
                    <h3>SET PRICE PER UNIT</h3>
                    <p id="response"></p>
                    <?php 

                    $sql = "SELECT * FROM tbl_units";
                    $res = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($res);

                    $price = $row['price'];

                     ?>

                 <div class="control-group">
                            <label class="control-label" for="focusedInput">Price</label>
                            <div class="controls">
                              <input class="input-xlarge focused" name="unit" id="unit" type="number"  value="<?php echo $price; ?>">
                            </div>
                 </div>

                 <button class="btn btn-success" name="submit" id="btn2">Update</button>




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

           $('#btn2').click(function(){

            var unit= $("#unit").val();


            $.post("../billing/submit.php",{

                unit:unit

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