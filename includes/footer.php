<?php include('../registrar/chat.php') ?>


<?php

$curYear = date('Y');

?>

<footer>
<strong>Copyright &copy; 2021 ITRitarians <a href="">Colegio de Sta. Rita de San Carlos, Inc.</a>.</strong>
   
   <div class="float-right d-none d-sm-inline-block">
       All rights reserved.
   </div>
</footer>

<!--/.fluid-container-->
<link href="../vendors/datepicker.css" rel="stylesheet" media="screen">
<link href="../vendors/uniform.default.css" rel="stylesheet" media="screen">
<link href="../vendors/chosen.min.css" rel="stylesheet" media="screen">

<link href="../vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

<script src="../vendors/jquery-1.9.1.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../vendors/jquery.uniform.min.js"></script>
<script src="../vendors/chosen.jquery.min.js"></script>
<script src="../vendors/bootstrap-datepicker.js"></script>
<script src="../vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="../vendors/wysiwyg/bootstrap-wysihtml5.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

<script type="text/javascript" src="../vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="../assets/form-validation.js"></script>

<script src="../vendors/easypiechart/jquery.easy-pie-chart.js"></script>
<script src="../assets/scripts.js"></script>
<script src="../assets/DT_bootstrap.js"></script>
<script src="../vendors/sweetalert/sweetalert.min.js"></script>
<script>
    $(function() {
        // Easy pie charts
        $('.chart').easyPieChart({
            animate: 1000
        });
    });
</script>


<script>
    jQuery(document).ready(function() {
        FormValidation.init();
    });
    $(function() {
        $(".datepicker").datepicker();
        $(".uniform_on").uniform();
        $(".chzn-select").chosen();
        $('.textarea').wysihtml5();

        $('#rootwizard').bootstrapWizard({
            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current / $total) * 100;
                $('#rootwizard').find('.bar').css({
                    width: $percent + '%'
                });
                // If it's the last tab then hide the last button and show the finish instead
                if ($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }
        });
        $('#rootwizard .finish').click(function() {
            alert('Finished!, Starting over!');
            $('#rootwizard').find("a[href*='tab1']").trigger('click');
        });
    });



    //for subjects table
    $(document).ready(function() {
     
    // var course = $('#course').val();
    // var level = $('#level').val();
    // var semester = $('#semester').val();

    // // alert(semester);
    // var dataTable = $('#subjects').DataTable({
    //   "processing": true,
    //   "serverSide": true,
    //   "ajax": {
    //     url: "track_subjects.php", // json datasource
    //     data: {
    //       course: course,
    //       level: level,
    //       semester: semester
    //     },
    //     type: "post", // method  , by default get
    //     error: function() { // error handling
    //       $("#subjects-error").html("");
    //       $("#subjects").append('<tbody class="subjects-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
    //       $("#subjects_processing").css("display", "none");

    //     }
    //   },
    //   "columnDefs": [{
    //     "targets": -1,
    //     "data": null,
    //     "defaultContent": '<button class=\"receive btn btn-outline-success btn-xs \" ><i class="fa fa-download" aria-hidden= "true"></i></button>'


    //   }],
    // });  
    });


</script>

</body>
</html>