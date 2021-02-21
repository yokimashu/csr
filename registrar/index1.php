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
        <!-- <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Success</h4>
            The operation completed successfully
        </div> -->
        <!-- <div class="navbar">
            <div class="navbar-inner">
                <ul class="breadcrumb">
                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                    <li>
                        <a href="#">Dashboard</a> <span class="divider">/</span>
                    </li>
                    <li>
                        <a href="#">Settings</a> <span class="divider">/</span>
                    </li>
                    <li class="active">Tools</li>
                </ul>
            </div>
        </div>
    </div> -->
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Statistics</div>
                <div class="pull-right"><span class="badge badge-warning">View More</span>

                </div>
            </div>
            <div class="block-content collapse in">
                <div class="span3">
                    <div class="chart" data-percent="73">73%</div>
                    <div class="chart-bottom-heading"><span class="label label-info">BSIT</span>

                    </div>
                </div>
                <div class="span3">
                    <div class="chart" data-percent="53">53%</div>
                    <div class="chart-bottom-heading"><span class="label label-info">Page Views</span>

                    </div>
                </div>
                <div class="span3">
                    <div class="chart" data-percent="83">83%</div>
                    <div class="chart-bottom-heading"><span class="label label-info">Users</span>

                    </div>
                </div>
                <div class="span3">
                    <div class="chart" data-percent="13">13%</div>
                    <div class="chart-bottom-heading"><span class="label label-info">Orders</span>

                    </div>
                </div>
            </div>
        </div>
           <!-- /block -->
           </div>
        <div class="span6">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Orders</div>
                    <div class="pull-right"><span class="badge badge-info">752</span>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Coat</td>
                                <td>02/02/2013</td>
                                <td>$25.12</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacket</td>
                                <td>01/02/2013</td>
                                <td>$335.00</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Shoes</td>
                                <td>01/02/2013</td>
                                <td>$29.99</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /block -->

    </div>
</div>
</div>
<hr>
<!-- footer here -->
<?php include('../includes/footer.php'); ?>