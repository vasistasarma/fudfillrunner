<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION['fud_fill']['user_name']) AND strlen($_SESSION['fud_fill']['user_name']) == 0)
{
	?>
	<script>
	document.location="../login.php";
	</script>
	<?php
}
?>
	<!-- Bootstrap -->
    <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/bootstrap/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="../css/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="../css/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="../js/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
	
	<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="../Routeplan/fudfill_plan_route.php">FudFill</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?=$_SESSION['fud_fill']['user_name']?> <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="../logout.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="dropdown <?=$menu_active[0]?>">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">Route Planner <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li>
                                        <a href="../Routeplan/fudfill_plan_route.php">Plan New Route</a>
                                    </li>
                                    <li>
                                        <a href="#">Assign Routes</a>
                                    </li>
                                    <li>
                                        <a href="#">Saved Routes</a>
                                    </li>
                                    <li>
                                        <a href="#">Manage Routes</a>
                                    </li>
									<li>
                                        <a href="#">Email Route</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown <?=$menu_active[1]?>">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Runners <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Runners</a>
                                    </li>
                                    <li>
                                        <a href="../Runners/manage_runners.php">Add Runner</a>
                                    </li>
                                    <li>
                                        <a href="#">Runner Assignments</a>
                                    </li>
                                    <li>
                                        <a href="../Runners/tracking_runners.php">Runner Tracker</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown <?=$menu_active[2]?>">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Customer <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="../customer/manage_customer.php">New Customer</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Order List</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Order History</a>
                                    </li>
                                </ul>
                            </li>
							<li class="dropdown <?=$menu_active[3]?>">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Suppliers <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">New Supplier</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Supplier Inventory</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Supplier Pickup Plan</a>
                                    </li>
                                </ul>
                            </li>
							<li class="dropdown <?=$menu_active[4]?>">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Admin <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="#">New User</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="#">Manage Users</a>
                                    </li>
                                </ul>
                            </li>
							<li class="<?=$menu_active[5]?>">
                                <a href="../Home/fudfill_home.php">Dashboard</a>
                            </li>
							
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>