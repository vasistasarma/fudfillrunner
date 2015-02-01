<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$connect_db = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die('eror');
?>