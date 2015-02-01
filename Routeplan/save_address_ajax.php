<?php
$data = json_decode($_POST['data']);

$system_user = "balakrishnan";

$map_long_url = "http://maps.google.com/maps?";

$start = 0;

$find_end_addr = sizeof($data);

include("../includes/db_config.php");

foreach($data as $route_address_list)
{
	$planned_address = $route_address_list->address;
	$latitude = $route_address_list->latitude;
	$longitude = $route_address_list->longitude;
	$cust_name = $route_address_list->customer_name;

	//check for user already exist

	$check_customer = mysql_query("SELECT * FROM `inventory`.customer_book WHERE cust_fname = '".$cust_name."'") or die(mysql_error());
	
	$customer_id = "";

	if(mysql_num_rows($check_customer) > 0)
	{
		//if yes get existing customer id
		$get_customer_id = mysql_fetch_array($check_customer);
		$customer_id = $get_customer_id['id'];
	}
	else
	{
		//if no get auto increment id
		$find_increment = mysql_query("SELECT Auto_increment FROM information_schema.tables 
		WHERE TABLE_SCHEMA = 'inventory' AND table_name = 'customer_book'") or die(mysql_error());

		$get_increment_id = mysql_fetch_array($find_increment);
		$customer_id = $get_increment_id['Auto_increment'];

		//inserting customer INFO_ALL
		mysql_query("INSERT INTO `inventory`.`customer_book` 
		(`cust_fname`, `google_api_address`, `created_by`, `created_on`, `updated_by`, `updated_on`) 
		VALUES ('".$cust_name."', '".$planned_address."', '".$system_user."', '".date('Y-m-d H:i:s')."', '".$system_user."', CURRENT_TIMESTAMP)") 
		or die(mysql_error());
	}

	//inserting address details

	mysql_query("INSERT INTO `inventory`.`address_book` () VALUES (NULL, '".$customer_id."', '', '', '".$planned_address."', '".$latitude."', '".$longitude."', '".$system_user."', '".date('Y-m-d H:i:s')."', '".$system_user."', CURRENT_TIMESTAMP);") 
	or die(mysql_error());

	//inserting route details

	mysql_query("INSERT INTO `inventory`.`route_details` () VALUES (NULL, '".$customer_id."', '', '', '".$planned_address."', '".$latitude."', '".$longitude."', '', '".$system_user."', '".date('Y-m-d H:i:s')."', '".$system_user."', CURRENT_TIMESTAMP);") 
	or die(mysql_error());
	
	if($start == 0)
	$map_long_url .="saddr=".$latitude.",".$longitude;
	else if(($start-1) == $find_end_addr)
	$map_long_url .="&daddr=".$latitude.",".$longitude;
	else if($start > 0)
	$map_long_url .="+to:".$latitude.",".$longitude;
	
	$start++;
}
$map_long_url .="&t=m&z=15"; //t represents map type and k represents satellite view, z represents zoom

mysql_query("INSERT INTO `inventory`.`planned_routes` () VALUES (NULL, '0', '".$map_long_url."', '".$map_long_url."', '".$system_user."', '".date('Y-m-d H:i:s')."', '".$system_user."', CURRENT_TIMESTAMP);") 
or die(mysql_error());

echo "Saved routes";
?>