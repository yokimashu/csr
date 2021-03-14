<?php
   include('config/db_config.php');
//variable declaration
   $alert_msg = '';
   //sign in button
    if (isset($_POST['signin'])){
        //to check if data are passed
        // echo "<pre>";
        //     print_r($_POST);
        // echo "</pre>";

        $username = $_POST['username'];
        $password = $_POST['password'];

        $check_username_sql = "SELECT * FROM tbl_users where username = :uname";
        
        $username_data = $con->prepare($check_username_sql);
        $username_data ->execute([
          ':uname' => $username
        ]);
          if ($username_data->rowCount() > 0){
            while ($result = $username_data->fetch(PDO::FETCH_ASSOC)) {
          
              //from database already hash
              $hash_password = $result['userpass'];
    
              //hash the $u_pass and compared to $hashed_password
              if (password_verify($password, $hash_password)) {
               session_start();
               $_SESSION['id'] = $result['user_id'];

                if ($result['account_type'] == 1) {
                  


                  header('location: registrar'); //location is folder
                }

                else if ($result['account_type'] == 2) {
                  


                  header('location: billing'); //location is folder
                }
                else {
                  header('location: user');
                }
              }
              else{
                //echo "Password does not match!";
                $alert_msg .= ' 
                <div class="new-alert new-alert-warning alert-dismissible">
                    <i class="icon fa fa-warning"></i>
                    Incomplete Details!
                </div>     
            ';
              }
    
                
            }
        }else{
          $alert_msg .= ' 
          <div class="new-alert new-alert-warning alert-dismissible">
              <i class="icon fa fa-warning"></i>
              Username does not exist!
          </div>     
      ';
        }

        
      
        

    }

  

?>


<!DOCTYPE html>
<html>
<head>
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>

<body align="center" class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <img src="images/final_logo.png" width="350px">
  </div>
    <a href=""><b>Colegio de Sta. Rita</b> de San Carlos, Inc.</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
      <div class="form-group has-feedback">
        <!-- alert here -->
        <?php echo $alert_msg;?>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div  class="row">
        <!-- <div align="center" class="col-md-6">
          <a href="register.php" class = "btn btn-primary">Sign Up</a>
        </div> -->
        <div class="col-md-6">
          <input type="submit" class = "btn btn-primary" name="signin" value="Sign In">
        </div>
      </div>
    
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="assets/scripts.js"></script>
        <script>
<?php include('adduser_modal.php'); ?>
</body>
<script>
 (function($){
  function post_notify(message, type){

if (type == 'success') {

  $.notify({
    message: message
  },{
    type: 'success',
    delay: 2000
  });

} else{

  $.notify({
    message: message
  },{
    type: 'danger',
    delay: 2000
  }); 

}

}
  $("#save").click(function(){
//   var uname = $("#username").val();
//   var upass = $("#password").val();
//   var fname = $("#fname").val();
//   var mname = $("#mname").val();
//   var lname = $("#lname").val();
//   var address = $("#address").val();
//   var cnumber = $("#cnumber").val();


//   $.ajax({

// url : 'admin/insert_user.php',
// method: 'POST',
// data: {uname:uname,
//       upass:upass,
//       fname:fname,
//       mname:mname,
//       lname:lname,
//       address:address,
//       cnumber:cnumber},
// dataType: 'json',
// })
// .done(function(result){

// console.log(result);
// post_notify(result.message, result.error_code);

// })
// .fail(function(jqXHR, textStatus, errorThrown){
// console.log(errorThrown);

// });
  
  
//   });
  $( "form" ).submit(function( event ) {
  event.preventDefault();

  $("#close").click(function(){
    $('#addnew').modal('toggle');

  })
});
 })(jQuery);
</script>
</html>
