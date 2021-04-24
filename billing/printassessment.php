<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AMS |Print Assessment</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../billing/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  
  <!-- Theme style -->
  <link rel="stylesheet" href="../billing/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i ><img src="../billing/img/final_logo.png" width="50" height="50"></i> Colegio de Sta. Rita de San Carlos,Inc
        
        </h2>
      </div>

      <!-- /.col -->
    </div>

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
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <label>First Name</label>
        <address>
          <u><?php echo $row['first_name']?></u>
         
        </address>

        <label>Course</label>
        <address>
         <u><?php echo $row['course_code']?></u> 
         
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <label>Middle Name</label>
        <address>
         <u><?php echo $row['middle_name']  ?></u> <br>
         
        </address>
        <label>Student ID</label>
        <address>
           <u><?php echo $row['students_id']  ?></u><br>
         
        </address>

      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <label>Last Name</label><br>
        <address>
       <u><?php echo $row['last_name']  ?></u><br>
        </address>
        
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
<?php  ?>
    <!-- Table row -->
    <div class="row">
      <div class="col-8 table-responsive">
        <table class="table table-striped">
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
          <?php 

                    include('../billing/config/db_config4.php');

                    $sql = "SELECT * FROM tbl_enrollment_item WHERE objid ='$objid' and year = '$year' and semester = '$semester' ";

                    $res  = mysqli_query($conn,$sql);


               
                        while ($row = mysqli_fetch_array($res)) {


          ?>


          <tbody>
          <tr>
                        <td><?php echo $row['subject_code'] ?></td>
                         <td><?php echo $row['descriptive_title'] ?></td>
                         <td><?php echo $row['units'] ?></td>
                         <td><?php echo $row['days'] ?></td>
                         <td><?php echo $row['time'] ?></td>
                         <td><?php echo $row['room'] ?></td>
          </tr>
          </tbody>

        <?php } ?>

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

      <div class="col-4 table-responsive">
      <table class="table table-striped">
        <thead>
          <tr><th class="text-center">ASSESSMENT</th></tr>

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

          <tr>
            <th>Tuition Fees</th>
            <td><?php echo "&#8369".' '. $total ?></td>
          </tr>
           <tr>
            <th>Misc Fees</th>
            <td><?php echo "&#8369".' '. $row3['misc'] ?></td>
          </tr>
           <tr>
            <th>Other Fees</th>
            <td><?php echo "&#8369".' '. $row3['others'] ?></td>
          </tr>
           <tr>
            <th>Comp Fees</th>
            <td><?php echo "&#8369".' '. $row3['comp'] ?></td>
          </tr>
           <tr>
            <th>Speech Fees</th>
            <td><?php echo "&#8369".' '. $row3['speech'] ?></td>
          </tr>
           <tr>
            <th>NSTP</th>
            <td><?php echo "&#8369".' '. $row3['nstp'] ?></td>
          </tr>
           <tr>
            <th>Other Fees</th>
            <td><?php echo "&#8369".' '. $row3['others2'] ?></td>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
        

      </table>
      <h3  style="float: left">GRAND TOTAL</h3>
                 
                  <?php if ($total2 > 0) {

                    ?>

                    <h3  style='float: right'><?php echo $total2?></h3>
                    <?php
                          }else{

                            ?>
                        
                            <h3 id='sum' style='float: right; margin-right: 100px;'></h3>

                            <?php
                          }
                  ?>
        </div>
<br>

          <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
               
                 
                    <th> OR. NO </th>
                    <th> AMOUNT</th>
                    <th> DATE </th>
                    <th> QUARTER</th>
                  
               
          </tr>
          </thead>
          <?php 

                    include('../billing/config/db_config4.php');

                    $sql = "SELECT * FROM payments WHERE objid ='$objid' and year = '$year' and semester = '$semester' ";

                    $res  = mysqli_query($conn,$sql);


               
                        while ($row = mysqli_fetch_array($res)) {


          ?>


          <tbody>
          <tr>
                       <td><?php echo $row['orno'] ?></td>
                         <td><?php echo "&#8369".' '. $row['amount'] ?></td>
                         <td><?php echo $row['det'] ?></td>
                         <td><?php echo $row['quarter'] ?></td>

          </tr>
          </tbody>

        <?php } ?>

        </table>
      </div>


















      </div>



      <!-- /.col -->
    </div>

    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->


<script type="text/javascript"> 
  window.addEventListener("load", window.print());



</script>
</body>
</html>
