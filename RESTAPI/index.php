<?php
ini_set("display_errors",1);

//will have list of APIs for mobile communication
require 'rest_api.php';

function get_routes($id) {
    $sql = "(SELECT
	RUNNER.user_email AS emailId,
	RUNNER.id AS runnerId,
	RUNNER.user_fname AS name,
	RUNNER.user_contact_number AS mobile,
	ROUTE.route_short_url AS routeshorturl
	FROM `users` RUNNER
	LEFT JOIN planned_routes ROUTE 
	ON RUNNER.id = ROUTE.runner_id 
	WHERE RUNNER.id = :id)";
    try {
        $dbCon = getConnection();
        $stmt = $dbCon->prepare($sql);  
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $routes = $stmt->fetchObject();  
        $dbCon = null;
		print_r($routes);
		echo '{"runner": [' . json_encode($routes) . ']}';
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }
}

function update_runner_location($id)
{    
	global $app;
    $request = $app->request();
	
	$runner_id = $id;
	$runner_prof_id = $request->params('runner_prof_id');
    $runner_latest_latt = $request->params('latitude');
    $runner_latest_lng = $request->params('longitude');
	$runner_assigned_route = $request->params('route_assigned');
   
    $sql = "INSERT INTO runners_tracking 
	(`runner_id`, `runner_prof_id`, `runner_latest_latt`, `runner_latest_lng`, `runner_assigned_route`) 
	VALUES (:id, :runner_prof_id, :latitude, :longitude, :route_assigned)";
	//the above has to be the parameters of put
	
	try {
        $dbCon = getConnection();
        $stmt = $dbCon->prepare($sql);
		$stmt->bindParam("id", $runner_id);
        $stmt->bindParam("runner_prof_id", $runner_prof_id);
        $stmt->bindParam("latitude", $runner_latest_latt);
		$stmt->bindParam("longitude", $runner_latest_lng);
		$stmt->bindParam("route_assigned", $runner_assigned_route);
        $status->status = $stmt->execute();
        
        $dbCon = null;
        echo json_encode($status); 
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
    }
}


function get_runners_location() 
{
    $sql_query = "SELECT `runner_prof_id`, `runner_latest_latt`, `runner_latest_lng` FROM runners_tracking";
    try {
        $dbCon = getConnection();
        $stmt   = $dbCon->query($sql_query);
        $users  = $stmt->fetchAll(PDO::FETCH_OBJ);
        $dbCon = null;
        echo '{"runners": ' . json_encode($users) . '}';
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
    
}

function getConnection() {
    try {
        $db_username = "root";
        $db_password = "";
		$db_name = "inventory";
        $conn = new PDO('mysql:host=localhost;dbname='.$db_name, $db_username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    return $conn;
}

?>