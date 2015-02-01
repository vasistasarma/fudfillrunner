<?php
session_start();
$start_time = date("Y-m-d H:i:s");
$_SESSION['fud_fill']['page_parent']="Runners";
$_SESSION['fud_fill']['page_title']="Add Runners";

$_SESSION['fud_fill']['page_name']="manage_runners.php";

$menu_active = array('','','','','','');

$menu_active[1] = "active";

$action_url = "";

include_once("../includes/db_config.php");

if(isset($_POST['runner_info']) AND !isset($_GET['action']))
{	
	function clean($str)
	{
		$str = @trim($str);
		if(get_magic_quotes_gpc())
		$str = stripslashes($str);
	
		return mysql_real_escape_string($str);
	}

	$user_name = clean($_POST['user_name']);
	$user_password = clean($_POST['user_password']);
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
	VALUES ('runner', '".$user_name."', '".md5($user_password)."', '".$_SESSION['fud_fill']['user_name']."', '".date("Y-m-d H:i:s")."', '".$_SESSION['fud_fill']['user_name']."')") or die(mysql_error());
	
	mysql_query("INSERT INTO inventory.users_personal_details (`user_id`, `user_fname`, `user_lname`, `user_address`, `user_email`, `user_contact_no`, `user_identification`, `add_latitude`, `add_longitude`, `updated_by`)
	VALUES ('".$customer_id."', '".$user_fname."', '".$user_lname."', '".$user_address."', '".$user_email."', '".$user_contact_no."', '".$user_identification."', '', '', '".$_SESSION['fud_fill']['user_name']."')") or die(mysql_error());
	
	echo '<script> alert("Added new Runner succcessfully.");</script>';
	echo '<script> document.location="manage_runners.php";</script>';
}
else if(isset($_GET['action']) AND $_GET['action'] == "edit")
{
	$id_enq = $_GET['id'];
	
	$get_runner_details = mysql_query("
	(SELECT 
	inventory.users.`user_name`, 
	inventory.users.`user_password`,
	inventory.users_personal_details.`user_fname`, 
	inventory.users_personal_details.`user_lname`, 
	inventory.users_personal_details.`user_address`, 
	inventory.users_personal_details.`user_email`, 
	inventory.users_personal_details.`user_contact_no`, 
	inventory.users_personal_details.`user_identification`, 
	inventory.users_personal_details.`add_latitude`, 
	inventory.users_personal_details.`add_longitude`
	FROM inventory.users
	LEFT JOIN inventory.users_personal_details
	ON inventory.users.id = inventory.users_personal_details.user_id
	WHERE inventory.users.id = '".$id_enq."')
	") or die(mysql_error());
	
	$assign_runner_details = mysql_fetch_array($get_runner_details);
	
	if(!$assign_runner_details||mysql_num_rows($assign_runner_details)<1){
		echo 'No User selected';
		
	}
		else {
	$user_name = $assign_runner_details['user_name'];
	$user_password = $assign_runner_details['user_password'];
	$user_fname = $assign_runner_details['user_fname'];
	$user_lname = $assign_runner_details['user_lname'];
	$user_address = $assign_runner_details['user_address'];
	$user_email = $assign_runner_details['user_email'];
	$user_contact_no = $assign_runner_details['user_contact_no'];
	$user_identification = $assign_runner_details['user_identification'];	
	
	$action_url = "?action=update&id=".$id_enq;
		}
}
else if(isset($_GET['action']) AND $_GET['action'] == "update")
{
	function clean($str)
	{
		$str = @trim($str);
		if(get_magic_quotes_gpc())
		$str = stripslashes($str);
	
		return mysql_real_escape_string($str);
	}
	$id_enq = $_GET['id'];
	
	$user_name = clean($_POST['user_name']);
	$user_password = clean($_POST['user_password']);
	$user_fname = clean($_POST['user_fname']);
	$user_lname = clean($_POST['user_lname']);
	$user_address = clean($_POST['user_address']);
	$user_email = clean($_POST['user_email']);
	$user_contact_no = clean($_POST['user_contact_no']);
	$user_identification = clean($_POST['user_identification']);
	
	mysql_query("UPDATE inventory.users SET 
	inventory.users.`user_name` = '".$user_name."', 
	inventory.users.`user_password` = '".$user_password."', 
	inventory.users.`updated_by` = '".$_SESSION['fud_fill']['user_name']."'
	WHERE inventory.users.id = '".$id_enq."'
	") or die(mysql_error());
	
	mysql_query("UPDATE inventory.users_personal_details SET 
	inventory.users_personal_details.`user_fname` = '".$user_fname."', 
	inventory.users_personal_details.`user_lname` = '".$user_lname."', 
	inventory.users_personal_details.`user_address` = '".$user_address."', 
	inventory.users_personal_details.`user_email` = '".$user_email."', 
	inventory.users_personal_details.`user_contact_no` = '".$user_contact_no."', 
	inventory.users_personal_details.`user_identification` = '".$user_identification."', 
	inventory.users_personal_details.`add_latitude` = '', 
	inventory.users_personal_details.`add_longitude` = '',
	inventory.users_personal_details.`updated_by` = '".$_SESSION['fud_fill']['user_name']."'
	WHERE inventory.users_personal_details.user_id = '".$id_enq."'
	") or die(mysql_error());
	
	echo '<script> alert("Updated Runner succcessfully.");</script>';
	echo '<script> document.location="manage_runners.php";</script>';
	
}
else
{
	$action_url = "";
}

?>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
	<link rel="stylesheet" type="text/css" href="../css/jquery.autocomplete.css" />
	<script type="text/javascript" src="../js/jquery.autocomplete.js"></script>
    <script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    //fillInAddress();
  });
}

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
// [END region_geolocation]
	
	function do_action(id)
	{
		document.location = "manage_runners.php?action=edit&id="+id;
	}
</script>
<body onload="initialize()">
<?php

include("../includes/header.php");
//include("includes/menu.php");
include("../includes/bread_crumb.php");
?>

<div class="row-fluid">
	<div class="span3">
		<form id="runner_info" method="post" action="manage_runners.php<?=$action_url?>">
			<table>
			<tr>
 				<td valign="top">
  					<label for="user_fname">First Name </label>
 				</td>
 				<td valign="top">
  					<input  type="text" name="user_fname" maxlength="50" size="30" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" value="<?=$user_fname?>">
 				</td>
			</tr>
 
			<tr>
 				<td valign="top"">
  					<label for="user_lname">Last Name </label>
 				</td>
 				<td valign="top">
  					<input  type="text" name="user_lname" maxlength="50" size="30" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" value="<?=$user_lname?>">
 				</td>
			</tr>
			
			<tr>
 				<td valign="top"">
  					<label for="user_email">Email </label>
 				</td>
 				<td valign="top">
  					<input  type="text" name="user_email" maxlength="50" size="30" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" value="<?=$user_email?>">
 				</td>
			</tr>
			
			<tr>
 				<td valign="top"">
  					<label for="user_contact_no">Contact </label>
 				</td>
 				<td valign="top">
  					<input  type="text" name="user_contact_no" maxlength="50" size="30" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" value="<?=$user_contact_no?>">
 				</td>
			</tr>
			
			<tr>
 				<td valign="top"">
  					<label for="user_address">Address </label>
 				</td>
 				<td valign="top">
  					<input  type="text" name="autocomplete" placeholder="Enter the address" onFocus="geolocate()" maxlength="50" size="30" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" value="<?=$user_address?>">
 				</td>
			</tr>
 			
			<tr>
				<td valign="top">
  					<label for="user_identification">Identification </label>
 				</td>
 				<td valign="top">
  					<input type = "text"  name="user_identification" maxlength="50" size="30" >value="<?=$user_identification?>">
 				</td>
 			</tr>
			
			<tr>
				<td valign="top">
  					<label for="user_identification">User name </label>
 				</td>
 				<td valign="top">
  					<input type="text" name="user_name" maxlength="50" size="30" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" value="<?=$user_name?>">
 				</td>
 			</tr>
			
			<tr>
				<td valign="top">
  					<label for="user_identification">Password </label>
 				</td>
 				<td valign="top">
  					<input type="password" name="user_password" maxlength="50" size="30" autocomplete="off" autocorrect="off" spellcheck="false" autocapitalize="off" value="">
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
	<div class="span9">
			<?php
			$get_all_runners = mysql_query("SELECT
			inventory.users_personal_details.user_id,
			inventory.users_personal_details.user_fname,
			inventory.users_personal_details.user_lname,
			inventory.users_personal_details.user_address,
			inventory.users_personal_details.user_email,
			inventory.users_personal_details.user_contact_no,
			inventory.users_personal_details.user_identification
			FROM inventory.users
			LEFT JOIN inventory.users_personal_details 
			ON inventory.users.id = inventory.users_personal_details.profile_id
			WHERE inventory.users.user_type = 'runner'") or die(mysql_error());
			
			$total_runners = mysql_num_rows($get_all_runners);
			
			echo '<div class="block">
            		<div class="navbar navbar-inner block-header">
            		  	<div class="muted pull-left">Runners</div>
                        <div class="pull-right"><span class="badge badge-info">'.$total_runners.'</span>
                   		</div>
                	</div>
					
					<div class="block-content collapse in">';
                    
			echo '<table class="table table-striped" style="margin-left: 0px;">';
			
			$row_flag = 0;
			
			while($list_all_runners = mysql_fetch_array($get_all_runners))
			{
				if($row_flag == 0)
				{
					echo '<thead>';
					echo '<tr>';
						echo '<th>Firstname</th>';
						echo '<th>Lastname</th>';
						echo '<th>Address</th>';
						echo '<th>Email</th>';
						echo '<th>Contact No</th>';
						echo '<th>Identification</th>
						<th>Action</th>
						';
					echo '</tr>';
					echo '</thead>
					<tbody>';
				}
				
				
				echo '<tr>';
					echo '<td>'.$list_all_runners['user_fname'].'</td>';
					echo '<td>'.$list_all_runners['user_lname'].'</td>';
					echo '<td>'.$list_all_runners['user_address'].'</td>';
					echo '<td>'.$list_all_runners['user_email'].'</td>';
					echo '<td>'.$list_all_runners['user_contact_no'].'</td>';
					echo '<td>'.$list_all_runners['user_identification'].'</td>';
					echo '<td><a href="javascript:void(0)" onclick="do_action('.$list_all_runners['user_id'].')">Edit</a></td>';
				echo '</tr>';
				
				$row_flag++;
			}
            echo '</tbody>';
            echo '</table>';
            echo '</div>
            </div>';
			?>
	</div>
</div>
<!--/span ends-->
</body>

<?php
include("../includes/footer.php");
?>