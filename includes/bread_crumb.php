<?php
session_start();
?>
 <!--/span-->
<div class="span9" id="content" style="width: 100%;">
	
	
	<div class="row-fluid">
		<div class="navbar">
           	<div class="navbar-inner">
				<ul class="breadcrumb">
	            	<i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                <li>
	                	<a><?=$_SESSION['fud_fill']['page_parent']?></a> <span class="divider">/</span>	
	                </li>
	                <li>
	                	<a class="active"><?=$_SESSION['fud_fill']['page_title']?></a>	
	                </li>
	         	</ul>
        	</div>
		</div>
	</div>