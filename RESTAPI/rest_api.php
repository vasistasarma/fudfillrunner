<?php
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->get('/routeplan/:id', 'get_routes');
//$app->get('/routeplan/search/', 'get_runners_location');
$app->put('/runnerlocation/:id', 'update_runner_location');

$app->run();
?>