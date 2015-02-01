<?php
session_start();

$start_time = date("Y-m-d H:i:s");
$_SESSION['fud_fill']['page_parent']="Dashboard";
$_SESSION['fud_fill']['page_title']="";

$_SESSION['fud_fill']['page_name']="tracking_runners.php";

$menu_active = array('','','','','','');

$menu_active[5] = "active"; 
?>
<body>
	<?php
	include("../includes/header.php");
	//include("includes/menu.php");
	include("../includes/bread_crumb.php");
	?>      
               
        <div class="row-fluid">
                       
        </div>
        <!--/.fluid-container-->
        <script src="../js/vendors/jquery-1.9.1.min.js"></script>
        <script src="../js/bootstrap/bootstrap.min.js"></script>
        
        <script src="../js/assets/scripts.js"></script>
        
        </script>
    </body>

</html>