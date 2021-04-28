<?php
include('../config/db_config.php');

session_start();

?>

<!DOCTYPE html>
<html class="no-js">


<?php
include('../includes/header.php');
include('../includes/sidebar.php');

?>
<!--/span-->
<div class="span9" id="content">
    <div class="row-fluid">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Success</h4>
            The operation completed successfully
        </div>
       
    </div>
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Statistics</div>
               
            </div>
            <div class="block-content collapse in">
                <div class="span3">
                    <?php 


                        $sql = "SELECT * FROM tbl_students";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);


                     ?>
                    <div class="chart" data-percent="<?php echo $count ?>"><?php echo $count ?></div>
                    <div class="chart-bottom-heading"><span class="label label-info">TOTAL NO. OF STUDENTS</span>

                    </div>


                   


                </div>
                <div class="span3">

                      <?php 


                        $sql = "SELECT * FROM tbl_enrollment WHERE status = 'ACTIVE' ";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);


                     ?>
                    <div class="chart" data-percent="<?php echo $count ?>"><?php echo $count ?></div>
                    <div class="chart-bottom-heading"><span class="label label-info">ENROLLEES</span>

                    </div>
                </div>
                <div class="span3">

                       <?php 


                        $sql = "SELECT * FROM tbl_enrollment WHERE status = 'ENROLLED' ";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);


                     ?>
                    <div class="chart" data-percent="<?php echo $count ?>"><?php echo $count ?></div>
                    <div class="chart-bottom-heading"><span class="label label-info">ENROLLED</span>

                    </div>
                </div>
               

                
            </div>
        </div>
        <!-- /block -->




           <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">COURSES</div>
               
            </div>
            <div class="block-content collapse in">
                <div class="span2">
                    <?php 


                        $sql = "SELECT * FROM tbl_enrollment WHERE course_code = 'BSIT'";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);


                     ?>
                    <div class="chart" data-percent="<?php echo $count ?>"><?php echo $count ?></div>
                    <div class="chart-bottom-heading"><span class="label label-info">BSIT</span>

                    </div>


                   


                </div>
                <div class="span2">

                      <?php 


                        $sql = "SELECT * FROM tbl_enrollment WHERE course_code = 'BSBA'";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);


                     ?>
                    <div class="chart" data-percent="<?php echo $count ?>"><?php echo $count ?></div>
                    <div class="chart-bottom-heading"><span class="label label-info">BSBA</span>

                    </div>
                </div>
                <div class="span2">

                       <?php 


                        $sql = "SELECT * FROM tbl_enrollment WHERE course_code = 'BEED'";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);


                     ?>
                    <div class="chart" data-percent="<?php echo $count ?>"><?php echo $count ?></div>
                    <div class="chart-bottom-heading"><span class="label label-info">BEED</span>

                    </div>
                </div>
                 <div class="span2">

                       <?php 


                        $sql = "SELECT * FROM tbl_enrollment WHERE course_code = 'BSED'";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);


                     ?>
                    <div class="chart" data-percent="<?php echo $count ?>"><?php echo $count ?></div>
                    <div class="chart-bottom-heading"><span class="label label-info">BSED</span>

                    </div>
                </div>
                 <div class="span2">

                       <?php 


                        $sql = "SELECT * FROM tbl_enrollment WHERE course_code = 'BSTM'";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);


                     ?>
                    <div class="chart" data-percent="<?php echo $count ?>"><?php echo $count ?></div>
                    <div class="chart-bottom-heading"><span class="label label-info">BSTM</span>

                    </div>
                </div>
                 <div class="span2">

                       <?php 


                       $sql = "SELECT * FROM tbl_enrollment WHERE course_code = 'MIDWIFERY'";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);


                     ?>
                    <div class="chart" data-percent="<?php echo $count ?>"><?php echo $count ?></div>
                    <div class="chart-bottom-heading"><span class="label label-info">MIDWIFERY</span>

                    </div>
                </div>
               

                
            </div>
        </div>
        <!-- /block -->
        
                        

    
</div>
</div>
<hr>
<!-- footer here -->
<?php include('../includes/footer.php'); ?>