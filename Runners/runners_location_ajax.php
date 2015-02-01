<?php
$data = $_POST['data'];

include("../includes/db_config.php");

$get_all_runners = mysql_query("
(SELECT 
CONCAT(PERSONAL.user_fname,' ',PERSONAL.user_lname) AS `runner_name`,
PERSONAL.user_contact_no AS `runner_contact`,
TRACK.runner_latest_latt,
TRACK.runner_latest_lng,
TRACK.runner_assigned_route,
TRACK.location_updated_at 
FROM inventory.`runners_tracking` TRACK
LEFT JOIN (SELECT `runner_id`, MAX(`id`) as id FROM inventory.`runners_tracking` GROUP BY `runner_id`) RECENT
ON TRACK.`id` = RECENT.`id` 
LEFT JOIN inventory.users_personal_details PERSONAL
ON TRACK.`runner_id` = PERSONAL.`user_id`
WHERE RECENT.`runner_id` IS NOT NULL)") OR die(mysql_error());

$runner_details = array();

while($show_all_runners = mysql_fetch_array($get_all_runners))
{
	$runner_details[] = array(
	'runner_name' => ucfirst($show_all_runners['runner_name']),
	'runner_contact' => $show_all_runners['runner_contact'],
	'runner_latest_latt' => $show_all_runners['runner_latest_latt'],
	'runner_latest_lng' => $show_all_runners['runner_latest_lng'],
	'location_updated_at' => date('F j, Y, H:i:s',strtotime($show_all_runners['location_updated_at'])));
}

echo json_encode($runner_details, true);

?>