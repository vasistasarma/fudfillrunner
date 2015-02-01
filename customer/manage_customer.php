<?php
session_start();
$start_time = date("Y-m-d H:i:s");
$_SESSION['fud_fill']['page_parent']="Runners";
$_SESSION['fud_fill']['page_title']="Add Runners";

$_SESSION['fud_fill']['page_name']="manage_runners.php";

$menu_active = array('','','','','','');

$menu_active[1] = "active";

if(isset($_POST['runner_info']))
{
	include("../includes/db_config.php");
	
	function clean($str)
	{
		$str = @trim($str);
		if(get_magic_quotes_gpc())
		$str = stripslashes($str);
	
		return mysql_real_escape_string($str);
	}

	$user_fname = clean($_POST['user_fname']);
	$user_lname = clean($_POST['user_lname']);
	$user_address = clean($_POST['user_address']);
	$user_email = clean($_POST['user_email']);
	$user_contact_no = clean($_POST['user_contact_no']);
	$user_identification = clean($_POST['user_identification']);
	
	//if no get auto increment id
	$find_increment = mysql_query("SELECT Auto_increment FROM information_schema.tables 
	WHERE TABLE_SCHEMA = 'inventory' AND table_name = 'users'") or die(mysql_error());

	$get_increment_id = mysql_fetch_array($find_increment);
	$customer_id = $get_increment_id['Auto_increment'];
	
	mysql_query("INSERT INTO inventory.users (`user_type`, `user_name`, `user_password`, `created_by`, `created_on`, `updated_by`)
	VALUES ('runner', '".$user_fname."', '".md5('admin@123')."', '".$_SESSION['fud_fill']['user_name']."', '".date("Y-m-d H:i:s")."', '".$_SESSION['fud_fill']['user_name']."')") or die(mysql_error());
	
	mysql_query("INSERT INTO inventory.users_personal_details (`user_id`, `user_fname`, `user_lname`, `user_address`, `user_email`, `user_contact_no`, `user_identification`, `add_latitude`, `add_longitude`, `updated_by`)
	VALUES ('".$customer_id."', '".$user_fname."', '".$user_lname."', '".$user_address."', '".$user_email."', '".$user_contact_no."', '".$user_identification."', '', '', '".$_SESSION['fud_fill']['user_name']."')") or die(mysql_error());
	
	echo '<script> alert("Added new Runner succcessfully.");</script>';
	echo '<script> document.location="manage_runners.php";</script>';
}

?>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<link type="text/css" rel="stylesheet" href="../css/map.css">
<body>
<?php
include("../includes/header.php");
//include("includes/menu.php");
include("../includes/bread_crumb.php");
?>

<div class="row-fluid">
	<div class="span6">
		<form id="runner_info" method="post" action="manage_runners.php">
			<table width="450px">
			<tr>
 				<td valign="top">
  					<label for="user_fname">First Name </label>
 				</td>
 				<td valign="top">
  					<input  type="text" name="user_fname" maxlength="50" size="30" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off">
 				</td>
			</tr>
 
			<tr>
 				<td valign="top"">
  					<label for="user_lname">Last Name *</label>
 				</td>
 				<td valign="top">
  					<input  type="text" name="user_lname" maxlength="50" size="30" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off">
 				</td>
			</tr>
			
			<tr>
 				<td valign="top"">
  					<label for="user_email">Email *</label>
 				</td>
 				<td valign="top">
  					<input  type="text" name="user_email" maxlength="50" size="30" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off">
 				</td>
			</tr>
			
			<tr>
 				<td valign="top"">
  					<label for="user_contact_no">Contact *</label>
 				</td>
 				<td valign="top">
  					<input  type="text" name="user_contact_no" maxlength="50" size="30" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off">
 				</td>
			</tr>
			
			<tr>
 				<td valign="top"">
  					<label for="user_address">Address *</label>
 				</td>
 				<td valign="top">
  					<input  type="text" name="user_address" maxlength="50" size="30" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off">
 				</td>
			</tr>
 			
			<tr>
				<td valign="top">
  					<label for="user_identification">Identification </label>
 				</td>
 				<td valign="top">
  					<textarea  name="user_identification" maxlength="1000" cols="25" rows="6"></textarea>
 				</td>
 			</tr>
			
			<tr>
 				<td colspan="2" style="text-align:right">
  				<input type="submit" name="runner_info" id="button_style" value="Add Runner">
 			</td>
			</tr>
			</table>
		</form>
	</div>
	<div class="span6">
			<div id="map-canvas"></div>
	</div>
</div>
<!--/span ends-->
</body>
<?php
include("../includes/footer.php");
?>