<?php
$user_id = $_SESSION['id'];
$docno = '';


if (!isset($_SESSION['id'])) {
  header('location:../index.php');
} else {
}



//fetch user from database

$get_user_sql = "SELECT * FROM tbl_users where user_id = :id";
$user_data = $con->prepare($get_user_sql);
$user_data->execute([':id' => $user_id]);
while ($result = $user_data->fetch(PDO::FETCH_ASSOC)) {


  $db_first_name = $result['first_name'];
  $db_middle_name = $result['middle_name'];
  $db_last_name = $result['last_name'];
  $db_email_ad = $result['email'];
  $db_contact_number = $result['contact_no'];
  $db_user_name = $result['username'];
  $department = $result['department'];
}



// $get_all_document_sql = "SELECT * FROM tbl_ledger";
// $get_all_document_data = $con->prepare($get_all_document_sql);
// $get_all_document_data->execute();  

//count incoming documents
$get_noofstuds_sql = "SELECT COUNT(`students_id`) as total FROM `tbl_students`";
$get_noofstuds_data = $con->prepare($get_noofstuds_sql);
$get_noofstuds_data->execute();
$get_noofstuds_data->setFetchMode(PDO::FETCH_ASSOC);
while ($result1 = $get_noofstuds_data->fetch(PDO::FETCH_ASSOC)) {
  $percent =  $result1['total'];
}
?>

<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>Colegio de Sta. Rita de San Carlos</title>
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="../assets/styles.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="../vendors/pixelarity/pixelarity.css">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="../vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">CSR MIS</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                            
                                <a href="#" role="button"  data-toggle=""> <i class="icon-user"></i> <?php echo $db_first_name . '' . $db_middle_name . ' ' . $db_last_name ?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="login.html">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                       
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>